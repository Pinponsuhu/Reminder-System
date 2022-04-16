@extends('layout.app')
@section('content')
<main class="w-full">
    @include('layout.nav')
    <h1 class="font-bold ml-6 text-2xl text-gray-600 my-4">Dashboard</h1>
    <div class="mt-1 px-12 flex gap-x-12">
        <div class="w-64 rounded-md py-6 px-5 bg-green-200 flex justify-between text-white shadow-md">
            <div>
                <h1 class="text-5xl text-green-500 font-bold">{{ $count1 }}</h1>
                <p class="text-gray-600 text-md mt-1">Today's <br> <h1 class="text-2xl font-bold text-gray-600">Appointment</h1></p>
            </div>
            <div class="w-12 h-12 bg-green-500 text-white flex items-center justify-center">
                <i class=" fa fa-calendar text-2xl"></i>
            </div>
        </div>
        <div class="w-64 rounded-md py-6 px-5 bg-fuchsia-200 flex justify-between text-white shadow-md">
            <div>
                <h1 class="text-5xl text-fuchsia-500 font-bold">{{ $count2 }}</h1>
                <p class="text-gray-600 text-md mt-1">Total <br> <h1 class="text-2xl font-bold text-gray-600">Staffs</h1></p>
            </div>
            <div class="w-12 h-12 bg-fuchsia-500 text-white flex items-center justify-center">
                <i class=" fa fa-users text-2xl"></i>
            </div>
        </div>
    </div>
    <div>
        <div class="flex justify-between items-center px-8 mt-4">
            <h1 class="font-bold text-2xl text-gray-600 my-4">Today's Appointments</h1>
            <a href="/appointments" class="bg-blue-500 text-blue-50 py-2.5 px-8 rounded-md font-bold">All Appointment</a>
        </div>
        <div class="w-full overflow-x-scroll px-10">
            <table class="w-full">
                <thead>
                    <tr>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Full name</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">Staff ID</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Email Address</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">Phone Number</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Preferred Date</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        @php
                            $staff = App\Models\Staff::where('id',$appointment->staff_id)->first();
                        @endphp
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->full_name }}</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">{{ $staff->staff_id }}</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $staff->email }}</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-200 text-md text-gray-800">{{ $staff->phone }}</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $appointment->preferred_date }}</td>
                        <td class="py-3 uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800">{{ $appointment->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
