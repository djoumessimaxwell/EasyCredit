<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('favicon-16x16.png') }}" sizes="16x16" type="image/png"/>
    <link rel="icon" href="{{ URL::asset('favicon-32x32.png') }}" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon" href="{{ URL::asset('apple-touch-icon.png') }}" sizes="180x180"/>
    <link rel="manifest" href="{{ URL::asset('site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netnoh - @yield('title')</title>

    <!-- Scripts -->
    

    <!-- Styles -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/blue.css') }}">
    <!-- Popup alert -->
    <link rel="stylesheet" href="{{ URL::asset('css/toast.css') }}">
</head>
  <body class="hold-transition login-page">

      
      @yield('content')
      
      <!-- jQuery 3 -->
      <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
      <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
      
      <script src="{{ URL::asset('js/toast.js') }}"></script>
      <script src="{{ URL::asset('js/toast1.js') }}"></script>
      <script>
          @if(Session::has('message'))
              var type="{{Session::get('alert-type','info')}}"

              switch(type){
                  case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                  case 'success':
                      toastr.success("{{ Session::get('message') }}");
                      break;
                  case 'warning':
                      toastr.warning("{{ Session::get('message') }}");
                      break;
                  case 'error':
                      toastr.error("{{ Session::get('message') }}");
                      break;
              }
          @endif
      </script>
      <!-- iCheck -->
      <script src="{{ URL::asset('js/icheck.min.js') }}"></script>
  </body>
</html>
