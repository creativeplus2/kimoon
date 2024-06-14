<section class="block-two">
    <div class="container">
        <div class="row gx-5 py-4 py-sm-6 position-relative">
            <div class="col-lg-6">
                <div class="wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                    <img src={{ $text["image2"] }} alt="" class="w-100 position-absolute z-0"
                        style="left: -20%; height:80%">
                    <img src={{ $text["image1"] }} alt="" class="w-100 position-relative z-1"
                        style="margin-top:20%; margin-left:-10%; height:80%">

                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <div class="text-darkgold">
                    <div class="sec-title">
                        <h3 class="sec-title__title text-gold">{{$text["title"]}}</h3>
                    </div>
                    <p>{!! $text["p_en"] !!}</p>
                    <p class="opacity-75"><i>{!! $text["p_id"] !!}</i></p>

                </div>
            </div>
        </div>
    </div>
</section>