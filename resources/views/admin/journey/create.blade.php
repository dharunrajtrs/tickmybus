@extends('admin.layouts.app')

@section('content')

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
<div class="row p-0 m-0">
<div class="col-12">
<div class="page-title-box d-flex align-items-center justify-content-between">
<h4 class="mb-0 font-size-18">@lang('view_pages.add_journey')</h4>

<div class="page-title-right">
<ol class="breadcrumb m-0">
</li>
<li class="breadcrumb-item active">@lang('view_pages.add_journey')</li>
</ol>
</div>
</div>
</div>
</div>

<div class="row p-0 m-0">
<div class="col-12">
<div class="card">
<div class="card-body">
    <span class="text-danger iban_err"></span>
<form method="post" action="{{ url('journey/store') }}" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
{{-- <h4 class="card-title mb-4">Basic pills Wizard
</h4> --}}

<div id="basic-pills-wizard" class="twitter-bs-wizard">
<ul class="twitter-bs-wizard-nav">
<li class="nav-item">
<a href="#journeydetails" class="nav-link" data-toggle="tab">
<span class="step-number mr-2">01</span>
@lang('view_pages.journeydetails')
</a>
</li>
<li class="nav-item">
<a href="#boarding_points" class="nav-link" data-toggle="tab">
<span class="step-number mr-2">02</span>
@lang('view_pages.boarding_points')
</a>
</li>

<li class="nav-item">
<a href="#drop_points" class="nav-link" data-toggle="tab">
<span class="step-number mr-2">03</span>
@lang('view_pages.drop_points')
</a>
</li>
</ul>
<div class="tab-content twitter-bs-wizard-tab-content">

<div class="tab-pane" id="journeydetails">
                        <div class="row">
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                     <label for="service_location_id" class="">@lang('view_pages.select_boarding_area') <sup>*</sup></label>
                                            <select name="service_location_id" id="service_location_id" class="form-control" required>
                                            <option value="" selected disabled >@lang('view_pages.select_boarding_area')</option>
                                            @foreach($services as $key=>$service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                    </div> --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.schedule_name') <span class="text-danger">*(eg:Chennai to Coimbatore)</span></label>
                                            <input class="form-control" type="text" id="schedule_name" name="schedule_name"
                                                value="{{ old('schedule_name') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.schedule_name')">
                                            <span class="text-danger">{{ $errors->first('schedule_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.display_name') <span class="text-danger">*(eg:CSK to CBT)</span></label>
                                            <input class="form-control" type="text" id="display_name" name="display_name"
                                                value="{{ old('display_name') }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.display_name')">
                                            <span class="text-danger">{{ $errors->first('display_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 float-left mb-md-3">
                                      <div class="form-group">
                                        <label for="fleet_id">@lang('view_pages.select_bus')
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="fleet_id" id="fleet_id" class="form-control" required>
                                            <option value="" selected disabled>@lang('view_pages.select_bus')</option>
                                            @foreach($fleets as $key=>$fleet)
                                            <option value="{{$fleet->id}}" {{ old('fleet_id') == $fleet->id ? 'selected' : '' }}>{{$fleet->license_number}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        </div>




                           </div>
                <div class="row">
                 <div class="col-lg-6" id="seater" style="display: none">
                    <div class="form-group">
                        <label for="seater_price">@lang('view_pages.seater_price') <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="seater_price" name="seater_price" value="{{old('seater_price')}}" placeholder="@lang('view_pages.enter_seater_price')">
                        <span class="text-danger">{{ $errors->first('seater_price') }}</span>
                    </div>
                </div>

                <div class="col-lg-6" id="upper_seat" style="display: none">
                    <div class="form-group">
                        <label for="upper_seater_price">@lang('view_pages.upper_seater_price') <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="upper_seater_price" name="upper_seater_price" value="{{old('upper_seater_price')}}" placeholder="@lang('view_pages.enter_upper_seater_price')">
                        <span class="text-danger">{{ $errors->first('upper_seater_price') }}</span>
                    </div>
                </div>

                <div class="col-lg-6" id="sleeper" style="display: none">
                    <div class="form-group">
                        <label for="sleeper_price">@lang('view_pages.sleeper_price') <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="sleeper_price" name="sleeper_price" value="{{old('sleeper_price')}}" placeholder="@lang('view_pages.enter_sleeper_price')">
                        <span class="text-danger">{{ $errors->first('sleeper_price') }}</span>
                    </div>
                </div>

                <div class="col-lg-6" id="upper_sleeper_seat" style="display: none">
                    <div class="form-group">
                        <label for="upper_sleeper_price">@lang('view_pages.upper_sleeper_price') <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="upper_sleeper_price" name="upper_sleeper_price" value="{{old('upper_sleeper_price')}}" placeholder="@lang('view_pages.enter_upper_sleeper_price')">
                        <span class="text-danger">{{ $errors->first('upper_sleeper_price') }}</span>
                    </div>
                </div>

                <div class="col-lg-6" id="semi_sleeper" style="display: none">
                    <div class="form-group">
                        <label for="semi_sleeper_price">@lang('view_pages.semi_sleeper_price') <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="semi_sleeper_price" name="semi_sleeper_price" value="{{old('semi_sleeper_price')}}"  placeholder="@lang('view_pages.enter_semi_sleeper_price')">
                        <span class="text-danger">{{ $errors->first('semi_sleeper_price') }}</span>
                    </div>
                </div>

                <div class="col-lg-6" id="upper_semi_sleeper" style="display: none">
                    <div class="form-group">
                        <label for="upper_semi_sleeper_price">@lang('view_pages.upper_semi_sleeper_price') <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="upper_semi_sleeper_price" name="upper_semi_sleeper_price" value="{{old('upper_semi_sleeper_price')}}"  placeholder="@lang('view_pages.enter_upper_semi_sleeper_price')">
                        <span class="text-danger">{{ $errors->first('upper_semi_sleeper_price') }}</span>
                    </div>
                </div>
            </div>
{{-- <div
class="col-12 btn-group mt-3">
<ul class="admin-add-btn">
<li>
<button type="submit"
class="btn btn-primary mr-1 waves-effect waves-light">{{ trans('view_pages.create') }}</button>
</li>
</ul>
</div> --}}
<ul class="pager wizard twitter-bs-wizard-pager-link">
<!-- <li class="previous"><a href="#">@lang('view_pages.previous')</a></li> -->
<li class="next"><a href="#">@lang('view_pages.next')</a></li>
</ul>
</div>
<div class="tab-pane" id="boarding_points">
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
                <label for="from_city_id" class="">@lang('view_pages.from') <sup>*</sup></label>
                <select name="from_city_id" id="from_city_id" class="form-control" required>
                    <option value="" >@lang('view_pages.from')</option>
                    @foreach($cities2 as $key=>$cities)
                    <option value="{{$cities->id}}">{{$cities->name}}</option>
                    @endforeach
                </select>
            <span class="text-danger">{{ $errors->first('from_city_id') }}</span>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="bootstrap-timepicker">
            <div class="form-group">
               <label for="depature_at">@lang('view_pages.depature_at') <span
                        class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="datetime-local" name="depature_at" value="{{ old('depature_at') }}" class="form-control">
                </div>
                <span class="text-danger">{{ $errors->first('depature_at') }}</span>
            </div>
        </div>
        </div>
    </div>
            <table class="table surgeTable" id="table">
                <thead>
                    <th> @lang('view_pages.boarding_point') <span class="text-danger">*</span></th>
                    <th>@lang('view_pages.time') <span class="text-danger">*</span></th>
                    <th style="width:100px;">@lang('view_pages.action')</th>
                </thead>
             <tbody class="append_row">
                <tr class="default_select select_row actv">
                    <td>
                    <div class="form-group">
                            <select name="boarding_point[]" id="boarding_point" class="form-control boarding_point_select" required>
                                <option value="" >@lang('view_pages.select_boarding_point')</option>
                            </select>
                        </div>
                    </td>
                    <td>
                <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="time" name="boarding_time[]" value="{{old('boarding_time.0')}}" class="boarding_time form-control">
                                </div>
                                <span class="text-danger">{{ $errors->first('boarding_time') }}</span>
                            </div>
                        </div>
                        </td>
                        <td>
                        <div class="col-sm-4 float-left mb-md-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                 </div>
                        </div>
                    </td>
                </tr>
         </tbody>

{{-- <div class="col-12 btn-group mt-3">
<ul class="admin-add-btn">
<li>
<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">{{ trans('view_pages.create') }}</button>
</li>
</ul>
</div> --}}
<!-- </div> -->
</table>
<ul class="pager wizard twitter-bs-wizard-pager-link">
<li class="previous"><a href="#">@lang('view_pages.previous')</a></li>
<li class="next"><a href="#">@lang('view_pages.next')</a></li>
</ul>
</div>

<!-- drop points start -->
<div class="tab-pane" id="drop_points">
    <div class="row">
    <div class="col-sm-6">
        <div class="form-group">
                <label for="to_city_id" class="">@lang('view_pages.to') <sup>*</sup></label>
                <select name="to_city_id" id="to_city_id" class="form-control" required>
                    <option value="" >@lang('view_pages.to')</option>
                    @foreach($cities2 as $key=>$cities)
                    <option value="{{$cities->id}}">{{$cities->name}}</option>
                    @endforeach
                </select>
            <span class="text-danger">{{ $errors->first('to_city_id') }}</span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="bootstrap-timepicker">
            <div class="form-group">
               <label for="arrived_at">@lang('view_pages.arrived_at') <span
                        class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="datetime-local" name="arrived_at" value="{{ old('arrived_at') }}" class="form-control">
                </div>
                <span class="text-danger">{{ $errors->first('arrived_at') }}</span>
            </div>
         </div>
    </div>
</div>
 <table class="table surgeTable" id="table_drop_points">
                <thead>
                    <th> @lang('view_pages.drop_points') <span class="text-danger">*</span></th>
                    <th>@lang('view_pages.time') <span class="text-danger">*</span></th>
                    <th style="width:100px;">@lang('view_pages.action')</th>
                </thead>
             <tbody class="append_drop_row">
                <tr class="default_select select_drop_row actv">
                    <td>
                    <div class="form-group">
                            <select name="drop_point[]" id="drop_point" class="form-control drop_point_select" required>
                                <option value="" >@lang('view_pages.select_drop_points')</option>
                            </select>
                        </div>
                    </td>
                    <td>
                <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                     <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="time" name="droping_time[]" value="{{old('droping_time.0')}}" class="droping_time form-control">
                                </div>
                                <span class="text-danger">{{ $errors->first('droping_time') }}</span>
                            </div>
                        </div>
                        </td>
                        <td>
                        <div class="col-sm-4 float-left mb-md-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm add_drop_row"> + </button>
                                 </div>
                        </div>
                    </td>
                </tr>
         </tbody>

<div class="col-12 btn-group mt-3">

</table>
<ul class="pager wizard twitter-bs-wizard-pager-link">
<li class="previous"><a href="#">@lang('view_pages.previous')</a></li>
<!-- <li class="next"><a href="#">@lang('view_pages.next')</a></li> -->
</ul><br>
<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light pull-right">{{ trans('view_pages.create') }}</button>
<ul class="admin-add-btn">

</ul>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- twitter-bootstrap-wizard js -->
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

            if($('.add_row').length < window.boarding.length){
                var append_row = "";
                var tableLength = table.rows.length;
            var tableRowCount = tableLength-1;

            var boarding = window.boarding;


            var pointHtml = "";
             for (var i = 0; i < boarding.length; i++)
             {
                    if (boarding_expt_array.indexOf(boarding[i].id) !== -1) {
                    }
                    else{
                        pointHtml += '<option value="'+boarding[i].id +'">'+boarding[i].boarding_droping_point_address+'</option>';
                    }


            }

              append_row +='<tr class="add_new_row select_row inactv">';
                append_row += '<td>\
                    <div class="form-group">\
                      <select name="boarding_point[]" id="boarding_point" class="form-control boarding_point_select" required>\
                      <option selected disabled>Select Boarding Point</option>\
                      ' +pointHtml+ '\
                            </select>\
                        </div>\
                    </td>';
                append_row += '<td>\
                                <div class="bootstrap-timepicker">\
                                            <div class="form-group">\
                                                <div class="input-group">\
                                                    <div class="input-group-addon">\
                                                     <i class="fa fa-clock-o"></i>\
                                                    </div>\
                                                    <input type="time" name="boarding_time[]" value="{{old('boarding_time.0')}}" class="boarding_time form-control">\
                                                </div>\
                                                <span class="text-danger">{{ $errors->first('boarding_time') }}</span>\
                                            </div>\
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
                        pointHtml += '<option value="'+dropping[i].id +'">'+dropping[i].boarding_droping_point_address+'</option>';
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



<script>
$(document).ready(function() {
$(document).on('change', '.btn-file :file', function() {
var input = $(this),
label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
input.trigger('fileselect', [label]);
});

$('.btn-file :file').on('fileselect', function(event, label) {

var input = $(this).parents('.input-group').find(':text'),
log = label;

if (input.length) {
input.val(log);
} else {
if (log) alert(log);
}

});

function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function(e) {
$(input).closest('div').parent().find('.img-upload').attr('src', e.target.result);
}

reader.readAsDataURL(input.files[0]);
}
}

$(".imgInp").change(function() {
readURL(this);
});
});

var err = false;

$(".date-pick").datepicker({
autoclose: true,
todayHighlight: true,
format: 'yyyy-mm-dd',
startDate: '0'
});

$(document).on('blur keypress', '#iban', function(e) {
var iban = $(this).val();

if (e.type == 'keypress') {
$('.iban_err').text('');
} else {
$.ajax({
url: "{{ url('api/v1/iban-validation') }}",
data: {
iban: iban
},
method: 'post',
success: function(response) {
if (response.success == false) {
$('.iban_err').text('Provide valid IBAN');
$("#bank_name").val('');
$("#bic").val('');
err = true;
return false;
} else {
var bic = response.data.bank_code.bic;
var bank_name = response.data.bank_code.bank_name;
err = false;
$('.iban_err').text('');
$("#bank_name").val(bank_name);
$("#bic").val(bic);
}
}
});
}
});

$('form').on('submit', function(event) {
event.preventDefault();
if (err) {
$('.iban_err').text('Provide valid IBAN');
return false;
} else {
$('.iban_err').text('');
this.submit();
}
});

</script>
 <script>
    /select/
        $(document).ready(function() {
            $(".select2").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                selectOnClose: true,
                placeholder: "select a day",
                allowClear: true
            })
        });
        $('.datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          startDate: 'today'
        });

    function getFleet(value,fleet=''){

        var selected = '';

        $.ajax({
            url: "{{ route('getFleet') }}",
            type:  'GET',
            data: {
                'fleet': value,
            },
        success: function(result) {
            var seatTypes = result.seatTypeExists;
            var upperSeatTypes = result.upperSeatTypeExists;

            $("#seater").toggle(seatTypes.includes('seater'));
            $("#sleeper").toggle(seatTypes.includes('sleeper'));
            $("#semi_sleeper").toggle(seatTypes.includes('semi_sleeper'));

            $("#upper_seat").toggle(upperSeatTypes.includes('seater'));
            $("#upper_sleeper_seat").toggle(upperSeatTypes.includes('sleeper'));
            $("#upper_semi_sleeper").toggle(upperSeatTypes.includes('semi_sleeper'));
           }

        });
    }

    $(document).on('change','#fleet_id',function(){
        getFleet($(this).val());

    });

    $(document).on("change","#boarding_point",function(){
            var value = $(this).val();
            $("tr.select_row").removeClass("actv");
            $("tr.select_row").removeClass("inactv");
            $("tr.select_row").addClass("inactv");
            this_dt = $(this);
            $(this).closest("tr.select_row").addClass("actv");
            $(this).closest("tr.select_row").removeClass("inactv");
            boarding_expt_array = [];
           $("tr.select_row").each(function(){
            var selected_value = $(this).find(".boarding_point_select").val();
            boarding_expt_array.push(selected_value);

            if(selected_value === this_dt.closest("tr.select_row").find(".boarding_point_select").val())
            {
                $("tr.select_row.inactv").find(".boarding_point_select option[value='"+selected_value+"']").remove();
            }

           })


    });


    $(document).on("change","#drop_point",function(){
            var value = $(this).val();
            $("tr.select_drop_row").removeClass("actv");
            $("tr.select_drop_row").removeClass("inactv");
            $("tr.select_drop_row").addClass("inactv");
            this_dt = $(this);
            $(this).closest("tr.select_drop_row").addClass("actv");
            $(this).closest("tr.select_drop_row").removeClass("inactv");
            dropping_expt_array = [];
           $("tr.select_drop_row").each(function(){
            var selected_drop_value = $(this).find(".drop_point_select").val();
            dropping_expt_array.push(selected_drop_value);

            if(selected_drop_value === this_dt.closest("tr.select_drop_row").find(".drop_point_select").val())
            {
                $("tr.select_drop_row.inactv").find(".drop_point_select option[value='"+selected_drop_value+"']").remove();
            }

           })


    });

</script>


<script type="text/javascript">
function getBoarding(value,model=''){
        var selected = '';

        // alert(value);
        $.ajax({
            url: "{{ route('getPoint') }}",
            type:  'GET',
            data: {
                'city_id': value,
            },
            success: function(result)
            {
                window.boarding = result;
                $('#boarding_point').empty();

                $.each(result, function(key, value) {
                var selected ='';
                if(key == 0)
                {
                    selected ='selected';
                     boarding_expt_array.push(value.id);
                }
                $("#boarding_point").append('<option value='+value.id+' '+selected+'>'+value.boarding_droping_point_address+'</option>')
                });
                // $("#boarding_point").append('<option value="" selected disabled>Select Boarding Point</option>');
                // result.forEach(element => {

                //     if(model == element.id){
                //         selected = 'selected';
                //     }else{
                //         selected='';
                //     }

                //     $("#boarding_point").append('<option value='+element.id+' '+selected+'>'+element.boarding_address+'</option>')
                // });
                $('#boarding_point').select();
                $(".add_new_row").empty();
            }
        });
        // alert("count==="+count);
    }

/getDroping/

function getDroping(value,model=''){
        var selected = '';

        $.ajax({
            url: "{{ route('getPoint') }}",
            type:  'GET',
            data: {
                'city_id': value,
            },
            success: function(result)
            {
                window.dropping = result;
                $('#drop_point').empty();
                $.each(result, function(key, value) {
                var selected ='';
                if(key == 0)
                {
                    selected ='selected';
                    dropping_expt_array.push(value.id);
                }
                $("#drop_point").append('<option value='+value.id+' '+selected+'>'+value.boarding_droping_point_address +'</option>')
                });
                // $("#drop_point").append('<option value="" selected disabled>Select Drop Point</option>');
                // result.forEach(element => {

                //     if(model == element.id){
                //         selected = 'selected';
                //     }else{
                //         selected='';
                //     }

                //     $("#drop_point").append('<option value='+element.id+' '+selected+'>'+element.boarding_address+'</option>')
                // });
                // $('#drop_point').select();
                $('#drop_point').select();
                $(".add_drop_new_row").empty();
            }
        });
        // alert("count==="+count);
    }

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
                $('#from_city_id').empty();
                $("#from_city_id").append('<option value="" selected disabled>Select</option>');
                result.forEach(element => {

                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#from_city_id").append('<option value='+element.id+' '+selected+'>'+element.city+'</option>')
                });
                $('#from_city_id').select();

                // $('#to_city_id').empty();
                // $("#to_city_id").append('<option value="" selected disabled>Select</option>');
                // result.forEach(element => {

                //     if(model == element.id){
                //         selected = 'selected';
                //     }else{
                //         selected='';
                //     }

                //     $("#to_city_id").append('<option value='+element.id+' '+selected+'>'+element.city+'</option>')
                // });
                // $('#to_city_id').select();
            }
        });
        // alert("count==="+count);
    }
    function getToCity(value, selectedFromCity, model) {
    $.ajax({
        url: "{{ route('getCity') }}",
        type: 'GET',
        data: {
            'city_id': value,
        },
        success: function(result) {
            $('#to_city_id').empty();
            $("#to_city_id").append('<option value="" selected disabled>Select</option>');
            result.forEach(element => {
                var selected = '';
                if (selectedFromCity && selectedFromCity == element.id) {
                    return;
                }
                if (model && model == element.id) {
                    selected = 'selected';
                }
                $("#to_city_id").append('<option value=' + element.id + ' ' + selected + '>' + element.city + '</option>');
            });
            $('#to_city_id').select();
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
            // Handle the error condition, if needed
        }
    });
}
$(document).on('change', '#service_location_id', function () {
    getCity($(this).val());
});
$(document).on('change', '#from_city_id', function () {
    var selectedFromCity = $(this).val();
    var selectedModel = $('#from_city_id option:selected').val();
    getToCity($('#service_location_id').val(), selectedFromCity, selectedModel);
    getBoarding(selectedFromCity);
});
$(document).on('change', '#to_city_id', function () {
    getDroping($(this).val());
});

</script>

@endsection
