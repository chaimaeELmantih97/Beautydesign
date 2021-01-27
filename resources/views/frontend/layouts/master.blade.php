<!DOCTYPE html>
<html lang="fr">
<head>
	@include('frontend.layouts.head')
</head>
<body>


    <div class="preloader">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="inner" data-tilt data-tilt-perspective="2000">
          <figure class="fadeInUp animated"> <img src="{{url('frontend/images/loader.gif')}}" alt="Image"> </figure>
          <span class="typewriter" id="typewriter"></span>
        </div>
        <!-- end inner -->
      </div>
      <!-- end preloader -->
      <div class="transition-overlay">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
      </div>
      <!-- end transition-overlay -->

	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')

	@include('frontend.layouts.footer')



</body>
</html>
