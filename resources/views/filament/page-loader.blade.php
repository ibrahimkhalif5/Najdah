<div id="filament-page-loader">
    <div class="filament-loader-content">
        <div class="filament-loader-ring filament-loader-ring-outer"></div>
        <div class="filament-loader-ring filament-loader-ring-inner"></div>
        <div class="filament-loader-logo">
            <img src="{{ asset('assets/img/logo1.png') }}" alt="Najdah" width="90" height="24">
        </div>
    </div>
</div>

<script>
(function() {
    const loader = document.getElementById('filament-page-loader');
    if (!loader) return;

    const minInit = 600;
    const minNav = 300;
    let initStart = Date.now();

    const hide = function(minElapsed) {
        var elapsed = Date.now() - initStart;
        var remaining = Math.max(0, minElapsed - elapsed);
        setTimeout(function() {
            loader.classList.add('loaded');
        }, remaining);
    };

    if (document.readyState === 'complete') {
        hide(minInit);
    } else {
        window.addEventListener('load', function() { hide(minInit); });
    }

    document.addEventListener('livewire:navigating', function() {
        loader.classList.remove('loaded');
        initStart = Date.now();
    });

    document.addEventListener('livewire:navigated', function() {
        var navStart = Date.now();
        var check = setInterval(function() {
            if (document.readyState === 'complete') {
                clearInterval(check);
                var elapsed = Date.now() - navStart;
                var remaining = Math.max(0, minNav - elapsed);
                setTimeout(function() { loader.classList.add('loaded'); }, remaining);
            }
        }, 50);
    });
})();
</script>
