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
            <td>{{ $item->bank }}</td>
            <td>{{ $item->paket_pulang  }}</td>
            <td>{{ $item->paket_jemput  }}</td>
            <td>https://brilliantofficial.com/showinvoice/{{ $item->no_invoice }}</td>
 
     

        </tr>
    @endforeach
</table>