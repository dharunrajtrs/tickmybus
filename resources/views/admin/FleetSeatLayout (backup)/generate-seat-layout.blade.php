@extends('admin.layouts.app')
@section('title', 'Main page')


@section('content')

<style>
.box{
  margin-top:100px;
}

  .form-check-input{
    width:30px;
    height:30px;
    border-radius:5px;
    background:grey;
  }
  #bed{
    width:30px;
    height:60px;
    border-radius:5px;
    background:grey;
  }


input[type="checkbox"]:checked + span {
    color:white;
    align-content:center;
    padding: 10px;
    align-items:center;
    justify-content:center;
    border-color: black;
    background-color:green;
    width:50px;
    height: 50px;
}

#disable[checkbox]{
  background:white;
}
.border{
  padding: 50px 100px;
}
.custom{
  padding: 4px;
}
.w{
  width:30px;
background:green;
}

.card{
/*    padding: 80px;*/
}


</style>

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-8 col-lg-8">
                <div class="box">

                    <div class="box-header with-border">
                        <a href="{{ url('fleet_seat_layout') }}">
                            <button class="btn btn-danger btn-sm pull-right" type="submit">
                                <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                @lang('view_pages.back')
                            </button>
                        </a>
                    </div>
                
                <div class="col-12">
                <form  method="post" action="{{url('fleet_seat_layout/store')}}">
                @csrf
                <h3> Bus Details </h3>


                <div class="row">
                   
                            <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="bus_company">{{ trans('view_pages.bus_company')}}<span class="text-danger">*</span></label>
                                    <input type="disabled" class="form-control" name="bus_company" value="{{json_decode($request_input)->bus_company}}">
                            </div>
                        </div>
                        

                         <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="car_model">{{ trans('view_pages.bus_model')}}<span class="text-danger">*</span></label>
                                     <select name="bus" id="bus" class="form-control">
                                     </select>
                                <span class="text-danger">{{ $errors->first('bus_model') }}</span>
                            </div>
                        </div>

                     
                        <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="deck_type">{{ trans('view_pages.deck_type')}}<span class="text-danger">*</span></label>
                                    <select name="deck_type" id="deck_type" class="form-control" required>
                                    <option value="" selected disabled>@lang('view_pages.select')</option>
                                    <option value="upper" {{ old('deck_type') == 'upper' ? 'selected' : '' }}>@lang('view_pages.upper')</option>
                                    <option value="lower" {{ old('deck_type') == 'lower' ? 'selected' : '' }}>@lang('view_pages.lower')</option>
                                    </select>
                                <span class="text-danger">{{ $errors->first('deck_type') }}</span>
                            </div>
                        </div>

                         <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="layout_type_left">{{ trans('view_pages.layout_type_left')}}<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="left" placeholder="@lang('view_pages.enter_layout_type')">
                                <span class="text-danger">{{ $errors->first('layout_type_left') }}</span>
                            </div>
                        </div>
                         <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="layout_type_right">{{ trans('view_pages.layout_type_right')}}<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="right" placeholder="@lang('view_pages.enter_layout_type')">
                                <span class="text-danger">{{ $errors->first('layout_type_right') }}</span>
                            </div>
                        </div>
                         <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="no_of_seats_in_last_row">{{ trans('view_pages.no_of_seats_in_last_row')}}<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="back" placeholder="@lang('view_pages.enter_no_of_seats_in_last_row')">
                                <span class="text-danger">{{ $errors->first('no_of_seats_in_last_row') }}</span>
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                            <div class="col-12">
                                <button class="btn btn-primary btn-sm m-5 pull-right" type="submit">
                                    @lang('view_pages.save')
                                </button>
                            </div>
                        </div>
                    </form>

@php

$left_columns= json_decode($request_input)->left_columns;
$right_columns= json_decode($request_input)->right_columns;
$left_rows= json_decode($request_input)->left_rows;
$right_rows= json_decode($request_input)->right_rows;
$left_seats= json_decode($request_input)->left_seats;
$right_seats= json_decode($request_input)->right_seats;
$back_seats= json_decode($request_input)->back_seats;
$total_back_seats= json_decode($request_input)->total_back_seats;

@endphp


<section class="box">
<div class='container'>
    <div class="card p-5 mt-5 align-items-center justify-content-center ">
      <div class="border">




<div class="d-flex flex-column bd-highlight mb-3">
<div class="row">
<div class="col-lg-6">
    <div class="row">

        @for($i=1;$i<=($left_columns*$left_rows);$i++)
        @php
        if($left_columns==1){
            $left_class='col-lg-12';
        }
        if($left_columns==2){
            $left_class='col-lg-6';
        }
        if($left_columns==3){
            $left_class='col-lg-4';
        }
        if($left_columns==4){
            $left_class='col-lg-3';
        }
        @endphp
        <!-- Left starts here -->
      <div class="{{$left_class}}">
        <div class="form-check  p-3 text-center ">
<label for="defaultCheck-L1" class="form-check-label"><p class="p-1">{{$left_seats[$i-1]->seat_no}}</p>
  <input class="form-check-input" type="checkbox" role="checkbox" id="defaultCheck-L1"><span class="custom"><img src="{{asset('assets/img/seat.png')}}" style="width:30px;" alt=""></span>
</label>
</div>
    </div>
      @endfor
      <!-- Left ends here -->      
</div>

</div>
<div class="col-lg-6">
    <div class="row">

        @for($i=1;$i<=($right_columns*$right_rows);$i++)
        @php
        if($right_columns==1){
            $right_class='col-lg-12';
        }
        if($right_columns==2){
            $right_class='col-lg-6';
        }
        if($right_columns==3){
            $right_class='col-lg-4';
        }
        if($right_columns==4){
            $right_class='col-lg-3';
        }
        @endphp
        <!-- Left starts here -->
      <div class="{{$right_class}}">
        <div class="form-check  p-3 text-center ">
<label for="defaultCheck-L1" class="form-check-label"><p class="p-1">{{$right_seats[$i-1]->seat_no}}</p>
  <input class="form-check-input" type="checkbox" role="checkbox" id="defaultCheck-L1"><span class="custom"><img src="{{asset('assets/img/seat.png')}}" style="width:30px;" alt=""></span>
</label>
</div>
    </div>
      @endfor
      <!-- Left ends here -->      
</div>

</div>

<!-- end -->
</div>
</div>

<!-- back start -->

<div class="row">
      @for($i=1;$i<=$total_back_seats;$i++)
            <div class="col-lg-1">
        <div class="form-check p-3 text-center">
            <label for="defaultCheck-R1" class="form-check-label"><p class="p-1">{{$back_seats[$i-1]->seat_no}}</p>
            <input class="form-check-input" type="checkbox" role="checkbox" id="defaultCheck-R1"><span class="custom"><img src="{{asset('assets/img/seat.png')}}" style="width:30px;" alt=""></span>
            </label>
        </div>
    </div>
    @endfor
</div>

<!-- back end -->



</div>
</div>
</div>
</section> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>

 <script src="{{asset('assets/vendor_components/jquery/dist/jquery.js')}}"></script>
<script type="text/javascript">

var request_input = '{{$request_input}}';

console.log(request_input);

</script>

@endsection
