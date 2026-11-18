<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="../../../assets/site/img/logo/logo7.png">

        <!-- Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/admin/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
       
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('assets/admin/demo/demo.css') }}" rel="stylesheet" />       

    </head>

    <body class="">
        <div class="wrapper">
            <!-- Side Bar -->
            <div class="sidebar" data-color="white" data-active-color="danger">
                <div class="logo">
                    <a href="{{ route('site.home') }}" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="../../../assets/admin/img/logo7.png">
                    </div>
                    <!-- <p>CT</p> -->
                    </a>
                    <a href="{{ route('site.home') }}" class="simple-text logo-normal">
                    BarberShopOnline
                    </a>
                </div>
                @include('layouts.nav_admin')

            </div>
            <!-- End Side Bar -->

            <!-- Main Panel -->
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                    <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                </nav>
                <!-- End Navbar -->

                <!-- Content -->
                <div class="content">
                    {{ $slot }}
                </div>

                <!-- End Content -->
                
                <footer class="footer footer-black  footer-white ">
                    <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                        <ul>
                            <li>BarberShop Online</li>
                        </ul>
                        </nav>
                        <div class="credits ml-auto">
                        <span class="copyright">
                            © <script>
                            document.write(new Date().getFullYear())
                            </script>, made by Pedro Ribeiro
                        </span>
                        </div>
                    </div>
                    </div>
                </footer>
            </div>

        </div>

        <!--   Core JS Files   -->
        <script src="assets/admin/js/core/jquery.min.js"></script>
        <script src="assets/admin/js/core/popper.min.js"></script>
        <script src="assets/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="assets/admin/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/admin/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/admin/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
        <script src="assets/admin/demo/demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>
