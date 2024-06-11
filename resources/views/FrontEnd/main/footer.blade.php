<footer class="main-footer background-black">
    @if ($setting)
    <div class="main-footer__bg background-black"
        style="background-image: url({{ Storage::url('public/img/setting_app/') . $setting->logo }});"></div>
    @endif
    <div class="main-footer__top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="footer-widget footer-widget--about">
                        <a href="/" class="footer-widget__logo">
                            <footer class="main-footer background-black">
                                @if ($setting)
                                <img src="{{ Storage::url('public/img/setting_app/') . $setting->logo }}" width="180"
                                    alt="">
                                @endif
                        </a>
                        <ul class="list-unstyled footer-widget__info">
                            <li> <a href="#">{{ $setting->no_telpon }}</a></li>
                            <li> <a href="#">{{ $setting->email }}</a></li>
                            <li> <a href="#">{{ $setting->alamat }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--links">
                        <h2 class="footer-widget__title">{{$setting->membertable["footermenutitle"]}}</h2>
                        <ul class="list-unstyled footer-widget__links">
                            @foreach ($setting->membertable["footermenus"] as $menu)
                            <li><a href={{$menu["link"]}}>{{$menu["name"]}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--contact">
                        <h2 class="footer-widget__title">{{$setting->membertable["footermenutitle"]}}</h2>
                        <div class="footer-widget__social">
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
                                <span class="sr-only">X-Twitter</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget footer-widget--time">

                        <h2 class="footer-widget__title">{{$setting->membertable["storemenutitle"]}}</h2>

                        <ul class="list-unstyled footer-widget__links">
                            @foreach ($setting->membertable["storemenus"] as $menu)
                            <li><a href={{$menu["link"]}}>{{$menu["name"]}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>