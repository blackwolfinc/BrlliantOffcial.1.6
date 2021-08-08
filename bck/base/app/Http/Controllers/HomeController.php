<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Paket;
use App\Models\Referral;

use DataTables;
use DB;
use Excel;
use App\Exports\KloterExport;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pendaftaran = DB::table('pendaftaran')->count();
        $pendaftaran1 = DB::table('pendaftaran')->where(['lunas'=>'1'])->count();
        $referral = DB::table('referral')->count();
        $listpendaftaran = DB::table('pendaftaran')->orderBy('id','DESC')->limit(10)->get();
        return view('home',compact(['pendaftaran','pendaftaran1','referral','listpendaftaran']));
    }
    public function manage_bank()
    {
        $bank = Bank::all();
        return view('manage_bank',compact('bank'));
    }
    public function manage_bank_action(Request $request)
    {
        if (isset($request->id)) {
            Bank::where(['id'=>$request->id])->update([
                'nama_bank' => $request->nama_bank,
                'norek' => $request->norek,
                'an' => $request->atas_nama,
            ]);
        }else{
            Bank::create([
                'nama_bank' => $request->nama_bank,
                'norek' => $request->norek,
                'an' => $request->atas_nama,
            ]);
        }
        return redirect()->back();
    }
    public function manage_bank_delete($id)
    {
        Bank::where(['id'=>$id])->delete();
        return redirect()->back();
    }
    public function manage_paket()
    {
        $paket = Paket::all();
        return view('manage_paket',compact('paket'));
    }
    public function manage_paket_tambah()
    {
        return view('manage_paket_tambah');
    }
    public function manage_paket_tambah_action(Request $request)
    {
        if ($request->id) {
            Paket::where(['id'=>$request->id])->update([
                'nama_paket' => $request->nama_paket,
                'durasi' => $request->durasi,
                'harga' => $request->harga,
                'keuntungan' => json_encode($request->fitur),
                'satuan'=> $request->satuan,
            ]);
        }else{
            Paket::create([
                'nama_paket' => $request->nama_paket,
                'durasi' => $request->durasi,
                'harga' => $request->harga,
                'keuntungan' => json_encode($request->fitur),
                'satuan'=> $request->satuan,
            ]);
        }
        return redirect()->route('manage_paket');
    }
    public function manage_paket_edit($id)
    {
        $paket = Paket::where(['id'=>$id])->first();
        return view('manage_paket_edit',compact('paket'));
    }
    public function manage_paket_edit_action(Request $request)
    {
        Paket::where(['id'=>$request->id])->update(
            [
                'nama_paket'=> $request->nama_paket,
                'harga'=> $request->harga,
                'diskon'=> $request->diskon,
                'keuntungan'=> $request->keuntungan,
                'satuan'=> $request->satuan,
            ]
        );
        return redirect()->route('manage_paket');
    }
    public function manage_paket_delete($id)
    {
        Paket::where(['id'=>$id])->delete();
        return redirect()->route('manage_paket');
    }

    // random referal code
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if(DB::table('referral')->where('link_referal',$randomString)->count() > 0){
            self::generateRandomString(5);
        }else{
            return $randomString;
        }
    }
    public function manage_referal()
    {
        $ref = DB::table('referral')->get();
        return view('manage_referral',compact('ref'));
    }
    public function manage_referal_action(Request $request){
        $key = self::generateRandomString(5);
        $data = [
            'nama_pemilik' => $request->nama_pemilik,
            'link_referal' => $key,
        ];
        DB::table('referral')->insert($data);
        return redirect()->back();
    }
    public function manage_referal_delete($id){
        DB::table('referral')->where(['id'=>$id])->delete();
        return redirect()->back()->withInput();
    }
    public function manage_referal_action_edit(Request $request)
    {
        DB::table('referral')->where(['id'=>$request->id])->update(['nama_pemilik'=>$request->nama_pemilik]);
        return redirect()->back()->withInput();
    }
    public function manage_kloter()
    {
        $ref = DB::table('kloter')->where(['active'=>'1'])->get();
        $ref2 = DB::table('kloter')->where(['active'=>'0'])->get();
        return view('manage_kloter',compact(['ref','ref2']));
    }
    public function managedelkloter($id)
    {
        DB::table('kloter')->where(['id'=>$id])->delete();
        return redirect()->back()->withInput();
    }
    public function manage_kloter_action(Request $request)
    {
        DB::table('kloter')->insert([
            'bulan'=>$request->bulan,
            'tahun'=>$request->tahun,
            'tanggal'=>$request->tanggal_detail,
            'detail'=>$request->keterangan,
            'active'=>'1',
            ]);
        return redirect()->back()->withInput();
    }
    public function manage_kloter_ar($id,$active)
    {
        DB::table('kloter')->where(['id'=>$id])->update(['active'=> $active == '0' ? '1' : '0' ]);
        return redirect()->back()->withInput();
    }
    public function manage_kloter_actionup(Request $request)
    {
        DB::table('kloter')->where(['id'=>$request->id])->update([
            'bulan'=>$request->bulan,
            'tahun'=>$request->tahun,
            'tanggal'=>$request->tanggal_detail,
            'detail'=>$request->keterangan,
            ]);
        return redirect()->back()->withInput();
    }

    public function manage_dkloter($id)
    {
        $kloter = DB::table('kloter')->where(['id'=>$id])->first();
        $list = DB::table('pendaftaran')->where(['kloter'=>$id])->orderBy('id','DESC')->simplePaginate(20);
        return view('detailkloter',compact(['list','kloter','id']));
    }
    public function manage_delkloter($id)
    {
        DB::table('pendaftaran')->where(['id'=>$id])->delete();
        return redirect()->back()->withInput();
    }
    public function konfirmasikloter($id,$lunas){
        $lunas = $lunas == '1' ? '0' : '1';
        DB::table('pendaftaran')->where(['id'=>$id])->update(['lunas'=>$lunas]);
        return redirect()->back()->withInput();
    }
    public function exportkloter($id){
        $kloter = DB::table('kloter')->where(['id'=>$id])->first();

        $nama_file = $kloter->bulan.' '.$kloter->tahun.' - '.$kloter->tanggal.'.xlsx';
        return Excel::download(new KloterExport($id), $nama_file);
    }
}
