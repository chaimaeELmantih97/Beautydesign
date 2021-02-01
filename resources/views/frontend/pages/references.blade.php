@extends('frontend.layouts.master')

@section('title','Beauty Design - Réferences')

@section('main-content')
<style>
    .zs2 {
        display: block !important;
    }
    .zs1 {
        display: none !important;
    }
    .hamburger span{
        background: #ffffff !important;
    }
    .iconC{
        color: #ffffff;
    }
</style>
@php
$settings=DB::table('settings')->get();
$promotions=App\Models\Promotion::all();
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
            {{-- <div class="tagline"><span></span>
                <h6>Contactez Nous</h6>
            </div> --}}
            <!-- end tagline -->
            <h1>Liste<br>
                <span style="-webkit-text-stroke-color:#ffffff !important;" >des Promos</span></h1>
                <div class="slide-btn"> <a href="#promos">
                    <div class="lines"> <span></span> <span></span> </div>
                    <!-- end lines -->
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 104 104" enable-background="new 0 0 104 104" xml:space="preserve">
                      <circle class="video-play-circle" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="1" cx="52" cy="52" r="50"/>
                    </svg>
                    <b>Défiler vers le bas </b> </a> </div>

        </div>
        {{-- this is fucking crazy --}}
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<section class="work-with-us" id="promos">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn">
                <h6>Promos</h6>
                <h2>La liste des promotions</h2>
            </div>
        </div>
        <div class="card-slider">
            @foreach ($promotions as $key => $service)
            <div class="col-lg-12">
                <div class="card border-0 w-100">
                    {{-- <img class="card-img-top" src="https://picsum.photos/seed/picsum/200/200" alt="Card image cap"> --}}
                    @if($service->photo)
                    <img class="card-img-top" src="{{$service->photo}}" style="height: 200px; object-fit:cover">
                    @else
                    <img class="card-img-top" src="{{asset('backend/img/thumbnail-default.jpg')}}"
                        style="height: 200px; object-fit:cover;">
                    @endif
                    {{-- <div class="card-body"> --}}
                        {{-- <h5 class="card-title"><em><b>{{$service->title}}</b></em></h5> --}}
                        {{-- @php --}}
                        {{-- // $shortdesc=substr($service->description,0,100); --}}
                        {{-- @endphp --}}
                        {{-- <p>
                            {{$service->description}}
                        </p> --}}
                    {{-- </div> --}}
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
@endforeach


@endsection
