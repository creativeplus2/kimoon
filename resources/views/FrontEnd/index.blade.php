@extends('FrontEnd.main.master-front-end')

@section('title', __('Home'))

@section('content')
<section class="main-slider-one">
    <div class="main-slider-one__carousel solox-owl__carousel owl-carousel" data-owl-options='{
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
        @foreach ($text['slideshow'] as $slide)

        <div class="item">
            <div class="main-slider-one__item">
                <div class="main-slider-one__bg" style="background-image: url({{ $slide['image'] }})">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <div class="main-slider-one__content">

                                <h2 class="main-slider-one__title">{{ $slide['title'] }}</h2>
                                <h5 class="main-slider-one__sub-title">{{ $slide['subtitle'] }}</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</section>
<section class="joinus feature-one">

    <div class="container">
        <div class="row  justify-content-center mt-5 mb-5">
            <div>
                <h3 class="text-center">{{ $text['joinus']['title']}}</h3>
                <h5 class="text-center">{{ $text['joinus']['subtitle']}}</h5>
            </div>
        </div>
        <div class="row">
            @foreach ($text['joinus']['plan'] as $plan)

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">

                <div class="feature-one__item text-center">
                    <a href={{ route('web.register') }}>
                        <div class="feature-one__item__hover-img"><img
                                src="{{ asset('frontend') }}/assets/images/shapes/feature-flower.png" alt="solox">
                        </div>
                        <div class="feature-one__item__img">
                            <img src="{{ $plan['image']}}" alt="solox">
                        </div>
                    </a>
                    <a href={{ route('web.register') }}>
                        <h3 class="feature-one__item__sub-title">{{ $plan['name']}}</h3>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 4">
                        <g data-name="3 Boxes">
                            <g data-name="01">
                                <path class="cls-1"
                                    d="M25.752,2.377c-2.7,2.164-5,2.164-7.7,0a3.508,3.508,0,0,0-5.021,0c-2.673,2.143-4.853,2.143-7.526,0-1.779-1.427-2.981-1.427-4.761,0L0.011,1.331c2.163-1.734,3.981-1.8,6.23,0,2.12,1.7,3.685,1.9,6.057,0a4.641,4.641,0,0,1,6.489,0c2.206,1.77,3.937,1.839,6.23,0,2.25-1.8,3.721-1.8,5.97,0L30.254,2.377C28.446,0.927,27.562.927,25.752,2.377Z" />
                            </g>
                        </g>
                    </svg>
                    <p class="feature-one__item__text">{{ $plan['p']}}</p>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>
<section class="welcome about-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-one__image wow fadeInLeft" data-wow-delay="300ms">
                    <div class="about-one__double-image">
                        <img src="{{ $text['welcome']['image1']}}" alt="solox">
                        <img src="{{ $text['welcome']['image2']}}" alt="solox">
                    </div>
                    <div class="about-one__flower">
                    </div>
                    <div class="about-one__image__info wow fadeInUp" data-wow-delay="400ms">
                        <div class="about-one__image__info__icon"><span class="fas fa-phone"></span></div>
                        <h3 class="about-one__image__info__title">Kontak kami</h3>
                        <p class="about-one__image__info__text"><a href="#">{{ $setting->no_telpon }}</a>
                        </p>
                    </div>
                    <div class="about-one__image__arrow"><img
                            src="{{ asset('frontend') }}/assets/images/shapes/about-arrow.png" alt="solox">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="300ms">
                <div class="about-one__content">
                    <div class="sec-title">
                        @if ($setting)
                        <img src="{{ Storage::url('public/img/setting_app/') . $setting->favicon }}"
                            alt="Get to know us" class="sec-title__img" style="width: 60px">
                        @endif
                        <h6 class="sec-title__tagline">Get to know us</h6>
                        <h3 class="sec-title__title">{{ $text['welcome']['title']}}</h3>
                    </div>
                    <p class="about-one__content__text-two" style="text-align: justify">
                        {{ $text['welcome']['p']}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection