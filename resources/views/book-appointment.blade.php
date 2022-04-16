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
<body class="bg-blue-50">

<div class="mt-10 w-80 md:w-6/12 lg:w-4/12 mx-auto bg-white rounded-md px-14 py-12">
    <div class="flex gap-x-4 mb-4">
        <img src="{{ asset('img/lasu.png') }}" class="w-20 block h-auto" alt="">
        <h1 class="text-2xl uppercase font-bold mb-3 ">Welcome {{ $staff->full_name }}</h1>
    </div>
    <form action="/book/appointment/{{ $staff->appointment_token }}" method="post">
        @csrf
        <label for="date" class="mb-1 font-bold block">Select Date</label>
        <input type="date" name="date" id="date" class="w-full block py-3 px-1 border-l-4 border-blue-500 rounded-sm shadow-md">
        <button class="w-32 block mt-3 bg-blue-500 text-white font-bold py-3 rounded-sm">Submit</button>
    </form>
</div>
</body>
