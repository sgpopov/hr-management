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
<body>

@include('includes.nav')

<div class="container-fluid">
    <div class="row">
        @include('includes.sidebar')

        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            @yield('breadcrumb')

            @if (session('status'))
                @include('partials.alert-success', [ 'message' => session('status') ])
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
