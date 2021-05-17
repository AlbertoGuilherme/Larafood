<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" {{ url('public/css/bootstrap.min.css') }}>
    <title>@yield('title')-EspecializaTI</title>
    @stack('style')
</head>
<body>
    @yield('content')

    @stack('srcript')
</body>
</html>
