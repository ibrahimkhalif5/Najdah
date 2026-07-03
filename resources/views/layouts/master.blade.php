<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@lang('massages.najdah')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <div id="page-loader">
        <div class="loader-content">
            <div class="loader-ring loader-ring-outer"></div>
            <div class="loader-ring loader-ring-inner"></div>
            <div class="loader-logo">
                <img src="{{ asset('assets/img/logo1.png') }}" alt="Najdah" width="100" height="26" loading="lazy">
            </div>
        </div>
    </div>
    <div id="topbar" class="topbar">
        <div class="container d-flex align-items-center justify-content-end">
            <div class="topbar-datetime">
                <span class="topbar-date" id="frontend-date"></span>
                <span class="topbar-sep"></span>
                <span class="topbar-time" id="frontend-time"></span>
            </div>
        </div>
    </div>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <a href="/" class="logo me-auto">
                <img src="{{ asset('assets/img/logo1.png') }}" alt="Najdah Logo" class="img-fluid" width="180" height="46" loading="lazy" decoding="async">
            </a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="active">@lang('massages.home')</a></li>
                    <li class="dropdown">
                        <a href="#"><span>@lang('massages.about')</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('about-us', ['locale' => app()->getLocale()]) }}">@lang('massages.aboutus')</a></li>
                            <li><a href="{{ route('members', ['locale' => app()->getLocale()]) }}">@lang('massages.board')</a></li>
                            <li><a href="{{ route('contact-us', ['locale' => app()->getLocale()]) }}">@lang('massages.visit')</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}">@lang('massages.portfolio')</a></li>
                    <li><a href="{{ route('gallary', ['locale' => app()->getLocale()]) }}">@lang('massages.gallary')</a></li>
                    <li><a href="{{ url('/admin/login') }}">@lang('massages.admin')</a></li>
                    @include('partials.language-switcher')
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

            @include('partials.social-links')
        </div>
    </header>

    @yield('content')

    <form action="https://www.paypal.com/donate" method="post" target="_top" id="paypal-form" class="d-none">
        <input type="hidden" name="hosted_button_id" value="WW4WZ8UEC2KK6" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit"
            title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_KE/i/scr/pixel.gif" width="1" height="1" loading="lazy" />
    </form>

    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>@lang('massages.contact')</h3>
                        <p>
                            @lang('massages.mandera')<br>
                            @lang('massages.wajir')<br>
                            @lang('massages.marsabit')<br>
                            @lang('massages.tana')<br>
                            @lang('massages.western')<br>
                            @lang('massages.nakuru')
                        </p>
                        <div class="footer-email">
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=info@najdah.org" target="_blank" class="footer-email-link">
                                <i class="bi bi-envelope-fill"></i> info@najdah.org
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>@lang('massages.links')</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">@lang('massages.home')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('about-us', ['locale' => app()->getLocale()]) }}">@lang('massages.about')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('portfolio', ['locale' => app()->getLocale()]) }}">@lang('massages.portfolio')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('gallary', ['locale' => app()->getLocale()]) }}">@lang('massages.gallary')</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>@lang('massages.services')</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.construction-of-education')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.provision-of-food')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.workshop')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.medical')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.agriculture')</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">@lang('massages.water')</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>@lang('massages.news')</h4>
                        <form action="" method="">
                            <input type="email" name="email" disabled placeholder="@lang('massages.email')">
                            <input type="submit" value="Subscribe" disabled>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; @lang('massages.copyright') <strong><span>Sochoy Tech Limited</span></strong>. @lang('massages.right')
                    <span id="current-year"></span>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter" aria-label="Twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook" aria-label="Facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram" aria-label="Instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus" aria-label="Skype"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin" aria-label="LinkedIn"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="Back to top">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
    document.getElementById('current-year') && (document.getElementById('current-year').textContent = new Date().getFullYear());
    </script>

    @stack('scripts')
</body>
</html>
