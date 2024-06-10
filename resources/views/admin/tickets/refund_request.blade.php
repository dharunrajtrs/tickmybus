@extends('admin.layouts.app')
@section('title', 'Main page')


@section('content')
<br>
<div class="content">
<div class="container-fluid">

 <div class="content">

        <div class="row">
            <div class="col-12">
        <div class="box">            
            <table class="table table-hover">
    <thead>
        <tr>
            <th> @lang('view_pages.s_no')</th>
            <th> @lang('view_pages.date')</th>
            <th> @lang('view_pages.name')</th>
            <th> @lang('view_pages.ticket_number')</th>
            <th> @lang('view_pages.refund_amount')</th>
            <th> @lang('view_pages.status')</th>
            <th> @lang('view_pages.action')</th>
           
        </tr>
    </thead>
    <tbody>

        @forelse($history as $key => $result)

        <tr>
            <td>{{ $key+1 }} </td>
            <td>{{$result->getConvertedCreatedAtAttribute()}}</td>
            <td>{{$result->userDetail->name }}</td>
            <td> {{$result->userDetail->journeyUser->ticket_number}} </td>
            <td> {{$result->userDetail->journeyUser->ticket_fare}} </td>
            @if ($result->status == 0)
                <td><button class="btn btn-success btn-sm">@lang('view_pages.requested')</button></td>
            @elseif($result->status==1)
                 <td><button class="btn btn-primary btn-sm">@lang('view_pages.approved')</button></td>
            @else
                 <td><button class="btn btn-danger btn-sm">@lang('view_pages.declined')</button></td>
            @endif
            <td>
                <div class="dropdown">
<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('view_pages.action')
</button>
 <div class="dropdown-menu">
        @if(auth()->user()->can('refund_request'))         
        <a class="dropdown-item" href="{{url('tickets/cancelled_tickets/view',$result->user_id)}}">
        <i class="fa fa-dot-circle-o"></i>@lang('view_pages.view_in_detail')</a>
       @endif
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


        </div>
        </div>
        </div>
        </div>

        

       

</div>

</div>
<!-- container -->

</div>

@endsection

