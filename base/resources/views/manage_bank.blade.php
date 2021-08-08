@extends('layouts.app')

@section('title','Manage Bank')
    
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Bank</button>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered">
                        <tr>
                            <th>Nama Bank</th>
                            <th>Nomor Rekening</th>
                            <th>Atas Nama</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($bank as $item)
                            <tr>
                                <td>{{ $item->nama_bank }}</td>
                                <td>{{ $item->norek }}</td>
                                <td>{{ $item->an }}</td>
                                <td>
                                    <a href="javascript:void(0)" data-id="{{ $item->id }}" data-nama="{{ $item->nama_bank }}" data-norek="{{ $item->norek }}" data-an="{{ $item->an }}" onclick="editbuttonaction(this)" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('manage_bank_delete',$item->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kloter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('manage_bank_action') }}" method="post">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Nomor Rekening</label>
                <input type="text" name="norek" class="form-control">
              </div>
                <div class="form-group">
                    <label for="">Atas Nama</label>
                    <input type="text" name="atas_nama" class="form-control">
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kloter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('manage_bank_action') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="id_bank">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" id="nama_bank">
              </div>
              <div class="form-group">
                <label for="">Nomor Rekening</label>
                <input type="text" name="norek" class="form-control" id="norek">
              </div>
                <div class="form-group">
                    <label for="">Atas Nama</label>
                    <input type="text" name="atas_nama" class="form-control" id="atas_nama">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
        function editbuttonaction(attrs)
        {
            $('#id_bank').val($(attrs).data('id'));
            $('#nama_bank').val($(attrs).data('nama'));
            $('#norek').val($(attrs).data('norek'));
            $('#atas_nama').val($(attrs).data('an'));
            $('#exampleModal1').modal('show');
        }
    </script>
@endsection