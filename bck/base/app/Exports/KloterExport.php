<?php
namespace App\Exports;

use DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KloterExport implements FromView
{
    protected $id;
    function __construct($id) {
            $this->id = $id;
    }
    public function view(): View
    {
        return view('exportd', [
            'datas' => DB::table('pendaftaran')->where(['kloter'=>$this->id])->orderBy('id','DESC')->get()
        ]);
    }
}