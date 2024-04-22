@extends('layouts.master')
@section('title')
{{__('login.Request').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection
@section('content')
<style>
    .notfound{
        display:block;
        width: 242px;
        height: 168px;
        margin:auto;
    }
</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<section id="section-body">

    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-left">
                        <h1 class="title-head">{{__('login.wback')}}, {{Auth::user()->fname}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="user-dashboard-full">
            <ul class="profile-menu-tabs">
                <li> <a href="/profile"> {{__('login.mprofile')}} </a></li>
                <li class="active"> <a href="/requests"> {{__('login.p')}} </a></li>
            </ul>
            <div class="profile-area-content" style="padding-top:20px;">
                <div class="account-block">

                    <div class="my-property-listing">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="my-list-sidebar">
                                    <div class="my-property-menu">
                                        <ul>
                                            <li class="active"><a href="">{{__('login.Request')}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="row grid-row">
                                    @foreach($listing as $item)
                                    <div class="item-wrap">
                                        <div class="media my-property">
                                            <div class="media-left">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        @if(count($item->features) > 0)
                                                            <span class="label-featured label label-success">{{__('login.featured')}}</span>
                                                        @endif
                                                        <a href="">
                                                            <img src="{{url('/assets/images/posts').'/'.$item->images[0]->path}}" alt="thumb" style="width:100%; height:110px;">
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="media-body media-middle">
                                                <div class="my-description">
                                                    <h4 class="my-heading"><a href="">{{$item->title}}</a></h4>
                                                    <p class="address">{{$item->adresse->adresse}}</p>
                                                    @if($item->status == 1)
                                                        <p class="status"><strong>Status:</strong> {{__('login.sell')}} </p>
                                                    @elseif($item->status == 2)
                                                        <p class="status"><strong>Status:</strong> {{__('login.rent')}} </p>
                                                    @elseif($item->status == 3)
                                                        <p class="status"><strong>Status:</strong> {{__('login.foreclosures')}} </p>
                                                    @endif
                                                    
                                                </div>
                                                <div class="my-actions">
                                                    <div class="btn-group">
                                                        <a href="{{url('/details/'.$item->id)}}" class="action-btn" data-toggle="tooltip" data-placement="top" title="Details">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(count($listing) == 0)
                                        <img src="{{url('/assets/images/wallpapers/213.png')}}" class="notfound" alt="">
                                        <h1 style="text-align:center;">{{__('login.nrf')}}</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!--start Pagination-->
                <div class="pagcen">
                    <div style="margin-left:auto; margin-right:auto; min-width:fit-content; max-width:fit-content;">
                        {{$listing->links()}}
                    </div>
                </div>
                <!--start Pagination-->
            </div>
        </div>
    </div>
</section>
@endsection