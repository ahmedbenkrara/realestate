@extends('layouts.master')
@section('title')
{{$user->fname}} {{$user->sname}} {{'| '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection
@section('content')
<style>
    .ppic{
        height:300px;
        width:100%;
    }
    #img{
        height:172px;
    }

    #details{
        background:#00aeef;
    }

    .pagcen{
        width:100%;
    }

    .input{
        margin-bottom: 3rem;
        display: block;
        width: 100%;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        border: 2px solid #e5e7eb;
        border-radius: 5px;
        color: #9ca3af;
    }

    .notfound{
        display:block;
        width: 242px;
        height: 168px;
        margin:auto;
    }

    .fa-whatsapp,.fa-instagram,.fa-globe{
        font-family:'FontAwesome';
    }

    .fa-whatsapp:hover{
        color:#66e166;
    }


</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-left">
                        <h2 style="text-transform: capitalize;">{{$user->fname}} {{$user->sname}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="profile-detail-block agent-detail">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="profile-image">
                               @if($contact != null)
                                 @if($contact->profile_pic != null)
                                 <img src="{{url('/assets/images/profile')}}{{'/'.$contact->profile_pic}}" alt="Agent" class="ppic">
                                 @else
                                 <img src="/assets/images/profile/profile.png" alt="Agent" class="ppic">
                                 @endif
                               @else
                                 <img src="/assets/images/profile/profile.png" alt="Agent" class="ppic">
                               @endif 
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8 col-xs-12">
                            <div class="profile-description">
                                <h3 style="text-transform: capitalize;">{{$user->fname}} {{$user->sname}}</h3>
                                <h4 class="position"></h4>
                                @if($contact != null)
                                    @if($contact->about != null)
                                        <p>{{$contact->about}}</p>
                                    @else 
                                        <p>{{__('login.des')}}</p>
                                    @endif
                                <ul class="profile-contact">
                                        @if($contact->fax != null)
                                           <li><span>FAX:</span> <a href="">{{$contact->fax}}</a></li>
                                        @endif
                                        @if($contact->phone != null)
                                           <li><span>MOBILE:</span> <a href="">{{$contact->phone}}</a></li>
                                        @endif
                                @endif
                                    
                                    <li class="email"><span>Email:</span> <a href="">{{$user->email}}</a></li>
                                </ul>
                                <ul class="profile-social">
                                    @if($contact != null)
                                        @if($contact->whatsapp)
                                            <li><a href="{{$contact->whatsapp}}"><i class="fa-brands fa-whatsapp"></i></a></li>
                                        @endif
                                        @if($contact->facebook)
                                            <li><a href="{{$contact->facebook}}" class="btn-facebook"><i class="fa fa-facebook-square"></i></a></li>
                                        @endif
                                        @if($contact->twitter)
                                            <li><a href="{{$contact->twitter}}" class="btn-twitter"><i class="fa fa-twitter-square"></i></a></li>
                                        @endif
                                        @if($contact->linkedin)
                                            <li><a href="{{$contact->linkedin}}" class="btn-linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                        @endif
                                        @if($contact->instagram)
                                            <li><a href="{{$contact->instagram}}" class="btn-linkedin" ><i class="fa-brands fa-instagram"></i></a></li>
                                        @endif
                                        @if($contact->website)
                                            <li><a href="{{$contact->website}}" class="btn-linkedin" ><i class="fa-solid fa-globe"></i></a></li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            @if(Session::has('fail'))
                                <div class="alert alert-danger" role="alert">{{Session::get('fail')}}</div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-info" role="alert">{{Session::get('success')}}</div>
                            @endif
                            <div class="form-small">
                                <h3 style="text-transform: uppercase;">CONTACT {{$user->fname}} {{$user->sname}}</h3>
                                <form action="{{route('profile.send')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$user->email}}" name="mail" class="form-control">
                                    <div class="form-group">
                                        <input type="text" placeholder="{{__('login.ename')}}" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="{{__('login.phone')}}" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <textarea placeholder="Message" name="message" rows="3" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-secondary btn-block" type="submit" id="details">{{__('login.send')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 ">
                <div id="content-area">
                    <!--start list tabs-->
                    <div class="list-tabs table-list full-width">
                        <div class="tabs table-cell">
                            <ul>
                                @if($type == null)
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}" class="active">{{__('login.all')}}</a>
                                </li>
                                @else
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}">{{__('login.all')}}</a>
                                </li>
                                @endif
                                @if($type == 1)
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}/1" class="active">{{__('login.fsell')}}</a>
                                </li>
                                @else 
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}/1" >{{__('login.fsell')}}</a>
                                </li>
                                @endif
                                @if($type == 2)
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}/2" class="active">{{__('login.frent')}}</a>
                                </li>
                                @else 
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}/2" >{{__('login.frent')}}</a>
                                </li>
                                @endif
                                @if($type == 3)
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}/3" class="active">{{__('login.fcl')}}</a>
                                </li>
                                @else 
                                <li>
                                    <a href="{{url('/profile')}}/{{$user->id}}/3" >{{__('login.fcl')}}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!--end list tabs-->

                    <!--start property items   property-listing grid-view grid-view-3-col-->
                    <div class="property-listing list-view">
                        <div class="row">
                            @foreach($listing as $item)
                                <div class="item-wrap">
                                    <div class="property-item table-list">
                                        <div class="table-cell">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    @if(count($item->features) > 0)
                                                    <span class="label-featured label label-success">{{__('login.featured')}}</span>
                                                    @endif
                                                    <div class="label-wrap label-right hide-on-list">
                                                        @if($item->status == 1)
                                                        <span class="label label-default">{{__('login.sale')}}</span>
                                                        @elseif($item->status == 2)
                                                        <span class="label label-default">{{__('login.rent')}}</span>
                                                        @elseif($item->status == 3)
                                                        <span class="label label-default">{{__('login.forcl')}}</span>
                                                        @endif
                                                    </div>
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
                                                    <a href="">
                                                        <img src="{{url('assets/images/posts').'/'.$item->images[0]->path}}" id="img" alt="thumb">
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="item-body table-cell">

                                            <div class="body-left table-cell">
                                                <div class="info-row">
                                                    <div class="label-wrap hide-on-grid">
                                                        @if($item->status == 1)
                                                        <div class="label-status label label-default">{{__('login.sale')}}</div>
                                                        @elseif($item->status == 2)
                                                        <div class="label-status label label-default">{{__('login.rent')}}</div>
                                                        @elseif($item->status == 3)
                                                        <div class="label-status label label-default">{{__('login.forcl')}}</div>
                                                        @endif
                                                    </div>
                                                    <h2 class="property-title"><a href="">{{$item->title}}</a></h2>
                                                    <h4 class="property-location">{{$item->adresse->adresse}}</h4>
                                                </div>
                                                <div class="info-row amenities hide-on-grid">
                                                    <p>
                                                        <span>{{__('login.bbeds')}}: {{$item->detail->beds}}</span>
                                                        <span>{{__('login.bbaths')}}: {{$item->detail->baths}}</span>
                                                        <span>Sqft: {{$item->detail->area_size}}</span>
                                                    </p>
                                                    <p>{{ $item->type->name }}</p>
                                                </div>
                                                <div class="info-row date hide-on-grid">
                                                    <p><i class="fa fa-user"></i> <a href="">{{$item->user->fname}} {{$item->user->sname}}</a></p>
                                                    <p><i class="fa fa-calendar"></i> {{explode(' ',$item->created_at)[0]}} </p>
                                                </div>
                                            </div>
                                            <div class="body-right table-cell hidden-gird-cell">
                                                <div class="info-row price">
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
                                                <div class="info-row phone text-right">
                                                    <a href="{{url('/details/'.$item->adresse->city.'/'.$item->type->name.'/'.$item->id)}}" class="btn btn-primary" id="details">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                    <p><a href="">{{$item->user->phone}}</a></p>
                                                </div>
                                            </div>
                                            <div class="table-list full-width hide-on-list">
                                                <div class="cell">
                                                    <div class="info-row amenities">
                                                        <p>
                                                            <span>{{__('login.bbeds')}}: {{$item->detail->beds}}</span>
                                                            <span>{{__('login.bbaths')}}: {{$item->detail->baths}}</span>
                                                            <span>Sqft:{{$item->detail->area_size}}</span>
                                                        </p>
                                                        <p>{{$item->type->name}}</p>
                                                    </div>
                                                </div>
                                                <div class="cell">
                                                    <div class="phone">
                                                        <a href="{{url('/details/'.$item->adresse->city.'/'.$item->type->name.'/'.$item->id)}}" class="btn btn-primary" id="details">Details <i class="fa fa-angle-right fa-right"></i></a>
                                                        <p><a href="#">{{$item->user->phone}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-foot date hide-on-list">
                                        <div class="item-foot-left">
                                            <p><i class="fa fa-user"></i> <a href="#">{{$item->user->fname}} {{$item->user->sname}}</a></p>
                                        </div>
                                        <div class="item-foot-right">
                                            <p><i class="fa fa-calendar"></i> {{explode(' ',$item->created_at)[0]}} </p>
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
                    <!--end property items-->


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
    </div>
</section>
@endsection