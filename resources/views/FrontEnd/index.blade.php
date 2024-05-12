@extends('FrontEnd.main.master-front-end')

@section('title', __('Kabkots'))

@section('content')
<section class="main-slider-one">
    <div class="main-slider-one__carousel solox-owl__carousel owl-carousel"
        data-owl-options='{
"loop": true,
"animateOut": "fadeOut",
"animateIn": "fadeIn",
"items": 1,
"autoplay": true,
"autoplayTimeout": 7000,
"smartSpeed": 1000,
"nav": true,
"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
"dots": true,
"margin": 0
}'>
        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg"
                    style="background-image: url({{ asset('frontend') }}/assets/images/backgrounds/slider-1-1.jpg);">
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle class='circle0 steap' cx="50%" cy="55%" r="5.2%" />
                    <circle class='circle1 steap' cx="50%" cy="55%" r="15.6%" />
                    <circle class='circle2 steap' cx="50%" cy="55%" r="26%" />
                    <circle class='circle3 steap' cx="50%" cy="55%" r="36.4%" />
                    <circle class='circle4 steap' cx="50%" cy="55%" r="46.8%" />
                    <circle class='circle5 steap' cx="50%" cy="55%" r="57%" />
                    <circle class='circle6 steap' cx="50%" cy="55%" r="67.7%" />
                    <circle class='circle7 steap' cx="50%" cy="55%" r="78.1%" />
                    <circle class='circle8 steap' cx="50%" cy="55%" r="88.5%" />
                    <circle class='circle9 steap' cx="50%" cy="55%" r="100%" />
                </svg>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="main-slider-one__content">
                                <h5 class="main-slider-one__sub-title">Get true wellness <img
                                        src="{{ asset('frontend') }}/assets/images/shapes/slider-1-leaf.png"
                                        alt="solox" /></h5>
                                <!-- slider-sub-title -->
                                <h2 class="main-slider-one__title">Beauty & Spa</h2><!-- slider-title -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg"
                    style="background-image: url({{ asset('frontend') }}/assets/images/backgrounds/slider-1-2.jpg);">
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle class='circle0 steap' cx="50%" cy="55%" r="5.2%" />
                    <circle class='circle1 steap' cx="50%" cy="55%" r="15.6%" />
                    <circle class='circle2 steap' cx="50%" cy="55%" r="26%" />
                    <circle class='circle3 steap' cx="50%" cy="55%" r="36.4%" />
                    <circle class='circle4 steap' cx="50%" cy="55%" r="46.8%" />
                    <circle class='circle5 steap' cx="50%" cy="55%" r="57%" />
                    <circle class='circle6 steap' cx="50%" cy="55%" r="67.7%" />
                    <circle class='circle7 steap' cx="50%" cy="55%" r="78.1%" />
                    <circle class='circle8 steap' cx="50%" cy="55%" r="88.5%" />
                    <circle class='circle9 steap' cx="50%" cy="55%" r="100%" />
                </svg>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="main-slider-one__content">
                                <h5 class="main-slider-one__sub-title">Get true wellness <img
                                        src="{{ asset('frontend') }}/assets/images/shapes/slider-1-leaf.png"
                                        alt="solox" /></h5>
                                <!-- slider-sub-title -->
                                <h2 class="main-slider-one__title">Beauty & Spa</h2><!-- slider-title -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg"
                    style="background-image: url({{ asset('frontend') }}/assets/images/backgrounds/slider-1-3.jpg);">
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <circle class='circle0 steap' cx="50%" cy="55%" r="5.2%" />
                    <circle class='circle1 steap' cx="50%" cy="55%" r="15.6%" />
                    <circle class='circle2 steap' cx="50%" cy="55%" r="26%" />
                    <circle class='circle3 steap' cx="50%" cy="55%" r="36.4%" />
                    <circle class='circle4 steap' cx="50%" cy="55%" r="46.8%" />
                    <circle class='circle5 steap' cx="50%" cy="55%" r="57%" />
                    <circle class='circle6 steap' cx="50%" cy="55%" r="67.7%" />
                    <circle class='circle7 steap' cx="50%" cy="55%" r="78.1%" />
                    <circle class='circle8 steap' cx="50%" cy="55%" r="88.5%" />
                    <circle class='circle9 steap' cx="50%" cy="55%" r="100%" />
                </svg>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="main-slider-one__content">
                                <h5 class="main-slider-one__sub-title">Get true wellness <img
                                        src="{{ asset('frontend') }}/assets/images/shapes/slider-1-leaf.png"
                                        alt="solox" /></h5>
                                <!-- slider-sub-title -->
                                <h2 class="main-slider-one__title">Beauty & Spa</h2><!-- slider-title -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-one">
    <div class="feature-one__bg"
        style="background-image: url({{ asset('frontend') }}/assets/images/shapes/feature-bg-1.png);"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="feature-one__item text-center">
                    <div class="feature-one__item__hover-img"><img
                            src="{{ asset('frontend') }}/assets/images/shapes/feature-flower.png"
                            alt="solox"></div>
                    <div class="feature-one__item__img">
                        <img src="{{ asset('frontend') }}/assets/images/resources/feature-1-1.jpg"
                            alt="solox">
                        <div class="feature-one__item__icon"><span class="icon-booking"></span></div>
                    </div>
                    <h4 class="feature-one__item__sub-title">Online</h4>
                    <h3 class="feature-one__item__title">Booking</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 4">
                        <g data-name="3 Boxes">
                            <g data-name="01">
                                <path class="cls-1"
                                    d="M25.752,2.377c-2.7,2.164-5,2.164-7.7,0a3.508,3.508,0,0,0-5.021,0c-2.673,2.143-4.853,2.143-7.526,0-1.779-1.427-2.981-1.427-4.761,0L0.011,1.331c2.163-1.734,3.981-1.8,6.23,0,2.12,1.7,3.685,1.9,6.057,0a4.641,4.641,0,0,1,6.489,0c2.206,1.77,3.937,1.839,6.23,0,2.25-1.8,3.721-1.8,5.97,0L30.254,2.377C28.446,0.927,27.562.927,25.752,2.377Z" />
                            </g>
                        </g>
                    </svg>
                    <p class="feature-one__item__text">Lorem ipsum dolor amet consectetur adipiscing elit do
                        eiusmod
                        tempor incid idunt ut labore.</p>
                </div><!-- feature-item -->
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="feature-one__item feature-one__item--no-border-md text-center">
                    <div class="feature-one__item__hover-img"><img
                            src="{{ asset('frontend') }}/assets/images/shapes/feature-flower.png"
                            alt="solox"></div>
                    <div class="feature-one__item__img">
                        <img src="{{ asset('frontend') }}/assets/images/resources/feature-1-2.jpg"
                            alt="solox">
                        <div class="feature-one__item__icon"><span class="icon-group"></span></div>
                    </div>
                    <h4 class="feature-one__item__sub-title">Expert</h4>
                    <h3 class="feature-one__item__title">Therapist</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 4">
                        <g data-name="3 Boxes">
                            <g data-name="01">
                                <path class="cls-1"
                                    d="M25.752,2.377c-2.7,2.164-5,2.164-7.7,0a3.508,3.508,0,0,0-5.021,0c-2.673,2.143-4.853,2.143-7.526,0-1.779-1.427-2.981-1.427-4.761,0L0.011,1.331c2.163-1.734,3.981-1.8,6.23,0,2.12,1.7,3.685,1.9,6.057,0a4.641,4.641,0,0,1,6.489,0c2.206,1.77,3.937,1.839,6.23,0,2.25-1.8,3.721-1.8,5.97,0L30.254,2.377C28.446,0.927,27.562.927,25.752,2.377Z" />
                            </g>
                        </g>
                    </svg>
                    <p class="feature-one__item__text">Lorem ipsum dolor amet consectetur adipiscing elit do
                        eiusmod
                        tempor incid idunt ut labore.</p>
                </div><!-- feature-item -->
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                <div class="feature-one__item feature-one__item--no-border text-center">
                    <div class="feature-one__item__hover-img"><img
                            src="{{ asset('frontend') }}/assets/images/shapes/feature-flower.png"
                            alt="solox"></div>
                    <div class="feature-one__item__img">
                        <img src="{{ asset('frontend') }}/assets/images/resources/feature-1-3.jpg"
                            alt="solox">
                        <div class="feature-one__item__icon"><span class="icon-tag"></span></div>
                    </div>
                    <h4 class="feature-one__item__sub-title">Special</h4>
                    <h3 class="feature-one__item__title">Discount</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 4">
                        <g data-name="3 Boxes">
                            <g data-name="01">
                                <path class="cls-1"
                                    d="M25.752,2.377c-2.7,2.164-5,2.164-7.7,0a3.508,3.508,0,0,0-5.021,0c-2.673,2.143-4.853,2.143-7.526,0-1.779-1.427-2.981-1.427-4.761,0L0.011,1.331c2.163-1.734,3.981-1.8,6.23,0,2.12,1.7,3.685,1.9,6.057,0a4.641,4.641,0,0,1,6.489,0c2.206,1.77,3.937,1.839,6.23,0,2.25-1.8,3.721-1.8,5.97,0L30.254,2.377C28.446,0.927,27.562.927,25.752,2.377Z" />
                            </g>
                        </g>
                    </svg>
                    <p class="feature-one__item__text">Lorem ipsum dolor amet consectetur adipiscing elit do
                        eiusmod
                        tempor incid idunt ut labore.</p>
                </div><!-- feature-item -->
            </div>
        </div>
    </div>
</section>
<!-- Feature End -->
<section class="about-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-one__image wow fadeInLeft" data-wow-delay="300ms">
                    <div class="about-one__double-image">
                        <img src="{{ asset('frontend') }}/assets/images/resources/about-1-1.jpg"
                            alt="solox">
                        <img src="{{ asset('frontend') }}/assets/images/resources/about-1-2.jpg"
                            alt="solox">
                    </div>
                    <div class="about-one__flower"
                        style="background-image: url({{ asset('frontend') }}/assets/images/shapes/about-flower.png);">
                    </div>
                    <div class="about-one__image__info wow fadeInUp" data-wow-delay="400ms">
                        <div class="about-one__image__info__icon"><span class="fas fa-phone"></span></div>
                        <h3 class="about-one__image__info__title">Kontak kami</h3>
                        <p class="about-one__image__info__text"><a href="#">{{$setting->no_telpon}}</a>
                        </p>
                    </div>
                    <div class="about-one__image__arrow"><img
                            src="{{ asset('frontend') }}/assets/images/shapes/about-arrow.png"
                            alt="solox">
                    </div>
                </div><!-- /.why-choose-two__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="about-one__content">
                    <div class="sec-title">

                        <img src="{{ asset('frontend') }}/assets/images/shapes/sec-title-s-1.png"
                            alt="Get to know us" class="sec-title__img">


                        <h6 class="sec-title__tagline">Get to know us</h6><!-- /.sec-title__tagline -->

                        <h3 class="sec-title__title">welcome to {{$setting->nama_perusahaan}}</h3>
                        <!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <p class="about-one__content__text-two" style="text-align: justify">
                        {{$setting->deskripsi_perusahaan}}
                    </p>
                </div><!-- /.why-choose-two__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.about-one -->
@endsection

