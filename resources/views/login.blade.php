<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health care Reminder system</title>
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
<body class="bg-blue-50 bg-opacity-90">
    <div class="w-9/12 mt-10 mx-auto  grid grid-cols-2">
        <div class="bg-white py-14 px-16">
            <div>
                <h1 class="mb-0.5 text-4xl font-bold text-gray-900">Welcome To LASU Healthcare Reminder System</h1>
                <p class="text-md text-gray-400">Administrator page for handling Appointments</p>
            </div>
            <form action="/login" class="mt-5" method="post">
                @csrf
                <div>
                    <label for="email" class="mb-1.5 font-bold block">Email Address</label>
                    <input type="email" class="block px-3 py-3 border-l-4 border-blue-500 shadow-md bg-white w-full" placeholder="Input Email Address" name="email" class="" id="email">
                </div>
                <div class="mt-3">
                    <label for="password" class="mb-1.5 font-bold block">Password</label>
                    <input type="password" class="block px-3 py-3 border-l-4 border-blue-500 shadow-md bg-white w-full" placeholder="Input Password" name="password" class="" id="password">
                </div>
                <div class="flex gap-x-3 items-center my-2">
                    <input type="checkbox" name="remember_me" id="remember_me">
                    <label for="remember_me">Remember me</label>
                </div>
                <input type="submit" class="px-7 font-bold py-3 bg-blue-500 text-white" value="Submit">
            </form>
        </div>
        <div class="bg-blue-500 relative text-white py-16 px-14">
            <img src="{{ asset('img/lasu.png') }}" class="w-20 h-auto block mb-3" alt="">

            <h1 class="font-bold text-4xl uppercase">Healthcare reminder system for LASU Staffs</h1>
            <p class="text-md mt-4">A System that automatically sends reminder Mails to Staffs every three months for Health checkup</p>

            <p class="absolute bottom-4 right-4 italic">We are Lasu, We are great</p>
        </div>
    </div>
</body>
</html>

