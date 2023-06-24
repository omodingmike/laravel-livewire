<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" value="{{ csrf_token() }}"/>

    <title>Livewire Crud App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
    {{--    <script src="https://kit.fontawesome.com/61df0a3319.js" crossorigin="anonymous"></script>--}}
    @livewireStyles

</head>
<body class="antialiased">
<div class="container">
    <livewire:patients/>
</div>
@livewireScripts
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>

