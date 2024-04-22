@extends('layouts.master')

@section('title')
{{__('login.search').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection

@section('content')

<style>
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

</style>

<!--start section page body-->
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-left">
                        <h2>{{__('login.listings')}}</h2>
                    </div>
                    <div class="page-title-right">
                        <div class="view hidden-xs">
                            <div class="table-cell">
                                <span class="view-btn btn-list active"><i class="fa fa-th-list"></i></span>
                                <span class="view-btn btn-grid"><i class="fa fa-th-large"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
                <div id="content-area">
                    <!--start list tabs-->
                    <div class="list-tabs table-list full-width">
                        <div class="tabs table-cell">
                            <ul>
                                <li>
                                    <a href="" class="active">{{__('login.all')}}</a>
                                </li>
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
                                                        <img src="assets/images/posts/{{$item->images[0]->path}}" id="img" alt="thumb">
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
                                                    <p><i class="fa fa-user"></i> <a href="{{url('/profile').'/'.$item->user->id}}">{{$item->user->fname}} {{$item->user->sname}}</a></p>
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
                                                        <p><a href="">{{$item->user->phone}}</a></p>
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
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar">
                    <aside id="sidebar" class="sidebar-white">
                        <div class="widget widget-range">
                            <div class="widget-body">
                                <form id="search-form" action="/filter">
                                    <div class="range-block rang-form-block">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <input class="input" name="title" placeholder="{{__('login.search')}}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="input" id="country">
                                                        <option value="0" selected disabled>{{__('login.country')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="input" name="city" id="city">
                                                        <option value="0" selected disabled>{{__('login.city')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="number" name="mins" min="0" class="input" placeholder="{{__('login.amisize')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="number" name="maxs" min="0" class="input" placeholder="{{__('login.amasize')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="number" name="minp" min="0" class="input" placeholder="{{__('login.miprice')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="number" name="maxp" min="0" class="input" placeholder="{{__('login.maprice')}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="input" name="beds">
                                                        <option value="0" selected disabled>{{__('login.beds')}}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="input" name="baths">
                                                        <option value="0" selected disabled>{{__('login.baths')}}</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="input" name="type">
                                                    <option value="0" disabled selected>{{__('login.selectp')}}</option> 
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="input" name="status">
                                                        <option value="0" disabled selected>{{__('login.selectst')}}</option>
                                                        <option value="1">{{__('login.sell')}}</option>
                                                        <option value="2">{{__('login.rent')}}</option>
                                                        <option value="3">{{__('login.foreclosures')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <label class="advance-trigger"><i class="fa fa-plus-square"></i> Other Features </label>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="features-list field-expand">
                                                    @foreach($features as $feat)
                                                    <label class="checkbox-inline">
                                                        <input name="feature[]" type="checkbox" value="{{$feat->id}}"> {{$feat->name}}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-secondary btn-block" id="details">{{__('login.search')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
        </div>
    </div>
</section>

<!--end section page body-->
<script type="text/javascript" src="{{ url('assets/js/jquery.js') }}"></script>
<script>
        $(document).ready(function(){
            $.ajax({
                url:'/assets/json/countries.json',
                type:'GET',
                dataType:'JSON',
                success:function(response){
                    response.data.forEach(element => {
                        $('#country').append('<option value='+element.country.replace(/\s/g, '')+'>'+element.country+'</option>')
                    })
                }
            })

            $('#country').change(function(){
                $('#city')
                .find('option')
                .remove()

                $('#city').append(`<option disabled selected value="0">{{__('login.city')}}</option> `)

                $.ajax({
                    url:'/assets/json/countries.json',
                    type:'GET',
                    dataType:'JSON',
                    success:function(response){
                        response.data.forEach(element => {
                            element.cities.forEach(e => {
                                if(element.country == $('#country').val()){
                                    $('#city').append('<option value='+e.replace(/\s/g, '')+'>'+e+'</option>')
                                }
                            })
                        })
                    }
                })
            })
        })
</script>
@endsection