<section class="block-form contact-one pt-100">
    <div class="container">
        <div class="contact-one__inner">
            <div class="row">
                <div class="col-xl-7">
                    <div class="contact-one__content">
                        <div class="sec-title">
                            <h3 class="sec-title__title">{{$text["title"]}}</h3>
                        </div>
                        <p class="contact-one__text">{{$text["subtitle"]}}</p>
                        <ul class="list-unstyled contact-one__info">
                            <li class="contact-one__info__item">
                                <div class="contact-one__info__icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-one__info__content">
                                    <p class="mb-0">{{$text["phonetext"]}}</p>
                                    <p><a href="#">{{ $setting->no_telpon }}</a></h4>
                                </div>
                            </li>
                            <li class="contact-one__info__item">
                                <div class="contact-one__info__icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-one__info__content">
                                    <p class="mb-0">{{$text["emailtext"]}}</p>
                                    <p><a href="mailto:{{ $setting->email }}">{{
                                            $setting->email }}</a></h4>
                                </div>
                            </li>
                            <li class="contact-one__info__item">
                                <div class="contact-one__info__icon">
                                    <i class="fas fa-map-marker"></i>
                                </div>
                                <div class="contact-one__info__content">
                                    <p class="mb-0">{{$text["addresstext"]}}</p>
                                    <p><a href="#">{{ $setting->alamat }}</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5">
                    <form action="{{ route('web.submit_partnership') }}" method="POST" enctype="multipart/form-data"
                        class="contact-form-validated contact-one__form form-one background-base wow fadeInUp animated"
                        style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        @csrf
                        @method('POST')

                        <div class="contact-one__form__top">
                            <div class="sec-title">
                                <h3 class="sec-title__title">Inquiry</h3>
                            </div>
                        </div>
                        <div class="form-one__group">
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="name" placeholder="Your name" required>
                            </div>
                            <div class="form-one__control form-one__control--full">
                                <input type="email" name="email" placeholder="Email address" required>
                            </div>
                            <div class="form-one__control form-one__control--full">
                                <input type="text" name="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="form-one__control form-one__control--full">
                                <textarea name="message" placeholder="Write  a message"></textarea><!-- /# -->
                            </div>
                            <div class="form-one__control form-one__control--full">
                                <button type="submit" class="solox-btn"><span>Submit</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>