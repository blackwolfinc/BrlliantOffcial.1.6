@extends('layouts.app')

@section('title','Manage Periode')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Periode</button>
                 </div>
                <table class="table table-responsive table-striped">
                  <tr>
                    <th>No</th>
                    <th>Periode</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Arsipkan</th>
                    <th>Aksi</th>
                  </tr>
                  @foreach ($ref as $key => $item)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <th>{{ $item->bulan.', '.$item->tahun }}</th>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->detail }}</td>
                        <td><a href="{{ route('manage_kloter_ar',[$item->id,$item->active]) }}" class="btn btn-danger"><i class="fas fa-archive"></i> Arsipkan</a></td>
                        <td>
                          <a href="{{ route('manage_dkloter',$item->id) }}" class="btn btn-success"><i class="fas fa-eye"></i> Detail Periode</a>
                          <a href="javascript:void(0)" data-id="{{ $item->id }}" data-bulan="{{ $item->bulan }}" data-tahun="{{ $item->tahun }}" data-tanggal="{{ $item->tanggal }}" data-detail="{{ $item->detail }}" onclick="editbtnaction(this)" class="btn btn-primary"><i class="far fa-edit"></i></a>
                          <a href="{{ route('managedelkloter',$item->id) }}" class="btn btn-danger"  onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </table>
            </div>
        </div>

        <div class="card card-danger mt-5">
          <div class="card-header">
            <h4 class="card-title">Periode Yang Diarsipkan</h4>
          </div>
          <div class="card-body">
            <table class="table table-responsive table-striped">
              <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Arsipkan</th>
                <th>Aksi</th>
              </tr>
              @foreach ($ref2 as $key => $item )
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <th>{{ $item->bulan.', '.$item->tahun }}</th>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->detail }}</td>
                    <td><a href="{{ route('manage_kloter_ar',[$item->id,$item->active]) }}" class="btn btn-primary"><i class="fas fa-archive"></i> Kembalikan Arsip</a></td>
                    <td>
                      <a href="{{ route('manage_dkloter',$item->id) }}" class="btn btn-success"><i class="fas fa-eye"></i> Detail Periode</a>
                      <a href="javascript:void(0)" data-id="{{ $item->id }}" data-bulan="{{ $item->bulan }}" data-tahun="{{ $item->tahun }}" data-tanggal="{{ $item->tanggal }}" data-detail="{{ $item->detail }}" onclick="editbtnaction(this)" class="btn btn-primary"><i class="far fa-edit"></i></a>
                      <a href="{{ route('managedelkloter',$item->id) }}" class="btn btn-danger"  onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('manage_kloter_action') }}" method="post">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="">Pilih bulan dan tahun</label>
                <div class="row">
                  <div class="col-6">
                    <select name="bulan" id="" class="form-control">
                      <<option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <select name="tahun" id="" class="form-control">
                      @for ($i = date('Y'); $i < date('Y') + 10; $i++)
                          <option>{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Detail Tanggal (contoh : 20,21,22,& 23)</label>
                <textarea name="tanggal_detail" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" style="height: 150px;"></textarea>
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Periode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('manage_kloter_actionup') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Pilih bulan dan tahun</label>
                <div class="row">
                  <div class="col-6">
                    <select name="bulan" id="bulan" class="form-control">
                      <option value="Januari">Januari</option>
                      <option value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <select name="tahun" id="tahun" class="form-control">
                      @for ($i = date('Y'); $i < date('Y') + 10; $i++)
                          <option>{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Detail Tanggal (contoh : 20,21,22,& 23)</label>
                <textarea name="tanggal_detail" id="tanggal" cols="30" rows="10" class="form-control"></textarea>
              </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <textarea name="keterangan" id="detail" cols="30" rows="10" class="form-control" style="height: 150px;"></textarea>
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
      function editbtnaction(attrs)
      {
        console.log($(attrs).data('id'));
        $('#id').val($(attrs).data('id'));
        $('#bulan').val($(attrs).data('bulan'));
        $('#tahun').val($(attrs).data('tahun'));
        $('#tanggal').val($(attrs).data('tanggal'));
        $('#detail').val($(attrs).data('detail'));
        $('#exampleModal1').modal('show');
      }
    </script>
@endsection