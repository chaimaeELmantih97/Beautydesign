@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Blog')

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
            <div class="tagline"><span></span>
                <h6>Blogs</h6>
            </div>
            <!-- end tagline -->
            <h1>Beauty<br>
                <span style="-webkit-text-stroke-color:#ffffff !important;" >Design</span></h1>

            <!-- end slide-btn -->
        </div>
        <!-- end container -->
    </div>
    <!-- perspective end  -->
</header>
<!-- end header -->
@endforeach
{{-- <div class="container mt-5">
    <div class="row float-right">
        <div class="float-right">
            <div class="col-md-12">
                <form method="GET" action="{{route('blog.search')}}">
                    @csrf
                    <div class="input-group rounded mr-5">
                        <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                          aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon" style="border: none; background:none;">
                          <i class="fa fa-search"></i>
                        </span>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($posts as $post)
                <div class="post wow fadeIn">
                    <figure class="post-image">
                        @if ($post->photo)
                            <img src="{{$post->photo}}" alt="Image">
                        @else
                            <img src="{{asset('backend/img/thumbnail-default.jpg')}}" alt="Image">
                        @endif

                    </figure>
                    <!-- end news-image -->
                    <div class="post-content">
                        <div class="inner">
                            @php
                            setlocale(LC_TIME,'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
                            $date = strftime('Le %d %B, %Y', strtotime($post->created_at));
                            @endphp
                            <small class="post-date">{{$date}}</small>
                            <h3 class="post-title"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
                            @php
                            $author_info=DB::table('users')->where('id',$post->added_by)->get();
                            // dd($author_info);
                            @endphp
                            @foreach($author_info as $data)
                            <div class="post-author">
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

                            </div>
                            @endforeach
                            <p class="post-text">
                                {!! html_entity_decode($post->summary) !!}
                            </p>
                            <a href="{{route('blog.detail',$post->slug)}}" class="read-more">Savoir Plus</a>

                        </div>
                        <!-- end inner -->
                    </div>
                    <!-- end post-content -->
                </div>
                @endforeach
            </div>
            <!-- end col-12 -->
        </div>
        <div class="row d-flex align-items-center justify-content-center">
            @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
            {{$posts->appends($_GET)->links()}}
            @endif
            </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>


@endsection
@push('styles')
<style>
    .pagination {
        display: inline-flex;
    }

</style>

@endpush
