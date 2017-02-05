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
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
      window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token(), ]) !!};
    </script>
</head>
<body class="layout-container">
    <div class="layout-content" data-scrollable>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
