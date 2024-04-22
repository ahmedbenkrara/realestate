@extends('layouts.master')
@section('title')
{{__('login.favpro').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
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
<!--start section page body-->
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
                <li> <a href="/myaccount"> {{__('login.mprofile')}} </a></li>
                <li> <a href="/dashboard"> {{__('login.mpro')}} </a></li>
                <li class="active"> <a href=""> {{__('login.favpro')}} </a></li>
            </ul>
            <div class="profile-area-content" style="padding-top:20px;">
                <div class="account-block">
                    <div class="property-listing list-view">
                            <div class="row">
                                @foreach($listing as $item)
                                    <div class="item-wrap">
                                        <div class="property-item table-list">
                                            <div class="table-cell">
                                                <div class="figure-block">
                                                    <figure class="item-thumb">
                                                        @if(count($item->annonce->features) > 0)
                                                        <span class="label-featured label label-success">{{__('login.featured')}}</span>
                                                        @endif
                                                        <div class="label-wrap label-right hide-on-list">
                                                            @if($item->annonce->status == 1)
                                                            <span class="label label-default">{{__('login.sale')}}</span>
                                                            @elseif($item->annonce->status == 2)
                                                            <span class="label label-default">{{__('login.rent')}}</span>
                                                            @elseif($item->annonce->status == 3)
                                                            <span class="label label-default">{{__('login.forcl')}}</span>
                                                            @endif
                                                        </div>
                                                        <div class="price hide-on-list">
                                                            @if($item->annonce->status == 1)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->annonce->price}}</h3>
                                                            <p class="rant">${{$item->annonce->price_sqft}}/sqft</p>
                                                            @elseif($item->annonce->status == 2)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->annonce->price_month}}/mo</h3>
                                                            <p class="rant"></p>
                                                            @elseif($item->annonce->status == 3)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->annonce->price}}</h3>
                                                            <p class="rant">${{$item->annonce->price_year}}/{{__('login.year')}}</p>
                                                            @endif
                                                        </div>
                                                        <a href="">
                                                            <img src="{{url('assets/images/posts').'/'.$item->annonce->images[0]->path}}" id="img" style="height:172px;" alt="thumb">
                                                        </a>
                                                        <ul class="actions">
                                                            <li>
                                                                <span id="{{$item->annonce->id}}" class="removef" title="" data-placement="top" data-toggle="tooltip" data-original-title="Remove">
                                                                    <i class="fa fa-times"></i>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="item-body table-cell">

                                                <div class="body-left table-cell">
                                                    <div class="info-row">
                                                        <div class="label-wrap hide-on-grid">
                                                            @if($item->annonce->status == 1)
                                                            <div class="label-status label label-default">{{__('login.sale')}}</div>
                                                            @elseif($item->annonce->status == 2)
                                                            <div class="label-status label label-default">{{__('login.rent')}}</div>
                                                            @elseif($item->annonce->status == 3)
                                                            <div class="label-status label label-default">{{__('login.forcl')}}</div>
                                                            @endif
                                                        </div>
                                                        <h2 class="property-title"><a href="">{{$item->annonce->title}}</a></h2>
                                                        <h4 class="property-location">{{$item->annonce->adresse->adresse}}</h4>
                                                    </div>
                                                    <div class="info-row amenities hide-on-grid">
                                                        <p>
                                                            <span>{{__('login.bbeds')}}: {{$item->annonce->detail->beds}}</span>
                                                            <span>{{__('login.bbaths')}}: {{$item->annonce->detail->baths}}</span>
                                                            <span>Sqft: {{$item->annonce->detail->area_size}}</span>
                                                        </p>
                                                        <p>{{ $item->annonce->type->name }}</p>
                                                    </div>
                                                    <div class="info-row date hide-on-grid">
                                                        <p><i class="fa fa-user"></i> <a href="">{{$item->annonce->user->fname}} {{$item->annonce->user->sname}}</a></p>
                                                        <p><i class="fa fa-calendar"></i> {{explode(' ',$item->annonce->created_at)[0]}} </p>
                                                    </div>
                                                </div>
                                                <div class="body-right table-cell hidden-gird-cell">
                                                    <div class="info-row price">
                                                        @if($item->annonce->status == 1)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->annonce->price}}</h3>
                                                            <p class="rant">${{$item->annonce->price_sqft}}/sqft</p>
                                                        @elseif($item->annonce->status == 2)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->annonce->price_month}}/mo</h3>
                                                            <p class="rant"></p>
                                                        @elseif($item->annonce->status == 3)
                                                            <p class="price-start"></p>
                                                            <h3>${{$item->annonce->price}}</h3>
                                                            <p class="rant">${{$item->annonce->price_year}}/{{__('login.year')}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="info-row phone text-right">
                                                        <a href="{{url('/details/'.$item->annonce->adresse->city.'/'.$item->annonce->type->name.'/'.$item->annonce->id)}}" class="btn btn-primary" id="details" style="background:#00aeef;">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                        <p><a href="">{{$item->annonce->user->phone}}</a></p>
                                                    </div>
                                                </div>
                                                <div class="table-list full-width hide-on-list">
                                                    <div class="cell">
                                                        <div class="info-row amenities">
                                                            <p>
                                                                <span>{{__('login.bbeds')}}: {{$item->annonce->detail->beds}}</span>
                                                                <span>{{__('login.bbaths')}}: {{$item->annonce->detail->baths}}</span>
                                                                <span>Sqft:{{$item->annonce->detail->area_size}}</span>
                                                            </p>
                                                            <p>{{$item->annonce->type->name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="cell">
                                                        <div class="phone">
                                                            <a href="{{url('/details/'.$item->annonce->adresse->city.'/'.$item->annonce->type->name.'/'.$item->annonce->id)}}" class="btn btn-primary" id="details" style="background:#00aeef;">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                            <p><a href="">{{$item->annonce->user->phone}}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-foot date hide-on-list">
                                            <div class="item-foot-left">
                                                <p><i class="fa fa-user"></i> <a href="#">{{$item->annonce->user->fname}} {{$item->annonce->user->sname}}</a></p>
                                            </div>
                                            <div class="item-foot-right">
                                                <p><i class="fa fa-calendar"></i> {{explode(' ',$item->annonce->created_at)[0]}} </p>
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
<!--end section page body-->
<script type="text/javascript" src="{{ url('assets/js/jquery.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.removef').click(function(){
            var id = $(this).prop('id')
            if(confirm("{{__('login.sure')}}")){
                $.ajax({
                    header:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:"/deleteFav",
                    dataType:'JSON',
                    type:'POST',
                    data:{
                        id : id,
                        _token : $("meta[name='csrf-token']").attr('content')
                    },
                    success:function(res){
                        alert("{{__('login.deleted')}}")
                        location.reload()
                    }
                })
            }
        })
    })
</script>
@endsection