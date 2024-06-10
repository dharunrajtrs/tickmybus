@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')

    <!-- Start Page content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">

                    <div class="box-header with-border">
                        <div class="row text-right">

                            <div class="col-8 col-md-3">
                                <div class="form-group">
                                    <input type="text" id="search_keyword" name="search" class="form-control"
                                        placeholder="@lang('view_pages.enter_keyword')">
                                </div>
                            </div>

                            <div class="col-4 col-md-2 text-left">
                                <button id="search" class="btn btn-success btn-outline btn-sm py-2" type="submit">
                                    @lang('view_pages.search')
                                </button>
                            </div>

                            <div class="col-md-7 text-center text-md-right">
                                <button class="btn btn-outline btn-sm btn-danger py-2" type="button" data-toggle="modal"
                                    data-target="#ticket-modal">
                                   @lang('view_pages.filter_tickets')
                                </button>
                            </div>
                        </div>
                    </div>


                    <div id="js-ticket-partial-target" class="table-responsive">
                        <include-fragment src="cancelled_ticket/fetch">
                            <span style="text-align: center;font-weight: bold;">@lang('view_pages.loading')</span>
                        </include-fragment>
                    </div>

                </div>
            </div>
        </div>

        {{-- </div> --}}
        <!-- container -->



        <script src="{{ asset('assets/js/fetchdata.min.js') }}"></script>
        <script>
            var query = '';
            var search_keyword = '';

            $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data) {
                        $('#js-ticket-partial-target').html(data);
                    });
                });

                $('#search').on('click', function(e) {
                    e.preventDefault();
                    search_keyword = $('#search_keyword').val();
                    console.log(search_keyword);
                    fetch('tickets/cancelled_ticket/fetch?search=' + search_keyword)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-ticket-partial-target').innerHTML = html
                        });
                });


                $('.filter,.resetfilter').on('click', function() {
                    let filterColumn = ['trip_status', 'is_paid', 'payment_opt'];
                    let className = $(this);

                    $.each(filterColumn, function(index, value) {
                        if (className.hasClass('resetfilter')) {
                            $('input[name="' + value + '"]').prop('checked', false);
                            query = '';
                        } else if ($('input[name="' + value + '"]:checked').attr('id') !=
                            undefined) {
                            var activeVal = $('input[name="' + value + '"]:checked').attr(
                                'data-val');

                            if (value == 'trip_status') {
                                value = $('input[name="' + value + '"]:checked').attr('id');
                            }

                            query += value + '=' + activeVal + '&';
                        }
                    });

                    fetch('tickets/cancelled_ticket/fetch?' + query)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-ticket-partial-target').innerHTML = html
                        });
                });

            });

        </script>
    @endsection
