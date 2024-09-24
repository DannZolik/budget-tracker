<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>coinKeeper</title>
</head>

<body>
    <div class="w-full h-full flex flex-col">
        <!-- Header Section -->
        @include('partials.landing-page-header')
    
        <!-- Main Content -->
        <div class="container">
            @yield('content')
        </div>
    
        <!-- Footer Section -->
        @include('partials.landing-page-footer')
    </div>
</body>

</html>
