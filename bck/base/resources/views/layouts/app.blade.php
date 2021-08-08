
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/components.css') }}">
  
<style>
  table {
border-collapse: collapse;
border-spacing: 0;
width: 100%;
border: 1px solid #ddd;
font-size: 13px;
}

th, td {
text-align: left;
padding: 16px;
}

tr:nth-child(even) {
background-color: #eee;
}
</style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            {{-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li> --}}
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          
         
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('admin-assets/avatar10.jpg') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <div class="dropdown-divider"></div>
              <form action="{{ route('logout') }}" method="post">@csrf
              <button type="submit" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </button>
            </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Admin Panel Brilliant</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">APB</a>
          </div>
          <ul class="sidebar-menu">
            <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="{{ route('manage_kloter') }}"><i class="fas fa-school"></i> <span>Manage Periode</span></a></li>
            <li><a class="nav-link" href="{{ route('manage_bank') }}"><i class="fas fa-money-bill"></i> <span>Manage Bank</span></a></li>
            <li><a class="nav-link" href="{{ route('manage_paket') }}"><i class="fas fa-list"></i> <span>Manage Paket</span></a></li>
            <li><a class="nav-link" href="{{ route('manage_referal') }}"><i class="fas fa-link"></i> <span>Manage Referal</span></a></li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title')</h1>
          </div>

          <div class="section-body">
              @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 Brilliantofficial
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  @yield('modal')
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('admin-assets/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  {{-- <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script> --}}
  <script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      }); 
      });
      
      
          $(window).bind("resize", function () {
    console.log($(this).width())
    if ($(this).width() < 500) {
        $('body').removeClass('').addClass('sidebar-mini')
    } else {
        $('body').removeClass('sidebar-mini').addClass('')
    }
}).trigger('resize');
      </script>
  <!-- Page Specific JS File -->
  @yield('script')
</body>
</html>
