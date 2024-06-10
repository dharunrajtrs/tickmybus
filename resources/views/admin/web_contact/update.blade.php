@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')

<style>
     .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }
</style>


<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h2 class="card-title">Contact Page </h2>
            
     <form method="post" class="form-horizontal" action="{{ url('contact/update',$item->id) }}" enctype="multipart/form-data">
                @csrf

     <div class="container">

     <div><h4>Hero Section</h4> </div>
<div class="form-group">
        <div class="col-6">
            <label for="hero_bg">Hero BG(1200x660px)</label><br>
            <img id="blah" style="width:30%" src="{{ asset('storage/uploads/website/images/' .$item->hero_bg) }}" alt=""><br>
            <input type="file" id="hero_bg" onchange="readURL(this)" name="hero_bg" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#hero_bg').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('hero_bg') }}</span>
    </div>
</div>

        <div><h4>Contact Details</h4> </div>

            <div class="row m-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input name="phone" id="phone" class="form-control" type="text" value="{{ old('phone', $item->phone) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input name="address" class="form-control" type="text" value="{{ old('address', $item->address) }}"  id="address" required>
                </div>
            </div> <br>

            <div class="row m-3">
                <label for="email" class="col-sm-2 col-form-label">E-mail </label>
                <div class="col-sm-10">
                    <input name="email" class="form-control" type="text" value="{{ old('email', $item->email) }}"  id="email" required>
                </div>
            </div> <br>

            <div class="row m-3">
                <label for="form_title" class="col-sm-2 col-form-label">Contact Form Title </label>
                <div class="col-sm-10">
                    <input name="form_title" class="form-control" type="text" value="{{ old('form_title', $item->form_title) }}"  id="form_title" required>
                </div>
            </div> <br>

<div class="form-group">
        <div class="col-6">
            <label for="form_img">Contact Form Img(980x1150px)</label><br>
            <img id="blah" style="width:30%" src="{{ asset('storage/uploads/website/images/' .$item->form_img) }}" alt=""><br>
            <input type="file" id="form_img" onchange="readURL(this)" name="form_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#form_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('form_img') }}</span>
    </div>
</div>
{{--
<div class="row m-3">
                <label for="map" class="col-sm-2 col-form-label">Map</label>
                <div class="col-sm-10">
                    <input name="map" class="form-control" type="url" value="{{ old('map', $item->map) }}"  id="map" required>
                </div>
            </div> <br>
   --}}         
            <!-- end row -->
            
</div><br>   <!-- end row -->


            
</div>   <!-- end row -->
            
 

<!-- <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide"> -->
<div class="form-group">
        <div class="col-12">
            <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                @lang('view_pages.update')
            </button>
        </div>
    </div>
    
</div>
            </form>
             
           
           
        </div>
    </div>
</div> 
</div>
</div>
</div>
{{--
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

</script>  --}}

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script>
          CKEDITOR.replace( 'editor1' );

    </script>


@endsection