@extends('FrontEnd.main.master-front-end')

@section('title', __('Home'))

@section('content')
@include('FrontEnd.main.page-header', ['header'=> $text] )


<section class="why-choose-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="why-choose-two__image">
                    <img src={{ $text["sectionone"]["image1"] }} alt="">
                    <img src={{ $text["sectionone"]["image2"] }} class="why-choose-two__image__two" alt="">
                </div><!-- /.why-choose-two__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="why-choose-two__content">
                    <div class="sec-title">
                        <h3 class="sec-title__title">{{$text["sectionone"]["title"]}}</h3>
                    </div>
                    <p class="why-choose-two__highlight">{{$text["sectionone"]["p_en"]}}</p>
                    <p class="why-choose-two__highlight italic">{{$text["sectionone"]["p_id"]}}</p>


                </div><!-- /.why-choose-two__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

<section class="why-choose-one">
    <div class="container">
        <div class="why-choose-one__inner">
            <div class="row">
                <div class="col-xl-5">
                    <div class="why-choose-one__content">
                        <div class="sec-title">

                            <h3 class="sec-title__title">
                                {{$text["sectionrandd"]["title"]}}</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="why-choose-one__highlighted mb-4">{{$text["sectionrandd"]["subtitle"]}}</p>

                        {!! $text["sectionrandd"]["p"] !!}

                    </div><!-- /.why-choose-one__content -->
                </div><!-- /.col-xl-5 -->
                <div class="col-xl-7">
                    <div class="solox-stretch-element-inside-column" style="margin-left: 0px; margin-right: -102px;">
                        <div class="why-choose-one__image wow fadeInUp animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <img src={{ $text["sectionrandd"]["image"] }} width="100%">
                        </div><!-- /.why-choose-one__image -->
                    </div><!-- /.ogency-stretch-element-inside-column -->
                </div><!-- /.col-xl-7 -->
            </div><!-- /.row -->
        </div><!-- /.why-choose-one__inner -->
    </div><!-- /.container -->
</section>
@endsection