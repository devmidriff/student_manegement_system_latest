<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Inside <head> -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/custom.js') }}" defer ></script>

</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4>Welcome, {{ auth()->user()->name }}</h4>
        <p>Role: <strong>{{ auth()->user()->role }}</strong></p>
        <hr>
        <a href="/dashboard">Dashboard</a>
        @if(auth()->user()->role === 'super_admin')
            <a href="#">Manage Admin</a>
        @endif
        @if(in_array(auth()->user()->role, ['school_admin']))
            <a href="{{ route('register.student') }}">Student Registration</a>
            <a href="#">Manage Teachar</a>
            <a href="#">Manage Student</a>
        @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
        </form>

    </div>

    {{-- Main content --}}
    <div class="main-content">

        {{-- Navbar --}}
        <div class="navbar d-flex justify-content-between align-items-center">
            <h3>Dashboard</h3>
            <div>
                <span class="text-muted">{{ auth()->user()->email }}</span>
            </div>
        </div>

        {{-- Sections based on user role --}}
        <div class="mt-4">

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

            @if(auth()->user()->role === 'school_admin')
                <div class="mb-5">
                    <h4>Admin Section</h4>
                    <p>You can manage content but not users or site settings.</p>
                </div>

































            @endif
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <script>
    document.getElementById('user_type').addEventListener('change', function () {
        let type = this.value;
        let forms = document.querySelectorAll('.user-form');
        forms.forEach(form => form.style.display = 'none'); // hide all
        if (type) {
            document.getElementById('form_' + type).style.display = 'block'; // show selected
        }
    });


document.addEventListener('DOMContentLoaded', function () {
        const yesRadio = document.getElementById('parent_yes');
        const noRadio = document.getElementById('parent_no');
        const existingParent = document.getElementById('existing_parent_section');
        const newParent = document.getElementById('new_parent_section');

        yesRadio.addEventListener('change', function () {
            if (this.checked) {
                existingParent.style.display = 'block';
                newParent.style.display = 'none';
            }
        });

        noRadio.addEventListener('change', function () {
            if (this.checked) {
                existingParent.style.display = 'none';
                newParent.style.display = 'block';
            }
        });
    });





    document.addEventListener('DOMContentLoaded', function () {
        const childYes = document.getElementById('child_yes');
        const childNo = document.getElementById('child_no');
        const existingChild = document.getElementById('existing_child_section');
        const newChild = document.getElementById('new_child_section');

        childYes.addEventListener('change', function () {
            if (this.checked) {
                existingChild.style.display = 'block';
                newChild.style.display = 'none';
            }
        });

        childNo.addEventListener('change', function () {
            if (this.checked) {
                existingChild.style.display = 'none';
                newChild.style.display = 'block';
            }
        });
    });






  </script>
 





</body>


</html>
