@extends('layouts.app')

@push('styles')
<link href="{{ asset('assets/css/donate.css') }}" rel="stylesheet">
@endpush

@section('content')

<!-- ======= Hero Section ======= -->
<section class="donate-hero">
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <span class="hero-badge-lg"><i class="bi bi-heart-fill me-2" style="color:#e74c3c;"></i>Support Our Mission</span>
                    <h1>Online Donations Coming Soon</h1>
                    <p class="hero-subtitle">
                        Your willingness to support our mission means more than words can express.
                        Every act of kindness has the power to change lives.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="hero-image-grid">
                    <div class="img-card">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=600&q=80" alt="Helping communities" loading="lazy">
                        <div class="img-overlay"></div>
                        <span class="img-label"><i class="bi bi-heart-fill me-1" style="color:#e74c3c;font-size:10px;"></i> Community Support</span>
                    </div>
                    <div class="img-card">
                        <img src="https://images.unsplash.com/photo-1593113630400-ea4288922497?w=400&q=80" alt="Helping children" loading="lazy">
                        <div class="img-overlay"></div>
                        <span class="img-label"><i class="bi bi-people-fill me-1"></i> Orphaned Children</span>
                    </div>
                    <div class="img-card">
                        <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=400&q=80" alt="Education" loading="lazy">
                        <div class="img-overlay"></div>
                        <span class="img-label"><i class="bi bi-book-fill me-1"></i> Education</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Appreciation Section ======= -->
<section class="donate-appreciation" data-aos="fade-up" data-aos-duration="800">
    <div class="container">
        <div class="appreciation-card">
            <div class="appr-icons">
                <span>❤️</span>
                <span>🙏</span>
                <span>🤲</span>
                <span>😊</span>
                <span>🎉</span>
            </div>
            <h3>Thank You!</h3>
            <p>
                We sincerely appreciate your desire to support our cause.<br><br>
                Even though our online donation platform is still under development, your willingness to donate means the world to us.<br><br>
                Your compassion gives hope to countless individuals and families.<br><br>
                Thank you for standing with us as we work toward creating a better future for our community.
            </p>
            <div class="helping-hands">
                <i class="bi bi-hand-index-thumb"></i>
                <i class="bi bi-hand-thumbs-up"></i>
                <i class="bi bi-heart"></i>
                <i class="bi bi-hand-index-thumb"></i>
                <i class="bi bi-hand-thumbs-up"></i>
            </div>
        </div>
    </div>
</section>

<!-- ======= Message Section ======= -->
<section class="donate-message" data-aos="fade-up" data-aos-duration="800">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="msg-card">
                    <div class="quote-icon"><i class="bi bi-quote"></i></div>
                    <p>
                        Thank you for visiting our donation page.
                    </p>
                    <p>
                        Your willingness to support our mission means more than words can express.
                    </p>
                    <p>
                        Every act of kindness has the power to change lives, strengthen communities, and bring hope to those who need it most.
                    </p>
                    <p>
                        We are currently preparing a secure online donation platform to make giving easier, safer, and more convenient.
                    </p>
                    <p>
                        Soon, you will be able to contribute directly to support our programs, including:
                    </p>
                    <ul class="program-list">
                        <li><i class="bi bi-heart-fill"></i> Helping vulnerable children and orphans</li>
                        <li><i class="bi bi-book-fill"></i> Supporting education initiatives</li>
                        <li><i class="bi bi-building-fill"></i> Community development projects</li>
                        <li><i class="bi bi-truck"></i> Emergency humanitarian assistance</li>
                        <li><i class="bi bi-heart-pulse-fill"></i> Health and social welfare programs</li>
                    </ul>
                    <p class="signoff">
                        We sincerely appreciate your interest in making a positive impact.<br>
                        Together, we can build stronger communities and create lasting change.<br>
                        Thank you for believing in our mission.<br><br>
                        <span class="heart-pulse">❤️</span> Your generosity inspires hope.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Coming Soon Section ======= -->
<section class="donate-comingsoon" data-aos="fade-up" data-aos-duration="800">
    <div class="container">
        <div class="comingsoon-card">
            <span class="cs-badge"><i class="bi bi-rocket-takeoff me-1"></i> Launching Soon</span>
            <div class="cs-icon">🚧</div>
            <h3>Donation Platform Under Development</h3>
            <p>We are working hard to bring you a secure and seamless donation experience. Stay tuned!</p>
            <div class="progress-track">
                <div class="progress-fill"></div>
            </div>
            <div class="cs-loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Additional Images Section ======= -->
<section style="padding: 40px 0; background: var(--color-bg-warm);" data-aos="fade-up" data-aos-duration="800">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-md-5 col-6">
                <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); transition: transform 0.5s ease; height: 200px;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?w=600&q=80" alt="Food assistance" style="width:100%;height:100%;object-fit:cover;" loading="lazy">
                </div>
            </div>
            <div class="col-md-5 col-6">
                <div style="border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); transition: transform 0.5s ease; height: 200px;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=600&q=80" alt="Volunteers helping" style="width:100%;height:100%;object-fit:cover;" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= CTA Section ======= -->
<section class="donate-cta" data-aos="fade-up" data-aos-duration="800">
    <div class="cta-shape cta-shape-1"></div>
    <div class="cta-shape cta-shape-2"></div>
    <div class="container">
        <h2>Together, Every Contribution Creates Hope.</h2>
        <p>Join us in making a lasting difference in the lives of those who need it most.</p>
        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="btn-return-home">
            <i class="bi bi-arrow-left"></i> Return to Home
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out-cubic',
                once: true,
                mirror: false,
            });
        }
    });
</script>
@endpush
