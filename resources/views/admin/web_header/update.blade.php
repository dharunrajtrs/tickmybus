 <!-- Color Picker -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
    <!-- Color Picker -->






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
            
     <form method="post" class="form-horizontal" action="{{ url('header/update',$item->id) }}" enctype="multipart/form-data">
                @csrf

     <div class="container">

        <div><h4>Header</h4> </div>
       
            <div class="row m-3">
                <label for="theme_color" class="col-sm-2 col-form-label">Theme-Color</label>
                <div id="cp1" class="col-sm-10 input-group colorpicker-component">
                    <input name="theme_color" id="theme_color" class="form-control" type="text" value="{{ old('theme_color', $item->theme_color) }}"   required
                    placeholder="">
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div> <br>
            <!-- end row -->
            <div class="form-group">
        <div class="col-6">
            <label for="fevicon">Fevicon(150x100px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->fevicon) }}" alt=""><br>
            <input type="file" id="fevicon" onchange="readURL(this)" name="fevicon" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#fevicon').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('fevicon') }}</span>
    </div>
</div>
<div class="form-group">
        <div class="col-6">
            <label for="logo">Logo(200x150px)</label><br>
            <img id="blah" style="width:30%;" src="{{ asset('storage/uploads/website/images/' .$item->logo) }}" alt=""><br>
            <input type="file" id="logo" onchange="readURL(this)" name="logo" style="display:none">
            <button class="btn btn-primary btn-sm mt-2" type="button" onclick="$('#logo').click()" id="upload">@lang('view_pages.browse')</button>
            <button class="btn btn-danger btn-sm mt-2" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
            <span class="text-danger">{{ $errors->first('logo') }}</span>
    </div>
</div>
<div class="row m-3">
                <label for="btn_color" class="col-sm-2 col-form-label">Button-Color</label>
                <div id="cp2" class="col-sm-10 input-group colorpicker-component">
                    <input name="btn_color" id="btn_color" class="form-control" type="text" value="{{ old('btn_color', $item->btn_color) }}"   required
                    placeholder="">
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div> <br>
            <div class="row m-3">
                <label for="heading_color" class="col-sm-2 col-form-label">Heading-Color</label>
                <div id="cp3" class="col-sm-10 input-group colorpicker-component">
                    <input name="heading_color" id="heading_color" class="form-control" type="text" value="{{ old('heading_color', $item->heading_color) }}"   required
                    placeholder="">
                    <span class="input-group-addon"><i></i></span>
                </div>
            </div> <br>

  <div><h4>Footer</h4> </div>
       
       <div class="row m-3">
           <label for="theme_color" class="col-sm-2 col-form-label">Footer-Bg-Color</label>
           <div id="cp4" class="col-sm-10 input-group colorpicker-component">
               <input name="footer_bg_color" id="footer_bg_color" class="form-control" type="text" value="{{ old('footer_bg_color', $item->footer_bg_color) }}"   required
               placeholder="">
               <span class="input-group-addon"><i></i></span>
           </div>
       </div> <br>
       <!-- end row -->
       <div class="form-group">
  
<!-- <div class="row m-3">
           <label for="btn_color" class="col-sm-2 col-form-label">Button-Color</label>
           <div id="cp2" class="col-sm-10 input-group colorpicker-component">
               <input name="btn_color" id="btn_color" class="form-control" type="text" value="{{ old('btn_color', $item->btn_color) }}"   required
               placeholder="">
               <span class="input-group-addon"><i></i></span>
           </div>
       </div> <br> -->

              <div class="row m-3">
                <label for="footer_about_title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="footer_about_title" class="form-control" type="text" value="{{ old('footer_about_title', $item->footer_about_title) }}"  id="footer_about_title" required>
                </div>
            </div> <br>

<div class="row m-3">
    
    <label for="footer_about_para" class="col-sm-2 col-form-label">Company Paragraph  </label>
    <div class="col-sm-10">
    <textarea name="footer_about_para" class="ckeditor form-control" name="footer_about_para"  required>
    {{ old('footer_about_para', $item->footer_about_para) }}
    </textarea>
    </div> 
</div> <br>

<h4>User Link</h4>
            <div class="row m-3">
                <label for="user_play_link" class="col-sm-2 col-form-label">Playstore Link </label>
                <div class="col-sm-10">
                    <input name="user_play_link" class="form-control" type="url" value="{{ old('user_play_link', $item->user_play_link) }}"  id="user_play_link" required>
                </div>
            </div> <br> 
            <div class="row m-3">
                <label for="user_app_link" class="col-sm-2 col-form-label">Appstore Link </label>
                <div class="col-sm-10">
                    <input name="user_app_link" class="form-control" type="url" value="{{ old('user_app_link', $item->user_app_link) }}"  id="user_app_link" required>
                </div>
            </div> <br> 
 <h4>Driver Link</h4>
            <div class="row m-3">
                <label for="driver_play_link" class="col-sm-2 col-form-label">Playstore Link </label>
                <div class="col-sm-10">
                    <input name="driver_play_link" class="form-control" type="url" value="{{ old('driver_play_link', $item->driver_play_link) }}"  id="driver_play_link" required>
                </div>
            </div> <br> 
            <div class="row m-3">
                <label for="driver_app_link" class="col-sm-2 col-form-label">Appstore Link </label>
                <div class="col-sm-10">
                    <input name="driver_app_link" class="form-control" type="url" value="{{ old('driver_app_link', $item->driver_app_link) }}"  id="driver_app_link" required>
                </div>
            </div> <br> 

 <!-- <div><h4>Footer Qulick Link</h4> </div>      
 
 <div class="row m-3">
                <label for="footer_quicklink_privacy" class="col-sm-2 col-form-label">Pricay Policy </label>
                <div class="col-sm-10">
                    <input name="footer_quicklink_privacy" class="form-control" type="url" value="{{ old('footer_quicklink_privacy', $item->footer_quicklink_privacy) }}"  id="footer_quicklink_privacy" required>
                </div>
            </div> <br> 
      <div class="row m-3">
                <label for="footer_quicklink_terms" class="col-sm-2 col-form-label">Terms & Condition </label>
                <div class="col-sm-10">
                    <input name="footer_quicklink_terms" class="form-control" type="url" value="{{ old('footer_quicklink_terms', $item->footer_quicklink_terms) }}"  id="footer_quicklink_terms" required>
                </div>
            </div> <br> 
            <div class="row m-3">
                <label for="footer_quicklink_contact" class="col-sm-2 col-form-label">Contact Us </label>
                <div class="col-sm-10">
                    <input name="footer_quicklink_contact" class="form-control" type="url" value="{{ old('footer_quicklink_contact', $item->footer_quicklink_contact) }}"  id="footer_quicklink_contact" required>
                </div>
            </div> <br>  -->

<div><h4>Footer Info</h4> </div>  
<div class="row m-3">
    
    <label for="footer_info_para" class="col-sm-2 col-form-label">Info Paragraph  </label>
    <div class="col-sm-10">
    <textarea name="footer_info_para" class="ckeditor form-control" name="footer_info_para"  required>
    {{ old('footer_info_para', $item->footer_info_para) }}
    </textarea>
    </div> 
</div> <br>
            <div class="row m-3">
                <label for="footer_info_mobile" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input name="footer_info_mobile" class="form-control" type="text" value="{{ old('footer_info_mobile', $item->footer_info_mobile) }}"  id="footer_info_mobile" required>
                </div>
            </div> <br>
            <div class="row m-3">
                <label for="footer_info_email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="footer_info_email" class="form-control" type="email" value="{{ old('footer_info_email', $item->footer_info_email) }}"  id="footer_info_email" required>
                </div>
            </div> <br>  
            <div class="row m-3">
                <label for="footer_copy_rights  " class="col-sm-2 col-form-label">Copy Rights</label>
                <div class="col-sm-10">
                    <input name="footer_copy_rights  " class="form-control" type="text" value="{{ old('footer_copy_rights  ', $item->footer_copy_rights  ) }}"  id="footer_copy_rights  " required>
                </div>
            </div> <br>       
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

</script>


<script type="text/javascript">
  $('#cp1').colorpicker();
  $('#cp2').colorpicker();
  $('#cp3').colorpicker();
  $('#cp4').colorpicker();      
  $('#cp5').colorpicker();  
  $('#cp6').colorpicker(); 
  $('#cp7').colorpicker();  
  $('#cp8').colorpicker();  
</script>
@endsection