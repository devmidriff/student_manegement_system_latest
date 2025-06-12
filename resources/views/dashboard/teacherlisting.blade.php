@extends('layouts.mangement')

@section('title', 'Add Admin')


 @section('pagename')
  Mange Teacher 
 @endsection 



 @section('main-content')
             @if(auth()->user()->role === 'school_admin')

<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr>
            <th class="border border-gray-300 px-4 py-2">Name</th>
            <th class="border border-gray-300 px-4 py-2">Email</th>
            <th class="border border-gray-300 px-4 py-2">Phone</th>
            <th class="border border-gray-300 px-4 py-2">Qualification</th>
            <th class="border border-gray-300 px-4 py-2">Specialization</th>
            <th class="border border-gray-300 px-4 py-2">Experience</th>
            <th class="border border-gray-300 px-4 py-2">Subjects</th>
            <th class="border border-gray-300 px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($adminData as $teacher)
            @if ($teacher->user->role === 'teacher')
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->phone }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->qualification }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->specialization }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->experience }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $teacher->subjects }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-1 px-3 rounded">Edit</a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

             @endif
 @endsection