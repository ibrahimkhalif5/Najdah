@extends('layouts.master')
@section('content')


<body>
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Our Certifications</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Certificates</li>
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

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


</body>
@endsection