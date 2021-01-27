@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','Beauty Design - PRODUCT DETAIL')
@section('main-content')

	<!-- start page-title -->
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col col-xs-12">
					<h2 style="margin-top: 50px">Détails de produit</h2>
					<ol class="breadcrumb">
						<li><a href="{{route('home')}}">Accueil</a></li>
						<li>Détails de produit</li>
					</ol>
				</div>
			</div> <!-- end row -->
		</div> <!-- end container -->
	</section>
	<!-- end page-title -->

	<!-- start project-single-section -->
	<section class="project-single-section section-padding">
		<div class="container-fluid">
			<div class="row">
				<div class="col col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="content-area">
						<h2>{{$product_detail->title}}</h2>
						<div class="video-holder">
							@php
								$photos = explode(',',$product_detail->photo);
							@endphp
							<img src="{{$photos[0]}}" alt style="max-height: 600px; width: 100%; object-fit: cover;">
						</div>
						<div class="porject-info clearfix">
							<div>
								<span>Categorie</span>
								<p>{{$product_detail->cat_info->title}}</p>
							</div>
							<div>
								<span>Produit</span>
								<p>{{$product_detail->title}}</p>
							</div>
						</div>
						<p>
							{!! $product_detail->description !!}
						</p>
						
						<div class="img-area">
							<h2>Galerie</h2>
							<div class="my-gallery row" itemscope itemtype="http://schema.org/ImageGallery">
								@foreach ($photos as $key => $photo)
									<figure class="col-md-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" style="margin: 10px; padding: 0">
										<a id="link-{{$key}}" class="figure-overlay" href="{{$photo}}" itemprop="contentUrl" data-size="1024x1024" style="height: 250px; width: 100%;">
											<img id="img-{{$key}}" src="{{$photo}}" itemprop="thumbnail" alt style="height: 250px; width: 100%; object-fit: cover; width: 100%; padding: 0; margin: 0;"/>
										</a>
									</figure>
								@endforeach
							</div>

							@foreach ($photos as $key => $photo)
								<script>
									newimage = new Image();
									newimage.src = '{{$photo}}'; 
									newimage.onload = function()
									{
										var width = this.naturalWidth;
										var height = this.naturalHeight;
										document.getElementById('link-{{$key}}').setAttribute('data-size', width+'x'+height);
									}
								</script>
							@endforeach

							<!-- Root element of PhotoSwipe. Must have class pswp. -->
							<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="pswp__bg"></div>
								<div class="pswp__scroll-wrap">
									<div class="pswp__container">
										<div class="pswp__item"></div>
										<div class="pswp__item"></div>
										<div class="pswp__item"></div>
									</div>

									<div class="pswp__ui pswp__ui--hidden">
										<div class="pswp__top-bar">
											<div class="pswp__counter"></div>
											<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
											<button class="pswp__button pswp__button--share" title="Share"></button>
											<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
											<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

											<div class="pswp__preloader">
												<div class="pswp__preloader__icn">
												<div class="pswp__preloader__cut">
													<div class="pswp__preloader__donut"></div>
												</div>
												</div>
											</div>
										</div>

										<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
											<div class="pswp__share-tooltip"></div> 
										</div>

										<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
										<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

										<div class="pswp__caption">
											<div class="pswp__caption__center"></div>
										</div>
									</div>
								</div>
							</div>
							{{-- <img src="assets/images/service-single/img-2.jpg" alt="">
							<img src="assets/images/service-single/img-3.jpg" alt=""> --}}
						</div>
						<script>
							var initPhotoSwipeFromDOM = function(gallerySelector) {
								var parseThumbnailElements = function(el) {
									var thumbElements = el.childNodes,
										numNodes = thumbElements.length,
										items = [],
										figureEl,
										linkEl,
										size,
										item;

									for(var i = 0; i < numNodes; i++) {

										figureEl = thumbElements[i]; // <figure> element

										// include only element nodes 
										if(figureEl.nodeType !== 1) {
											continue;
										}

										linkEl = figureEl.children[0]; // <a> element

										size = linkEl.getAttribute('data-size').split('x');

										// create slide object
										item = {
											src: linkEl.getAttribute('href'),
											w: parseInt(size[0], 10),
											h: parseInt(size[1], 10)
										};



										if(figureEl.children.length > 1) {
											// <figcaption> content
											item.title = figureEl.children[1].innerHTML; 
										}

										if(linkEl.children.length > 0) {
											// <img> thumbnail element, retrieving thumbnail url
											item.msrc = linkEl.children[0].getAttribute('src');
										} 

										item.el = figureEl; // save link to element for getThumbBoundsFn
										items.push(item);
									}

									return items;
								};

								// find nearest parent element
								var closest = function closest(el, fn) {
									return el && ( fn(el) ? el : closest(el.parentNode, fn) );
								};

								// triggers when user clicks on thumbnail
								var onThumbnailsClick = function(e) {
									e = e || window.event;
									e.preventDefault ? e.preventDefault() : e.returnValue = false;

									var eTarget = e.target || e.srcElement;

									// find root element of slide
									var clickedListItem = closest(eTarget, function(el) {
										return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
									});

									if(!clickedListItem) {
										return;
									}

									// find index of clicked item by looping through all child nodes
									// alternatively, you may define index via data- attribute
									var clickedGallery = clickedListItem.parentNode,
										childNodes = clickedListItem.parentNode.childNodes,
										numChildNodes = childNodes.length,
										nodeIndex = 0,
										index;

									for (var i = 0; i < numChildNodes; i++) {
										if(childNodes[i].nodeType !== 1) { 
											continue; 
										}

										if(childNodes[i] === clickedListItem) {
											index = nodeIndex;
											break;
										}
										nodeIndex++;
									}



									if(index >= 0) {
										// open PhotoSwipe if valid index found
										openPhotoSwipe( index, clickedGallery );
									}
									return false;
								};

								// parse picture index and gallery index from URL (#&pid=1&gid=2)
								var photoswipeParseHash = function() {
									var hash = window.location.hash.substring(1),
									params = {};

									if(hash.length < 5) {
										return params;
									}

									var vars = hash.split('&');
									for (var i = 0; i < vars.length; i++) {
										if(!vars[i]) {
											continue;
										}
										var pair = vars[i].split('=');  
										if(pair.length < 2) {
											continue;
										}           
										params[pair[0]] = pair[1];
									}

									if(params.gid) {
										params.gid = parseInt(params.gid, 10);
									}

									return params;
								};

								var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
									var pswpElement = document.querySelectorAll('.pswp')[0],
										gallery,
										options,
										items;

									items = parseThumbnailElements(galleryElement);

									// define options (if needed)
									options = {

										// define gallery index (for URL)
										galleryUID: galleryElement.getAttribute('data-pswp-uid'),

										getThumbBoundsFn: function(index) {
											// See Options -> getThumbBoundsFn section of documentation for more info
											var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
												pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
												rect = thumbnail.getBoundingClientRect(); 

											return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
										}

									};

									// PhotoSwipe opened from URL
									if(fromURL) {
										if(options.galleryPIDs) {
											// parse real index when custom PIDs are used 
											// http://photoswipe.com/documentation/faq.html#custom-pid-in-url
											for(var j = 0; j < items.length; j++) {
												if(items[j].pid == index) {
													options.index = j;
													break;
												}
											}
										} else {
											// in URL indexes start from 1
											options.index = parseInt(index, 10) - 1;
										}
									} else {
										options.index = parseInt(index, 10);
									}

									// exit if index not found
									if( isNaN(options.index) ) {
										return;
									}

									if(disableAnimation) {
										options.showAnimationDuration = 0;
									}

									// Pass data to PhotoSwipe and initialize it
									gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
									gallery.init();
								};

								// loop through all gallery elements and bind events
								var galleryElements = document.querySelectorAll( gallerySelector );

								for(var i = 0, l = galleryElements.length; i < l; i++) {
									galleryElements[i].setAttribute('data-pswp-uid', i+1);
									galleryElements[i].onclick = onThumbnailsClick;
								}

								// Parse URL and open gallery if it contains #&pid=3&gid=1
								var hashData = photoswipeParseHash();
								if(hashData.pid && hashData.gid) {
									openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
								}
							};

							// execute above function
							initPhotoSwipeFromDOM('.my-gallery');
						</script>
					</div>
				</div>
			</div>
		</div> <!-- end container -->
	</section>
	<!-- end project-single-section -->

@endsection