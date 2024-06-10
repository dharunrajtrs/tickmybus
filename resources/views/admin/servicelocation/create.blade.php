@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')


<style>
#map {
height: 400px;
width: 80%;
left: 10px;
}
html, body {
padding: 0;
margin: 0;
height: 100%;
}

#panel {
width: 200px;
font-family: Arial, sans-serif;
font-size: 13px;
float: right;
margin: 10px;
margin-top: 100px;
}

#delete-button, #add-button, #delete-all-button, #save-button {
margin-top: 5px;
}
#search-box {
background-color: #f7f7f7;
font-size: 15px;
font-weight: 300;
margin-top: 10px;
margin-bottom: 10px;
margin-left: 10px;
padding: 0 11px 0 13px;
text-overflow: ellipsis;
height: 25px;
width: 80%;
border: 1px solid #c7c7c7;
}
.map_icons{
font-size: 24px;
color: white;
padding: 10px;
background-color: #43439999;
margin: 5px;
}
</style>



<!-- Start Page content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
    <div class="box">

        <div class="box-header with-border">
            <a href="{{ url('service_location') }}">
                <button class="btn btn-danger btn-sm pull-right" type="submit">
                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                    @lang('view_pages.back')
                </button>
            </a>
        </div>

<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('service_location/store')}}" enctype="multipart/form-data">
@csrf

<input type="hidden" id="info" name="coordinates" value="">

<input type="hidden" id="city_polygon" name="city_polygon" value="{{ old('city_polygon') }}">


    <div class="row">

        <div class="col-sm-6" style="display: none">
            <div class="form-group">
                <label for="country">@lang('view_pages.select_country') <span class="text-danger">*</span></label>
                <select name="country" id="country" class="form-control select2" required>
                    <option value="102" selected>@lang('view_pages.select')</option>

                </select>
                <span class="text-danger">{{ $errors->first('country') }}</span>

            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
            <label for="name">@lang('view_pages.name') <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}" required="" placeholder="@lang('view_pages.enter_name')">
            <span class="text-danger">{{ $errors->first('name') }}</span>

        </div>
    </div>

    <input type="hidden" name="currency_name" id="currency_name">

    <div class="col-sm-6">
            <div class="form-group">
            <label for="currency_code">@lang('view_pages.currency_code') <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="currency_code" name="currency_code" value="{{old('currency_code')}}" required="" placeholder="@lang('view_pages.enter') @lang('view_pages.currency_code')" list="currency_code_list" autocomplete="off">
            <datalist id="currency_code_list">

            </datalist>
            <span class="text-danger">{{ $errors->first('currency_code') }}</span>

        </div>
    </div>

    <div class="col-sm-6">
            <div class="form-group">
            <label for="currency_symbol">@lang('view_pages.currency_symbol') <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="currency_symbol" name="currency_symbol" value="{{old('currency_symbol')}}" required="" placeholder="@lang('view_pages.enter_currency_symbol')" list="currency_symbol_list" autocomplete="off">
            <datalist id="currency_symbol_list">

            </datalist>
            <span class="text-danger">{{ $errors->first('currency_symbol') }}</span>

        </div>
    </div>

    <div class="col-sm-6" style="display: none">
            <div class="form-group">
            <label for="timezone">@lang('view_pages.timezone') <span class="text-danger">*</span></label>
            <select name="timezone" id="timezone" class="form-control select2" required>
                <option value="Asia/Kolkata" selected>@lang('view_pages.select')</option>

            </select>
            <span class="text-danger">{{ $errors->first('timezone') }}</span>

        </div>
    </div>

    <div class="col-sm-6">
<div class="form-group">
<label for="zone_admin" class="">@lang('view_pages.select_unit') <sup>*</sup></label>
<select name="unit" id="unit" class="form-control" required>
<option value="" selected disabled>@lang('view_pages.select_unit')</option>
<option value="1">@lang('view_pages.kilo_meter')</option>
<option value="2">@lang('view_pages.miles')</option>
</select>
</div>
</div>

</div>

<div class="row">
<div class="col-sm-12">

    <input id="search-box" class="form-control controls" type="text" placeholder="@lang('view_pages.search')" />

<div id="map" class="col-sm-10" style="float:left;"></div>

<div id="" class="col-sm-2" style="float:right;">
<ul style="list-style: none;">
<li>
<a id="select-button" href="javascript:void(0)" onclick="drawingManager.setDrawingMode(null)" class="btn-floating zone-add-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-hand-pointer-o map_icons"></i>
</a>
</li>

<li>
<a id="add-button" href="javascript:void(0)" onclick="drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON)" class="btn-floating zone-add-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-plus-circle map_icons"></i>
</a>
</li>

<li>
<a id="delete-button" href="javascript:void(0)" onclick="deleteSelectedShape()" class="btn-floating zone-delete-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-times map_icons"></i>
</a>
</li>
<li>
<a id="delete-all-button" href="javascript:void(0)" onclick="clearMap()" class="btn-floating zone-delete-all-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-trash-o map_icons"></i>
</a>
</li>

</ul>
</div>

</div>
</div>


    <div class="form-group">
        <div class="col-12">
            <button class="btn btn-primary pull-right btn-sm m-5" type="submit">
                @lang('view_pages.save')
            </button>
        </div>
    </div>

</form>

            </div>
        </div>


    </div>
</div>
</div>

</div>
<!-- container -->

</div>
<!-- content -->
<script type="text/javascript">
    $(document).ready(function() {
        function getCurrencyByCountry(id) {
            $.ajax({
                url: '{{ route("getCurrencyByCountry") }}',
                data: {'id': id},
                method: 'get',
                success: function(res) {
                    $('#currency_name').val(res.currency_name);
                    $('#currency_code').val(res.currency_code);
                    $('#currency_symbol').val(res.currency_symbol);
                    $('#currency_code_list').html('<option value="'+ res.currency_code +'">'+res.currency_code+'</option>');
                    $('#currency_symbol_list').html('<option value="'+ res.currency_symbol +'">'+res.currency_symbol+'</option>');
                }
            });
        }


        getCurrencyByCountry(102);
    });
    </script>



<script src="https://maps.google.com/maps/api/js?key={{get_settings('google_map_key')}}&libraries=drawing,geometry,places"></script>

<script src="{{asset('assets/js/polygon/main.js')}}"></script>
<script src="{{asset('assets/js/polygon/nucleu.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function() {
        var keyword = $('#city').val();

        if(keyword) getCoordsByKeyword(keyword);
    });

    $(document).on('change','#city',function(){
        var val = $(this).val();
        getCoordsByKeyword(val);
    });

    $(document).on('click','.searchCity',function(){
        var val = $('#city option:selected').val();
        if(val) getCoordsByKeyword(val);
    });

    $(document).on('keyup','.select2-search__field',function(){
        var val = $(this).val();

        if(val != '' && val.length > 2){
            $.ajax({
                url: '{{ route("getCityBySearch") }}',
                data: {search:val},
                method: 'get',
                success: function(results){
                    if(results.length > 0 ){
                        $('#city').html('');

                        results.forEach(city => {
                            $('#city').append('<option value="'+city[0]+'">'+city[0]+'</option>');
                        });
                    }
                }
            });
        }
    });

    function getCoordsByKeyword(keyword){
        // $('#loader').css('display','block');
        // $('#map').css('display','none');

        $.ajax({
            url: "{{ url('service_location/coords/by_keyword') }}/"+keyword,
            data: '',
            method: 'get',
            success: function(results){
                if(results){
                    $('#city_polygon').val(results);

                    // setTimeout(function(){
                        // $('#loader').css('display','none');
                        // $('#map').css('display','block');
                    // }, 1000);
                    window.onload = initMap()
                }
            }
        });
    }
</script>
@endsection
