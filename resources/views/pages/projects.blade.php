@extends('layouts.master')
@section('content')

<main id="main">
    @include('partials.breadcrumbs', ['title' => __('massages.project'), 'subtitle' => __('massages.portfolio'), 'subtitleUrl' => route('portfolio', ['locale' => app()->getLocale()])])

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            @foreach($pro as $project)
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            @if($project->media->isNotEmpty())
                            <img src="{{ asset('storage/'.$project->media->first()->path) }}" alt="{{ $project->title }}" class="img-fluid" loading="lazy" decoding="async">
                            @endif
                        </div>
                        <h2 class="entry-title">{{ $project->title }}</h2>
                        <div class="entry-content">
                            <blockquote>
                                <ul>
                                    <li><strong>@lang('massages.project'):</strong> {{$project->description }}</li>
                                    <li><strong>Location:</strong> {{$project->location}}</li>
                                    <li><strong>Amount (Ksh):</strong> {{ number_format($project->amount, 2) }}</li>
                                    <li><strong>Status:</strong> {{$project->status}}</li>
                                </ul>
                            </blockquote>
                        </div>
                    </article>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('projects.more', ['locale' => app()->getLocale()]) }}" class="btn-about">
                        {{ __('Load More') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
