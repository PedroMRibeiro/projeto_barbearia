<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'BarberShopOnline') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/site/img/logo/logo7.png') }}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animated-headline.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text" style="text-align: center;">
                    <img src="{{ asset('assets/site/img/logo/logo7.png') }}" alt="" style="width: 100px; height: auto; max-width: none;">
                </div>
            </div>
        </div>
    </div>

    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area header-transparent pt-20">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">

                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{ route('site.home')}}"><img src="{{ asset('assets/site/img/logo/logo7.png') }}" alt="" style="width: 130px; height: "></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            @if(auth()->check())
                                                <li>
                                                    <a href="{{ route('dashboard')}}">Admin</a>
                                                </li>
                                            @endif
                                            <li class="{{ Route::currentRouteName() == 'site.home' ? 'active' : '' }}">
                                                <a href="{{ route('site.home')}}">Home</a>
                                            </li>
                                            <li class="{{ Route::currentRouteName() == 'site.about' ? 'active' : '' }}">
                                                <a href="{{ route('site.about')}}">Sobre</a>
                                            </li>
                                            <li class="{{ Route::currentRouteName() == 'site.services' ? 'active' : '' }}" >
                                                <a href="{{ route('site.services')}}">Serviços</a>
                                            <li class="{{ Route::currentRouteName() == 'site.contacts' ? 'active' : '' }}" >
                                                <a href="{{ route('site.contacts')}}">Contactos</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                    <a href="{{ route('site.appointmentsStep1')}}" class="btn header-btn">Marcações</a>
                                </div>
                            </div>
                        </div>   
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="{{ asset('assets/site/img/gallery/footer_bg.png') }}">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{ asset('assets/site/img/logo/logo2_footer.png') }}" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Para qualquer dúvida não hesite em contactar-nos.</p>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <h4><span>+351 </span>960 000 000</h4>
                                    <p>a21489@eshm.edu.pt</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <ul>
                                        <li><a href="{{ route('site.contacts')}}">Contactos</a></li>
                                        <li><a href="{{ route('footer.privacy')}}">Política Privacidade</a></li>
                                        <li><a href="{{ route('footer.term')}}">Termos e condições</a></li>
                                        <li><a href="{{ route('footer.cookie')}}">Cookies</a></li>
                                        <li><a href="{{ route('dashboard')}}">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | BarberShopOnline
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{ asset('assets/site/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/site/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/site/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets/site/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('assets/site/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('assets/site/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.sticky.js') }}"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('assets/site/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assets/site/js/contact.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/site/js/jquery.ajaxchimp.min.js') }}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('assets/site/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/site/js/main.js') }}"></script>
    
    </body>
</html>