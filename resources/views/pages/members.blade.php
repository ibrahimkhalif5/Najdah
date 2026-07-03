@extends('layouts.master')

@section('content')
<main id="main">
    @include('partials.breadcrumbs', ['title' => __('massages.board')])

    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>@lang('massages.success') <strong>@lang('massages.board')</strong></h2>
            </div>
            <div class="row">
                @foreach($members as $row)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                        <div class="member-img">
                            <img src="{{ asset('storage/'.$row->photo) }}" class="img-fluid" alt="{{ $row->fullname }}" loading="lazy" decoding="async">
                            <div class="social">
                                <a href="" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                                <a href="" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{$row->fullname}}</h4>
                            <p class="qualification">{{$row->qualification}}</p>
                            <span class="designation">{{$row->designation}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
