@extends('frontend.layouts.master')

@section('title','Beauty Design - À Propos de nous')

@section('main-content')

	@php
		$settings=DB::table('settings')->get();
	@endphp

    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 style="margin-top: 50px">À Propos de Nous</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Accueil</a></li>
                        <li>À Propos de Nous</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>        
	<!-- end page-title -->
	
	
	<!-- start about -->
	<section class="arkit-about2 section-padding">
		<div class="container">
			<div class="row display-flex">
				<div class="col-lg-12 col-md-12 col-xs-12">
					<div class="arkit-about-inner">
						<span>Present dans le marché depuis 2015</span>
						<h2>{{$about->title}}</h2>
						<p>
							{!! html_entity_decode($about->description) !!}
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
				{{-- <div class="col-lg-7 col-md-6 col-xl-12">
					<div class="about-img">
						<img alt="{{$about->photo}}" src="{{$about->photo}}">
					</div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- end of about -->

	<section class="section-padding">
		<div class="container">
			<div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true">How Adept Are You at Investing?</a>
					</div>
					<div id="collapse-1" class="panel-collapse collapse in">
						<div class="panel-body">
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Lorem Ipsum is that it has a more-or-less normal.</p>
						</div>
					</div>
				</div>
		
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2">How to Respond When Your Investments Are Losing Money?</a>
					</div>
					<div id="collapse-2" class="panel-collapse collapse">
						<div class="panel-body">
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Lorem Ipsum is that it has a more-or-less normal.</p>
						</div>
					</div>
				</div>
		
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3">How to Retire Forever on a Fixed Chunk of Money?</a>
					</div>
					<div id="collapse-3" class="panel-collapse collapse">
						<div class="panel-body">
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Lorem Ipsum is that it has a more-or-less normal.</p>
						</div>
					</div>
				</div>
		
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-4">How a Former Canadian Spy Helps Wall Street Mavens Think Smarter?</a>
					</div>
					<div id="collapse-4" class="panel-collapse collapse">
						<div class="panel-body">
							<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Lorem Ipsum is that it has a more-or-less normal.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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

@endsection