@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
{{-- {{session()->get('errors')}} --}}

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="{{ url('rest')}}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                 <form method="post" class="form-horizontal" action="{{ url('rest/store') }}">
                                @csrf

                                <div class="row">
                                   
                                     <div class="col-sm-12">
<div class="form-group">
<label for="service_location_id" class="">@lang('view_pages.select_area') <sup>*</sup></label>
<select name="service_location_id" id="service_location_id" class="form-control" required>
<option value="" >@lang('view_pages.select_area')</option>
@foreach($services as $key=>$service)
<option value="{{$service->id}}">{{$service->name}}</option>
@endforeach
</select>
</div>
</div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.rest_stop_address') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="rest_stop_address" name="rest_stop_address"
                                                value="{{ old('rest_stop_address') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.rest_stop_address')">
                                            <span class="text-danger">{{ $errors->first('rest_stop_address') }}</span>
                                            <input type="hidden" class="form-control" id="rest_lat"
                                                        name="rest_lat">
                                                    <input type="hidden" class="form-control" id="rest_lng"
                                                        name="rest_lng">
                                        </div>
                                    </div>
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.landmark') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="landmark" name="landmark"
                                                value="{{ old('landmark') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.landmark')">
                                            <span class="text-danger">{{ $errors->first('landmark') }}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
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

  
<script src="https://maps.google.com/maps/api/js?key={{get_settings('google_map_key')}}&libraries=drawing,geometry,places"></script>

<script src="{{ asset('assets/build/js/intlTelInput.js') }}"></script>
    <script type="text/javascript"></script>

 

    <script>
    function initialize() {
        var input = document.getElementById('rest_stop_address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('rest_lat').value = place.geometry.location.lat();
            document.getElementById('rest_lng').value = place.geometry.location.lng();


        });

    }

    // function initialize2() {
    //     var input = document.getElementById('to');
    //     var autocomplete = new google.maps.places.Autocomplete(input);
    //     google.maps.event.addListener(autocomplete, 'place_changed', function () {
    //         var place = autocomplete.getPlace();
    //         document.getElementById('to_lat').value = place.geometry.location.lat();
    //         document.getElementById('to_lng').value = place.geometry.location.lng();

    //     });

    // }

    // function initialize3(inputs,inputslat,inputslog,i) {
    //     //alert(JSON.stringify(inputslat[i]));
    //        console.log(inputslat[i],"gshfdgFA");
    //        console.log(inputslog[i]);

    //     // var input = document.getElementById('stop_address[i]');
    //     var originLatitude = document.getElementById('stop_lat');
    //     var originLongitude = document.getElementById('stop_lng');   
    //     var autocomplete = new google.maps.places.Autocomplete(inputs[i]);
    //     //alert(JSON.stringify(autocomplete));
    //     google.maps.event.addListener(autocomplete, 'place_changed', function () {
    //         var place = autocomplete.getPlace();
    //         // var latitude  = place.geometry.location.lat();
    //         document.getElementById(inputslat[i]).value = place.geometry.location.lat();
    //         document.getElementById(inputslog[i]).value = place.geometry.location.lng();
    //         inputslat[i] = latitude;
    //         console.log(latitude);
    //         var longitude = place.geometry.location.lng();
    //         console.log(longitude);
    //         inputslog[i] = longitude;
    //         originLatitude.value = latitude;
    //         originLongitude.value = longitude;
    //         //alert(latitude,longitude);
    //     });

    // }
    
    // function initialize4() {
    //     var input = document.getElementById('stop_address0');
    //     var autocomplete = new google.maps.places.Autocomplete(input);
    //     google.maps.event.addListener(autocomplete, 'place_changed', function () {
    //         var place = autocomplete.getPlace();
    //         document.getElementById('stop_lat0').value = place.geometry.location.lat();
    //         document.getElementById('stop_lng0').value = place.geometry.location.lng();

    //     });

    // }

    google.maps.event.addDomListener(window, 'load', initialize);

    google.maps.event.addDomListener(window, 'load', initialize2);

</script>




@endsection
