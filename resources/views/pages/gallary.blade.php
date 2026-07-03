@extends('layouts.master')
@section('content')

<main id="main">
    @include('partials.breadcrumbs', ['title' => __('massages.gallary')])

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row portfolio-container" data-aos="fade-up">
                @foreach($data as $gallary)
                @foreach($gallary['images'] as $image)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('storage/'.$image) }}" class="img-fluid" alt="{{ $gallary['title'] }}" loading="lazy" decoding="async">
                    <div class="portfolio-info">
                        <h4>{{$gallary['title']}}</h4>
                        <p>{{$gallary['description']}}</p>
                        <a href="{{ asset('storage/'.$image) }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{$gallary['description']}}">
                            <i class="bx bx-plus" aria-hidden="true"></i>
                            <span class="visually-hidden">View larger</span>
                        </a>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection
