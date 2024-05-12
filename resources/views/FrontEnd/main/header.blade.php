<header class="main-header sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="{{route('web.home')}}">
                    @if ($setting)
                        <img src="{{ Storage::url('public/img/setting_app/') . $setting->logo }}" alt="" style="width: 180px">
                    @endif
                </a>
            </div>
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">
                    <li>
                        <a href="{{route('web.home')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('web.produk')}}">Produk</a>
                    </li>
                    <li>
                        <a href="{{route('web.register')}}">Register Member</a>
                    </li>
                    <li>
                        <a href="{{route('web.login')}}">Login</a>
                    </li>
                </ul>
            </nav>
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="#" class="search-toggler main-header__search">
                    <i class="icon-magnifying-glass" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a>
            </div>
        </div>
    </div>
</header>
