<!DO
CTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/all.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'Mukta', sans-serif;
    }
</style>
</head>
<body class="flex">
    <nav class="py-8 bg-blue-500 h-screen border-r-4 border-white shadow-md text-blue-50 w-36">
        <div class="w-16 h-16 mx-auto flex justify-center items-center rounded-full bg-white">
            <img src="{{ asset('img/lasu.png') }}" class="block mx-auto w-8 h-auto" alt="">
        </div>
        <ul class="mt-8">
            <li class="mb-4 py-4 hover:px-4 hover:bg-blue-50 hover:text-blue-500"><a href="/" class="flex md:flex-col md:gap-y-1 gap-x-3 items-center"><i class="fa fa-chart-pie fa-2x"></i> <span class="font-bold">Dashboard</span></a></li>
            <li class="mb-4 py-4 hover:px-4 hover:bg-blue-50 hover:text-blue-500"><a href="/appointments/Reserved" class="flex md:flex-col md:gap-y-1 gap-x-3 items-center"><i class="fa fa-calendar fa-2x"></i> <span class="font-bold">Appointment</span></a></li>
            <li class="mb-4 py-4 hover:px-4 hover:bg-blue-50 hover:text-blue-500"><a href="/all/staffs" class="flex md:flex-col md:gap-y-1 gap-x-3 items-center"><i class="fa fa-users fa-2x"></i> <span class="font-bold">Staffs</span></a></li>
            @if (auth()->user()->top_admin == true)
            <li class="mb-4 py-4 hover:px-4 hover:bg-blue-50 hover:text-blue-500"><a href="/all/admin" class="flex md:flex-col md:gap-y-1 gap-x-3 items-center"><i class="fa fa-user-shield fa-2x"></i> <span class="font-bold">Admin</span></a></li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>
</html>
