<script src="{{ asset('frontend/assets/vendors/jquery/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/tiny-slider/tiny-slider.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/countdown/countdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('frontend/assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/solox.js') }}"></script>
<!-- <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-a93b743d-5a0c-4396-92cf-03868366b185" data-elfsight-app-lazy></div> -->
@include('sweetalert::alert')
@stack('js')