@extends('layouts.master')
@section('content')

<body>

    <!-- ======= Hero Section ======= -->


    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach($data as $key => $slider)
                @foreach($slider['images'] as $imgKey => $image)
                <div class="carousel-item @if($key == 0 && $imgKey == 0) active @endif">
                    <img src="{{ asset('storage/'.$image) }}" class="d-block w-100">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">

                            <h2>{{$slider['title']}}</h2>
                            <p> {{$slider['description']}} </p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        </div>


    </section><!-- End Hero -->

    <main id="main">
        <!-- banner pop up -->

        <!-- <div id="advertisement" class="popup">
            <img src="{{ asset('assets/img/ads.jpeg') }}" alt="Advertisement banner">
            <button>&times;</button>
        </div> -->



        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h3>@lang('massages.h2-chairman')</h3>
                        <h4>@lang('massages.h4-founder')</h4>
                        <a href="#" class="logo me-auto "><img src="{{ asset('assets/img/chair.PNG') }}" alt=""
                                class="img-fluid"></a>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                        <p>
                            @lang('massages.p-welcome')
                        </p>

                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->
        <!-- <div id="advertisement">
            <img src="{{ asset('assets/img/ads.jpeg') }}" alt="Advertisement banner">
            <button>X</button>
        </div> -->





        <!-- ======= Breadcrumbs ======= -->
        <section id="header" class="header " style="background-color: #7D0552;">


            <div class="container-fluid text-center text-white ">
                <div class="d-flex justify-content-center align-items-center">
                    <h3><b>@lang('massages.project-header')</b></h3>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/educ.JPG') }}" alt=""
                                    class="img-fluid"></a>
                            <h4><a href="">@lang('massages.construction-of-education')</a></h4>
                            <br>
                            <div class="btn btn-danger">
                                <a href="{{ route('projects', ['locale'=>app()->getLocale() == 'en'? 'en':'ar']) }}"
                                    class="btn-buy">@lang('massages.view')</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/money.JPG') }}" alt=""
                                    class="img-fluid"></a>
                            <h4><a href="">@lang('massages.provision-of-food')</a></h4>
                            <br>
                            <div class="btn btn-danger">
                                <a href="{{route('projects',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                                    class="btn-buy">@lang('massages.view')</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/medic.JPG') }}" alt=""
                                    class="img-fluid"></a>
                            <h4><a href="">@lang('massages.workshop')</a></h4>
                            <br>
                            <div class="btn btn-danger">
                                <a href="{{route('projects',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                                    class="btn-buy">@lang('massages.view')</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/sem.JPG') }}" alt=""
                                    class="img-fluid"></a>
                            <h4><a href="">@lang('massages.medical')</a></h4>
                            <br>
                            <div class="btn btn-danger">
                                <a href="{{route('projects',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                                    class="btn-buy">@lang('massages.view')</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/goat.JPG') }}" alt=""
                                    class="img-fluid"></a>
                            <h4><a href="">@lang('massages.agriculture')</a></h4>
                            <br>
                            <div class="btn btn-danger">
                                <a href="{{route('projects',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                                    class="btn-buy">@lang('massages.view')</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <a href="/" class="logo me-auto "><img src="{{ asset('assets/img/water.JPG') }}" alt=""
                                    class="img-fluid"></a>
                            <h4><a href="">@lang('massages.water')</a></h4>
                            <br>
                            <div class="btn btn-danger">
                                <a href="{{route('projects',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                                    class="btn-buy">@lang('massages.view')</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->


        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">@lang('massages.gallary')</li>

                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach($data as $gallary)
                    @foreach($gallary['images'] as $image)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset('storage/'.$image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$gallary['title']}}</h4>
                            <p>{{$gallary['description']}}</p>
                            <a href="{{ asset('storage/'.$image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="{{$gallary['description']}}"><i
                                    class="bx bx-plus"></i></a>

                        </div>
                    </div>
                    @endforeach
                    @endforeach




                </div>

            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Our Clients Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>@lang('massages.partners')</h2>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/clients/hass.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/clients/noor.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/clients/kur.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-8 d-flex align-items-fit">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/clients/care1.png') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Our Team Section -->

    </main><!-- End #main -->

    <!-- banner
    <script>
    // Get the advertisement element
    var advertisement = document.getElementById('advertisement');

    // Show the advertisement
    advertisement.style.display = 'block';

    // Add an event listener to the close button
    var closeButton = advertisement.querySelector('button');
    closeButton.addEventListener('click', function() {
        advertisement.remove();
    });
    </script> -->

    <!-- new banner -->

    <script>
    // Add an event listener for page load
    window.addEventListener('load', function() {
        // Get the advertisement modal element
        var modal = document.getElementById('advertisement');
        // Display the modal
        modal.style.display = 'block';
        // Add an event listener for the close button
        var closeButton = modal.querySelector('button');
        closeButton.addEventListener('click', function() {
            // Hide the modal
            modal.style.display = 'none';
        });
    });
    </script>

</body>
@endsection