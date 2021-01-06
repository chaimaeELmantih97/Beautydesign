<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Beauty Design - Page non trouvée</title>
	@include('frontend.layouts.head')
</head>
<body class="js">
	
<!-- start page-wrapper -->
<div class="page-wrapper">

    <!-- start preloader -->
	<div class="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end preloader -->
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
  <!--/ End Header -->
  <!-- start page-title -->
  {{-- <section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>404</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>404</li>
                </ol>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
  </section>        
  <!-- end page-title --> --}}

  <!-- 404 Error Page  -->
  <section class="error-404-section section-padding" style="padding-top: 150px;">
      <div class="container">
          <div class="row">
              <div class="col col-xs-12">
                  <div class="content clearfix">
                      <div class="error">
                          <img src="{{asset('frontend/assets/images/error-404.png')}}" alt="" style="filter: hue-rotation(180deg)">
                      </div>
                      <div class="error-message">
                          <h3>Oups ! Page non trouvée !</h3>
                          <p>Nous sommes désolés, mais nous n'arrivons pas à trouver la page que vous avez demandée. Cela peut être dû au fait que vous avez mal tapé l'adresse internet.</p>
                          <a href="{{route('home')}}" class="theme-btn">Retour à l'accueil</a>
                      </div>
                  </div>
              </div>
          </div> <!-- end row -->
      </div> <!-- end container -->
  </section>
  <!-- 404 Error Page End -->
	
	@include('frontend.layouts.footer')

</div>

</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">

<head>

  @include('backend.layouts.head')

</head>

<body>
  
  <div class="container-fluid">

    <div class="row" style="margin-top:10%">
        <!-- 404 Error Text -->
      <div class="col-md-12">
        <div class="text-center">
          <div class="error mx-auto" data-text="404">404</div>
          <p class="lead text-gray-800 mb-5">Page Not Found</p>
          <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
          {{-- {{dd(auth()->user())}}; --}}
            <a href="{{route('home')}}">&larr; Back to Home</a>

        </div>
      </div>
    </div>

    </div>


    @include('backend.layouts.footer')

</body>

</html> --}}
