<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katrina's Diary</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/select2.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" defer></script> --}}
    
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
    @yield('css')
</head>
<body>
    @yield('header')
    <div class="body-container">
        @yield('content')
    </div>
    @yield('footer')

    @yield('javascript')
</body>
</html>