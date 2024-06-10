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
                            <a href="{{ url('users') }}">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    @lang('view_pages.back')
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="{{ url('users/import') }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    
                                                   <div class="col-sm-6">
                      <div class="form-group">
                        <label for="import">@lang('view_pages.select_file') <span class="text-danger">*</span></label>
                                     <input type="file" name="file"
                           class="form-control">
                            <button class="btn btn-sm btn-success">
                          Import
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

    <!-- container -->


    <!-- content -->

@endsection
