@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')




<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h2 class="card-title">Terms & Condition Page </h2>
            
     <form method="post" class="form-horizontal" action="{{ url('term/update',$item->id) }}" enctype="multipart/form-data">
                @csrf

     <div class="container">

        <div><h4>Terms and Condition Section</h4> </div>

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
                <label for="terms" class="col-sm-2 col-form-label">Terms & Conditions </label>
                <div class="col-sm-10">
                <textarea name="terms" class="ckeditor form-control" name="terms"  required>
                {{ old('terms', $item->terms) }}
                </textarea>
                </div>
            </div> 
            </div> <br>
            <!-- end row -->            
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