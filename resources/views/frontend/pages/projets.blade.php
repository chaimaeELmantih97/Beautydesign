@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Liste des projets')

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
@endphp
@php
    $projets=App\Models\Service::paginate(5);
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
            <div class="slide-btn"> <a href="#">
                    <div class="lines"> <span></span> <span></span> </div>
                    <!-- end lines -->
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" viewBox="0 0 104 104" enable-background="new 0 0 104 104" xml:space="preserve">
                        <circle class="video-play-circle" fill="none" stroke="#fff" stroke-width="2"
                            stroke-miterlimit="1" cx="52" cy="52" r="50" />
                    </svg>
                    <b>LEARN MORE</b>
                </a> </div>
            <!-- end slide-btn -->
        </div>
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<!-- end header -->
@endforeach
@php
    $bg=['#ece6f4','#ebf8f3','#f4eedf','#e5f2f7','#f5efe8']
@endphp
<section class="works">
    <div class="container">
      <div class="row">
        <div class="col-12 wow fadeIn">
          <h6>Nos Réalisations</h6>
          <h2 data-text="Projets">Nos projets et portefeuilles sélectionnés</h2>
        </div>
        <!-- end col-12 -->
        <div class="col-12">
            @foreach ($projets as $key=>$data)
           <div class="project-box wow fadeIn" data-bg="{{$bg[$key]}}">
            <figure>
                @if($data->photo)
                    <a href="{{$data->photo}}" data-fancybox><img src="{{$data->photo}}" alt="Image"></a>
                  @else
                    <a href="{{asset('backend/img/thumbnail-default.jpg')}}" data-fancybox><img src="{{asset('backend/img/thumbnail-default.jpg')}}" alt="Image"></a>
                  @endif
                </figure>
            <div class="content-box">
              <div class="inner" > <small>{{$data->tag}}</small>
                <h3 ><span style="color: black !important">{{$data->title}}</span></h3>
                <div class="custom-link"> <a href="{{route('product-detail',$data->slug)}}" >
                  <div class="lines"> <span></span> <span></span> </div>
                  <!-- end lines -->
                  <b>Savoir Plus</b></a> </div>
                <!-- end custom-link -->
              </div>
              <!-- end inner -->
            </div>
            <!-- end content-box -->
          </div>
          @endforeach

        </div>
        <!-- end col-12 -->

      </div>
      <!-- end row -->
      <div class="row d-flex align-items-center justify-content-center">
        @if($projets instanceof \Illuminate\Pagination\LengthAwarePaginator)
        {{$projets->appends($_GET)->links()}}
        @endif
      </div>
    </div>
    <!-- end container -->
  </section>
@endsection
