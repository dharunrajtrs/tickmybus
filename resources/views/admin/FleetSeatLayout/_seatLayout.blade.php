<div class="row p-0 m-0">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="col-sm-12 p-0">
                    <table class="table table-hover" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                 <th>{{ trans('view_pages.s_no')}}</th>
                                 <th>{{ trans('view_pages.seat_layout_name')}}</th>
                                <th>{{ trans('view_pages.action')}}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @if (count($results) == 0)
                                <td class="no-result" colspan="11">{{ trans('view_pages.no_data_found')}}</td>
                                 <tr>
                                            <td colspan="11">
                                                <p id="no_data" class="lead no-data text-center">
                                                    <img src="{{asset('assets/img/empty-box.png')}}" style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                                                    <h4 class="text-center" style="color:#333;font-size:25px;">@lang('view_pages.no_data_found')</h4>
                                                </p>
                                            </td>
                                        </tr>
                            @endif

                            @php
                                $i = $results->firstItem();
                            @endphp

                            @foreach ($results as $key => $result)
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{ $result->fleet->seat_layout_name ?? '-'}}</td>
                                  <td>
                                  <div class="dropdown">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
                                             </button>
                                           <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{url('fleet_seat_layout/edit/'.$result->fleet_id) }}">{{ trans('view_pages.view_and_modify_seats')}}
                                                </a>

                                               @if (auth()->user()->can('delete_seat_layout'))
                                                <a class="dropdown-item sweet-delete"  href="#" data-url="{{url('fleet_seat_layout/delete/'.$result->fleet_id)}}">{{ trans('view_pages.delete')}}</a>
                                                @endif

                                          </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="">
                <div class="col-sm-12 col-md-5 float-left">

                </div>
                <div class="col-sm-12 col-md-7 float-left">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination float-right">
                            {{ $results->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
