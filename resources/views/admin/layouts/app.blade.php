<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
       <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon">

    <title>{{config('app.name')}} @yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        .font-14{
            font-size: 14px;
        }
        .font-30{
            font-size: 30px;
        }            
    </style>

    @stack('styles')
  
</head>

<body class="">
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        </script>
    @endif
    @if(session('success'))
        <script>
            @if(session('success'))
                toastr.success('{{ session('success') }}');
            @endif
        </script>
    @endif

    @if(Route::is('adminLogin') || Route::is('adminForgotPassword') || Route::is('admin.password.reset') )
        <div class="main-wrapper">
            @yield('content')
        </div>
    @else
        <div class="hold-transition sidebar-mini layout-fixed">
                @include("admin.layouts.header")
                
                @include("admin.layouts.sidebar")
                
                @yield('content')
                
                @include("admin.layouts.footer")
        </div>
    @endif
    

    
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- Data Table JS Start -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.5.0/dataTables.responsive.min.js" integrity="sha512-DY4twak65A5MI1m/CEKadDVrb0O8p7pLluLAXvpg0FjuQ4ZSzKyfcUtkM+ek4fIVUeaD7+nsv9k+mzTcFsDXIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Data Table JS End -->

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        toastr.options = {
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "closeButton": true,
        };
    </script>

    @stack('scripts')
    
</body>

</html>