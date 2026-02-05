@extends('layouts.master')

@section('content')

<body>

    <!-- ======= Header ======= -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@lang('massages.about')</h2>
                    <ol>
                        <li><a
                                href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.home')</a>
                        </li>
                        <li>@lang('massages.about')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2>@lang('massages.our-organization')</h2>
                        <h4>@lang('massages.najdah1')</h4>
                        <a href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                            class="logo me-auto "><img src="{{ asset('assets/img/test7.JPG') }}" alt=""
                                class="img-fluid"></a>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                        <p>

                            @lang('massages.najdah-history')

                        </p>

                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>@lang('massages.strategic')</h2>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-1">@lang('massages.vision') <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    @lang('massages.vision-p')
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-2" class="collapsed">@lang('massages.mission')
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    @lang('massages.mission-p')
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">@lang('massages.values')
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    @lang('massages.values1')
                                <ol>
                                    <li> @lang('massages.values2')</li>
                                    <li>@lang('massages.values3')</li>
                                    <li>@lang('massages.values4')</li>
                                    <li>@lang('massages.values5')</li>
                                    <li>@lang('massages.values6')</li>
                                    <li>@lang('massages.values7')</li>
                                    <li>@lang('massages.values8')</li>
                                    <li>@lang('massages.values9')</li>

                                </ol>
                                </p>

                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

        <!-- ======= Organizational structure ======= -->
        <section id="header" class="header " style="background-color: 7D0552;">


            <div class="container-fluid text-center text-white ">
                <div class="d-flex justify-content-center align-items-center">
                    <h3><b>@lang('massages.structure')</b></h3>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <div class="container">
            <div class="card">

                <img class="card-img-top" src="{{ asset('assets/img/org.PNG') }}" alt="Card image">
                <div class="card-body">
                    <p class="card-text">
                        @lang('massages.structure1')
                    </p>
                </div>
            </div>
        </div>
        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>@lang('massages.work')</h2>
                    <p>@lang('massages.work1')</p>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/mdr.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.mandera')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/marsa.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.marsabit')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/nakuru.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.nakuru')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/wajir.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.wajir')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/isiolo.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.isiolo')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/tana.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.tana')</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{asset('assets/img/team/kisumu.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>@lang('massages.kisumu')</h4>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Our Team Section -->

        <!-- ======= Our Skills Section ======= -->
        <section id="skills" class="skills">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>@lang('massages.success') <strong>@lang('massages.success1')</strong></h2>
                    <p></p>
                </div>

                <div class="row skills-content">

                    <div class="col-lg-6" data-aos="fade-up">

                        <div class="progress">
                            <span class="skill">@lang('massages.student') <i class="val">5000+</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">@lang('massages.aid') <i class="val">4500+</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">@lang('massages.worship') <i class="val">30</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                        <div class="progress">
                            <span class="skill">@lang('massages.water') <i class="val">20</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">@lang('massages.agriculture') <i class="val">10000+</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>
        </section><!-- End Our Skills Section -->

        <!-- certification section start here -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">@lang('massages.cert')</li>

                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach($data as $cert)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset('storage/'.$cert['images']) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{$cert['title']}}</h4>
                            <p>{{$cert['description']}}</p>
                            <a href="{{ asset('storage/'.$cert['images']) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link" title="{{$cert['description']}}"><i
                                    class="bx bx-plus"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </section><!-- End Portfolio Section -->
        <!-- certification end here -->

    </main><!-- End #main -->
</body>
@endsection