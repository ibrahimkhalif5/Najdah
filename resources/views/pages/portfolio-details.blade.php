@extends('layouts.master')
@section('content')

<main id="main">
    @include('partials.breadcrumbs', ['title' => 'Project Details', 'subtitle' => __('massages.portfolio'), 'subtitleUrl' => route('portfolio', ['locale' => app()->getLocale()])])

    <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/portfolio/mosq.jpg') }}" alt="Project image" class="img-fluid" loading="lazy" decoding="async">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/portfolio/mos1.JPG') }}" alt="Project image" class="img-fluid" loading="lazy" decoding="async">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/portfolio/mos.PNG') }}" alt="Project image" class="img-fluid" loading="lazy" decoding="async">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Title:</strong> {{ $project->first()?->category?->category ?? '' }}</li>
                            <li><strong>Location:</strong> <span id="project-location"></span></li>
                            <li><strong>Project date:</strong> 01 March, 2020</li>
                            <li><strong>Project URL:</strong> <a href="#">www.example.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
            <h3>@lang('massages.project')</h3>
            <div class="table-responsive">
                <table id="example" class="display table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Project Title</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Cost</th>
                            <th>Start Date</th>
                            <th>Completed Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project as $row)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $row->category->category ?? '' }}</td>
                            <td>{{ $row->location }}</td>
                            <td>{{ $row->status }}</td>
                            <td>{{ number_format($row->project_cost, 2) }}</td>
                            <td>{{ $row->start_date }}</td>
                            <td>{{ $row->completed_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@endsection

@push('styles')
<link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
@endpush
