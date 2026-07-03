<div class="fi-datetime-widget">
    <span class="dt-item">
        <svg class="dt-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
        <span class="dt-date" id="fi-dt-date"></span>
    </span>
    <span class="dt-separator"></span>
    <span class="dt-item">
        <svg class="dt-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
        </svg>
        <span class="dt-time" id="fi-dt-time"></span>
    </span>
</div>

<script>
(function() {
    var dateEl = document.getElementById('fi-dt-date');
    var timeEl = document.getElementById('fi-dt-time');
    if (!dateEl || !timeEl) return;

    function pad(n) { return String(n).padStart(2, '0'); }

    function update() {
        var now = new Date();
        var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        var d = days[now.getDay()];
        var m = months[now.getMonth()];
        var date = d + ', ' + pad(now.getDate()) + ' ' + m + ' ' + now.getFullYear();

        var h = now.getHours();
        var ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12 || 12;
        var time = pad(h) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds()) + ' ' + ampm;

        if (dateEl.textContent !== date) dateEl.textContent = date;
        if (timeEl.textContent !== time) timeEl.textContent = time;
    }

    update();
    setInterval(update, 1000);
})();
</script>
