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
                            <a href="{{ url('routes') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('routes/store') }}">
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
                                            <label for="from">@lang('view_pages.from') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="from" name="from"
                                                value="{{ old('from') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.from')">
                                            <span class="text-danger">{{ $errors->first('from') }}</span>
                                             <input type="hidden" class="form-control" id="from_lat"
                                                        name="from_lat">
                                             <input type="hidden" class="form-control" id="from_lng"
                                                        name="from_lng">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="to">@lang('view_pages.to') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="to" name="to"
                                                value="{{ old('to') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.to')">
                                            <span class="text-danger">{{ $errors->first('to') }}</span>
                                             <input type="hidden" class="form-control" id="to_lat"
                                                        name="to_lat">
                                             <input type="hidden" class="form-control" id="to_lng"
                                                        name="to_lng">
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





  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_8YI4VVLfG0JaV8PNZLY0_e2xVjg6gw&libraries=places"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="{{ asset('assets/build/js/intlTelInput.js') }}"></script>
    <script>
    function initialize() {
        var input = document.getElementById('from');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('from_lat').value = place.geometry.location.lat();
            document.getElementById('from_lng').value = place.geometry.location.lng();


        });

    }

    function initialize2() {
        var input = document.getElementById('to');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('to_lat').value = place.geometry.location.lat();
            document.getElementById('to_lng').value = place.geometry.location.lng();

        });

    }

    function initialize3(inputs,inputslat,inputslog,i) {
        //alert(JSON.stringify(inputslat[i]));

        // var input = document.getElementById('stop_address[i]');
        var originLatitude = document.getElementById('stop_lat');
        var originLongitude = document.getElementById('stop_lng');   
        var autocomplete = new google.maps.places.Autocomplete(inputs[i]);
        //alert(JSON.stringify(autocomplete));
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            // var latitude  = place.geometry.location.lat();
            document.getElementById(inputslat[i]).value = place.geometry.location.lat();
            document.getElementById(inputslog[i]).value = place.geometry.location.lng();
            inputslat[i] = latitude;
            console.log(latitude);
            var longitude = place.geometry.location.lng();
            console.log(longitude);
            inputslog[i] = longitude;
            originLatitude.value = latitude;
            originLongitude.value = longitude;
            //alert(latitude,longitude);
        });

    }
    
    function initialize4() {
        var input = document.getElementById('stop_address0');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('stop_lat0').value = place.geometry.location.lat();
            document.getElementById('stop_lng0').value = place.geometry.location.lng();

        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    google.maps.event.addDomListener(window, 'load', initialize2);

    google.maps.event.addDomListener(window, 'load', initialize3);

    google.maps.event.addDomListener(window, 'load', initialize4);

</script>


@endsection
