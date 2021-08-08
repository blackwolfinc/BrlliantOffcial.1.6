<table>
    <tr>
        <th>No</th>
        <th>Tanggal Registrasi</th>
        <th>No invoice</th>
        <th>Nama Lengkap</th>
        <th>Nomor Whatsapp</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Program</th>
        <th>Metode Pembayaran</th>
        <th>No. Rekening pembayaran</th>
        <th>Nominal Pembayaran</th>
        <th>Paket Pengantaran</th>
        <th>Paket Penjemputan</th>
        <th>Link Invoice</th>
 
      
    
    </tr>
    @foreach ($datas as $key => $item)
    @php
    $item2 = DB::table('paket')->where('id',$item->id_paket)->first();
         $downpayment = 0;
        $biayaadmin = 0;
        if ($item2->satuan == "Minggu") {
            if ($item2->durasi <= 4) {
                $downpayment = 250000;
                $biayaadmin = 125000;
            }else{
                $downpayment = 500000;
            }
        }else{
            if ($item2->durasi <= 1) {
                $downpayment = 250000;
            }else{
                $downpayment = 500000;
            }
        }
        
        
        $paket_jemput = get_paket_jemput($item->paket_jemput);
        $paket_pulang = get_paket_jemput($item->paket_pulang);
        if ($item->metodepembayaran == 'Full'){
                $paketjemput = $paketpulang = 0;
                if($item->paket_jemput != '0-0'){
                    $paketjemput = $paket_jemput[1];
                }
                if($item->paket_pulang != '0-0'){
                    $paketpulang = $paket_pulang[1];
                }
                $bia = number_format($item2->harga + $item->kodeunik + $paketpulang + $paketjemput + $biayaadmin, 0, ',', '.').' - FULL';
                $bia2 = $item->kodeunik + $paketpulang + $paketjemput + $biayaadmin;
            }else{
            $paketjemput = $paketpulang = 0;
                if($item->paket_jemput != '0-0'){
                    $paketjemput = $paket_jemput[1];
                }
                if($item->paket_pulang != '0-0'){
                    $paketpulang = $paket_pulang[1];
                }
            
                $bia = number_format($downpayment + $item->kodeunik , 0, ',', '.').' - DP';
                $bia2 = $item->kodeunik + $biayaadmin+ $paketpulang + $paketjemput;
            }
    @endphp
        <tr>
            <th>{{ $key+1 }}</th>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->no_invoice }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>{{ $item->no_whatsapp }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ getalamat($item->prov,$item->kota) }}</td>
            <td>Reguler  {{ getprogram1($item->id_paket) }} {{ getprogram2($item->id_paket) }} ( {{ getprogram($item->id_paket) }} )</td>
            <td>{{ $item->metodepembayaran }}</td>
            
            <td> {{getpaymentrekap($item->bank)}} {{ getpaymentrek($item->bank)}}</td>
            <td>{{ $bia }}</td>
            <td>{{ $item->paket_pulang  }}</td>
            <td>{{ $item->paket_jemput  }}</td>
            <td>https://brilliantofficial.com/showinvoice/{{ $item->no_invoice }}</td>
 
     

        </tr>
    @endforeach
</table>