@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')
{{-- {{session()->get('errors')}} --}}

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="{{ url('routes') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('routes/update',$item->id) }}">
                                @csrf

 <div class="row">
            <div class="col-sm-12">
            <!-- <div class="form-group">
                <label for="service_location_id">@lang('view_pages.service_location') <span class="text-danger">*</span></label>
                     <select name="service_location_id" id="service_location_id" class="form-control select2" required>
                         <option value="" selected disabled>@lang('view_pages.select')</option>
            @foreach($services as $service)
                         <option value="{{ $item->service_location_id }}"
                             {{ old('service_location_id', $item->service_location_id) == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
            @endforeach
                        </select>
</div> -->
<div class="form-group">
    <label for="admin_id">@lang('view_pages.select_area')
        <span class="text-danger">*</span>
    </label>
    <select name="service_location_id" id="service_location_id" class="form-control">
        <option value="" selected disabled>@lang('view_pages.select_area')</option>
        @foreach($services as $key=>$service)
        <option value="{{$service->id}}" {{ old('service_location_id',$item->service_location_id) == $service->id ? 'selected' : '' }}>{{$service->name}}</option>
        @endforeach
    </select>
    </div>
</div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">@lang('view_pages.from') <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="from" name="from"
                        value="{{ old('from',$item->from) }}" required
                        placeholder="@lang('view_pages.enter') @lang('view_pages.from')">
                    <span class="text-danger">{{ $errors->first('from') }}</span>
                     <input type="hidden" class="form-control" id="from_lat"
                                name="from_lat" value="{{ old('from_lat',$item->from_lat) }}" required>
                            <input type="hidden" class="form-control" id="from_lng"
                                name="from_lng" value="{{ old('from_lng',$item->from_lng) }}" required>
                </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">@lang('view_pages.to') <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="to" name="to"
                                value="{{ old('to',$item->to) }}" required
                                placeholder="@lang('view_pages.enter') @lang('view_pages.to')">
                            <span class="text-danger">{{ $errors->first('to') }}</span>
                             <input type="hidden" class="form-control" id="to_lat"
                                        name="to_lat" value="{{ old('to_lat',$item->to_lat) }}" required>
                                    <input type="hidden" class="form-control" id="to_lng"
                                        name="to_lng" value="{{ old('to_lng',$item->to_lng) }}" required>
                        </div>
                    </div>
                    

                    </div>


                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                                            @lang('view_pages.update')
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd_8YI4VVLfG0JaV8PNZLY0_e2xVjg6gw&libraries=places"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>

<script src="{{ asset('assets/build/js/intlTelInput.js') }}"></script>
    <script type="text/javascript"></script>


    <script>
    function initialize() {
        var input = document.getElementById('from');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('from_lat').value = place.geometry.location.lat();
            document.getElementById('from_lng').value = place.geometry.location.lng();


        });

    }

    function initialize2() {
        var input = document.getElementById('to');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('to_lat').value = place.geometry.location.lat();
            document.getElementById('to_lng').value = place.geometry.location.lng();

        });

    }

    


    google.maps.event.addDomListener(window, 'load', initialize);

    google.maps.event.addDomListener(window, 'load', initialize2);

</script>

@endsection
