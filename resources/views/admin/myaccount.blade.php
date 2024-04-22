@extends('layouts.master')
@section('title')
{{Auth::user()->fname.' '.Auth::user()->sname.' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection
@section('content')
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
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
            <li class="active"> <a href="/profile"> {{__('login.mprofile')}} </a></li>
            <li> <a href="/requests"> {{__('login.p')}} </a></li>
        </ul>
        <div class="profile-area-content">
            <div class="profile-area account-block white-block">

                <form action="/profile" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="my-avatar">
                                <img src="{{url('/assets/images/profile/profile.png')}}" alt="Avatar">
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-7">
                            <h4>Informations</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">{{__('login.fname')}}</label>
                                        <input type="text" id="firstname" name="fname" class="form-control" placeholder="{{__('login.fname')}}" value="{{Auth::user()->fname}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">{{__('login.sname')}}</label>
                                        <input type="text" id="lastname" name="sname" class="form-control" placeholder="{{__('login.sname')}}" value="{{Auth::user()->sname}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" class="form-control" placeholder="Email" disabled value="{{Auth::user()->email}}">
                                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 text-right">
                            <button type="submit" class="btn btn-primary" style="background:#2cace2;">{{__('login.savep')}}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="profile-area account-block white-block">
                <h4>{{__('login.cpass')}}</h4>
                @if(Session::has('wrongpass'))
                    <div class="alert alert-danger" role="alert">{{Session::get('wrongpass')}}</div>
                @endif
                
                <form action="/password" method="post" id="cnpass">
                    @csrf
                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="oldpass">{{__('login.opass')}}</label>
                                <input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="{{__('login.opass')}}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="newpass">{{__('login.npass')}}</label>
                                <input type="password" id="newpass" name="newpass" class="form-control" placeholder="{{__('login.npass')}}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="confirmpass">{{__('login.confirm')}}</label>
                                <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="{{__('login.confirm')}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background:#2cace2;">{{__('login.upass')}}</button>
                </form>
            </div>
        </div>

    </div>
</div>

</section>
<script type="text/javascript" src="{{ url('assets/js/jquery.js') }}"></script>
<script>
    function pass(e){
        if(e.val().length < 8){
            e.css({'border':'1px solid red'})
            return false;
        }else{
            e.css({'border':'1px solid #cccccc'})
            return true;
        }
    }

    $('#cnpass').submit(function(e){
        if(pass($('#oldpass')) && pass($('#newpass')) && pass($('#confirmpass'))){
            if($('#newpass').val() != $('#confirmpass').val()){
                alert('{{__('login.pmatch')}}')
                e.preventDefault()
            }
        }else{
            alert('{{__('login.pvalid')}}')
            e.preventDefault()
        }
    })
</script>
@endsection