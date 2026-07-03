@extends('layouts.master')

@section('content')
<main id="main">
    @include('partials.breadcrumbs', ['title' => __('massages.about')])

    <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2>@lang('massages.our-organization')</h2>
                    <h4>@lang('massages.najdah1')</h4>
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="logo me-auto">
                        <img src="{{ asset('assets/img/test7.JPG') }}" alt="Our organization" class="img-fluid" loading="lazy" decoding="async" width="600" height="375">
                    </a>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                    <p>@lang('massages.najdah-history')</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>@lang('massages.strategic')</h2>
            </div>
            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">
                            @lang('massages.vision')
                            <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p>@lang('massages.vision-p')</p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">
                            @lang('massages.mission')
                            <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>@lang('massages.mission-p')</p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i>
                        <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">
                            @lang('massages.values')
                            <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i>
                        </a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                @lang('massages.values1')
                            <ol>
                                <li>@lang('massages.values2')</li>
                                <li>@lang('massages.values3')</li>
                                <li>@lang('massages.values4')</li>
                                <li>@lang('massages.values5')</li>
                                <li>@lang('massages.values6')</li>
                                <li>@lang('massages.values7')</li>
                                <li>@lang('massages.values8')</li>
                                <li>@lang('massages.values9')</li>
                            </ol>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="org-structure" class="org-structure">
        <div class="container-fluid text-center text-white">
            <div class="d-flex justify-content-center align-items-center">
                <h3><b>@lang('massages.structure')</b></h3>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="card">
            <img class="card-img-top" src="{{ asset('assets/img/org.PNG') }}" alt="Organizational structure" loading="lazy" decoding="async" width="600" height="338">
            <div class="card-body">
                <p class="card-text">@lang('massages.structure1')</p>
            </div>
        </div>
    </div>

    <section id="team" class="team section-bg">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>@lang('massages.work')</h2>
                <p>@lang('massages.work1')</p>
            </div>
            <div class="row">
                @php
                $regions = [
                    ['img' => 'mdr.png', 'name' => 'massages.mandera'],
                    ['img' => 'marsa.png', 'name' => 'massages.marsabit'],
                    ['img' => 'nakuru.jpg', 'name' => 'massages.nakuru'],
                    ['img' => 'wajir.jpg', 'name' => 'massages.wajir'],
                    ['img' => 'isiolo.jpg', 'name' => 'massages.isiolo'],
                    ['img' => 'tana.jpg', 'name' => 'massages.tana'],
                    ['img' => 'kisumu.jpg', 'name' => 'massages.kisumu'],
                ];
                @endphp
                @foreach($regions as $region)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="{{ asset('assets/img/team/'.$region['img']) }}" class="img-fluid" alt="@lang($region['name']) team photo" loading="lazy" decoding="async">
                        </div>
                        <div class="member-info">
                            <h4>@lang($region['name'])</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="skills" class="skills">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>@lang('massages.success') <strong>@lang('massages.success1')</strong></h2>
            </div>
            <div class="row skills-content">
                <div class="col-lg-6" data-aos="fade-up">
                    @php
                    $skillsLeft = [
                        ['label' => 'massages.student', 'val' => '5000+', 'width' => '90'],
                        ['label' => 'massages.aid', 'val' => '4500+', 'width' => '80'],
                        ['label' => 'massages.worship', 'val' => '30', 'width' => '45'],
                    ];
                    $skillsRight = [
                        ['label' => 'massages.water', 'val' => '20', 'width' => '40'],
                        ['label' => 'massages.agriculture', 'val' => '10000+', 'width' => '100'],
                    ];
                    @endphp
                    @foreach($skillsLeft as $skill)
                    <div class="progress">
                        <span class="skill">@lang($skill['label']) <i class="val">{{ $skill['val'] }}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill['width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    @foreach($skillsRight as $skill)
                    <div class="progress">
                        <span class="skill">@lang($skill['label']) <i class="val">{{ $skill['val'] }}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill['width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">@lang('massages.cert')</li>
                    </ul>
                </div>
            </div>
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
