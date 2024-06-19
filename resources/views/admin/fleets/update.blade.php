@extends('admin.layouts.app')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="box">

                    <div class="box-header with-border">
                        <a href="{{ url('fleets') }}">
                            <button class="btn btn-danger btn-sm pull-right" type="submit">
                                <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                @lang('view_pages.back')
                            </button>
                        </a>
                    </div>

                <div class="col-12">
                <form  method="post" action="{{url('fleets/update', $item->id)}}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="seat_type">@lang('view_pages.seat_type')
    <span class="text-danger">*</span>
</label>
@php
    $seater = '';
    $sleeper = '';
@endphp
@if (old('seat_type'))
    @foreach (old('seat_type') as $item)
        @if ($item == 'seater')
            @php
                $seater = 'selected';
            @endphp
        @elseif($item == 'sleeper')
            @php
                $sleeper = 'selected';
            @endphp
        @endif
    @endforeach
@else
    @php
        $paymentType = explode(',',$item->seat_type);
    @endphp
    @foreach ($paymentType as $val)
        @if ($val == 'seater')
            @php
                $seater = 'selected';
            @endphp
        @elseif($val == 'sleeper')
            @php
                $sleeper = 'selected';
            @endphp
        @endif
    @endforeach
@endif
<select name="seat_type[]" id="seat_type" class="form-control select2" multiple="multiple" required>
    <option value="seater" {{ $seater }}>@lang('view_pages.seater')</option>
    <option value="sleeper" {{ $sleeper }}>@lang('view_pages.sleeper')</option>

</select>
</div>
</div>



    <div class="col-sm-6 float-left mb-md-3">
         <div class="form-group">
            <label for="bus_type">@lang('view_pages.bus_type')
            <span class="text-danger">*</span>
            </label>
            <select name="bus_type" id="bus_type" class="form-control select" required>
             <option value="ac" {{ old('bus_type',$item->bus_type) == 'ac' ? 'selected' : '' }} >@lang('view_pages.ac')
             </option>
             <option value="non_ac" {{ old('bus_type',$item->bus_type) == 'non_ac' ? 'selected' : '' }} >@lang('view_pages.non_ac')
             </option>
              </select>
            </div>
        </div>

              <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="brand">{{ trans('view_pages.bus_brand')}}<span class="text-danger">*</span></label>
                                <input id="brand" name="brand"  type="text" class="form-control" value="{{ old('brand', $item->brand) }}">
                                <span class="text-danger">{{ $errors->first('brand') }}</span>
                            </div>
                        </div>
                       <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="model">{{ trans('view_pages.bus_model')}}<span class="text-danger">*</span></label>
                                <input id="model" name="model" placeholder="{{ trans('view_pages.bus_model')}}" type="text" class="form-control" value="{{ old('model', $item->model) }}" required>
                                <span class="text-danger">{{ $errors->first('bus_model') }}</span>
                            </div>
                        </div>


                        <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="license_number">{{ trans('view_pages.license_number')}}<span class="text-danger">*</span></label>
                                <input id="license_number" name="license_number" placeholder="{{ trans('view_pages.license_number')}}" type="text" class="form-control" value="{{ old('license_number',$item->license_number) }}" required>
                                <span class="text-danger">{{ $errors->first('license_number') }}</span>
                            </div>
                        </div>
                    <div class="col-sm-6 float-left mb-md-3">
                      <div class="form-group">
                        <label for="total_seats">@lang('view_pages.total_seats')<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" id="total_seats" name="total_seats" value="{{old('total_seats',$item->total_seats)}}" required="" placeholder="@lang('view_pages.enter') @lang('view_pages.total_seats')">
                        <span class="text-danger">{{ $errors->first('total_seats') }}</span>
                  </div>
                </div>
                <div class="col-sm-6 float-left mb-md-3">
                    <div class="form-group">
                        <label for="seat_layout_options">@lang('view_pages.seat_layout_options')
                            <span class="text-danger">*</span>
                        </label>
                        <select name="seat_layout_options" id="seat_layout_options" class="form-control select2" required>
                            <option value="">@lang('view_pages.seat_layout_options')</option>
                            @foreach($seat_layout_options as $seat_layout_option)
                                <option value="{{ $seat_layout_option->id }}" {{ old('seat_layout_options', $item->comman_fleet_id) == $seat_layout_option->id ? 'selected' : '' }}>
                                    {{ $seat_layout_option->seat_layout_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                        <div class="col-sm-6 float-left mb-md-3">
                            {{-- <div class="form-group">
                                <h5>Multiple Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                 <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                    <span class="text-danger">{{ $errors->first('multi_img') }}</span>
                                   <div class="row" id="preview_img"></div>

                                  </div>
                            </div> --}}
                            <div class="form-group">
                                <label>
                                 Multiple Image<span class="text-danger">*</span>
                                </label>
                                <input type="file" id="multiImg" name="multi_img[]" class="form-control" multiple="">
                                    @error('multi_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img" >

                                    </div>
                                    <div class="row row-sm">
                                        @foreach($multiImgs as $img)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ asset($img->image_name) }}" class="card-img-top"  height="100" width="100" >

                                                <div class="card-body">
                                                    <h5 class="card-title">

                                                    <a href="{{ route('multiimgDelete',$img->id) }} " class="btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                                    </h5>
                                                    {{-- <p class="card-text">
                                                        <div class="form-group">
                                                            <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                            <input class="form-control" type="file"  id="multiImg" name="multi_img[{{ $img->id }}]">
                                                        </div>
                                                    </p>	 --}}
                                                </div>
                                            </div>

                                        </div><!--  end col md 3		 -->
                                        @endforeach
                                    </div>


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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $('.select2').select2({
        placeholder : "Select ...",
    });

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>

@endsection
