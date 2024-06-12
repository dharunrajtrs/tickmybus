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
                            <a href="{{ url('boarding_point') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('boarding_point/update',$item->id) }}">
                                @csrf
<div class="row">

<div class="col-sm-12">
<div class="form-group">
    <label for="city_id">@lang('view_pages.select_city')
        <span class="text-danger">*</span>
    </label>
    <select name="city_id" id="city_id" class="form-control">
        <option value="" selected disabled>@lang('view_pages.select_city')</option>
        @foreach($cities as $key=>$city)
        <option value="{{$city->id}}" {{ old('city_id',$item->city_id) == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
        @endforeach
    </select>
    </div>
</div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.boarding_address') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="boarding_address" name="boarding_address"
                                                value="{{ old('boarding_address',$item->boarding_address) }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.boarding_address')">
                                            <span class="text-danger">{{ $errors->first('boarding_address') }}</span>
                                             <input type="hidden" class="form-control" id="boarding_address_lat"
                                                        name="boarding_address_lat">
                                                    <input type="hidden" class="form-control" id="boarding_address_lng"
                                                        name="boarding_address_lng">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.landmark') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="landmark" name="landmark"
                                                value="{{ old('landmark',$item->landmark) }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.landmark')">
                                            <span class="text-danger">{{ $errors->first('landmark') }}</span>
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



{{--
    <script src="https://maps.google.com/maps/api/js?key={{get_settings('google_map_key')}}&libraries=drawing,geometry,places"></script>

<script src="{{ asset('assets/build/js/intlTelInput.js') }}"></script>
    <script type="text/javascript"></script>



    <script>
    function initialize() {
        var input = document.getElementById('boarding_address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('boarding_address_lat').value = place.geometry.location.lat();
            document.getElementById('boarding_address_lng').value = place.geometry.location.lng();


        });

    }


    google.maps.event.addDomListener(window, 'load', initialize);



</script>
<script type="text/javascript">
 function getCity(value,model=''){
        var selected = '';
        $.ajax({
            url: "{{ route('getCity') }}",
            type:  'GET',
            data: {
                'service_location_id': value,
            },
            success: function(result)
            {
                $('#city_id').empty();
                $("#city_id").append('<option value="" selected disabled>Select</option>');
                result.forEach(element => {

                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#city_id").append('<option value='+element.id+' '+selected+'>'+element.city+'</option>')
                });
                $('#city_id').select();
            }
        });
        // alert("count==="+count);
    }

    $(document).on('change','#service_location_id',function(){

        // alert($(this).val());
        getCity($(this).val());
    });
</script> --}}

@endsection
