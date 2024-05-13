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
                        <a href="{{ route('web.home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('web.produk') }}">Produk</a>
                    </li>

                    @if (Session::get('login-member'))
                        <li>
                            <a href="{{ route('web.profile') }}">{{ Session::get('name-member') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('web.submit_logout') }}">Logout&nbsp;<i class="fa fa-sign-out"
                                    aria-hidden="true"></i></a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('web.register') }}">Register Member</a>
                        </li>
                        <li>
                            <a href="{{ route('web.login') }}">Login</a>
                        </li>
                    @endif

                </ul>
            </nav>
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
