@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
        <div>
            <h1 class="font-bold ml-6 text-2xl text-gray-600 mt-4">User Details</h1>
            <div class="flex gap-x-6 mt-4 px-8 items-start">
                <div>
                    <img src="{{ '/storage/staffs/' . $staffs->passport }}" class="w-80 h-auto block" alt="">
                    <form action="/update/image/{{ $staffs->id }}" enctype="multipart/form-data" class="mt-5 block" method="post">
                    @csrf
                    <input type="file" onchange="this.form.submit()" id="image" hidden name="image">
                    <label for="image" class="py-3 px-4 bg-blue-400 font-bold text-white">Change Image</label>
                    @error('image')
                                <p class="text-sm my-4 text-red-500">{{ $message }}</p>
                    @enderror
                    </form>
                </div>
                <div>
                    <form action="/update/details/{{ $staffs->id }}" enctype="multipart/form-data" class="w-full mx-auto grid grid-cols-2 gap-x-7 bg-white px-10 rounded-md" method="post">
                        @csrf
                        <div class="">
                            <label for="staff_id" class="font-bold block mb-1">Staff ID</label>
                            <input type="text" value="{{ $staffs->staff_id }}" placeholder="Enter Staff ID" name="staff_id" id="staff_id" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                            @error('staff_id')
                                <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="full_name" class="font-bold block mb-1">Fullname</label>
                            <input type="text" value="{{ $staffs->full_name }}" placeholder="Enter Fullname" name="full_name" id="full_name" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                            @error('full_name')
                                <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <label for="phone" class="font-bold block mb-1">Phone Number</label>
                            <input type="text" value="{{ $staffs->phone }}" placeholder="Enter Phone Number" name="phone" id="phone" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                            @error('phone')
                                <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <label for="email" class="font-bold block mb-1">Email Address</label>
                            <input type="email" value="{{ $staffs->email }}"" placeholder="Enter Email Address" name="email" id="email" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                            @error('email')
                                <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <label for="date_of_birth" class="font-bold block mb-1">Date of Birth</label>
                            <input type="date" value="{{ $staffs->date_of_birth }}"  name="date_of_birth" id="date_of_birth" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                            @error('date_of_birth')
                                <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="my-2">
                            <label for="gender" class="font-bold block mb-1">Gender</label>
                            <select name="gender" class="shadow-md capitalize w-full py-3 px-1.5 bg-white border-l-4 border-blue-500" id="gender">
                                <option value="{{ $staffs->gender }}" class="capitalize">{{ $staffs->gender }}</option>
                               @foreach ($gender as $gend)
                                    @if ($gend != $staffs->gender)
                                    <option value="{{ $gend }}">{{ $gend }}</option>
                                    @endif

                               @endforeach
                            </select>
                            @error('gender')
                                <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="col-span-2 w-28 text-center block mt-3 py-3 font-bold bg-blue-500 text-blue-50">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
