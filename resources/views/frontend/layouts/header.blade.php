<style>
    html {
  scroll-behavior: smooth;
   }
   .slick-dots{
    display: none !important;
   }
</style>
@php
    $settings=DB::table('settings')->get();
@endphp
@foreach($settings as $data)
  <div class="navigation-menu">
    <div class="bg-layers"> <span></span> <span></span> <span></span> <span></span> </div>
    <!-- end bg-layers -->
    <div class="inner" data-tilt data-tilt-perspective="2000">
      <div class="menu">
        <ul>
          <li><a href="{{route('home')}}">Accueil</a>
          </li>
          <li><a href="{{route('about-us')}}">À PROPOS</a></li>
          <li><a href="{{route('product-lists')}}">Produits</a></li>
          <li><a href="{{route('promotions')}}">Promotions</a></li>
          <li><a href="{{route('blog')}}">Blog</a></li>
          <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
      </div>
      <!-- end menu -->
      {{-- <blockquote style="color: white">Beauty Design</blockquote> --}}
    </div>
    <!-- end inner -->
  </div>
  <!-- end navigation-menu -->
  <nav class="navbar">
    <div class="left">
      <div class="hamburger-menu">
        <div class="hamburger Dyali" id="hamburger-menu" style="cursor: pointer;"> <span class="spandyali"></span> <span class="spandyali"></span> <span class="spandyali"></span>
        </div>
      </div>
    </div>
    <!-- end left -->
    <div class="logo">
      <a href="{{route('home')}}">
         <h2 style="font-family: 'Yellowtail', cursive; color:#1D1E22 ;" class="zs1" id="zs1">Beauty Design</h2>
         <h2 style="font-family: 'Yellowtail', cursive; color:#ffffff ;" class="zs2" id="zs2">Beauty Design</h2>
        {{-- <img src="{{$data->photo}}" alt="Image"></a> --}}

    </div>
    <!-- end logo -->
    <div class="right">
      <ul class="language">
        <li><a href="{{$data->facebook}}" target='_blanck' style="font-size:24px;"><i  class="fa fa-facebook iconC"></i></a></li>
        <li><a href="{{$data->instagram}}" target='_blanck' style="font-size:24px;"><i  class="fa fa-instagram iconC"></i></a></li>
        <li><a href="{{$data->linkedin}}" target='_blanck' style="font-size:24px;"><i  class="fa fa-linkedin iconC"></i></a></li>
      </ul>
      <!-- <a style="right: 0; float: right; text-align: right;" href="direction.html"> Contactez nous</a>  -->
      <!-- end hamburger-menu -->
    </div>
    <!-- end right -->
  </nav>
@endforeach
