<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131755597-1"></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-131755597-1');
        </script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="author" content="semanticatech.com - London, Yaoundé, Douala Bonamoussadi">
        @yield('meta')

        <title>
            EasyCredit - @yield('title')
        </title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
        
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ URL::asset('css/_all-skins.min.css') }}">
        <!-- Morris chart -->
        <link rel="stylesheet" href="{{ URL::asset('css/morris.css') }}">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{ URL::asset('css/jquery-jvectormap.css') }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap3-wysihtml5.min.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}">

        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script async src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
        <script src="{{ URL::asset('js/app.js') }}"></script>

        @yield('css')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

        @include('header')

        @if(1===0)
            @include('Inc.mobile-nav')
            @include('Inc.cti-navbar')
        @endif

        @include('sidebar')

        @yield('content')

        @include('footer')

        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <!-- Morris.js charts -->
        <script src="{{ URL::asset('js/raphael.min.js') }}"></script>
        <script src="{{ URL::asset('js/morris.min.js') }}"></script>
        <!-- Sparkline -->
        <script src="{{ URL::asset('js/jquery.sparkline.min.js') }}"></script>
        <!-- jvectormap -->
        <script src="{{ URL::asset('js/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ URL::asset('js/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ URL::asset('js/moment.min.js') }}"></script>
        <script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
        <!-- datepicker -->
        <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>
        @yield('script')
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ URL::asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <!-- Slimscroll -->
        <script src="{{ URL::asset('js/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ URL::asset('js/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ URL::asset('js/adminlte.min.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ URL::asset('js/dashboard.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ URL::asset('js/demo.js') }}"></script>
    </body>
    <!-- <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
</html>