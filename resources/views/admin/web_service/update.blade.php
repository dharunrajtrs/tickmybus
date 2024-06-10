@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')




<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h2 class="card-title">Service Page </h2>
            
     <form method="post" class="form-horizontal" action="{{ url('service/update',$item->id) }}" enctype="multipart/form-data">
                @csrf

     <div class="container">
           
<div><h4>Service Section</h4> </div>

<div class="form-group">
        <div class="col-12">
            <label for="hero_bg">Hero-BG <span>(1200x660px)</span></label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->hero_bg) }}" alt=""><br>
            <input type="file" id="hero_bg" onchange="readURL(this)" name="hero_bg" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#hero_bg').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('hero_bg') }}</span>
    </div>
</div> 

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
            </div> <br>
            <div class="form-group">
        <div class="col-12">
            <label for="service_img">Service-Img<span>(1200x800px)</span></label><br>
            <img id="blah" style="width:30%;" src="{{ asset($item->service_img) }}" alt=""><br>
            <input type="file" id="service_img" onchange="readURL(this)" name="service_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#service_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('service_img') }}</span>
    </div>
</div>  
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
    </div><br>
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

<div><h4>Amenities Section</h4> </div>

<div class="row m-3">
                <label for="amenity_title" class="col-sm-2 col-form-label">Amenity Title</label>
                <div class="col-sm-4">
                    <input name="amenity_title" id="amenity_title" class="form-control" type="text" value="{{ old('amenity_title', $item->amenity_title) }}"   required
                    placeholder="">
                </div>
                <label for="amenity_heading" class="col-sm-2 col-form-label">Amenity Heading</label>
                <div class="col-sm-4">
                    <input name="amenity_heading" id="amenity_heading" class="form-control" type="text" value="{{ old('amenity_heading', $item->amenity_heading) }}"   required
                    placeholder="">
                </div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity_para" class="col-sm-2 col-form-label">Amenity Paragraph </label>
                <div class="col-sm-10">
                <textarea name="amenity_para" class="ckeditor form-control" name="amenity_para"  required>
                {{ old('amenity_para', $item->amenity_para) }}
                </textarea>
                </div>
            </div>   <br>         
            
  <!-- end row -->
  <!--amenity 1  -->
<div class="row m-3">
                <label for="amenity1_title" class="col-sm-2 col-form-label">Amenity Title-1</label>
                <div class="col-sm-4">
                    <input name="amenity1_title" id="amenity1_title" class="form-control" type="text" value="{{ old('amenity1_title', $item->amenity1_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity1_img">Amenity-Img-1(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity1_img) }}" alt=""><br>
            <input type="file" id="amenity1_img" onchange="readURL(this)" name="amenity1_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity1_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity1_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity1_para" class="col-sm-2 col-form-label">Amenity Paragraph 1 </label>
                <div class="col-sm-10">
                <textarea name="amenity1_para" class="ckeditor form-control" name="amenity1_para"  required>
                {{ old('amenity1_para', $item->amenity1_para) }}
                </textarea>
                </div>
            </div>   <br>  
 <!--amenity 2  -->
<div class="row m-3">
                <label for="amenity2_title" class="col-sm-2 col-form-label">Amenity Title-2</label>
                <div class="col-sm-4">
                    <input name="amenity2_title" id="amenity2_title" class="form-control" type="text" value="{{ old('amenity2_title', $item->amenity2_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity2_img">Amenity-Img-2(500x500px)(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity2_img) }}" alt=""><br>
            <input type="file" id="amenity2_img" onchange="readURL(this)" name="amenity2_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity2_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity2_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity2_para" class="col-sm-2 col-form-label">Amenity Paragraph 2 </label>
                <div class="col-sm-10">
                <textarea name="amenity2_para" class="ckeditor form-control" name="amenity2_para"  required>
                {{ old('amenity2_para', $item->amenity2_para) }}
                </textarea>
                </div>
            </div>   <br>  
             <!--amenity 3  -->
<div class="row m-3">
                <label for="amenity3_title" class="col-sm-2 col-form-label">Amenity Title-3</label>
                <div class="col-sm-4">
                    <input name="amenity3_title" id="amenity3_title" class="form-control" type="text" value="{{ old('amenity3_title', $item->amenity3_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity3_img">Amenity-Img-3(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity3_img) }}" alt=""><br>
            <input type="file" id="amenity3_img" onchange="readURL(this)" name="amenity3_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity3_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity3_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity3_para" class="col-sm-2 col-form-label">Amenity Paragraph 3 </label>
                <div class="col-sm-10">
                <textarea name="amenity3_para" class="ckeditor form-control" name="amenity3_para"  required>
                {{ old('amenity3_para', $item->amenity3_para) }}
                </textarea>
                </div>
            </div>   <br>  
             <!--amenity 4  -->
<div class="row m-3">
                <label for="amenity4_title" class="col-sm-2 col-form-label">Amenity Title-4</label>
                <div class="col-sm-4">
                    <input name="amenity4_title" id="amenity4_title" class="form-control" type="text" value="{{ old('amenity4_title', $item->amenity4_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity4_img">Amenity-Img-4(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity4_img) }}" alt=""><br>
            <input type="file" id="amenity4_img" onchange="readURL(this)" name="amenity4_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity4_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity4_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity4_para" class="col-sm-2 col-form-label">Amenity Paragraph 4 </label>
                <div class="col-sm-10">
                <textarea name="amenity4_para" class="ckeditor form-control" name="amenity4_para"  required>
                {{ old('amenity4_para', $item->amenity4_para) }}
                </textarea>
                </div>
            </div>   <br>  
             <!--amenity 5  -->
<div class="row m-3">
                <label for="amenity5_title" class="col-sm-2 col-form-label">Amenity Title-5</label>
                <div class="col-sm-4">
                    <input name="amenity5_title" id="amenity5_title" class="form-control" type="text" value="{{ old('amenity5_title', $item->amenity5_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity5_img">Amenity-Img-5(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity5_img) }}" alt=""><br>
            <input type="file" id="amenity5_img" onchange="readURL(this)" name="amenity5_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity5_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity5_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity5_para" class="col-sm-2 col-form-label">Amenity Paragraph 5 </label>
                <div class="col-sm-10">
                <textarea name="amenity5_para" class="ckeditor form-control" name="amenity5_para"  required>
                {{ old('amenity5_para', $item->amenity5_para) }}
                </textarea>
                </div>
            </div>   <br>  
<!--amenity 6  -->
<div class="row m-3">
                <label for="amenity6_title" class="col-sm-2 col-form-label">Amenity Title-6</label>
                <div class="col-sm-4">
                    <input name="amenity6_title" id="amenity6_title" class="form-control" type="text" value="{{ old('amenity6_title', $item->amenity6_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity6_img">Amenity-Img-6(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity6_img) }}" alt=""><br>
            <input type="file" id="amenity6_img" onchange="readURL(this)" name="amenity6_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity6_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity6_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity6_para" class="col-sm-2 col-form-label">Amenity Paragraph 6 </label>
                <div class="col-sm-10">
                <textarea name="amenity6_para" class="ckeditor form-control" name="amenity6_para"  required>
                {{ old('amenity6_para', $item->amenity6_para) }}
                </textarea>
                </div>
            </div>   <br>  
 <!--amenity 7  -->
<div class="row m-3">
                <label for="amenity7_title" class="col-sm-2 col-form-label">Amenity Title-7</label>
                <div class="col-sm-4">
                    <input name="amenity7_title" id="amenity7_title" class="form-control" type="text" value="{{ old('amenity7_title', $item->amenity7_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity7_img">Amenity-Img-7(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity7_img) }}" alt=""><br>
            <input type="file" id="amenity7_img" onchange="readURL(this)" name="amenity7_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity7_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity7_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity7_para" class="col-sm-2 col-form-label">Amenity Paragraph 7 </label>
                <div class="col-sm-10">
                <textarea name="amenity7_para" class="ckeditor form-control" name="amenity7_para"  required>
                {{ old('amenity7_para', $item->amenity7_para) }}
                </textarea>
                </div>
            </div>   <br> 
  <!--amenity 8 -->
<div class="row m-3">
                <label for="amenity8_title" class="col-sm-2 col-form-label">Amenity Title-8</label>
                <div class="col-sm-4">
                    <input name="amenity8_title" id="amenity8_title" class="form-control" type="text" value="{{ old('amenity8_title', $item->amenity8_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity8_img">Amenity-Img-8(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity8_img) }}" alt=""><br>
            <input type="file" id="amenity8_img" onchange="readURL(this)" name="amenity8_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity8_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity8_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity8_para" class="col-sm-2 col-form-label">Amenity Paragraph 8 </label>
                <div class="col-sm-10">
                <textarea name="amenity8_para" class="ckeditor form-control" name="amenity8_para"  required>
                {{ old('amenity8_para', $item->amenity8_para) }}
                </textarea>
                </div>
            </div>   <br>   
 <!--amenity 9  -->
<div class="row m-3">
                <label for="amenity9_title" class="col-sm-2 col-form-label">Amenity Title-9</label>
                <div class="col-sm-4">
                    <input name="amenity9_title" id="amenity9_title" class="form-control" type="text" value="{{ old('amenity9_title', $item->amenity9_title) }}"   required
                    placeholder="">
                </div>
 <div class="form-group">
        <div class="col-12">
            <label for="amenity9_img">Amenity-Img-9(500x500px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->amenity9_img) }}" alt=""><br>
            <input type="file" id="amenity9_img" onchange="readURL(this)" name="amenity9_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#amenity9_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('amenity9_img') }}</span>
    </div>
</div> 
</div>  <br>
<div class="row m-3">
                <label for="amenity9_para" class="col-sm-2 col-form-label">Amenity Paragraph 9 </label>
                <div class="col-sm-10">
                <textarea name="amenity9_para" class="ckeditor form-control" name="amenity9_para"  required>
                {{ old('amenity9_para', $item->amenity9_para) }}
                </textarea>
                </div>
            </div>   <br>  

 <!--App download -->
            <div><h4>Download APP</h4> </div>

            <div class="row m-3">
                <label for="dwnld_heading" class="col-sm-2 col-form-label">Download Heading </label>
                <div class="col-sm-4">
                    <input name="dwnld_heading" class="form-control" type="text" value="{{ old('dwnld_heading', $item->dwnld_heading) }}"  id="dwnld_heading" required>
                </div>
                <label for="dwnld_title" class="col-sm-2 col-form-label">Download Title </label>
                <div class="col-sm-4">
                    <input name="dwnld_title" class="form-control" type="text" value="{{ old('dwnld_title', $item->dwnld_title) }}"  id="dwnld_title" required>
                </div>
            </div> <br>
        
            <div class="row m-3">
                <label for="dwnld_para" class="col-sm-2 col-form-label">Download Paragraph </label>
                <div class="col-sm-10">
                <textarea name="dwnld_para" class="ckeditor form-control" name="dwnld_para"  required>
                {{ old('dwnld_para', $item->dwnld_para) }}
                </textarea>
                </div> 
            </div> <br>

            <div class="row m-3">
                <label for="dwnld_title1" class="col-sm-2 col-form-label">Download Title 1</label>
                <div class="col-sm-4">
                    <input name="dwnld_title1" class="form-control" type="text" value="{{ old('dwnld_title1', $item->dwnld_title1) }}"  id="dwnld_title1" required>
                </div> 
                

                <!-- <label for="dwnld_para1" class="col-sm-2 col-form-label">Download Paragraph 1 </label>
                <div class="col-sm-4">
                <textarea name="dwnld_para1" class="ckeditor form-control" name="dwnld_para1"  required>
                {{ old('dwnld_para1', $item->dwnld_para1) }}
                </textarea>
                </div>  -->
            </div> <br>
            <div class="row m-3">
    
                <label for="dwnld_para1" class="col-sm-2 col-form-label">Download Paragraph 1 </label>
                <div class="col-sm-10">
                <textarea name="dwnld_para1" class="ckeditor form-control" name="dwnld_para1"  required>
                {{ old('dwnld_para1', $item->dwnld_para1) }}
                </textarea>
                </div> 
            </div> <br>
            <h3>User</h3>
            <div class="row m-3">
                <label for="dwnld_playstore" class="col-sm-2 col-form-label">Play Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld_playstore" class="form-control" type="url" value="{{ old('dwnld_playstore', $item->dwnld_playstore) }}"  id="dwnld_playstore" required>
                </div> 
                <label for="dwnld_appstore" class="col-sm-2 col-form-label">App Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld_appstore" class="form-control" type="url" value="{{ old('dwnld_appstore', $item->dwnld_appstore) }}"  id="dwnld_appstore" required>
                </div> 
                </div>

                <h3>Driver</h3>
            <div class="row m-3">
                <label for="dwnld1_playstore" class="col-sm-2 col-form-label">Play Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld1_playstore" class="form-control" type="url" value="{{ old('dwnld1_playstore', $item->dwnld_playstore) }}"  id="dwnld_playstore" required>
                </div> 
                <label for="dwnld1_appstore" class="col-sm-2 col-form-label">App Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld1_appstore" class="form-control" type="url" value="{{ old('dwnld1_appstore', $item->dwnld1_appstore) }}"  id="dwnld_appstore" required>
                </div> 
                </div>
 <br>
            <!-- end row -->            

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