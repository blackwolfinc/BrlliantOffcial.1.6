@extends('customer.template.main')
@section('title','Brilliant Official')
@section('content')


<!-- colapse -->

<div class="row col-100">
    <div class="slider">
        <ul class="slides"  style="height:300px !important;">
            <li>
                <img src="{{ asset('customer/ImageAsset/home/home1.jpg')}}">
                <span class="layer"></span><!-- random image -->
                <div class="caption center-align">
                    <h3 class="h3-khusus">WEBSITE RESMI Brilliant English Course</h3>
                </div>
            </li>
            <li>
                <img src="{{ asset('customer/ImageAsset/home/home2.jpg')}}">
                <span class="layer"></span><!-- random image -->
                <div class="caption left-align">
                    <h3 class="h3-khusus">Lembaga kursus Bahasa Inggris terbaik di Kampung Inggris Pare</h3>
                </div>
            </li>
            <li>
                <img src="{{ asset('customer/ImageAsset/home/home3.jpg')}}">
                <span class="layer"></span>
                <div class="caption right-align">
                    <h3 class="h3-khusus">Bersertifikat resmi SK. Dikpora RI No. 421.9/050/418.47/2015</h3>
                </div>
            </li>
            <li>
                <img src="{{ asset('customer/ImageAsset/home/home6.jpg')}}">
                <span class="layer"></span>
                <div class="caption center-align">
                    <h3 class="h3-khusus">Ada bule-nya (Berasal dari Inggris dan Amerika)</h3>
                </div>
            </li>
            <li>
                <img src="{{ asset('customer/ImageAsset/home/home5.jpg')}}">
                <span class="layer"></span>
                <div class="caption center-align">
                    <h3 class="h3-khusus">Fasilitas lengkap dan terpadu</h3>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="selogan2 bg-2">
    <h3 class="h3-khusus"><b>SELAMAT DATANG DI WEBSITE RESMI</b></h3>
</div>
<!-- colapse 2 -->
<div class="col s12 m6 center-align jaminan2 ">
    <div class="col center  " style="padding:0px 5vw; line-height: 40px;">
        <h1 class="c-teal animasi-teks"><b>BRILLIANT ENGLISH COURSE</b></h1>
    </div>
    <div class="col kampungInggris">
        <h2 class="c-teal2 ">KAMPUNG INGGRIS PARE</h2>
        {{-- <button class="waves-effect waves-light orange darken-1 btn btn-large btn-daftar-fix">Daftar Sekarang</button>
    </div> --}}
    </div>
</div>
<!-- count -->


<div class="row center kalimat-khusus">
    <div class="col c-teal">
        <h3 class="h3-khusus">Lembaga kursus bahasa inggris terbaik di Kampung Inggris Pare</h3>
        <h3 class="h3-khusus">yang terbukti telah mencetak lebih dari 96.000 Alumni</h3>
        <h3 class="h3-khusus">yang berasal dari berbagai daerah di Indonesia</h3>
    </div>
</div>
<div class="count-peserta">
    <div class="penghitung-wraper row"  id="counter">
        <div class="col count" >
            <h3 class=" counter-value h3-khusus" data-count="96369">2000</h3>
            <p class=""><b>ALUMNI</b></p>
        </div>
        <div class="col count" style="border-right: 0.4vw solid #fff; border-left: 0.4vw solid #fff">
            <h3 class=" counter-value h3-khusus" data-count="95">0</h3>
          
            <p><b>KELAS</b></p>
        </div>
        <div class="col count" style="border-right: 0.4vw solid #fff;">
            <h3 class=" counter-value h3-khusus" data-count="85">0</h3>
           
            <p><b>TUTOR</b></p>
        </div>
        <div class="col count">
            <h3 class=" counter-value h3-khusus" data-count="115">0</h3>
      
            <p><b>CAMP</b></p>
        </div>
  
    </div>




    <div class="briliantishome">
        <button class="btn-daftar-khusus ">
            <h3  class="c-teal6"><b>BRILLIANT IS HOME </b></h3>
        </button>
 
    </div>
    <div class="col c-wth md12 apa-yang"> 
    <br><br>
        
        
        <p class="c-teal6 ">Apa yang kamu cari?</p>
        <p class="c-teal6">Tempat <b>belajar bahasa inggris</b> dengan suasana nyaman seperti dirumah?
            <b>Brilliant english course</b> adalah tempat belajar ternyaman di <b>kampung inggris pare</b>,
            karena kami menciptakan suasana pembelajaran  dengan konsep <i><b>feel like home</b></i>.
           <i><b> Nature and Culture</b></i> adalah konsep yang kami sinergikan sebagai unsur penunjang
            sehingga tercipta <b> suasana belajar yang menyenangkan</b>.
            </p>
            <br>
        <p class="c-teal6">Di <b> Brilliant english course</b> kamu dapat menemukan keseruan suasana belajar
            yang sangat sensasional. Materi-materi yang kami berikan, mulai dari 
            <b>vocabulary, pronunciation, grammar,</b> dan <b>speaking</b>, yang akan kamu pelajari
            untuk mewujudkan goals kamu <b> lancar berbicara bahasa inggris</b>.
            </p>
            <br>
            <p class="c-teal6">Dengan <i><b>full day english program</b></i> yang dilengkapi fasilitas <b> english area</b>,
                dapat membuat bahasa inggrismu menjadi sebuah habbit. <b>“Bisa karena terbiasa”</b>.
                Nggak kebayang kan..?, tanpa kamu sadari tiba-tiba kamu <b>jago ngomong bahasa inggris</b>
                cas cis cus kayak bule.
                </p>
                <br><br><br><br>

               
                <h1 class="c-teal4"><b>BURUAN DAFTAR SEKRANG JUGA!!</b></h1>
                <h2 class="c-teal4">
                <span
                    class="txt-rotate"
                    data-period="1000"
                    data-rotate='[ "Kuota terbatas", "Kuota terbatas" ]'></span>
                </h2>




        <a href="#daftar">
        <button class="btn-daftar-khusus ">
            <h3  class="c-teal6"><b>PILIH PROGRAM DAN DAFTAR SEKARANG </b></h3>
        </button>
        </a>
    </div>



    
</div>



{{-- 
<div class="row center bg-2">
    <div class="col md12"> --}}
        {{-- <a href="{{ route('daftar') }}"> --}}
        {{-- <button class="btn-daftar-khusus ">
            <h3 class="h3-khusus">DAFTAR SEKARANG</h3>
        </button>
        </a>
    </div>
</div> --}}


<!-- pembuktian  -->
<div class="row " style="padding: 5vw;">
    <div class="col  l4 m6 s12 center">
        <div class="row padingku">
            <div class="col ">
                <div class="col s12 m12 ">
                    <div class="card-image comeJoinUs3">
                        <img src="{{ asset('customer/ImageAsset/Card/1.png')}}">

                    </div>
                    <div class="card card-panel hoverable  card-khusus-tengah">
                        <div class="">
                            <p>Brilliant English Course adalah </p>
                            <p>lembaga pendidikan Bahasa Inggris </p>
                            <p> dengan sertifikat resmi SK. Dikpora RI </p>
                            <p> No. 421.9/050/418.47/2015.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col ">
                <div class="row">
                    <div class="col s12 m12 ">
                        <div class="card-image comeJoinUs3">
                            <img src="{{ asset('customer/ImageAsset/Card/4.png')}}">

                        </div>
                        <div class="card  card-khusus-tengah  card-panel hoverable ">
                            <div class="">

                                <p>Berada di jantung Kampung Inggris</p>
                                <p> dengan fasilitas lengkap dan terjangkau</p>

                                <p>

                                    memenuhi kebutuhan sehari-hari</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col l4 m6 s12 center">
        <div class="row">
            <div class="col ">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card-image comeJoinUs3">
                            <img src="{{ asset('customer/ImageAsset/Card/2.png')}}">

                        </div>
                        <div class="card card-panel hoverable  card-khusus-tengah">
                            <div class="">

                                <p>Berasal dari UK dan USA</p>
                                <p> Disini kamu bisa memahami bagaimana </p>
                                <p>bahasa inggris diucapkan oleh</p>
                                <p> pembicara asli dari Inggris dan Amerika </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col ">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card-image comeJoinUs3">
                            <img src="{{ asset('customer/ImageAsset/Card/5.png')}}">

                        </div>
                        <div class="card card-panel hoverable  card-khusus-tengah">
                            <div class="">

                                <p>Untuk memastikan kamu terdaftar</p>
                                <p>sebagai member baru Brilliant English Course, </p>
                                <p> kamu hanya perlu membayar DP </p>
                                <p> setelah registrasi online. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <div class="col l4 m12 s12 center">
        <div class="row">
            <div class="col ">
                <div class="row">
                    <div class="col m12 s12 ">
                        <div class="card-image comeJoinUs3">
                            <img src="{{ asset('customer/ImageAsset/Card/3.png')}}">

                        </div>
                        <div class="card card-panel hoverable card-khusus-tengah">
                            <div class=" ">

                                <p>Periode program yang sudah kamu pilih</p>
                                <p>bisa dipindahkan jadwalnya. Gratis. </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col ">
                <div class="row">
                    <div class="col m12 s12 ">
                        <div class="card-image comeJoinUs3">
                            <img src="{{ asset('customer/ImageAsset/Card/6.png')}}">

                        </div>
                        <div class="card card-panel hoverable  card-khusus-tengah">
                            <div class=" ">

                                <p>Brilliant English Course mempunyai tiga tipe camp</p>
                                <p>(Reguler, Homestay & VIP)</p>
                                <p>yang lokasinya berada di sekitar </p>
                                <p>Brilliant English Course. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<!-- end pembuktian  -->

{{-- VIDIO HUSON --}}
<div class="vidioEditor bg-2">
    <div class="responsive-card">    <h3 class="h3-khusus c-wth">Mau Tau Gimana Keseruan belajar di Brilliant ?</h3>
        <h3  class="h3-khusus c-wth">Yukk.. simak Vidio Berikut</h3>
    </div>

    <div class="card-image">
        <iframe  src="https://www.youtube.com/embed/kmxyj1QCtmM?controls=0"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
    <div class="responsive-card2 c-wth pad-20">  
        <h3 class="h3-khusus c-teal1 "><b>Sekarang , apa tujuan kamu ingin ke kampung inggris ?</b></h3>
        <h3  class="c-teal5  c-teal6 ">Kalau kamu ingin <b>lancar ngomong bahasa inggris</b>,<br> kamu bisa pilih program Reguler 2 Bulan sampai dengan 3 Bulan. <br>
            Kalau kamu ingin <b>memanfaatkan waktu liburan</b> <br> untuk belajar di kampung inggris,<br> pilih program 2 minggu sampai dengan 1 bulan. <br>
            semakin lama program yang kamu pilih,<br> semakin lama pula kamu akan <b>aktif berbahasa inggris</b>, dan artinya <br>
            secara otomatis kamu akan semakin <b>lancar berbahasa inggris 
            </b>
            
            </h3>
    </div>


</div>

{{-- VIDO HUSON END --}}
<div class="col md12 comeJoinUs">
    <img src="{{ asset('customer/ImageAsset/COME JOIN US.png')}}">
</div>
{{-- koter start --}}
<div class="koter-wraper">
    <div class="kloterTitle bg-2">
        <h3 class="c-teal4 c-wth">Kalender Akademik {{date('Y')}}</h3>
    </div>
    <div class="kloterhead">
        <h3 class="c-teal2"><b>BRILLIANT ENGLISH COURSE </b></h3>
        <h3 class="c-teal6 c-teal">KAMPUNG INGGRIS PARE </h3>
    </div>
    <div class="isiKloter">
            <div class="carousel">
                @foreach ($kloter as $item)
                <a class="carousel-item  " href="#one!">

                    <h3 class="h3-khusus tambahan-background">{{ $item->tanggal }} {{ $item->bulan }}   {{ $item->tahun }}</h3>
                  
                   <h3 class="c-teal5 ">{{ $item->detail }}</h3>
                </a>
                @endforeach
              </div>
        </div>
       
    </div>
</div>

{{-- kloter end --}}

<!-- selogan -->
<div class="selogan bg-2">
    <h5>Kamu bisa pilih paket program Super lengkap sesuai dengan KEBUTUHAN & KEINGINANMU</h5>
    <p></p>
</div>

<!-- selogan end -->
<!-- card  -->


<div id="daftar" class="" style="padding: 5vw;">
    <div class="row">
        @foreach ($paket as $item)
        <div class=" judul-card col s12 m6 l6 xl3">
            <div class="card cardwraper-daftar ">

                <div class="card-content atas-judul-card text-white ">
                    <center>
                        <h4><b>{{ $item->durasi }} {{ strtoupper($item->satuan) }}</b></h4>
                        <h5 class=''>{{ $item->nama_paket }}</h5>
                    </center>
                </div>
                <div class="card-content angka-total center">
                    <h4 class=''><sup>Rp.</sup>{{ number_format($item->harga) }}</h4>
                </div>

                <ul>
                    <ul class="collection">
                        @foreach (json_decode($item->keuntungan) as $keun)
                        <li class="collection-item">{{ $keun }}</li>
                        @endforeach
                    </ul>

                    <div class="card-content center">
                        <div class="row">
                            <div class="col s12">
                                <a href="{{ route('daftar',$item->id) }}" class='btn '>Daftar {{ $item->durasi }}
                                    {{ strtoupper($item->satuan) }}</a>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- card end -->

    <div class="">
        <div class=""style="padding:0; " >
            <div class=" judul-card col s12 m12 l12 xl12">
                <div class="card cardwraper-daftar ">
                    <div class="card-content atas-judul-card2  text-white ">
                        <center>
                            <h4><b>Special Paket Grup</b></h4>
                        </center>
                    </div>
                    <ul>
                        <ul class="collection  ">
                            
                            <li class="collection-item center">Pendftaran Perkelompok Minimal 20 Orang</li>
                            <li class="collection-item center">Penawaran Harga Khusus</li>
                            <li class="collection-item center">Program Sesuai Target & Request</li>
                            <li class="collection-item center">Schedule Dapat Disesuaikan</li>
                            <li class="collection-item center">Extra Bonus Program & Bonus Item</li>
                         
                        </ul>
    
                        <div class="card-content center">
                            <div class="row">
                                <div class="col s12">
                                    <a href="{{ route('daftarrombongan') }}" class='btn  '><b>DAFTAR GRUP SEKARANG 
                                    </a></b>
                                </div>
                            </div>
                        </div>
    
                </div>
            </div>
            {{-- <span class="card-title white-text ramerame rounded s12" >
                <img src="{{ asset('customer/ImageAsset/assetmore/PAKET RAME RAME.png')}}">
            </span> --}}
    </div>
  
   
    </div>

<div class="section white">
    
    {{-- count end --}}

</div>

<!-- paralax end -->



<!-- count end -->


<!-- paralax -->
{{-- VIDIO HUSON --}}
<div class="vidioEditor">
    <div class="responsive-card">    <h3 class="h3-khusus c-teal">Mau Tau Gimana Keseruan belajar di Brilliant ?</h3>
        <h3  class="h3-khusus c-teal">Yukk.. simak Vidio Berikut</h3>
    </div>
    <div class="card-image">
        <iframe  src="https://www.youtube.com/embed/3qncy_v4BUE?controls=0"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>



</div>

{{-- VIDO HUSON END --}}


<div class="row">
    <div class="col s12 m12 center  ">
        <div class="card darken-1 ">
            <div class="card-content black-text card-panel hoverable">
                <span class="card-title white-text rounded bg-2 " style="padding: 30px;">
                    <h1 class="c-teal3">Brilliant English Course Pare</h1>
                    <p class="c-teal4"> Wujudkan mimpimu bersama generasi brilliant</p>
                    <br/>
                   
                          <p class="c-teal4"> dari berbagai penjuru nusantara</p>
                </span>
                <p style="padding: 30px;">Bergabung dengan +2.907 siswa yang masih aktif dan bertambah setiap bulannya.
                    Wujudkan mimpimu bersama generasi brilliant
dari berbagai penjuru nusantara! </p>
            </div>
            <div class="card-content">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class=" collapsible-header">
                            <p><i class=" large material-icons c-teal left ">keyboard_arrow_down
                                </i>Mengapa Kamu harus belajar bahasa inggris? </p>
                        </div>
                        <div class="collapsible-body c-teal" style="text-align: justify;">
                            <span>
    1. Bahasa inggris adalah bahasa internasional, bahasa penghubung antara satu negara dengan negara lainnya. Tidak hanya sebagai media komunikasi, naumun teknologi terbaru pun menggunkana bahasa inggris sebagai bahasa pengantar. Jika kamu tidak menguasai bahasa inggris, maka kamu akan tertinggal oleh perkembangan teknologi. Mungkin itu adalah alasan utama, mengapa kamu harus menguasai bahasa inggris.
    </span>
    <br/><br/><span>
    2. Dengan menguasai bahasa inggris, akan dapat memudahkan kamu mendapatkan beasiswa luar negeri. Bahkan untuk mendapatkan pekerjaan di perusahaan international pun bukan suatu hal yang mustahil tentunya.
      </span><br/><br/><span>
    3. Dengan keterampilan bahasa inggris yang kamu miliki, bekerja di perusahaan besar di indonesia sekalipun bukan hanya sekedar impian loh.. karena sebagian besar pekerjaan akan mengharuskan kamu untuk menguasai bahasa inggris, meskipun hanya secara pasif. Bahkan untuk mendapatkan sebuah peluang pun jauh akan lebih besar jika dibandingkan orang yang tidak memiliki kemampuan berbahasa inggris.
      </span><br/><br/><span>
    4. Ketika kamu mempunyai sebuah produk, pastinya kamu akan bisa dengan mudah menawarkan produk usahamu menuju dunia international.  </span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="large material-icons c-teal left">keyboard_arrow_down</i>Mengapa harus Brilliant ?</div>
                        <div class="collapsible-body c-teal" style="text-align: justify;"><span> Faktor terbesar yang mempengaruhi kemampuan kamu dalam berbahasa inggris adalah lingkungan. Kamu beruntung karena memilih kampung inggris sebagai tempat untuk mengasah kemampuan berbahasa inggrismu, karena kampung inggris adalah kampung kursus bahasa inggris pertama dan terbesar di Indonesia, dan luar biasanya kamu juga berkesempatan belajar bahasa inggris di Brilliang english course yang notabene nya adalah salah satu lembaga kursus bahasa inggris yang paling representatif yang terbukti telah melahirkan puluhan ribu alumni.</span><br/><br/>
                            <span>
                                Brilliant english course menerapkan pembelajaran bahasa inggris dengan metode full day english program, yang mewajibkan bagi setiap member untuk tinggal di camp yang berbasis english area (Wajib berbahasa inggris selama 24 jam), dengan program tersebut kamu dapat meningkatkan kemampuan berbahasa inggrismu. 
                            </span>
                        </div>
                    </li>
              
                </ul>
            </div>
        </div>

    </div>

</div>

<!-- count -->


    </div>
</div>


@endsection
