<section class="bg-darkgold">
    <div class="container">
        <div class="row py-4 py-sm-6">

            <div class="col-12 text-gold">
                <div class="sec-title">
                    <h3 class="sec-title__title text-gold">{{$setting->membertable["contactus"]["title"]}}</h3>
                </div>
                <div class="row">
                    <div class="col-lg-6 text-gold">

                        <p class="text-white">{{$setting->membertable["contactus"]["p_en"]}}</p>
                        </p>
                    </div>
                    <div class="col-lg-6 text-gold">

                        <p class="text-white opacity-75"><i>{{$setting->membertable["contactus"]["p_id"]}}</i>
                        </p>
                    </div>
                </div>

                Kimoon Consumer Goods – Empower Lives.---
            </div>
        </div>
    </div>
</section>
<footer class="main-footer background-black">

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
                            <li>{{ $setting->no_telpon }}</li>
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