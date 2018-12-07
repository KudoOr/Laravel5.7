<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
</head>
<body>
<div>
    @section('sidebar')
        é
        <p>Dây là menu chính</p>
    @show
    @yield('noidung')
</div>
</body>
</html>