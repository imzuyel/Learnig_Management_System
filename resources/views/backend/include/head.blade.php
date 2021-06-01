<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Advance - Ecommerce |@yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('/') }}backend/assets/images/favicon-32x32.png" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ asset('/') }}backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ asset('/') }}backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('/') }}backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet" />
    <link href="{{ asset('/') }}backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('/') }}backend/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ asset('/') }}backend/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/css/bootstrap.min.css" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/css/app.css" />
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/css/dark-sidebar.css" />
    <link rel="stylesheet" href="{{ asset('/') }}backend/assets/css/dark-theme.css" />
    <style>
        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transform: -webkit-translate(-50%, -50%);
            transform: -moz-translate(-50%, -50%);
            transform: -ms-translate(-50%, -50%);
            color: darkred;
            z-index: 100;
            visibility: hidden;
        }

    </style>
    @toastr_css
    @stack('css')
</head>
