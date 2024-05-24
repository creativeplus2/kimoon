@extends('FrontEnd.main.master-front-end')

@section('title', __('Home'))

@section('content')
@include('FrontEnd.main.page-header', ['setting' => $setting, 'slug' => 'About'] )


<section class="why-choose-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="why-choose-two__image">
                    <img src="assets/images/resources/why-choose-2-1.jpg" alt="">
                    <img src="assets/images/resources/why-choose-2-2.jpg" class="why-choose-two__image__two" alt="">
                    <img src="assets/images/shapes/why-choose-2-s-1.png" class="why-choose-two__image__shape" alt="">
                    <div class="why-choose-two__image__icon wow fadeInUp animated" data-wow-duration="1500ms"
                        style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        <img src="assets/images/shapes/why-choose-2-s-2.png" alt="">
                    </div><!-- /.why-choose-two__icon -->
                </div><!-- /.why-choose-two__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="why-choose-two__content">
                    <div class="sec-title">
                        <h3 class="sec-title__title">Join Us in Celebrating Local Beauty</h3><!-- /.sec-title__title -->
                    </div>
                    <p class="why-choose-two__highlight">At Kimoon we are proud to feature a range of locally-sourced
                        beauty products. By incorporating these into your daily routine, you not only elevate your
                        beauty regimen but also become a part of a larger movement towards sustainability and community
                        support.</p>
                    <p class="why-choose-two__highlight italic">Temukan perbedaan keindahan lokal dengan koleksi kami
                        yang
                        dikuratori dengan cermat. Setiap produk di lini lokal kami dipilih karena kualitasnya yang luar
                        biasa, keberlanjutan, dan semangat para penciptanya. Rangkul keindahan yang berasal dari
                        mendukung komunitas lokal Anda</p>


                </div><!-- /.why-choose-two__content -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<section class="funfact-one">
    <div class="container">
        <ul class="list-unstyled funfact-one__list">
            <li class="funfact-one__item count-box counted">
                <i class="funfact-one__icon icon-massage"></i><!-- /.funfact-one__icon -->
                <div class="funfact-one__content">
                    <h3 class="funfact-one__count count-text" data-stop="23" data-speed="1500">23</h3>
                    <!-- /.funfact-one__count -->
                    <p class="funfact-one__text">Years of Experience</p><!-- /.funfact-one__text -->
                </div><!-- /.funfact-one__content -->
            </li><!-- /.funfact-one__item -->
            <li class="funfact-one__item count-box counted">
                <i class="funfact-one__icon icon-lotus"></i><!-- /.funfact-one__icon -->
                <div class="funfact-one__content">
                    <h3 class="funfact-one__count count-text" data-stop="870" data-speed="1500">870</h3>
                    <!-- /.funfact-one__count -->
                    <p class="funfact-one__text">Wellness &amp; Spa</p><!-- /.funfact-one__text -->
                </div><!-- /.funfact-one__content -->
            </li><!-- /.funfact-one__item -->
            <li class="funfact-one__item count-box counted">
                <i class="funfact-one__icon icon-herbal"></i><!-- /.funfact-one__icon -->
                <div class="funfact-one__content">
                    <h3 class="funfact-one__count count-text" data-stop="30" data-speed="1500">30</h3>
                    <!-- /.funfact-one__count -->
                    <p class="funfact-one__text">Herbal Treatment</p><!-- /.funfact-one__text -->
                </div><!-- /.funfact-one__content -->
            </li><!-- /.funfact-one__item -->
            <li class="funfact-one__item count-box counted">
                <i class="funfact-one__icon icon-customer-service"></i><!-- /.funfact-one__icon -->
                <div class="funfact-one__content">
                    <h3 class="funfact-one__count count-text" data-stop="980" data-speed="1500">980</h3>
                    <!-- /.funfact-one__count -->
                    <p class="funfact-one__text">Happy Clients</p><!-- /.funfact-one__text -->
                </div><!-- /.funfact-one__content -->
            </li><!-- /.funfact-one__item -->
        </ul><!-- /.list-unstyled funfact-one__list -->
    </div><!-- /.container -->
</section>
<section class="why-choose-one">
    <img src="assets/images/shapes/why-choose-1-bg-s1.png" class="why-choose-one__shape-1" alt="">
    <div class="container">
        <div class="why-choose-one__inner">
            <div class="row">
                <div class="col-xl-5">
                    <div class="why-choose-one__content">
                        <div class="sec-title">

                            <h3 class="sec-title__title">R&D Kimoon</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="why-choose-one__highlighted">Spesialisasi di Bidang Microbiome Skin Research dan
                            Enhanced Natural Substances untuk Regenerasi Kulit</p>
                        <!-- /.why-choose-one__highlighted -->

                        <p class="why-choose-one__text">

                            Di Kimoon, tim R&D kami selalu berada di garis depan inovasi, khususnya dalam bidang
                            microbiome skin research dan penggunaan bahan alami yang ditingkatkan untuk regenerasi
                            kulit. Kami memahami bahwa kesehatan kulit tidak hanya bergantung pada perawatan eksternal,
                            tetapi juga pada keseimbangan mikrobioma kulit – komunitas mikroorganisme yang hidup di
                            permukaan kulit kita.
                        </p>
                        <p>

                            Tim peneliti kami secara intensif mempelajari bagaimana mikrobioma kulit berinteraksi dengan
                            produk perawatan kulit. Dengan penelitian mendalam, kami mengembangkan formulasi yang
                            mendukung keseimbangan mikrobioma, membantu menjaga kulit tetap sehat, terhidrasi, dan tahan
                            terhadap berbagai masalah kulit.</p>
                        <p>
                            Selain itu, kami juga fokus pada penggunaan bahan-bahan alami yang ditingkatkan, seperti
                            ekstrak tumbuhan dan enzim alami, yang terbukti memiliki khasiat untuk mempercepat
                            regenerasi kulit. Bahan-bahan ini tidak hanya aman dan lembut untuk kulit, tetapi juga
                            memberikan hasil yang nyata dalam memperbaiki tekstur kulit, mengurangi tanda penuaan, dan
                            meningkatkan elastisitas kulit.</p>
                        <p>
                            Melalui kombinasi penelitian microbiome dan bahan alami yang ditingkatkan, Kimoon
                            berkomitmen untuk terus menghadirkan produk perawatan kulit yang inovatif dan efektif,
                            membantu Anda mendapatkan kulit yang sehat dan bercahaya secara alami.</p>
                        <!-- /.why-choose-one__text -->
                        <ul class="list-unstyled why-choose-one__list">
                            <li class="why-choose-one__list__item">
                                <div class="why-choose-one__list__icon">
                                    <i class="icon-tick"></i>
                                </div><!-- /.why-choose-one__list__icon -->
                                <h4 class="why-choose-one__list__title"><a href="team.html">Expert <br>
                                        staff</a></h4><!-- /.why-choose-one__list__title -->
                                <p class="why-choose-one__list__text">There are many variations of the passages of
                                    available.</p><!-- /.why-choose-one__list__text -->
                            </li><!-- /.why-choose-one__list__item -->
                            <li class="why-choose-one__list__item">
                                <div class="why-choose-one__list__icon">
                                    <i class="icon-tick"></i>
                                </div><!-- /.why-choose-one__list__icon -->
                                <h4 class="why-choose-one__list__title"><a href="services.html">Brilliant
                                        <br>Services</a></h4><!-- /.why-choose-one__list__title -->
                                <p class="why-choose-one__list__text">There are many variations of the passages of
                                    available.</p><!-- /.why-choose-one__list__text -->
                            </li><!-- /.why-choose-one__list__item -->
                        </ul><!-- /.list-unstyled why-choose-one__list -->
                    </div><!-- /.why-choose-one__content -->
                </div><!-- /.col-xl-5 -->
                <div class="col-xl-7">
                    <div class="solox-stretch-element-inside-column" style="margin-left: 0px; margin-right: -102px;">
                        <div class="why-choose-one__image wow fadeInUp animated"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <img src="assets/images/resources/why-choose-1-1.jpg" alt="">
                        </div><!-- /.why-choose-one__image -->
                    </div><!-- /.ogency-stretch-element-inside-column -->
                </div><!-- /.col-xl-7 -->
            </div><!-- /.row -->
        </div><!-- /.why-choose-one__inner -->
    </div><!-- /.container -->
</section>
@endsection