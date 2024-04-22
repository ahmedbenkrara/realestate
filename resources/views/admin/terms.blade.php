@extends('layouts.master')
@section('title')
{{__('login.terms').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection
@section('content')

<section id="section-body">
    <div class="container">
        <div class="page-title breadcrumb-top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-left">
                        <h2>{{__('login.terms')}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="">
                <div class="page-main">
                    <div class="article-detail">
                        {!!$data->terms!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection