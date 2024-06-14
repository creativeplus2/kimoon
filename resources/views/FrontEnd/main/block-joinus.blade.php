<section class="block-joinus feature-one">

    <div class="container">
        <div class="row  justify-content-center mt-5 mb-5">
            <div class="w-50">
                <h2 class="text-gold text-center">{{ $text['title']}}</h2>
                <p class="text-center text-darkgold">{{ $text['subtitle']}}</p>
            </div>
        </div>
        <div class="row">
            @foreach ($text['plan'] as $plan)

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
                        <h3 class="text-gold mb-3">{{ $plan['name']}}</h3>
                    </a>

                    <p class="text-darkgold">{{ $plan['p']}}</p>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>