@extends('layouts.master')
@section('title')
{{'Contact | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection

@section('content')
<style>
    .main{
        width:100%;
        margin-left:auto;
        margin-right:auto;
        padding:40px 50px;
        background:white;
        display:grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }

    .left{
        padding:10px;
    }

    .right{
        padding:10px 40px;
        background:white;
    }

    @media screen and (max-width: 992px){
        .main{
            width:100%;
            margin-left:auto;
            margin-right:auto;
            padding:40px 0;
            background:white;
            display:grid;
            grid-template-columns: 1fr;
            grid-gap: 10px;
        }
    }

    iframe{
        border:0; 
        border-radius:5px;
        width:100%; 
        min-height:450px; 
    }

    .form{
        width:50%;
        padding:1.5rem 4rem;
        background:white;
        margin-left:auto;
        margin-right:auto;
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        border-radius:5px;
    }

    @media screen and (max-width: 992px){
        .form{
            width:80%;
        }

        .fl .link{
            margin-bottom:1rem;
        }
    }

    ::placeholder {
       color: #9ca3af;
    }

    .input{
        margin-bottom: 3rem;
        display: block;
        width: 100%;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        border:2px solid #e5e7eb;
        border-radius:5px;
        color: #9ca3af;
    }

    #msg{
        font-family: inherit;
        resize:vertical;
        min-height:100px;
    }

    #label{
        font-weight:700;
        color: #004274;
        font-size:15px;
        margin-bottom:10px;
    }

    .cmain{
        display:grid;
        grid-template-columns: repeat(2,1fr);
        grid-gap:8px;
    }
    .login {
        background:#00427d;
        color:white;
        outline:none;
        border:none;
        padding:5px 80px;
        border-radius:4px;
        font-weight:700;
    }

    .login:hover{
        background:#022a4e;
    }

</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
    <div class="header-media">
        <div class="banner-parallax" style="height: 600px;">
            <div class="banner-bg-wrap">
                <div class="banner-inner" style="background-image: url('{{url('assets/images/wallpapers/contact.jpg')}}');"></div>
            </div>
        </div>
        <div class="banner-caption">
            <h1>{{__('login.contact')}}</h1>
        </div>
    </div>
    <div class="main">
        <div class="left">
            <iframe src="{{\App\Http\Controllers\SettingsController::settings()->map}}" allowfullscreen="true" loading="lazy"></iframe>
        </div>
        <div class="right">

            <form action="{{Route('contact.send')}}" method="POST">
                @csrf
                @if(Session::has('fail'))
                    <div class="alert alert-danger" role="alert">{{Session::get('fail')}}</div>
                  @elseif(Session::has('success'))
                    <div class="alert alert-info" role="alert">{{Session::get('success')}}</div>
                  @endif
                <div class="cmain">
                    <div>
                        <label for="fname" id="label">{{ __('login.fname') }} :</label>
                        <input type="text" placeholder="{{ __('login.fname') }}" id="fname" class="input" name="fname">
                    </div>
                    <div>
                        <label for="sname" id="label">{{ __('login.sname') }} :</label>
                        <input type="text" placeholder="{{ __('login.sname') }}" id="sname" class="input" name="sname">
                    </div>
                </div>
                <label for="email" id="label">{{ __('login.email') }} :</label>
                <input type="text" placeholder="{{ __('login.email') }}" id="email" class="input" name="email">
                <label for="subject" id="label">{{ __('login.sub') }} :</label>
                <input type="text" placeholder="{{ __('login.sub') }}" id="subject" class="input" name="subject">
                <label for="msg" id="label">{{ __('login.msg') }} :</label>
                <textarea placeholder="{{ __('login.msg') }}" id="msg" class="input" name="message"></textarea>
                <button type="submit" class="login">{{ __('login.send') }}</button>
            </form>
        </div>
    </div>

@endsection