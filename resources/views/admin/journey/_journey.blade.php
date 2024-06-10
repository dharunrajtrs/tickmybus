<table class="table table-hover">
    <thead>
        <tr>
            <th> @lang('view_pages.s_no')</th>
            <th> @lang('view_pages.license_number')</th>
            <th> @lang('view_pages.journey_number')</th>
            <th> @lang('view_pages.depature')</th>
            <th> @lang('view_pages.arrival')</th>
            <!-- <th> @lang('view_pages.from')</th>
            <th> @lang('view_pages.to')</th> -->
            <th> @lang('view_pages.driver_status')</th>
            <th> @lang('view_pages.action')</th>
        </tr>
    </thead>

<tbody>
    @php  $i= $results->firstItem(); @endphp

    @forelse($results as $key => $result)
        <tr>
            <td>{{ $i++ }} </td>
            <td>{{$result->fleet->license_number ?? '-'}}</td>
            <td>{{$result->journey_number }}</td>
            <td>{{$result->getConvertedDepatureAtAttribute()}}</td>
            <td>{{$result->getConvertedArrivedAtAttribute()}}</td>
            @if($result->driver_id != null)
            <td><button class="btn btn-success btn-sm">{{ trans('view_pages.assigned') }}</button></td>
            @else
            <td><button class="btn btn-danger btn-sm">{{ trans('view_pages.un_assigned') }}</button></td>
            @endif
            <!-- <td>{{$result->from}}</td>
            <td>{{$result->to}}</td> -->

            <td>

            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
             <div class="dropdown-menu">
                @if (auth()->user()->can('edit-journey'))
                    <a class="dropdown-item" href="{{url('journey/edit',$result->id)}}"><i class="fa fa-pencil"></i>@lang('view_pages.edit')</a>
                @endif
                @if (auth()->user()->can('view-journey'))
                   <a class="dropdown-item" href="{{url('journey/view',$result->id)}}">
                   <i class="fa fa-trash-o"></i>@lang('view_pages.view')</a>
                @endif  

            @if(($result->is_cancelled == 0 ) && ($result->is_completed == 0))

                @if (auth()->user()->can('assign-driver'))
                    <a class="dropdown-item" href="{{url('journey/assign-driver',$result->id)}}"> <i class="fa fa-dot-circle-o"></i>@lang('view_pages.assign_driver')</a>
                @endif  
            @endif 
                @if (auth()->user()->can('cancel-journey'))
                   <a class="dropdown-item" href="{{url('journey/cancel',$result->id)}}">
                   <i class="fa fa-trash-o"></i>@lang('view_pages.cancel')</a>
                @endif                     
                @if (auth()->user()->can('delete-journey'))
                   <a class="dropdown-item sweet-delete" href="#" data-url="{{url('journey/delete',$result->id)}}">
                   <i class="fa fa-trash-o"></i>@lang('view_pages.delete')</a>
                @endif
              </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11">
                <p id="no_data" class="lead no-data text-center">
                    <img src="{{asset('assets/img/dark-data.svg')}}" style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                    <h4 class="text-center" style="color:#333;font-size:25px;">@lang('view_pages.no_data_found')</h4>
                </p>
            </td>
        </tr>
    @endforelse

    </tbody>
    </table>
    <ul class="pagination pagination-sm pull-right">
        <li>
            <a href="#">{{$results->links()}}</a>
        </li>
    </ul>
