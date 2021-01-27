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
@endphp
@foreach ($settings as $data)
@php
     $brands=App\Models\Brand::all();
     $brands2=App\Models\Brand::limit(8)->get();
 @endphp
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
                <h6>Références</h6>
            </div>
            <!-- end tagline -->
            <h1>Beauty<br>
                <span>Design</span></h1>

            <!-- end slide-btn -->
        </div>
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<!-- end header -->
<section class="clients">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.10s">
                <ul>
                    @foreach ($brands as $key=>$brand)
                    <li><img src="{{$brand->photo}}" style="height: 100px;" alt="Image"><small>{{$brand->title}}</small></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-7 wow fadeIn" data-wow-delay="0.10s">
                <ul>
                    @foreach ($brands as $key=>$brand)
                    <li><img src="{{$brand->photo}}" style="height: 100px;" alt="Image"><small>{{$brand->title}}</small></li>
                    @endforeach
                </ul>
            </div>
            <!-- end col-7 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

<!-- end hello -->
@endforeach


@endsection
