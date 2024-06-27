<section class="block-joinus">
    <div class="container">

        <div class="row">
            @foreach ($text['columnshow'] as $plan)
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
                        <h3 class="text-gold mb-3">{{ $plan['title']}}</h3>
                    </a>
                    <p class="text-darkgold">{{ $plan['subtitle']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>