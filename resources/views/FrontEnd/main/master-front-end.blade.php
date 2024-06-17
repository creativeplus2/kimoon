<!DOCTYPE html>
<html lang="en">
{{-- header --}}
@include('FrontEnd.main.css')

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="page-wrapper">
        <div class="topbar-one">
            <div class="container-fluid">
                <div class="topbar-one__inner">
                    <ul class="list-unstyled topbar-one__info">
                        <li class="topbar-one__info__item">
                            <i class="fas fa-envelope topbar-one__info__icon"></i>
                            <a href="#">{{$setting->email}}</a>
                        </li>
                        <li class="topbar-one__info__item">
                            <i class="fas fa-phone topbar-one__info__icon"></i>
                            <a href="#">{{$setting->no_telpon}}</a>
                        </li>
                    </ul>
                    <div class="topbar-one__right">
                        <div class="topbar-one__social">
                            <a href="#">
                                <i class="fab fa-facebook" aria-hidden="true"></i>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                            <a href="#">
                                <i class="fab fa-tiktok" aria-hidden="true"></i>
                                <span class="sr-only">Tiktok</span>
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter" aria-hidden="true"></i>
                                <span class="sr-only">Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('FrontEnd.main.header')

        {{-- content --}}
        @yield('content')
        {{-- footer --}}
        @include('FrontEnd.main.footer')



        <div class="mobile-nav__wrapper">
            <div class="mobile-nav__overlay mobile-nav__toggler"></div>
            <div class="mobile-nav__content">
                <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
                <div class="logo-box">
                    <a href="{{route('web.home')}}" aria-label="logo image">
                        @if ($setting)
                        <img src="{{ Storage::url('public/img/setting_app/') . $setting->logo }}" alt=""
                            style="width: 180px">
                        @endif
                    </a>
                </div>
                <div class="mobile-nav__container">
                    <ul class="main-menu__list">
                        @foreach ($setting->membertable["menus"] as $menu)
                        @php
                        $param = explode("/",Request::getPathInfo());
                        @endphp
                        <li class={{ $param[1]===$menu["link"] ? "active" :"" }}>
                            <a href={{"/".$menu["link"]}}>{{$menu["name"]}}</a>
                        </li>
                        @endforeach
                    </ul>
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
                    <a href="./login-member" class="solox-btn main-header__btn">
                        <span>Login</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="search-popup">
            <div class="search-popup__overlay search-toggler"></div>
            <div class="search-popup__content">
                <form role="search" method="get" class="search-popup__form" action="#">
                    <input type="text" id="search" placeholder="Search Here..." />
                    <button type="submit" aria-label="search submit" class="solox-btn solox-btn--base">
                        <span><i class="icon-magnifying-glass"></i></span>
                    </button>
                </form>
            </div>
        </div>
        {{-- script --}}
        @include('FrontEnd.main.script')
    </div>


    <!-- <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a> -->

</body>


</html>