@extends('frontend.layouts.master')
@section('title','Beauty Design - Accueil')
@section('main-content')

@php
    $settings=DB::table('settings')->get();
@endphp

<!-- start of hero -->
<section class="arkit-hero-slider hero-slider hero-style-1" style="height: 100vh;">
    @if(count($banners)>0)
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($banners as $key=>$banner)
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image dark-overlay" data-background="{{$banner->photo}}">
                            <div class="container">
                                <div class="slide-title" data-swiper-parallax="400">
                                    <span>Depuis 2015</span>
                                    <h2 style="color: {{$banner->title_color}}">{{$banner->title}}</h2>
                                    <p style="color: {{$banner->description_color}}">{{$banner->description}}</p>
                                </div>
                                <div class="slide-btns" data-swiper-parallax="500">
                                    <a class="theme-btn" href="{{route('product-grids')}}">Nos Produits</a>
                                </div>
                            </div>
                        </div>
                        <!-- end slide-inner -->
                    </div>
                    <!-- end swiper-slide -->
                @endforeach
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    @endif
</section>
<!-- end of hero slider -->

<!-- start about -->
<section class="arkit-about section-padding">
    <div class="container">
        <div class="row display-flex">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="arkit-about-inner">
                    <span>Present dans le marché depuis 2015</span>
                    <h2>{{$about->title}}</h2>
                    <p>
                        {{$about->summary}}
                    </p>
                    <p>
                        <div class="slide-btns" data-swiper-parallax="500">
                            <a class="theme-btn" href="{{route('about-us')}}">Savoir Plus</a>
                        </div>
                    </p>
                    <div class="contact-number">
                        <div class="content">
                            <span>Appelez-nous :</span>
                            <h4>@foreach($settings as $data) {{$data->phone}} @endforeach</h4>
                        </div>
                        <div class="icon">
                            <img alt="" class="img-responsive" src="{{asset('frontend/assets/images/about/icon/smartphone.svg')}}">
                        </div>
                    </div>
                </div>
            </div>
            <!--/col-->
            <div class="col-lg-7 col-md-6 col-xl-12">
                <div class="about-img">
                    <img alt="{{$about->photo}}" src="{{$about->photo}}">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of about -->

<!-- start service -->
<section class="arkit-service-info section-padding">
    <div class="container-fluid">
        <div class="owl-carousel owl-theme service-info-slider">
            @foreach ($services as $key => $service)
                <div class="item arkit-service-info-single" data-number="{{ ($key+1) < 10 ? '0'.($key+1) : ($key+1) }}" style="height: 330px">
                    <span class="tag">{{$service->tag}}</span>
                    <h2>{{$service->title}}</h2>
                    <p>{{$service->description}}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end of service -->

<!-- start Service -->
<section class="arkit-service section-padding">
    <div class="container">
        <div class="arkit-service-top">
            <div class="row display-flex">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Les Métiers de <span>Beauty Design<span>.</h2>
                    </div>
                </div>
                {{-- <div class="col-lg-5 col-lg-offset-1 col-md-6 col-xs-12">
                    <div class="service-note">
                        <p>Compliment favourable connection dispatched terminated esteem powerful excuse remov eirure dolor
                            <a href="javascript:">inner reprehenderit voluptate velit esse cillum dolore eugiat</a>.
                        </p>
                    </div>
                </div> --}}
            </div>
        </div><!-- /Row -->
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme service-info-slider">
                    @foreach ($category_lists as $category)
                        <div class="item">
                            <div class="arkit-single-service">
                                <img alt="{{$category->photo}}" class="img-responsive" src="{{$category->photo}}" style="height: 300px; width: 100%; object-fit: cover;">
                                <div class="content-inner">
                                    <h3><a href="{{route('product-cat', $category->slug)}}">
                                        {{-- <img alt="" class="img-responsive home-icon" src="{{asset('frontend/assets/images/icon/home.svg')}}"> --}}
                                        <span>{{$category->title}}</span></a>
                                    </h3>
                                    {{-- <p>Compliment favourable connection disa inner reprehenderit eugiat.</p> --}}
                                    <a class="read-more-btn" href="{{route('product-cat', $category->slug)}}">SAVOIR PLUS <span>+</span></a>
                                </div>
                            </div>
                        </div>
                        <!--/item-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of Service -->

@if (count($catalogs) != 0)
    <!-- start Status -->
    <section class="arkit-status section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xl-12">
                    <div class="row">
                        @foreach ($catalogs as $key => $catalog)
                            @if (count($catalogs) > 2 && count($catalogs)%2 == 0)
                                <div class="col-lg-6 col-md-6 col-xs-12">
                            @elseif (count($catalogs) > 2 && count($catalogs)%2 != 0)
                                @if ($key == (count($catalogs)-1))
                                    <div class="col-lg-12">
                                @else
                                    <div class="col-lg-6 col-md-6 col-xs-12">
                                @endif
                            @else
                                <div class="col-lg-12">
                            @endif
                                <a href="{{$catalog->file}}" target="_blank" class="single-status">
                                    <div class="icon">
                                        <i class="fa fa-file-pdf download-btn" style="font-size: 50px;"></i>
                                    </div>
                                    <h3 style="line-height: 0.7">
                                        <span style="font-size: 30px;">{{$catalog->title}}</span>
                                    </h3>
                                    <p>
                                        <i class="fas fa-download download-btn"></i><span class="download-btn"> Télécharger </span>
                                    </p>
                                </a>
                            </div><!--/col-->
                        @endforeach
                    </div><!--/Row-->
                </div><!--/Col-->
            </div><!--/Row-->
        </div><!--/container-->
        <div class="status-note">
            <h3>N’hésitez pas à nous contacter pour échanger au sujet de l’aménagement de votre espace professionnel ou Vos Dépôts de Stockage.</h3>
            <div class="bottom">
                <a class="read-more-btn" href="{{route('contact')}}">CONTACT US <span>+</span></a>
                <div class="icon">
                    <img alt="" class="img-responsive" src="{{asset('frontend/assets/images/status/shelves.svg')}}" style="height: 50px; object-fit: contain">
                </div>
            </div>
        </div>
    </section>
    <!-- end of Status -->
@endif

@if (count($testimonials) != 0)
    <!-- start testimonial -->
    <section class="testimonial section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-inner">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="section-title">
                                    <span>Clients Satisfaits</span>
                                    <h2>Nous fournissons toujours les meilleurs services. Ce que <span> disent les clients satisfaits de Beauty Design</span>.
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme testimonial-slider">
                            @foreach ($testimonials as $testimonial)
                                <div class="item">
                                    <div class="single-testimonial">
                                        <div class="info">
                                            <img alt="{{$testimonial->photo}}" class="img-responsive" src="{{$testimonial->photo}}">
                                            <h4>{{$testimonial->name}}</h4>
                                            <p>{{$testimonial->job}}</p>
                                        </div>
                                        <div class="feedback">
                                            <span class="quote"><img alt="" class="img-responsive" src="{{asset('frontend/assets/images/testimonials/quote.svg')}}" style="filter: hue-rotate(120deg)"></span>
                                            <p>
                                                {{$testimonial->description}}
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- /item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of testimonial -->
@endif

<!-- stsrt client -->
<section class="client">
    <div class="owl-carousel owl-theme clents-slider">
        @foreach ($brands as $brand)
            <div class="item">
                <div class="single-client">
                    <img alt="{{$brand->photo}}" class="img-responsive" src="{{$brand->photo}}" style="object-fit: contain">
                </div>
            </div><!--/item-->    
        @endforeach
    </div>
</section>
<!-- end of client -->


<!-- start blog -->
<section class="blog section-padding">
    <div class="container">
        <div class="row display-flex-title">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <span>Dernières publications</span>
                    <h2>Nous sommes prêts à partager nos conseils et notre expérience.</h2>
                </div>
            </div>
        </div><!--/row-->
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-sm-6 col-xs-12">
                    <div class="single-blog">
                        <div class="row display-flex">
                            <div class="col-sm-6">
                                <img alt="{{$post->photo}}" class="img-responsive" src="{{$post->photo}}" style="height: 250px; object-fit: cover">
                            </div>
                            <div class="col-sm-6">
                                @php
                                    setlocale(LC_TIME,'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
                                    $date = strftime('Le %d %B, %Y', strtotime($post->created_at));
                                @endphp
                                <span class="date">{{$date}}</span>
                                <h3><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
                                <a class="read-more-btn" href="{{route('blog.detail',$post->slug)}}">SAVOIR PLUS <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div><!--/col-->    
            @endforeach
        </div>
    </div>
</section>
<!-- end of blog -->

@endsection