@extends('admin.layouts.app')

@section('content')

<!-- twitter-bootstrap-wizard css -->
<link rel="stylesheet" href="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
<!-- App Css-->
<link href="{{ asset('taxi/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
type="text/css" />
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
<form method="post" action="{{ url('journey/update', $item->id) }}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{$item->id}}">
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                     <label for="service_location_id" class="">@lang('view_pages.select_area') <sup>*</sup></label>
                                            <select name="service_location_id" id="service_location_id" class="form-control" required>
                                            <option value="" >@lang('view_pages.select_area')</option>
                                                 @foreach($services as $key=>$service)
                                                    <option value="{{$service->id}}" {{ old('service_location_id',$item->service_location_id) == $service->id ? 'selected' : '' }}>{{$service->name}}</option>
                                                    @endforeach
                                        </select>
                                     </div>
                                    </div>
                                    <div class="col-sm-6 float-left mb-md-3">
                                      <div class="form-group">
                                        <label for="fleet_id">@lang('view_pages.select_bus')
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select name="fleet_id" id="fleet_id" class="form-control" required>
                                            <option value="" selected disabled>@lang('view_pages.select_bus')</option>
                                                @foreach($fleets as $key=>$fleet)
                                                <option value="{{$fleet->id}}" {{ old('fleet_id',$item->fleet_id) == $fleet->id ? 'selected' : '' }}>{{$fleet->license_number}}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                        </div>
                                 <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="from_city_id" class="">@lang('view_pages.from') <sup>*</sup></label>
                                                <select name="from_city_id" id="from_city_id" class="form-control">
                                                <option value="" selected disabled>@lang('view_pages.from')</option>
                                                @foreach($cities as $key=>$city)
                                                <option value="{{$city->id}}" {{ old('from_city_id',$item->from_city_id) == $city->id ? 'selected' : '' }}>{{$city->city}}</option>
                                                @endforeach
                                                </select>
                                            <span class="text-danger">{{ $errors->first('from_city_id') }}</span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="to_city_id" class="">@lang('view_pages.to') <sup>*</sup></label>
                                                <select name="to_city_id" id="to_city_id" class="form-control">
                                                <option value="" selected disabled>@lang('view_pages.to')</option>
                                                @foreach($cities as $key=>$city)
                                                <option value="{{$city->id}}" {{ old('to_city_id',$item->to_city_id) == $city->id ? 'selected' : '' }}>{{$city->city}}</option>
                                                @endforeach
                                                </select>
                                            <span class="text-danger">{{ $errors->first('to_city_id') }}</span>
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
                                               <input type="datetime-local" name="depature_at" value="{{ old('depature_at',$item->depature_at) }}" class="form-control">
                                            </div>
                                            <span class="text-danger">{{ $errors->first('depature_at') }}</span>
                                        </div>
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
                                             <input type="datetime-local" name="arrived_at" value="{{ old('arrived_at',$item->arrived_at) }}" class="form-control">                           
                                           </div>
                                            <span class="text-danger">{{ $errors->first('arrived_at') }}</span>
                                        </div>
                                     </div>
                                </div>
                           </div>  
                        <div class="row">
                             <div class="col-lg-6" id="seater" style="display: none">
                                <div class="form-group">
                                    <label for="seater_price">@lang('view_pages.seater_price') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="seater_price" name="seater_price" value="{{old('seater_price', $item->seater_price)}}" placeholder="@lang('view_pages.enter_seater_price')">
                                    <span class="text-danger">{{ $errors->first('seater_price') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6" id="upper_seat" style="display: none">
                                <div class="form-group">
                                    <label for="upper_seater_price">@lang('view_pages.upper_seater_price') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="upper_seater_price" name="upper_seater_price" value="{{old('upper_seater_price',$item->upper_seater_price)}}" placeholder="@lang('view_pages.enter_upper_seater_price')">
                                    <span class="text-danger">{{ $errors->first('upper_seater_price') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6" id="sleeper" style="display: none">
                                <div class="form-group">
                                    <label for="sleeper_price">@lang('view_pages.sleeper_price') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="sleeper_price" name="sleeper_price" value="{{old('sleeper_price', $item->sleeper_price)}}" placeholder="@lang('view_pages.enter_sleeper_price')">
                                    <span class="text-danger">{{ $errors->first('sleeper_price') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6" id="upper_sleeper_seat" style="display: none">
                                <div class="form-group">
                                    <label for="upper_sleeper_price">@lang('view_pages.upper_sleeper_price') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="upper_sleeper_price" name="upper_sleeper_price" value="{{old('upper_sleeper_price', $item->upper_sleeper_price)}}" placeholder="@lang('view_pages.enter_upper_sleeper_price')">
                                    <span class="text-danger">{{ $errors->first('upper_sleeper_price') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6" id="semi_sleeper" style="display: none">
                                <div class="form-group">
                                    <label for="semi_sleeper_price">@lang('view_pages.semi_sleeper_price') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="semi_sleeper_price" name="semi_sleeper_price" value="{{old('semi_sleeper_price', $item->semi_sleeper_price)}}"  placeholder="@lang('view_pages.enter_semi_sleeper_price')">
                                    <span class="text-danger">{{ $errors->first('semi_sleeper_price') }}</span>
                                </div>
                            </div>

                            <div class="col-lg-6" id="upper_semi_sleeper" style="display: none">
                                <div class="form-group">
                                    <label for="upper_semi_sleeper_price">@lang('view_pages.upper_semi_sleeper_price') <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="upper_semi_sleeper_price" name="upper_semi_sleeper_price" value="{{old('upper_semi_sleeper_price', $item->upper_semi_sleeper_price)}}"  placeholder="@lang('view_pages.enter_upper_semi_sleeper_price')">
                                    <span class="text-danger">{{ $errors->first('upper_semi_sleeper_price') }}</span>
                                </div>
                            </div>
                        </div>
{{-- <div
class="col-12 btn-group mt-3">
<ul class="admin-add-btn">
<li>
<button type="submit"
class="btn btn-primary mr-1 waves-effect waves-light">{{ trans('view_pages.update') }}</button>
</li>
</ul>
</div> --}}
<ul class="pager wizard twitter-bs-wizard-pager-link">
<!-- <li class="previous"><a href="#">@lang('view_pages.previous')</a></li> -->
<li class="next"><a href="#">@lang('view_pages.next')</a></li>
</ul>
</div>
<div class="tab-pane" id="boarding_points">
            <table class="table surgeTable" id="table">
                <thead>
                    <th> @lang('view_pages.boarding_point') <span class="text-danger">*</span></th>
                    <th>@lang('view_pages.time') <span class="text-danger">*</span></th>
                    <th style="width:100px;">@lang('view_pages.action')</th>
                </thead>
             <tbody class="append_row">
             @foreach ($item->journeyBoardingPoint as $k => $point)
                <tr>
                    <td>
                    <div class="form-group">
                            <select name="boarding_point[]" @if($k == 0)  id="boarding_point" @endif class="form-control" required>
                            <!-- <option value="" >@lang('view_pages.select_boarding_point')</option> -->
                                @foreach ($boarding as $board_key=> $boardpoint)
                                <option value="{{$boardpoint->id}}" {{ $boardpoint->id == $point->boarding_id ? 'selected' : '' }}>{{$boardpoint->boarding_address}}</option>
                                @endforeach
                               
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
                                    <input type="time" name="boarding_time[]" value="{{ old('boarding_time.'.$k,$point->boarding_time) }}" class="boarding_time form-control">
                                </div>
                                <span class="text-danger">{{ $errors->first('boarding_time') }}</span>
                            </div>
                        </div>
                        </td>
                        <td>
                        <div class="col-sm-4 float-left mb-md-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                    @if($k>0)<button type="button" class="btn btn-danger btn-sm remove_row"> - </button>@endif
                                 </div>

                        </div>
                    </td>
                </tr>
            @endforeach
         </tbody>

{{-- <div class="col-12 btn-group mt-3">
<ul class="admin-add-btn">
<li>
<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">{{ trans('view_pages.update') }}</button>
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
<div class="tab-pane" id="drop_points">

    
 <table class="table surgeTable" id="table_drop_points">
                <thead>
                    <th> @lang('view_pages.drop_points') <span class="text-danger">*</span></th>
                    <th>@lang('view_pages.time') <span class="text-danger">*</span></th>
                    <th style="width:100px;">@lang('view_pages.action')</th>
                </thead>
             <tbody class="append_drop_row">
             @foreach ($item->journeyStopPoint as $k => $Spoint)
                <tr>
                    <td>
                    <div class="form-group">
                            <select name="drop_point[]"  id="drop_point" class="form-control" required>
                                <!-- <option value="" >@lang('view_pages.select_drop_points')</option> -->
                                @foreach ($dropping as $board_key=> $droppoint)
                                <option value="{{$droppoint->id}}" {{ $droppoint->id == $Spoint->stop_id ? 'selected' : '' }}>{{$droppoint->boarding_address}}</option>
                                @endforeach
                                 <!-- <option value="{{$Spoint->stop_id}}" {{ old('boarding_point',$Spoint->stop_id) == $Spoint->stop_id ? 'selected' : '' }}>{{$Spoint->stopPoint->boarding_address}}</option> -->
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
                                       <input type="time" name="droping_time[]" value="{{ old('droping_time.'.$k,$Spoint->stop_time) }}" class="droping_time form-control">
                                </div>
                                <span class="text-danger">{{ $errors->first('droping_time') }}</span>
                            </div>
                          </div>
                        </td>
                        <td>
                        <div class="col-sm-4 float-left mb-md-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm add_drop_row"> + </button>
                                    @if($k>0)<button type="button" class="btn btn-danger btn-sm remove_row"> - </button>@endif
                                 </div>
                        </div>
                    </td>
                </tr>
            @endforeach
         </tbody>

<div class="col-12 btn-group mt-3">

</table>
<ul class="pager wizard twitter-bs-wizard-pager-link">
<li class="previous"><a href="#">@lang('view_pages.previous')</a></li>
<!-- <li class="next"><a href="#">@lang('view_pages.next')</a></li>ss -->
</ul><br>
<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light pull-right">{{ trans('view_pages.update') }}</button>
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
<ul class="pager wizard twitter-bs-wizard-pager-link">
<li class="previous"><a href="#">@lang('view_pages.previous')</a></li>
<li class="next"><a href="#">@lang('view_pages.next')</a></li>
</ul>
<!-- twitter-bootstrap-wizard js -->
<script src="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

<script src="{{ asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

<!-- form wizard init -->
<script src="{{ asset('taxi/assets/js/form-wizard.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
 </script>
<script>
$(document).ready(function() {
    $(document).on("click", ".add_row", function() {
    var table = document.getElementById("table");
    if ($('.add_row').length <= 6) {
        var append_row = "";
        var tableLength = table.rows.length;
        var tableRowCount = tableLength - 1;

        // Ensure window.boarding is populated before calling getBoardingOptions
        var pointHtml = getBoardingOptions(window.boarding);

        append_row += '<tr>';
        append_row += '<td>\
            <div class="form-group">\
                <select name="boarding_point[]" class="form-control" required>\
                    ' + pointHtml + '\
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
                        <input type="time" name="boarding_time[]" class="boarding_time form-control">\
                    </div>\
                    <span class="text-danger">{{ $errors->first('boarding_time') }}</span>\
                </div>\
            </div>\
        </td>';
        append_row += '<td>\
            <div class="form-group">\
                <button type="button" class="btn btn-success btn-sm add_row"> + </button>\
                <button type="button" class="btn btn-danger btn-sm remove_row"> - </button>\
            </div>\
        </td>';
        append_row += '</tr>';

        $(".append_row").append(append_row);
    }
});

// Event listener for removing rows dynamically
$(document).on("click", ".remove_row", function() {
    $(this).closest("tr").remove();
});

function getBoardingOptions(boarding) {
    if (typeof boarding === 'undefined') {
        console.error("Boarding points data is undefined.");
        return '<option value="">Boarding points not available</option>';
    }
    
    console.log("Boarding data received:", boarding);
    
    var pointHtml = "";
    if (boarding!=0) {
        for (var i = 0; i < boarding.length; i++) {
            pointHtml += '<option value="' + boarding[i].id + '">' + boarding[i].boarding_address + '</option>';
        }
    } else {
        console.error("Boarding points data is not in the correct format.");
        pointHtml += '<option value="">Boarding points not available</option>';
    }
    
    console.log("Generated HTML:", pointHtml); 
    return pointHtml;
}




    $(document).on("click", ".add_drop_row", function() {
        var table = document.getElementById("table_drop_points");

        if ($('.add_drop_row').length <= 6) {
            var append_row = "";
            var tableLength = table.rows.length;
            var tableRowCount = tableLength - 1;

            var boarding = window.boarding;
            var pointHtml = "";
            for (var i = 0; i < boarding.length; i++) {
                pointHtml += '<option value="' + boarding[i].id + '">' + boarding[i].boarding_address + '</option>';
            }

            append_row += '<tr>';
            append_row += '<td>\
                <div class="form-group">\
                    <select name="drop_point[]" class="form-control" required>\
                        ' + pointHtml + '\
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
                            <input type="time" name="droping_time[]" value="{{ old('droping_time.'.$k,$Spoint->stop_time) }}" class="droping_time form-control">\
                        </div>\
                        <span class="text-danger">{{ $errors->first('droping_time') }}</span>\
                    </div>\
                </div>\
            </td>';
            append_row += '<td>\
                <div class="form-group">\
                    <button type="button" class="btn btn-success btn-sm add_drop_row"> + </button>\
                    <button type="button" class="btn btn-danger btn-sm remove_drop_row"> - </button>\
                </div>\
            </td>';
            append_row += '</tr>';

            $(".append_drop_row").append(append_row);
        }
    });

    $(document).on("click", ".remove_drop_row", function() {
        $(this).closest("tr").remove();
    });
});

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
console.log(response);
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

    /*select*/
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

    $(document).ready(function() {
        var initialValue = $('#fleet_id').val();
        getFleet(initialValue, {!! json_encode($item) !!});
    });

    function getFleet(value, item = '') {
        var selected = '';

        $.ajax({
            url: "{{ route('getFleet') }}",
            type: 'GET',
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

                // Populate the form fields with the stored values
                $("#seater_price").val(item.seater_price);
                $("#upper_seater_price").val(item.upper_seater_price);
                $("#sleeper_price").val(item.sleeper_price);
                $("#upper_sleeper_price").val(item.upper_sleeper_price);
                $("#semi_sleeper_price").val(item.semi_sleeper_price);
                $("#upper_semi_sleeper_price").val(item.upper_semi_sleeper_price);
            }
        });
    }

    $(document).on('change', '#fleet_id', function() {
        getFleet($(this).val());
    });

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
                $("#boarding_point").append('');
                result.forEach(element => {

                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#boarding_point").append('<option value='+element.id+' '+selected+'>'+element.boarding_address+'</option>')
                });
                $('#boarding_point').select();
            }
        });
        // alert("count==="+count);
    }

/*getDroping*/

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
                $('#drop_point').empty();
                $("#drop_point").append('');
                result.forEach(element => {
                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }
                    $("#drop_point").append('<option value='+element.id+' '+selected+'>'+element.boarding_address+'</option>')
                });
                $('#drop_point').select();
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

                $('#to_city_id').empty();
                $("#to_city_id").append('<option value="" selected disabled>Select</option>');
                result.forEach(element => {

                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#to_city_id").append('<option value='+element.id+' '+selected+'>'+element.city+'</option>')
                });
                $('#to_city_id').select();
            }
        });
        // alert("count==="+count);
    }
    function getToCity(value, selectedFromCity, model) {
        $.ajax({
            url: "{{ route('getCity') }}",
            type: 'GET',
            data: {
                'service_location_id': value,
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

    $(document).on('change','#service_location_id',function()
    {
        getCity($(this).val());

    });
    $(document).on('DOM content loaded',function(){
        var service_location = $('#service_location_id').val();
        var from = $('#from_city_id').val();
        var to = $('#to_city_id').val();
        console.log(service_location,from,to);
    })
    $(document).on('change', '#from_city_id', function () {
        var selectedFromCity = $(this).val(); 
        var selectedModel = $('#from_city_id option:selected').val(); 
        getToCity($('#service_location_id').val(), selectedFromCity, selectedModel);
        getBoarding(selectedFromCity);
    });
    $(document).on('change','#to_city_id',function()
    {
        getDroping($(this).val());
    });
</script>

@endsection
