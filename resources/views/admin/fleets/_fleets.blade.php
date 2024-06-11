<div class="row p-0 m-0">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="col-sm-12 p-0">
                    <table class="table table-hover" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                 <th>{{ trans('view_pages.s_no')}}</th>
                                 <th>{{ trans('view_pages.travels_name')}}</th>
                                 <th>{{ trans('view_pages.bus_brand')}}</th>
                                 <th>{{ trans('view_pages.bus_model')}}</th>
                                 <th> @lang('view_pages.document_view')</th>
                                 <th>{{ trans('view_pages.license_number')}}</th>
                                 <th>{{ trans('view_pages.status')}}</th>
                                <th>{{ trans('view_pages.action')}}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @if (count($results) == 0)
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
                                <tr class="odd">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $result->owner->company_name }}</td>
                                    <td>{{ $result->brand }}</td>
                                    <td>{{ $result->model }}</td>
                                    <td class="manage-driver text-center">
                                    <a href="{{url('fleets/document/view', $result->id) }}" class="btn btn-social-icon btn-bitbucket">
                                    <i class="fa fa-file-code-o"></i>
                                    </a>
                                    </td>

<!--                                     <td>
                                        @if ($result->approve)
                                            <a href="{{ $result->qr_code_image }}" download title="Click to Download">
                                                <img src="{{ $result->qr_code_image }}" alt="" width="30" height="30">
                                            </a>
                                        @else
                                            -
                                        @endif

                                    </td> -->
                                    <td>{{ $result->license_number }}</td>
                                    <td>
                                        @if($result->approve)
                                            <span class="badge badge-success">@lang('view_pages.approved')</span>
                                        @else
                                            <span class="badge badge-danger">@lang('view_pages.blocked')</span>
                                        @endif
                                    </td>


                                    <td>
                                  <div class="dropdown">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
                                             </button>
                                           <div class="dropdown-menu">
                                                @if (auth()->user()->hasRole('owner'))
                                                {{-- <a class="dropdown-item" href="{{url('fleets/assign_driver',$result->id) }}">{{ trans('view_pages.assign_driver')}}</a> --}}
                                                @endif
                                                @if (auth()->user()->hasRole('owner'))
                                                    <a class="dropdown-item" href="{{url('fleets/edit',$result->id) }}">{{ trans('view_pages.edit')}}</a>
                                                    @endif

                                                    @if (auth()->user()->can('toggle-fleet-approval'))
                                                        @if($result->approve)
                                                        {{-- sweet-decline   --}}
                                                            <a class="decline dropdown-item" data-reason="{{ $result->reason }}" data-id="{{ $result->id }}" href="{{url('fleets/toggle_approve',$result->id)}}">@lang('view_pages.decline')</a>
                                                        @else
                                                            <a class="sweet-approve dropdown-item" href="{{url('fleets/toggle_approve',$result->id)}}">@lang('view_pages.approve')</a>
                                                        @endif


                                                    @if (auth()->user()->can('delete-fleet'))
                                                    <a class="sweet-delete dropdown-item" href="{{url('fleets/delete',$result->id) }}">{{ trans('view_pages.delete')}}</a>
                                                    @endif
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
