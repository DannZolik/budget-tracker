<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @filamentStyles
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>coinKeeper</title>
</head>

<body style="background-color: #0F141A;">
    <div class="w-full h-full flex flex-col px-4 md:px-16 lg:px-32">
        @livewire('notifications')

        <!-- Header Section -->
        @include('partials.landing-page-header')

        <!-- Main Content -->
        <div class="container">
            @yield('content')
        </div>

        <!-- Footer Section -->
        @include('partials.landing-page-footer')
        @livewire('notifications')
        @filamentScripts
        @vite('resources/js/app.js')
    </div>
</body>

</html>
