<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Cookie;

class UserController extends Controller
{
    public function home(){
        $paket = DB::table('paket')->where(['online'=>'0'])->orderBy('id','DESC')->get();
        $kloter = DB::table('kloter')->where(['active'=>'1','online'=>'0'])->orderBy('id','DESC')->get();
            $paket1 = DB::table('paket')->where(['online'=>'1'])->orderBy('id','DESC')->get();
            $kloter1 = DB::table('kloter')->where(['active'=>'1','online'=>'1'])->orderBy('id','DESC')->get();
        return view('customer.home',compact(['paket','kloter','paket1','kloter1']));
    }
    public function about(){
        return view('customer.about');
    }
    public function program(){
        return view('customer.program');
    }
    public function daftar($id){
        $wilayah = DB::select( DB::raw("SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama") );
        $paket = DB::table('paket')->where(['online'=>0])->orderBy('id','desc')->get();
       $kloter = DB::table('kloter')->where(['active'=>'1','online'=>0])->orderBy('id', 'desc')->get();
        $bank = DB::table('bank')->get();
        return view('customer.daftar',compact('paket','id','kloter','wilayah','bank'));
    }
    public function daftaronline($id){
        $wilayah = DB::select( DB::raw("SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama") );
        $paket = DB::table('paket')->where(['online'=>1])->orderBy('id','desc')->get();
       $kloter = DB::table('kloter')->where(['active'=>'1','online'=>1])->orderBy('id', 'desc')->get();
        $bank = DB::table('bank')->get();
        return view('customer.daftaronline',compact('paket','id','kloter','wilayah','bank'));
    }
    public function verifikasi()
    {
        return view('customer.verifikasi');
    }
    public function verifikasi2($invoice)
    {
        return view('customer.verifikasi',compact('invoice'));
    }
    public function contact(){
        return view('customer.contact');
    }
    public function daftarrombongan()
    {

        $kloter = DB::table('kloter')->where(['active'=>'1'])->get();
        return view('customer.daftarrombongan',['kloter'=>$kloter]);
    }
    public function getkab(Request $request)
    {
        $n=strlen($request->id);
        $m=($n==2?5:($n==5?8:13));
        $wilayah = DB::select( DB::raw("SELECT kode,nama FROM wilayah_2020 WHERE LEFT(kode,'$n')='$request->id' AND CHAR_LENGTH(kode)=$m ORDER BY nama") );
        $wil = '';
        foreach ($wilayah as $key => $value) {
            $wil .= '<option value="'.$value->kode.'">'.$value->nama.'</option>';
        }
        echo $wil;
    }

    public function daftaraction(Request $request)
    {
        // dd(Cookie::get('referral'));
        $input = $request->post();
        $input = array_merge($input,['referal' => Cookie::get('referral')]);
        unset($input['_token']);
        $id = DB::table('pendaftaran')->insertGetId($input);
        $invoice = 'B'.date('Y').'-00'.$id;
        DB::table('pendaftaran')->where(['id'=>$id])->update(['no_invoice'=>$invoice]);

        echo '<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brilliant Official</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <nav style="background:#0d5c63">
    <center><img src="https://brilliantofficial.com/customer/ImageAsset/logo.png" alt="" style="width:120px;padding:20px;"></center>
    </nav>
    <h3 style="text-align:center;display:block;color:#666;font-size:24px">Pendaftaran Berhasil</h3>
    <center><p style="font-size:19px;">Terimakasih, form registrasi anda telah kami proses Silahkan perikasa detail form registrasi dan rincian pesanan anda yang telah di download dalam format pdf, Segera lakukan pembayaran sebelum 1x24 jam</p></center>
  <center>
    <a href="'.route('konfirmasiaction', $id).'" target="_blank" style="display:inline-block;padding:20px;font-size:23px;background:#0d5c63;color:#fff;text-decoration:none;border-radius:5px;">Download Invoice</a>
  </center>
  <center>
    <a href="'.route('homescustomer').'" style="display:inline-block;padding:10px;font-size:16px;background:#3498db;color:#fff;text-decoration:none;border-radius:5px;margin-top:20px;">Kembali Ke Beranda</a>
  </center>
  </body>
</html>';
        //return redirect()->route('konfirmasiaction', $id);

    }
    public function konfirmasiaction($id)
    {
        if (DB::table('pendaftaran')->where('id',$id)->count() == 0) {
            abort(404);
        }
        $konfirmasi = DB::table('pendaftaran')->where('id',$id)->first();
        $item = DB::table('paket')->where('id',$konfirmasi->id_paket)->first();
        $pdf = PDF::loadview('customerverify.main',compact('konfirmasi','item'));
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream() ;

    }
    public function cekinvoicetrue(Request $request){
        $konfirmasi = DB::table('pendaftaran')->where('no_invoice',$request->no_invoice)->count();
        if ($konfirmasi > 0) {
            $konfirmasi = DB::table('pendaftaran')->where('no_invoice',$request->no_invoice)->first();
            $item = DB::table('paket')->where('id',$konfirmasi->id_paket)->first();
            $bank = DB::table('bank')->where('id',$konfirmasi->bank)->first();
            $downpayment = 0;
            $biayaadmin = 0;
            if ($item->satuan == "Minggu") {
                if ($item->durasi <= 4) {
                    $downpayment = 250000;
                    $biayaadmin = 125000;
                }else{
                    $downpayment = 500000;
                }
            }else{
                if ($item->durasi <= 1) {
                    $downpayment = 250000;
                    $biayaadmin = 0;
                }else{
                    $downpayment = 500000;
                }
            }

            $paket_jemput = get_paket_jemput($konfirmasi->paket_jemput);
            $paket_pulang = get_paket_jemput($konfirmasi->paket_pulang);
            if ($konfirmasi->metodepembayaran == 'Full'){
                $paketjemput = $paketpulang = 0;
                if($konfirmasi->paket_jemput != '0-0'){
                    $paketjemput = $paket_jemput[1];
                }
                if($konfirmasi->paket_pulang != '0-0'){
                    $paketpulang = $paket_pulang[1];
                }
                $bia = number_format($item->harga + $konfirmasi->kodeunik + $paketpulang + $paketjemput + $biayaadmin, 0, ',', '.').' - FULL';
            }else{
                $bia = number_format($downpayment + $konfirmasi->kodeunik , 0, ',', '.').' - DP';
            }

            echo '
            <span style="background:green;color:#fff;padding:15px;font-size:16px;display:block;text-align:center;margin-bottom:20px;">Invoice Ditemukan.</span>
            <div class="container  s12 m12 container-form-css-2">
            <div class="row s12 m12  rowkufull cardkiri">
                <div class=" col s12 m12">
                    <table>
                        <tbody>
                            <tr>
                                <td>ID Pendaftaran </td>
                                <td>:</td>
                                <td>'.$konfirmasi->no_invoice.'</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: </td>
                                <td>'.$konfirmasi->nama_lengkap.'</td>
                            </tr>
                            <tr>
                                <td>Pembayaran</td>
                                <td>:</td>
                                <td>Rp. '.$bia.'</td>
                            </tr>

                            <tr>
                                <td>Bank</td>
                                <td> :</td>
                                <td>'.$bank->nama_bank.' : '.$bank->norek.' a/n '.$bank->an.'</td>
                            </tr>

                            <tr>
                                <td>Program </td>
                                <td>:</td>
                                <td>'.$item->nama_paket.' ('.$item->durasi.' '.$item->satuan.')</td>
                            </tr>';
                            if($konfirmasi->paket_jemput != '0-0'){
                                echo '
                                <tr>
                                    <td>Penjemputan </td>
                                    <td>:</td>
                                    <td>'.$paket_jemput[2].' -> Pare</td>
                                </tr>';
                            }
                            if($konfirmasi->paket_pulang != '0-0'){
                                echo '
                                <tr>
                                    <td>Pengantaran </td>
                                    <td>:</td>
                                    <td>Pare -> '.$paket_pulang[2].'</td>
                                </tr>';
                            }
                        echo '</tbody>
                    </table>
                </div>
            </div>
        </div>';
        }else{
            echo '0';
        }
    }
    public function uploadconfirminv(Request $request){
        // dd($request);
        $file = $request->file('bukti');
        $tujuan_upload = 'data_file';
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move($tujuan_upload,$nama_file);

        DB::table('pendaftaran')->where(['no_invoice'=>$request->no_invoice])->update(['gambar'=>$nama_file]);
        return redirect()->route('showinvoice', $request->no_invoice);
    }
    public function showinvoice($no_invoice)
    {
        // dd($no_invoice);
        if (DB::table('pendaftaran')->where('no_invoice',$no_invoice)->count() == 0) {
            abort(404);
        }
        $konfirmasi = DB::table('pendaftaran')->where('no_invoice',$no_invoice)->first();
        $item = DB::table('paket')->where('id',$konfirmasi->id_paket)->first();
        $pdf = PDF::loadview('customerverify.main-inv',compact('konfirmasi','item'));
        return $pdf->stream();
    }
}
