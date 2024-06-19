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

.bus-layout {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f0f0f0;
}

.left-section, .right-section {
  display: flex;
  flex-direction: column;
  margin: 0 20px;
}

.row {
  display: flex;
  flex-direction: row;
  margin: 10px 0;
}


.seat:hover, .seat:active{
    cursor: pointer;
}

.seat_rectangle{
  width: 100px;
  height: 100px;
  border: 1px solid black;
  margin: 0 10px;
  display: flex;
  justify-content: center;
  align-items: center;
}


</style>
<form method="post" action="{{url('fleet_seat_layout/update')}}">
  @csrf
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="row p-2">
          <div class="col-sm-12">
              <div class="box-header with-border">
                  <a href="{{ url('fleet_seat_layout') }}">
                      <button class="btn btn-danger btn-sm pull-right" type="button">
                          <i class="mdi mdi-keyboard-backspace mr-2"></i>
                          @lang('view_pages.back')
                      </button>
                  </a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 p-0">
            <div class="pull-right">
              <h4 class="panel-title">Left</h4>
              @foreach($seatLayoutView[FleetSeatLayout::LEFT_SIDE] as $key => $value)
                <?php
                  $divideValue = $key%$bus->left_columns;
                  $seatLabel = "";
                  switch($value->seat_type){
                    case $seater['value']:
                      $seatImage = $seater['image'];
                      break;
                    case $semiSleeper['value']:
                      $seatImage = $semiSleeper['image'];
                      break;
                    case $sleeper['value']:
                      $seatImage = $sleeper['image'];
                      break;
                    default:
                      $seatImage = $blocker['image'];
                  }
                ?>
                @if ($divideValue==0)
                  <div class="row m-2">
                @endif
                    <div class="{{$layout_type[0]}} seat  ml-2" id="{{$value->id}}">
                      <small class="seat_no">{{$value->seat_no}}</small>
                      <input type="hidden" class="seat_id" value="{{$value->id}}">
                      <input type="hidden" class="seat_type" value="{{$value->seat_type}}">
                      <img class="{{$layout_type[0]}}-image"  src="{{$seatImage}}" alt="seat image">
                    </div>
                @if ($divideValue + 1 == $bus->left_columns)
                  </div>
                @endif
              @endforeach
            </div>
          </div>
          <div class="col-lg-1  p-0 d-flex align-items-end flex-column" value = ''>
            <div class="pull-right mt-auto" style="padding-bottom:5px">
              @foreach($seatLayoutView[FleetSeatLayout::BACK_SIDE] as $key => $value)
                <?php
                  $seatImage = "";
                  switch($value->seat_type){
                    case $seater['value']:
                        $seatImage = $seater['image'];
                        break;
                    case $semiSleeper['value']:
                      $seatImage = $semiSleeper['image'];
                      break;
                    case $sleeper['value']:
                      $seatImage = $sleeper['image'];
                      break;
                    default:
                    $seatImage = $blocker['image'];
                  }
                ?>
                <div class="seat  ml-2 {{$layout_type[1]}}" id="{{$value->id}}">
                  <small class="seat_no">{{$value->seat_no}}</small>
                  <input type="hidden" class="seat_id" value="{{$value->id}}">
                  <input type="hidden" class="seat_type" value="{{$value->seat_type}}">
                  <img class="{{$layout_type[1]}}-image"  src="{{$seatImage}}" alt="seat image">
                </div>
              @endforeach
                </div>
          </div>
          <div class="col-lg-6 p-0" value = ''>
            <div class="pull-left">
              <h4 class="panel-title">Right</h4>
              @foreach($seatLayoutView[FleetSeatLayout::RIGHT_SIDE] as $key => $value)
                <?php
                  $divideValue = $key%$bus->right_columns;
                  $seatImage = "";
                  switch($value->seat_type){
                    case $seater['value']:
                      $seatImage = $seater['image'];
                      break;
                    case $semiSleeper['value']:
                      $seatImage = $semiSleeper['image'];
                      break;
                    case $sleeper['value']:
                      $seatImage = $sleeper['image'];
                      break;
                    default:
                      $seatImage = $blocker['image'];
                  }
                ?>
                @if ($divideValue==0)
                  <div class="row m-2" value ="{{$value->seat_type}}">
                    @endif
                    <div class="{{$layout_type[2]}} seat  ml-2" id="{{$value->id}}">
                      <small class="seat_no">{{$value->seat_no}}</small>
                      <input type="hidden" class="seat_id" value="{{$value->id}}">
                      <input type="hidden" class="seat_type" value="{{$value->seat_type}}">
                      <img class="{{$layout_type[2]}}-image"  src="{{$seatImage}}" alt="seat image">
                    </div>
                    @if ($divideValue + 1 == $bus->right_columns)
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
        @if (count($layout_type) > 3)
          <h4 class="panel-title">Upper Deck</h4>
          <div class="row upper_deck">
            <div class="col-lg-5 p-0">
              <div class="pull-right">
                <h4 class="panel-title">Left</h4>
                @foreach($seatLayoutView['upper_left'] as $key => $value)
                  <?php
                    $divideValue = $key%$bus->left_columns;
                    $seatImage = "";
                    switch($value->seat_type){
                      case $seater['value']:
                        $seatImage = $seater['image'];
                        break;
                      case $semiSleeper['value']:
                        $seatImage = $semiSleeper['image'];
                        break;
                      case $sleeper['value']:
                        $seatImage = $sleeper['image'];
                        break;
                      default:
                        $seatImage = $blocker['image'];
                    }
                  ?>
                  @if ($divideValue==0)
                    <div class="row m-2" value ="{{$value->seat_type}}">
                      @endif
                      <div class="{{$layout_type[3]}} seat  ml-2" id="{{$value->id}}">
                        <small class="seat_no">{{$value->seat_no}}</small>
                        <input type="hidden" class="seat_id" value="{{$value->id}}">
                        <input type="hidden" class="seat_type" value="{{$value->seat_type}}">
                        <img class="{{$layout_type[3]}}-image"  src="{{$seatImage}}" alt="seat image">
                      </div>
                      @if ($divideValue + 1 == $bus->left_columns)
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
            <div class="col-lg-1  p-0 d-flex align-items-end flex-column" value = ''>
              <div class="pull-right mt-auto upper_back p-0">
                @foreach($seatLayoutView['upper_back'] as $key => $value)
                  <?php $seatImage = "";
                    switch($value->seat_type){
                      case $seater['value']:
                          $seatImage = $seater['image'];
                          break;
                      case $semiSleeper['value']:
                        $seatImage = $semiSleeper['image'];
                        break;
                      case $sleeper['value']:
                        $seatImage = $sleeper['image'];
                        break;
                      default:
                      $seatImage = $blocker['image'];
                    }
                  ?>
                  <div class="seat  ml-2 {{$layout_type[4]}}" id="{{$value->id}}">
                    <small class="seat_no">{{$value->seat_no}}</small>
                    <input type="hidden" class="seat_id" value="{{$value->id}}">
                    <input type="hidden" class="seat_type" value="{{$value->seat_type}}">
                    <img class="{{$layout_type[4]}}-image"  src="{{$seatImage}}" alt="seat image">
                  </div>
                @endforeach
              </div>
            </div>
            <div class="col-lg-6 p-0">
              <h4 class="panel-title">Right</h4>
              <div class="pull-left upper_right">
                @foreach($seatLayoutView['upper_right'] as $key => $value)
                  <?php
                    $divideValue = $key%$bus->right_columns;
                    $seatImage = "";
                    switch($value->seat_type){
                      case $seater['value']:
                        $seatImage = $seater['image'];
                        break;
                      case $semiSleeper['value']:
                        $seatImage = $semiSleeper['image'];
                        break;
                      case $sleeper['value']:
                        $seatImage = $sleeper['image'];
                        break;
                      default:
                        $seatImage = $blocker['image'];
                    }
                  ?>
                  @if ($divideValue==0)
                    <div class="row m-2" value ="{{$value->seat_type}}">
                      @endif
                      <div class="{{$layout_type[5]}} seat  ml-2" id="{{$value->id}}">
                        <small class="seat_no">{{$value->seat_no}}</small>
                        <input type="hidden" class="seat_id" value="{{$value->id}}">
                        <input type="hidden" class="seat_type" value="{{$value->seat_type}}">
                        <img class="{{$layout_type[5]}}-image"  src="{{$seatImage}}" alt="seat image">
                      </div>
                      @if ($divideValue + 1 == $bus->right_columns)
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        @endif
      </div>
      <div class="form-group">
        <div class="col-12">
          <button class="btn btn-primary btn-sm m-5 pull-right" onclick="submitFormData()" type="button" id="generate_seat"> @lang('view_pages.submit') </button>
        </div>
      </div>
    </div>
  </div>
</form>
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
<!-- Sweet-Alert  -->
<script src="{{asset('taxi/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('taxi/assets/vendor/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script >
    var seatSelectorModelPopUp = $("#seatSelectorModel");
    var seatSelectorDom = seatSelectorModelPopUp.find(".modal-dialog .modal-content");
    var modelBody = seatSelectorDom.find(".modal-body");
    const seaterClass  = {!! json_encode($seater) !!};
    const semiSleeperClass  = {!! json_encode($semiSleeper) !!};
    const sleeperClass  = {!! json_encode($sleeper) !!};
    const blockerClass  = {!! json_encode($blocker) !!};

    //console
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// Add the Flot version string to the footer

$(".seat").click(function(){
    const seatId = $(this).find(".seat_id").val();
    const seatLabel = $(this).find(".seat_no").text();
    const rowLabel = $(this).find('img').attr('class').replace('-image','',);
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
function closeModelForm(){
    seatSelectorModelPopUp.modal('hide');
}
function submitFormData(){
    let postData = [];
    $(".seat").each(function(){
        postData.push({
            id:$(this).find(".seat_id").val(),
            seat_type:$(this).find(".seat_type").val()
        });
    });


    swal({
        title: "Are you sure do you want to submit?",
        type: "error",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: true
      }, function(isConfirm){
        if (isConfirm) {
            swal.close();
            $.ajax({
                url:"{{url('fleet_seat_layout/update')}}",
                type: "POST",
                data: {bus_layout:postData},
                success: function(response) {
                    const {message} = response;
                    if(message){
                        swal({
                            title: message,
                            confirmButtonText: "OK",
                            closeOnConfirm: true,
                        }, function(isConfirm){
                            window.location.href = "{{url('fleet_seat_layout')}}";
                        });
                      }
                  }
            });
        }
      }
    );
}

</script>

@endsection
