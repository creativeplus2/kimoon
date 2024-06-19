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
<a href="https://api.whatsapp.com/send/?phone=628119151575&text&type=phone_number&app_absent=0" target="_blank">
    <button role="button" tabindex="0" class="m-4 position-absolute right-0 bottom-0 flex rounded-circle" type="button"
        style="width:60px; height: 60px; background-color: #4FCE5D; border:none; right:0">
        <div class="text-white p-2">
            <svg style="fill: white;" class="w-100 h-100" xmlns="http://www.w3.org/2000/svg" fill="#4FCE5D"
                viewBox="0 0 90 90" class="injected-svg"
                data-src="https://static.elfsight.com/icons/app-chats-whatsapp-chat-multicolor.svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <path
                    d="M90 43.841c0 24.213-19.779 43.841-44.182 43.841a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.628 21.416 0 45.818 0 70.223 0 90 19.628 90 43.841zM45.818 6.982c-20.484 0-37.146 16.535-37.146 36.859 0 8.065 2.629 15.534 7.076 21.61L11.107 79.14l14.275-4.537A37.122 37.122 0 0 0 45.819 80.7c20.481 0 37.146-16.533 37.146-36.857S66.301 6.982 45.818 6.982zm22.311 46.956c-.273-.447-.994-.717-2.076-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.358-1.717-.538-2.438.537-.721 1.076-2.797 3.495-3.43 4.212-.632.719-1.263.809-2.347.271-1.082-.537-4.571-1.673-8.708-5.333-3.219-2.848-5.393-6.364-6.025-7.441-.631-1.075-.066-1.656.475-2.191.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.717.182-1.344-.09-1.883-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.792-2.436-1.792-.631 0-1.354-.09-2.076-.09s-1.896.269-2.889 1.344c-.992 1.076-3.789 3.676-3.789 8.963 0 5.288 3.879 10.397 4.422 11.113.541.716 7.49 11.92 18.5 16.223C58.2 65.771 58.2 64.336 60.186 64.156c1.984-.179 6.406-2.599 7.312-5.107.9-2.512.9-4.663.631-5.111z">
                </path>
            </svg>
        </div>
    </button>
</a>