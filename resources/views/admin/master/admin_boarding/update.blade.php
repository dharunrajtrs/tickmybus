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
                            <a href="{{ url('boarding_point') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('admin_boarding_point/update',$item->id) }}">
                                @csrf
<div class="row">

<div class="col-sm-12">
<div class="form-group">
    <label for="city_id">@lang('view_pages.select_city')
        <span class="text-danger">*</span>
    </label>
    <select name="city_id" id="city_id" class="form-control">
        <option value="" selected disabled>@lang('view_pages.select_city')</option>
        @foreach($cities as $key=>$city)
        <option value="{{$city->id}}" {{ old('city_id',$item->city_id) == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
        @endforeach
    </select>
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group">
        <label for="name">@lang('view_pages.short_code') <span class="text-danger">*</span></label>
        <input class="form-control" type="text" id="short_code" name="short_code"
            value="{{ old('short_code',$item->short_code) }}" required
            placeholder="@lang('view_pages.enter') @lang('view_pages.short_code')">
        <span class="text-danger">{{ $errors->first('short_code') }}</span>
    </div>
</div>



<div class="col-sm-12" id="boarding_points">

        <table class="table surgeTable" id="table">
            <thead>
                <th> @lang('view_pages.boarding_point_droping_point') <span class="text-danger">*</span></th>
            </thead>
            <tbody class="append_row">
                @foreach ($boarding_droping_points as $point)
                    <tr class="default_select select_row actv">
                        <td>
                            <div class="form-group">
                                <input type="text" name="boarding_points[{{ $point->id }}][address]"
                                    value="{{ $point->boarding_droping_point_address }}"
                                    class="form-control boarding_point_input"
                                    placeholder="@lang('view_pages.boarding_point_droping_point')"
                                    required>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4 flo mb-md-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

                                    </div>


                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                                            @lang('view_pages.update')
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



{{--
    <script src="https://maps.google.com/maps/api/js?key={{get_settings('google_map_key')}}&libraries=drawing,geometry,places"></script>

<script src="{{ asset('assets/build/js/intlTelInput.js') }}"></script>
    <script type="text/javascript"></script>



    <script>
    function initialize() {
        var input = document.getElementById('boarding_address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('boarding_address_lat').value = place.geometry.location.lat();
            document.getElementById('boarding_address_lng').value = place.geometry.location.lng();


        });

    }


    google.maps.event.addDomListener(window, 'load', initialize);



</script>
<script type="text/javascript">
 function getCity(value,model=''){
        var selected = '';
        $.ajax({
            url: "{{ route('getCity') }}",
            type:  'GET',
            data: {
                'service_location_id': value,
            },
            success: function(result)
            {
                $('#city_id').empty();
                $("#city_id").append('<option value="" selected disabled>Select</option>');
                result.forEach(element => {

                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#city_id").append('<option value='+element.id+' '+selected+'>'+element.city+'</option>')
                });
                $('#city_id').select();
            }
        });
        // alert("count==="+count);
    }

    $(document).on('change','#service_location_id',function(){

        // alert($(this).val());
        getCity($(this).val());
    });
</script> --}}

<script src="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

<script src="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

<!-- form wizard init -->
<script src="{{ asset('taxi/assets/js/form-wizard.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
 <!-- bootstrap time picker -->
 </script>
 <script>
    var boarding_expt_array = [];
    var dropping_expt_array = [];


        $(document).on("click",".add_row",function(){
            var table = document.getElementById("table");

            if($('.add_row').length < 20){
                var append_row = "";
                var tableLength = table.rows.length;
            var tableRowCount = tableLength-1;

            var boarding = 1;


            var pointHtml = "";
             for (var i = 0; i < boarding.length; i++)
             {
                    if (boarding_expt_array.indexOf(boarding[i].id) !== -1) {
                    }
                    else{
                        pointHtml += '<option value="'+boarding[i].id +'">'+boarding[i].boarding_address+'</option>';
                    }


            }

              append_row +='<tr class="add_new_row select_row inactv">';
                append_row += '<td>\
                    <div class="form-group">\
                      <input type="text" name="boarding_points[][address]" id="boarding_points" class="form-control boarding_point_input" placeholder="@lang('view_pages.boarding_point_droping_point')" required>\
                        </div>\
                    </td>';
                append_row +='<td>\
                                    <div class="form-group">\
                                        <button type="button" class="btn btn-success btn-sm add_row"> + </button>\
                                        <button type="button" class="btn btn-danger btn-sm remove_row"> - </button>\
                                    </div>\
                                </td>\
                        </tr>';
            $(".append_row").append(append_row);
                $(".select2").select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                    selectOnClose: true,
                    placeholder: "select a day",
                    allowClear: true
                })
            }
            else{
                alert("Selected every boarding points");
            }

        });


        $(document).on("click",".remove_row",function(){
            var value = $(this).closest("tr.select_row").find(".boarding_point_select").val();
            var text = $(this).closest("tr.select_row").find(".boarding_point_select option[value="+value+"]").text();
             $("tr.select_row").find(".boarding_point_select").append('<option value="'+value+'">'+text+'</option>');
            new_array_data = boarding_expt_array.filter(function(element) {
            return element !== value;
            });
            boarding_expt_array = new_array_data;
            $(this).closest("tr").remove();
        });

        $(document).on("click",".add_drop_row",function(){
            dropping = window.dropping;
            var table = document.getElementById("table_drop_points");
            if($('.add_drop_row').length <= window.dropping.length){
                var append_drop_row = "";
                var tableLength = table.rows.length;
            var tableRowCount = tableLength-1;

            var dropping = window.dropping;

            var pointHtml = "";
             for (var i = 0; i < dropping.length; i++)
             {
                    if (dropping_expt_array.indexOf(dropping[i].id) !== -1) {
                    }
                    else{
                        pointHtml += '<option value="'+dropping[i].id +'">'+dropping[i].boarding_address+'</option>';
                    }


            }

            append_drop_row +='<tr class="add_drop_new_row select_drop_row inactv">';
            append_drop_row +='<tr class="add_drop_new_row select_drop_row inactv">';
            append_drop_row += '<td>\
                    <div class="form-group">\
                      <select name="drop_point[]" id="drop_point" class="form-control drop_point_select" required>\
                      ' +pointHtml+ ', \
                      <option selected disabled>Select Drop Point</option>\
                        </select>\
                        </div>\
                    </td>';

            append_drop_row += '<td>\
                                <div class="bootstrap-timepicker">\
                                            <div class="form-group">\
                                                <div class="input-group">\
                                                    <div class="input-group-addon">\
                                                     <i class="fa fa-clock-o"></i>\
                                                    </div>\
                                                    <input type="time" name="droping_time[]" value="{{old('droping_time.0')}}" class="droping_time form-control">\
                                                </div>\
                                                <span class="text-danger">{{ $errors->first('droping_time') }}</span>\
                                            </div>\
                                        </div>\
                                    </td>';
                                    append_drop_row +='<td>\
                                    <div class="form-group">\
                                        <button type="button" class="btn btn-success btn-sm add_drop_row"> + </button>\
                                        <button type="button" class="btn btn-danger btn-sm remove_drop_row"> - </button>\
                                    </div>\
                                </td>\
                        </tr>';
        $(".append_drop_row").append(append_drop_row);
                $(".select2").select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                    selectOnClose: true,
                    placeholder: "select a day",
                    allowClear: true
                });
            }
            else{
                alert("Selected every drop points");
            }

        });


        $(document).on("click",".remove_drop_row",function(){
            var value = $(this).closest("tr.select_drop_row").find(".drop_point_select").val();
            var text = $(this).closest("tr.select_drop_row").find(".drop_point_select option[value="+value+"]").text();
             $("tr.select_drop_row").find(".drop_point_select").append('<option value="'+value+'">'+text+'</option>');
            new_drop_array_data = dropping_expt_array.filter(function(element) {
            return element !== value;
            });
            dropping_expt_array = new_drop_array_data;
            $(this).closest("tr").remove();

        });



</script>



@endsection
