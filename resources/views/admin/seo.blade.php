@extends('layouts.master')
@section('title')
{{'Seo'.__('login.settings').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection

@section('content')
<style>
    .main{
        width:100%;
        padding:20px 0;
    }

    .form{
        width:80%;
        padding:1.5rem 4rem;
        background:white;
        margin-left:auto;
        margin-right:auto;
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        border-radius:5px;
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
        color: #004274;
        font-size:15px;
        margin-bottom:10px;
    }

    .form h2{
        text-align:center;
        font-weight: 700;
        color:#004274;
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 18px;
        padding-top: 10px;
        margin-bottom: 36px;
    }

    ::placeholder {
       color: #9ca3af;
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
    }

    .register{
        display:block;
        margin:auto;
        padding:5px 0;
        width:80%;
    }

</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
<div class="main">
    <div class="form">
    <h2>Seo {{__('login.settings')}} </h2>
        @if(Session::has('status'))
            <div class="alert alert-info" role="alert">{{Session::get('status')}}</div>
        @endif
        <form action="/seoupdate" method="get">
            @csrf
            <label for="title">{{ __('login.title') }} :</label>
            <input type="text" id="title" placeholder="{{ __('login.title') }}" class="input" name="title" value="{{$data->title}}">
            <label for="keywords">{{ __('login.keywords') }} :</label>
            <input type="text" id="keywords" placeholder="{{ __('login.keywords') }}" class="input" name="keywords" value="{{$data->keywords}}">
            <label for="author">{{ __('login.author') }} :</label>
            <input type="text" id="author" placeholder="{{ __('login.author') }}" class="input" name="author" value="{{$data->author}}">
            <label for="whatsapp">Whatsapp {{__('login.link')}} :</label>
            <input type="text" id="whatsapp" placeholder="Whatsapp {{__('login.link')}}" class="input" name="whatsapp" value="{{$data->whatsapp}}">
            <label for="facebook">Facebook :</label>
            <input type="text" id="facebook" placeholder="Facebook" class="input" name="facebook" value="{{$data->facebook}}">
            <label for="twitter">Twitter :</label>
            <input type="text" id="twitter" placeholder="Twitter" class="input" name="twitter" value="{{$data->twitter}}">
            <label for="instagram">Instagram :</label>
            <input type="text" id="instagram" placeholder="Instagram" class="input" name="instagram" value="{{$data->instagram}}">
            <label for="adress">{{__('login.adress')}} :</label>
            <input type="text" id="adress" placeholder="{{__('login.adress')}}" class="input" name="address" value="{{$data->address}}">
            <label for="phone">{{__('login.phone')}} :</label>
            <input type="text" id="phone" placeholder="{{__('login.phone')}}" class="input" name="phone" value="{{$data->phone}}">
            <label for="map">Map {{__('login.link')}} :</label>
            <input type="text" id="map" placeholder="Map {{__('login.link')}}" class="input" name="map" value="{{$data->map}}">
            <label for="description">Description :</label>
            <textarea id="description" oninput="if (this.value.length > 120) this.value = this.value.slice(0, 120)" placeholder="Description" class="input" name="description" style="max-width:100%; min-width:100%; height:200px;">{{$data->description}}</textarea>
            <button type="submit"  class="register">{{ __('login.edit') }}</button>
        </form>
    </div>
</div>
@endsection