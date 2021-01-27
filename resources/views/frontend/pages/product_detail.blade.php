@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Details de produit')

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
                <h6>Details de produit</h6>
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
        </div>
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<!-- end header -->
@endforeach

<section class="works-single">
    <div class="container">
      <div class="row">
        <div class="col-12 wow fadeIn mt-3">
          {{-- <h6>{{$product_detail->title}}</h6> --}}
          <h2>{{$product_detail->title}}</h2>
        </div>
        <!-- end col-12 -->
        <div class="col-lg-5 wow fadeIn">
          <h4>{{$product_detail->tag}}</h4>
          {{-- <div class="col-md-12 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <h5>Date de reaclisation</h5>
            <p>{{$product_detail->date}}</p>
        </div> --}}
        @php
            $photos = explode(',',$product_detail->photo);
        @endphp
        @if($product_detail->photo)
        <img src="{{$photos[0]}}" alt="">
        @else
        <img src="{{asset('backend/img/thumbnail-default.jpg')}}" alt="">
        @endif
        </div>
        <!-- end col-5 -->
        <div class="col-lg-7 wow fadeIn" data-wow-delay="0.10s">
      <div class="text-desc row">
            <div class="col-12 wow fadeIn" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
                <h5>Description</h5>
                <p>{!!$product_detail->description!!}</p>
            </div>
            <!-- end col-6 -->
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                <h5>Categorie</h5>
                <p>{{$product_detail->cat_info->title}}</p>
            </div>
            <!-- end col-3 -->
            {{-- <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                <h5>Ville</h5>
                <p>{{$product_detail->ville}}</p>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                <h5>Date de réalisation</h5>
                <p>{{$product_detail->date}}</p>
            </div> --}}
            <!-- end col-3 -->
        </div>
        <!-- end text-desc -->
        </div>
        <!-- end col-12 -->
        @foreach ($photos as $key => $data)
        @if ($key!=0)
        @if($key==5 || $key==11 || $key==17 )
        <div class="col-12 wow fadeIn">
            <figure><a href="{{$data}}" data-fancybox><img src="{{$data}}" alt="Image"></a></figure>
        </div>
        @endif
        @if($key==0 || $key==1 || $key==6 || $key==7 || $key==12 || $key==13 )
        <div class="col-md-6 wow fadeIn">
            <figure><a href="{{$data}}" data-fancybox><img src="{{$data}}" alt="Image"></a></figure>
        </div>
        @endif
        @if($key==2 || $key==3 || $key==4 || $key==8 || $key==9 || $key==10 || $key==14 || $key==15 || $key==16)
        <div class="col-md-4 wow fadeIn">
            <figure><a href="{{$data}}" data-fancybox><img src="{{$data}}" alt="Image"></a></figure>
        </div>
        @endif
        @endif
        @endforeach
        <!-- end col-12 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  @php
  $oProducts=App\Models\Product::where('id','!=',$product_detail->id)->get();
@endphp
<!-- end works -->
<section class="work-with-us">
  <div class="container">
      <div class="row">
          <div class="col-12 wow fadeIn">
              <h6>Produits associés</h6>
              <h2>Autres Produits</h2>
          </div>
      </div>
      <div class="card-slider">
          @foreach ($oProducts as $key => $p)
          <div class="col-lg-12">
              <div class="card border-0 w-100">
                  {{-- <img class="card-img-top" src="https://picsum.photos/seed/picsum/200/200" alt="Card image cap"> --}}
                @php
                    $photos = explode(',',$p->photo);
                @endphp
                @if($p->photo)
                <img src="{{$photos[0]}}" style="height: 200px; object-fit:cover" alt="">
                @else
                <img src="{{asset('backend/img/thumbnail-default.jpg')}}" style="height: 200px; object-fit:cover" alt="">
                @endif
                  <div class="card-body">
                      <h5 class="card-title"><em><b>{{$p->title}}</b></em></h5>
                      <p>
                          {!!$p->summary!!}
                      </p>
                  </div>
                  <div
                      style="background: #202020; width:100%; padding:10px; display:flex; justify-content: space-between">
                      <a href="{{route('product-detail',$p->slug)}}" style="color: #ffffff;">Savoir plus</a>
                      <a href="{{route('product-detail',$p->slug)}}" style="color: #ffffff;"><i class="fa fa-arrow-right"></i></a>

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
