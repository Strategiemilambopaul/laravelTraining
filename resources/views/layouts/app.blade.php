<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My super site</title>
</head>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<body>
    @include('partials.navbar')
   <div class="container mx-50">
   @yield('content')
   </div>
</body>

<link rel="stylesheet" href="{{asset('js/app.js')}}">
</html>