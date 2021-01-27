@extends('frontend.layouts.master')

@section('title','Beauty Design - Contactez-nous')

@section('main-content')

	<!-- start page-title -->
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col col-xs-12">
					<h2 style="margin-top: 50px">Contact</h2>
					<ol class="breadcrumb">
						<li><a href="{{route('home')}}">Accueil</a></li>
						<li>Contact</li>
					</ol>
				</div>
			</div> <!-- end row -->
		</div> <!-- end container -->
	</section>        
	<!-- end page-title -->

	<!-- start Status -->
	<section class="archito-get-in-touch section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7">
					<div class="get-in-touch-contact-area">
						<div class="section-title">
							<span>Contactez-Nous</span>
							<h2>Nous sommes toujours prêts à résoudre vos problèmes.</h2>
						</div>
						<div class="get-contact-form">
							<form class="contact-validation-active" method="post" action="{{route('contact.store')}}">
								@csrf
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<input class="form-control" name="name" placeholder="Nom:" type="text">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input class="form-control" name="email" placeholder="Email:" type="email">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<input class="form-control" name="phone" placeholder="Téléphone:" type="text">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<input class="form-control" name="subject" placeholder="Objet:" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<textarea class="form-control" id="note" name="message" placeholder="Message:"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<button class="theme-btn" type="submit">Envoyer le message</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-5">
					<div class="right-image">
						<img alt="" class="img-responsive" src="{{asset('frontend/assets/images/get-in-touch.png')}}">
						<div class="quote" style="z-index: 0">
							<img alt="" class="img-responsive" src="{{asset('frontend/assets/images/get-in-touch-quote.svg')}}" style="filter: hue-rotate(120deg);">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end of Status -->

	<!--  start contact-map -->
	<section class="contact-map-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="hidden">Adresse</h2>
					<div class="contact-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13305.720347257215!2d-7.6481879!3d33.5162019!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62d07a826b0d9%3A0x6464ebaae0d1d64e!2sSidi%20Maarouf%2C%20Casablanca!5e0!3m2!1sfr!2sma!4v1609755696934!5m2!1sfr!2sma" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end contact-map -->

@endsection