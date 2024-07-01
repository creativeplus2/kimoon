<section class="block-plan ">
    <div class="container">

        <div class="tabs-box">
            <div class="tabs-content">
                <div class="tab active-tab fadeInUp animated" id="yearly">
                    <div class="row gutter-y-30">
                        @foreach ($text['members'] as $user)

                        <div class="col-md-12 col-lg-4">
                            <div class="membership-one__card text-center ">
                                @unless ($user["pricediscount"] == $user["price"])
                                <h5 class="membership-one__card__price" style="text-decoration:line-through">
                                    {{format_rupiah($user["price"])}}</h5>
                                @endunless

                                <h4 class="membership-one__card__price">{{format_rupiah($user["pricediscount"])}}</h4>

                                <h4 class="membership-one__card__tagline">{{$user["type"]}}</h4>

                                <ul class="list-unstyled membership-one__card__list">
                                    @php
                                    $arr = explode("\\n", $user['list']);
                                    @endphp
                                    @foreach ( $arr as $l)
                                    <li>
                                        <i class="fa fa-check-circle"></i>
                                        {{$l}}
                                    </li>
                                    @endforeach

                                </ul>
                                <button class="{{" solox-btn solox-btn--black membership-one__card__link member-type-".
                                    $user["slug"] }}">
                                    <span>Select
                                    </span>
                                </button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div><!-- /.tabs-content -->
        </div>


    </div><!-- /.container -->
</section>