@extends('layouts.master')
@section('title')
{{Auth::user()->fname}} {{Auth::user()->sname}} {{'| '.\App\Http\Controllers\SettingsController::settings()->title}}
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
            <li class="active"> <a href=""> {{__('login.mprofile')}} </a></li>
            <li> <a href="/dashboard"> {{__('login.mpro')}} </a></li>
            <li> <a href="/favorite"> {{__('login.favpro')}} </a></li>
        </ul>
        <div class="profile-area-content">
            <div class="profile-area account-block white-block">

                <form action="/myaccount" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <div class="my-avatar">
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->profile_pic != null)
                                        <img src="{{url('/assets/images/profile')}}{{'/'.Auth::user()->contact->profile_pic}}" alt="Avatar">
                                    @else
                                        <img src="{{url('/assets/images/profile/profile.png')}}" alt="Avatar">
                                    @endif
                                @else 
                                    <img src="{{url('/assets/images/profile/profile.png')}}" alt="Avatar">
                                @endif
                                <label for="uploadimg" class="btn btn-primary btn-block" style="background:#2cace2;">Upload a profile image</label>
                                <input type="file" name="profilepic" id="uploadimg" accept="image/*" style="display:none;">
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        @if(Auth::user()->contact != null)
                                            @if(Auth::user()->contact->phone != null)
                                                <input type="tex" id="mobile" name="phone" class="form-control" placeholder="mobile" value="{{Auth::user()->contact->phone}}">
                                            @else 
                                                <input type="text" id="mobile" name="phone" class="form-control" placeholder="mobile">
                                            @endif
                                        @else
                                            <input type="text" id="mobile" name="phone" class="form-control" placeholder="mobile">
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="about">{{__('login.abtme')}}</label>
                                        @if(Auth::user()->contact != null)
                                           @if(Auth::user()->contact->about != null)
                                           <textarea id="about" name="about" class="form-control" rows="5">{{Auth::user()->contact->about}}</textarea>
                                           @else 
                                           <textarea id="about" name="about" class="form-control" rows="5"></textarea>
                                           @endif
                                        @else 
                                        <textarea id="about" name="about" class="form-control" rows="5"></textarea>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h4>{{__('login.smedia')}}</h4>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="facebook">Facebook URL</label>
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->facebook != null)
                                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="facebook" value="{{Auth::user()->contact->facebook}}">
                                    @else 
                                        <input type="text" id="facebook" name="facebook" class="form-control" placeholder="facebook">
                                    @endif 
                                @else 
                                    <input type="text" id="facebook" name="facebook" class="form-control" placeholder="facebook">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="twitter">Twitter URL</label>
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->twitter != null)
                                        <input type="text" id="twitter" name="twitter" class="form-control" placeholder="twitter" value="{{Auth::user()->contact->twitter}}">
                                    @else 
                                        <input type="text" id="twitter" name="twitter" class="form-control" placeholder="twitter">
                                    @endif 
                                @else 
                                    <input type="text" id="twitter" name="twitter" class="form-control" placeholder="twitter">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="linkedin">Linkedin URL</label>
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->linkedin != null)
                                    <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="linkedin" value="{{Auth::user()->contact->linkedin}}">
                                    @else 
                                    <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="linkedin">
                                    @endif 
                                @else 
                                <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="linkedin">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="instagram">Instagram URL</label>
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->instagram != null)
                                    <input type="text" id="instagram" name="instagram" class="form-control" placeholder="instagram" value="{{Auth::user()->contact->instagram}}">
                                    @else 
                                    <input type="text" id="instagram" name="instagram" class="form-control" placeholder="instagram">
                                    @endif 
                                @else 
                                    <input type="text" id="instagram" name="instagram" class="form-control" placeholder="instagram">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="website">Website URL</label>
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->website != null)
                                    <input type="text" id="website" name="website" class="form-control" placeholder="website" value="{{Auth::user()->contact->website}}">
                                    @else 
                                    <input type="text" id="website" name="website" class="form-control" placeholder="website">
                                    @endif 
                                @else 
                                    <input type="text" id="website" name="website" class="form-control" placeholder="website">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="fax">Fax</label>
                                @if(Auth::user()->contact != null)
                                    @if(Auth::user()->contact->fax != null)
                                    <input type="text" id="fax" name="fax" class="form-control" placeholder="fax" value="{{Auth::user()->contact->fax}}">
                                    @else 
                                    <input type="text" id="fax" name="fax" class="form-control" placeholder="fax">
                                    @endif 
                                @else 
                                    <input type="text" id="fax" name="fax" class="form-control" placeholder="fax">
                                @endif
                            </div>
                        </div>
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
                
                <form action="/change" method="post" id="cnpass">
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
    $('#uploadimg').change(function(){
        var file = document.querySelector('#uploadimg').files[0]
        if(Math.round((file.size / 1024)) >= 4096){
            alert('{{__('login.big')}}')
        }
    })

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