@extends('layouts.master')
@section('title')
{{__('login.forgot').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
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

    .register{
        background:#00427d;
        color:white;
        outline:none;
        border:none;
        padding:5px 60px;
        border-radius:4px;
        font-weight:700;
    }

    .register:hover{
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

    .resetlink{
        margin-bottom:12px;
        color:#00427d;
        font-weight:100;
    }

</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
    <div class="main">
        <div class="form">
            <h2>{{__('login.reset')}}</h2>
            <div class="mb-3">
                @foreach($errors->all() as $message)
                    <p class="text-danger">{{$message}}</p>
                @endforeach
            </div>
            <div class="resetlink">
            {{__('login.resettext')}}
            </div>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <label for="email">{{__('login.email')}} :</label>
                <input type="text" placeholder="{{__('login.email')}}" id="email" class="input" value="{{old('email')}}" name="email">
                <button class="register">{{__('login.reset')}}</button>
            </form>
            
        </div>
    </div>

@endsection