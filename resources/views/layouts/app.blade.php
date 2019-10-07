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
    <link href="{{ asset('assets/style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/css/styles.css') }}" rel="stylesheet">

    <!--Custom Font-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    @yield('css')
    <link rel="shortcut icon" href="{{ asset('assets/img/polri.png') }}" />

    <style>
        body{
            background: #ececec;
        }
        input.form-control{
            height: 40px;
        }
        /*body{*/
            /*background-color: #515a63; background: linear-gradient(to right, #3097d1 , #ced0d3);*/
        /*}*/
    </style>

</head>
<body>
<div id="app">
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/') }}">
                        <em class="fa fa-home"></em>
                    </a>
                </li>
                <li class="active">@yield('title')</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h3>@yield('title')</h3>
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/style/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('assets/style/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/style/js/chart.min.js') }}"></script>
<script src="{{ asset('assets/style/js/chart-data.js') }}"></script>
<script src="{{ asset('assets/style/js/easypiechart.js') }}"></script>
<script src="{{ asset('assets/style/js/easypiechart-data.js') }}"></script>
<script src="{{ asset('assets/style/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/style/js/custom.js') }}"></script>
@yield('js')
</body>
</html>
