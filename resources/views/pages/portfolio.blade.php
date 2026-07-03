@extends('layouts.master')
@section('content')

<main id="main">
    @include('partials.breadcrumbs', ['title' => __('massages.portfolio')])

    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <div class="row">
                @foreach($cat as $row)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                        <a href="/" class="logo me-auto">
                            <img src="{{ asset('storage/'.$row->images) }}" alt="{{ $row->category }}" class="img-fluid" loading="lazy" decoding="async">
                        </a>
                        <h4><a href="">{{$row->category}}</a></h4>
                        <br>
                        <a href="{{ route('projects', ['locale' => app()->getLocale()]) }}" class="btn-cta-primary">@lang('massages.view')</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection
