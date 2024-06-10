@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')




<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h2 class="card-title">Home Page </h2>
            
     <form method="post" class="form-horizontal" action="{{ url('home/update',$item->id) }}" enctype="multipart/form-data">
                @csrf

               <div class="container">

               <div><h4>Hero Slider-1</h4> </div>

            <div class="row m-3">
                <label for="hero_title_1" class="col-sm-2 col-form-label">Hero Title-1</label>
                <div class="col-sm-10">
                    <input name="hero_title_1" id="hero_title_1" class="form-control" type="text" value="{{ old('hero_title_1', $item->hero_title_1) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="hero_short_title_1" class="col-sm-2 col-form-label">Hero Short Title-1 </label>
                <div class="col-sm-10">
                    <input name="hero_short_title_1" class="form-control" type="text" value="{{ old('hero_short_title_1', $item->hero_short_title_1) }}"  id="hero_short_title_1" required>
                </div>
            </div> <br>
            <!-- end row -->
            

<div class="form-group">
        <div class="col-6">
            <label for="hero_img1">Slider-Img-1(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->hero_img1) }}" alt=""><br>
            <input type="file" id="hero_img1" onchange="readURL(this)" name="hero_img1" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#hero_img1').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('hero_img1') }}</span>
    </div>
</div>
            
</div>   <!-- end row -->

<div><h4>Hero Slider-2</h4> </div>

            <div class="row m-3">
                <label for="hero_title_2" class="col-sm-2 col-form-label">Hero Title-2</label>
                <div class="col-sm-10">
                    <input name="hero_title_2" id="hero_title_2" class="form-control" type="text" value="{{ old('hero_title_2', $item->hero_title_2) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="hero_short_title_2" class="col-sm-2 col-form-label"> Hero Short Title-2 </label>
                <div class="col-sm-10">
                    <input name="hero_short_title_2" class="form-control" type="text" value="{{ old('hero_short_title_2', $item->hero_short_title_2) }}"  id="hero_short_title_2" required>
                </div>
            </div> <br>
            <!-- end row -->
            
            <div class="form-group">
        <div class="col-6">
            <label for="hero_img2">Slider-Img-2(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->hero_img2) }}" alt=""><br>
            <input type="file" id="hero_img2" onchange="readURL(this)" name="hero_img2" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#hero_img2').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('hero_img2') }}</span>
    </div>
</div>    
<!-- slider2 end -->

<div><h4>Hero Slider-3</h4> </div>

            <div class="row m-3">
                <label for="hero_title_3" class="col-sm-2 col-form-label">Hero Title-3</label>
                <div class="col-sm-10">
                    <input name="hero_title_3" id="hero_title_3" class="form-control" type="text" value="{{ old('hero_title_3', $item->hero_title_3) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="hero_short_title_3" class="col-sm-2 col-form-label">Hero Short Title-3 </label>
                <div class="col-sm-10">
                    <input name="hero_short_title_3" class="form-control" type="text" value="{{ old('hero_short_title_3', $item->hero_short_title_3) }}"  id="hero_short_title_3" required>
                </div>
            </div> <br>
            <!-- end row -->
            <div class="row m-3">
                <label for="hero_booknow" class="col-sm-2 col-form-label">Book Now Btn </label>
                <div class="col-sm-10">
                    <input name="hero_booknow" class="form-control" type="text" value="{{ old('hero_booknow', $item->hero_booknow) }}"  id="hero_booknow" required>
                </div>
            </div> <br>
            <!-- end row -->
            
            <div class="form-group">
        <div class="col-6">
            <label for="hero_img3">Slider-Img-3(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->hero_img3) }}" alt=""><br>
            <input type="file" id="hero_img3" onchange="readURL(this)" name="hero_img3" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#hero_img3').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('hero_img3') }}</span>
    </div>
</div>
<!-- slider3 end -->

<div><h4>About Us</h4> </div>

            <div class="row m-3">
                <label for="about_title" class="col-sm-2 col-form-label">About Title</label>
                <div class="col-sm-10">
                    <input name="about_title" id="about_title" class="form-control" type="text" value="{{ old('about_title', $item->about_title) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="about_us" class="col-sm-2 col-form-label">About Us Title </label>
                <div class="col-sm-10">
                    <input name="about_us" class="form-control" type="text" value="{{ old('about_us', $item->about_us) }}"  id="about_us" required>
                </div>
            </div> <br>
            <!-- end row -->

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
            <label for="about_img">About Us-Img(1200x800px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->about_img) }}" alt=""><br>
            <input type="file" id="about_img" onchange="readURL(this)" name="about_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#about_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('about_img') }}</span>
    </div>
</div>
<!-- about us end -->

<div><h4>Banner-1</h4> </div>

            <div class="row m-3">
                <label for="banner1_title" class="col-sm-2 col-form-label">banner1 Title</label>
                <div class="col-sm-10">
                    <input name="banner1_title" id="banner1_title" class="form-control" type="text" value="{{ old('banner1_title', $item->banner1_title) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="banner1_heading" class="col-sm-2 col-form-label">Banner-1 Heading </label>
                <div class="col-sm-10">
                    <input name="banner1_heading" class="form-control" type="text" value="{{ old('banner1_heading', $item->banner1_heading) }}"  id="banner1_heading" required>
                </div>
            </div> <br>
            <!-- end row -->

            <!-- <div class="row m-3">
                <label for="about_para" class="col-sm-2 col-form-label">About Paragraph </label>
                <div class="col-sm-10">
                <textarea name="about_para" class="ckeditor form-control" name="about_para"  required>
                {{ old('about_para', $item->about_para) }}
                </textarea>
                </div>
            </div> <br> -->
            <!-- end row -->
            
            <div class="form-group">
        <div class="col-6">
            <label for="banner1_bg">Banner BG-Img(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->banner1_bg) }}" alt=""><br>
            <input type="file" id="banner1_bg" onchange="readURL(this)" name="banner1_bg" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#banner1_bg').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('banner1_bg') }}</span>
    </div>
</div>
<!-- banner-1 end -->
<div><h4>Bus Types</h4> </div>

            <div class="row m-3">
                <label for="banner1_title" class="col-sm-2 col-form-label">Bus Type Title</label>
                <div class="col-sm-10">
                    <input name="banner1_title" id="banner1_title" class="form-control" type="text" value="{{ old('banner1_title', $item->banner1_title) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="banner1_heading" class="col-sm-2 col-form-label">Bus Type Heading </label>
                <div class="col-sm-10">
                    <input name="banner1_heading" class="form-control" type="text" value="{{ old('banner1_heading', $item->banner1_heading) }}"  id="banner1_heading" required>
                </div>
            </div> <br>
            <!-- end row -->

<div><h4>Sleeper Tab</h4> </div>
<!-- sleep1 -->
            <div class="row m-3">
                <label for="sleeper1_heading" class="col-sm-2 col-form-label">Sleeper-1 Heading </label>
                <div class="col-sm-4">
                    <input name="sleeper1_heading" class="form-control" type="text" value="{{ old('sleeper1_heading', $item->sleeper1_heading) }}"  id="sleeper1_heading" required>
                </div>
                <label for="sleeper1_title" class="col-sm-2 col-form-label">Sleeper-1 Title </label>
                <div class="col-sm-4">
                    <input name="sleeper1_title" class="form-control" type="text" value="{{ old('sleeper1_title', $item->sleeper1_title) }}"  id="sleeper1_title" required>
                </div>
            </div> <br>
          
            <div class="row m-3">
                <label for="sleeper1_para" class="col-sm-2 col-form-label">sleeper-1 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="sleeper1_para" class="ckeditor form-control" name="sleeper1_para"  required>
                {{ old('sleeper1_para', $item->sleeper1_para) }}
                </textarea>
                </div>

                <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="sleeper1_img">Slepper-1 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->sleeper1_img) }}" alt=""><br>
            <input type="file" id="sleeper1_img" onchange="readURL(this)" name="sleeper1_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#sleeper1_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('sleeper1_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->
 <!-- sleep-2 -->
            <div class="row m-3">
                <label for="sleeper2_heading" class="col-sm-2 col-form-label">Sleeper-2 Heading </label>
                <div class="col-sm-4">
                    <input name="sleeper2_heading" class="form-control" type="text" value="{{ old('sleeper2_heading', $item->sleeper2_heading) }}"  id="sleeper2_heading" required>
                </div>
                <label for="sleeper2_title" class="col-sm-2 col-form-label">Sleeper-2 Title </label>
                <div class="col-sm-4">
                    <input name="sleeper2_title" class="form-control" type="text" value="{{ old('sleeper2_title', $item->sleeper2_title) }}"  id="sleeper2_title" required>
                </div>
            </div> <br>
       
            <div class="row m-3">
                <label for="sleeper2_para" class="col-sm-2 col-form-label">sleeper-2 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="sleeper2_para" class="ckeditor form-control" name="sleeper2_para"  required>
                {{ old('sleeper2_para', $item->sleeper2_para) }}
                </textarea>
                </div>

               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="sleeper2_img">Slepper-1 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->sleeper2_img) }}" alt=""><br>
            <input type="file" id="sleeper2_img" onchange="readURL(this)" name="sleeper2_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#sleeper2_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('sleeper2_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->

 <!-- sleep-3 -->
            <div class="row m-3">
                <label for="sleeper3_heading" class="col-sm-2 col-form-label">Sleeper-3 Heading </label>
                <div class="col-sm-4">
                    <input name="sleeper3_heading" class="form-control" type="text" value="{{ old('sleeper3_heading', $item->sleeper3_heading) }}"  id="sleeper3_heading" required>
                </div>
                <label for="sleeper3_title" class="col-sm-2 col-form-label">Sleeper-3 Title </label>
                <div class="col-sm-4">
                    <input name="sleeper3_title" class="form-control" type="text" value="{{ old('sleeper3_title', $item->sleeper3_title) }}"  id="sleeper3_title" required>
                </div>
            </div> <br>
        
            <div class="row m-3">
                <label for="sleeper3_para" class="col-sm-2 col-form-label">sleeper-3 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="sleeper3_para" class="ckeditor form-control" name="sleeper3_para"  required>
                {{ old('sleeper3_para', $item->sleeper3_para) }}
                </textarea>
                </div>
               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="sleeper3_img">Slepper-1 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->sleeper3_img) }}" alt=""><br>
            <input type="file" id="sleeper3_img" onchange="readURL(this)" name="sleeper3_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#sleeper3_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('sleeper3_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->

 <div><h4>Semi_Sleeper Tab</h4> </div>
<!--semi_sleep1 -->
            <div class="row m-3">
                <label for="semi_sleeper1_heading" class="col-sm-2 col-form-label">Semi_Sleeper-1 Heading </label>
                <div class="col-sm-4">
                    <input name="semi_sleeper1_heading" class="form-control" type="text" value="{{ old('semi_sleeper1_heading', $item->semi_sleeper1_heading) }}"  id="semi_sleeper1_heading" required>
                </div>
                <label for="semi_sleeper1_title" class="col-sm-2 col-form-label">Semi_Sleeper-1 Title </label>
                <div class="col-sm-4">
                    <input name="semi_sleeper1_title" class="form-control" type="text" value="{{ old('semi_sleeper1_title', $item->semi_sleeper1_title) }}"  id="semi_sleeper1_title" required>
                </div>
            </div> <br>
        
            <div class="row m-3">
                <label for="semi_sleeper1_para" class="col-sm-2 col-form-label">Semi_Sleeper-1 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="semi_sleeper1_para" class="ckeditor form-control" name="semi_sleeper1_para"  required>
                {{ old('semi_sleeper1_para', $item->semi_sleeper1_para) }}
                </textarea>
                </div>
               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="semi_sleeper1_img">Semi_Slepper-1 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->semi_sleeper1_img) }}" alt=""><br>
            <input type="file" id="semi_sleeper1_img" onchange="readURL(this)" name="semi_sleeper1_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#semi_sleeper1_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('semi_sleeper1_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->
 <!-- semi_sleep-2 -->
            <div class="row m-3">
                <label for="semi_sleeper2_heading" class="col-sm-2 col-form-label">Semi_Sleeper-2 Heading </label>
                <div class="col-sm-4">
                    <input name="semi_sleeper2_heading" class="form-control" type="text" value="{{ old('semi_sleeper2_heading', $item->semi_sleeper2_heading) }}"  id="semi_sleeper2_heading" required>
                </div>
                <label for="semi_sleeper2_title" class="col-sm-2 col-form-label">Semi_Sleeper-2 Title </label>
                <div class="col-sm-4">
                    <input name="semi_sleeper2_title" class="form-control" type="text" value="{{ old('semi_sleeper2_title', $item->semi_sleeper2_title) }}"  id="semi_sleeper2_title" required>
                </div>
            </div> <br>
         
            <div class="row m-3">
                <label for="semi_sleeper2_para" class="col-sm-2 col-form-label">Semi_sleeper-2 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="semi_sleeper2_para" class="ckeditor form-control" name="semi_sleeper2_para"  required>
                {{ old('semi_sleeper2_para', $item->semi_sleeper2_para) }}
                </textarea>
                </div>
               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="semi_sleeper2_img">Semi_Slepper-2 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->semi_sleeper2_img) }}" alt=""><br>
            <input type="file" id="semi_sleeper2_img" onchange="readURL(this)" name="semi_sleeper2_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#semi_sleeper2_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('semi_sleeper2_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->

 <!-- semi-sleep-3 -->
            <div class="row m-3">
                <label for="semi_sleeper3_heading" class="col-sm-2 col-form-label">Semi-Sleeper-3 Heading </label>
                <div class="col-sm-4">
                    <input name="semi_sleeper3_heading" class="form-control" type="text" value="{{ old('semi_sleeper3_heading', $item->semi_sleeper3_heading) }}"  id="semi_sleeper3_heading" required>
                </div>
                <label for="semi_sleeper3_title" class="col-sm-2 col-form-label">Semi-Sleeper-3 Title </label>
                <div class="col-sm-4">
                    <input name="semi_sleeper3_title" class="form-control" type="text" value="{{ old('semi_sleeper3_title', $item->semi_sleeper3_title) }}"  id="semi_sleeper3_title" required>
                </div>
            </div> <br>
        
            <div class="row m-3">
                <label for="semi_sleeper3_para" class="col-sm-2 col-form-label">Semi-sleeper-3 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="semi_sleeper3_para" class="ckeditor form-control" name="semi_sleeper3_para"  required>
                {{ old('semi_sleeper3_para', $item->semi_sleeper3_para) }}
                </textarea>
                </div>
               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="semi_sleeper3_img">Semi-Slepper-3 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->semi_sleeper3_img) }}" alt=""><br>
            <input type="file" id="semi_sleeper3_img" onchange="readURL(this)" name="semi_sleeper3_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#semi_sleeper3_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('semi_sleeper3_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->

<div><h4>Seater Tab</h4> </div>
<!--seater_sleep1 -->
            <div class="row m-3">
                <label for="seater1_heading" class="col-sm-2 col-form-label">Seater-1 Heading </label>
                <div class="col-sm-4">
                    <input name="seater1_heading" class="form-control" type="text" value="{{ old('seater1_heading', $item->seater1_heading) }}"  id="seater1_heading" required>
                </div>
                <label for="seater1_title" class="col-sm-2 col-form-label">Seater-1 Title </label>
                <div class="col-sm-4">
                    <input name="seater1_title" class="form-control" type="text" value="{{ old('seater1_title', $item->seater1_title) }}"  id="seater1_title" required>
                </div>
            </div> <br>
        
            <div class="row m-3">
                <label for="seater1_para" class="col-sm-2 col-form-label">Seater-1 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="seater1_para" class="ckeditor form-control" name="seater1_para"  required>
                {{ old('seater1_para', $item->seater1_para) }}
                </textarea>
                </div>
               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="seater1_img">Seater-1 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->seater1_img) }}" alt=""><br>
            <input type="file" id="seater1_img" onchange="readURL(this)" name="seater1_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#seater1_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('seater1_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->
 <!-- seater-2 -->
            <div class="row m-3">
                <label for="seater2_heading" class="col-sm-2 col-form-label">Seater-2 Heading </label>
                <div class="col-sm-4">
                    <input name="seater2_heading" class="form-control" type="text" value="{{ old('seater2_heading', $item->seater2_heading) }}"  id="seater2_heading" required>
                </div>
                <label for="seater2_title" class="col-sm-2 col-form-label">Seater-2 Title </label>
                <div class="col-sm-4">
                    <input name="seater2_title" class="form-control" type="text" value="{{ old('seater2_title', $item->seater2_title) }}"  id="seater2_title" required>
                </div>
            </div> <br>
         
            <div class="row m-3">
                <label for="seater2_para" class="col-sm-2 col-form-label">Seater Paragraph </label>
                <div class="col-sm-5">
                <textarea name="seater2_para" class="ckeditor form-control" name="seater2_para"  required>
                {{ old('seater2_para', $item->seater2_para) }}
                </textarea>
                </div>
               <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="seater2_img">Seater-2 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->seater2_img) }}" alt=""><br>
            <input type="file" id="seater2_img" onchange="readURL(this)" name="seater2_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#seater2_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('seater2_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
            <!-- end row -->

 <!-- seater-3 -->
            <div class="row m-3">
                <label for="seater3_heading" class="col-sm-2 col-form-label">Seater-3 Heading </label>
                <div class="col-sm-4">
                    <input name="seater3_heading" class="form-control" type="text" value="{{ old('seater3_heading', $item->seater3_heading) }}"  id="seater3_heading" required>
                </div>
                <label for="seater3_title" class="col-sm-2 col-form-label">Seater-3 Title </label>
                <div class="col-sm-4">
                    <input name="seater3_title" class="form-control" type="text" value="{{ old('seater3_title', $item->seater3_title) }}"  id="seater3_title" required>
                </div>
            </div> <br>
        
            <div class="row m-3">
                <label for="seater3_para" class="col-sm-2 col-form-label">Seater-3 Paragraph </label>
                <div class="col-sm-5">
                <textarea name="seater3_para" class="ckeditor form-control" name="seater3_para"  required>
                {{ old('seater3_para', $item->seater3_para) }}
                </textarea>
                </div>
     <div class="col-sm-5">
                <div class="form-group">
        <div class="col-sm-12">
            <label for="seater3_img">Seater-3 Img(1200x900px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->seater3_img) }}" alt=""><br>
            <input type="file" id="seater3_img" onchange="readURL(this)" name="seater3_img" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#seater3_img').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('seater3_img') }}</span>
    </div>
</div>
</div>
            </div> <br>
     <!-- end row -->
           
<!-- bus types end -->

<div><h4>Banner-2</h4> </div>

            <div class="row m-3">
                <label for="banner2_title" class="col-sm-2 col-form-label">Banner2 Title</label>
                <div class="col-sm-10">
                    <input name="banner2_title" id="banner2_title" class="form-control" type="text" value="{{ old('banner2_title', $item->banner2_title) }}"   required
                    placeholder="">
                </div>
            </div> <br>
            <!-- end row -->

              <div class="row m-3">
                <label for="banner2_btn" class="col-sm-2 col-form-label">Banner-2 Button</label>
                <div class="col-sm-10">
                    <input name="banner2_btn" class="form-control" type="text" value="{{ old('banner2_btn', $item->banner2_btn) }}"  id="banner2_btn" required>
                </div>
            </div> <br>
            <!-- end row -->
            
         
            <div class="form-group">
        <div class="col-6">
            <label for="banner2_bg">Banner-2 BG-Img(1200x660px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->banner2_bg) }}" alt=""><br>
            <input type="file" id="banner2_bg" onchange="readURL(this)" name="banner2_bg" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#banner2_bg').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('banner2_bg') }}</span>
    </div>
</div>

<!-- banner-2 end -->

<div><h4>Download APP</h4> </div>
<!--semi_sleep1 -->
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
                <div class="col-sm-5">
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
                <div class="col-sm-5">
                <textarea name="dwnld_para1" class="ckeditor form-control" name="dwnld_para1"  required>
                {{ old('dwnld_para1', $item->dwnld_para1) }}
                </textarea>
                </div> 
            </div> <br>
            <h4>User</h4>
            <div class="row m-3">
                
                <label for="dwnld_playstore" class="col-sm-2 col-form-label">Play Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld_playstore" class="form-control" type="url" value="{{ old('dwnld_playstore', $item->dwnld_playstore) }}"  id="dwnld_playstore" required>
                </div> 
                <label for="dwnld_appstore" class="col-sm-2 col-form-label">App Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld_appstore" class="form-control" type="url" value="{{ old('dwnld_appstore', $item->dwnld_appstore) }}"  id="dwnld_appstore" required>
                </div> 
                <br></div>

             <h4>Driver</h4>
                <div class="row m-5"> 
                <label for="dwnld1_playstore" class="col-sm-2 col-form-label">Play Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld1_playstore" class="form-control" type="url" value="{{ old('dwnld1_playstore', $item->dwnld1_playstore) }}"  id="dwnld1_playstore" required>
                </div> 
                <label for="dwnld1_appstore" class="col-sm-2 col-form-label">App Store Link</label>
                <div class="col-sm-4">
                    <input name="dwnld1_appstore" class="form-control" type="url" value="{{ old('dwnld1_appstore', $item->dwnld1_appstore) }}"  id="dwnld1_appstore" required>
                </div> 
 <br>
            <!-- end row -->
            
</div>   <!-- end row -->
            
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