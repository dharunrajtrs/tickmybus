@extends('admin.layouts.app')
@section('title', 'Main page')


@section('content')

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="{{ url('journey') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('journey/assign-driver/update', $item->id) }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="from_city_id">@lang('view_pages.from_city') <span class="text-danger">*</span></label>
                                            <select name="from_city_id" id="from_city_id" class="form-control" disabled>
                                                <option value="" selected disabled>@lang('view_pages.from')</option>
                                                @foreach($cities as $key=>$city)
                                                <option value="{{$city->id}}" {{ old('from_city_id',$item->from_city_id) == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
                                                @endforeach
                                                </select>
                                            <span class="text-danger">{{ $errors->first('from_city') }}</span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="to_city_id">@lang('view_pages.to_city') <span class="text-danger">*</span></label>
                                            <select name="to_city_id" id="to_city_id" class="form-control" disabled>
                                                <option value="" selected disabled>@lang('view_pages.to')</option>
                                                @foreach($cities as $key=>$city)
                                                <option value="{{$city->id}}" {{ old('to_city_id',$item->to_city_id) == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
                                                @endforeach
                                                </select>
                                            <span class="text-danger">{{ $errors->first('to_city') }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="depature">@lang('view_pages.depature') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="depature" name="depature"
                                                value="{{ old('depature', $item->getConvertedDepatureAtAttribute()) }}" required=""
                                                placeholder="@lang('view_pages.enter_name')" readonly>
                                            <span class="text-danger">{{ $errors->first('depature') }}</span>

                                        </div>
                                    </div>
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="arrival">@lang('view_pages.arrival') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="arrival" name="arrival"
                                                value="{{ old('arrival', $item->getConvertedArrivedAtAttribute()) }}" required=""
                                                placeholder="@lang('view_pages.enter_name')" readonly>
                                            <span class="text-danger">{{ $errors->first('arrival') }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="admin_id">@lang('view_pages.select_driver')
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="driver_id" id="driver_id" class="form-control"
                                                required>
                                                <option value="" selected disabled>@lang('view_pages.select_driver')</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->name }}
                                            </option>
                                        @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('driver_id') }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right" type="submit">
                                            @lang('view_pages.assign')
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


@endsection
