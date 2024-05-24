<header class="main-header sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="{{ route('web.home') }}">
                    @if ($setting)
                    <img src="{{ Storage::url('public/img/setting_app/') . $setting->logo }}" alt=""
                        style="width: 180px">
                    @endif
                </a>
            </div>
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">
                    <li>
                        <a href="{{ route('web.about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('web.produk') }}">Produk</a>
                    </li>
                    <li>
                        <a href="{{ route('web.partnership') }}">Partnership</a>
                    </li>
                </ul>
            </nav>
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->

                <div class="main-menu-right">
                    @if (Session::get('login-member'))
                    <a href="{{ route('web.profile') }}" class="solox-btn main-header__btn alt-btn">
                        <span>{{ Session::get('name-member') }} / {{ Session::get('type-user') }}</span>
                    </a>
                    <a href="{{ route('web.submit_logout') }}" class="solox-btn main-header__btn">
                        <span>Logout&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    </a>
                    @else
                    <a href="{{ route('web.register') }}" class="solox-btn main-header__btn alt-btn">
                        <span>Register</span>
                    </a>
                    <a href="{{ route('web.login') }}" class="solox-btn main-header__btn">
                        <span>Login</span>
                    </a>
                    @endif
                </div>



            </div>
        </div>
    </div>
</header>