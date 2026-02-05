<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@lang('massages.najdah')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slider.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">


</head>

<body>


    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center" bg-green>

            <!-- <h1 class="logo me-auto"><a href="index.html"><span>Naj</span>dah</a></h1> -->

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/logo1.png') }}" alt=""
                    class="img-fluid"></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}" class="active">
                            @lang('massages.home')</a></li>

                    <li class="dropdown"><a href="#"><span> @lang('massages.about')</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('about-us',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">
                                    @lang('massages.aboutus')
                                </a></li>
                            <li><a href="{{route('members',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">
                                    @lang('massages.board')
                                </a></li>
                            <li><a href="{{route('contact-us',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">
                                    @lang('massages.visit')
                                </a></li>

                        </ul>
                    </li>

                    <li><a href="{{route('portfolio',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">
                            @lang('massages.portfolio')</a>
                    </li>
                    <li><a href="{{route('gallary',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">
                            @lang('massages.gallary')</a>
                    </li>

                    <!-- <li><a href="#"
                            onclick="document.getElementById('paypal-form').submit();">@lang('massages.donation')</a>
                    </li> -->

                    <li><a href="{{ url('/admin/login') }}">
                            @lang('massages.admin')
                        </a></li>

                    <!-- <li><a href="{{route('portal',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">
                            @lang('massages.portal')</a>
                    </li> -->
                    <!-- <li class="dropdown">
                        <a href="#"><span>{{ app()->getLocale() == 'ar' ? 'Arabic' : (app()->getLocale() == 'tr' ? 'Turkish' : 'English') }}</span>
                            <i class=" bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'en']) }}">English</a>
                            </li>
                            <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'ar']) }}">Arabic</a>
                            </li>
                            <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'tr']) }}">Turkish</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="dropdown">
                        <a href="#">
                            @if (app()->getLocale() == 'ar')
                            <img src="{{ asset('assets/img/flag/arabic.png')}}" alt="Arabic Flag" height="20"
                                width="30"> @lang('massages.Arabic')
                            @elseif (app()->getLocale() == 'tr')
                            <img src="{{ asset('assets/img/flag/turkey.png')}}" alt="Turkish Flag" height="20"
                                width="30"> @lang('massages.turkey')
                            @else
                            <img src="{{ asset('assets/img/flag/usa.png')}}" alt="English Flag" height="20" width="30">
                            @lang('massages.english')
                            @endif
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'en']) }}">
                                    <img src="{{ asset('assets/img/flag/usa.png')}}" alt="English Flag" height="20"
                                        width="30"> @lang('massages.english')</a>
                            </li>
                            <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'ar']) }}">
                                    <img src="{{ asset('assets/img/flag/arabic.png')}}" alt="Arabic Flag" height="20"
                                        width="30"> @lang('massages.Arabic')</a>
                            </li>
                            <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'tr']) }}">
                                    <img src="{{ asset('assets/img/flag/turkey.png')}}" alt="Turkish Flag" height="20"
                                        width="30"> @lang('massages.turkey')</a>
                            </li>
                        </ul>
                    </li>






                </ul>

                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links d-flex">
                <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
            </div>

        </div>
    </header><!-- End Header -->
    <!-- ======= Header ======= -->

    @yield('content')
    <!-- donation form -->

    <!-- <form action="https://www.paypal.com/donate" method="post" target="_top" id="paypal-form">
        <input type="hidden" name="hosted_button_id" value="WW4WZ8UEC2KK6" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit"
            title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button"
            style="display: none;" />
    </form> -->


    <form action="https://www.paypal.com/donate" method="post" target="_top" id="paypal-form">
        <input type="hidden" name="hosted_button_id" value="WW4WZ8UEC2KK6" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit"
            title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_KE/i/scr/pixel.gif" width="1" height="1" />
    </form>



    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>@lang('massages.contact')</h3>
                        <p>
                            @lang('massages.mandera') <br>
                            @lang('massages.wajir') <br>
                            @lang('massages.marsabit') <br>
                            @lang('massages.tana') <br>
                            @lang('massages.western') <br>
                            @lang('massages.nakuru') <br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>@lang('massages.links')</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.home')</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="/{{route('about-us',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.about')</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{route('portfolio',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.portfolio')</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="{{route('gallary',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.gallary')</a>

                                <!-- <li><i class="bx bx-chevron-right"></i> <a href="/portal">@lang('massages.portal')</a></li> -->
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>@lang('massages.services')</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="#">@lang('massages.construction-of-education')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.provision-of-food')</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.workshop')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.medical')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.agriculture')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.water')</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>@lang('massages.news')</h4>
                        <form action="" method="">
                            <input type="email" name="email" disabled><input type="submit" value="Subscribe" disabled>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; @lang('massages.copyright') <strong><span>Sochoy Tech Limited</span></strong>.
                    @lang('massages.right')<script>
                    document.write(new Date().getFullYear());
                    </script>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
                    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- datatabel-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
    </script>




    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

    <!-- 
    <script>
    $(document).ready(function() {
        $("#carouselExampleIndicators").carousel({
            interval: 3000,
            pause: "hover"
        });
    });
    </script> -->

    <script>
    $(document).ready(function() {
        $("#donationButton").click(function() {
            $("#donationModal").modal();
        });
    });
    </script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>


</body>



</html>