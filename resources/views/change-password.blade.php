@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
        <div class="mt-4 ml-6">
            <h1 class="text-xl md:text-2xl font-bold uppercase text-blue-400 mb-4">Change Password</h1>
            <form action="/change/password" method="POST" class="w-80 mt-4">
                @csrf
                <div>
                    <label class="font-bold text-md">New Password</label>
                    <input type="password" name="password" placeholder="Input New Password" class="shadow-md w-full py-3 rounded-md bg-white px-3 block mt-2">
                    @error('password')
                        <p class="text-red-400 text-sm mt-0.5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label class="font-bold text-md">Confirm Password</label>
                    <input type="password" placeholder="Repeat Password" name="password_confirmation" class="shadow-md w-full py-3 rounded-md bg-white px-3 block mt-2">
                </div>
                <button class="block w-32 py-3 bg-blue-400 text-white text-center font-medium rounded-md mt-4">Sumbit</button>
            </form>
        </div>
    </main>
@endsection
