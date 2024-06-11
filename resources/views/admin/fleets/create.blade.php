@extends('admin.layouts.app')
@section('title', 'Main page')


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
                <form  method="post" action="{{url('fleets/store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-sm-6" style="display: none">
                            <div class="form-group">
                                <label for="type">@lang('view_pages.select_bus_company')
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="owner_id" id="owner" class="form-control" required>

                                    <option value="{{$owner->id}}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{$owner->company_name}}</option>

                                </select>
                                </div>
                        </div>

                     <div class="col-sm-6">
                             <div class="form-group">
                                <label for="seat_type">@lang('view_pages.seat_type')
                                    <span class="text-danger">*</span>
                                </label>
                                @php
                                    $seater = '';
                                    $sleeper = '';
                                    $semi_sleeper = '';
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
                                        @elseif($item == 'semi_sleeper')
                                            @php
                                                $semi_sleeper = 'selected';
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                                <select name="seat_type[]" id="seat_type" class="form-control select2" multiple="multiple" required>
                                <option value="seater" {{ $seater }}>@lang('view_pages.seater')</option>
                                 <option value="sleeper" {{ $sleeper }}>@lang('view_pages.sleeper')</option>
                                <option value="semi_sleeper" {{ $semi_sleeper }}>@lang('view_pages.semi_sleeper')</option>
                                  </select>
                                </div>
                            </div>
                        <div class="col-sm-6 float-left mb-md-3">
                             <div class="form-group">
                                <label for="bus_type">@lang('view_pages.bus_type')
                                <span class="text-danger">*</span>
                                </label>
                                <select name="bus_type" id="bus_type" class="form-control select" required>
                               <option selected="">@lang('view_pages.select')</option>
                                <option value="ac" >@lang('view_pages.ac')</option>
                                 <option value="non_ac">@lang('view_pages.non_ac')</option>
                                  </select>
                                </div>
                            </div>
                        <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="brand">{{ trans('view_pages.bus_brand')}}<span class="text-danger">*</span></label>
                                <input id="brand" name="brand" placeholder="{{ trans('view_pages.brand')}}" type="text" class="form-control" value="{{ old('brand') }}" required>
                                <span class="text-danger">{{ $errors->first('brand') }}</span>
                            </div>
                        </div>

                         <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="model">{{ trans('view_pages.bus_model')}}<span class="text-danger">*</span></label>
                                <input id="model" name="model" placeholder="{{ trans('view_pages.bus_model')}}" type="text" class="form-control" value="{{ old('model') }}" required>
                                <span class="text-danger">{{ $errors->first('bus_model') }}</span>
                            </div>
                        </div>


                        <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <label for="license_number">{{ trans('view_pages.license_number')}}<span class="text-danger">*</span></label>
                                <input id="license_number" name="license_number" placeholder="{{ trans('view_pages.license_number')}}" type="text" class="form-control" value="{{ old('license_number') }}" required>
                                <span class="text-danger">{{ $errors->first('license_number') }}</span>
                            </div>
                        </div>
                 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="total_seats">@lang('view_pages.total_seats')<span class="text-danger">*</span></label>
                        <input class="form-control" type="number" id="total_seats" name="total_seats" value="{{old('total_seats')}}" required="" placeholder="@lang('view_pages.enter') @lang('view_pages.total_seats')">
                        <span class="text-danger">{{ $errors->first('total_seats') }}</span>

                  </div>
                </div>

                     <div class="col-sm-6">
                             <div class="form-group">
                                <label for="bus_amenties">@lang('view_pages.bus_amenties')
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="bus_amenties[]" id="bus_amenties" class="form-control select2" multiple="multiple" required>
                               @foreach($amenties as $key=>$amenity)
                                    <option value="{{$amenity->id}}" {{ old('bus_amenties[]') == $amenity->id ? 'selected' : '' }}>{{$amenity->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>

                        <div class="col-sm-6 float-left mb-md-3">
                            <div class="form-group">
                                <h5>Bus Images <span class="text-danger">*</span></h5>
                                <div class="controls">
                         <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                         @error('multi_img')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                         <div class="row" id="preview_img"></div>

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
