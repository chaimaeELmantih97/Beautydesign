@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Article')

@section('main-content')

<style>
    .zs2 {
        display: block !important;
    }

    .zs1 {
        display: none !important;
    }

    .hamburger span {
        background: #ffffff !important;
    }

    .iconC {
        color: #ffffff;
    }

</style>
@php
$settings=DB::table('settings')->get();
$posts=App\Models\Post::paginate(4);
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
            <h1>Details <br>
                <span style="-webkit-text-stroke-color:#ffffff !important;" >d'article</span></h1>
                <div class="slide-btn"> <a href="#article">
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
@endforeach
<section class="news" id="article">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="post single-post wow fadeIn">
              <figure class="post-image">
                @if ($post->photo)
                <img src="{{$post->photo}}" alt="Image">
                @else
                    <img src="{{asset('backend/img/thumbnail-default.jpg')}}" alt="Image">
                @endif
              </figure>
              <!-- end news-image -->
              <div class="post-content">
                @php
                setlocale(LC_TIME,'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
                $date = strftime('Le %d %B, %Y', strtotime($post->created_at));
                @endphp
              <div class="inner"> <small class="post-date">{{$date}}</small>
                  <h3 class="post-title"><a href="#">{{$post->title}}</a></h3>
                  <div class="post-author">
                    @php
                    $author_info=DB::table('users')->where('id',$post->added_by)->get();
                    @endphp
                     @foreach($author_info as $data)
                    @if ($data->photo)
                    <img src="{{$data->photo}}" alt="Image">
                    @else
                    <img src="{{asset('backend/img/avatar.png')}}" alt="Image">
                    @endif

                    <span>
                        {{-- <img src="{{$data->photo}}" alt> --}}
                        Par
                        <a>
                            @if($data->name)
                            {{$data->name}}
                            @else
                            Anonyme
                            @endif
                        </a>

                    </span>
                    @endforeach
                    </div>
                  {{-- <ul class="social-share">
                      <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul> --}}
                      <h6>{!! $post->summary !!}</h6>
                  {{-- <figure><img src="images/featured01.jpg" alt="Image"></figure> --}}
                      {{-- <p> {!! $post->description !!}</p> --}}
                  <blockquote>
                  {!! $post->quote !!}
                </blockquote>
                <p>
                    {!! $post->description !!}
                </p>
                  </div>
                  <!-- end inner -->
              </div>
              <!-- end post-content -->
          </div>
          <!-- end post -->
        </div>
        <!-- end col-12 -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
@php
    $oPosts=App\Models\Post::where('id','!=',$post->id)->get();
@endphp
<!-- end works -->
<section class="work-with-us">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeIn">
                <h6>Blog associés</h6>
                <h2>autres blogs</h2>
            </div>
        </div>
        <div class="card-slider">
            @foreach ($oPosts as $key => $p)
            <div class="col-lg-12">
                <div class="card border-0 w-100">
                    {{-- <img class="card-img-top" src="https://picsum.photos/seed/picsum/200/200" alt="Card image cap"> --}}
                    @if($p->photo)
                    <img class="card-img-top" src="{{$p->photo}}" style="height: 200px;">
                    @else
                    <img class="card-img-top" src="{{asset('backend/img/thumbnail-default.jpg')}}"
                        style="height: 200px;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><em><b>{{$p->title}}</b></em></h5>
                        <p>
                            {!!$p->summary!!}
                        </p>
                    </div>
                    <div
                        style="background: #202020; width:100%; padding:10px; display:flex; justify-content: space-between">
                        <a href="{{route('blog.detail',$p->slug)}}" style="color: #ffffff;">Savoir plus</a>
                        <a href="{{route('blog.detail',$p->slug)}}" style="color: #ffffff;"><i class="fa fa-arrow-right"></i></a>

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
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){

    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });

 })(jQuery)
})
</script>
@endpush
