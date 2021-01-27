@extends('frontend.layouts.master')
@section('title','Beauty Design Design - Accueil')
@section('main-content')
<style>

.gtco-testimonials {
  position: relative;
  margin-top: 30px;
}
@media (max-width: 767px) {
  .gtco-testimonials {
    margin-top: 20px;
  }
}
.gtco-testimonials h2 {
  font-size: 30px;
  text-align: center;
  color: #333333;
  margin-bottom: 50px;
}
.gtco-testimonials .owl-stage-outer {
  padding: 30px 0;
}
.gtco-testimonials .owl-nav {
  display: none;
}
.gtco-testimonials .owl-dots {
  text-align: center;
}
.gtco-testimonials .owl-dots span {
  position: relative;
  height: 10px;
  width: 10px;
  border-radius: 50%;
  display: block;
  background: #fff;
  border: 2px solid #01b0f8;
  margin: 0 5px;
}
.gtco-testimonials .owl-dots .active {
  box-shadow: none;
}
.gtco-testimonials .owl-dots .active span {
  background: #01b0f8;
  box-shadow: none;
  height: 12px;
  width: 12px;
  margin-bottom: -1px;
}
.gtco-testimonials .card {
  background: #fff;
  box-shadow: 0 8px 30px -7px #c9dff0;
  margin: 0 20px;
  padding: 0 10px;
  border-radius: 20px;
  border: 0;
}
.gtco-testimonials .card .card-img-top {
  max-width: 100px;
  border-radius: 50%;
  margin: 15px auto 0;
  box-shadow: 0 8px 20px -4px #e3eeb58c;
  width: 100px;
  height: 100px;
  object-fit: cover;
}
.gtco-testimonials .card h5 {
  color: #D6A063;
  font-size: 21px;
  line-height: 1.3;
}
.gtco-testimonials .card h5 span {
  font-size: 18px;
  color: #666666;
}
.gtco-testimonials .card p {
  font-size: 18px;
  color: #555;
  padding-bottom: 15px;
}
.gtco-testimonials .active {
  opacity: 0.5;
  transition: all 0.3s;
}
.gtco-testimonials .center {
  opacity: 1;
}
.gtco-testimonials .center h5 {
  font-size: 24px;
}
.gtco-testimonials .center h5 span {
  font-size: 20px;
}
.gtco-testimonials .center .card-img-top {
  max-width: 100%;
  height: 120px;
  width: 120px;
  object-fit: cover;
}
    .header1 {
        display: none !important;
    }

    .zs2 {
        display: none;
    }

    .iconC {
        color: #1D1E22;
    }

    .teamImg{
        height: 200px;
        object-fit:cover;
    }
    @media only screen and (max-width: 768px) {
        .header1 {
            display: block !important;
        }

        .header2 {
            display: none !important;
        }

        .header3 {
            display: none !important;
        }

        .zs1 {
            display: none !important;
        }

        .zs2 {
            display: block !important;
        }

        .hamburger span {
            background: #ffffff !important;
        }
        .teamImg{
        height: 300px;
        object-fit:cover;
       }
    }
    .spanmenu{
        background: #ffffff !important;
    }
</style>
@php
$settings=DB::table('settings')->get();
@endphp
<header class="header header1">
    @if(count($banners)>0)
    <div class="swiper-slider">
        <div class="swiper-wrapper">
            @foreach($banners as $key=>$banner)
            <div class="swiper-slide" data-tilt data-tilt-max="5" data-tilt-speed="500" data-tilt-perspective="1500">
                <div class="slide-inner bg-image" data-background="{{$banner->photo}}"
                    style="width: 100vw;height: 100vh;background-size: cover;">
                    <div class="container">
                        <div class="tagline"><span>{{$key+1}}</span>
                            <h6 style="color: {{$banner->description_color}} !important;">{{$banner->title}}</h6>
                        </div>
                        <!-- end tagline -->
                        <h1 style="color: {{$banner->description_color}} !important;"><br>
                            <span
                                style="-webkit-text-stroke-color:{{$banner->description_color}} !important;">{{$banner->description}}</span>
                        </h1>
                        <div class="slide-btn">
                            <a href="{{route('product-lists')}}">
                                <div class="lines"> <span></span> <span></span> </div>
                                <!-- end lines -->
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 104 104"
                                    enable-background="new 0 0 104 104" xml:space="preserve">
                                    <circle class="video-play-circle" fill="none" stroke="#fff" stroke-width="2"
                                        stroke-miterlimit="1" cx="52" cy="52" r="50" />
                                </svg>
                                <b>Voir Les Produits</b>
                            </a> </div>
                        <!-- end slide-btn -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end slide-inner -->
            </div>
            @endforeach
        </div>
        <!-- end swiper-wrapper -->
        <div class="swiper-pagination"></div>
        <!-- end swiper-pagination -->
        <div class="swiper-fraction"></div>
        <!-- end swiper-fraction -->
    </div>
    <!-- end swiper-slider -->
    @endif
</header>

<!-- end navbar -->
<header class="header header2"
    style="height: 100vh; width: 100vw; background-repeat: no-repeat !important; background-position: center !important; background-image: url('/images/bgheader3.jpg'); background-size: cover !important;">
</header>
<!-- end header -->

<section class="header3" style="margin-top: -100vh;">
    @if(count($banners)>0)
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($banners as $key=>$banner)
            <div class="swiper-slide" id="slide-{{$key}}">
                <div class="slide-inner" style="position: relative;">
                    <img src="{{$banner->photo}}">
                    <div
                        style="position: absolute; bottom: 0; left: 0; background-color: #fff; width: 100%; padding: 20px; text-align: center;">
                        <h4>{{$banner->title}}</h4>
                        <p>{{$banner->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
    </div>
    @endif
    <!-- end swiper-slider -->
</section>

<!-- section 2 -->
<section  style="background-color: #f7e6d567">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0" style="height:350px; border: none !important; border-radius: none; ">
                    <img class="card-img" style="height: 100%;"
                        src="https://images.pexels.com/photos/1005638/pexels-photo-1005638.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                        alt="Bologna">
                    <div class="card-img-overlay text-white  d-flex flex-column justify-content-center"
                        style="background-color: rgba(24, 26, 19, 0.473); text-align:center;">
                        <h2 class="card-title">Catalogue Rayonnage </h2>
                        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                            <a href="/catalogueR.pdf" target="_blanck" class="btn btn-outline-light align-center"> <i class="fa fa-download download-btn"></i> Voir Le catalogue</a>
                        </div>
                    </div>
                </div>
                <div class="card border-0" style="height:350px; border: none !important; border-radius: none;">
                    <img class="card-img" style="height: 100%;"
                        src="https://images.pexels.com/photos/273671/pexels-photo-273671.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                        alt="Bologna">
                    <div class="card-img-overlay text-white  d-flex flex-column justify-content-center"
                        style="background-color: rgba(14, 14, 14, 0.534); text-align:center;">
                        <h2 class="card-title">Catalogue Mobilier de Bureau .</h2>
                        <div style="width: 100%; display: flex; align-items: center; justify-content: center;">
                            <a href="/catalogueM.pdf" target="_blanck" class="btn btn-outline-light align-center"><i class="fa fa-download download-btn"></i> Voir le catalogue</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="height: 100%;">

                <div class="row ">
                    <div class="col-md-12 mt-2" style="">
                        <h5><b><em>Present dans le marché depuis 2015 .</em></b></h5>
                        <h3 style="color: #D6A063"> <b>Beauty Design</b> </h3>
                        <p style="text-align:justify; text-justify: inter-word;">
                            {!! html_entity_decode($about->summary) !!}
                        </p>
                    </div>
                    {{-- <div class="col-md-5" >
                        <div class="card border-0 "
                            style=" border: none !important; border-radius: none; width: 100%; height:100%; background-color: royalblue;">
                            <img class="card-img" style=" width: 100%; height:100%; object-fit: cover;"
                                src="{{$about->photo}}" alt="Bologna">
                            <div class="card-img-overlay text-white  d-flex flex-column justify-content-center"
                                style="background-color: rgba(50, 54, 16, 0.733); text-align:center;">
                                <h2 class="card-title">À PROPOS DE NOUS.</h2>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="row mt-2" style="height: 60%;">
                    <div class="col-md-12">
                        <div class="item" style="width: 100%; height:100%;">
                            <div class="card border-0"
                                style="height:420px; border: none !important; border-radius: none;">
                                <img class="card-img" style="height: 100%; width:100%" src="https://images.pexels.com/photos/245240/pexels-photo-245240.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                                    alt="Bologna">
                                <div class="card-img-overlay text-white  d-flex flex-column justify-content-center"
                                    style="background-color: rgba(14, 14, 14, 0.651); text-align:center;">
                                    <h4 class="card-title">N’hésitez pas à nous contacter pour échanger
                                        au sujet de l’aménagement de votre espace professionnel ou Vos Dépôts de Stockage.</h4>
                                    <div
                                        style="width: 100%; display: flex; align-items: center; justify-content: center;">
                                        <a href="{{route('contact')}}" class="btn btn-outline-light align-center">Contactez nous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end intro -->
<section class="process">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12 wow fadeIn">
                <h6>Les Métiers de Beauty Design.</h6>
                <h2 data-text="Métiers">CE QUE NOUS FAISONS</h2>
            </div>
            <!-- end col-12 -->
            <div class="col-md-4 wow fadeIn" data-wow-delay="0s"> <span style="color: black !important">01</span>
                <figure> <img src="{{url('images/B.svg')}}" alt="Image">
                    <figcaption>
                        <h5>Mobilier de Bureau</h5>
                    </figcaption>
                </figure>
            </div>
            <!-- end col-3 -->
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.05s"> <span style="color: black !important">02</span>
                <figure> <img src="{{url('images/R.svg')}}" alt="Image">
                    <figcaption>
                        <h5>Rayonnage</h5>
                    </figcaption>
                </figure>
            </div>
            <!-- end col-3 -->
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.10s"> <span style="color: black !important">03</span>
                <figure> <img src="{{url('images/F.svg')}}" alt="Image">
                    <figcaption>
                        <h5>Siege et Fauteuil</h5>
                    </figcaption>
                </figure>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

<!-- end works -->
<section class="work-with-us">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn">
                <h6>Nos Réalisations</h6>
                <h2>Nos Services</h2>
            </div>
        </div>
        <div class="card-slider">
            @foreach ($services as $key => $service)
            <div class="col-lg-12">
                <div class="card border-0 w-100">
                    {{-- <img class="card-img-top" src="https://picsum.photos/seed/picsum/200/200" alt="Card image cap"> --}}
                    @if($service->photo)
                    <img class="card-img-top" src="{{$service->photo}}" style="height: 200px;">
                    @else
                    <img class="card-img-top" src="{{asset('backend/img/thumbnail-default.jpg')}}"
                        style="height: 200px;">
                    @endif
                    <div class="card-body">
                        {{-- <h5 class="card-title"><em><b>{{$service->title}}</b></em></h5> --}}
                        @php
                        // $shortdesc=substr($service->description,0,100);
                        @endphp
                        <p>
                            {{$service->description}}
                        </p>
                    </div>
                    <div
                        style="background: #202020; width:100%; padding:10px; display:flex; justify-content: space-between">
                        <a href="#" style="color: #ffffff;"><em><b>{{$service->title}}</b></em></a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end container -->
</section>
<!-- end work-with-us -->
@if (count($testimonials) != 0)
<section >
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <div class="section-heading text-center">
                    <h3>Un mot de nos clients</h3>
                </div>
            </div>

        </div>
        <div class="testi-wrap">

            @foreach ($testimonials as $key=>$item)
            <div class="client-single {{ $key == 0 ? "active" : "inactive" }} position-{{$key+1}}" data-position="position-{{$key+1}}">
                <div class="client-img">
                    <img src="{{$item->photo}}"
                        alt="">
                </div>
                <div class="client-comment">
                    <h6>{{$item->description}} </h6>
                    <span><i class="fa fa-quote-left"></i></span>
                </div>
                <div class="client-info">
                    <h3>dit par </h3>
                    <p><a href="#">{{$item->name}}</a></p>
                </div>
            </div>
            @endforeach



        </div>
    </div> --}}

    <div class="gtco-testimonials mb-5 mt-5">
        <h2>Clients Satisfaits</h2>
        <p style="text-align: center">Nous fournissons toujours les meilleurs services. Ce que disent les clients satisfaits de Beauty Design.</p>
        <div class="owl-carousel owl-carousel1 owl-theme">
          @foreach ($testimonials as $testimonial)
          <div>
            <div class="card text-center"><img class="card-img-top" src="{{$testimonial->photo}}" alt="">
              <div class="card-body">
                <h5>{{$testimonial->name}} <br />
                  <span> {{$testimonial->job}} </span></h5>
                <p class="card-text">“ {{$testimonial->description}} ” </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
</section>
@endif

