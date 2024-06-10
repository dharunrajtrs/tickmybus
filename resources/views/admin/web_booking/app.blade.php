<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TickMyBus</title>
</head>
<body>
    @include('admin.web_booking.topnavbar')

    <div class="container">
        @yield('content')
    </div>

    @include('admin.web_booking.footer')
</body>
</html>
