<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>SAV Architecture Design | London Mumbai Goa | Architects and Designers - SAV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>

<body 
    @if(Route::currentRouteName() != 'contact')
        class="dark"
    @endif
    @if(Route::currentRouteName() != 'home')
        id="light"
    @endif
>
    
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js'></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" ></script>
   <script src="{{ asset('assets/js/main.js') }}" ></script>

   @stack('scripts')
</body>

</html>