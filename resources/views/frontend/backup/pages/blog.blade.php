@extends('frontend.layouts.master')

@section('title','Beauty Design - Blog')

@section('main-content')

    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 style="margin-top: 50px">Blog</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Accueil</a></li>
                        <li>Blog</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->
        
    <!-- start blog-pg-section -->
    <section class="blog-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-8">
                    <div class="blog-posts clearfix">
                        @foreach($posts as $post)
                            <div class="post">
                                <div class="entry-media">
                                    <img src="{{$post->photo}}" alt style="height: 450px; width: 100%; object-fit: cover">
                                </div>
                                @php
                                    $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                                @endphp
                                <div class="details">
                                    <ul class="entry-meta">
                                        <li style="padding-top: 10px">
                                            @foreach($author_info as $data)
                                            {{-- <img src="{{$data->photo}}" alt> --}}
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
                                    <h3><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
                                    <p>
                                        {!! html_entity_decode($post->summary) !!}
                                    </p>
                                    <a href="{{route('blog.detail',$post->slug)}}" class="read-more">Savoir Plus</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="shop_toolbar t_bottom text-center">
                            <div class="pagination">
                                {{$posts->appends($_GET)->links()}}
                            </div>
                        </div>
                    @endif
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
    <!-- end blog-pg-section -->

@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush