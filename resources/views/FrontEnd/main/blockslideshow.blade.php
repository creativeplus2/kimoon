<section class="block-slideshhow main-slider-one">
    <div class="main-slider-one__carousel solox-owl__carousel owl-carousel" data-owl-options='{
"loop": true,
"animateOut": "fadeOut",
"animateIn": "fadeIn",
"items": 1,
"autoplay": true,
"autoplayTimeout": 7000,
"smartSpeed": 1000,
"nav": false,
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