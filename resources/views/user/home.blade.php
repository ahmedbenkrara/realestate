@extends('layouts.master')
@section('title')
{{__('login.home').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection

@section('content')
<style>
    #immg{
        width: 100%;
        height: 200px;
    }
    @media only screen and (max-width: 768px) {
        .hided{
            display:none;
        }
    }
</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
    <div class="header-media">
        <div class="banner-parallax">
            <div class="banner-bg-wrap">
                <div class="banner-inner" style="background-image: url('{{url('assets/images/wallpapers/Lot.png')}}')"></div>
            </div>
        </div>
        <div class="banner-caption">
            <h1>{{__('login.wtph')}}</h1>
            <h2 class="banner-sub-title">{{__('login.urpc')}}</h2>
        </div>
    </div>

    <!--start section page body-->
    <section id="section-body">

        <!--start carousel module-->
        <div class="houzez-module-main hided">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>{{__('login.lsale')}}</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-1-prev">{{__('login.prev')}}</button>
                                    <button class="btn btn-sm btn-crl-pprt-1-next">{{__('login.next')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-1 slide-animated">
                                @foreach($sell as $item)
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">{{__('login.sell')}}</div>
                                                        </div>
                                                        @if(count($item->features) > 0)
                                                        <span class="label-featured label label-success">{{__('login.featured')}}</span>
                                                        @endif
                                                        <div class="price hide-on-list">
                                                            @if($item->status == 1)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->price}}</h3>
                                                            <p class="rant">${{$item->price_sqft}}/sqft</p>
                                                            @elseif($item->status == 2)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->price_month}}/mo</h3>
                                                            <p class="rant"></p>
                                                            @elseif($item->status == 3)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->price}}</h3>
                                                            <p class="rant">${{$item->price_year}}/{{__('login.year')}}</p>
                                                            @endif
                                                        </div>
                                                        <a href="" class="hover-effect">
                                                            <img id="immg" src="{{url('/assets/images/posts').'/'.$item->images[0]->path}}" alt="thumb">
                                                        </a>

                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">

                                                            <h2 class="property-title"><a href="#">{{$item->title}}</a></h2>
                                                            <h4 class="property-location">{{$item->adresse->adresse}}</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>{{__('login.bbeds')}}: {{$item->detail->beds}}</span>
                                                                        <span>{{__('login.bbaths')}}: {{$item->detail->baths}}</span>
                                                                        <span>Sqft: {{$item->detail->area_size}}</span>
                                                                    </p>
                                                                    <p>{{ $item->type->name }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <div class="phone">
                                                                    <a href="{{url('/details/'.$item->adresse->city.'/'.$item->type->name.'/'.$item->id)}}" class="btn btn-primary" style="background:#00aeef;">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="item-foot date hide-on-list">
                                                <div class="item-foot-left">
                                                    <p><i class="fa fa-user"></i> <a href="{{url('/profile').'/'.$item->user->id}}">{{$item->user->fname}} {{$item->user->sname}}</a></p>
                                                </div>
                                                <div class="item-foot-right">
                                                    <p><i class="fa fa-calendar"></i> {{explode(' ',$item->created_at)[0]}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end carousel module-->

        <!--start carousel module-->
        <div class="houzez-module-main hided">
            <div class="houzez-module carousel-module">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="module-title-nav clearfix">
                                <div>
                                    <h2>{{__('login.lrent')}}</h2>
                                </div>
                                <div class="module-nav">
                                    <button class="btn btn-sm btn-crl-pprt-2-prev">{{__('login.prev')}}</button>
                                    <button class="btn btn-sm btn-crl-pprt-2-next">{{__('login.next')}}</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row grid-row">
                                <div class="carousel properties-carousel-grid-2 slide-animated">
                                    @foreach($rent as $item)
                                    <div class="item">
                                        <div class="item-wrap">
                                            <div class="property-item item-grid">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        <div class="label-wrap hide-on-list">
                                                            <div class="label-status label label-default">{{__('login.rent')}}</div>
                                                        </div>
                                                        @if(count($item->features) > 0)
                                                        <span class="label-featured label label-success">{{__('login.featured')}}</span>
                                                        @endif
                                                        <div class="price hide-on-list">
                                                            @if($item->status == 1)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->price}}</h3>
                                                            <p class="rant">${{$item->price_sqft}}/sqft</p>
                                                            @elseif($item->status == 2)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->price_month}}/mo</h3>
                                                            <p class="rant"></p>
                                                            @elseif($item->status == 3)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->price}}</h3>
                                                            <p class="rant">${{$item->price_year}}/{{__('login.year')}}</p>
                                                            @endif
                                                        </div>
                                                        <a href="" class="hover-effect">
                                                            <img id="immg" src="{{url('/assets/images/posts').'/'.$item->images[0]->path}}" alt="thumb">
                                                        </a>

                                                    </figure>
                                                </div>
                                                <div class="item-body">

                                                    <div class="body-left">
                                                        <div class="info-row">

                                                            <h2 class="property-title"><a href="#">{{$item->title}}</a></h2>
                                                            <h4 class="property-location">{{$item->adresse->adresse}}</h4>
                                                        </div>
                                                        <div class="table-list full-width info-row">
                                                            <div class="cell">
                                                                <div class="info-row amenities">
                                                                    <p>
                                                                        <span>{{__('login.bbeds')}}: {{$item->detail->beds}}</span>
                                                                        <span>{{__('login.bbaths')}}: {{$item->detail->baths}}</span>
                                                                        <span>Sqft: {{$item->detail->area_size}}</span>
                                                                    </p>
                                                                    <p>{{ $item->type->name }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="cell">
                                                                <div class="phone">
                                                                    <a href="{{url('/details/'.$item->adresse->city.'/'.$item->type->name.'/'.$item->id)}}" class="btn btn-primary" style="background:#00aeef;">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="item-foot date hide-on-list">
                                                <div class="item-foot-left">
                                                    <p><i class="fa fa-user"></i> <a href="{{url('/profile').'/'.$item->user->id}}">{{$item->user->fname}} {{$item->user->sname}}</a></p>
                                                </div>
                                                <div class="item-foot-right">
                                                    <p><i class="fa fa-calendar"></i> {{explode(' ',$item->created_at)[0]}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end carousel module-->

        <!--start location module-->
        <div class="houzez-module-main module-white-bg">
            <div class="houzez-module module-title text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h2>{{__('login.octype')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="location-modul" class="houzez-module location-module grid">
                <div class="container">
                    <div class="row">
                        @php 
                           $a = [8,4];
                           $i = 0;
                           $size = count($datat);
                        @endphp

                        @for($j=0;$j<$size;$j++)
                        @if($i == 1)
                           @php 
                             $tmp = $a[0];
                             $a[0] = $a[1];
                             $a[1] = $tmp;
                             $i = 0;
                           @endphp
                        @else
                           @php
                              $i++;
                           @endphp
                        @endif
                        <div class="col-sm-{{$a[0]}}">
                            <div class="location-block" style="border-radius:3px;">
                                <figure>
                                    <a href="{{url('filter?title=&mins=&maxs=&minp=&maxp=&type=').$datat[$j]->id}}">
                                        <img src="{{$datat[$j]->cover}}" style="border-radius:3px; object-fit: cover; object-position:50% 200%;"  alt="Image">
                                    </a>
                                </figure>
                                <div class="location-fig-caption">
                                    <h3 class="heading">{{$datat[$j]->name}}</h3>
                                </div>
                            </div>
                        </div>

                        @endfor

                    </div>
                    
                </div>
            </div>
        </div>
        <!--end location module-->

    </section>
    <!--end section page body-->


@endsection