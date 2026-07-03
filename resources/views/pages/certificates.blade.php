@extends('layouts.master')
@section('content')

<main id="main">
    @include('partials.breadcrumbs', ['title' => 'Our Certifications'])

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row portfolio-container" data-aos="fade-up">
                @foreach($data as $cert)
                @php $certImage = $cert['media'][0]['path'] ?? null; @endphp
                @if(!$certImage) @continue @endif
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('storage/'.$certImage) }}" class="img-fluid" alt="{{ $cert['title'] }}" loading="lazy" decoding="async">
                    <div class="portfolio-info">
                        <h4>{{$cert['title']}}</h4>
                        <p>{{$cert['description']}}</p>
                        <a href="{{ asset('storage/'.$certImage) }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{$cert['description']}}">
                            <i class="bx bx-plus" aria-hidden="true"></i>
                            <span class="visually-hidden">View larger</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection
