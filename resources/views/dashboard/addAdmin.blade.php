@extends('layouts.mangement')

@section('title', 'Add Admin')




 @section('pagename')
  Add Admin
 @endsection 



 @section('main-content')

             @if(auth()->user()->role === 'super_admin')
                <div class="mb-5">
                    <h4>Super Admin Screen</h4>
                    <p>You have full access to add Admin(School)</p>
                </div>

                {{-- Form to add new admin --}}
                <div class="card">
                    <div class="card-header">Add New Admin</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                         
                        @if(isset($success))
                            <div class="alert alert-success"> {{ $success }} </div>
                        @endif
                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <input type="hidden" name="role" value="admin">

                            <button type="submit" class="btn btn-primary">Add Admin</button>
                        </form>
                    </div>
                </div>
            @endif


 @endsection