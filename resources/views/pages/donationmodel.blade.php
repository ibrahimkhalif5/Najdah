@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thank You') }}</div>

                <div class="card-body">
                    <h1 class="text-center mb-5">Thank you for your donation!</h1>
                    <div class="text-center">
                        <img src="{{ asset('assets/img/logo1.png') }}" alt="Logo">
                    </div>
                    <p class="text-center mt-5">Your support means a lot to us.</p>
                    <div class="text-center">
                        <a href="{{route('home',['locale'=>app()->getLocale() == 'en'? 'en':'ar'])}}"
                            class="btn btn-primary mt-5">Take Me Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
/* Add animation styles here */
</style>
@endsection