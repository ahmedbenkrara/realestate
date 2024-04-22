<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <meta name="description" content="{{\App\Http\Controllers\SettingsController::settings()->description}}">
    <meta name="author" content="{{\App\Http\Controllers\SettingsController::settings()->author}}">
    <meta name="keywords" content="{{\App\Http\Controllers\SettingsController::settings()->keywords}}">

    <link rel="apple-touch-icon" sizes="144x144" href="{{url('assets/images/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('assets/images/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{url('assets/images/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ url('assets/images/favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ url('assets/images/favicons/safari-pinned-tab.svg') }}" >
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ url('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/slick.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/slick-theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/prettyPhoto.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .grow .fa{
            font-size:20px;
        }

        #test{
            top:30px;
        }

        #profile{
            font-size:25px;
        }

        .limg{
            width: 164px;
            height: 54px;
            padding-top: 5px;
        }

        #lwhite{
            width: 124px;
            height: 40px;
            padding-top: 5px;
            max-height: 40px;
        }
    </style>
</head>
<body>
<!--Heaaaaaaaaaaaaaaaaaader-->
<header id="header-section" class="header-section-4 header-main  nav-left hidden-sm hidden-xs" data-sticky="1">
    <div class="container">
        <div class="header-left">
            <div class="logo">
                <a href="/">
                    <img  class="limg" src="{{url('assets/images/houzez-logo-color.png')}}" alt="logo">
                </a>
            </div>
            <nav class="navi main-nav">
                <ul>
                    <li><a href="{{url('/')}}">{{__('login.home')}}</a></li>
                    <li><a href="{{url('/search')}}">{{__('login.search')}}</a></li>
                    <li><a href="{{url('/contact')}}">Contact</a></li>
                    <li><a href="{{url('/privacy')}}">{{__('login.privacy')}}</a></li>
                    <li><a href="{{url('/terms')}}">{{__('login.terms')}}</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <form action="{{route('logout')}}" class="out" method="post">
                @csrf
            </form>
            @if(!Auth::check())
                <div class="user">
                    <a href="{{url('/login')}}">{{__('login.sc')}}</a>
                    <a href="{{url('/create')}}" class="btn btn-default">{{__('login.cproc')}}</a>
                </div>
            @else 
                @if(Auth::user()->hasRole('user'))
                <ul class="account-action">
                    <li class="">
                        <span class="hidden-sm hidden-xs">{{Auth::user()->fname}} {{Auth::user()->sname}} <i class="fa fa-angle-down"></i></span>
                        @if(Auth::user()->contact != null)
                            @if(Auth::user()->contact->profile_pic != null)
                                <img src="{{url('/assets/images/profile').'/'.Auth::user()->contact->profile_pic}}" class="user-image" alt="profile image" style="height:45px; max-width:45px; object-fit:cover;">
                            @else 
                                <img src="{{url('/assets/images/profile/profile.png')}}" class="user-image" alt="profile image" style="height:45px; max-width:45px; object-fit:cover;">
                            @endif
                        @else
                            <img src="{{url('/assets/images/profile/profile.png')}}" class="user-image" alt="profile image" style="height:45px; max-width:45px; object-fit:cover;">
                        @endif
                        <div class="account-dropdown">
                            <ul>
                                <li> <a href="{{url('/myaccount')}}"> <i class="fa fa-user"></i>{{__('login.mprofile')}}</a></li>
                                <li> <a href="{{url('/dashboard')}}"> <i class="fa fa-building"></i>{{__('login.mprop')}}</a></li>
                                <li> <a href="{{url('/create')}}"> <i class="fa fa-plus-circle"></i>{{__('login.addnp')}}</a></li>
                                <li> <a href="{{url('/favorite')}}"> <i class="fa fa-heart"></i>{{__('login.favpro')}}</a></li>
                                <li><a onclick="$('.out').submit()"> <i class="fa fa-unlock"></i>{{__('login.logout')}}</a></li>
                            </ul>
                        </div>

                    </li>
                </ul>
                @else 
                <ul class="account-action">
                    <li class="">
                        <span class="hidden-sm hidden-xs">{{AUth::user()->fname}} {{AUth::user()->sname}} <i class="fa fa-angle-down"></i></span>
                        <div class="account-dropdown">
                            <ul>
                                <li> <a href="{{url('/profile')}}"> <i class="fa fa-user"></i>{{__('login.mprofile')}}</a></li>
                                <li> <a href="{{url('/requests')}}"> <i class="fa fa-building"></i>{{__('login.Request')}}</a></li>
                                <li> <a href="{{url('/admin')}}"> <i class="fa fa-plus-circle"></i>{{ __('login.cadmin') }}</a></li>
                                <li> <a href="{{url('/types')}}"> <i class="fa fa-plus-circle"></i>Types</a></li>
                                <li> <a href="{{url('/features')}}"> <i class="fa fa-plus-circle"></i>{{__('login.feats')}}</a></li>
                                <li> <a href="{{url('/settings')}}"> <i class="fa fa-user-secret"></i>{{__('login.privacy').' '.__('login.settings')}}</a></li>
                                <li> <a href="{{url('/seo')}}"> <i class="fa fa-search"></i>{{'Seo '.__('login.settings')}}</a></li>
                                <li><a onclick="$('.out').submit()"> <i class="fa fa-unlock"></i>{{__('login.logout')}}</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                @endif
            @endif
        </div>
        
    </div>
</header>
<!--End Heaaaaaaaaaaaaaaaaaader-->

<div class="header-mobile visible-sm visible-xs">
    <div class="container">
        <!--start mobile nav-->
        <div class="mobile-nav">
            <span class="nav-trigger"><i class="fa fa-navicon"></i></span>
            <div class="nav-dropdown main-nav-dropdown"></div>
        </div>
        <!--end mobile nav-->
        <div class="header-logo">
            <a href="{{url('/')}}"><img id="lwhite" src="{{url('assets/images/logo-houzez-white.png')}}" alt="logo"></a>
        </div>
        <div class="header-user">
            <ul class="account-action">
                <li>
                    <span class="user-icon"><i class="fa fa-user"></i></span>
                    <div class="account-dropdown">
                        <ul>
                            @if(!Auth::check())
                                <li> <a href="{{url('/create')}}"> <i class="fa fa-plus-circle"></i>{{__('login.addnp')}}</a></li>
                                <li> <a href="" data-toggle="modal" data-target="#pop-login"> <i class="fa fa-user"></i> {{__('login.sc')}} </a></li>
                            @else 
                                @if(Auth::user()->hasRole('user'))
                                    <li> <a href="{{url('/myaccount')}}"> <i class="fa fa-user"></i>{{__('login.mprofile')}}</a></li>
                                    <li> <a href="{{url('/dashboard')}}"> <i class="fa fa-building"></i>{{__('login.mprop')}}</a></li>
                                    <li> <a href="{{url('/create')}}"> <i class="fa fa-plus-circle"></i>{{__('login.addnp')}}</a></li>
                                    <li> <a href="{{url('/favorite')}}"> <i class="fa fa-heart"></i>{{__('login.favpro')}}</a></li>
                                    <li><a onclick="$('.out').submit()"> <i class="fa fa-unlock"></i>{{__('login.logout')}}</a></li>
                                @else                               
                                    <li> <a href="{{url('/profile')}}"> <i class="fa fa-user"></i>{{__('login.mprofile')}}</a></li>
                                    <li> <a href="{{url('/requests')}}"> <i class="fa fa-building"></i>{{__('login.Request')}}</a></li>
                                    <li> <a href="{{url('/admin')}}"> <i class="fa fa-plus-circle"></i>{{ __('login.cadmin') }}</a></li>
                                    <li> <a href="{{url('/types')}}"> <i class="fa fa-plus-circle"></i>Types</a></li>
                                    <li> <a href="{{url('/features')}}"> <i class="fa fa-plus-circle"></i>{{__('login.feats')}}</a></li>
                                    <li> <a href="{{url('/settings')}}"> <i class="fa fa-user-secret"></i>{{__('login.privacy').' '.__('login.settings')}}</a></li>
                                    <li> <a href="{{url('/seo')}}"> <i class="fa fa-search"></i>{{'Seo '.__('login.settings')}}</a></li>
                                    <li><a onclick="$('.out').submit()"> <i class="fa fa-unlock"></i>{{__('login.logout')}}</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--end header section header v1-->


@yield('content')

<!--Fooooooter-->
<footer class="footer-v2">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="footer-widget widget-about">
                            <div class="widget-top">
                                <h3 class="widget-title">{{__('login.abtsite')}}</h3>
                            </div>
                            <div class="widget-body">
                                <p>{{\App\Http\Controllers\SettingsController::settings()->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer-widget widget-contact">
                            <div class="widget-top">
                                <h3 class="widget-title">{{__('login.contactus')}}</h3>
                            </div>
                            <div class="widget-body">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-location-arrow"></i> {{\App\Http\Controllers\SettingsController::settings()->address}}</li>
                                    <li><i class="fa fa-phone"></i> {{\App\Http\Controllers\SettingsController::settings()->phone}}</li>
                                </ul>
                                <p class="read"><a href="{{url('/contact')}}">{{__('login.contactus')}} <i class="fa fa-caret-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer-widget widget-newsletter">
                            <div class="widget-top">
                                <h3 class="widget-title">{{__('login.language')}} :</h3>
                            </div>
                            <div class="widget-body">
                                <ul id="footer-menu" class="">
                                    <li><a href="{{url('/locale/en')}}">{{__('login.english')}}</a></li>
                                    <li><a href="{{url('/locale/fr')}}">{{__('login.french')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer-widget widget-newsletter">
                            <div class="widget-top">
                                <h3 class="widget-title">{{__('login.socialmedia')}} :</h3>
                            </div>
                            <div class="widget-body">
                                
                            <ul class="social">
                                    <li>
                                        <a href="{{\App\Http\Controllers\SettingsController::settings()->facebook}}" class="btn-facebook"><i class="fa fa-facebook-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{\App\Http\Controllers\SettingsController::settings()->twitter}}" class="btn-twitter"><i class="fa fa-twitter-square"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{\App\Http\Controllers\SettingsController::settings()->whatsapp}}" class="btn-google-plus"><i class="fa fa-whatsapp"></i></a>
                                    </li>
                                    <li>
                                        <a href="{{\App\Http\Controllers\SettingsController::settings()->instagram}}" class="btn-linkedin"><i class="fa fa-instagram"></i></a>
                                    </li>
                            </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="footer-col">
                            <p>{{__('login.copy').' - '.\App\Http\Controllers\SettingsController::settings()->title}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-col">
                            <div class="navi">
                                <ul id="footer-menu" class="">
                                    <li><a href="{{url('/privacy')}}">{{__('login.privacy')}}</a></li>
                                    <li><a href="{{url('/terms')}}">{{__('login.terms')}}</a></li>
                                    <li><a href="{{url('/contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="footer-col foot-social">
                            <p>
                                {{__('login.follow')}}
                                <a target="_blank" href="{{\App\Http\Controllers\SettingsController::settings()->facebook}}" class="btn-facebook"><i class="fa fa-facebook-square"></i></a>

                                <a target="_blank" href="{{\App\Http\Controllers\SettingsController::settings()->twitter}}" class="btn-twitter"><i class="fa fa-twitter-square"></i></a>
                        
                                <a target="_blank" href="{{\App\Http\Controllers\SettingsController::settings()->whatsapp}}" class="btn-google-plus"><i class="fa fa-whatsapp"></i></a>
                        
                                <a target="_blank" href="{{\App\Http\Controllers\SettingsController::settings()->instagram}}" class="btn-linkedin"><i class="fa fa-instagram"></i></a>
                            
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>
<!--End Foooooooooooooooooooooter-->

    <!--Start Scripts-->
    <script type="text/javascript" src="{{url('assets/js/jquery.js')}}"></script>

    <script type="text/javascript" src="{{ url('assets/js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/modernizr.custom.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/js/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.matchHeight-min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/jquery.nicescroll.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{url('assets/js/jquery.prettyPhoto.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/masonry.pkgd.min.html')}}"></script>
    <script type="text/javascript" src="{{ url('assets/js/custom.js') }}"></script>
    <script src="{{mix('/js/app.js')}}"></script>
</body>
</html>