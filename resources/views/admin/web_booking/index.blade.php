@extends('admin.web_booking.app')

@section('content')

<div class="search-container" style="background-image:url({{ asset('assets/images/background.jpeg') }}); background-size: cover; height: 500px;">
  <form class="search-form d-flex align-items-center">
    <div class="form-group mr-2">
      <label for="from" class="text-white">From:</label>
      <input type="text" class="form-control" id="from" placeholder="Enter origin city">
    </div>
    <div class="form-group mr-2">
      <label for="to" class="text-white">To:</label>
      <input type="text" class="form-control" id="to" placeholder="Enter destination city">
    </div>
    <div class="form-group d-flex flex-column mr-2">
      <label for="departureDate" class="text-white">Departure Date:</label>
      <input type="date" class="form-control" id="departureDate" min="<?php echo date('Y-m-d'); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Search Buses</button>
  </form>
</div>

@endsection