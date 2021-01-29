@extends('frontend.layouts.master')

@section('title','Beauty Design Design - À Propos de nous')

@section('main-content')
<style>
    .zs2 {
        display: block !important;
    }

    .zs1 {
        display: none !important;
    }

    .hamburger span {
        background: #ffffff !important;
    }

    .iconC {
        color: #ffffff;
    }

</style>
@php
$settings=DB::table('settings')->get();
@endphp
@foreach ($settings as $data)
<header class="header">
    <aside class="left-side">
        <ul>
            <li><a href="{{$data->facebook}}">FACEBOOK</a></li>
            <li><a href="{{$data->instagram}}">INSTAGRAM</a></li>
            <li><a href="{{$data->linkedin}}">LINKEDIN</a></li>
        </ul>
    </aside>
    <div class="perspective" id="gl" data-imageOriginal="{{url('images/bg.jpg')}}"
        data-imageDepth="{{url('images/bg.jpg')}}" data-horizontalThreshold="30" data-verticalThreshold="13">
        <div class="container">
            <div class="tagline"><span></span>
                <h6>À Propos de Nous</h6>
            </div>
            <!-- end tagline -->
            <h1>Beauty<br>
                <span style="-webkit-text-stroke-color:#ffffff !important;" >Design</span></h1>

            <!-- end slide-btn -->
        </div>
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
@endforeach
<!-- end header -->
<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn">
                {{-- <h6>SMOOTH INTERFACE INTERACTION</h6> --}}
                <h2 data-text="About">Present dans le marché depuis 2015. </h2>
            </div>
            <!-- end col-12 -->
            <div class="col-lg-5 wow fadeIn">
                <h4>{{$about->title}}</h4>
                <img src="{{$about->photo}}}" alt="">
            </div>
            <!-- end col-5 -->
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.10s">
                <p>{!! html_entity_decode($about->description) !!}</p>
            </div>
            <!-- end col-7 -->
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

@endsection
