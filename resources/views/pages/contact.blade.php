@extends('layouts.master')
@push('styles')
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
@endpush
@section('content')

<main id="main">
    @include('partials.breadcrumbs', ['title' => __('massages.visit')])

    <div class="map-section">
        <iframe style="border:0;"
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4084757.642546393!2d36.2881374946571!3d1.1453754566632146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1673437941469!5m2!1sen!2ske"
            width="600" height="450" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" title="Office location"></iframe>
    </div>

    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                <h4>@lang('massages.location'):</h4>
                                <p>@lang('massages.location1')<br>@lang('massages.location2')</p>
                            </div>
                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-envelope" aria-hidden="true"></i>
                                <h4>@lang('massages.email'):</h4>
                                <p><a href="https://mail.google.com/mail/?view=cm&fs=1&to=info@najdah.org" target="_blank" class="email-link">@lang('massages.email1')</a></p>
                            </div>
                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="bi bi-phone" aria-hidden="true"></i>
                                <h4>@lang('massages.call'):</h4>
                                <p>+@lang('massages.call1')<br>@lang('massages.call2')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('message', ['locale' => app()->getLocale()]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="type" class="visually-hidden">@lang('massages.type')</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="" disabled {{ old('type') ? '' : 'selected' }}>@lang('massages.select_type')</option>
                                    <option value="question" {{ old('type') == 'question' ? 'selected' : '' }}>@lang('massages.question')</option>
                                    <option value="feedback" {{ old('type') == 'feedback' ? 'selected' : '' }}>@lang('massages.feedback')</option>
                                    <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>@lang('massages.general')</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="name" class="visually-hidden">@lang('massages.name')</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="@lang('massages.name')" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 form-group">
                                <label for="email" class="visually-hidden">@lang('massages.yemail')</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="@lang('massages.yemail')" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="subject" class="visually-hidden">@lang('massages.subject')</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="@lang('massages.subject')" value="{{ old('subject') }}" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="message" class="visually-hidden">@lang('massages.mess')</label>
                            <textarea class="form-control" name="message" rows="5" id="message"
                                placeholder="@lang('massages.mess')" required>{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group mt-3" style="display:none">
                            <label for="website">Website</label>
                            <input type="text" name="honeypot" id="website" value="" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-group mt-3">
                            <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                            @error('cf-turnstile-response')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn-submit">@lang('massages.send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
