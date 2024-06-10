@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')

<section class="content">
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="row text-right">
                     <div class="col-2">
                    

                    <!-- <div class="col-12 text-right">
                        <a href="{{url('service/create')}}" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus-circle mr-2"></i>@lang('view_pages.add')</a>
                    </div>  -->
                </div>
            </div>

        <div id="js-service-partial-target">
            <include-fragment src="service/fetch">
                <span style="text-align: center;font-weight: bold;">@lang('view_pages.loading')</span>
            </include-fragment>
        </div>

        </div>
    </div>
</div>

<script src="{{asset('assets/js/fetchdata.min.js')}}"></script>
<script>
    $(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url, $('#search').serialize(), function(data){
            $('#js-service-partial-target').html(data);
        });
    });

    $('#search').on('click', function(e){
        e.preventDefault();
            var search_keyword = $('#search_keyword').val();
            console.log(search_keyword);
            fetch('service/fetch?search='+search_keyword)
            .then(response => response.text())
            .then(html=>{
                document.querySelector('#js-service-partial-target').innerHTML = html
            });
    });

});
</script>
@endsection