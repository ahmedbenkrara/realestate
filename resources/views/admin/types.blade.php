@extends('layouts.master')
@section('title')
{{'Types | '.\App\Http\Controllers\SettingsController::settings()->title}}
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
        margin-top:32px;
    }

    .register:focus{
        color:white;
    }

    .plus{
        display:block;
        cursor:pointer;
    }

    .plus .fa{
        border: 3px solid #00427d;
        padding: 24px;
        border-radius: 10px;
        font-weight: 800;
        font-size: 20px;
    }

    #cover{
        display:none;
    }

    .container1{
        padding: 1.5rem 4rem;
        background: white;
        margin-left: auto;
        margin-right: auto;
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        border-radius: 5px;
        margin-bottom:40px;
        margin-top:40px;
    }

    table{
        letter-spacing:0.025em;
    }

    .table-responsive{
        border:none;
        margin-bottom:0;
    }

    #th{
        padding: 1.25rem;
        font-weight:700;
        text-align:center;
    }

    thead{
        background:#f8fafc;
    }

    #tbody td{
        padding: 2.5rem;
        text-align: center;
        vertical-align: middle;
        position: relative;
    }

    #tbody img{
        max-height:142px;
        max-width:none;
    }

    .delete{
        background:red;
        color:white;
        border-radius:5px;
        padding:8px 18px;
        cursor:pointer;
    }

    .delete:hover{
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 red), var(--tw-ring-shadow, 0 0 red), var(--tw-shadow);
    }

    .fl{
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    @media only screen and (max-width: 600px) {
        .flx{
            flex:1;
            margin-top:10px;
            margin-left:5px;
        }
    }

    .eimg{
        max-width:200px;
        min-height:200px;
        max-height:100px;
        min-height:100px;
        object-fit:cover;
        margin-bottom:10px;
    }
</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
    <div id="app">
        <types-component :lang="{{json_encode($language)}}"></types-component>
    </div>
@endsection