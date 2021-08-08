@extends('customer.template.main')

@section('title','Verifikasi Pembayaran')

@section('content')
<br><br>
<div class="row col-100">
</div>

<div class="selogan bg-2">
    <h5>Konfirmasi Pembayaran</h5>
    <p></p>
</div>
<form action="{{ route('uploadconfirminv') }}" method="post" enctype="multipart/form-data">
<div class="container  s12 m12 container-form-css-2">
    <div class="row validasi-wrap">
        <div class="col s12">
          Masukkan ID Registrasi :
          <div class="input-field inline">
            <input id="invoiceinout" type="text" class="validate" name="no_invoice" value="{{ (isset($invoice)) ? $invoice : '' }}">
            <label for="email_inline">ID Registrasi</label>
            <span class="helper-text" data-error="wrong" data-success="right">*masukkan ID Registrasi yang terdapat pada file pdf form registrasi </span>
          </div>
        </div>
      </div>
      
</div>
<div class="container">
    <div id="result"></div>
</div>
<div class="container" id="uploadsetview">
    <hr>
    <center><h4>Upload Bukti Pembayaran</h4></center>
        <div class="file-field input-field">
          <div class="btn">
            <span>Pilih File</span>
            <input type="file" name="bukti"  accept="image/*" onchange="loadFile(event)" required>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="File yang diperbolehkan hanya gambar">
          </div>
        </div>
        <center><img id="output" style="margin-bottom:10px;width:200px;"></center>
        <script>
          var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
          };
        </script>
        @csrf
        <center><button type="submit" class="waves-effect waves-light btn-large">Verifikasi Pembayaran</button><br><br></center>

</div>

</form>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#uploadsetview').hide();
            $('#invoiceinout').on("keyup", function() {
                let invid = $(this).val();
                $.ajax({
					url: '{{ route('cekinvoicetrue') }}',
					type: 'POST',
					data: {no_invoice:invid,_token:'{{ csrf_token() }}'},
					success: function(hasil) {
						if(hasil == '0') {
							$('#result').html('<span style="background:red;color:#fff;padding:15px;font-size:16px;display:block;text-align:center;margin-bottom:20px;">Invoice Tidak Ditemukan,silahkan periksa kembali kode invoice anda</span>');
						}
						else {
							$('#result').html(hasil);
                            $('#uploadsetview').show();
						}
					}
				});
            }).triggerHandler("keyup");
        });
    </script>
@endsection
