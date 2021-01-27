<!DOCTYPE html>
<html lang="fr">
<head>
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
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</div>

</body>
</html>