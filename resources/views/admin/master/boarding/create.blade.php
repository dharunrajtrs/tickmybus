@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
{{-- {{session()->get('errors')}} --}}

    <!-- Start Page content -->

<!-- twitter-bootstrap-wizard css -->
<link rel="stylesheet" href="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
<!-- App Css-->
<link href="{{ asset('taxi/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
type="text/css" />
    <!-- Bootstrap time Picker -->
<style>
.btn-group {
flex-direction: row-reverse;
}

</style>
<style>
    .city-recommendations {
        list-style-type: none;
        padding-left: 0;
        margin-top: 5px;
        border: 1px solid #ccc;
        max-height: 150px; /* Set a max height for scrollability */
        overflow-y: auto; /* Enable vertical scrolling if needed */
    }
    .city-recommendations li {
        padding: 5px 10px;
        cursor: pointer;
    }
    .city-recommendations li:hover {
        background-color: #f2f2f2;
    }
</style>
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="{{ url('boarding_point') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('boarding_point/store') }}">
                                @csrf

                                <div class="row">

                                            <div class="col-sm-12">
                                             <div class="form-group">
                                              <label for="city_id" class="">@lang('view_pages.select_city') <sup>*</sup></label>
                                              <select name="city_id" id="city_id" class="form-control" required>
                                                <option value="" >@lang('view_pages.select_area')</option>
                                                @foreach($cities as $key=>$cities)
                                                <option value="{{$cities->id}}">{{$cities->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">@lang('view_pages.short_code') <span class="text-danger">*(eg:Chennai -> CHN)</span></label>
                                                <input class="form-control" type="text" id="short_code" name="short_code"
                                                    value="{{ old('short_code') }}" required
                                                    placeholder="@lang('view_pages.enter') @lang('view_pages.short_code')">
                                                <span class="text-danger">{{ $errors->first('short_code') }}</span>
                                            </div>
                                        </div>
                                    {{-- <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.boarding_address') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="boarding_address" name="boarding_address"
                                                value="{{ old('boarding_address') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.boarding_address')">
                                            <span class="text-danger">{{ $errors->first('boarding_address') }}</span>
                                            <input type="hidden" class="form-control" id="boarding_lat"
                                                        name="boarding_lat">
                                           <input type="hidden" class="form-control" id="boarding_lng"
                                                        name="boarding_lng">

                                        </div>
                                        <div class="col-sm-4 float-left mb-md-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                             </div>
                                    </div>
                                    </div> --}}
                                    <div class="col-sm-12" id="boarding_points">
                                        <table class="table surgeTable" id="table">
                                            <thead>
                                                <th>@lang('view_pages.boarding_point_droping_point') <span class="text-danger">*</span></th>
                                            </thead>
                                            <tbody class="append_row">
                                                <tr class="default_select select_row actv">
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="text" name="boarding_point[]" id="boarding_point_0" class="form-control boarding_point_input" placeholder="@lang('view_pages.boarding_point_droping_point')" required>
                                                        </div>
                                                        <div class="city-recommendations" id="city_recommendations"></div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-4 flo mb-md-3">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

{{-- <script src="https://maps.google.com/maps/api/js?key={{get_settings('google_map_key')}}&libraries=drawing,geometry,places"></script>

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

</script> --}}


<!-- twitter-bootstrap-wizard js -->
<script src="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

<script src="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

<!-- form wizard init -->
<script src="{{ asset('taxi/assets/js/form-wizard.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
 <!-- bootstrap time picker -->
 </script>
 <script type="text/javascript">
    var boarding_expt_array = [];
    var dropping_expt_array = [];
    var city_option = [];

    $(document).on("click", ".add_row", function() {
        var table = document.getElementById("table");
        if ($('.add_row').length < 20) {
            var tableLength = table.rows.length;
            var newRowId = tableLength - 1;

            var append_row = `
                <tr class="add_new_row select_row inactv">
                    <td>
                        <div class="form-group">
                            <input type="text" name="boarding_point[]" id="boarding_point_${newRowId}" class="form-control boarding_point_input" placeholder="@lang('view_pages.boarding_point_droping_point')" required>
                        </div>
                        <div class="city-recommendations" id="city_recommendations_${newRowId}"></div>
                    </td>
                    <td>
                        <div class="form-group">
                            <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                            <button type="button" class="btn btn-danger btn-sm remove_row"> - </button>
                        </div>
                    </td>
                </tr>`;
            $(".append_row").append(append_row);
        } else {
            alert("Selected every boarding points");
        }
    });

    $(document).on("click", ".remove_row", function() {
        $(this).closest("tr").remove();
    });

    // Function to get city options via AJAX
    function getCity(value) {
        $.ajax({
            url: "{{ route('admingetCity') }}",
            type: 'GET',
            data: { 'city_id': value },
            success: function(result) {
                city_option = result;
                console.log('City options:', city_option);
            },
            error: function(error) {
                console.log('Error fetching city options:', error);
            }
        });
    }

    // Call getCity when city selection changes
    $('#city_id').on('change', function() {
        var cityId = $(this).val();
        if (cityId) {
            getCity(cityId);
        }
    });

    // Initial call if there is a pre-selected city
    $(document).ready(function() {
        var initialCityId = $('#city_id').val();
        if (initialCityId) {
            getCity(initialCityId);
        }
    });

    // Event listener for input on dynamically added elements
    $(document).on('input', '.boarding_point_input', function() {
        var inputText = $(this).val().toLowerCase();
        var recommendationsContainer = $(this).closest('td').find('.city-recommendations');
        recommendationsContainer.empty();

        console.log('Input text:', inputText);
        console.log('City options for filtering:', city_option);

        if (Array.isArray(city_option) && city_option.length > 0) {
            var list = $('<ul class="list-unstyled"></ul>');
            city_option.forEach(function(option) {
                if (option.boarding_droping_point_address.toLowerCase().includes(inputText)) {
                    var listItem = $('<li>' + option.boarding_droping_point_address + '</li>');
                    listItem.on('click', function() {
                        $(this).closest('td').find('.boarding_point_input').val($(this).text()); // Update input with clicked value
                        recommendationsContainer.empty(); // Clear recommendations after selection
                    });
                    list.append(listItem);
                }
            });

            // Append list only if it has items
            if (list.children().length > 0) {
                recommendationsContainer.append(list);
            } else {
                recommendationsContainer.append('<p>No matching options found</p>');
            }
        } else {
            recommendationsContainer.append('<p>No options available</p>');
        }
    });
</script>


@endsection
