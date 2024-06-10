@extends('admin.layouts.app')

@section('title', 'Journey')

@section('content')

<!-- Start Page content -->
<section class="content">
{{-- <div class="container-fluid"> --}}

<div class="row">
<div class="col-12">
<div class="box">

    <div class="box-header with-border">
        <div class="row text-right">
                     <div class="col-2">
                        <div class="form-group">
                            <input type="text" id="search_keyword" name="search" class="form-control" placeholder="Enter keyword">
                        </div>
                    </div>

                    <div class="col-1">
                        <button class="btn btn-success btn-outline btn-sm mt-5" id="search" type="submit">
                            @lang('view_pages.search')
                        </button>
                    </div> 

                            <div class="col-md-12 text-center text-md-right">
                            @if(auth()->user()->can('add-journey'))         

                                <a href="{{ url('journey/create') }}" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i>@lang('view_pages.add_journey')</a>

                            @endif
                            </div>
                        </div>
                    </div>


                    <div id="js-journey-partial-target">
                        <include-fragment src="completed/fetch">
                            <span style="text-align: center;font-weight: bold;">@lang('view_pages.loading').</span>
                        </include-fragment>
                    </div>

                </div>
            </div>
        </div>

        {{-- </div> --}}
        <!-- container -->


        <script src="{{ asset('assets/js/fetchdata.min.js') }}"></script>
        <script>
                $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data){
                        $('#js-journey-partial-target').html(data);
                    });
                });

                $('#search').on('click', function(e){
                    e.preventDefault();
                        var search_keyword = $('#search_keyword').val();
                        console.log(search_keyword);
                        fetch('completed/fetch?search='+search_keyword)
                        .then(response => response.text())
                        .then(html=>{
                            document.querySelector('#js-journey-partial-target').innerHTML = html
                        });
                });

            });
        
            $(document).on('click', '.sweet-delete', function(e) {
                e.preventDefault();

                let url = $(this).attr('data-url');
                swal({
                    title: "Are you sure to delete ?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "No! Keep it",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        swal.close();
                        $.ajax({
                            url: url,
                            cache: false,
                            success: function(res) {

                                fetch('journey/completed/fetch?search=' + search_keyword)
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('#js-journey-partial-target')
                                            .innerHTML = html
                                    });

                                $.toast({
                                    heading: '',
                                    text: res,
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'success',
                                    hideAfter: 5000,
                                    stack: 1
                                });
                            }
                        });
                    }
                });
            });

        </script>
@endsection
