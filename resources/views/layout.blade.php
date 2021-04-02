<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131755597-1"></script>
        <link rel="icon" href="{{ URL::asset('favicon-16x16.png') }}" sizes="16x16" type="image/png"/>
        <link rel="icon" href="{{ URL::asset('favicon-32x32.png') }}" sizes="32x32" type="image/png"/>
        <link rel="apple-touch-icon" href="{{ URL::asset('apple-touch-icon.png') }}" sizes="180x180"/>
        <link rel="manifest" href="{{ URL::asset('site.webmanifest') }}">
        <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

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
        <meta name="author" content="netnoh.com - Douala Deïdo">
        @yield('meta')

        <title>
            Netnoh - @yield('title')
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
        <link rel="stylesheet" href="{{ URL::asset('css/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap3-wysihtml5.min.css') }}">
        <!-- Popup alert -->
        <link rel="stylesheet" href="{{ URL::asset('css/toast.css') }}">

        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script async src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
        <script src="{{ URL::asset('js/app.js') }}"></script>

        @yield('css')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

        @include('header')

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
            $(".sidebar a").each(function() {
                //console.log($(this).attr('href'));
                if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
                    $(this).parent().addClass('active');
                }
            });
        </script>
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
        <script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
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