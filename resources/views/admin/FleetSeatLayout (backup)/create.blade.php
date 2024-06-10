@php 
use App\Models\Admin\FleetSeatLayout;
//#seat type color...!

$APP_URL = getenv('APP_URL');

if ($APP_URL !== false) {
    // $APP_URL now contains the value of the 'APP_URL' environment variable
    echo $APP_URL;
} else {
    // 'APP_URL' environment variable not found
    echo 'APP_URL is not set in the environment.';
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
  .seat{
    width: 100px;
    height: 100px;
    border: 1px solid black;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  .seat-image {
  width: 90px;
  height: 75px;
  
}
.seat-inner {
    text-align: center;
}
.box {
    margin-top: 100px;
  }

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
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="bus_company">{{ trans('view_pages.bus_company')}}
                      <span class="text-danger">*</span>
                    </label>
                    <select name="owner_id" id="bus_company" class="form-control" required>
                      <option value="" selected disabled>@lang('view_pages.select_bus_company')</option> @foreach($companies as $key => $company) <option value="{{$company->id}}" {{ old('owner_id') == $company->id ? 'selected' : '' }}>{{$company->company_name}}</option> @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('owner_id') }}</span>
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="license_number">{{ trans('view_pages.license_number')}}
                      <span class="text-danger">*</span>
                    </label>
                    <select name="fleet_id" id="license_number" class="form-control"></select>
                    <span class="text-danger">{{ $errors->first('license_number') }}</span>
                  </div>
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
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="">{{ trans('view_pages.layout_type_left_row')}}
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="left_row" id="left_row" placeholder="@lang('view_pages.enter_layout_row')" value="{{ old('left_row') }}">
                    <span class="text-danger" value="{{ old('left_row') }}">{{ $errors->first('layout_type_left_row') }}</span>
                  </div>
                  <div class="form-group">
                    <label for="">{{ trans('view_pages.layout_type_left_column')}}
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="left_column" id="left_column" placeholder="@lang('view_pages.enter_layout_column')" value="{{ old('left_column') }}">
                    <span class="text-danger" value="{{ old('left_column') }}">{{ $errors->first('layout_type_left_column') }}</span>
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="layout_type_right">{{ trans('view_pages.layout_type_right_row')}}
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="right_row" id="right_row" placeholder="@lang('view_pages.enter_layout_row')" value="{{ old('right_row') }}">
                    <span class="text-danger" value="{{ old('right_row') }}">{{ $errors->first('layout_type_right_row') }}</span>
                  </div>
                  <div class="form-group">
                    <label for="">{{ trans('view_pages.layout_type_right_col')}}
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="right_column" id="right_column" placeholder="@lang('view_pages.enter_layout_column')" value="{{ old('right_column') }}">
                    <span class="text-danger" value="{{ old('right_column') }}">{{ $errors->first('layout_type_right_col') }}</span>
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="no_of_seats_in_last_row">{{ trans('view_pages.no_of_seats_in_last_row')}}
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" value="{{ old('back') }}" name="back" id="back" placeholder="@lang('view_pages.enter_no_of_seats_in_last_row')">
                    <span class="text-danger">{{ $errors->first('no_of_seats_in_last_row') }}</span>
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                  <div class="form-group">
                    <label for="deck_type">{{ trans('view_pages.deck_type')}}
                      <span class="text-danger">*</span>
                    </label>
                    <select name="deck_type" id="deck_type" class="form-control" required>
                      <option value="" selected disabled>@lang('view_pages.select')</option>
                      <option value="upper" {{ old('deck_type') == 'upper' ? 'selected' : '' }}>@lang('view_pages.upper')</option>
                      <option value="lower" {{ old('deck_type') == 'lower' ? 'selected' : '' }}>@lang('view_pages.lower')</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('deck_type') }}</span>
                  </div>
                </div>                <input type="hidden" id="seatLayoutValue" name="seatLayoutValue" value=""/>
              </div>
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
                    <div class="col-lg-1  p-0">
                      <div class="pull-right">
                        <!-- <h4 class="panel-title">Left</h4> -->
                        <!-- <div class="leftPreview"> -->

                        <!-- </div> -->
                      </div>
                    </div>
                    <div class="col-lg-6  pl-1">
                      <div class="pull-left">
                        <h4 class="panel-title">Right</h4>
                        <div class="rightPreview">

                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12  p-0">
                      <div class="row m-2  justify-content-center">
                        
                        <div class="backPreview">

                        </div>
                      </div>
                    </div>
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
              <div class="col-lg-12 text-center update-seat">    
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedSeat" id="{{$seater['value']}}"  value="{{$seater['value']}}">
                  <label class="form-check-label" for="{{$seater['value']}}"> {{$seater['label']}} </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedSeat" id="{{$semiSleeper['value']}}"  value="{{$semiSleeper['value']}}">
                  <label class="form-check-label" for="{{$semiSleeper['value']}}"> {{$semiSleeper['label']}} </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedSeat" id="{{$sleeper['value']}}"  value="{{$sleeper['value']}}">
                  <label class="form-check-label" for="{{$sleeper['value']}}"> {{$sleeper['label']}} </label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedSeat" id="{{$blocker['value']}}"  value="{{$blocker['value']}}">
                  <label class="form-check-label" for="{{$blocker['value']}}"> {{$blocker['label']}} </label>
                </div>
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
  let leftPreview = $(".leftPreview");
  let rightPreview = $(".rightPreview");
  let backPreview = $(".backPreview");
  var seatSelectorModelPopUp = $("#seatSelectorModel");
  var seatSelectorDom = seatSelectorModelPopUp.find(".modal-dialog .modal-content");
  var modelBody = seatSelectorDom.find(".modal-body");
  const seaterClass  = {!! json_encode($seater) !!};
  const semiSleeperClass  = {!! json_encode($semiSleeper) !!};
  const sleeperClass  = {!! json_encode($sleeper) !!};
  const blockerClass  = {!! json_encode($blocker) !!};
  
  
 

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

    $(document).on('change','#bus_company',function(){
        getBus($(this).val());
        console.log(getBus($(this).val()));
    });
    function buildSeatLayout(columnCount,rowCount,seatSide,seatSerious){
      let htmlTemplate = "";
      let seatCount=1;
      let template = $('#seatTemplate').html();
      for (let column = 0; column < columnCount; column++) {
        htmlTemplate += '<div class="row m-2">';
        for (let row = 0; row < rowCount; row++) {
          let seatNumber = seatSerious+seatCount;
          let templateHtml = ` 
         
           <div class="seat ml-2" id="${seatNumber}">
           <small class="seat_no">${seatSerious}${seatCount}</small>
            <input type="hidden" value="${seatNumber}" class="seat_id">
            <input type="hidden" value="${seaterClass?.value}" class="seat_type" >
            <img class="seat-image"  src="${seaterClass?.image}" alt="Card image cap">
            
           </div>`;
          htmlTemplate += templateHtml;
          seatCount++;

        }
        htmlTemplate += '</div>';  
      } 
      seatSide.html(htmlTemplate);
    }
    $(document).on('click','#generateSeatLayout',function(){
      let leftRow = parseInt($("#left_row").val());
      let rightRow = parseInt($("#right_row").val());
      let leftColumn = parseInt($("#left_column").val());
      let rightColumn = parseInt($("#right_column").val());
      let back = parseInt($("#back").val());
      //#todo vailidation...!
      if( leftRow > 0 &&  leftColumn > 0 && rightRow > 0 && rightColumn > 0 && back > 0 ){
        $(".busForm").addClass("hide");
        $(".busPreview").removeClass("hide");
        
      let seatSerious = $("#deck_type").val() == "upper"?"U":"";
      
      
      //#block to build the left...!
      buildSeatLayout(leftRow,leftColumn,leftPreview,seatSerious+"L");
      //#block to build the right...!
      buildSeatLayout(rightRow,rightColumn,rightPreview,seatSerious+"R");
      //#block to build the back...!
      buildSeatLayout(1,back,backPreview,seatSerious+"B");
      

      }
       
    });
    function saveModelForm(){
      const selectSeatId = modelBody.find(".seat_id").val();
      const updateSeat = $("[id="+selectSeatId+"]");
      const selectedseatLabel = $('input[name="selectedSeat"]:checked').val();
console.log(selectedseatLabel);
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
  seatSelectorDom.find(".modal-header .modal-title .seat_no").text(seatLabel);
  modelBody.find(".modal-header .modal-title .seat_no").text(seatLabel);
  modelBody.find(".seat_id").val(seatId);
  $("input[name='selectedSeat']").prop('checked', false);
  
  seatSelectorModelPopUp.modal('show');  
});
//#handle submit...!
$(document).on("click","#generate_seat",function() {
  let seats = [];
  let leftOrder = 0, rightOrder = 0, backOrder = 0;
  //#taking left value
  
  leftPreview.find(".row").each(function() {
    $(this).find(".seat").each(function() {
      leftOrder +=1;
      seats.push({
        position:"left",
        seat_no:$(this).find(".seat_id").val(),
        seat_type:$(this).find(".seat_type").val(),
        order:leftOrder
      });
    });
  });
  //#taking right value
  rightPreview.find(".row").each(function() {
    $(this).find(".seat").each(function() {
      rightOrder +=1;
      seats.push({
        position:"right",
        seat_no:$(this).find(".seat_id").val(),
        seat_type:$(this).find(".seat_type").val(),
        order:rightOrder
      });
    });
  });
  //#taking back value
  backPreview.find(".row").each(function() {
    $(this).find(".seat").each(function() {
      backOrder +=1;
      seats.push({
        position:"back",
        seat_no:$(this).find(".seat_id").val(),
        seat_type:$(this).find(".seat_type").val(),
        order:backOrder
      });
    });
  });
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