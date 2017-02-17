<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Human Resources</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link type="text/css" href="{{ asset('vendor/simplebar.css') }}" rel="stylesheet">
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" rel="stylesheet">

    <script>
      window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>
<body class="layout-container ls-top-navbar layout-sidebar-l3-md-up">
    @include('includes.nav')
    @include('includes.sidebar')

    <div class="layout-content" id="app" data-scrollable>
        <div class="container-fluid">
            @yield('breadcrumb')
            @yield('content')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
