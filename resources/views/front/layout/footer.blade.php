
<div class="chat-circle" id="chat-circle" class="btn btn-raised">
    <div id="chat-overlay"></div>
    <i class="fa fa-phone" style="margin-right:22px!important"></i>
</div>

<div class="chat-box">
    <div class="chat-box-header">
        <div >
            <a href="{{$settings->facebook}}"  target="_blank"  class="fa faaa fa-facebook"></a>
            <a href="{{$settings->twitter}}"  target="_blank" class="fa  faaa fa-twitter"></a>
            <a href="{{$settings->whatsapp}}"  target="_blank" class="fa  faaa fa-whatsapp"></a>
            <a href="{{$settings->youtube}}" target="_blank"  class="fa  faaa fa-youtube"></a>
            <a href="{{$settings->instagram}}" target="_blank" class="fa faaa fa-instagram"></a>
        </div>
        <span class="chat-box-toggle"><i class="fa fa-window-close btnchat-circle"></i></span>
    </div>


</div>

<footer>
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-widget">
                        <img src="{{$settings->logo}}" class="footer-logo" alt="{{$settings->name}}" style="height: 91px;">
                    </div>
                </div>
                <!-- WIDGET -->
                <div class="col-md-5">
                    <div class="footer-widget">
                        @inject('Setting','App\Models\Setting')


                        <div class="inner">
                            <p>  {!! $settings->footer_description !!}  </p>
                            <a href="https://www.tripadvisor.com/" target="_blank">
{{--                                <div class="tripadvisor-banner">--}}
{{--                                    <span class="review">Recommended</span>--}}
{{--                                    <img src="{{url('front')}}/images/icons/tripadvisor.png" alt="Image">--}}
{{--                                </div>--}}
                            </a>
                        </div>
                    </div>
                </div>
                <!-- WIDGET -->
                <!-- WIDGET -->

                <!-- WIDGET -->
                <div class="col-md-4">
                    <div class="footer-widget">
                        <h3>Contact Info</h3>
                        <div class="inner">
                            <ul class="contact-details">
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    {{$settings->address}}
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    {{$settings->phone}}
                                </li>
                                <li>
                                    <i class="fa fa-fax"></i>
                                    {{$settings->fax}}
                                </li>

                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SUBFOOTER -->
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyrights">&copy; 2021 Rustaq. Designed by
                        <a href="https://uramit.com/" target="_blank">Uram-it</a>.
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social-media">
                        <a class="facebook" data-original-title="Facebook" data-toggle="tooltip"
                           href="{{$settings->facebook}}">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="twitter" data-original-title="Twitter" data-toggle="tooltip"
                           href="{{$settings->twitter}}">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="googleplus" data-original-title="Google Plus" data-toggle="tooltip"
                           href="{{$settings->instagram}}">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a class="linkedin" data-original-title="Linkedin" data-toggle="tooltip"
                           href="{{$settings->linkedin}}">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a class="youtube" data-original-title="Youtube" data-toggle="tooltip"
                           href="{{$settings->youtube}}">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- ========== CONTACT NOTIFICATION ========== -->
<div id="contact-notification" class="notification fixed"></div>
<!-- ========== BACK TO TOP ========== -->
<div class="back-to-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>
<!-- ========== JAVASCRIPT ========== -->
<script src="{{url('front')}}/js/jquery.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAIcQUxj9rT_a3_5GhMp-i6xVqMrtasqws"></script>
<script src="{{url('front')}}/js/bootstrap.min.js"></script>
<script src="{{url('front')}}/js/jquery.mmenu.js"></script>
<script src="{{url('front')}}/js/jquery.inview.min.js"></script>
<script src="{{url('front')}}/js/jquery.countdown.min.js"></script>
<script src="{{url('front')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{url('front')}}/js/owl.carousel.min.js"></script>
<script src="{{url('front')}}/js/owl.carousel.thumbs.min.js"></script>
<script src="{{url('front')}}/js/isotope.pkgd.min.js"></script>
<script src="{{url('front')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{url('front')}}/js/masonry.pkgd.min.js"></script>
<script src="{{url('front')}}/js/wow.min.js"></script>
<script src="{{url('front')}}/js/countup.min.js"></script>
<script src="{{url('front')}}/js/moment.min.js"></script>
<script src="{{url('front')}}/js/daterangepicker.js"></script>

<!-- ========== for Rtl ========== -->
<script src="{{url('front')}}/js/parallax.min.rtl.js"></script>
<!-- ========== for Rtl ========== -->

<script src="{{url('front')}}/js/smoothscroll.min.js"></script>
<script src="{{url('front')}}/js/instafeed.min.js"></script>
<script src="{{url('front')}}/js/main.js"></script>
<!-- ========== REVOLUTION SLIDER ========== -->
<script src="{{url('front')}}/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{url('front')}}/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{url('front')}}/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script>

    $(document).delegate(".chat-btn", "click", function() {
        var value = $(this).attr("chat-value");
        var name = $(this).html();
        $("#chat-input").attr("disabled", false);
        generate_message(name, 'self');
    })
    $(".btnchat-circle").click(function() {
        $(".chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    })
    $(".chat-circle").click(function() {
        $(".chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');
    });


</script>
<script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>


<?php
$errors = session()->get("errors");
?>

@if( session()->has("errors"))
    <?php
    $e = implode(' - ', $errors->all());
    ?>

    <script>
        Swal.fire({
            icon: 'warning',
            title: "{{__('lang.Sorry')}}",
            text: "{{$e}} ",
            type: "error",
            timer: 5000,
            showConfirmButton: false
        });
    </script>

    @endif
@yield('js')
</body>
</html>
