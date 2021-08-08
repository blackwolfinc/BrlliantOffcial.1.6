@extends('customer.template.main')
@section('title','Daftar Rombongan')
@section('content')
<br><br>
<br><br>
<br><br>

<!-- selogan -->
<div class="" style="text-align:center;padding:30px 0px;">
    <h2>YUK TINGGAL SELANGKAH LAGI</h2>
    <p></p>
</div><!-- selogan end -->{{-- FORM DAFTAR --}}<div class="container   s12 m12 container-form-css">
    <h5>Kelas Rombongan </h5>
    <hr><br>
    <form action="{{ route('daftarrombonganaction') }}" method="post">
        @csrf
    <div class="row">
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">account_circle</i>
            <input name="nama_penanggung" id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Nama Penanggung Jawab</label>
        </div>
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">phone</i>
            <input name="wa_penanggung1" id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Nomor Whatsapp (aktif)</label>
        </div>
        <div class="input-field col s12 m12"><i class="material-icons prefix">assignment</i><select
            name="rombongan_dari" id="paketpulangs">

            <option value="SD sederajat" >SD sederajat</option>
            <option value="SMP sederajat">SMP sederajat</option>
            <option value="SMA sederajat">SMA sederajat</option>
            <option value="Politeknik/Universitas/Institut">Politeknik/Universitas/Institut</option>
            <option value="Kantor/Instansi">Kantor/Instansi</option>
            <option value="Lembaga Bimbingan">Lembaga Bimbingan</option>
            <option value="Organisasi/Komunitas">Organisasi/Komunitas</option>
            <option value="Rombongan Masyarakat Umum">Rombongan Masyarakat Umum</option>
      
        </select>
        <label>Rombongan Dari</label>
        </div>
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">assistant_photo</i>
            <input name="nama_rombongan" id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Nama Rombongan</label>
        </div>
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">chrome_reader_mode</i>
            <input name="jumlah_rombongan" id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">jumlah Rombongan</label>
        </div>
        </div> <div class="input-field col s12 m12">
            <i class="material-icons prefix">drafts</i>
            <input name="wa_penanggung3" id="icon_telephone" type="tel" class="validate">
            <label for="icon_telephone">Email</label>
        </div>
            <div class="input-field col s12 m12">
                <i class="material-icons prefix">drafts</i>
                <input name="pesan_penanggung" id="icon_telephone" type="tel" class="validate">
                <label for="icon_telephone">pesan</label>
            </div>

    <div class="container  s12 m12 container-form-css-2">
        <div class="row s12 m12  rowkufull">
            <div class="col s12 m12 cardkanan"><button class="waves-effect waves-light orange darken-1 btn btnku"
                    id="btndaftarsekarang">
                    <h3>Daftar Sekarang</h3>
                </button></div>
        </div>
    </div>
    {{-- FORM DAFTAR END --}}
    <!-- paralax -->
</div>
</form>
</div>
<br><br>
<br><br>
<br><br>
@endsection
