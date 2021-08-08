@extends('layouts.app')

@section('title','Manage Referral')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Referal</button>
                 </div>
                <table class="table table-responsive table-striped">
                  <tr>
                    <th>No</th>
                    <th>Nama Marketing Affilate</th>
                    <th>Link Referral</th>
                    <th>Aksi</th>
                  </tr>
                  @foreach ($ref as $key => $item)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama_pemilik }}</td>
                        <td><b style="color: green">{{ url('/').'/?ref='.$item->link_referal }}</b></td>
                        <td>
                          <a href="javascript:void(0)" data-id="{{ $item->id }}" data-nama-pemilik="{{ $item->nama_pemilik }}" onclick="editbtnaction('{{ urlencode($item->id) }}','{{ urlencode($item->nama_pemilik) }}')" class="btn btn-primary"><i class="far fa-edit"></i></a>
                          <a href="{{ route('manage_referal_delete',$item->id) }}" class="btn btn-danger"  onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Referral</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('manage_referal_action') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pemilik Referral</label>
                    <input type="text" name="nama_pemilik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Pemilik Referral">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Referral</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('manage_referal_action_edit') }}" method="post">
              @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pemilik Referral</label>
                      <input type="hidden" name="id" id="id_pemilik_edit">
                      <input id="nama_pemilik_edit" type="text" name="nama_pemilik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Pemilik Referral">
                  </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary sm12" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary sm12">Simpan</button>
              </div>
          </form>
        </div>
      </div>
    </div>
@endsection
@section('script')
    <script>
      function editbtnaction(id,name)
      {
        $('#nama_pemilik_edit').val(name);
        $('#id_pemilik_edit').val(id);
        $('#exampleModal1').modal('show');
      }
    </script>
@endsection