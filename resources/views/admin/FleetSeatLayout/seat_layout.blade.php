@extends('admin.layouts.app') @section('title', 'Main page') @section('content') <style>
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
<section class="box">
  <div class='container'>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 col-md-offset-1">
        <div class="panel panel-default text-dark" style="background: #FFD580;">
          <hr>
          <div class="panel-heading">
          </div>
          <br>
          <div class="panel-body"> Bus Company: <div class="badge badge-pill badge-success" style="background: green;">
              {{ $companiesname }}
            </div> Seat Type: <div class="badge badge-pill badge-success" style="background: blue;">
              {{ $data['seat_type'] }}
            </div> Deck Type: <div class="badge badge-pill badge-success" style="background: red;">
              {{ $data['deck_type'] }}
            </div>
            <br>
            <div class="p-3 mb-2  text-dark">
              <p></p>
              <p>Layout Type Left (Columns X Rows): <span>{{ $leftcolumns }} X {{ $leftrows }} </span>
              </p>
              <p>Layout Type Right (Columns X Rows): <span>{{ $rightcolumns }} X {{ $rightrows }} </span>
              </p>
              <p>Layout Type Back : <span>{{ $data['back'] }} </span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-1"></div> -->
    </div>
    <div class="card p-5 mt-5 align-items-center justify-content-center ">
      <div class="border">
        <div class="w"></div>
        <!-- seat arrangement end -->
        <div class="d-flex flex-column bd-highlight mb-3">
          <div class="row">
            <!-- left seat arrangements -->
            <div class="col-lg-6">
              <p class="text-center">Left</p>
              <div class="row">
                <!-- left seat arrangements row-1 -->
                 @for ($i = 0; $i < $leftcolumns; $i++) 
                 <div class="col-lg-1"> 
                  @for ($j = 0; $j < $leftrows; $j++) 
                 <div class="form-check p-2">
                    <label for="defaultCheck-L1" class="form-check-label" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <input class="form-check-input" type="checkbox" role="checkbox" id="defaultCheck-L1">
                      <span class="custom">
                        <img src="{{asset('assets/img/seat.png')}}" style="width:30px;" alt="">
                      </span>
                    </label>
              </div> @endfor
            </div> @endfor
            <!-- left seat arrangements row-2 -->
          </div>
        </div>
        <!-- right seat arrangements -->
        <div class="col-lg-6">
          <p class="text-center">Right</p>
          <div class="row">
            <!-- right seat arrangements row-1 --> @for ($k = 0; $k < $rightcolumns; $k++) <div class="col-lg-1"> @for ($l = 0; $l < $rightrows; $l++) <div class="form-check p-2">
                <label for="defaultCheck-R1" class="form-check-label" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <input class="form-check-input" type="checkbox" role="checkbox" id="defaultCheck-R1">
                  <span class="custom">
                    <img src="{{asset('assets/img/seat.png')}}" style="width:30px;" alt="">
                  </span>
                </label>
          </div> @endfor
        </div> @endfor
        <!-- right seat arrangements row-2 -->
      </div>
    </div>
  </div>
  </div>
  <!-- seat arrangement end -->
  <!-- row-7 -->
<div class="row">
<div class="col-lg-2"></div>
@for ($m = 0; $m < $back; $m++)
<div class="col-lg-1">
    <label for="defaultCheck-R1" class="form-check-label" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <input class="form-check-input" type="checkbox" role="checkbox" id="defaultCheck-R1">
    <span class="custom">
        <img src="{{asset('assets/img/seat.png')}}" style="width:30px;" alt="">
    </span>
    </label>
</div>
@endfor
</div>
  </div>
  </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" id="closeModel" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Seat Type</label>
          <select name="seat_type" id="seat_type" class="form-control" required>
            <option value="" selected disabled>@lang('view_pages.select')</option>
            <option value="seater" {{ old('seat_type') == 'seater' ? 'selected' : '' }}>@lang('view_pages.seater')</option>
            <option value="sleeper" {{ old('seat_type') == 'sleeper' ? 'selected' : '' }}>@lang('view_pages.sleeper')</option>
            <option value="semi_sleeper" {{ old('seat_type') == 'semi_sleeper' ? 'selected' : '' }}>@lang('view_pages.semi_sleeper')</option>
            <option value="no_seater" {{ old('seat_type') == 'no_seater' ? 'selected' : '' }}>@lang('view_pages.no_seater')</option>
          </select>
          <span class="text-danger">{{ $errors->first('seat_type') }}</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> @endsection