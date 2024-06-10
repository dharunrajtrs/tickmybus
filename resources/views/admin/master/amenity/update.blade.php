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
                            <a href="{{ url('amenity') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('amenity/update',$item->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">@lang('view_pages.name') <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="{{ old('name',$item->name) }}" required
                                                placeholder="@lang('view_pages.enter') @lang('view_pages.name')">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                     <div class="form-group">
        <div class="col-6">
            <label for="icon">@lang('view_pages.icon')</label><br>
            <img id="blah" src="{{ asset($item->icon) }}" alt=""><br>
            <input type="file" id="icon" onchange="readURL(this)" name="icon" style="display:none">
            <button class="btn btn-primary btn-sm" type="button" onclick="$('#icon').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('icon') }}</span>
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



@endsection
