@php
$brands=App\Models\Brand::all();
@endphp
<style>

.owl-dots {
text-align: center;
margin-top: 4%;
display: none;
}
.owl-dot {
display: inline-block;
height: 15px !important;
width: 15px !important;
background-color: #878787 !important;
opacity: 0.8;
border-radius: 50%;
margin: 0 5px;
}
.owl-dot.active {
background-color: #000 !important;
}

.gtco-testimonials .owl-dots span{
    display:none !important;
}
</style>
<section class="clients">
    <div class="container" style="position: relative;z-index: 2;">
        <div class="row">
            <div class="col-12 wow fadeIn">
                <h6 style="display: block; line-height: 1;margin-bottom: 20px;font-family: 'Fjalla One', sans-serif;font-size: 14px;">Clients avec lesquels nous sommes fiers de travailler :</h6>
                <h2 style="margin-bottom: 60px;
                font-weight: 800;
                font-size: 60px;
                line-height: 1.2;">Nos Références </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center" style="text-align: center">
            <div class="brand-carousel section-padding owl-carousel">
                @foreach ($brands as $key=>$brand)
                <div class="single-logo">
                    <img src="{{$brand->photo}}" style="height: 150px; width:170px; object-fit: contain; padding:7%" alt="">
                </div>
                @endforeach
            </div>

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end clients -->

@php
$settings=DB::table('settings')->get();
@endphp
@foreach ($settings as $data)
<footer class="footer">
    <div class="footer-quote wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    {{-- <img src="{{$data->logo}}" alt="Image"> --}}
                    <h1 style="font-family: 'Yellowtail', cursive; color:#ffffff ;">Beauty Design</h1>
                    {{-- <h3>Let's create the flexible website for your business ?</h3> --}}
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer-quote -->
    <div class="footer-contact wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <address>
                        {{$data->address}}
                    </address>
                </div>
                <!-- end col-4 -->
                <div class="col-md-6">
                    <address>
                        <a href="tel:{{$data->phone}}"> {{$data->phone}}</a>
                    </address>
                    <address>
                        <a href="https://api.whatsapp.com/send?phone=212660756195"> +212 660 756 195</a>
                    </address>
                    <address>
                        <a href="mailto:{{$data->email}}">{{$data->email}}</a>
                    </address>
                </div>
                <!-- end col-4 -->

                <!-- end col-2 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer-contact -->
    <div class="footer-bottom wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-2">
                    <h5>CONNECTER AVEC Beauty Design </h5>
                    <ul>
                        <li><a target='_blank' href="{{$data->instagram}}">Instagram</a></li>
                        <li><a target='_blank' href="{{$data->facebook}}">Facebook</a></li>
                        <li><a target='_blank' href="{{$data->linkedin}}">Linkedin</a></li>
                        <li><a target='_blank' href="https://api.whatsapp.com/send?phone=212660756195">Whatsapp</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 float-right mt-2">
                    <h5>Liens Utiles </h5>
                    <ul>
                        <li><a href="{{route('home')}}">Accueil</a></li>
                        <li><a href="{{route('about-us')}}">À PROPOS</a></li>
                        <li><a href="{{route('product-lists')}}">Produits</a></li>
                        <li><a href="{{route('promotions')}}">Promotions</a></li>
                        <li><a href="{{route('blog')}}">Blogs</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
                <!-- end col-8 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer-bottom -->
</footer>
@endforeach
<!-- end footer -->

<!-- JS FILES -->
<script src="{{url('frontend/js/jquery.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{url('frontend/js/swiper.min.js')}}"></script>
<script src="{{url('frontend/js/tilt.jquery.js')}}"></script>
<script src="{{url('frontend/js/wow.min.js')}}"></script>
<script src="{{url('frontend/js/odometer.min.js')}}"></script>
<script src="{{url('frontend/js/jquery.typewriter.js')}}"></script>
<script src="{{url('frontend/js/fancybox.min.js')}}"></script>
<script src="{{url('frontend/js/app.js')}}"></script>
<script src="{{url('frontend/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        speed: 1000,
        slidesPerView: 2,
        loop: true,
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            560: {
                slidesPerView: 1,
            },
        },
    });
    // var bgs=['https://images.pexels.com/photos/3637943/pexels-photo-3637943.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
    // 'https://images.pexels.com/photos/1437493/pexels-photo-1437493.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
    // 'https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
    // ];
    swiper.on('transitionStart', function () {
        //     var x = Math.floor(Math.random() * (2 + 1));
        //   $('.header2').css('background-image', 'url("' + bgs[x] + '")');
        if ($(window).width() >= '560') {
            $('.swiper-slide').removeClass('slide-active');
            $(swiper.slides[swiper.activeIndex + 1]).addClass('slide-active');
        } else {
            $('.swiper-slide').addClass('slide-active');
        }
    });

    window.onload = function () {
        if ($(window).width() < '560') {
            $('.swiper-slide').addClass('slide-active');
        }
    }
    window.onresize = function () {
        if ($(window).width() < '560') {
            $('.swiper-slide').addClass('slide-active');
        } else {
            $('.swiper-slide').removeClass('slide-active');
            $(swiper.slides[swiper.activeIndex + 1]).addClass('slide-active');
        }
    }

</script>
<script>
    (function () {
        "use strict";
        var carousels = function () {
            $(".owl-carousel1").owlCarousel({
                loop: true,
                center: true,
                margin: 0,
                responsiveClass: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    680: {
                        items: 2,
                        nav: false,
                        loop: false
                    },
                    1000: {
                        items: 3,
                        nav: true
                    }
                }
            });
        };

        (function ($) {
            carousels();
        })(jQuery);
    })();

</script>

<script>
    $(document).ready(function ($) {
        $('.card-slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            stagePadding: 50,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            arrows: true,
            responsive: [{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });

</script>

<script>
    $(document).ready(function () {

        $('.client-single').on('click', function (event) {
            event.preventDefault();

            var active = $(this).hasClass('active');

            var parent = $(this).parents('.testi-wrap');

            if (!active) {
                var activeBlock = parent.find('.client-single.active');

                var currentPos = $(this).attr('data-position');

                var newPos = activeBlock.attr('data-position');

                activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(
                    currentPos);
                activeBlock.attr('data-position', currentPos);

                $(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(
                    newPos);
                $(this).attr('data-position', newPos);

            }
        });

    }(jQuery));

</script>

<script>
    $('.brand-carousel').owlCarousel({
    loop:true,
    margin:20,
    autoplay:true,
    responsive:{
        0:{
        items:2
        },
        600:{
        items:3
        },
        1000:{
        items:6
        }
    }
    })

</script>


