@extends('layouts.mangement')

@section('title', 'Assign Goal to Students')

@section('pagename')
    Assign Goal
@endsection

@section('main-content')

    @if(auth()->user()->role === 'school_admin')
        <h2 class="text-xl font-bold mb-4">Assign Goal to Students</h2>

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





        <form action="{{ route('goals.assign.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Select Goal -->
            <div>
                <label for="goal_id" class="block font-medium">Select Goal:</label>
                <select name="goal_id" id="goal_id" class="border border-gray-300 rounded p-2 w-full" required>
                    <option value="">-- Select Goal --</option>
                    @foreach($goals as $goal)
                        <option value="{{ $goal->id }}">{{ $goal->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Select Students -->
            <div>
                <label class="block font-medium mb-2">Select Students:</label>
                <div class="grid grid-cols-2 gap-2">
                    @foreach($students as $student)
                        <div class="flex items-center">
                            <input type="checkbox" name="student_ids[]" value="{{ $student->id }}" class="mr-2">
                            <span>{{ $student->user->name }} ({{ $student->user->email }})</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Assign Goal
                </button>
            </div>
        </form>
    @endif

@endsection
