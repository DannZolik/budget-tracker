<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coinKeeper</title>
</head>
<body>
    <!-- Header Section -->
    @include('partials.landing-page-header')

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer Section -->
    @include('partials.landing-page-footer')
</body>
</html>
