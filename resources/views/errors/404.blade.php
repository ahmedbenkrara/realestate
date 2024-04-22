@extends('layouts.master')
@section('title')
Page not found
@endsection

@section('content')

<style>
    .error{
        margin:40px auto;
        width:80%;
    }

    .ops{
        font-weight: bold;
        font-size: 100px;
        color: #004274;
        width: 100%;
        text-align: center;
        font-family: initial;
        letter-spacing: 5px;
    }

    .text404{
        width: 100%;
        text-align: center;
        font-weight: 700;
        color: #4d5154;
        font-size: 25px;
        margin-top: 6px;
        letter-spacing: 1px;
    }

    .text4{
        width: 100%;
        text-align: center;
        margin-top: 10px;
        font-weight: 400;
        color: #4d5154;
        letter-spacing: 1px;
    }

    .back{
        width:100%;
        text-align:center;
        margin-top:22px;
    }

    .goback{
        background: #004274;
        color: white;
        padding: 7px 33px;
        border-radius: 20px;
        font-family: revert;
        font-weight: 500;
    }

    .goback:hover{
        color:white;
        background:#2cace2;
    }

    .goback:focus{
        color:white;
    }

</style>

<div class="error">
    <div class="ops">Oops !</div>
    <div class="text404">404 - {{__('login.404')}}</div>
    <div class="text4">{{__('login.notfound')}}</div>
    <div class="back"><a class="goback" href="{{url('/')}}">{{__('login.gohome')}}</a></div>
</div>

@endsection