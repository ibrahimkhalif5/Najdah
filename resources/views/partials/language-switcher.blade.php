<li class="dropdown">
    <a href="#">
        @if (app()->getLocale() == 'ar')
        <img src="{{ asset('assets/img/flag/arabic.png') }}" alt="Arabic Flag" height="20" width="30" loading="lazy" decoding="async"> @lang('massages.Arabic')
        @elseif (app()->getLocale() == 'tr')
        <img src="{{ asset('assets/img/flag/turkey.png') }}" alt="Turkish Flag" height="20" width="30" loading="lazy" decoding="async"> @lang('massages.turkey')
        @else
        <img src="{{ asset('assets/img/flag/usa.png') }}" alt="English Flag" height="20" width="30" loading="lazy" decoding="async"> @lang('massages.english')
        @endif
        <i class="bi bi-chevron-down"></i>
    </a>
    <ul>
        <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'en']) }}">
                <img src="{{ asset('assets/img/flag/usa.png') }}" alt="English Flag" height="20" width="30" loading="lazy" decoding="async"> @lang('massages.english')</a>
        </li>
        <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'ar']) }}">
                <img src="{{ asset('assets/img/flag/arabic.png') }}" alt="Arabic Flag" height="20" width="30" loading="lazy" decoding="async"> @lang('massages.Arabic')</a>
        </li>
        <li><a href="{{ route(Route::currentRouteName(), ['locale' => 'tr']) }}">
                <img src="{{ asset('assets/img/flag/turkey.png') }}" alt="Turkish Flag" height="20" width="30" loading="lazy" decoding="async"> @lang('massages.turkey')</a>
        </li>
    </ul>
</li>
