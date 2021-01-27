@php
    $settings=DB::table('settings')->get();
@endphp

	<!-- start site-footer -->
<footer class="site-footer">		
	@if (request()->segment(1) != 'contact')
		<div class="upper-footer">
			<div class="container">
				<div class="row display-flex">
					<div class="col-lg-3 col-sm-6 col-sm-6 col-xs-12 order-2">
						<div class="widget about-widget">
							<div class="widget-title">
								<a class="logo" href="{{route('home')}}" style="padding: 20px"><img alt src="@foreach($settings as $data) {{$data->logo}} @endforeach"></a>
							</div>
							<ul>
								<li>
									<div class="icon">
										<i class="fa fa-phone"></i>
										{{-- <img alt="" class="img-responsive" src="{{asset('frontend/assets/images/icon/call.svg')}}"> --}}
									</div>
									<div class="content">
										<p>Appelez-nous:</p>
										<span style="color: #fff; font-size: 13px">@foreach($settings as $data) {{$data->phone}} @endforeach</span>
									</div>
								</li>
								<li>
									<div class="icon">
										<i class="fa fa-paper-plane"></i>
										{{-- <img alt="" class="img-responsive" src="{{asset('frontend/assets/images/icon/envelope-open.svg')}}"> --}}
									</div>
									<div class="content">
										<p>Email:</p>
										<span style="color: #fff; font-size: 13px">@foreach($settings as $data) {{$data->email}} @endforeach</span>
									</div>
								</li>
								<li>
									<div class="icon">
										<i class="fa fa-map-marker-alt"></i>
										{{-- <img alt="" class="img-responsive" src="{{asset('frontend/assets/images/icon/gps.svg')}}"> --}}
									</div>
									<div class="content">
										<p>Adresse:</p>
										<span style="color: #fff; font-size: 13px">@foreach($settings as $data) {{$data->address}} @endforeach</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-xs-12 order-1">
						<div class="contact-widget">
							<div class="display-flex-title">
								<div class="section-title text-center">
									<span>Contactez-Nous</span>
									<h2>Nous sommes toujours prêts à résoudre vos problèmes.</h2>
								</div>
							</div>
							<form class="contact-validation-active" method="post" action="{{route('contact.store')}}">
								@csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xl-12">
										<div class="form-group">
											<input class="form-control" id="name" name="name" placeholder="Nom*" type="text">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xl-12">
										<div class="form-group">
											<input class="form-control" id="email" name="email" placeholder="Email*" type="email">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xl-12">
										<div class="form-group">
											<input class="form-control" id="phone" name="phone" placeholder="Téléphone*" type="text">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xl-12">
										<div class="form-group">
											<input class="form-control" id="subject" name="subject" placeholder="Objet*" type="text">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<div class="fullwidth">
												<textarea class="form-control" id="note" name="message" placeholder="Message..."></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-lg-offset-3">
										<div class="form-group">
											<div class="submit-area">
												<button class="submit-btn" type="submit">
													Envoyer le message
												</button>
												<div id="loader">
													<i class="ti-reload"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix error-handling-messages">
									<div id="success">Merci</div>
									<div id="error">
										Une erreur s'est produite lors de l'envoi d'email. Veuillez réessayer plus tard.
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-sm-6 col-xs-12 order-3">
						<div class="widget link-widget">
							<div class="widget-title">
								<h3>Beauty Design</h3>
							</div>
							<ul>
								<li><a href="{{route('home')}}">Accueil</a></li>
								<li><a href="{{route('about-us')}}">À Propos</a></li>
								<li><a href="{{route('product-grids')}}">Produits</a></li>
								<li><a href="{{route('blog')}}">Blog</a></li>
								<li><a href="{{route('promotions')}}">Promotions</a></li>
								<li><a href="{{route('contact')}}">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- end container -->
		</div>
		
	@endif
		
	<div class="lower-footer">
		<div class="container">
			<div class="row display-flex">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<p class="copyright"><a href="http://feen-tech.com" style="color: #fff">FeenTech</a> Corporation © 2020</p>
				</div><!-- /col -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="social-icons">
						<ul>
							<li><a href="@foreach($settings as $data) {{$data->facebook}} @endforeach"><i class="ti-facebook"></i></a></li>
							<li><a href="@foreach($settings as $data) {{$data->linkedin}} @endforeach"><i class="ti-linkedin"></i></a></li>
							<li><a href="@foreach($settings as $data) {{$data->instagram}} @endforeach"><i class="ti-instagram"></i></a></li>
						</ul>
					</div>
				</div><!-- /col -->
			</div>
		</div>
	</div>
</footer>
<!-- end site-footer -->

<!-- PhotoSwipe -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js" integrity="sha512-2R4VJGamBudpzC1NTaSkusXP7QkiUYvEKhpJAxeVCqLDsgW4OqtzorZGpulE3eEA7p++U0ZYmqBwO3m+R2hRjA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js" integrity="sha512-SxO0cwfxj/QhgX1SgpmUr0U2l5304ezGVhc0AO2YwOQ/C8O67ynyTorMKGjVv1fJnPQgjdxRz6x70MY9r0sKtQ==" crossorigin="anonymous"></script>

<!-- All JavaScript files
================================================== -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>

<!-- Plugins for this template -->
<script src="{{asset('frontend/assets/js/jquery-plugin-collection.js')}}"></script>

<!-- Custom script for this template -->
<script src="{{asset('frontend/assets/js/script.js')}}"></script>