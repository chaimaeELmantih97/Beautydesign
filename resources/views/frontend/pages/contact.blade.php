@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Contactez-nous')

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
            {{-- <div class="tagline"><span></span>
                <h6>Contactez Nous</h6>
            </div> --}}
            <!-- end tagline -->
            <h1>Contactez<br>
                <span style="-webkit-text-stroke-color:#ffffff !important;" >Nous</span></h1>
                <div class="slide-btn"> <a href="#contact">
                    <div class="lines"> <span></span> <span></span> </div>
                    <!-- end lines -->
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               viewBox="0 0 104 104" enable-background="new 0 0 104 104" xml:space="preserve">
                      <circle class="video-play-circle" fill="none" stroke="#fff" stroke-width="2" stroke-miterlimit="1" cx="52" cy="52" r="50"/>
                    </svg>
                    <b>Défiler vers le bas </b> </a> </div>

        </div>
        {{-- this is fucking crazy --}}
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<!-- end header -->
<section class="hello" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn">
                <h2 data-text="Hellow">Venez nous rendre visite et nous dire bonjour !</h2>
            </div>
            <!-- end col-12 -->
            <div class="col-md-4 wow fadeIn">
                <address>
                    <b>Adresse</b>
                    <p>{{$data->address}}
                    </p>
                </address>
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.05s">
                <address>
                    <b>Téléphone :</b>
                    <p><a href="tel:{{$data->phone}}"> {{$data->phone}}</a>
                    </p>
                </address>
            </div>
            <!-- end col-4 -->
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.10s">
                <address>
                    <b>Email</b>
                    <a href="mailto:{{$data->email}}">{{$data->email}}</a>
                </address>
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
        <div class="row align-items-center">
            <div class="col-lg-6 wow fadeIn">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.535877848073!2d-7.650522400000001!3d33.539450699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda62d7a0bed4fd3%3A0x9eab398bd13c0850!2sBeauty%20Design!5e0!3m2!1sfr!2sma!4v1611757740193!5m2!1sfr!2sma"
                    width="100%" height="640" frameborder="0" style="border:0; filter: invert(90%)" allowfullscreen></iframe>
                <!-- end map -->
            </div>
            <!-- end col-6 -->
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.05s">
                <form class="row inner contact" method="post" action="{{route('contact.store')}}">
                    @csrf
                    <div class="form-group col-sm-6 col-12">
                        <label><span>Nom</span></label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group col-sm-6 col-12">
                        <label><span>Tel</span></label>
                        <input type="text" name="phone" id="surname" required>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group col-sm-6 col-12">
                        <label><span>Email</span></label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group col-sm-6 col-12">
                        <label><span>Sujet</span></label>
                        <input type="text" name="subject" id="subject" required>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group col-12">
                        <label><span>Message</span></label>
                        <textarea name="message" id="message" required></textarea>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group col-12">
                        <button id="submit" type="submit" name="submit">Envoyer</button>
                    </div>
                    <!-- end form-group -->
                </form>
                <!-- end form -->
                <div id="success" class="alert alert-success" role="alert"> Your message was sent successfully! We will
                    be in touch as soon as we can. </div>
                <!-- end success -->
                <div id="error" class="alert alert-danger" role="alert"> Something went wrong, try refreshing and
                    submitting the form again. </div>
                <!-- end error -->
            </div>
            <!-- end col-6 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end hello -->
@endforeach


@endsection
