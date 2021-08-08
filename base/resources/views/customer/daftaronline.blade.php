@extends('customer.template.main')

@section('content')

<!-- selogan -->
<div class="atas-selogan-lah" style="">
    <h2 class="c-teal4" style="color: silver">  <b>Tinggal Selangkah Lagi...</b></h2>
    <div class="img-daftar-warp2">
          <img class="img-daftar23" style="width: 32%"src="{{ asset('customer/ImageAsset/assetmore/AMAN.png')}}"></div>
</div>

<!-- selogan end -->

{{-- FORM DAFTAR --}}

<form action="{{ route('daftaraction')}}" method="post" onSubmit="document.getElementById('btndaftarsekarang').disabled=true;">
    @csrf



    <div id="counter" class="container  container-form-css">



        <div class="row">

    </div>
            <div class="img-daftar-warp">
                <img class="img-daftar" src="{{ asset('customer/ImageAsset/marchendise.png')}}">
            </div>
            <div class="input-field col s12 m12">
                <i class="material-icons prefix">chrome_reader_mode</i>
                <select placeholder='pilih paket' name="id_paket" id="plid_paket" required>
                    @foreach ($paket as $item)
                    @php
                    $downpayment = 0;
                    if ($item->satuan == "Minggu") {
                    if ($item->durasi < 4) { $downpayment=250000; }else{ $downpayment=500000; } }else{ if ($item->durasi
                        <= 1) { $downpayment=250000; }else{ $downpayment=500000; } } @endphp <option
                            data-downpayment="{{ $downpayment }}" data-namapaket="{{ $item->nama_paket }}"
                            data-harga="{{ $item->harga }}" value="{{ $item->id }}" @if ($id==$item->id)
                            {{ 'selected' }} @endif>{{ $item->nama_paket }}-({{ $item->durasi }} {{ strtoupper($item->satuan) }}) </option>
                            @endforeach
                </select>
                <label>PILIH PROGRAM</label>
            </div>
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" class="validate" name="nama_lengkap" required>
                        <label for="icon_prefix">Nama Lengkap Sesuai KTP</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">phone</i>
                        <input id="icon_telephone" type="tel" class="validate" name="no_whatsapp" required>
                        <label for="icon_telephone">Nomor WhatsApp (aktif)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" class="validate" name="email" required>
                        <label for="email" data-error="wrong" data-success="right">Alamat E-mail</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">wc</i>
                        <select name="jk" required>
                            <option value="" disabled selected>jenis Kelamin</option>
                            <option value="Laki Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label>Jenis kelamin</label>
                    </div>
                </div>



                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">map</i>
                        <select name="prov" id="form_prov" class="s12" required>
                            <option value="" disabled selected>Pilih Provinsi</option>
                            @foreach ($wilayah as $item)
                            <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <label for="password">Provinsi asal</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">map</i>
                        <select name="kota" id="mySelect"></select>
                        <label for="password">kota asal</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix">date_range</i>
                        <select class="sl2" name="kloter" required>
                            <option value="" disabled selected>Pilih Periode</option>
                            @foreach ($kloter as $item)
                            <option value="{{ $item->id }}">{{ $item->tanggal }} {{ $item->bulan }} {{ $item->tahun }}
                            </option>
                            @endforeach
                        </select>
                        <label>Pilih periode program</label>
                    </div>
                </div>

                <div class="row">

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">public</i>
                        <select name="bank" id="pilihbank" required>
                            @foreach ($bank as $item)
                            <option data-namabank="{{ $item->nama_bank }}" data-norek="{{ $item->norek }}"
                                value="{{ $item->id }}">{{ $item->nama_bank }}</option>
                            @endforeach
                        </select>
                        <label>Pilih Bank</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">swap_vertical_circle</i>
                        <select name="metodepembayaran" id="metodpemb" required>
                            {{-- <option value="DownPayment" data-metode="DownPayment">Down Payment</option> --}}
                            <option value="Full" data-metode="Full">Full Payment</option>
                        </select>
                        <label>Pilihan pembayaran</label>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <br>

    <div class="container   s12 m12 container-form-css" style="display:none;">
        <h5>Extra</h5>
        <hr>
        <br>
        <div class="row">
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">airport_shuttle</i>
                <select name="paket_jemput" id="paketjemputs">
                    <option data-hargajemput="0" value="0-0">Paket Jemput</option>
                </select>
                <label>penjemputan (opsional)</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons prefix">airport_shuttle</i>
                <select name="paket_pulang" id="paketpulangs">
                    <option data-harga="0" value="0-0">Paket Pengantaran</option>
                </select>
                <label>Pengantaran pasca program (opsional)</label>
            </div>

        </div>
    </div>
    @php
    $randomed = 369;
    @endphp
    {{--  --}}<br><br>

    <input type="hidden" name="kodeunik" id="kodeunik" value="{{ $randomed }}">
    <div class="container   s12 m12 container-form-css">
        <p id="alertinfonya" style="display: block;background:red;color:#fff;padding:10px;border-radius:10px;">
            Captcha tidak sesuai, silahkan cek kembali</p>
        <h4>Chapta</h4>
        <div class="col chpata s6">
            <h4 id="cap1"></h4>
            <h4> + </h4>
            <h4 id="cap2"></h4>
            <h4>&nbsp;&nbsp;=</h4>&nbsp;&nbsp;
            <input type="text" placeholder="hasil" id="hasil"  required>
        </div>
    </div>
        <br><br>
    <div class="container  s12 m12 container-form-css-2">
        <div class="row s12 m12  rowkufull">

            <div class=" col s12 m6 cardkiri">
                <table>
                    <thead>
                        <tr>
                            <th>Rincian pesanan</th>


                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Pilihan Paket</td>
                            <td id="nmpket" style="color: #0d5c63;font-weight:bold;"></td>
                            <td id="hargapekr"></td>
                        </tr>
                        <tr>
                            <td>Pilihan Bank</td>
                            <td id="nmbank" style="color: #0d5c63;font-weight:bold;"></td>
                            <td id="norekbank"></td>
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td id="metodpemba" style="color: #0d5c63;font-weight:bold;"></td>
                            <td id="metodpembas"></td>
                        </tr>
                        <tr>
                            <td>Kode Unik</td>
                            <td> </td>
                            <td>{{ $randomed }}</td>
                        </tr>
                        <tr>
                            <td>Total Pembayaran</td>
                            <td> </td>
                            <td>
                                <h5 style="color: green;font-weight:bold;" id="totalpemmmb"></h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br>
            <br><br>
            <div class="col s12 m6 cardkanan">
                <button class="waves-effect waves-light orange darken-1 btn btnku" id="btndaftarsekarang">
                    <h3>Daftar Sekarang</h3>
                </button>
            </div>
        </div>
    </div>
</form>
{{-- FORM DAFTAR END --}}
<!-- paralax -->
@endsection

@section('script')
<script>
    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    $(document).ready(function () {
        $('#plid_paket').on('change', function () {
            var $option = $(this).find(':selected');
            $('#nmpket').html($option.data('namapaket'));
            $('#hargapekr').html('Rp ' + addCommas($option.data('harga')));
            $('#metodpemb').trigger("change");
            gethargatotal();
        }).triggerHandler("change");

        $('#paketpulangs').on('change', function () {
            $('#plid_paket').trigger("change");
            $('#metodpemb').trigger("change");
            gethargatotal();
        });
        $('#paketjemputs').on('change', function () {
            $('#plid_paket').trigger("change");
            $('#metodpemb').trigger("change");
            gethargatotal();
        });

        $('#pilihbank').on('change', function () {
            var $option1 = $(this).find(':selected');
            $('#nmbank').html($option1.data('namabank'));
            $('#norekbank').html($option1.data('norek'));
        }).triggerHandler("change");

        $('#metodpemb').on('change', function () {
            var $option2 = $(this).find(':selected');
            $('#metodpemba').html($option2.data('metode'));
            if ($option2.data('metode') == 'Full') {
                var $optiona = $('#plid_paket').find(':selected');
                $('#metodpembas').html('Rp ' + addCommas($optiona.data('harga')));
            } else {
                var $optiona = $('#plid_paket').find(':selected');
                $('#metodpembas').html('Rp ' + addCommas($optiona.data('downpayment')));
            }
            gethargatotal();
        }).triggerHandler("change");
        gethargatotal();
    });

    function gethargatotal() {

        var getdataq = $('#plid_paket').find(':selected');
        getdata = parseInt(getdataq.data('harga'));
        getdatadown = parseInt(getdataq.data('downpayment'));
        // console.log(getdatadown);
        var kodeunik = parseInt($('#kodeunik').val());

        var paketpulangs = $('#paketpulangs').find(':selected');
        paketpulangs = parseInt(paketpulangs.data('harga'));

        var paketjemputs = $('#paketjemputs').find(':selected');
        paketjemputs = parseInt(paketjemputs.data('hargajemput'));

        // metode pembayaran
        var totalmetode = 0;
        var metode = $('#metodpemb').find(':selected');
        if (metode.data('metode') == 'Full') {
            totalmetode = paketpulangs + paketjemputs + getdata + kodeunik;
            $('#totalpemmmb').html('Rp ' + addCommas(totalmetode));
        } else {
            totalmetode = getdatadown + kodeunik;
            $('#totalpemmmb').html('Rp ' + addCommas(totalmetode));
        }
    }

</script>
<script>
    function getRandomArbitrary(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    $(document).ready(function () {
        $("#form_kab").hide();
        $("#form_kec").hide();

        $('body').on("change", "#form_prov", function () {
            $.ajax({
                type: 'GET',
                url: "{{ route('getdaerah') }}",
                data: {
                    id: $(this).val()
                },
                success: function (hasil) {
                    // console.log(hasil);
                    $('#mySelect').empty();
                    // $('#mySelect').append(hasil);
                    $('#mySelect').append($(hasil));
                    $('#mySelect').material_select();
                }
            });
        });
        $("#alertinfonya").hide();
        let cap1 = getRandomArbitrary(1, 4);
        let cap2 = getRandomArbitrary(1, 4);
        $('#cap1').html(cap1);
        $('#cap2').html(cap2);

        let hasil = cap1 + cap2;
        $("#hasil").bind("keyup change", function (e) {
            if ($("#hasil").val() != hasil) {
                console.log('validasi gagal');
                $("#alertinfonya").show();
                $('#btndaftarsekarang').prop('disabled', true);
            } else {
                console.log('validasi berhasil');
                $("#alertinfonya").hide();
                $('#btndaftarsekarang').prop('disabled', false);
            }
        })
    });

</script>
@endsection
