@extends('frontend.layouts.master')

@section('title','Beauty Design - Liste des Produits')

@section('main-content')

	<!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 style="margin-top: 50px">Liste des Produits</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Accueil</a></li>
                        <li>Liste des Produits</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>        
	<!-- end page-title -->
    
    
    <!-- start blog-pg-section -->
    <section class="blog-pg-section section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-9 col-md-push-3">
                    <div class="row">
                        @if(count($products)>0)
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="item" style="margin-top: 30px">
                                        <div class="arkit-single-service">
                                            @php
                                                $photos = explode(',',$product->photo);
                                            @endphp
                                            <img alt="{{$photos[0]}}" class="img-responsive" src="{{$photos[0]}}" style="height: 300px; width: 100%; object-fit: cover;" >
                                            <div class="content-inner">
                                                <h3><a href="javascript:">
                                                    <span>{{$product->title}}</span></a>
                                                </h3>
                                                <a class="read-more-btn" href="{{route('product-detail',$product->slug)}}">Savoir Plus <span>+</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/item-->
                                </div>
                            @endforeach
                        @else
                            <h3>Aucun Produit Trouvé!<h3>
                        @endif
                    </div>
                    @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        <div class="shop_toolbar t_bottom text-center">
                            <div class="pagination">
                                {{$products->appends($_GET)->links()}}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col col-md-3 col-md-pull-9">
                    <div class="blog-sidebar" style="margin-top: 30px">
                        <div class="widget search-widget">
                            <h3>Recherche</h3>
                            <form method="GET" action="{{route('product.search')}}">
                                @csrf
                                <div>
                                    <input type="text" name="search" class="form-control" placeholder="Rechercher...">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>

                        @php
                            // $category = new Category();
                            $menu=App\Models\Category::getAllParentWithChild();
                        @endphp
                        @if($menu)
                            <div class="widget category-widget">
                                <h3>Categories</h3>
                                <ul>
                                    @foreach ($menu as $key => $cat_info)
                                        <li>
                                            @if (Request::segment(2) == $cat_info->slug)
                                                <a href="{{route('product-cat', $cat_info->slug)}}" style="color: #c87941">
                                                    {{$cat_info->title}}</span>
                                                </a>
                                            @else
                                                <a href="{{route('product-cat', $cat_info->slug)}}">
                                                    {{$cat_info->title}}</span>
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (count($recent_products) > 0)
                            <div class="widget recent-post-widget">
                                <h3>Produits récents</h3>
                                <div class="posts">
                                    @foreach($recent_products as $product)
                                        <div class="post">
                                            @php
                                                $photos = explode(',',$product->photo);
                                            @endphp
                                            <div class="img-holder">
                                                <img src="{{$photos[0]}}" alt style="height: 80px; width: 80px; object-fit: cover">
                                            </div>
                                            <div class="details">
                                                <h4><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h4>
                                                <a class="read-more-btn" href="{{route('product-detail',$product->slug)}}">Savoir Plus <span>+</span></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
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
    .filter_button{
        /* height:20px; */
        text-align: center;
        background:#F7941D;
        padding:8px 16px;
        margin-top:10px;
        color: white;
    }
</style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script>
        $('.cart').click(function(){
            var quantity=1;
            var pro_id=$(this).data('id');
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
                    else{
                        swal('error',response.msg,'error').then(function(){
							// document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}
    <script>
        $(document).ready(function(){
        /*----------------------------------------------------*/
        /*  Jquery Ui slider js
        /*----------------------------------------------------*/
        if ($("#slider-range").length > 0) {
            const max_value = parseInt( $("#slider-range").data('max') ) || 500;
            const min_value = parseInt($("#slider-range").data('min')) || 0;
            const currency = $("#slider-range").data('currency') || '';
            let price_range = min_value+'-'+max_value;
            if($("#price_range").length > 0 && $("#price_range").val()){
                price_range = $("#price_range").val().trim();
            }
            
            let price = price_range.split('-');
            $("#slider-range").slider({
                range: true,
                min: min_value,
                max: max_value,
                values: price,
                slide: function (event, ui) {
                    $("#amount").val(currency + ui.values[0] + " -  "+currency+ ui.values[1]);
                    $("#price_range").val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            }
        if ($("#amount").length > 0) {
            const m_currency = $("#slider-range").data('currency') || '';
            $("#amount").val(m_currency + $("#slider-range").slider("values", 0) +
                "  -  "+m_currency + $("#slider-range").slider("values", 1));
            }
        })
    </script>
@endpush