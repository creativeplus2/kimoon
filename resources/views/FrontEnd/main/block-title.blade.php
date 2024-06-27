<section class="block-title page-header">
    <div class="page-header__bg" style="background: url({{ $text['image2'] }});background-size:cover;">
    </div>
    <div class="container">
        @if ($setting)
        <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}" alt="products left sidebar"
            class="page-header__shape" style="width: 60px">
        @endif
        <ul class="solox-breadcrumb list-unstyled">
            <li><a href="{{ route('web.home') }}">home</a></li>
            <li><span>{{ $text['title'] }}</span></li>
        </ul>
        <h2 class="page-header__title">{{ $text['title'] }} </h2>
    </div>
</section>