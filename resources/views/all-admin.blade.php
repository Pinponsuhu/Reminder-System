@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
    <div class="px-8 flex justify-between items-center my-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">All Admin</h1>
        <span onclick="addStaff()" class="cursor-pointer bg-blue-500 text-white font-bold py-2.5 px-5 rounded-sm">Add Admin</span>
    </div>
    <p class="text-md text-red-500 text-center my-3">Note: Resetted password will be set to "password1"</p>
    <div class="w-full overflow-x-scroll px-10 mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Full name</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Email Address</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Top Admin</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->name }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->email }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">@if ($staff->top_admin == 1)
                        True

                        @else
                        False
                    @endif</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800"><div class="flex gap-x-3">

                        <a href="/reset/password/{{ $staff->id }}" class="py-2 px-5 bg-green-500 font-bold text-white">Reset Password</a>
                        <a href="/delete/admin/{{ $staff->id }}" class="py-2 px-5 bg-red-500 font-bold text-white">Delete</a>
                    </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
    <div id="staff-form" class="fixed bg-gray-800 hidden bg-opacity-80 w-screen h-screen">
        <div class="flex px-7 justify-end my-3">
            <i onclick="clsAddStaff()" class="cursor-pointer fa fa-times block text-right fa-2x text-white"></i>

        </div>
            <form action="/add/admin" class="w-7/12 mx-auto grid grid-cols-2 gap-x-7 bg-white py-10 px-10 rounded-md" method="post">
                @csrf
                <div class="my-2">
                    <label for="fullname">Full name</label>
                    <input type="text" name="full_name" placeholder="Enter Fullname" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                    @error('full_name')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="">Email Address</label>
                    <input type="email" name="email_address" placeholder="Enter Email Address" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                    @error('email_address')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="">Password</label>
                    <input type="text" name="password" placeholder="Enter Password" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                    @error('password')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Repeat Password" class="shadow-md block py-3 px-1 border-l-4 border-blue-400 w-full">
                </div>
                <div>
                    <div class="flex gap-x-3 my-2">
                        <label for="top">Top Admin</label>
                        <select name="top_admin" id="top">
                            <option value="" disabled selected>-- Select Level --</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                </div>
                <button class="col-span-2 w-28 text-center block mt-3 py-3 font-bold bg-blue-500 text-blue-50">Submit</button>
            </form>

    </div>

    <script>
        function addStaff(){
            document.getElementById('staff-form').classList.remove('hidden');
        }
        function clsAddStaff(){
            document.getElementById('staff-form').classList.add('hidden');
        }
    </script>
@endsection
