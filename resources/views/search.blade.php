@extends('layout.app')
@section('content')
    <main class="w-full">
        @include('layout.nav')
    <div class="px-8 flex justify-between items-center my-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">Search Result</h1>
    </div>
    <div>
        <form action="/search/all/appointments" method="get">
            @csrf
            <input type="search" name="search" class="w-7/12 px-2 rounded-sm block mx-auto placeholder-white py-3 bg-blue-500 text-white" placeholder="Search by Name or Staff ID" id="">
        </form>
    </div>
    <div class="w-full overflow-x-scroll px-10 mt-4">
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
                    <td class=" uppercase font-bold pl-3 bg-blue-100 text-md text-gray-800"><form action="/change/status/{{ $appointment->id }}" method="post">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="py-2 px-5 text-blue-500 bg-white" id="">
                            <option value="{{ $appointment->status }}">{{ $appointment->status }}</option>
                            @foreach ($statuss as $status)
                                @if ($status != $appointment->status)
                                <option value="{{ $status }}">{{ $status }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
