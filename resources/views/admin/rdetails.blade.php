@extends('layouts.master')
@section('title')
{{__('login.Request').' Details | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection
@section('content')
<style>
#cust{
    background:rgba(201,201,201,0.1);
    border:1px solid #ededed;
}
</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<section id="section-body">

<!--start detail top-->
<div class="detail-top detail-top-grid no-margin">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="header-detail table-list">
                    <div class="header-left">
                        <h1>
                        {{$listing->title}}
                            <span class="label-wrap hidden-sm hidden-xs">
                                @if($listing->status == 1)
                                <span class="label label-primary">{{__('login.sale')}}</span>
                                @elseif($listing->status == 2)
                                <span class="label label-primary">{{__('login.rent')}}</span>
                                @elseif($listing->status == 3)
                                <span class="label label-primary">{{__('login.forcl')}}</span>
                                @endif
                                @if($listing->is_sold == 1)
                                <span class="label label-danger">{{__('login.sold')}}</span>
                                @endif
                            </span>
                        </h1>
                        <address class="property-address">{{$listing->adresse->adresse}}</address>
                    </div>
                    <div class="header-right">
                        <ul class="actions">
                        </ul>
                        @if($listing->status == 1)
                            <span class="item-price">${{$listing->price}}</span>
                            <span class="item-sub-price">${{$listing->price_sqft}}/sqft</span>
                        @elseif($listing->status == 2)
                            <span class="item-price">${{$listing->price_month}}/mo</span>
                        @elseif($listing->status == 3)
                            <span class="item-price">${{$listing->price}}</span>
                            <span class="item-sub-price">${{$listing->price_year}}/{{__('login.year')}}</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end detail top-->

<!--start detail content-->
<section class="section-detail-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                <div class="detail-bar">
                    <div class="detail-media detail-top-slideshow">
                        <div class="tab-content">

                            <div id="gallery" class="tab-pane fade in active">
                                <span class="label-wrap visible-sm visible-xs">
                                @if($listing->status == 1)
                                <span class="label label-primary">{{__('login.sale')}}</span>
                                @elseif($listing->status == 2)
                                <span class="label label-primary">{{__('login.rent')}}</span>
                                @elseif($listing->status == 3)
                                <span class="label label-primary">{{__('login.forcl')}}</span>
                                @endif
                            </span>
                                <div class="slideshow">
                                    <div class="slideshow-main">
                                        <div class="slide">
                                            @foreach($listing->images as $img)
                                            <div>
                                                <img src="{{url('assets/images/posts')}}{{'/'.$img->path}}" style="max-height:430px; min-height:430px; min-width:100%; max-width:100%;" alt="Slide show">
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                    <div class="slideshow-nav-main">
                                        <div class="slideshow-nav">
                                        @foreach($listing->images as $img)
                                            <div>
                                                <img src="{{url('assets/images/posts')}}{{'/'.$img->path}}" style="max-height:70px; min-height:70px; max-width:70px; min-width:70px;" alt="Slide show thumb">
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="map" class="tab-pane fade"></div>
                            <div id="street-map" class="tab-pane fade"></div>

                        </div>
                        <div class="media-tabs">
                            <ul class="media-tabs-list">
                                <li class="popup-trigger" data-placement="bottom" data-toggle="tooltip" data-original-title="View Photos">
                                    <a href="#gallery" data-toggle="tab">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                </li>
                                <li data-placement="bottom" data-toggle="tooltip" data-original-title="Map View">
                                    <a href="#map" data-toggle="tab">
                                        <i class="fa fa-map"></i>
                                    </a>
                                </li>
                                <li data-placement="bottom" data-toggle="tooltip" data-original-title="Street View">
                                    <a href="#street-map" data-toggle="tab">
                                        <i class="fa fa-street-view"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="property-description detail-block">
                        <div class="detail-title">
                            <h2 class="title-left">Description</h2>
                        </div>
                        <p>{{$listing->description}}</p>
                    </div>
                    <div class="detail-address detail-block">
                        <div class="detail-title">
                            <h2 class="title-left">{{__('login.adress')}}</h2>
                            <div class="title-right">
                                <a target="_blank" href="https://maps.google.com/?q={{$listing->adresse->latmap}},{{$listing->adresse->longmap}}">{{__('login.openg')}} <i class="fa fa-map-marker"></i></a>
                            </div>
                        </div>
                        <ul class="list-three-col">
                            <li><strong>{{__('login.adress')}}:</strong> {{$listing->adresse->adresse}}</li>
                            @if($listing->adresse->city != null)
                                <li><strong>{{__('login.city')}}:</strong> {{$listing->adresse->city}}</li>
                            @endif
                            <li><strong>{{__('login.state')}}:</strong> {{$listing->adresse->state}}</li>
                            @if($listing->adresse->zip != null)
                                <li><strong>Zip:</strong> {{$listing->adresse->zip}}</li>
                            @endif
                            <li><strong>{{__('login.country')}}:</strong> {{$listing->adresse->country}}</li>
                            <li><strong>{{__('login.quar')}}:</strong> {{$listing->adresse->quartier}}</li>
                        </ul>
                    </div>
                    <div class="detail-list detail-block">
                        <div class="detail-title">
                            <h2 class="title-left">Details</h2>
                        </div>
                        <div class="alert alert-info" id="cust">
                            <ul class="list-three-col">
                                @if($listing->status == 1)
                                    <li><strong>{{__('login.price')}}:</strong> ${{$listing->price}}</li>
                                    <li><strong>{{__('login.price')}}/sqft:</strong> ${{$listing->price_sqft}}/sqft</li>
                                @elseif($listing->status == 2)
                                    <li><strong>{{__('login.pmonth')}}:</strong> ${{$listing->price_month}}/mo</li>
                                @elseif($listing->status == 3)
                                    <li><strong>{{__('login.price')}}:</strong> ${{$listing->price}}</li>
                                    <li><strong>{{__('login.pyear')}}:</strong> ${{$listing->price_year}}/{{__('login.year')}}</li>
                                @endif
                                <li><strong>{{__('login.psize')}}:</strong> {{$listing->detail->area_size}} sqft</li>
                                <li><strong>{{__('login.beds')}}:</strong> {{$listing->detail->beds}}</li>
                                <li><strong>{{__('login.baths')}}:</strong> {{$listing->detail->baths}}</li>
                                <li><strong>{{__('login.garage')}}:</strong> {{$listing->detail->garades}}</li>
                                <li><strong>{{__('login.gsize')}}:</strong> {{$listing->detail->garade_size}} sqft</li>
                                <li><strong>{{__('login.yearb')}}:</strong> {{$listing->detail->yearbuilt}}</li>
                            </ul>
                        </div>
                        @if(count($listing->additional))
                        <div class="detail-title-inner">
                            <h4 class="title-inner">{{__('login.additional')}}</h4>
                        </div>
                        <ul class="list-three-col">
                            @foreach($listing->additional as $ad)
                            <li><strong>{{$ad->property}}:</strong> {{$ad->description}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @if(count($listing->features) > 0)
                    <div class="detail-features detail-block">
                        <div class="detail-title">
                            <h2 class="title-left">{{__('login.feats')}}</h2>
                        </div>
                        @foreach($listing->features as $f)
                        <ul class="list-three-col list-features">
                            <li><a href="#"><i class="fa fa-check"></i>{{$f->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                    @endif
                    <div class="property-plans detail-block">
                        @if(count($listing->floors))
                        <div class="detail-title">
                            <h2 class="title-left">Floor plans</h2>
                        </div>
                        <div class="accord-block">
                            @foreach($listing->floors as $floor)
                            <div class="accord-tab">
                                <h3>{{$floor->name}}</h3>
                                <ul>
                                    <li>{{__('login.size')}}: <strong>{{$floor->size}} sqft</strong></li>
                                    <li>{{__('login.bbeds')}}: <strong>{{$floor->beds}}</strong></li>
                                    <li>{{__('login.bbaths')}}: <strong>{{$floor->baths}}</strong></li>
                                    <li>{{__('login.price')}}: <strong>${{$floor->price}}</strong></li>
                                </ul>
                                <div class="expand-icon"></div>
                            </div>
                            <div class="accord-content" style="display: none">
                                <img src="{{url('assets/images/floors')}}{{'/'.$floor->image}}" alt="img" style="width:100%; height:436px;">
                                <p style="text-align:left;">{{$floor->description}}</p>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="detail-title-inner">
                            <h4 class="title-inner">Documents</h4>
                        </div>
                        <ul class="document-list">
                            @foreach($listing->documents as $doc)
                            <li>
                                <div class="pull-left">
                                    <i class="fa fa-file-o"></i> {{$doc->title}}
                                </div>
                                <div class="pull-right">
                                    <a target="_blank" href="{{url('assets/images/documents')}}{{'/'.$doc->path}}">{{__('login.download')}}</a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="property-video detail-block">
                        <div class="detail-title">
                            <h2 class="title-left">Video</h2>
                        </div>
                        <div class="video-block">
                            <a href="{{$listing->video}}" data-fancy="property_video" title="YouTube demo">
                                <span class="play-icon"><img src="{{url('assets/images/icons/video-play-icon.png')}}" alt="YouTube demo" width="70" height="50"></span>
                                <img src="{{url('assets/images/posts')}}{{'/'.$listing->images[0]->path}}" alt="thumb" class="video-thumb">
                            </a>
                        </div>
                    </div>

                    <div class="detail-contact detail-block">
                        <div class="detail-title">
                            <h2 class="title-left">Contact info</h2>
                            <div class="title-right"><strong><a href="{{url('/profile').'/'.$listing->user_id}}">{{__('login.vml')}}</a></strong></div>
                        </div>
                        <div class="media agent-media">
                            <div class="media-left">
                                <a href="">
                                    @if($user->contact != null)
                                        @if($user->contact->profile_pic != null)
                                            <img src="{{url('/assets/images/profile')}}{{'/'.$user->contact->profile_pic}}" class="media-object" alt="image" style="width:100%; height:88px;">
                                        @else 
                                            <img src="{{url('/assets/images/profile/profile.png')}}" class="media-object" alt="image" style="width:100%; height:88px;">
                                        @endif
                                    @else 
                                        <img src="{{url('/assets/images/profile/profile.png')}}" class="media-object" alt="image" style="width:100%; height:88px;">
                                    @endif
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{__('login.cagent')}}</h4>
                                <ul>
                                    <li><i class="fa fa-user"></i> {{$user->fname}} {{$user->sname}}</li>
                                    <li><span><a href=""><i class="fa-solid fa-at" style="font-family:'FontAwesome';"></i>   {{$user->email}}</a></span></li>
                                    @if($user->contact != null)
                                    <li>
                                        @if($user->contact->fax != null)
                                            <span><i class="fa fa-phone"></i> {{$user->contact->fax}}</span>
                                        @endif

                                        @if($user->contact->phone != null)
                                            <span><i class="fa fa-mobile"></i> {{$user->contact->phone}}</span>
                                        @endif
                                        
                                    </li>
                                    <li>
                                        @if($user->contact->facebook != null)
                                            <span><a href="{{$user->contact->facebook}}"><i class="fa fa-facebook-square"></i> Facebook</a></span>
                                        @endif
                                        @if($user->contact->twitter != null)
                                            <span><a href="{{$user->contact->twitter}}"><i class="fa fa-twitter-square"></i>  Twitter</a></span>
                                        @endif
                                        @if($user->contact->linkedin != null)
                                            <span><a href="{{$user->contact->linkedin}}"><i class="fa fa-linkedin-square"></i>  Linkedin</a></span>
                                        @endif
                                        @if($user->contact->instagram != null)
                                            <span><a href="{{$user->contact->instagram}}"><i class="fa fa-instagram"></i>  Instagram</a></span>
                                        @endif 
                                        @if($user->contact->website != null)
                                            <span><a href="{{$user->contact->website}}"><i class="fa fa-globe"></i>  Website</a></span>
                                        @endif
                                        @if($user->contact->whatsapp != null)
                                            <span><a href="{{$user->contact->whatsapp}}"><i class="fa fa-whatsapp"></i>  Whatsapp</a></span>
                                        @endif
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
                <aside id="sidebar">
                    @if(count($listing->documents) > 0)
                    <div class="widget widget-download">
                        <div class="widget-top">
                            <h3 class="widget-title">Documents</h3>
                        </div>
                        <div class="widget-body">
                            <ul>
                            @foreach($listing->documents as $doc)
                                <li>
                                    <div class="pull-left">
                                        {{$doc->title}}
                                    </div>
                                    <div class="pull-right">
                                        <a target="_blank" href="{{url('assets/images/documents')}}{{'/'.$doc->path}}">{{__('login.download')}}</a>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <div class="widget widget-download">
                        <div class="widget-body">
                            <ul>
                                <li>
                                    <div class="pull-left">
                                        <form action="/accept" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$listing->id}}">
                                            <button type="submit" class="btn btn-info">{{__('login.confirm')}}</button>
                                        </form>
                                    </div>
                                    <div class="pull-right">
                                        <form action="/reject" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$listing->id}}">
                                            <button type="submit" class="btn btn-danger">{{__('login.reject')}}</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</section>
<!--end detail content-->

    </section>
    <script type="text/javascript" src="{{url('assets/js/jquery.js')}}"></script>
    <script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE&amp;callback=initMap"></script>
    <script type="text/javascript">
        var map = null;
        var panorama = null;
        var fenway = new google.maps.LatLng({{$listing->adresse->latmap}}, {{$listing->adresse->longmap}});
        var strview = new google.maps.LatLng({{$listing->adresse->latview}}, {{$listing->adresse->longview}});
        var mapOptions = {
            center: fenway,
            zoom: 12
        };
        var panoramaOptions = {
            position: strview,
            pov: {
                heading: 34,
                pitch: 10
            }
        };
        var tabsHeight = function() {
            //jQuery(".detail-media .tab-content").css('min-height',jQuery("#gallery").innerHeight());
            jQuery("#map,#street-map").css('min-height',jQuery(".detail-media #gallery").innerHeight());
        };

        jQuery(window).on('load',function(){
            tabsHeight();
        });
        jQuery(window).on('resize',function(){
            tabsHeight();
        });
        function initialize() {

            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            panorama = new google.maps.StreetViewPanorama(document.getElementById('street-map'), panoramaOptions);
            map.setStreetView(panorama);
        }

        jQuery('a[href="#gallery"]').on('shown.bs.tab', function (e) {
            var main_slider = $('.slide');
            var nav_slider = $('.slideshow-nav');
            main_slider.slick("unslick");
            nav_slider.slick("unslick");
            main_slider.slick({
                speed: 500,
                autoplay: false,
                autoplaySpeed: 4000,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                //fade: true,
                accessibility: true,
                asNavFor: '.slideshow-nav'
            });
            nav_slider.slick({
                speed: 500,
                autoplay: false,
                autoplaySpeed: 4000,
                slidesToShow: 10,
                slidesToScroll: 1,
                asNavFor: '.slide',
                arrows: false,
                dots: false,
                centerMode: true,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 991,
                        settings:{
                            slidesToShow: 8
                        }
                    },
                    {
                        breakpoint: 767,
                        settings:{
                            slidesToShow: 4
                        }
                    }
                ]
            });
        });

        jQuery('a[href="#map"]').on('shown.bs.tab', function (e) {
            var center = panorama.getPosition();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
        jQuery('a[href="#street-map"]').on('shown.bs.tab', function (e) {
            fenway = panorama.getPosition();
            panoramaOptions.position = fenway;
            panorama = new google.maps.StreetViewPanorama(document.getElementById('street-map'), panoramaOptions);
            map.setStreetView(panorama);
        });
        google.maps.event.addDomListener(window, 'load', initialize);

        $('#addfav').click(function(){
            $('.favform').submit()
        })
    </script>
@endsection