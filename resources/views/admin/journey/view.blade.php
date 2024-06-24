@extends('admin.layouts.app')

@section('content')
<style>
    .text-grey {
        color: grey;
    }

    .dashed-line {
        border-bottom: 1px dashed grey;
    }

    .elapsed-time {
        margin-top: 10px;
        display: inline-block;
        padding: 4px 8px; /* Adjust padding as needed */
        border: 1px solid grey; /* Border properties */
        border-radius: 5px; /* Adjust border radius as needed */
        position: relative; /* Ensure relative positioning for pseudo-elements */
    }

    .elapsed-time:before,
    .elapsed-time:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 40px;
        height: 2px;
        background-color: grey;
        border-bottom: 1px dashed grey; /* Apply dashed line */

    }

    .elapsed-time:before {
        left: -45px; /* Adjust left position for alignment */
    }

    .elapsed-time:after {
        right: -45px; /* Adjust right position for alignment */
    }

    .elapsed-time span {
        background-color: white;
        padding: 0 10px;
        position: relative;
        z-index: 1;
    }
</style>

<!-- seat view style -->
<style>
*, *:before, *:after {
  box-sizing: border-box;
}


.plane {
  margin: 20px auto;
  max-width: 300px;
  rotate: 270deg;
  padding: 10px;
}

.exit {
  position: relative;
  height: 50px;
}
.exit:e, .exit:after {
  content: "EXIT";
  font-size: 14px;
  line-height: 18px;
  padding: 0px 2px;
  font-family: "Arial Narrow", Arial, sans-serif;
  display: block;
  position: absolute;
  background: green;
  color: white;
  top: 50%;
  transform: translate(0, -50%);
}
.exit:before {
  left: 0;
}
.exit:after {
  right: 0;
}

.fuselage {
  width: 360pxpx;
/*  border: 1px solid #eeeeee;*/
}

ol {
  list-style: none;
  padding: 0;
  margin: 0;
}
.flex-list {
    display: flex;
    justify-content: space-between; /* Distribute items evenly */
    list-style: none; /* Remove default list styles */
    padding: 0;
}

.flex-list li {
    flex: 1;
    padding: 10px;
    box-sizing: border-box;
}

.seats {
  display: flex;
}

.seat {
  display: flex;
  flex: 0 0 14.28571428571429%;
  padding: 5px;
  position: relative;
}
.seat input[type=checkbox] {
  position: absolute;
  opacity: 0;
}
.seat input[type=checkbox]:checked + label {
  background: #bada55;
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat input[type=checkbox]:disabled + label {
  background: #dddddd;
  text-indent: -9999px;
  overflow: hidden;
}
.seat input[type=checkbox]:disabled + label:after {
  content: "X";
  text-indent: 0;
  position: absolute;
  top: 4px;
  left: 50%;
  transform: translate(-50%, 0%);
}
.seat input[type=checkbox]:disabled + label:hover {
  box-shadow: none;
  cursor: not-allowed;
}
.seat label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 12px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 0;
  /* background: #F42536; */
  border-radius: 5px;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat label:before {
  content: "";
  position: absolute;
  top: 1px;
  left: 50%;
  transform: translate(-50%, 0%);
  background: rgba(255, 255, 255, 0.4);
  border-radius: 3px;
}
.seat label:hover {
  cursor: pointer;
  box-shadow: 0 0 0px 2px #5C6AFF;
}

@-webkit-keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}
.label{
  position: absolute;
    left: 10px;
    color: black;
}
.seat_image{
  width:50px;
}
.seatLayoutContainer .right{
  justify-content:flex-end;
}
.back{
  height:100%;
  display:flex;
  flex-wrap:wrap;
  align-content:flex-end;
}
    </style>
<!-- end -->



<div class="container bg-white text-dark" style="margin-top: 50px; padding: 10px; border-radius: 15px; border: 2px solid grey;">
    <div class="row">
        <div class="col-4 transport-info">
            <h1>{{ $item->fleet->owner->company_name }}</h1>
            <p>{{ ucfirst($item->fleet->bus_type) }} {{ ucfirst($item->fleet->seat_type) }}</p>
        </div>
        <div class="col-6 journey-info">
            <div class="row">
                <div class="col">
                    <span class="text-grey">{{ $item->convertedDepatureDate() }}</span><br>
                    <span class="text-grey">{{ $item->convertedDepaturedAt() }}</span><br>
                    <p>{{ $cities1 }}</p>
                </div>
                <div class="col">
                    <div class="elapsed-time">
                        <span>{{ $item->duration }}</span>
                    </div>
                </div>
                <div class="col" style="text-align:end;">
                    <span class="text-grey">{{ $item->convertedArraivalDate() }}</span><br>
                    <span class="text-grey">{{ $item->convertedArrivedAt() }}</span><br>
                    <p>{{ $cities22 }}</p>
                </div>
            </div>
        </div>
        <div class="col-2 ticket-info">
            <h3>Starting At</h3>
            <!-- <p>{{ $item->getLowPrice() }}</p> -->
         <button class="btn btn-danger btn-sm pull-right" type="submit" id="show_sheets"> Show sheets </button>
         </div>
    </div>
    <hr>
<div id="seat_{{$item->id}}"><div><div><ol class="cabin"><li class="row lower">
  <div class="col-lg-4 left"></div>
</li></ol></div></div></div>

<script>
  $(function(){
    var html = '<ol class="seats" type="A">';
    var column = 3,seatcount=12;
    for(i=1;i<seatcount+1;i++){
      html+=`<li class="seat">
                <label for="${i}"><span class="label">LABEL</span><input type="checkbox" id="${i}"><img class="seat_image" src='{{asset("assets/images/seat.svg")}}' for="${i}" width="50px"></label>
            </li>`;
      if((i-1)%column == column-1){
        html+='</ol><ol class="seats" type="A">';
      }
    }
    $('.left').html(html);
  })
</script>


<script>

    // Function to generate HTML for seats based on seatLayout data
    function generateSeatLayout(bus,position,deck_type) {
        var html = '';
        var i=0;
        var col=1;
        if(position== 'left'){col = bus.left_columns;}
        if(position== 'right'){col = bus.left_columns;}
        bus.seatLayout.data.forEach(seat=> {
          if(seat.deck_type == deck_type && seat.position == position){
            if(i % col == 0 && col){
              html+='<ol class="flex-list seats" type="A">';
            }
            // Determine image source based on seat type
            var imageSrc = seat.seat_type === 'sleeper' ? '{{asset("assets/images/sleeper.png")}}' : '{{asset("assets/images/seat.svg")}}';

            // Generate HTML for seat
            html += `
                <li class="seat">
                    <label for="${seat.id}"><span class="label">${seat.seat_no}</span><input type="checkbox" id="${seat.id}"><img class="seat_image" src="${imageSrc}" for="${seat.id}" width="50px"></label>
                </li>
            `;
            if(i % col == col-1 && col){
              html+='</ol>';
            }
            i++;
          }
        });
        if(html.length == 0){html ='<div class="p-30"></div>';}

        return html;
    }

// Function to render seat layout on the page
function renderSeatLayout(journey) {
    var positions = ['left', 'back', 'right'];
    var rowHtml = '<div><div><div class="cabin"><div class="row">';
    // Create a new row
    positions.forEach(function(position){
      var html = generateSeatLayout(journey.data.bus.data,position,'lower');
      rowHtml += '<div class=" '+position+'">' + html + '</div>';
    })
    if(journey.data.bus.data.layout_type.length >3){
      positions.forEach(function(position){
        var html = generateSeatLayout(journey.data.bus.data,position,'upper');
        rowHtml += '<div class=" '+position+'">' + html + '</div>';
      })
    }
    rowHtml +='</div></div></div></div>';
    console.log(rowHtml);
    $('#seat_{{$item->id}}').html(rowHtml);
}
$(document).on('click', '#show_sheets', function(e){
  e.preventDefault();
  var url = "{{url('/journey/single-journey',$item->id)}}";
  $.ajax({
    url: url,
    cache:false,
    success: function(res){
      renderSeatLayout(res);
    }
  })
})

</script>

@endsection


