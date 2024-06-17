@php
use App\Models\Admin\FleetSeatLayout;
//#seat type color...!

$APP_URL = getenv('APP_URL');

if ($APP_URL !== false) {
    // $APP_URL now contains the value of the 'APP_URL' environment variable
   // echo $APP_URL;
} else {
    // 'APP_URL' environment variable not found
  //  echo 'APP_URL is not set in the environment.';
}
$seater = [
    "value"=>"seater", //#value dont change because it is store in db...!
    "label"=>"Seater",
    "image"=>$APP_URL."/images/layout/seater.png"
];
$semiSleeper = [
    "value"=>"semi_sleeper",
    "label"=>"Semi Sleeper",
    "image"=>$APP_URL."/images/layout/semi.png"
];
$sleeper = [
    "value"=>"sleeper",
    "label"=>"Sleeper",
    "image"=>$APP_URL."/images/layout/sleeper.png"
];
$blocker = [
    "value"=>"blocker",
    "label"=>"No-Seat",
    "image"=>$APP_URL."/images/layout/blocked.png"
];

@endphp
@extends('admin.layouts.app')
@section('title', 'Main page')


@section('content')
<style>
  .sleeper-image{
    width: 40px;
    height: 80px;
  }
  .sleeper{
    width: 60px;
    height: 120px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .semi_sleeper{
    width: 60px;
    height: 60px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .semi_sleeper-image {
    width: 40px;
    height: 40px;
  }
  .seater{
    width: 60px;
    height: 60px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .seater-image {
    width: 40px;
    height: 40px;
  }
  .seat-inner {
      text-align: center;
  }
  /* .box {
    margin-top: 100px;
  } */

  .form-check-input {
    width: 30px;
    height: 30px;
    border-radius: 5px;
    background: grey;
  }

  #bed {
    width: 30px;
    height: 60px;
    border-radius: 5px;
    background: grey;
  }

  input[type="checkbox"]:checked+span {
    color: white;
    align-content: center;
    padding: 10px;
    align-items: center;
    justify-content: center;
    border-color: black;
    background-color: green;
    width: 50px;
    height: 50px;
  }

  #disable[checkbox] {
    background: white;
  }

  .border {
    padding: 50px 100px;
  }

  .custom {
    padding: 4px;
  }

.seat:hover, .seat:active{
    cursor: pointer;
}


  .w {
    width: 30px;
    background: green;
  }

</style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-lg-12">
        <div class="box">
          <div class="box-header with-border">

            <a href="{{ url('fleet_seat_layout') }}" class="busForm">
              <button class="btn btn-danger btn-sm pull-right" type="button" >
                <i class="mdi mdi-keyboard-backspace mr-2"></i> @lang('view_pages.back') </button>
            </a>
            <button class="btn btn-danger btn-sm pull-right busPreview hide" type="button" onclick="viewBusForm()">
                <i class="mdi mdi-keyboard-backspace mr-2"></i> @lang('view_pages.back') </button>
          </div>
          <div class="col-12">
            <form method="post" action="{{url('fleet_seat_layout/store')}}" id="formData">
        <!-- <form action="#" method="post">/ -->

              @csrf
                 <h3> Bus Details </h3>

              <div class="row busForm ">
                {{-- <div class="col-sm-6 float-left mb-md-3" style="display: none">
                  <div class="form-group">
                    <label for="bus_company">{{ trans('view_pages.bus_company')}}
                      <span class="text-danger">*</span>
                    </label>
                    <select name="owner_id" id="bus_company" class="form-control" required>
                        <option value="{{$companies->id}}" {{ old('owner_id') == $companies->id ? 'selected' : '' }}>{{$companies->company_name}}</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('owner_id') }}</span>
                  </div>
                </div> --}}
                {{-- <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="license_number">{{ trans('view_pages.license_number')}}
                      <span class="text-danger">*</span>
                    </label>
                    <select name="fleet_id" id="license_number" class="form-control"></select>
                    <span class="text-danger">{{ $errors->first('license_number') }}</span>
                  </div>
                </div> --}}
                <div class="col-sm-6 float-left mb-md-3 form-group ">
                    <label for="">Seat Layout Name
                    <span class="text-danger">*</span>
                    </label><br>
                  <div class="form-group">
                    <input type="text" class="form-control" name="seat_layout_name" id="seat_layout_name" value="">

                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="deck_type">{{ trans('view_pages.deck_type')}}
                      <span class="text-danger">*</span>
                    </label><br>
                      <input type="radio" class="form-control" name="deck_type" id="single" value="single">
                      <label for="single">Single deck </label> &ensp;
                      <input type="radio" class="form-control" name="deck_type" id="double" value="double">
                      <label for="double">Double deck </label> &ensp;
                    <span class="text-danger">{{ $errors->first('deck_type') }}</span>
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3 form-group ">
                  <label for="">Layout Type (in each row)
                  </label><br>
                  <div class="col-sm-6 float-left mb-md-3 form-group">
                    <label for="left">Left
                      <span class="text-danger">*</span>
                    </label>&emsp;&emsp;
                    <input type="radio" name="left_row" class="form-control" id="left_1" value="1">
                    <label for="left_1">1</label>&emsp;
                      <input type="radio" name="left_row" class="form-control" id="left_2" value="2">
                    <label for="left_2">2</label>
                  </div>
                  <div class="col-sm-6 float-left mb-md-3 form-group">
                    <label for="right">Right
                      <span class="text-danger">*</span>
                    </label>&emsp;&emsp;
                    <input type="radio" name="right_row" class="form-control" id="right_2" value="2">
                    <label for="right_2">2</label>&emsp;
                    <input type="radio" name="right_row" class="form-control" id="right_3" value="3">
                    <label for="right_3">3</label>
                  </div>
                </div>

                <!-- Lower deck start------------------------------------>
                <div class="col-sm-6 float-left mb-md-3 lower_deck">
                    <label for="">Lower Deck
                      </label>
                    <br>
                  <div class="col-sm-12 float-left mb-md-3 form-group ">
                      <label for="">Seat Type
                      </label><br>
                    <div class="form-group left_seat_type">
                      <label for="left">left
                        <span class="text-danger">*</span>
                      </label><br>
                      <input type="radio" name="left_seat_type" class="form-control" id="left_seater" value="seater">
                      <label for="left_seater">Seater </label> &ensp;
                      <input type="radio" name="left_seat_type" class="form-control" id="left_semi" value="semi_sleeper">
                      <label for="left_semi">Semi-Sleeper </label>&ensp;
                      <input type="radio" name="left_seat_type" class="form-control" id="left_sleeper" value="sleeper">
                      <label for="left_sleeper">Sleeper </label>
                    </div>

                    <div class="form-group right_seat_type">
                      <label for="right">Right
                        <span class="text-danger">*</span>
                      </label><br>
                      <input type="radio" name="right_seat_type" class="form-control" id="right_seater" value="seater">
                      <label for="right_seater">Seater </label> &ensp;
                      <input type="radio" name="right_seat_type" class="form-control" id="right_semi" value="semi_sleeper">
                      <label for="right_semi">Semi-Sleeper </label>&ensp;
                      <input type="radio" name="right_seat_type" class="form-control" id="right_sleeper" value="sleeper">
                      <label for="right_sleeper">Sleeper </label>
                    </div>
                  </div>
                </div>
                <!-- Lower deck end------------------------------------>
                <!-- Upper deck start------------------------------------>
                <div class="col-sm-6 float-left mb-md-3 form-group upper_deck hide">
                      <label for="">Upper Deck
                      </label><br>
                  <div class="col-sm-12 float-left mb-md-3 form-group ">
                      <label for="">Seat Type
                      </label><br>
                    <div class="form-group ">
                      <label for="upper_left">Upper Left
                        <span class="text-danger">*</span>
                      </label><br>
                      <input type="radio" name="upper_left_seat_type" class="form-control" id="upper_left_seater" value="seater">
                      <label for="upper_left_seater">Seater </label> &ensp;
                      <input type="radio" name="upper_left_seat_type" class="form-control" id="upper_left_semi" value="semi_sleeper">
                      <label for="upper_left_semi">Semi-Sleeper </label>&ensp;
                      <input type="radio" name="upper_left_seat_type" class="form-control" id="upper_left_sleeper" value="sleeper">
                      <label for="upper_left_sleeper">Sleeper </label>
                    </div>
                    <div class="form-group ">
                      <label for="upper_right">Upper Right
                        <span class="text-danger">*</span>
                      </label><br>
                      <input type="radio" name="upper_right_seat_type" class="form-control" id="upper_right_seater" value="seater">
                      <label for="upper_right_seater">Seater </label> &ensp;
                      <input type="radio" name="upper_right_seat_type" class="form-control" id="upper_right_semi" value="semi_sleeper">
                      <label for="upper_right_semi">Semi-Sleeper </label>&ensp;
                      <input type="radio" name="upper_right_seat_type" class="form-control" id="upper_right_sleeper" value="sleeper">
                      <label for="upper_right_sleeper">Sleeper </label>
                    </div>
                  </div>
                </div>
                <!-- Upper deck end ------------------------------------>
                <div class="col-sm-12 float-left mb-md-3"></div>
                <div class="col-sm-6 float-left mb-md-3 form-group ">
                    <label for="">Layout Type (per column)
                    <span class="text-danger">*</span>
                    </label><br>
                  <div class="form-group">
                    <input type="text" class="form-control" name="column" id="5" value="">
                    <label for="5"></label>&emsp;
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="back_seat">Back Seat (The last row seat in between the left and right columns)
                      <span class="text-danger">*</span>
                    </label><br>
                    <input type="radio" class="form-control" name="back_seat" id="vacant" value="vacant">
                    <label for="vacant">Vacant</label>&emsp;
                    <input type="radio" class="form-control" name="back_seat" id="back_seater" value="back_seater">
                    <label for="back_seater">Seater</label>
                  </div>
                </div><br>                <input type="hidden" id="seatLayoutValue" name="seatLayoutValue" value=""/>
              </div>


                <!-- <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="deck_type">{{ trans('view_pages.seat_type')}}
                      <span class="text-danger">*</span>
                    </label>
                    <select name="seat_type" id="seat_type" class="form-control" required>
                      <option value="" selected disabled>@lang('view_pages.select')</option>
                      <option value="seater" {{ old('seat_type') == 'seater' ? 'selected' : '' }}>@lang('view_pages.seater')</option>
                      <option value="sleeper" {{ old('seat_type') == 'sleeper' ? 'selected' : '' }}>@lang('view_pages.sleeper')</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('seat_type') }}</span>
                  </div>
                </div> -->
              <div class="row busPreview hide">
                <div class="col-lg-12">

                  <!-- seat view -->
                  <div class="row">
                    <div class="col-lg-5  p-0">
                      <div class="pull-right">
                        <h4 class="panel-title">Left</h4>
                        <div class="leftPreview">

                        </div>
                      </div>
                    </div>
                    <div class="col-lg-1  p-0 d-flex align-items-end flex-column">
                      <div class="pull-right mt-auto">
                        <div class="backPreview">

                        </div>

                      </div>
                    </div>
                    <div>
                      <div class="pull-left">
                        <h4 class="panel-title">Right</h4>
                        <div class="rightPreview">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- upper deck seat view -->
                <div class="col-lg-12 upper_title"></div>
                <div class="col-lg-12 upper_layout">

                </div>

              </div>


              </div>

              <div class="form-group">
                <div class="col-12">
                  <button class="btn btn-primary btn-sm m-5 pull-right busPreview hide"  type="button" id="generate_seat"> @lang('view_pages.generator') </button>
                  <button class="btn btn-primary btn-sm m-5 pull-right busForm "  type="button" id="generateSeatLayout" > Next </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- block for change the seat type -->
<div class="modal fade" id="seatSelectorModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Change Seat Type for <span class="seat_no"></span></h5>
        <button type="button" class="close" onclick="closeModelForm()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" class="seat_id" >
        <div class="container-fluid">
        <div class="row p-2">
              <div class="col-lg-12 text-center update_seat">
              </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <button class="btn btn-primary btn-sm m-5 pull-right" onclick="saveModelForm()" type="button" > Save </button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


 <script src="{{asset('assets/vendor_components/jquery/dist/jquery.js')}}"></script>



<script type="text/javascript">
  var seatSelectorModelPopUp = $("#seatSelectorModel");
  var seatSelectorDom = seatSelectorModelPopUp.find(".modal-dialog .modal-content");
  var modelBody = seatSelectorDom.find(".modal-body");
  const seaterClass  = {!! json_encode($seater) !!};
  const semiSleeperClass  = {!! json_encode($semiSleeper) !!};
  const sleeperClass  = {!! json_encode($sleeper) !!};
  const blockerClass  = {!! json_encode($blocker) !!};
  var rightPreview = $('.rightPreview');
  var leftPreview = $('.leftPreview');
  var backPreview = $('.backPreview');




  function getBus(value,bus_company=''){
        var selected = '';

        $.ajax({
            url: "{{ route('getBus') }}",
            type:  'GET',
            data: {
                'bus_company': value,
            },
            success: function(result)
            {
                $('#license_number').empty();
                $("#license_number").append('<option value="" selected disabled>Select</option>');
                result.forEach(element => {

                    if(license_number == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#license_number").append('<option value='+element.id+' '+selected+'>'+element.license_number+'</option>')
                });
                $('#license_number').select();
            }
        });
  }

  function doubledecker(){
    let htmlTemplate = `<div class="row">
                          <div class="col-lg-5  p-0">
                            <div class="pull-right">
                              <h4 class="panel-title">Left</h4>
                              <div class="upperLeftPreview">

                              </div>
                            </div>
                          </div>
                          <div class="col-lg-1  p-0 d-flex align-items-end flex-column">
                            <div class="pull-right mt-auto">
                              <div class="upperBackPreview">

                              </div>

                            </div>
                          </div>
                          <div>
                            <div class="pull-left">
                              <h4 class="panel-title">Right</h4>
                              <div class="upperRightPreview">

                              </div>
                            </div>
                          </div>
                        </div>`;
    $('div.upper_layout').html(htmlTemplate);
  }

  $('input[name="deck_type"]').on('change',function(){
    if ($('#double').is(':checked')) {
      $('div.upper_title').html('<h3> Upper Deck </h3>');
      doubledecker();
      $('div.upper_deck').removeClass('hide');
    } else {
      $('div.upper_title').html('');
      $('div.upper_layout').html('');
      $('div.upper_deck').addClass('hide');
    }
  });
  $(document).ready(function(){
    getBus($('#bus_company').val());
  $(document).on('change','#bus_company',function(){
      getBus($(this).val());
  });
});
  function buildSeatLayout(columnCount,rowCount,seatType,seatSide,seatSeries){
    let htmlTemplate = "";
    let seatCount = 1;
    if( (seatType == "seater" || seatType == "semi_sleeper") && seatSide !== null){ columnCount}
    for (let column = 0; column < columnCount; column++) {
      htmlTemplate += '<div class="row m-2">';
      for (let row = 0; row < rowCount; row++) {
        let templateHtml = `
         <div class="${seatType} seat ml-2" id="${seatSeries}${seatCount}">
         <small class="seat_no">${seatSeries}${seatCount}</small>
          <input type="hidden" value="${seatSeries}${seatCount}" class="seat_id">`;
        if(seatType == "seater"){
          templateHtml += `<input type="hidden" value="${seaterClass?.value}" class="seat_type" >
                          <img class="seater-image"  src="${seaterClass?.image}" alt="Card image cap">`;
        }else if(seatType == "semi_sleeper"){
          templateHtml += `<input type="hidden" value="${semiSleeperClass?.value}" class="seat_type" >
                          <img class="semi_sleeper-image"  src="${semiSleeperClass?.image}" alt="Card image cap">`;
        }else{
          templateHtml += `<input type="hidden" value="${sleeperClass?.value}" class="seat_type" >
                          <img class="sleeper-image"  src="${sleeperClass?.image}" alt="Card image cap">`;
        }
        templateHtml+='</div>';
        htmlTemplate += templateHtml;
        seatCount++;

      }
      htmlTemplate += '</div>';
    }
    if(seatSide == null){
      $('.backPreview').html(htmlTemplate);
    }else{
      seatSide.html(htmlTemplate);
    }
  }

  $(document).on('click','#generateSeatLayout',function(){
    var single_deck = $('input[id="single"]:checked').val();
    let seat_type = [];
    var left_row =$('input[name="left_row"]:checked').val();
    var right_row =$('input[name="right_row"]:checked').val();
    var left_seat_type =$('input[name="left_seat_type"]:checked').val();
    var right_seat_type =$('input[name="right_seat_type"]:checked').val();
    seat_type.push(left_seat_type);
    seat_type.push(right_seat_type);
    var column =$('input[name="column"]').val();
    var back_seat = $('input[name="back_seat"]:checked').val();
    // true if single deck is selected or both  upper deck seat types are selected
    var deck_type_select_condition = ((single_deck !== undefined) || [(upper_left_seat_type !== undefined) && (upper_right_seat_type !== undefined)]);

    //#todo vailidation...!
    if( (left_row !== undefined) && (right_row !== undefined) && (column !== undefined) && (left_seat_type !== undefined) && (right_seat_type !== undefined) && deck_type_select_condition ){
      $(".busForm").addClass("hide");
      $(".busPreview").removeClass("hide");
      // building the layout
      //#block to build the right...!
      seatcount = buildSeatLayout(column,right_row,right_seat_type,rightPreview,'R');
      //#block to build the back...!
      if(back_seat == "back_seater"){
        seatcount = buildSeatLayout(1,1,'seater',null,'B');
      }
      //#block to build the left...!
      seatcount = buildSeatLayout(column,left_row,left_seat_type,leftPreview,'L');

      if ($('#double').is(':checked')) {
        var upperRightPreview = $('.upperRightPreview');
        var upperLeftPreview = $('.upperLeftPreview');
        var upper_left_seat_type = $('input[name="upper_left_seat_type"]:checked').val();
        var upper_right_seat_type = $('input[name="upper_right_seat_type"]:checked').val();
        seat_type.push(upper_left_seat_type);
        seat_type.push(upper_right_seat_type);
        //#block to build the upper right...!
        seatcount = buildSeatLayout(column,right_row,upper_right_seat_type,upperRightPreview,'UR');
        //#block to build the upper left...!
        seatcount = buildSeatLayout(column,left_row,upper_left_seat_type,upperLeftPreview,'UL');
      }
    }
  });
  function saveModelForm(){
    const selectSeatId = modelBody.find(".seat_id").val();
    const updateSeat = $("[id="+selectSeatId+"]");
    const selectedseatLabel = $('input[name="selectedSeat"]:checked').val();

    if(updateSeat && selectedseatLabel){
      if(seaterClass?.value  == selectedseatLabel)
        updateSeat.find("img").attr("src",seaterClass?.image);

      if(semiSleeperClass?.value  == selectedseatLabel)
        updateSeat.find("img").attr("src",semiSleeperClass?.image);

      if(sleeperClass?.value  == selectedseatLabel)
        updateSeat.find("img").attr("src",sleeperClass?.image);

      if(blockerClass?.value  == selectedseatLabel)
        updateSeat.find("img").attr("src",blockerClass?.image);

      updateSeat.find(".seat_type").val(selectedseatLabel);
    }
    closeModelForm();
  }

  $(document).on("click",".seat",function() {
    const seatId = $(this).find(".seat_id").val();
    const seatLabel = $(this).find(".seat_no").text();
    const rowLabel = $(this).find('img').attr('class').replace('-image','');
    let template = '';
    if(rowLabel == 'sleeper'){
      template += `<div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedSeat" id="{{$sleeper['value']}}"  value="{{$sleeper['value']}}">
                  <label class="form-check-label" for="{{$sleeper['value']}}"> {{$sleeper['label']}} </label>
                </div>`;
    }else{
      template +=  `<div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="selectedSeat" id="{{$seater['value']}}"  value="{{$seater['value']}}">
                      <label class="form-check-label" for="{{$seater['value']}}"> {{$seater['label']}} </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="selectedSeat" id="semi_sleeper"  value="{{$semiSleeper['value']}}">
                      <label class="form-check-label" for="semi_sleeper"> {{$semiSleeper['label']}} </label>
                    </div>`;
    }
    template += `<div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedSeat" id="{{$blocker['value']}}"  value="{{$blocker['value']}}">
                  <label class="form-check-label" for="{{$blocker['value']}}"> {{$blocker['label']}} </label>
                </div>`;
    $('div.update_seat').html(template);
    seatSelectorDom.find(".modal-header .modal-title .seat_no").text(seatLabel);
    modelBody.find(".modal-header .modal-title .seat_no").text(seatLabel);
    modelBody.find(".seat_id").val(seatId);
    $("input[name='selectedSeat']").prop('checked', false);
    seatSelectorModelPopUp.modal('show');
  });

  //#handle submit...!
  $(document).on("click","#generate_seat",function() {
    let seats = [];
    let Order = 0;
    //#taking left value

    leftPreview.find(".row").each(function() {
      $(this).find(".seat").each(function() {
        Order +=1;
        seats.push({
          position:"left",
          seat_no:$(this).find(".seat_id").val(),
          seat_type:$(this).find(".seat_type").val(),
          order:Order
        });
      });
    });
    //#taking right value
    Order = 0;
    rightPreview.find(".row").each(function() {
      $(this).find(".seat").each(function() {
        Order +=1;
        seats.push({
          position:"right",
          seat_no:$(this).find(".seat_id").val(),
          seat_type:$(this).find(".seat_type").val(),
          order:Order
        });
      });
    });
    //#taking back value
    Order = 0;
    backPreview.find(".row").each(function() {
      $(this).find(".seat").each(function() {
        Order +=1;
        seats.push({
          position:"back",
          seat_no:$(this).find(".seat_id").val(),
          seat_type:$(this).find(".seat_type").val(),
          order:Order
        });
      });
    });
    if ($('#double').is(':checked')) {

      // UPPER DECK VALUES
      //#taking upper left value
      var upperRightPreview = $('.upperRightPreview');
      var upperLeftPreview = $('.upperLeftPreview');
      Order = 0;
      upperLeftPreview.find(".row").each(function() {
        $(this).find(".seat").each(function() {
          Order +=1;
          seats.push({
            position:"left",
            seat_no:$(this).find(".seat_id").val(),
            seat_type:$(this).find(".seat_type").val(),
            order:Order
          });
        });
      });
      //#taking upper right value
      Order = 0;
      upperRightPreview.find(".row").each(function() {
        $(this).find(".seat").each(function() {
          Order +=1;
          seats.push({
            position:"right",
            seat_no:$(this).find(".seat_id").val(),
            seat_type:$(this).find(".seat_type").val(),
            order:Order
          });
        });
      });
    }
    $("#seatLayoutValue").val(JSON.stringify(seats));
    $("#formData").submit()

  });
  function closeModelForm(){
    seatSelectorModelPopUp.modal('hide');
  }
  function viewBusForm(){
    $(".busForm").removeClass("hide");
    $(".busPreview").addClass("hide");
  }

</script>


@endsection
