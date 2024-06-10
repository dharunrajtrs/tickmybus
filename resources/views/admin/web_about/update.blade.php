@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')




<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h2 class="card-title">About Page </h2>
            
     <form method="post" class="form-horizontal" action="{{ url('about/update',$item->id) }}" enctype="multipart/form-data">
                @csrf

     <div class="container">

        <div><h4>About Section</h4> </div>

        <div class="form-group">
        <div class="col-6">
            <label for="hero_bg">Hero-section(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->hero_bg) }}" alt=""><br>
            <input type="file" id="hero_bg" onchange="readURL(this)" name="hero_bg" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#hero_bg').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('hero_bg') }}</span>
    </div>
</div>

            <div class="row m-3">
                <label for="about_title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="about_title" id="about_title" class="form-control" type="text" value="{{ old('about_title', $item->about_title) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="about_us" class="col-sm-2 col-form-label">Heading </label>
                <div class="col-sm-10">
                    <input name="about_us" class="form-control" type="text" value="{{ old('about_us', $item->about_us) }}"  id="about_us" required>
                </div>
            </div> <br>

            <div class="row m-3">
                <label for="about_para" class="col-sm-2 col-form-label">About Paragraph </label>
                <div class="col-sm-10">
                <textarea name="about_para" class="ckeditor form-control" name="about_para"  required>
                {{ old('about_para', $item->about_para) }}
                </textarea>
                </div>
            </div> <br>
            <!-- end row -->
            
            <div class="form-group">
        <div class="col-6">
            <label for="about_img">About-Us-Img(1200x800px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->about_img) }}" alt=""><br>
            <input type="file" id="about_img" onchange="readURL(this)" name="about_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#about_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('about_img') }}</span>
    </div>
</div>
            
</div><br>   <!-- end row -->

<div><h4>Drivers Section</h4> </div>

            <div class="row m-3">
                <label for="driver1" class="col-sm-2 col-form-label">Driver Title</label>
                <div class="col-sm-4">
                    <input name="driver_title" id="driver_title" class="form-control" type="text" value="{{ old('driver_title', $item->driver_title) }}"   required
                    placeholder="">
                </div>
                <label for="driver_heading" class="col-sm-2 col-form-label"> Driver Heading </label>
                <div class="col-sm-4">
                    <input name="driver_heading" class="form-control" type="text" value="{{ old('driver_heading', $item->driver_heading) }}"  id="driver_heading" required>
                </div>
            </div> <br>
<!-- driver 1 -->
            <div class="row m-3">
                <label for="driver1" class="col-sm-2 col-form-label">Driver 1</label>
                <div class="col-sm-4">
                    <input name="driver1" id="driver1" class="form-control" type="text" value="{{ old('driver1', $item->driver1) }}"   required
                    placeholder="">
                </div>

                <div class="form-group">
        <div class="col-12">
            <label for="driver1_img">Driver-Img-1(270x230 px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->driver1_img) }}" alt=""><br>
            <input type="file" id="driver1_img" onchange="readURL(this)" name="driver1_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#driver1_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('driver1_img') }}</span>
    </div>
</div>  
               
            </div> <br>
            <!-- end row -->

  <!-- driver 2 -->
            <div class="row m-3">
                <label for="driver2" class="col-sm-2 col-form-label">Driver 2</label>
                <div class="col-sm-4">
                    <input name="driver2" id="driver2" class="form-control" type="text" value="{{ old('driver2', $item->driver2) }}"   required
                    placeholder="">
                </div>

                <div class="form-group">
        <div class="col-12">
            <label for="driver2_img">Driver-Img-2(270x230 px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->driver2_img) }}" alt=""><br>
            <input type="file" id="driver2_img" onchange="readURL(this)" name="driver2_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#driver2_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('driver2_img') }}</span>
    </div>
</div>  
               
            </div> <br>
            <!-- end row -->
  <!-- driver 3 -->
  <div class="row m-3">
                <label for="driver3" class="col-sm-2 col-form-label">Driver 3</label>
                <div class="col-sm-4">
                    <input name="driver3" id="driver3" class="form-control" type="text" value="{{ old('driver3', $item->driver3) }}"   required
                    placeholder="">
                </div>

                <div class="form-group">
        <div class="col-12">
            <label for="driver3_img">Driver-Img-3(270x230 px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->driver3_img) }}" alt=""><br>
            <input type="file" id="driver3_img" onchange="readURL(this)" name="driver3_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#driver3_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('driver3_img') }}</span>
    </div>
</div>  
               
            </div> <br>
            <!-- end row -->
 <!-- driver 4 -->
  <div class="row m-3">
                <label for="driver4" class="col-sm-2 col-form-label">Driver 4</label>
                <div class="col-sm-4">
                    <input name="driver4" id="driver4" class="form-control" type="text" value="{{ old('driver4', $item->driver4) }}"   required
                    placeholder="">
                </div>

                <div class="form-group">
        <div class="col-12">
            <label for="driver4_img">Driver-Img-4(270x230 px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->driver4_img) }}" alt=""><br>
            <input type="file" id="driver4_img" onchange="readURL(this)" name="driver4_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#driver4_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('driver4_img') }}</span>
    </div>
</div>  
               
    </div> <br>
  <!-- end row -->
           

<div><h4>Service Section</h4> </div>

            <div class="row m-3">
                <label for="service_title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-4">
                    <input name="service_title" id="service_title" class="form-control" type="text" value="{{ old('service_title', $item->service_title) }}"   required
                    placeholder="">
                </div>
                <label for="service_heading" class="col-sm-2 col-form-label">Heading </label>
                <div class="col-sm-4">
                    <input name="service_heading" class="form-control" type="text" value="{{ old('service_heading', $item->service_heading) }}"  id="service_heading" required>
                </div>
                <div class="form-group">
        <div class="col-12">
            <label for="service_img">Service-Img(1200x800px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->service_img) }}" alt=""><br>
            <input type="file" id="service_img" onchange="readURL(this)" name="service_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#service_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('service_img') }}</span>
    </div>
</div>  
            </div> <br>
            <!-- end row -->
            
    <div class="row m-3">
        <label for="service1_title" class="col-sm-2 col-form-label">Service Title-1</label>
        <div class="col-sm-4">
            <input name="service1_title" id="service1_title" class="form-control" type="text" value="{{ old('service1_title', $item->service1_title) }}"   required
            placeholder="">
        </div>

        <div class="col-sm-6"> 
     <div class="form-group">
        <div class="col-12">
            <label for="service1_img">Service-Img-1(60x60)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->service1_img) }}" alt=""><br>
            <input type="file" id="service1_img" onchange="readURL(this)" name="service1_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#service1_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('service1_img') }}</span>
    </div>
</div> 
</div> 
</div> <br>
            <div class="row m-3">
                <label for="service1_para" class="col-sm-2 col-form-label">Service Paragraph-1 </label>
                <div class="col-sm-10">
                <textarea name="service1_para" class="ckeditor form-control" name="service1_para"  required>
                {{ old('service1_para', $item->service1_para) }}
                </textarea>
                </div>
            </div> <br>

<!-- end row -->

<div class="row m-3">
                <label for="service2_title" class="col-sm-2 col-form-label">Service Title-2</label>
                <div class="col-sm-4">
                    <input name="service2_title" id="service2_title" class="form-control" type="text" value="{{ old('service2_title', $item->service2_title) }}"   required
                    placeholder="">
                </div>

    <div class="col-sm-6">
     <div class="form-group">
        <div class="col-12">
            <label for="service2_img">Service-Img-2(60x60)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->service2_img) }}" alt=""><br>
            <input type="file" id="service2_img" onchange="readURL(this)" name="service2_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#service2_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('service2_img') }}</span>
    </div>
</div>  
</div>
</div> <br>
            <div class="row m-3">
                <label for="service2_para" class="col-sm-2 col-form-label">Service Paragraph-2 </label>
                <div class="col-sm-10">
                <textarea name="service2_para" class="ckeditor form-control" name="service2_para"  required>
                {{ old('service2_para', $item->service2_para) }}
                </textarea>
                </div>
            </div> <br>
<!-- end row -->

<div class="row m-3">
                <label for="service3_title" class="col-sm-2 col-form-label">Service Title-3</label>
                <div class="col-sm-4">
                    <input name="service3_title" id="service3_title" class="form-control" type="text" value="{{ old('service3_title', $item->service3_title) }}"   required
                    placeholder="">
                </div>

     <div class="col-sm-6">       
     <div class="form-group">
        <div class="col-12">
            <label for="service3_img">Service-Img-3(60x60)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->service3_img) }}" alt=""><br>
            <input type="file" id="service3_img" onchange="readURL(this)" name="service3_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#service3_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('service3_img') }}</span>
    </div>
</div>
</div>  
</div> <br>
            <div class="row m-3">
                <label for="service3_para" class="col-sm-2 col-form-label">Service Paragraph-3 </label>
                <div class="col-sm-10">
                <textarea name="service3_para" class="ckeditor form-control" name="service3_para"  required>
                {{ old('service3_para', $item->service3_para) }}
                </textarea>
                </div>
            </div> <br>
<!-- end row -->

<div class="row m-3">
                <label for="service4_title" class="col-sm-2 col-form-label">Service Title-4</label>
                <div class="col-sm-4">
                    <input name="service4_title" id="service4_title" class="form-control" type="text" value="{{ old('service4_title', $item->service4_title) }}"   required
                    placeholder="">
                </div>

    <div class="col-sm-6">
     <div class="form-group">
        <div class="col-12">
            <label for="service4_img">Service-Img-4(60x60)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->service4_img) }}" alt=""><br>
            <input type="file" id="service4_img" onchange="readURL(this)" name="service4_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#service4_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('service4_img') }}</span>
    </div>
</div>  
</div>  
</div> <br>
            <div class="row m-3">
                <label for="service4_para" class="col-sm-2 col-form-label">Service Paragraph-4 </label>
                <div class="col-sm-10">
                <textarea name="service4_para" class="ckeditor form-control" name="service4_para"  required>
                {{ old('service4_para', $item->service4_para) }}
                </textarea>
                </div>
            </div> <br>
<!-- end row -->

<div><h4>Banner Section</h4> </div>

<div class="row m-3">
                <label for="banner_title" class="col-sm-2 col-form-label">Banner Title</label>
                <div class="col-sm-4">
                    <input name="banner_title" id="banner_title" class="form-control" type="text" value="{{ old('banner_title', $item->banner_title) }}"   required
                    placeholder="">
                </div>
                <label for="banner_heading" class="col-sm-2 col-form-label">Banner Heading</label>
                <div class="col-sm-4">
                    <input name="banner_heading" id="banner_heading" class="form-control" type="text" value="{{ old('banner_heading', $item->banner_heading) }}"   required
                    placeholder="">
                </div> 
                <div class="form-group mt-5">
        <div class="col-12">
            <label for="banner_bg">Banner-Img(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->banner_bg) }}" alt=""><br>
            <input type="file" id="banner_bg" onchange="readURL(this)" name="banner_bg" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#banner_bg').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('banner_bg') }}</span>
    </div>
</div>

</div>              
            
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

</script>

@endsection