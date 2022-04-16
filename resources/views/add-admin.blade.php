@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')

        <h1 class="font-bold ml-6 text-2xl text-gray-600 mt-4">Add new Admin</h1>
        <form action="" class="mt-4 w-8/12 mx-auto grid-cols-2 gap-x-4 grid">
            <div class="my-2">
                <label for="fullname">Full name</label>
                <input type="text" placeholder="Enter Fullname" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                @error('full_name')
                    <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label for="">Email Address</label>
                <input type="email" placeholder="Enter Email Address" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                @error('email_address')
                    <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label for="">Password</label>
                <input type="text" placeholder="Enter Password" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                @error('password')
                    <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-2">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="Repeat Password" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
            </div>
            <div>
                <div class="flex gap-x-3 my-2">
                    <input type="checkbox" name="top_admin" id="top">
                    <label for="top">Top Admin</label>
                </div>
            </div>
            <button class="col-span-2 bg-blue-400 text-white py-3 px-6 block w-32 text-center">Submit</button>
        </form>
    </main>
@endsection
