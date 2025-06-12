@extends('layouts.mangement')

@section('title', 'Add Admin')


 @section('side-navbar')

                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('register.admin') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        Add Admin 
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('manage.admin') }}" class="nav-link">
                        <i class="fas fa-box"></i>
                        Manage Admin 
                    </a>
                </div>


 @endsection




 @section('pagename')
  Add Admin
 @endsection 



 @section('main-content')
             @if(auth()->user()->role === 'super_admin')

            <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">School Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">School Address</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($adminData as $user)
                    @if($user->role === 'school_admin')
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->school->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $user->school->address }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-1 px-3 rounded">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>


             @endif
 @endsection