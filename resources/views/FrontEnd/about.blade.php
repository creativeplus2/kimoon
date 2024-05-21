@extends('FrontEnd.main.master-front-end')

@section('title', __('Home'))

@section('content')
@include('FrontEnd.main.page-header',  ['setting' => $setting, 'slug' => 'About'] )


   <section class="contact-one pt-100">
            <div class="container">
                <div class="contact-one__inner">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="contact-one__content">
                                <img src="assets/images/shapes/contact-1-s-1.png" alt="" class="contact-one__content__shape-1">
                                <img src="assets/images/shapes/contact-1-s-2.png" alt="" class="contact-one__content__shape-2">
                                <div class="sec-title">

                                    <img src="assets/images/shapes/sec-title-s-1.png" alt="Contact with us" class="sec-title__img">


                                    <h6 class="sec-title__tagline">Contact with us</h6><!-- /.sec-title__tagline -->

                                    <h3 class="sec-title__title">get in touch</h3><!-- /.sec-title__title -->
                                </div><!-- /.sec-title -->
                                <p class="contact-one__text">There are many variations of passages of Lorem Ipsum available, but
                                    the majority have suffered simply free text available.</p><!-- /.contact-one__text -->
                                <ul class="list-unstyled contact-one__info">
                                    <li class="contact-one__info__item">
                                        <div class="contact-one__info__icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div><!-- /.contact-one__info__icon -->
                                        <div class="contact-one__info__content">
                                            <p class="contact-one__info__text">Have any Question?</p>
                                            <!-- /.contact-one__info__text -->
                                            <h4 class="contact-one__info__title"><a href="tel:+92(8800)-8960">Free +92 (8800) -
                                                    8960</a></h4><!-- /.contact-one__info__title -->
                                        </div><!-- /.contact-one__info__content -->
                                    </li>
                                    <li class="contact-one__info__item">
                                        <div class="contact-one__info__icon">
                                            <i class="fas fa-envelope"></i>
                                        </div><!-- /.contact-one__info__icon -->
                                        <div class="contact-one__info__content">
                                            <p class="contact-one__info__text">Write Email </p>
                                            <!-- /.contact-one__info__text -->
                                            <h4 class="contact-one__info__title"><a href="mailto:needhelp@company.com">needhelp@company.com</a></h4>
                                            <!-- /.contact-one__info__title -->
                                        </div><!-- /.contact-one__info__content -->
                                    </li>
                                    <li class="contact-one__info__item">
                                        <div class="contact-one__info__icon">
                                            <i class="fas fa-map-marker"></i>
                                        </div><!-- /.contact-one__info__icon -->
                                        <div class="contact-one__info__content">
                                            <p class="contact-one__info__text">Visit Now </p> <!-- /.contact-one__info__text -->
                                            <h4 class="contact-one__info__title"><a href="#">80 broklyn golden street, New
                                                    York</a></h4><!-- /.contact-one__info__title -->
                                        </div><!-- /.contact-one__info__content -->
                                    </li>
                                </ul><!-- /.list-unstyled -->
                            </div><!-- /.contact-one__content -->
                        </div><!-- /.col-xl-7 -->
                        <div class="col-xl-5">
                            <form class="contact-one__form contact-form-validated form-one background-base wow fadeInUp animated" data-wow-duration="1500ms" action="inc/sendemail.php" novalidate="novalidate" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                                <div class="contact-one__form__top">
                                    <div class="sec-title">


                                        <h6 class="sec-title__tagline">Appointment</h6><!-- /.sec-title__tagline -->

                                        <h3 class="sec-title__title">book Now</h3><!-- /.sec-title__title -->
                                    </div><!-- /.sec-title -->
                                </div><!-- /.contact-one__form__top -->
                                <div class="form-one__group">
                                    <div class="form-one__control form-one__control--full">
                                        <input type="text" name="name" placeholder="Your name">
                                    </div><!-- /.form-one__control form-one__control--full -->
                                    <div class="form-one__control form-one__control--full">
                                        <input type="email" name="email" placeholder="Email address">
                                    </div><!-- /.form-one__control form-one__control--full -->
                                    <div class="form-one__control form-one__control--full">
                                        <div class="form-one__control__select">
                                            <label class="sr-only" for="language-select">Select service</label>
                                            <!-- /#language-select.sr-only -->
                                            <div class="dropdown bootstrap-select"><select class="selectpicker" id="language-select">
                                                <option value="Select service">Select service</option>
                                                <option value="Select service 01">Select service 01</option>
                                                <option value="Select service 02">Select service 02</option>
                                            </select><button type="button" tabindex="-1" class="btn dropdown-toggle btn-light" data-bs-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Select service" data-id="language-select"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Select service</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                        </div><!-- /.main-menu__language -->

                                    </div><!-- /.form-one__control form-one__control--full -->
                                    <div class="form-one__control form-one__control--full">
                                        <input class="solox-datepicker hasDatepicker" type="text" name="date" placeholder="Select date" id="dp1716187905626">
                                        <i class="fa fa-calendar-alt form-one__control__icon"></i>
                                    </div><!-- /.form-one__control form-one__control--full -->
                                    <div class="form-one__control form-one__control--full">
                                        <textarea name="message" placeholder="Write  a message"></textarea><!-- /# -->
                                    </div><!-- /.form-one__control -->
                                    <div class="form-one__control form-one__control--full">
                                        <button type="submit" class="solox-btn"><span>Book now</span></button>
                                    </div><!-- /.form-one__control -->
                                </div><!-- /.form-one__group -->
                            </form>
                        </div><!-- /.col-xl-5 -->
                    </div><!-- /.row -->
                </div><!-- /.contact-one__inner -->
            </div><!-- /.container -->
        </section>
@endsection
