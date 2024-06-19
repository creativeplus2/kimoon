<section class="block-four">
    <div class="container position-relative">
        <div class="position-absolute bg-yellowlight h-100 z-0 " style="width:10000px"></div>
        <div class="row py-5 py-sm-6 position-relative">
            <div class="col-md-6 position-relative inline-block">
                <div class="wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <img src={{ $text["image1"] }} class="w-100 -ml-2 -ml-sm-6">
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center z-1">
                <div class="px-5 px-md-0 text-darkgold">
                    <h3 class="sec-title__title text-gold my-5">
                        {{$text["title"]}}
                    </h3>
                    <p>{!! $text["p_en"] !!}</p>
                    <p class="opacity-75"><i>{!! $text["p_id"] !!}</i></p>
                </div>
            </div>
        </div>
    </div>
</section>