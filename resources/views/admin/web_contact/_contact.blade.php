<table class="table table-hover">
    <thead>
        <tr>
            <th> @lang('view_pages.s_no')</th>
            <th> Phone</th>
            <th> Address</th>
            <th> @lang('view_pages.action')</th>
           
        </tr>
    </thead>

<tbody>
    
    @php  $i= $results->firstItem();  @endphp

    @forelse($results as $key => $result)

        <tr>
            <td>{{ $i++ }} </td>
            <td>{{$result->phone}}</td>
            <td>{{$result->address}}</td>
            <td>

            <button type="button" class="btn btn-info btn-sm text-white"  >
            @if(auth()->user()->can('edit-contact'))         
                    <a class="text-white" href="{{url('contact',$result->id)}}"><i class="fa fa-pencil"></i>@lang('view_pages.edit')</a>
                @endif
            </button>

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

