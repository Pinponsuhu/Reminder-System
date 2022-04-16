@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
    <div class="px-8 flex justify-between items-center my-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">All Staffs</h1>
        <span onclick="addStaff()" class="cursor-pointer bg-blue-500 text-white font-bold py-2.5 px-5 rounded-sm">Add Staff</span>
    </div>
    {{-- <div>
        <form action="" method="get">
            @csrf
            <input type="search" name="search" class="w-7/12 px-2 rounded-sm block mx-auto placeholder-white py-3 bg-blue-500 text-white" placeholder="Search by Name or Staff ID" id="">
        </form> --}}
    </div>
    <div class="w-full overflow-x-scroll px-10 mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Full name</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">Staff ID</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Email Address</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">Phone Number</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Department</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">Date of Birth</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">Next Reminder</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->full_name }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">{{ $staff->staff_id }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->email }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">{{ $staff->phone }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->department }}
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">{{ $staff->date_of_birth }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">{{ $staff->next_reminder }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800"><a href="/staff/details/{{ $staff->id }}" class="py-2 px-5 bg-blue-500 font-bold text-white">View</a></td>
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
            <form action="/new/staffs" enctype="multipart/form-data" class="w-7/12 mx-auto grid grid-cols-2 gap-x-7 bg-white py-10 px-10 rounded-md" method="post">
                @csrf
                <div class="my-2">
                    <label for="passport" class="font-bold block mb-1">Passport</label>
                    <input type="file" name="passport" id="passport" class="w-full py-3 px-1.5 shadow-md bg-white border-l-4 border-blue-500">
                    @error('passport')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="staff_id" class="font-bold block mb-1">Staff ID</label>
                    <input type="text" value="{{ old('staff_id') }}" placeholder="Enter Staff ID" name="staff_id" id="staff_id" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                    @error('staff_id')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="full_name" class="font-bold block mb-1">Fullname</label>
                    <input type="text" value="{{ old('full_name') }}" placeholder="Enter Fullname" name="full_name" id="full_name" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                    @error('full_name')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="phone" class="font-bold block mb-1">Phone Number</label>
                    <input type="text" value="{{ old('phone') }}" placeholder="Enter Phone Number" name="phone" id="phone" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                    @error('phone')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="email" class="font-bold block mb-1">Email Address</label>
                    <input type="email" value="{{ old('email') }}" placeholder="Enter Email Address" name="email" id="email" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                    @error('email')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="date_of_birth" class="font-bold block mb-1">Date of Birth</label>
                    <input type="date" value="{{ old('date_of_birth') }}"  name="date_of_birth" id="date_of_birth" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500">
                    @error('date_of_birth')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="gender" class="font-bold block mb-1">Gender</label>
                    <select name="gender" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500" id="gender">
                        <option value="" disabled selected>-- Select Gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="department" class="font-bold block mb-1">Department</label>
                    <select name="department" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-blue-500" id="department">
                        <option value="" disabled selected>-- Select Department --</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Mathematics">Mathematics</option>
                    </select>
                    @error('department')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
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
