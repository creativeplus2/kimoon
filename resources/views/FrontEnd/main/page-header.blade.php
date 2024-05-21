    <section class="page-header">
        <div class="page-header__bg"></div>
        <div class="container">
            @if ($setting)
                <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar" class="page-header__shape" style="width: 60px">
            @endif
            <ul class="solox-breadcrumb list-unstyled">
                <li><a href="{{ route('web.home') }}">home</a></li>
                <li><span>{{ $slug }}</span></li>
            </ul>
            <h2 class="page-header__title">{{ $slug }}</h2>
        </div>
    </section>