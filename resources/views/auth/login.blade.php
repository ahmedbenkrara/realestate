@extends('layouts.master')
@section('title')
{{__('login.login').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection

@section('content')
<style>
    .main{
        width:100%;
        padding:20px 0;
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

    .form h2{
        text-align:center;
        font-weight: 700;
        color:#00427d;
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 18px;
        padding-top: 10px;
        margin-bottom: 36px;
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

    .form label{
        font-weight:700;
        color: #00427d;
        font-size:15px;
        margin-bottom:10px;
    }

    .login , .register{
        background:#00427d;
        color:white;
        outline:none;
        border:none;
        padding:5px 60px;
        border-radius:4px;
        font-weight:700;
    }

    .login:hover , .register:hover{
        background:#022a4e;
        color:white;
    }

    .register{
        display:block;
        margin:auto;
        padding:5px 0;
        width:80%;
        text-align:center;
    }

    .register:focus{
        color:white;
    }

    .link{
        color:#00427d;
        text-decoration-line:underline;
    }

    .link:hover{
        color:#787474;
        text-decoration-line:underline;
    }

    .link:focus{
        color:#787474;
        text-decoration-line:underline;
    }

    .fl{
        display:flex;
        flex-wrap:wrap;
        justify-content: space-between;
        margin-top:10px;
        border-bottom: 1px solid #e5e7eb;
        padding-bottom:20px;
        margin-bottom:20px;
    }

    .checkbox-wrap{
        color:#8d99af;
        position:relative;
        margin-left:24px;
        cursor:pointer;
    }

    #remember{
        appearance:none;
    }

    .checkbox-wrap:before{
        content: '';
        width: 20px;
        height: 20px;
        background-color: #f2f2f2;
        position: absolute;
        left: -30px;
        top: -1px;
        border-radius: 4px;
        border:1px solid #f2f2f2;

    }

    .checkbox-wrap:after{
        content: "\f00c";
        font-family:"FontAwesome";
        width: 20px;
        height: 20px;
        background-color: #00427d;
        position: absolute;
        left: -30px;
        top: -1px;
        border-radius: 4px;
        color:white;
        display:flex;
        place-items: center;
        justify-content: center;
        transform:scale(0) rotate(360deg);
        transition:transform .4s ease-in-out;
        font-weight:100;
        font-style:normal;
    }

    #remember:checked + .checkbox-wrap:after{
        transform:scale(1) rotate(0deg);
    }
</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
    <div class="main">
        <div class="form">
            <h2>{{ __('login.login') }}</h2>
            <div class="mb-3">
                @foreach($errors->all() as $message)
                    <p class="text-danger">{{$message}}</p>
                @endforeach
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="email">{{ __('login.email') }} :</label>
                <input type="text" placeholder="{{ __('login.email') }}" id="email" class="input" value="{{old('email')}}" name="email">
                <label for="password">{{ __('login.pass') }} :</label>
                <input type="password" placeholder="{{ __('login.pass') }}" id="password" class="input" name="password">
                <div class="mt-3">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="checkbox-wrap checkbox-primary mb-0">{{ __('login.remember') }}</label>
                </div>
                <div class="fl">
                    <a href="{{url('/forgot-password')}}" class="link">{{ __('login.forgot') }} ?</a>
                    <button type="submit" class="login">{{ __('login.login') }}</button>
                </div>
            </form>
            <a href="{{url('/register')}}" class="register">{{ __('login.register') }}</a>
        </div>
    </div>
@endsection