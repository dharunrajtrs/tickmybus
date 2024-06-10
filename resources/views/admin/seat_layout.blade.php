
@extends('admin.layouts.app')




@section('title', 'Main page')




@section('content')


<style>
.box{
  margin-top:100px;
}

  .checkbox{
    width:30px;
    height:30px;
    border-radius:5px;
    background:grey;
  }
  #bed{
    width:30px;
    height:60px;
    border-radius:5px;
    background:grey;
  }


input[type="checkbox"]:checked + span {
    color:white;
    align-content:center;
    padding: 5px;
    align-items:center;
    justify-content:center;
    border-color: black;
    background-color:green;
}

#disable[checkbox]{
  background:white;
}
.border{
  padding: 50px 100px;
}
.custom{
  padding: 4px;
}
.w{
  width:30px;
background:green;
}


</style>

<section class="box">
<div class='container'>
    <div class="card p-5 mt-5 align-items-center justify-content-center ">
      <div class="border">
<div class="w">

</div>
<!-- row-bed -->
      <div class="row">
  <div class="col-2 col-lg-2 p-2">
<label for="checkbox-b1" class="checkbox" id="bed">
  <input id="checkbox-b1" type="checkbox" role="checkbox" /><span class="custom">B1</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox-b2" class="checkbox" id="bed">
  <input id="checkbox-b2" type="checkbox" role="checkbox" /><span class="custom">B2</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >

</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox-b3" class="checkbox" id="bed">
  <input id="checkbox-b3" type="checkbox" role="checkbox" /><span class="custom">B3</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox-b4" class="checkbox" id="bed">
  <input id="checkbox-b4" type="checkbox" role="checkbox" /><span class="custom">B4</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox-b5" class="checkbox" id="bed">
  <input id="checkbox-b5" type="checkbox" role="checkbox" /><span class="custom">B5</span>
</label>
</div>
</div>
<!-- row-1 -->
<div class="row">
  <div class="col-2 col-lg-2 p-2">
<label for="checkbox1" class="checkbox">
  <input id="checkbox1" type="checkbox" role="checkbox" /><span class="custom">1 A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox2" class="checkbox">
  <input id="checkbox2" type="checkbox" role="checkbox" /><span class="custom">1 B</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >

</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox3" class="checkbox">
  <input id="checkbox3" type="checkbox" role="checkbox" /><span class="custom">1C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox4" class="checkbox">
  <input id="checkbox4" type="checkbox" role="checkbox" /><span class="custom">1D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox5" class="checkbox">
  <input id="checkbox5" type="checkbox" role="checkbox" /><span class="custom">1 E</span>
</label>
</div>
</div>

<!-- row-2 -->
<div class="row">
  <div class=" col-2 col-lg-2 p-2">
<label for="checkbox2A" class="checkbox">
  <input id="checkbox2A" type="checkbox" role="checkbox" /><span class="custom">2A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox2B" class="checkbox">
  <input id="checkbox2B" type="checkbox" role="checkbox" /><span class="custom">2B</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox2C" class="checkbox">
  <input id="checkbox2C" type="checkbox" role="checkbox" /><span class="custom">2C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox2D" class="checkbox">
  <input id="checkbox2D" type="checkbox" role="checkbox" /><span class="custom">2D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2 p-2">
<label for="checkbox2E" class="checkbox">
  <input id="checkbox2E" type="checkbox" role="checkbox" /><span class="custom">2E</span>
</label>
</div>
</div>

<!-- row-3 -->
<div class="row">
  <div class=" col-2 col-lg-2 p-2">
<label for="checkbox3A" class="checkbox">
  <input id="checkbox3A" type="checkbox" role="checkbox" /><span class="custom">3A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox3B" class="checkbox">
  <input id="checkbox3B" type="checkbox" role="checkbox" /><span class="custom">3B</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox3C" class="checkbox">
  <input id="checkbox3C" type="checkbox" role="checkbox" /><span class="custom">3C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox3D" class="checkbox">
  <input id="checkbox3D" type="checkbox" role="checkbox" /><span class="custom">3D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2 p-2">
<label for="checkbox3E" class="checkbox">
  <input id="checkbox3E" type="checkbox" role="checkbox" /><span class="custom">3E</span>
</label>
</div>
</div>

<!-- row-4 -->
<div class="row">
  <div class=" col-2 col-lg-2 p-2">
<label for="checkbox4A" class="checkbox">
  <input id="checkbox4A" type="checkbox" role="checkbox" /><span class="custom">4A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox4B" class="checkbox">
  <input id="checkbox4B" type="checkbox" role="checkbox" /><span class="custom">4B</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox4C" class="checkbox">
  <input id="checkbox4C" type="checkbox" role="checkbox" /><span class="custom">4C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox4D" class="checkbox">
  <input id="checkbox4D" type="checkbox" role="checkbox" /><span class="custom">4D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2 p-2">
<label for="checkbox4E" class="checkbox">
  <input id="checkbox4E" type="checkbox" role="checkbox" /><span class="custom">4E</span>
</label>
</div>
</div>

<!-- row-5 -->
<div class="row">
  <div class="col-2 col-lg-2 p-2">
<label for="checkbox5A" class="checkbox">
  <input id="checkbox5A" type="checkbox" role="checkbox" /><span class="custom">5A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox5B" class="checkbox">
  <input id="checkbox5B" type="checkbox" role="checkbox" /><span class="custom">5B</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox5C" class="checkbox">
  <input id="checkbox5C" type="checkbox" role="checkbox" /><span class="custom">5C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox5D" class="checkbox">
  <input id="checkbox5D" type="checkbox" role="checkbox" /><span class="custom">5D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2 p-2">
<label for="checkbox5E" class="checkbox">
  <input id="checkbox5E" type="checkbox" role="checkbox" /><span class="custom">5E</span>
</label>
</div>
</div>

<!-- row-6 -->
<div class="row">
  <div class=" col-2 col-lg-2 p-2">
<label for="checkbox6A" class="checkbox">
  <input id="checkbox6A" type="checkbox" role="checkbox" /><span class="custom">6A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox6B" class="checkbox">
  <input id="checkbox6B" type="checkbox" role="checkbox" /><span class="custom">6B</span>
</label>
</div>
<div id="disable" class="col-2 col-lg-2 p-2" >
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox6C" class="checkbox">
  <input id="checkbox6C" type="checkbox" role="checkbox" /><span class="custom">6C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox6D" class="checkbox">
  <input id="checkbox6D" type="checkbox" role="checkbox" /><span class="custom">6D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2 p-2">
<label for="checkbox6E" class="checkbox">
  <input id="checkbox6E" type="checkbox" role="checkbox" /><span class="custom">6E</span>
</label>
</div>
</div>

<!-- row-7 -->
<div class="row">
  <div class=" col-2 col-lg-2 p-2">
<label for="checkbox7A" class="checkbox">
  <input id="checkbox7A" type="checkbox" role="checkbox" /><span class="custom">7A</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox7B" class="checkbox">
  <input id="checkbox7B" type="checkbox" role="checkbox" /><span class="custom">7B</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2 text-center" >
<label for="checkbox7x" class="checkbox">
  <input id="checkbox7x" type="checkbox" role="checkbox" /><span class="custom">7x</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox7C" class="checkbox">
  <input id="checkbox7C" type="checkbox" role="checkbox" /><span class="custom">7C</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox7D" class="checkbox">
  <input id="checkbox7D" type="checkbox" role="checkbox" /><span class="custom">7D</span>
</label>
</div>
<div class="col-2 col-lg-2 p-2">
<label for="checkbox7E" class="checkbox">
  <input id="checkbox7E" type="checkbox" role="checkbox" /><span class="custom">7E</span>
</label>
</div>
</div>

</div>
</div>
</div>
</section>





  @endsection



