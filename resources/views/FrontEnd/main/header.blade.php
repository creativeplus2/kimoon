<header class="main-header sticky-header sticky-header--normal">
    <div class="container-fluid">
        <div class="main-header__inner">
            <div class="main-header__logo">
                <a href="/">
                    @if ($setting)
                        <img src="{{ Storage::url('public/img/setting_app/') . $setting->logo }}" alt="" style="width: 180px">
                    @endif

                </a>
            </div>
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="">Produk</a>
                    </li>
                    <li>
                        <a href="">Register Member</a>
                    </li>
                    <li>
                        <a href="">Login</a>
                    </li>
                </ul>
            </nav><!-- /.main-header__nav -->
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a href="#" class="search-toggler main-header__search">
                    <i class="icon-magnifying-glass" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a><!-- /.search-toggler -->
                <a href="cart.html" class="main-header__cart">
                    <i class="icon-shopping-cart" aria-hidden="true"></i>
                    <span class="sr-only">Search</span>
                </a><!-- /.search-toggler -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header>
