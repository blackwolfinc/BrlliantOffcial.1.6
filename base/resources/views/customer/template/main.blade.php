<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('customer/ImageAsset/logo.jpg') }}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css"> --}}
   <link rel="stylesheet" href=" {{ asset('customer/customer.css') }}">
       
</head>

<body>

    <!-- navbar -->
    <nav>
        <div class="nav-atas  bg-1 hide-on-med-and-down" style="justify-content: left">
            <img src="{{ asset('customer/ImageAsset/logo.png')}}" alt="">
        </div>
        <div class="nav-wrapper bg-2">
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="" class="button-collapse  right  " ><img class="button-collapse   image-navbar" src="{{ asset('customer/ImageAsset/logo.png')}}" alt=""></a>
            
            <ul class="right hide-on-med-and-down" style="padding-right: 3%">
                <li><a class="" href="{{ route('homescustomer') }}"><h4><b>Home</b></h4></a></li>
                <li><a class="" href="{{ route('daftar','null') }}"><h4><b>Registrasi</b></h4></a></li>
                <li><a class="" href="{{ route('daftaronline','null') }}"><h4><b>Program Online</b></h4> </a></li>
                <li><a class="" href="{{ route('verifikasi') }}"><h4><b>Verifikasi</b></h4> </a></li>
         
                <li><a class="" href="{{ route('about') }}"><h4><b>Blog</b></h4></a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li><a  href="{{ route('homescustomer') }}">Home</a></li>
              <li><a  href="{{ route('daftar','null') }}">Registrasi</a></li>
              <li><a  href="{{ route('verifikasi') }}">Verifikasi</a></li>
              <li><a  href="{{ route('daftaronline','null') }}">Program Online</a></li>
              <li><a  href="{{ route('about') }}">Blog</a></li>
            </ul>
            </ul>
        </div>
    </nav>

    <!-- end navbar -->




    @yield('content')
   


    {{-- button fixed --}}
    <div class="buton-khusus-2 fixed-action-btn horizontal click-to-toggle">
          <a class="btn-floating btn-large waves-effect waves-light"  href="https://wa.link/2rdf58" class="btn-floating  white"><img class="btnimgbesar" src="{{ asset('customer/ImageAsset/WA2.png')}}" alt=""></a>
      </a>
      <ul>
      </ul>
    </div>
          
{{-- button fixed ens --}}
    {{-- button fixed --}}
    <div class="fixed-action-btn horizontal click-to-toggle">
      <a class="btn-floating btn-large waves-effect waves-light orange darken-1">
        <i class="material-icons">menu</i>
      </a>
      <ul>
        <li><a blank  href="https://Instagram.com/brilliantkampunginggrispare " class="btn-floating white"><img class="btnimgkecil" src="{{ asset('customer/ImageAsset/IG2.png')}}" alt=""></a></li>
        <li><a href="https://www.facebook.com/brilliantenglishcourseofficial/" class="btn-floating blue" ><img class="btnimgkecil" src="{{ asset('customer/ImageAsset/FB2.png')}}" alt=""></a></li>
         <li><a href="https://vt.tiktok.com/ZStkeTHP/" class="btn-floating blue" ><img class="btnimgkecil" src="{{ asset('customer/ImageAsset/Tiktok2.png')}}" alt=""></a></li>
          <li><a href="https://www.youtube.com/channel/UCbq3u1t_zkLBUGkVlJYbr5A/featured" class="btn-floating blue" ><img class="btnimgkecil" src="{{ asset('customer/ImageAsset/Y2.png')}}" alt=""></a></li>
      </ul>
    </div>
          
{{-- button fixed ens --}}
<!-- footer -->

<footer class="page-footer  bg-1">
    <div class="container center ">
      <div class="row">
        <div class="col lg12 s12">
          <div class="footer-img ">
            <img src="{{ asset('customer/ImageAsset/logo.png')}}" alt="">
        </div>
          <p class="grey-text text-lighten-4"> </p>
        </div>
      </div>
    </div>
    <div class="footer-copyright bg-1 center">
      <div class="container">
        Brilliant English Course © 2020 Copyright. Semua Hak Dilindungi Undang-Undang  
      </div>
    </div>
  
  </footer>
  <!-- footer end -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.js"></script>
  <script src="{{ asset('customer/customer.js') }}"></script>

  @yield('script')
</body>

</html>
