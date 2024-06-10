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
                            <a href="{{ url('amenity') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" enctype="multipart/form-data" class="form-horizontal" action="{{ url('amenity/store') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.name') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ old('name') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.name')">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                     <div class="form-group">
        <div class="col-6">
            <label for="icon">@lang('view_pages.icon')</label><br>
            <img id="blah" src="#" alt=""><br>
            <input type="file" id="icon" onchange="readURL(this)" name="icon" style="display:none">
            <button class="btn btn-primary btn-sm" type="button" onclick="$('#icon').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('icon') }}</span>
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

  
 <!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_8YI4VVLfG0JaV8PNZLY0_e2xVjg6gw&libraries=places"></script>

<script src="{{ asset('assets/build/js/intlTelInput.js') }}"></script>
    <script type="text/javascript"></script>

 

    <script>
    function initialize() {
        var input = document.getElementById('boarding_address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('boarding_lat').value = place.geometry.location.lat();
            document.getElementById('boarding_lng').value = place.geometry.location.lng();


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
           console.log(inputslat[i],"gshfdgFA");
           console.log(inputslog[i]);

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

</script> -->




@endsection
