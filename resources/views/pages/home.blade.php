@extends('layouts.master')
@section('content')

<!-- ======= Hero Banner Slider (Gallery Images) ======= -->
<section id="hero" class="hero-section">
    @if(count($data) > 0)
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            @foreach($data as $gallary)
            @php $firstImage = $gallary['images'][0] ?? null; @endphp
            @if($firstImage)
            <div class="swiper-slide">
                <picture>
                    <source srcset="{{ asset('storage/'.$firstImage) }}" media="(min-width: 769px)">
                    <img src="{{ asset('storage/'.$firstImage) }}"
                         alt="{{ $gallary['title'] }}"
                         class="hero-image"
                         loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                         fetchpriority="{{ $loop->first ? 'high' : 'auto' }}"
                         decoding="async">
                </picture>
                <div class="hero-overlay"></div>
                <div class="hero-container">
                    <div class="hero-content">
                        <span class="hero-badge">{{ $gallary['title'] }}</span>
                        @if($gallary['description'])
                        <p class="hero-description">{{ Str::limit($gallary['description'], 120) }}</p>
                        @endif
                        <div class="hero-actions">
                            <a href="{{ route('gallary', ['locale' => app()->getLocale()]) }}" class="btn-hero-primary">
                                @lang('massages.gallary') <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="swiper-pagination hero-pagination"></div>
        <div class="swiper-button-prev hero-nav hero-nav-prev"></div>
        <div class="swiper-button-next hero-nav hero-nav-next"></div>
    </div>
    @else
    <div class="hero-fallback">
        <img src="{{ asset('assets/img/Logo1.png') }}" alt="Najdah" class="hero-fallback-logo" loading="eager">
        <div class="hero-container">
            <div class="hero-content">
                <h2 class="hero-title">@lang('massages.najdah')</h2>
                <p class="hero-description">@lang('massages.najdah1')</p>
                <div class="hero-actions">
                    <a href="{{ route('about-us', ['locale' => app()->getLocale()]) }}" class="btn-hero-primary">@lang('massages.aboutus')</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

<!-- ======= Impact Statistics ======= -->
<section id="stats" class="stats-section">
    <div class="container" data-aos="fade-up">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="stat-number"><span class="counter" data-target="5000">0</span>+</div>
                    <div class="stat-label">@lang('massages.student')</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="stat-number"><span class="counter" data-target="4500">0</span>+</div>
                    <div class="stat-label">@lang('massages.aid')</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-number"><span class="counter" data-target="30">0</span></div>
                    <div class="stat-label">@lang('massages.worship')</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-tree"></i>
                    </div>
                    <div class="stat-number"><span class="counter" data-target="10000">0</span>+</div>
                    <div class="stat-label">@lang('massages.agriculture')</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= About Section ======= -->
<section id="about-us" class="about-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image-wrapper">
                    <div class="profile-circle">
                        <img src="{{ asset('assets/img/chair.PNG') }}" alt="Chairperson" loading="lazy" decoding="async">
                        <div class="profile-ring-dotted"></div>
                    </div>
                    <div class="about-experience-badge">
                        <span class="years">Since 2013</span>
                        <span class="text">Serving Communities</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                <div class="about-content">
                    <span class="section-badge">@lang('massages.aboutus')</span>
                    <h2>@lang('massages.h2-chairman')</h2>
                    <h4>@lang('massages.h4-founder')</h4>
                    <p>@lang('massages.p-welcome')</p>
                    <div class="about-features">
                        <div class="about-feature">
                            <i class="bi bi-check-circle"></i>
                            <span>@lang('massages.mandera')</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle"></i>
                            <span>@lang('massages.wajir')</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle"></i>
                            <span>@lang('massages.marsabit')</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle"></i>
                            <span>@lang('massages.tana')</span>
                        </div>
                    </div>
                    <a href="{{ route('about-us', ['locale' => app()->getLocale()]) }}" class="btn-about">
                        @lang('massages.aboutus') <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Services Section (Slider) ======= -->
<section id="services" class="services-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">@lang('massages.services')</span>
            <h2>@lang('massages.project-header')</h2>
            <p>Empowering communities through sustainable development programs across Northern Kenya.</p>
        </div>
    </div>

    @php
    $services = [
        ['img' => 'educ.JPG', 'title' => 'massages.construction-of-education', 'icon' => 'bi bi-book'],
        ['img' => 'money.JPG', 'title' => 'massages.provision-of-food', 'icon' => 'bi bi-basket'],
        ['img' => 'medic.JPG', 'title' => 'massages.workshop', 'icon' => 'bi bi-tools'],
        ['img' => 'sem.JPG', 'title' => 'massages.medical', 'icon' => 'bi bi-heart-pulse'],
        ['img' => 'goat.JPG', 'title' => 'massages.agriculture', 'icon' => 'bi bi-flower1'],
        ['img' => 'water.JPG', 'title' => 'massages.water', 'icon' => 'bi bi-droplet'],
    ];
    @endphp

    <div class="swiper services-slider">
        <div class="swiper-wrapper">
            @foreach($services as $service)
            <div class="swiper-slide">
                <div class="service-card">
                    <div class="service-image">
                        <img src="{{ asset('assets/img/'.$service['img']) }}" alt="{{ $service['title'] }}" loading="lazy" decoding="async">
                        <div class="service-icon">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                    </div>
                    <div class="service-body">
                        <h3>@lang($service['title'])</h3>
                        <a href="{{ route('projects', ['locale' => app()->getLocale()]) }}" class="service-link">
                            @lang('massages.view') <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination services-pagination"></div>
    </div>

    <div class="services-navigation">
        <button class="services-btn-prev" aria-label="Previous">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="services-btn-next" aria-label="Next">
            <i class="bi bi-chevron-right"></i>
        </button>
    </div>
</section>

<!-- ======= CTA Section ======= -->
<section id="cta" class="cta-section">
    <div class="container" data-aos="fade-up">
        <div class="cta-content">
            <h2>Join Us in Making a Difference</h2>
            <p>Your support helps us provide education, healthcare, and hope to those who need it most.</p>
            <div class="cta-actions">
                <a href="{{ route('donate', ['locale' => app()->getLocale()]) }}" class="btn-cta-primary">
                    <i class="bi bi-heart"></i> Donate Now
                </a>
                <a href="{{ route('projects', ['locale' => app()->getLocale()]) }}" class="btn-cta-secondary">
                    <i class="bi bi-eye"></i> @lang('massages.project-header')
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ======= Gallery Preview ======= -->
<section id="gallery" class="gallery-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">@lang('massages.gallary')</span>
            <h2>@lang('massages.gallary')</h2>
            <p>Moments captured from our work across the communities.</p>
        </div>

        <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
            @php $galleryShown = 0; @endphp
            @foreach($data as $gallary)
            @foreach($gallary['images'] as $image)
            @if($galleryShown < 6)
            @php $galleryShown++; @endphp
            <div class="col-lg-4 col-md-6">
                <div class="gallery-card">
                    <img src="{{ asset('storage/'.$image) }}" class="img-fluid" alt="{{ $gallary['title'] }}" loading="lazy" decoding="async">
                    <div class="gallery-overlay">
                        <div class="gallery-info">
                            <h4>{{ $gallary['title'] }}</h4>
                            <p>{{ Str::limit($gallary['description'], 60) }}</p>
                        </div>
                        <a href="{{ asset('storage/'.$image) }}" data-gallery="portfolioGallery"
                            class="gallery-link portfolio-lightbox" title="{{ $gallary['description'] }}">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>

        @if($galleryShown >= 6)
        <div class="gallery-footer text-center" data-aos="fade-up">
            <a href="{{ route('gallary', ['locale' => app()->getLocale()]) }}" class="btn-gallery">
                @lang('massages.gallary') <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- ======= Partners Section ======= -->
<section id="partners" class="partners-section">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up">
            <span class="section-badge">@lang('massages.partners')</span>
            <h2>@lang('massages.partners')</h2>
        </div>

        <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            @php
            $partners = [
                ['img' => 'hass.png', 'name' => 'Partner 1'],
                ['img' => 'noor.png', 'name' => 'Partner 2'],
                ['img' => 'kur.png', 'name' => 'Partner 3'],
                ['img' => 'care1.png', 'name' => 'Partner 4'],
            ];
            @endphp
            @foreach($partners as $partner)
            <div class="col-lg-3 col-md-4 col-6">
                <div class="partner-card">
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/clients/'.$partner['img']) }}" class="img-fluid" alt="{{ $partner['name'] }}" loading="lazy" decoding="async">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function() {
    const counters = document.querySelectorAll('.counter');
    if (!counters.length) return;

    const animateCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-target'), 10);
        let current = 0;
        const step = Math.max(1, Math.floor(target / 80));

        const update = () => {
            current += step;
            if (current < target) {
                counter.textContent = current;
                requestAnimationFrame(update);
            } else {
                counter.textContent = target;
            }
        };
        update();
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
})();
</script>
@endpush
