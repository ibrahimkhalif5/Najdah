@extends('layouts.master')
@section('content')


<body>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@lang('massages.gallary')</h2>
                    <ol>
                        <li><a
                                href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.home')</a>
                        </li>
                        <li>@lang('massages.gallary')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <!-- <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div> -->

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

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


</body>
@endsection