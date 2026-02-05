@extends('layouts.master')

<body>



    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@lang('massages.board')</h2>
                    <ol>
                        <li><a
                                href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.home')</a>
                        </li>
                        <li>@lang('massages.board')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Our Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>@lang('massages.success') <strong>@lang('massages.board')</strong></h2>

                </div>

                <div class="row">
                    @foreach($member as $row)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="{{ asset('storage/'.$row->photo) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{$row->fullname}}</h4>
                                <h7>{{$row->qualification}}</h7>
                                <span>{{$row->designation}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Our Team Section -->

    </main><!-- End #main -->



</body>