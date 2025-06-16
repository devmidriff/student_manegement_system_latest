



@extends('layouts.mangement')

@section('title', 'Add Goal')

@section('pagename')
    Add Goal
@endsection



@section('main-content')

    @if(auth()->user()->role === 'school_admin')
        <h2 class="text-xl font-bold mb-4">Add New Goal</h2>

        <!-- Show validation errors if any -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif




        <!-- Add Goal Form -->
        <form action="{{ route('goal.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block font-medium">Title:</label>
                <input type="text" name="title" id="title" class="border border-gray-300 rounded p-2 w-full" required>
            </div>

            <div>
                <label for="description" class="block font-medium">Description:</label>
                <textarea name="description" id="description" rows="3" class="border border-gray-300 rounded p-2 w-full" required></textarea>
            </div>

            <div>
                <label for="goal_type" class="block font-medium">Goal Type:</label>
                <select name="goal_type" id="goal_type" class="border border-gray-300 rounded p-2 w-full" required>
                    <option value="">Select Type</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>

            <div>
                <label for="start_date" class="block font-medium">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="border border-gray-300 rounded p-2 w-full" required>
            </div>

            <div>
                <label for="end_date" class="block font-medium">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="border border-gray-300 rounded p-2 w-full" required>
            </div>

            <div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Goal
                </button>
            </div>
        </form>
    @endif

@endsection
