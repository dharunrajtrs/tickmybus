<table class="table table-hover">
    <thead>
        <tr>
            <th> @lang('view_pages.s_no')</th>
            <!-- <th> @lang('view_pages.route_id')</th> -->
            <th> @lang('view_pages.rest_stop_address')</th>
            <th> @lang('view_pages.landmark')</th>
            <th> @lang('view_pages.action')</th>
           
        </tr>
    </thead>

<tbody>
    
    @php  $i= $results->firstItem();  @endphp

    @forelse($results as $key => $result)

        <tr>
            <td>{{ $i++ }} </td>
            <!-- <td>{{$result->route_id}}</td> -->
            <td>{{$result->rest_stop_address}}</td>
            <td>{{$result->landmark}}</td>

            <!-- @if($result->active)
            <td><span class="label label-success">@lang('view_pages.active')</span></td>
            @else
            <td><span class="label label-danger">@lang('view_pages.inactive')</span></td>
            @endif -->
            <td>

            <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
                <div class="dropdown-menu">
                @if(auth()->user()->can('edit-rest'))         
                    <a class="dropdown-item" href="{{url('rest',$result->id)}}"><i class="fa fa-pencil"></i>@lang('view_pages.edit')</a>
                @endif

                {{--   @if($result->active)
                    <a class="dropdown-item" href="{{url('rest/toggle_status',$result->id)}}"><i class="fa fa-dot-circle-o"></i>@lang('view_pages.inactive')</a>
                    @else
                    <a class="dropdown-item" href="{{url('rest/toggle_status',$result->id)}}"><i class="fa fa-dot-circle-o"></i>@lang('view_pages.active')</a>
                    @endif     --}} 

                     <a class="dropdown-item sweet-delete" href="{{url('rest/delete',$result->id)}}"><i class="fa fa-trash-o"></i>@lang('view_pages.delete')</a>
                </div>
            </div>

            </td>
        </tr>
    @empty
        <tr>
            <td colspan="11">
                <p id="no_data" class="lead no-data text-center">
                    <img src="{{asset('assets/img/empty-box.png')}}" style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                    <h5 class="text-center" style="color:#333;font-size:20px;">@lang('view_pages.no_data_found')</h5>
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

