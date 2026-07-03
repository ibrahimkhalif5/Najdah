@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h3 class="mb-0">{{ __('Thank You') }}</h3>
                </div>
                <div class="card-body text-center py-5">
                    <h1 class="mb-4">Thank you for your donation!</h1>
                    <div class="mb-4">
                        <img src="{{ asset('assets/img/logo1.png') }}" alt="Najdah Logo" class="img-fluid" style="max-height: 120px;" loading="lazy" decoding="async">
                    </div>
                    <p class="text-muted mb-4">Your support means a lot to us.</p>
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="btn btn-primary btn-lg">Take Me Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
