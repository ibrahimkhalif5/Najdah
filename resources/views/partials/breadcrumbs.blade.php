<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $title }}</h2>
            <ol>
                <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}">@lang('massages.home')</a></li>
                @if(isset($subtitle))
                <li><a href="{{ $subtitleUrl ?? '#' }}">{{ $subtitle }}</a></li>
                @endif
                <li aria-current="page">{{ $title }}</li>
            </ol>
        </div>
    </div>
</section>
