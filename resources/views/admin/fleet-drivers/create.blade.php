@extends('admin.layouts.app')
@section('title', 'Main page')


@section('content')

<!-- Start Page content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
    <div class="box">

        <div class="box-header with-border">
            <a href="{{ url('fleet-drivers') }}">
                <button class="btn btn-danger btn-sm pull-right" type="submit">
                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                    @lang('view_pages.back')
                </button>
            </a>
        </div>

<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="{{url('fleet-drivers/store')}}" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
<div class="col-sm-12">
    <div class="form-group">
    <label for="name">@lang('view_pages.name') <span class="text-danger">*</span></label>
    <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}" required="" placeholder="@lang('view_pages.enter_name')">
    <span class="text-danger">{{ $errors->first('name') }}</span>

</div>

</div>

<div class="row">

    </div>
<!--  <div class="col-sm-6">
            <div class="form-group">
            <label for="address">@lang('view_pages.address')</label>
            <input class="form-control" type="text" id="address" name="address" value="{{old('address')}}" required="" placeholder="@lang('view_pages.enter_address')">
            <span class="text-danger">{{ $errors->first('address') }}</span>

        </div>
    </div> -->
</div>

<div class="row">
    <div class="col-6">
<div class="form-group">
<label for="gender">@lang('view_pages.gender')
    <span class="text-danger">*</span>
</label>
<select name="gender" id="gender" class="form-control" required>
    <option value="" >@lang('view_pages.select_gender')</option>
    <option value= 'male' {{ old('gender') == 'male' ? 'selected' : '' }}>@lang('view_pages.male')</option>
    <option value= 'fe-male' {{ old('gender') == 'female' ? 'selected' : '' }}>@lang('view_pages.female')</option>
    <option value= 'others' {{ old('gender') == 'others' ? 'selected' : '' }}>@lang('view_pages.others')</option>
   </select>
<span class="text-danger">{{ $errors->first('gender') }}</span>

</div>
</div>
<div class="col-sm-6">
    <div class="form-group">
    <label for="name">@lang('view_pages.mobile') <span class="text-danger">*</span></label>
    <input class="form-control" type="text" id="mobile" name="mobile" value="{{old('mobile')}}" required="" placeholder="@lang('view_pages.enter_mobile')">
    <span class="text-danger">{{ $errors->first('mobile') }}</span>

</div>
</div>
</div>

<div class="row">
       <div class="col-sm-6">
        <div class="form-group">
            <label for="email">@lang('view_pages.email') <span class="text-danger">*</span></label>
            <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}" required="" placeholder="@lang('view_pages.enter_email')">
            <span class="text-danger">{{ $errors->first('email') }}</span>


        </div>
    </div>
    <div class="col-sm-6">
    <div  class="form-group">
        <label for="address">@lang('view_pages.address') <span
        class="text-danger">*</span></label>
        <input class="form-control" type="text" id="address"
        name="address" value="{{ old('address') }}"
        placeholder="@lang('view_pages.enter') @lang('view_pages.address')">
        <span
        class="text-danger">{{ $errors->first('address') }}</span>
        <input type="hidden" class="form-control" id="address_lat"
        name="address_lat">
        <input type="hidden" class="form-control" id="address_lng"
        name="address_lng">

        </div>
    </div>
</div>






 <div class="row">
      <div class="col-sm-6">
            <div class="form-group">
            <label for="city">@lang('view_pages.city')</label>
            <input class="form-control" type="text" id="city" name="city" value="{{old('city')}}" required="" placeholder="@lang('view_pages.enter_city')">
            <span class="text-danger">{{ $errors->first('city') }}</span>

        </div>
    </div>
       <div class="col-sm-6">
            <div class="form-group">
            <label for="postal_code">@lang('view_pages.postal_code')</label>
            <input class="form-control" type="number" id="city" name="postal_code" value="{{old('postal_code')}}" required="" placeholder="@lang('view_pages.enter_postal_code')">
            <span class="text-danger">{{ $errors->first('postal_code') }}</span>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6" style="display: none">
        <div class="form-group">
            <label for="owner">@lang('view_pages.owner')
                <span class="text-danger">*</span>
            </label>
            <select name="owner_id" id="owner_id" class="form-control" required>

                <option value="{{$owner->id}}" selected>{{$owner->name}}</option>

            </select>
            </div>
       </div>
<div class="col-sm-6">
    <label for="profile_picture">@lang('view_pages.profile')</label><br>
    <img id="blah" src="#" alt=""><br>
    <input type="file" id="icon" onchange="readURL(this)" name="profile_picture" style="display:none">
    <button class="btn btn-primary btn-sm" type="button" onclick="$('#icon').click()" id="upload">@lang('view_pages.browse')</button>
    <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;">@lang('view_pages.remove')</button><br>
    <span class="text-danger">{{ $errors->first('icon') }}</span>
</div>
</div>
</div>


<div class="form-group">
        <div class="col-6">

</div>


<div class="form-group">
        <div class="col-12">
            <button class="btn btn-primary btn-sm m-5 pull-right" type="submit">
                @lang('view_pages.save')
            </button>
        </div>
    </div>

</form>

            </div>
        </div>


    </div>
</div>
</div>

</div>
<!-- container -->

</div>
<!-- content -->
<!-- jQuery 3 -->
    <script src="{{asset('assets/vendor_components/jquery/dist/jquery.js')}}"></script>
<script>
    let oldCarMake = "{{ old('car_make') }}";
    let oldCarModel = "{{ old('car_model') }}";

    if(oldCarMake){
        getCarModel(oldCarMake,oldCarModel);
    }

    $('#is_company_driver').change(function() {
        var value = $(this).val();
        if(value == 1){
            $('#companyShow').show();
        }else{
            $('#companyShow').hide();
        }
    });

    function getypesAndCompany(){

            var admin_id = document.getElementById('admin_id').value;
            var ajaxPath = "<?php echo url('types/by/admin');?>";
            var ajaxCompanyPath = "<?php echo url('company/by/admin');?>";

            $.ajax({
                url: ajaxPath,
                type:  'GET',
                data: {
                    'admin_id': admin_id,
                },
                success: function(result)
                {
                    $('#type').empty();

                    $("#type").append('<option value="">Select Type</option>');

                    for(var i = 0 ; i < result.data.length ; i++)
                    {
                        console.log(result.data[i]);
                        $("#type").append('<option  class="left" value="'+result.data[i].id+'" data-icon="'+result.data[i].icon+'"  >'+result.data[i].name+'</option>');
                    }

                    $('#type').select();
                },
                error: function()
                {

                }
            });

            $.ajax({
                url: ajaxCompanyPath,
                type:  'GET',
                data: {
                    'admin_id': admin_id,
                },
                success: function(result)
                {
                    $('#company').empty();

                    $("#company").append('<option value="">Select Company</option>');
                    $("#company").append('<option value="0">Individual</option>');

                    for(var i = 0 ; i < result.data.length ; i++)
                    {
                        console.log(result.data[i]);
                        $("#company").append('<option  class="left" value="'+result.data[i].id+'" >'+result.data[i].name+'</option>');
                    }

                    $('#company').select();
                },
                error: function()
                {

                }
            });
    }

    function getCarModel(value,model=''){
        var selected = '';
        $.ajax({
            url: "{{ route('getCarModel') }}",
            type:  'GET',
            data: {
                'car_make': value,
            },
            success: function(result)
            {
                $('#car_model').empty();
                $("#car_model").append('<option value="" selected disabled>Select</option>');
                result.forEach(element => {

                    if(model == element.id){
                        selected = 'selected';
                    }else{
                        selected='';
                    }

                    $("#car_model").append('<option value='+element.id+' '+selected+'>'+element.name+'</option>')
                });
                $('#car_model').select();
            }
        });
        alert("count==="+count);
    }

    $(document).on('change','#car_make',function(){
        getCarModel($(this).val());
    });
</script>

@endsection

