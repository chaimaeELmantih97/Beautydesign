@extends('frontend.layouts.master')

@section('title','Beauty Design - Article')

@section('main-content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 style="margin-top: 50px">Article</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Accueil</a></li>
                        <li>Article</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
        
    
    <!-- start blog-single-section -->
    <section class="blog-single-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8">
                    <div class="blog-content clearfix">
                        <div class="post">
                            <div class="entry-media">
                                <img src="{{$post->photo}}" alt style="height: 450px; width: 100%; object-fit: cover">
                            </div>
                            @php
                                $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                            @endphp
                            <ul class="entry-meta">
                                <li style="padding-top: 10px">
                                    @foreach($author_info as $data)
                                        Par <a>
                                            @if($data->name)
                                                {{$data->name}}
                                            @else
                                                Anonyme
                                            @endif
                                        </a>
                                    @endforeach
                                </li>
                                <li>
                                    @php
                                        setlocale(LC_TIME,'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
                                        $date = strftime('Le %d %B, %Y', strtotime($post->created_at));
                                    @endphp
                                    {{$date}}
                                </li>
                            </ul>
                            <h2>{{$post->title}}</h2>
                            <p>
                                {!! html_entity_decode($post->description) !!}
                            </p>
                            @if($post->quote)
                                <blockquote> <i class="fa fa-quote-left"></i> {!! ($post->quote) !!}</blockquote>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="blog-sidebar">
                        <div class="widget search-widget">
                            <h3>Recherche</h3>
                            <form method="GET" action="{{route('blog.search')}}">
                                <div>
                                    <input type="text" name="search" class="form-control" placeholder="Rechercher">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3>Articles Récents</h3>
                            <div class="posts">
                                @foreach($recent_posts as $post)
                                    <div class="post">
                                        <div class="img-holder">
                                            <img src="{{$post->photo}}" alt style="height: 80px; width: 100%; object-fit: cover;">
                                        </div>
                                        <div class="details">
                                            <h4><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h4>
                                            @php
                                                setlocale(LC_TIME,'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
                                                $date = strftime('Le %d %B, %Y', strtotime($post->created_at));
                                            @endphp
                                            <span class="date">{{$date}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end blog-single-section -->
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