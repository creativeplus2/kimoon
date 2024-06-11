@extends('FrontEnd.main.master-front-end')

@section('title', __('Home'))

@section('content')
@include('FrontEnd.main.page-header', ['header'=> $text] )

<section class="contact-one pt-100">
    <div class="container">
        <div class="contact-one__inner">
            <div class="row">
                <div class="col-xl-7">
                    <div class="contact-one__content">

                        <div class="sec-title">
                            <h3 class="sec-title__title">{{$text["title"]}}</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="contact-one__text">{{$text["subtitle"]}}</p>
                        <!-- /.contact-one__text -->
                        <ul class="list-unstyled contact-one__info">
                            <li class="contact-one__info__item">
                                <div class="contact-one__info__icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div><!-- /.contact-one__info__icon -->
                                <div class="contact-one__info__content">
                                    <p class="contact-one__info__text">{{$text["phonetext"]}}</p>
                                    <!-- /.contact-one__info__text -->
                                    <h4 class="contact-one__info__title"><a href="#">{{ $setting->no_telpon }}</a></h4>
                                    <!-- /.contact-one__info__title -->
                                </div><!-- /.contact-one__info__content -->
                            </li>
                            <li class="contact-one__info__item">
                                <div class="contact-one__info__icon">
                                    <i class="fas fa-envelope"></i>
                                </div><!-- /.contact-one__info__icon -->
                                <div class="contact-one__info__content">
                                    <p class="contact-one__info__text">{{$text["emailtext"]}}</p>
                                    <!-- /.contact-one__info__text -->
                                    <h4 class="contact-one__info__title"><a href="mailto:{{ $setting->email }}">{{
                                            $setting->email }}</a></h4>
                                    <!-- /.contact-one__info__title -->
                                </div><!-- /.contact-one__info__content -->
                            </li>
                            <li class="contact-one__info__item">
                                <div class="contact-one__info__icon">
                                    <i class="fas fa-map-marker"></i>
                                </div><!-- /.contact-one__info__icon -->
                                <div class="contact-one__info__content">
                                    <p class="contact-one__info__text">{{$text["addresstext"]}}</p>
                                    <!-- /.contact-one__info__text -->
                                    <h4 class="contact-one__info__title"><a href="#">{{ $setting->alamat }}</a></h4>
                                    <!-- /.contact-one__info__title -->
                                </div><!-- /.contact-one__info__content -->
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.contact-one__content -->
                </div><!-- /.col-xl-7 -->
                <div class="col-xl-5">
                    <form action="{{ route('web.submit_partnership') }}" method="POST" enctype="multipart/form-data"
                        class="contact-one__form form-one background-base wow fadeInUp animated"
                        style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        @csrf
                        @method('POST')

                        <div class="contact-one__form__top">
                            <div class="sec-title">
                                <h3 class="sec-title__title">Inquiry</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                        </div><!-- /.contact-one__form__top -->
                        <div class="form-one__group">
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="name" placeholder="Your name" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="Email address" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="phone" placeholder="Phone Number" required>
                            </div><!-- /.form-one__control form-one__control--full -->
                            <div class="form-one__control form-one__control--full">
                                <textarea name="message" placeholder="Write  a message"></textarea><!-- /# -->
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control form-one__control--full">
                                <button type="submit" class="solox-btn"><span>Submit</span></button>
                            </div><!-- /.form-one__control -->
                        </div><!-- /.form-one__group -->
                    </form>
                </div><!-- /.col-xl-5 -->
            </div><!-- /.row -->
        </div><!-- /.contact-one__inner -->
    </div><!-- /.container -->
</section>
@endsection