@extends('layouts.master')
@section('content')


<body>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>project Details</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li>Portfolio details</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/img/portfolio/mosq.jpg') }}" alt="">
                                </div>

                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/img/portfolio/mos1.JPG') }}" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('assets/img/portfolio/mos.PNG') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Title</strong>$project->category</li>
                                <li><strong>Location</strong>: kkk</li>
                                <li><strong>Project date</strong>: 01 March, 2020</li>
                                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->


</body>
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <h3>List of Projects</h3>

        <table id="example" class="display" style="width:100%; border: 1px solid black; background-color: white;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Project Title</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Cost</th>

                    <th>Start Date</th>
                    <th>Completed Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project as $row)
                <tr>
                    <th>{{ $loop->index +1 }}</th>
                    <td>{{$row->category->category}}</td>
                    <td>{{$row->location}}</td>
                    <td>{{$row->status}}</td>
                    <td>{{$row->project_cost}}</td>
                    <td>{{$row->start_date}}</td>
                    <td>{{$row->completed_date}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Project Title</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Cost</th>
                    <th>Start Date</th>
                    <th>Completed Date</th>
                </tr>
            </tfoot>
        </table>

    </div>


</section>
@endsection