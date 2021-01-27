@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Liste des Produits')

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
@php
$projets=App\Models\Service::paginate(5);
@endphp
@foreach ($settings as $data)
<header class="header">
    <aside class="left-side">
        <ul>
            <li><a href="{{$data->facebook}}">FACEBOOK</a></li>
            <li><a href="{{$data->instagram}}">Instagram</a></li>
            <li><a href="{{$data->linkedin}}">Linkedin</a></li>
        </ul>
    </aside>
    <div class="perspective" id="gl" data-imageOriginal="{{url('images/bg.jpg')}}"
        data-imageDepth="{{url('images/bg.jpg')}}" data-horizontalThreshold="30" data-verticalThreshold="13">
        <div class="container">
            <div class="tagline"><span></span>
                <h6>Liste des produits</h6>
            </div>
            <!-- end tagline -->
            <h1>Beauty<br>
                <span>Design</span></h1>
            {{-- <div class="slide-btn"> <a href="#">
                    <div class="lines"> <span></span> <span></span> </div>
                    <!-- end lines -->
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" viewBox="0 0 104 104" enable-background="new 0 0 104 104" xml:space="preserve">
                        <circle class="video-play-circle" fill="none" stroke="#fff" stroke-width="2"
                            stroke-miterlimit="1" cx="52" cy="52" r="50" />
                    </svg>
                    <b>LEARN MORE</b>
                </a> </div> --}}
            <!-- end slide-btn -->
        </div>
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<!-- end header -->
@endforeach
@php
$bg=['#ece6f4','#ebf8f3','#f4eedf','#e5f2f7','#f5efe8'];
$i=0;
@endphp
<div class="container mt-5">
    <div class="row float-right">
            @php
            // $category = new Category();
            $menu=App\Models\Category::getAllParentWithChild();
            @endphp
            @if($menu)
            <div class="col-md-6 col-sm-12 col-xs-12  ">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" onchange="location = this.value;">
                        <option value=""> Selectionner une catégorie</option>
                        @foreach ($menu as $key => $cat_info)
                        <option value="{{route('product-cat', $cat_info->slug)}}">
                            {{$cat_info->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            <div class="col-md-6 col-sm-12 col-xs-12  ">
                <form method="GET" action="{{route('product.search')}}">
                    @csrf
                    <div class="input-group rounded mr-5">
                        <input type="search" name="search" class="form-control rounded" placeholder="Search"
                            aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon"
                            style="border: none; background:none;">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </form>
            </div>
    </div>
</div>
<section class="works">
    <div class="container">

        <div class="row">
            <div class="col-12 wow fadeIn">
                <h6>Nos Produits</h6>
                <h2 data-text="Produits">Liste des Produits</h2>
            </div>
            <!-- end col-12 -->
            <div class="col-12">
                @foreach ($products as $key=>$produit)
                @if ($i==(count($bg)-1))
                @php
                $i=0;
                @endphp
                @endif
                <div class="project-box wow fadeIn" data-bg="{{$bg[$i]}}">
                    @php
                    $i=$i+1;
                    @endphp
                    <figure>
                        @if($produit->photo)
                        @php
                            $photos = explode(',',$produit->photo);
                        @endphp
                        <a href="{{$photos[0]}}" data-fancybox><img src="{{$photos[0]}}" alt="Image"></a>
                        @else
                        <a href="{{asset('backend/img/thumbnail-default.jpg')}}" data-fancybox><img
                                src="{{asset('backend/img/thumbnail-default.jpg')}}" alt="Image"></a>
                        @endif
                    </figure>
                    <div class="content-box">
                        <div class="inner"> <small>Produit : </small>
                            <h3><span style="color: black !important">{{$produit->title}}</span></h3>
                            <div class="custom-link"> <a href="{{route('product-detail',$produit->slug)}}">
                                    <div class="lines"> <span></span> <span></span> </div>
                                    <!-- end lines -->
                                    <b>Savoir Plus</b>
                                </a> </div>
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
            @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{$products->appends($_GET)->links()}}
            @endif
        </div>
    </div>
    <!-- end container -->
</section>

@endsection
