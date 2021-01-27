@extends('frontend.layouts.master')

@section('title','Beauty Design Design - Promotions')

@section('main-content')

	@php
		$settings=DB::table('settings')->get();
	@endphp

    <!-- start page-title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <h2 style="margin-top: 50px,">Promotions</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Accueil</a></li>
                        <li>Promotions</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
	<!-- end page-title -->

	<!-- start Service -->
    <section class="arkit-service section-padding">
        <div class="container">
            @if (count($promotions) > 0)
                <div class="arkit-service-top">
                    <div class="row display-flex-title">
                        <div class="col-lg-6 col-md-7 col-xs-12">
                            <div class="section-title text-center">
                                <span>Nos Promotions</span>
                                <h2>NOS PROMOTIONS EN COURS.</h2>
                            </div>
                        </div>
                    </div>
                </div><!-- /Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme service-info-slider my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                            @foreach ($promotions as $key => $promotion)
                                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                    <a id="link-{{$key}}" class="figure-overlay" href="{{$promotion->photo}}" itemprop="contentUrl" data-size="1024x1024">
                                        <img id="img-{{$key}}" src="{{$promotion->photo}}" itemprop="thumbnail" alt/>
                                    </a>
                                </figure>
                                {{-- <div class="item">
                                    <div class="single-work">
                                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a id="link-{{$key}}" class="figure-overlay" href="{{$promotion->photo}}" itemprop="contentUrl" data-size="1024x1024">
                                                <img id="img-{{$key}}" src="{{$promotion->photo}}" itemprop="thumbnail" alt/>
                                            </a>
                                        </figure>
                                        <img alt="" class="img-responsive" src="{{$promotion->photo}}" style="height: 400px; object-fit: cover">
                                        <div class="hover_layer">
                                            <div class="info">
                                                <h3><a href="javascript:">{{$promotion->title}}</a></h3>
                                            </div>
                                            <div class="details-btn">
                                                <a class="portfolio-btn">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/item--> --}}
                            @endforeach
                        </div>

                        @foreach ($promotions as $key => $promotion)
                        <script>
                                newimage = new Image();
                                newimage.src = '{{$promotion->photo}}';
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
            @else
                <div class="row display-flex-title">
                    <div class="col-lg-6 col-md-7 col-xs-12">
                        <div class="section-title text-center">
                            <span>Nos Promotions</span>
                            <h2>Aucune Promotion Maintenant!</h2>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- end of Service -->

@endsection
