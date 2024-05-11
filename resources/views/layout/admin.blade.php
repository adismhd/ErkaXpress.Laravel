<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ErkaXpress | {{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/sidebar.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <script src="https://kit.fontawesome.com/cf59e3b8b5.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
</head>

@if(session()->get('LoginExpired') != null and session()->get('LoginExpired') > date('Y-m-d H:i:s'))
    <body>
        {{-- <h1>{{ session()->get('LoginExpired') }}</h1>
        <h1>{{ date('Y-m-d H:i:s') }}</h1> --}}
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar" style="70vh">
                <div class="sidebar-header">
                    <h3>ErkaXpress</h3>
                </div>
                <ul class="list-unstyled components" style="height: 74vh">
                    <li class="@if($title == 'Beranda'){{ 'active' }}@endif">
                        <a href="/HomeAdmin"><i class="fa-solid fa-house"></i> &nbsp; Home</a>
                    </li>
                    <li class="@if($title == 'Pesanan'){{ 'active' }}@endif">
                        <a href="/IndexPesanan"><i class="fa-solid fa-table-list"></i> &nbsp; Pesanan</a>
                    </li>
                    <li class="@if($title == 'Admin List'){{ 'active' }}@endif">
                        <a href="/Admin"><i class="fa-solid fa-user-large"></i> &nbsp; Admin</a>
                    </li>
                    {{-- <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Page 1</a>
                            </li>
                            <li>
                                <a href="#">Page 2</a>
                            </li>
                            <li>
                                <a href="#">Page 3</a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>

                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="/Logout" class="download">Logout</a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content">
                <div>
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                </div>

                @yield('container')

            </div>
        </div>

        <!-- Script -->    
        <script type="text/javascript" src="{{ asset('js/scriptSidebar.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    </body>
@else
    <div class="row align-items-center" style="padding-top: 50px; padding-bottom: 25px;">
        <div class="col-8 mx-auto">
            <div class="card shadow-lg" style="border-radius: 15px;padding: 5% 5%;">
                <center>
                    <img class="img img-fluid" src="{{ asset('img/Time Out Vector Image.png') }}" /><br /><br />
                    <h1 class="f-24 fw-500 c-reguler title mb-5">
                        Sesi Anda telah Berakhir
                    </h1>
                    <h4 class="f-24 fw-500 c-reguler title mb-5">
                        Mohon untuk melakukan <a href="/Login" class="btn btn-primary">Login</a> kembali 
                    </h4>
                </center>
            </div>
        </div>
    </div>
@endif

</html>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#sidebarCollapse').on('click', function() {
    //         $('#sidebar').toggleClass('active');
    //     });
    // });
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
