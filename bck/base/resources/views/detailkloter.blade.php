@extends('layouts.app')

@section('title','Detail Periode')
    
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4 class="card-title">List Pendaftaran</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="{{ route('exportkloter',$id) }}">Export Excel</a>
                <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                        <th>Status</th>
                        <th>Sales</th>
                        <th>Tanggal Mendaftar</th>
                        <th>Nama Lengkap</th>
                        <th>Nomor Whatsapp</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                    @foreach ($list as $key => $item)
                        <tr>
                            <td>{{ $key+ $list->firstItem() }}</td>

                            <td>@if ($item->gambar != '')
                                <a target="_blank" href="{{ route('showinvoice',$item->no_invoice) }}" class="btn btn-sm btn-success">Lihat Invoice</a>
                                @else 
                                <a target="_blank" href="{{ route('konfirmasiaction',$item->id) }}" class="btn btn-sm btn-primary">Detail Pembayaran</a>
                            @endif</td>
                            <td><br>
                                <a href="{{ route('manage_delkloter',$item->id) }}" onclick="return confirm('data yang terhapus tidak bisa dikembalikan, yakin?')" class="btn btn-sm btn-block btn-danger">Hapus</a>
                                @if ($item->lunas == '1' && $item->gambar != '')
                                    <a href="{{ route('konfirmasikloter',['id'=>$item->id,'lunas'=>$item->lunas]) }}" class="btn btn-warning btn-block text-dark">Batalkan Konfirmasi</a>
                                @elseif ($item->lunas == '0' && $item->gambar != '')
                                <a href="{{ route('konfirmasikloter',['id'=>$item->id,'lunas'=>$item->lunas]) }}" class="btn btn-primary btn-block">Konfirmasi</a>
                                @else 

                                @endif
                                <br>
                            </td>
                            <td>
                                @if ($item->gambar != '')
                                    @if ($item->lunas == 1)
                                        <span style="font-weight: bold;color:green">Telah Dikonfirmasi</span>
                                    @else 
                                        <span style="background:#f9c862;">Belum Dikonfirmasi</span>
                                    @endif
                                @else 
                                    <span style="color:red">Belum Upload Bukti Pembayaran</span>
                                @endif
                            </td>
                            <td>{{  ($item->referal == '') ? 'Tanpa Sales' : get_sales($item->referal) }}</td>
                            <td><div style="width: 110px;font-weight:bold;color:green">{{ date('d-m-Y H:i',strtotime($item->created_at)) }}</div></td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->no_whatsapp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ getalamat($item->prov,$item->kota) }}</td>
                            <td>{{ $item->metodepembayaran }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            </div>
            <div class="card-footer">
                {{ $list->links() }}</div>
        </div>
    </div>
</div>
@endsection