<section class="block-one">
    <div class="container">
        <div class="row py-5 py-sm-6">
            <div class="col-xl-6 d-flex flex-column justify-content-center">
                <div class="why-choose-one__content text-darkgold">
                    <div class="sec-title">

                        <h3 class="sec-title__title text-gold">
                            {{$text["title"]}}
                        </h3>
                    </div>
                    <p>{!! $text["p_en"] !!}</p>
                    <p class="opacity-75"><i>{!! $text["p_id"] !!}</i></p>
                </div>
            </div>
            <div class="col-xl-6 ">
                <div style="margin-left: 100px; margin-right: -120px;">
                    <div class="why-choose-one__image wow fadeInUp animated"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <img src={{ $text["image1"] }} width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>