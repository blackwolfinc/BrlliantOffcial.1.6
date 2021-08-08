@extends('layouts.app')

@section('title','Manage Program')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Program</button>
            </div>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Nama program</th>
                        <th>Rincian</th>
                        <th>Harga</th>
                        <th>Durasi</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($paket as $item)
                        <tr>
                            <td>{{ $item->nama_paket }}</td>
                            <td>@foreach (json_decode($item->keuntungan) as $keun)
                                <ul>
                                <li>{{ $keun }}</li>
                                </ul>
                            @endforeach</td>
                            <td>Rp {{ number_format((float)$item->harga) }}</td>
                            <td>{{ $item->durasi }} {{ $item->satuan }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-primary" data-id="{{ $item->id }}" data-namapaket="{{ $item->nama_paket }}" data-keuntungan="{{ $item->keuntungan }}" data-durasi="{{ $item->durasi }}" data-satuan="{{ $item->satuan }}" data-harga="{{ $item->harga }}" onclick="editbtnact(this)">Edit</a>
                                
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="{{ route('manage_paket_delete',$item->id) }}" class="btn btn-danger">Delete</a>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kloter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('manage_paket_tambah_action') }}" method="post">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label for="">Nama Program</label>
                    <input type="text" name="nama_paket" id="" class="form-control">
                  </div>
                  <div class="col-6">
                    <label for="">Durasi</label>
                    <div class="row">
                      <div class="col-4">
                        <input type="text" name="durasi" id="" class="form-control">
                      </div>
                      <div class="col-8">
                        <select name="satuan" id="" class="form-control">
                          <option value="Minggu">Minggu</option>
                          <option value="Bulan">Bulan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Harga (Rp)</label>
                <input type="text" name="harga" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Rincian</label>
                <textarea name="fitur[]" id="" cols="30" rows="10" class="form-control"></textarea>
                <div class="input_fields_wrap"></div>
              </div>
              <button class="add_field_button btn btn-sm btn-success" type="button">Tambah Fitur</button>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kloter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('manage_paket_tambah_action') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="idedit">
            <div class="modal-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <label for="">Nama Paket</label>
                    <input type="text" name="nama_paket" id="namapaket" class="form-control">
                  </div>
                  <div class="col-6">
                    <label for="">Rincian</label>
                    <div class="row">
                      <div class="col-4">
                        <input type="text" name="durasi" id="durasi" class="form-control">
                      </div>
                      <div class="col-8">
                        <select name="satuan" id="satuan" class="form-control">
                          <option value="Minggu">Minggu</option>
                          <option value="Bulan">Bulan</option>
                        </select>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="">Harga (Rp)</label>
                <input type="text" name="harga" id="harga" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Rincian</label>
                <textarea name="fitur[]" cols="30" rows="10" class="form-control" id="keuntungan"></textarea>
                <div class="input_fields_wrap1"></div>
              </div>
              <button class="add_field_button1 btn btn-sm btn-success" type="button">Tambah Fitur</button>
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
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
            $(wrapper).append('<div><textarea name="fitur[]" id="" cols="30" rows="10" class="form-control mt-2"></textarea><a href="#" class="remove_field btn btn-danger btn-sm">Remove</a></div>'); //add input box
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
$(document).ready(function() {
    var wrapper1         = $(".input_fields_wrap1"); //Fields wrapper
    var add_button1      = $(".add_field_button1"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button1).click(function(e){ //on add input button click
        e.preventDefault();
            $(wrapper1).append('<div><textarea name="fitur[]" id="" cols="30" rows="10" class="form-control mt-2"></textarea><a href="#" class="remove_field btn btn-danger btn-sm">Remove</a></div>'); //add input box
    });

    $(wrapper1).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<script>
  function editbtnact(attrs)
  {
    $('#idedit').val($(attrs).data('id'));
    $('#namapaket').val($(attrs).data('namapaket'));
    $('#durasi').val($(attrs).data('durasi'));
    $('#satuan').val($(attrs).data('satuan'));
    $('#harga').val($(attrs).data('harga'));

    
    let listk = $(attrs).data('keuntungan');
    let wrapper1 = $(".input_fields_wrap1");
    console.log(listk[0]);
    if (listk.length == 1) {
      $(wrapper1).empty();
      $('#keuntungan').val(listk[0]);
    } else {
        $(wrapper1).empty();
      listk.forEach((element,index) => {
        if(index == 0){
          $('#keuntungan').val(element);
        }else{
          $(wrapper1).append('<div><textarea name="fitur[]" id="" cols="30" rows="10" class="form-control mt-2">'+element+'</textarea><a href="#" class="remove_field btn btn-danger btn-sm">Remove</a></div>');
        }
      });
    }

    $('#exampleModal1').modal('show');
  }
</script>
@endsection