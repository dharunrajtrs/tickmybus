@extends('admin.layouts.app')
@section('title', 'Main page')

@section('content')




<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
    <div class="box-header with-border">
                            <a href="{{ url('home') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>
        <div class="card-body">

            <h4 class="card-title">Home Slide Page </h4>
            
            <form method="post" action="{{ url('web_home/store') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" class="form-control" type="text" value=""  id="example-text-input">
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title </label>
                <div class="col-sm-10">
                    <input name="short_title" class="form-control" type="text" value=""  id="example-text-input">
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL </label>
                <div class="col-sm-10">
                    <input name="video_url" class="form-control" type="text" value=""  id="example-text-input">
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image </label>
                <div class="col-sm-10">
       <input name="home_slide" class="form-control" type="file"  id="image">
                </div>
            </div>
            <!-- end row -->

<input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
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