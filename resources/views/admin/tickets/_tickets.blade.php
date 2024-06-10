<table class="table table-hover">
    <thead>
        <tr>
            <th> @lang('view_pages.s_no')</th>
            <th> @lang('view_pages.name')</th>
            <th> @lang('view_pages.ticket_no')</th>
            <th> @lang('view_pages.bus_number')</th>
            <th> @lang('view_pages.from')</th>
            <th> @lang('view_pages.to')</th>
            <th> @lang('view_pages.action')</th>
        </tr>
    </thead>

<tbody>
    @php  $i= 1; @endphp

    @forelse($results as $key => $result)


        <tr>
            <td>{{ $i++ }} </td>
            <td>{{$result->user->name}}</td>
            <td>{{$result->ticket_number}}</td>
            <td>{{$result->journey->fleet->license_number}}</td>
            <td>{{$result->journey->fromCity->city}}</td>
            <td>{{$result->journey->toCity->city}}</td>

           
            <td>
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
            </button>
             <div class="dropdown-menu">
                @if (auth()->user()->can('view_passender_list'))
                    <a class="dropdown-item" href="{{url('tickets/passengers',$result->id)}}"><i class="fa fa-pencil"></i>@lang('view_pages.passengers')</a>
                @endif
<!--               @if (auth()->user()->can('delete-ticket'))
                    <a class="dropdown-item sweet-delete" href="{{url('ticket/delete',$result->id)}}"><i class="fa fa-trash-o"></i>@lang('view_pages.delete')</a>
              @endif -->
                </div>
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