<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @yield('style')
    <link rel="shortcut icon" href="{{ asset('assets/img/polri.png') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('js/DataTables-1.10.16/css/dataTables.bootstrap.css') }}"/>
    <style>
        body {
            background-color: #c84a4e;
            background: linear-gradient(to right, #115cbb, #fcdc4e);
        }
    </style>
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
