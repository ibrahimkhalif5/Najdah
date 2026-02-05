@extends('layouts.master')
@section('content')

<body>

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>@lang('massages.visit')</h2>
                    <ol>
                        <li><a
                                href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}">@lang('massages.home')</a>
                        </li>
                        <li>@lang('massages.visit')</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <div class="map-section">
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4084757.642546393!2d36.2881374946571!3d1.1453754566632146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1673437941469!5m2!1sen!2ske"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <section id="contact" class="contact">
            <div class="container">

                <div class="row justify-content-center" data-aos="fade-up">

                    <div class="col-lg-10">

                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>@lang('massages.location'):</h4>
                                    <p>@lang('massages.location1')<br>@lang('massages.location2')</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-envelope"></i>
                                    <h4>@lang('massages.email'):</h4>
                                    <p>@lang('massages.email1')</p>
                                </div>

                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="bi bi-phone"></i>
                                    <h4>@lang('massages.call'):</h4>
                                    <p>+@lang('massages.call1')<br>@lang('massages.call2')</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row mt-5 justify-content-center" data-aos="fade-up">

                    <div class="col-lg-10">
                        <form action="{{route('message',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                            method="post">
                            {{ csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="@lang('massages.name')" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="@lang('massages.email')" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="@lang('massages.subject')" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5"
                                    placeholder="@lang('massages.mess')" required></textarea>
                            </div>

                            <div class="text-center"><button type="submit">@lang('massages.send')</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


</body>
@endsection