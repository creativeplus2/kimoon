<section class="page-header">
    <div class="page-header__bg" style="background: url({{ $header['header']['image'] }});background-size:cover;">
    </div>
    <div class="container">
        @if ($setting)
        <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar"
            class="page-header__shape" style="width: 60px">
        @endif
        <ul class="solox-breadcrumb list-unstyled">
            <li><a href="{{ route('web.home') }}">home</a></li>
            <li><span>{{ $header['header']['title'] }}</span></li>
        </ul>
        <h2 class="page-header__title">{{ $header['header']['title'] }} </h2>
    </div>
</section>