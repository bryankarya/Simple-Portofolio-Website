<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Resume')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body id="page-top">
    @include('partials.admin.navbar')
    <div class="container-fluid p-0">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/resume.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>


    @if(isset($javascript_file))
    <script src="{{ asset('js/'.$javascript_file) }}"></script>
    @endif
</body>
</html>
