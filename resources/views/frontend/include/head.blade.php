<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- ========== Page Title ========== -->
    <title>Examin - Education and LMS Template</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="icon" type="image/png" href="{{ asset('/') }}frontend/assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('/') }}frontend/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/animate.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="{{ asset('/') }}frontend/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}frontend/assets/css/responsive.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
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
    @stack('css')
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{ asset('/') }}frontend/assets/js/html5/html5shiv.min.js"></script>
      <script src="{{ asset('/') }}frontend/assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>
