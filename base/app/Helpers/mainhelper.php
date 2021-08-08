<?php
use Illuminate\Support\Facades\DB;
function getpaymentname($id_bank)
{
    return DB::table('bank')->where(['id'=>$id_bank])->first('nama_bank')->nama_bank;
}
function getpaymentrek($id_bank)
{
    return DB::table('bank')->where(['id'=>$id_bank])->first('norek')->norek;
}
function getpaymentreka($id_bank)
{
    return DB::table('bank')->where(['id'=>$id_bank])->first('an')->an;
}

function getpaymentrekap($id_bank)
{
    return DB::table('bank')->where(['id'=>$id_bank])->first('nama_bank')->nama_bank;
}

function getprogram($id_paket)
{
    return DB::table('paket')->where(['id'=>$id_paket])->first('nama_paket')->nama_paket;
}

function getprogram1($id_paket)
{
    return DB::table('paket')->where(['id'=>$id_paket])->first('durasi')->durasi;
}
function getprogram2($id_paket)
{
    return DB::table('paket')->where(['id'=>$id_paket])->first('satuan')->satuan;
}



function getalamat($id,$kota){
    return DB::table('wilayah_2020')->where(['kode'=>$kota])->first('nama')->nama.', '.DB::table('wilayah_2020')->where(['kode'=>$id])->first('nama')->nama;
}
function get_paket_jemput($paket){
    if($paket == '0-0'){
        return 0;
    }else{
        $paket = explode('-',$paket);
        return $paket;
    }
}
function get_sales($id){
        if (DB::table('referral')->where('link_referal',$id)->count() == 0) {
            return 'Sales Telah Dihapus';
        }
        return DB::table('referral')->where('link_referal',$id)->first('nama_pemilik')->nama_pemilik;
}