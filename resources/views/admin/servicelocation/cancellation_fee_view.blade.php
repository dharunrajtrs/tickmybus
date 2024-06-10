@extends('admin.layouts.app')
@section('title', 'Main page')

@section('extra-css')
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{!! asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css') !!}">
@endsection

@section('content')


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


            <span class="text-danger">@lang('view_pages.note') : @lang('view_pages.please_update_to_save_changes')</span>
        </div>

        <div class="col-sm-12">
        <form  method="post" class="form-horizontal" action="{{url('service_location/zone_cancellaion_fee/update', $serviceLocation->id)}}" enctype="multipart/form-data">
            @csrf
            <table class="table surgeTable" id="table">
                <thead>
                    <th> @lang('view_pages.hours_before_trip_start_time') <span class="text-danger">*</span></th>
                    <th> @lang('view_pages.cancellation_fee_in_percentage') <span class="text-danger">*</span></th>
                    <th style="width:100px;">@lang('view_pages.action')</th>
                </thead>
                <tbody class="append_row">
                @if (!$serviceLocation->zoneCancellationFee->isEmpty())
                        @foreach ($serviceLocation->zoneCancellationFee as $k => $cancellationFee)
                            <tr>
                                <td>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" id="hours" name="hours[]" value="{{ old('hourls.'.$k,$cancellationFee->hour) }}"  "class="form-control" placeholder="@lang('view_pages.enter_hours')">
                                            <span class="text-danger">{{ $errors->first('hours') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                            <input class="form-control" type="number" min="0" max="100" id="percentage" name="percentage[]" value="{{ old('percentage.'.$k,$cancellationFee->percentage) }}" placeholder="@lang('view_pages.enter_percentage')">
                                            <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                            <button type="button" class="btn btn-danger btn-sm remove_row"> - </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td>
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" id="hours" name="hours[]" value="{{ old('hours') }}" class="form-control" placeholder="@lang('view_pages.enter_hours')">
                                            <!-- </div> -->
                                            <span class="text-danger">{{ $errors->first('hours') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                            <input class="form-control" type="number" min="0" max="100" id="percentage" name="percentage[]" value="{{old('percentage')}}" required="" placeholder="@lang('view_pages.enter_percentage')">
                                            <span class="text-danger">{{ $errors->first('percentage') }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm add_row"> + </button>
                                            <button type="button" class="btn btn-danger btn-sm remove_row"> - </button>
                                    </div>
                                </td>
                            </tr>



                    @endif
                </tbody>
            </table>

            <div class="form-group">
                <div class="col-12">
                    <button class="btn btn-primary pull-right  btn-sm m-5" id="saveCancellaionFeee" type="submit">
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

@endsection

@section('extra-js')
    <!-- date-range-picker -->
    <script src="{{asset('assets/vendor_components/moment/min/moment.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2({
                tags: true,
                tokenSeparators: [',', ' '],
                selectOnClose: true,
                placeholder: "select a day",
                allowClear: true
            })
        });
    </script>

   <script>
        $('.timepicker').timepicker({
            showInputs: false
        });


        $(document).on("click",".add_row",function(){
            var table = document.getElementById("table");

            // var tableRowCount = table.rows.length; 

            if($('.add_row').length <= 4){
                var append_row = "";
                var tableLength = table.rows.length; 
            var tableRowCount = tableLength-1;
            console.log(tableRowCount);

                append_row +='<tr>';
                append_row += '<td>\
                                    <div class="bootstrap-timepicker">\
                                        <div class="form-group">\
                                            <div class="input-group">\
                                                <input type="number" name="hours[]" value="{{ old('hours') }}" class="form-control" placeholder="@lang('view_pages.enter_hours')">\
                                            <span class="text-danger">{{ $errors->first('hours') }}</span>\
                                        </div>\
                                    </div>\
                                </td>';

                append_row += '<td>\
                                    <div class="form-group">\
                                            <input class="form-control" type="number" max="100" id="name" name="percentage[]" value="{{old('price')}}" required="" placeholder="@lang('view_pages.enter_percentage')">\
                                            <span class="text-danger">{{ $errors->first('percentage') }}</span>\
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
                $('.timepicker').timepicker({
                    showInputs: false
                });
            }
            
        });


        $(document).on("click",".remove_row",function(){
            $(this).closest("tr").remove();
        });

        $('#saveCancellaionFeee').click(function(e) {

            var exitSubmit = true;

                var hours = $(this).find(".hours").val();
            
               console.log(hours);


            return exitSubmit;
        });

    </script>

@endsection
