@extends('layouts.master')
@section('title')
{{__('login.addnp').' | '.\App\Http\Controllers\SettingsController::settings()->title}}
@endsection

@section('content')
<style>
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

    .input{
        resize: vertical;
    }

    .form label{
        font-weight:700;
        color: #00427d;
        font-size:15px;
        margin-bottom:10px;
    }

    .media-drag-drop{
        border: 2px dashed #000000;
        background:white;
        cursor:pointer;
    }

    .media-drag-drop label{
        background:black;
        color:white;
    }

    .media-drag-drop h4{
        color:black;
    }

    .media-drag-drop label:hover{
        background:#000000b8;
    }

    .media-drag-drop label:focus{
        background:black;
    }

    .media-drag-drop label:active{
        background:black;
    }

    .gallery-thumb img {
        height: 200px;
        width: 100%;
    }

    .media-drag-drop input{
        display:none;
    }

    #label{
        color: white;
        background-color: #00aeef;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: normal;
        font-family: monospace;
        cursor: pointer;
    }

    #planImage,#document{
        display:none;
    }

    #planimg,#addfloor{
        display:block;
        background:#00aeef;
        color:white;
    }

    #floors{
        color:white;
        background:#00aeef;
        padding:5px 10px;
        border-radius:5px;
        cursor:pointer;
    }

    #doc{
        background:black;
        color:white;
    }

    #doc:hover{
        background:#000000c4;
    }

    .bt{
        background:#00427d;
    }

    .bt:hover{
        background:#00427d;
    }

    .bt:focus{
        background:#00427d;
    }

</style>
<button class="btn scrolltop-btn back-top"><i class="fa fa-angle-up"></i></button>
    <!--start section page body-->
    <section id="section-body" class="form">
        <div class="container">
            <div class="membership-page-top">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="membership-page-title">
                            <h1 class="page-title"> {{__('login.clising')}} </h1>
                            <p class="page-subtitle"> {{__('login.lisdesc')}} </p>
                        </div>
                        <ol class="pay-step-bar">
                            <li class="pay-step-block step1 active"><span>1. {{__('login.ref')}}</span></li>
                            <li class="pay-step-block step2"><span>2. {{__('login.contact')}}</span></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="membership-content-area">   
                <div class="sstep1">
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.propertydp')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="property-title" class="property-title">{{__('login.title')}}</label>
                                            <input class="input title" id="property-title" placeholder="{{__('login.etitle')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="input description" id="description" rows="6" placeholder="{{__('login.edescription')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-type">Type</label>
                                            <select class="input type" id="property-type" data-live-search="false" data-live-search-style="begins" title="Select">
                                            <option value="0" disabled selected>{{__('login.selectp')}}</option> 
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-status">{{__('login.status')}}</label>
                                            <select class="input status" id="property-status" data-live-search="false" data-live-search-style="begins" title="Select">
                                                <option value="0" disabled selected>{{__('login.selectst')}}</option>
                                                <option value="1">{{__('login.sell')}}</option>
                                                <option value="2">{{__('login.rent')}}</option>
                                                <option value="3">{{__('login.foreclosures')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-status">{{__('login.psize')}}</label>
                                            <input class="input size" id="property-title" placeholder="{{__('login.esize')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-4" id="pricem">
                                        <div class="form-group">
                                            <label for="price">{{__('login.pprice')}}</label>
                                            <input class="input" id="price" placeholder="{{__('login.esize')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pricemonth">
                                        <div class="form-group">
                                            <label for="pricemonth">{{__('login.pmonth')}}</label>
                                            <input class="input month" id="pricemonth" placeholder="{{__('login.eprice')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pricesqft">
                                        <div class="form-group">
                                            <label for="pricesqft">{{__('login.price')}}/sqft</label>
                                            <input class="input pricesq" id="pricesqft" placeholder="{{__('login.qprice')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 pricey">
                                        <div class="form-group">
                                            <label for="pricey">{{__('login.pyear')}}</label>
                                            <input class="input priceyr" id="pricey" placeholder="{{__('login.eyear')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>Property media</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row">
                                <div class="property-media">
                                    <div class="media-gallery">
                                        <div class="row img">

                                        </div>
                                    </div>
                                    <div class="media-drag-drop">
                                        <h4><i class="fa fa-cloud-upload"></i>{{__('login.drag')}}</h4>
                                        <h4>{{__('login.or')}}</h4>
                                        <label class="btn btn-primary" for="image">{{__('login.selectimg')}}</label>
                                        <input type="file" id="image" accept="image/*"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.plocation')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row  push-padding-bottom">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">{{__('login.adress')}}</label>
                                            <input class="input" id="address" placeholder="{{__('login.uradress')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="neighborhood">{{__('login.quar')}}</label>
                                            <input class="input" id="neighborhood" placeholder="{{__('login.urquar')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country">{{__('login.country')}}</label>
                                            <select class="input" id="country" data-live-search="false" data-live-search-style="begins" title="{{__('login.select')}}">
                                                <option disabled selected value="0">{{__('login.country')}}</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city">{{__('login.city')}}</label>
                                            <select class="input" id="city" data-live-search="false" data-live-search-style="begins" title="{{__('login.select')}}">
                                                <option disabled selected value="0">{{__('login.city')}}</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="countryState">{{__('login.state')}}</label>
                                            <input class="input" id="countryState" placeholder="{{__('login.estate')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="zip">Zip</label>
                                            <input class="input" id="zip" placeholder="{{__('login.zip')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-tab-row">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="map">
                                            <img src="assets/images/add-map-image.png" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="property-map">Google Maps latitude</label>
                                            <input class="input maplat" id="property-map" placeholder="{{__('login.gmlat')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-map-long">Google Maps longitude</label>
                                            <input class="input maplong" id="property-map-long" placeholder="{{__('login.gmlon')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-map-street">Google Street View - latitude</label>
                                            <input class="input streetlat" id="property-map-street" placeholder="{{__('login.gmlat')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="property-map-street">Google Street View - longitude</label>
                                            <input class="input streetlong" id="property-map-street" placeholder="{{__('login.gmlon')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.details')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="video">{{__('login.video')}}</label>
                                            <input class="input video" id="video" placeholder="{{__('login.evideo')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-bedrooms">{{__('login.beds')}}</label>
                                            <input class="input beds" id="property-bedrooms" placeholder="{{__('login.ebeds')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-bathrooms">{{__('login.baths')}}</label>
                                            <input class="input baths" id="property-bathrooms" placeholder="{{__('login.ebaths')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-garage">{{__('login.garage')}}</label>
                                            <input class="input garage" id="property-garage" placeholder="{{__('login.egarage')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="property-garage-size">{{__('login.gsize')}}</label>
                                            <input class="input gsize" id="property-garage-size" placeholder="{{__('login.egsize')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="yearbuilt">{{__('login.yearb')}}</label>
                                            <input class="input yearb" id="yearbuilt" placeholder="{{__('login.yearb')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-tab-row">
                                <h4>{{__('login.additional')}}</h4>
                                <div class="row here">
                                </div>
                                <table class="additional-block">
                                    <thead>
                                    <tr>
                                        <td><label>{{__('login.title')}}</label></td>
                                        <td><label>{{__('login.value')}}</label></td>
                                    </tr>
                                    </thead>
                                    <tbody class="ui-sortable tbody">
                                    <tr>
                                        <td class="field-title">
                                            <input class="input key" type="text">
                                        </td>
                                        <td>
                                            <input class="input value" type="text">
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td><button class="add-additional-row save"><i class="fa fa-plus"></i>{{__('login.save')}}</button></td>
                                        <td><button class="add-additional-row clear"><i class="fa fa-plus"></i>{{__('login.addnew')}}</button></td>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.pfeatures')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                @foreach($features as $feature)
                                    <div class="col-sm-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="feature" value="{{$feature->id}}" id="{{$feature->id}}">
                                                {{$feature->name}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.fplans')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">

                            <div class="add-tab-row">
                                <div class="row fplans">

                                </div>
                                <table class="add-sort-table">
                                    <tbody>
                                    <tr>
                                        <td class="row-sort">
                                            
                                        </td>
                                        <td class="sort-middle">
                                            <div class="sort-inner-block">
                                                <div class="row">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="planTitle">{{__('login.plant')}}</label>
                                                            <input name="plan-title" type="text" id="planTitle" class="input plantitle">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="planSize">{{__('login.plans')}} (sqft)</label>
                                                            <input name="plan-size" type="text" id="planSize" class="input plansize">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="planBedrooms">{{__('login.planbeds')}}</label>
                                                            <input name="plan-bedrooms" type="text" id="planBedrooms" class="input planbeds">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="planBathrooms">{{__('login.planbaths')}}</label>
                                                            <input name="plan-bathrooms" type="text" id="planBathrooms" class="input planbaths">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="planPrice">{{__('login.Planpr')}}</label>
                                                            <input name="plan-price" type="text" id="planPrice" class="input planprice">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="planImage">{{__('login.planimg')}}</label>  
                                                            <label for="planImage"  class="btn btn-primary" id="planimg">{{__('login.selectimg')}}</label>  
                                                            <input name="plan-image" type="file" accept="image/*" id="planImage" class="form-control planimage">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-xs-12">
                                                        <label for="planDescription">{{__('login.plandesc')}}</label>
                                                        <textarea name="plan-description" rows="4" id="planDescription" class="input plandesc"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="row-remove">
                                            
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td class="row-sort"></td>
                                        <td class="sort-middle">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <button class="btn btn-primary addfloor" id="addfloor"><i class="fa fa-plus"></i> {{__('login.more')}}</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="row-remove"></td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.attach')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="add-attachment">
                                    <p>{{__('login.attach')}}</p>
                                    <div class="attach-list docum">
                                    </div>
                                    
                                    <label for="document"  class="btn btn-primary" id="doc">{{__('login.addm')}}</label>  
                                    <input name="plan-image" type="file" id="document" class="form-control">
                                    <p>{{__('login.attachtext')}}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="account-block text-right">
                        <button class="btn btn-primary next bt change2">{{__('login.next')}}</button>
                    </div>
                </div>
                <div class="sstep2">
                    <div class="account-block">
                        <div class="add-title-tab">
                            <h3>{{__('login.contact')}}</h3>
                            <div class="add-expand"></div>
                        </div>
                        <div class="add-tab-content">
                            <div class="add-tab-row push-padding-bottom">
                                <div class="row">
                                <div class="alert alert-secondary" role="alert">
                                    <h4 class="alert-heading">{{__('login.done')}}</h4>
                                    <p>{{__('login.pinfo')}}</p>
                                    <hr>
                                    <p class="mb-0">{{__('login.frg')}}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-block text-left">
                        <button class="btn btn-primary prev bt change1">{{__('login.prev')}}</button>
                    </div>
                    <div class="account-block text-right">
                        <button class="btn btn-primary bt submit">{{__('login.subp')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section page body-->
    <script type="text/javascript" src="{{ url('assets/js/jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url:'/assets/json/countries.json',
                type:'GET',
                dataType:'JSON',
                success:function(response){
                    response.data.forEach(element => {
                        $('#country').append('<option value='+element.country.replace(/\s/g, '')+'>'+element.country+'</option>')
                    })
                }
            })

            $('#country').change(function(){
                $('#city')
                .find('option')
                .remove()

                $('#city').append(`<option disabled selected value="0">{{__('login.city')}}</option> `)

                $.ajax({
                    url:'/assets/json/countries.json',
                    type:'GET',
                    dataType:'JSON',
                    success:function(response){
                        response.data.forEach(element => {
                            element.cities.forEach(e => {
                                if(element.country == $('#country').val()){
                                    $('#city').append('<option value='+e.replace(/\s/g, '')+'>'+e+'</option>')
                                }
                            })
                        })
                    }
                })
            })

            $('.pricemonth').hide()
            $('.pricey').hide()
            $('#pricem').hide()
            $('.pricesqft').hide()
            $('#property-status').change(function(){
                if($(this).val() == 1){
                    $('.pricemonth').hide()
                    $('.pricey').hide()
                    $('#pricem').show()
                    $('.pricesqft').show()
                }else if($(this).val() == 2){
                    $('.pricemonth').show()
                    $('.pricey').hide()
                    $('#pricem').hide()
                    $('.pricesqft').hide()
                }else if($(this).val() == 3){
                    $('.pricey').show()
                    $('#pricem').show()
                    $('.pricemonth').hide()
                    $('.pricesqft').hide()
                }
            })

            $('.media-drag-drop').on('dragover',function(e) {
                e.preventDefault();
                e.stopPropagation();
            })

            $('.media-drag-drop').on('dragenter',function(e){
                e.preventDefault();
                e.stopPropagation();
            })

            var formdata = new FormData()//images table, annonce table(video link), adresse table, details table, additional details, features table 
            var count = 0
            var j = 0
            var delimage = []
            var additional = []

            $('.media-drag-drop').on('drop',function(e){
                e.preventDefault()
                var filelist = e.originalEvent.dataTransfer.files

                if(filelist.length > 1){
                    alert('{{__('login.simg')}}')
                }else{
                    if(Math.round((filelist[0].size / 1024)) >= 4096){
                        alert('{{__('login.big')}}')
                    }else{
                        for(var i=0;i<filelist.length;i++){
                            formdata.append('file'+count, filelist[i])
                            var reader = new FileReader();
                            reader.readAsDataURL(filelist[i])
                            reader.onload = function(readEvent) {
                                $(".img").append(`
                                    <div class="col-sm-2" id="${count++}">
                                        <figure class="gallery-thumb">
                                            <img src="${readEvent.target.result}" alt="thumb">
                                            <span class="icon icon-delete"><i class="fa fa-trash"></i></span>
                                            <span class="icon icon-loader"><i class="fa fa-spinner fa-spin"></i></span>
                                        </figure>
                                    </div>
                                `)
                            }
                        }
                    }
                }
            })

            $('#image').change(function(){
                var file = document.querySelector('#image').files[0]
                if(Math.round((file.size / 1024)) >= 4096){
                    alert('{{__('login.big')}}')
                }else{
                    formdata.append('file'+count, file)
                    var reader = new FileReader()
                    reader.readAsDataURL(file)
                    reader.onload = function(readEvent) {
                        $(".img").append(`
                            <div class="col-sm-2" id="${count++}">
                                <figure class="gallery-thumb">
                                    <img src="${readEvent.target.result}" alt="thumb">
                                    <span class="icon icon-delete"><i class="fa fa-trash"></i></span>
                                    <span class="icon icon-loader"><i class="fa fa-spinner fa-spin"></i></span>
                                </figure>
                            </div>
                        `)
                    }
                }
            })

            $(document.body).on('click', '.icon-delete' ,function(){
                var id = $(this).parent().parent().prop('id')
                formdata.delete("file"+id)
                $('#'+id).remove()
                delimage.push("file"+id)
            })

            //////////////////////////////////////additional

            function clear(){
                $('.key').val('')
                $('.value').val('')
            }

            function display(e){
                $('.here').html('')
                e.forEach(function(item){
                    $('.here').append(`
                    <div class="col-sm-4">
                        <label id="label">${item.key} : ${item.value}</label>
                    </div>
                    `)
                })
            }

            $('.clear').click(function(e){
                e.preventDefault()
                clear()
            })

            $('.save').click(function(e){
                e.preventDefault()
                additional.push({'key':$('.key').val(),'value':$('.value').val()})
                display(additional)
            })

            //////////////////////////////////////floors
            var floors = new FormData() 

            function clearp(){
                $('.plantitle').val('')
                $('.plansize').val('')
                $('.planbeds').val('')
                $('.planbaths').val('')
                $('.planprice').val('')
                $('.planimage').val('')
                $('.plandesc').val('')
            }

            function displayp(e){
                $('.fplans').append(`
                    <div class="col-sm-2">
                        <label id="floors">Floor ${e}</label>
                    </div>
                `)
            }

            $('#planImage').change(function(){
                var file = document.querySelector('.planimage').files[0]
                if(Math.round((file.size / 1024)) >= 4096){
                    alert('{{__('login.big')}}')
                    document.querySelector('.planimage').Value = ''
                }
            })

            var f = []
            var fc = 0
            $('.addfloor').click(function(e){
                e.preventDefault()
                
                //don't forget the f in ajaaaaaaaaaaaaaaaaaaax
                f.push({'name':$('.plantitle').val(),'size':$('.plansize').val(),'beds':$('.planbeds').val(),'baths':$('.planbaths').val(),'price': $('.planprice').val(),'description':$('.plandesc').val()})
                floors.append('image'+fc,document.querySelector('.planimage').files[0])
                fc++
                clearp()
                displayp(fc)
            })

            var documents = new FormData();
            var filecount = 0
            var deldocs = [] 
            $('#document').change(function(){
                var file = document.querySelector('#document').files[0]
                if(Math.round((file.size / 1024)) >= 4096){
                    alert('{{__('login.big')}}')
                }else{
                    documents.append('file'+filecount, file)
                    var reader = new FileReader()
                    reader.readAsDataURL(file)
                    reader.onload = function(readEvent) {
                        $('.docum').append(`
                        <div class="media" id="file${filecount}">
                            <div class="media-left">
                                <div class="attach-icon"><i class="fa fa-file-o"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="${readEvent.target.result}">file ${filecount++}</a></h4>
                                <ul class="attach-actions">
                                    <li><a href="" class="deletedoc"><i class="fa fa-remove"></i> {{__('login.remove')}}</a></li>
                                </ul>
                            </div>
                        </div>
                        `)
                    }
                }
            })

            $(document.body).on('click','.deletedoc',function(e){
                e.preventDefault()
                var id = $(this).parent().parent().parent().parent().prop('id')
                documents.delete("file"+id)
                $('#'+id).remove()
                deldocs.push(id)
            })

            $('.next , .prev').click(function(e){
                e.preventDefault()
            })

            $('.submit').click(function(e){
                e.preventDefault()
                formdata.append('_token',$("meta[name='csrf-token']").attr('content'))
                formdata.append('delimages',delimage)
                formdata.append('count',count)
                formdata.append('atitle',$('.title').val())
                formdata.append('adescription',$('.description').val())
                formdata.append('atype',$('.type').val())
                formdata.append('astatus',$('.status').val())
                formdata.append('psize',$('.size').val())
                if($('.status').val() == 1){
                    formdata.append('price',$('#price').val())
                    formdata.append('psqft',$('#pricesqft').val())
                    formdata.append('pmonth',0)
                    formdata.append('pyear',0)
                }else if($('.status').val() == 2){
                    formdata.append('pmonth',$('.month').val())
                    formdata.append('price',0)
                    formdata.append('psqft',0)
                    formdata.append('pyear',0)
                }else if($('.status').val() == 3){
                    formdata.append('price',$('#price').val())
                    formdata.append('pyear',$('#pricey').val())
                    formdata.append('psqft',0)
                    formdata.append('pmonth',0)
                }
                formdata.append('video',$('.video').val())

                //address
                formdata.append('address',$('#address').val())
                formdata.append('neighborhood',$('#neighborhood').val())
                formdata.append('country',$('#country').val())
                formdata.append('city',$('#city').val())
                formdata.append('state',$('#countryState').val())
                formdata.append('zip',$('#zip').val())
                formdata.append('maplat',$('.maplat').val())
                formdata.append('maplong',$('.maplong').val())
                formdata.append('streetlat',$('.streetlat').val())
                formdata.append('streetlong',$('.streetlong').val())

                //details
                formdata.append('beds',$('.beds').val())
                formdata.append('baths',$('.baths').val())
                formdata.append('garage',$('.garage').val())
                formdata.append('gsize',$('.gsize').val())
                formdata.append('yearb',$('.yearb').val())

                //additional
                formdata.append('additional',JSON.stringify(additional))

                //features
                var feat = []
                var featc = 0
                $("input[name='feature']:checked").each(function() {
                    feat.push(this.value);
                    featc++
                })
                formdata.append('features',feat)
                formdata.append('featc',featc)

                //floors
                floors.append('floors',JSON.stringify(f))
                floors.append('count',fc)
                floors.append('_token',$("meta[name='csrf-token']").attr('content'))

                //attachments
                documents.append('filecount',filecount)
                documents.append('deldocs',deldocs)
                documents.append('_token',$("meta[name='csrf-token']").attr('content'))

                //ajax
                $.ajax({
                    header:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:"/create",
                    dataType:'JSON',
                    type:'POST',
                    data:formdata,
                    processData: false,
                    contentType: false,
                    success:function(res){
                        floors.append('id',res)
                        $.ajax({
                            header:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url:"/createfloors",
                            dataType:'JSON',
                            type:'POST',
                            data:floors,
                            processData: false,
                            contentType: false,
                            success:function(response){
                                documents.append('id',response)
                                $.ajax({
                                    header:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    url:"/createdoc",
                                    dataType:'JSON',
                                    type:'POST',
                                    data:documents,
                                    processData: false,
                                    contentType: false,
                                    success:function(r){
                                        if(r == 1){
                                            alert('{{__('login.done')}}')
                                            location.href = "/listing/2"
                                        }
                                    }
                                })
                            }
                        })
                    }
                })
            })
        })

    </script>

    <script>
        $('.sstep2').hide()
        $('.change2').click(function(){change(2)})
        $('.change1').click(function(){change(1)})

        function scroll(e){
            const y = e.getBoundingClientRect().top + window.pageYOffset - 100;
            window.scrollTo({top: y, behavior: 'smooth'});
        }
                function change(n){
                    var reg = /^([0-9]*[.])?[0-9]+$/
                    if(n == 1){
                        $('.sstep2').hide()
                        $('.sstep1').show()
                        $('.step1').addClass('active')
                        $('.step2').removeClass('active')
                    }else{
                        if($('.title').val().length >= 3){
                            $('.title').css({'border':'2px solid #e5e7eb'})
                            if($('.description').val().length >= 15){
                                $('.description').css({'border':'2px solid #e5e7eb'})
                                if($('.type').val() != null){
                                    $('.type').css({'border':'2px solid #e5e7eb'})
                                    if($('.status').val() != null){
                                        $('.status').css({'border':'2px solid #e5e7eb'})
                                        if($('.status').val() == 1){
                                            if($('#price').val().length != 0 && reg.test($('#price').val())){
                                                $('#price').css({'border':'2px solid #e5e7eb'})
                                                if($('.pricesq').val().length != 0 && reg.test($('.pricesq').val())){
                                                    $('.pricesq').css({'border':'2px solid #e5e7eb'})
                                                }else{
                                                    $('.pricesq').css({'border':'2px solid red'})
                                                    scroll(document.querySelector('.pricesq'))
                                                }

                                            }else{
                                                $('#price').css({'border':'2px solid red'})
                                                scroll(document.querySelector('#price'))
                                                return
                                            }
                                        }else if($('.status').val() == 2){
                                            if($('.month').val().length != 0 && reg.test($('.month').val())){
                                                $('.month').css({'border':'2px solid #e5e7eb'})

                                            }else{
                                                $('.month').css({'border':'2px solid red'})
                                                scroll(document.querySelector('.month'))
                                                return
                                            }
                                        }else if($('.status').val() == 3){
                                            if($('#price').val().length != 0 && reg.test($('#price').val())){
                                                $('#price').css({'border':'2px solid #e5e7eb'})
                                                if($('.priceyr').val().length != 0 && reg.test($('.priceyr').val())){
                                                    $('.priceyr').css({'border':'2px solid #e5e7eb'})
                                                }else{
                                                    $('.priceyr').css({'border':'2px solid red'})
                                                    scroll(document.querySelector('.priceyr'))
                                                    return
                                                }

                                            }else{
                                                $('#price').css({'border':'2px solid red'})
                                                scroll(document.querySelector('#price'))
                                                return
                                            }
                                        }

                                        if($('.size').val() != '' &&  reg.test($('.size').val())){
                                            $('.size').css({'border':'2px solid #e5e7eb'})
                                            if($('.img').children().length > 0){
                                                $('.media-drag-drop').css({'border':'2px dashed #000000'})
                                            }else{
                                                $('.media-drag-drop').css({'border':'2px dashed red'})
                                                scroll(document.querySelector('.media-drag-drop'))
                                                return
                                            }
                                        }else{
                                            $('.size').css({'border':'2px solid red'})
                                            scroll(document.querySelector('.size'))
                                            return
                                        }

                                    }else{
                                        $('.status').css({'border':'2px solid red'})
                                        scroll(document.querySelector('.status'))
                                        return
                                    }
                                }else{
                                    $('.type').css({'border':'2px solid red'})
                                    scroll(document.querySelector('.type'))
                                    return
                                }
                            }else{
                                $('.description').css({'border':'2px solid red'})
                                scroll(document.querySelector('.description'))
                                return
                            }
                        }else{
                            $('.title').css({'border':'2px solid red'})
                            scroll(document.querySelector('.title'))
                            return
                        }

                        var r = /^[+-]?([0-9]*[.])?[0-9]+$/
                        if($('#address').val().length >= 5){
                            $('#address').css({'border':'2px solid #e5e7eb'})
                            if($('#neighborhood').val().length >= 3){
                                $('#neighborhood').css({'border':'2px solid #e5e7eb'})
                                if($('#country').val() != null){
                                    $('#country').css({'border':'2px solid #e5e7eb'})
                                    if($('#city').val() != null){
                                        $('#city').css({'border':'2px solid #e5e7eb'})
                                        if(r.test($('.maplat').val())){
                                            $('.maplat').css({'border':'2px solid #e5e7eb'})
                                            if(r.test($('.maplong').val())){
                                                $('.maplong').css({'border':'2px solid #e5e7eb'})
                                                if(r.test($('.streetlat').val())){
                                                    $('.streetlat').css({'border':'2px solid #e5e7eb'})
                                                    if(r.test($('.streetlong').val())){
                                                        $('.streetlong').css({'border':'2px solid #e5e7eb'})
                                                    }else{
                                                        $('.streetlong').css({'border':'2px solid red'})
                                                        scroll(document.querySelector('.streetlong'))
                                                        return
                                                    }
                                                }else{
                                                    $('.streetlat').css({'border':'2px solid red'})
                                                    scroll(document.querySelector('.streetlat'))
                                                    return
                                                }
                                            }else{
                                                $('.maplong').css({'border':'2px solid red'})
                                                scroll(document.querySelector('.maplong'))
                                                return
                                            }
                                        }else{
                                            $('.maplat').css({'border':'2px solid red'})
                                            scroll(document.querySelector('.maplat'))
                                            return
                                        }
                                    }else{
                                        $('#city').css({'border':'2px solid red'})
                                        scroll(document.querySelector('#city'))
                                        return
                                    }
                                }else{
                                    $('#country').css({'border':'2px solid red'})
                                    scroll(document.querySelector('#country'))
                                    return
                                }
                            }else{
                                $('#neighborhood').css({'border':'2px solid red'})
                                scroll(document.querySelector('#neighborhood'))
                                return
                            }
                        }else{
                            $('#address').css({'border':'2px solid red'})
                            scroll(document.querySelector('#address'))
                            return
                        }

                        var rg = /^[0-9]+$/
                        if(rg.test($('.beds').val())){
                            $('.beds').css({'border':'2px solid #e5e7eb'})
                            if(rg.test($('.baths').val())){
                                $('.baths').css({'border':'2px solid #e5e7eb'})
                                if(rg.test($('.garage').val())){
                                    $('.garage').css({'border':'2px solid #e5e7eb'})
                                    if(reg.test($('.gsize').val())){
                                        $('.gsize').css({'border':'2px solid #e5e7eb'})
                                        if(rg.test($('.yearb').val())){
                                            $('.yearb').css({'border':'2px solid #e5e7eb'})

                                        }else{
                                            $('.yearb').css({'border':'2px solid red'})
                                            scroll(document.querySelector('.yearb'))
                                            return
                                        }
                                    }else{
                                        $('.gsize').css({'border':'2px solid red'})
                                        scroll(document.querySelector('.gsize'))
                                        return
                                    }
                                }else{
                                    $('.garage').css({'border':'2px solid red'})
                                    scroll(document.querySelector('.garage'))
                                    return
                                }
                            }else{
                                $('.baths').css({'border':'2px solid red'})
                                scroll(document.querySelector('.baths'))
                                return
                            }
                        }else{
                            $('.beds').css({'border':'2px solid red'})
                            scroll(document.querySelector('.beds'))
                            return
                        }

                        $('.sstep1').hide()
                        $('.sstep2').show()
                        $('.step2').addClass('active')
                        $('.step1').removeClass('active')
                    }
                }
    </script>
<!--
    <script type="text/javascript">
         let app = Vue.createApp({
            data() {
                return {
                    step1:true,
                    step2:false
                }
            },methods:{
                change(n){
                    var reg = /^([0-9]*[.])?[0-9]+$/
                    if(n == 1){
                        this.step1 = true
                        this.step2 = false
                        $('.step1').addClass('active')
                        $('.step2').removeClass('active')
                    }else{
                        if($('.title').val().length >= 3){
                            $('.title').css({'border':'2px solid #e5e7eb'})
                            if($('.description').val().length >= 15){
                                $('.description').css({'border':'2px solid #e5e7eb'})
                                if($('.type').val() != null){
                                    $('.type').css({'border':'2px solid #e5e7eb'})
                                    if($('.status').val() != null){
                                        $('.status').css({'border':'2px solid #e5e7eb'})
                                        if($('.status').val() == 1){
                                            if($('#price').val().length != 0 && reg.test($('#price').val())){
                                                $('#price').css({'border':'2px solid #e5e7eb'})
                                                if($('.pricesq').val().length != 0 && reg.test($('.pricesq').val())){
                                                    $('.pricesq').css({'border':'2px solid #e5e7eb'})
                                                }else{
                                                    $('.pricesq').css({'border':'2px solid red'})
                                                }

                                            }else{
                                                $('#price').css({'border':'2px solid red'})
                                                return
                                            }
                                        }else if($('.status').val() == 2){
                                            if($('.month').val().length != 0 && reg.test($('.month').val())){
                                                $('.month').css({'border':'2px solid #e5e7eb'})

                                            }else{
                                                $('.month').css({'border':'2px solid red'})
                                                return
                                            }
                                        }else if($('.status').val() == 3){
                                            if($('#price').val().length != 0 && reg.test($('#price').val())){
                                                $('#price').css({'border':'2px solid #e5e7eb'})
                                                if($('.priceyr').val().length != 0 && reg.test($('.priceyr').val())){
                                                    $('.priceyr').css({'border':'2px solid #e5e7eb'})
                                                }else{
                                                    $('.priceyr').css({'border':'2px solid red'})
                                                    return
                                                }

                                            }else{
                                                $('#price').css({'border':'2px solid red'})
                                                return
                                            }
                                        }

                                        if($('.size').val() != '' &&  reg.test($('.size').val())){
                                            $('.size').css({'border':'2px solid #e5e7eb'})
                                            if($('.img').children().length > 0){
                                                $('.media-drag-drop').css({'border':'2px dashed #000000'})
                                            }else{
                                                $('.media-drag-drop').css({'border':'2px dashed red'})
                                                return
                                            }
                                        }else{
                                            $('.size').css({'border':'2px solid red'})
                                            return
                                        }

                                    }else{
                                        $('.status').css({'border':'2px solid red'})
                                        return
                                    }
                                }else{
                                    $('.type').css({'border':'2px solid red'})
                                    return
                                }
                            }else{
                                $('.description').css({'border':'2px solid red'})
                                return
                            }
                        }else{
                            $('.title').css({'border':'2px solid red'})
                            return
                        }

                        var r = /^[+-]?([0-9]*[.])?[0-9]+$/
                        if($('#address').val().length >= 5){
                            $('#address').css({'border':'2px solid #e5e7eb'})
                            if($('#neighborhood').val().length >= 3){
                                $('#neighborhood').css({'border':'2px solid #e5e7eb'})
                                if($('#country').val() != null){
                                    $('#country').css({'border':'2px solid #e5e7eb'})
                                    if($('#city').val() != null){
                                        $('#city').css({'border':'2px solid #e5e7eb'})
                                        if(r.test($('.maplat').val())){
                                            $('.maplat').css({'border':'2px solid #e5e7eb'})
                                            if(r.test($('.maplong').val())){
                                                $('.maplong').css({'border':'2px solid #e5e7eb'})
                                                if(r.test($('.streetlat').val())){
                                                    $('.streetlat').css({'border':'2px solid #e5e7eb'})
                                                    if(r.test($('.streetlong').val())){
                                                        $('.streetlong').css({'border':'2px solid #e5e7eb'})
                                                    }else{
                                                        $('.streetlong').css({'border':'2px solid red'})
                                                        return
                                                    }
                                                }else{
                                                    $('.streetlat').css({'border':'2px solid red'})
                                                    return
                                                }
                                            }else{
                                                $('.maplong').css({'border':'2px solid red'})
                                                return
                                            }
                                        }else{
                                            $('.maplat').css({'border':'2px solid red'})
                                            return
                                        }
                                    }else{
                                        $('#city').css({'border':'2px solid red'})
                                        return
                                    }
                                }else{
                                    $('#country').css({'border':'2px solid red'})
                                    return
                                }
                            }else{
                                $('#neighborhood').css({'border':'2px solid red'})
                                return
                            }
                        }else{
                            $('#address').css({'border':'2px solid red'})
                            return
                        }

                        var rg = /^[0-9]+$/
                        if(rg.test($('.beds').val())){
                            $('.beds').css({'border':'2px solid #e5e7eb'})
                            if(rg.test($('.baths').val())){
                                $('.baths').css({'border':'2px solid #e5e7eb'})
                                if(rg.test($('.garage').val())){
                                    $('.garage').css({'border':'2px solid #e5e7eb'})
                                    if(reg.test($('.gsize').val())){
                                        $('.gsize').css({'border':'2px solid #e5e7eb'})
                                        if(rg.test($('.yearb').val())){
                                            $('.yearb').css({'border':'2px solid #e5e7eb'})

                                        }else{
                                            $('.yearb').css({'border':'2px solid red'})
                                            return
                                        }
                                    }else{
                                        $('.gsize').css({'border':'2px solid red'})
                                        return
                                    }
                                }else{
                                    $('.garage').css({'border':'2px solid red'})
                                    return
                                }
                            }else{
                                $('.baths').css({'border':'2px solid red'})
                                return
                            }
                        }else{
                            $('.beds').css({'border':'2px solid red'})
                            return
                        }

                        this.step1 = false
                        this.step2 = true
                        $('.step2').addClass('active')
                        $('.step1').removeClass('active')
                    }
                }
            }
        })
        app.mount('#app')
    </script>
-->
@endsection