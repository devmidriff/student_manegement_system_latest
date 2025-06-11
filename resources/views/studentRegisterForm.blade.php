<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registertion</title>
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
            <h3>Student Registertion</h3>
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


<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Student Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <!-- Step Indicators -->
                        <div class="step-indicator">
                            <div class="text-center">
                                <div class="step-circle active" id="step1-indicator">1</div>
                                <div class="step-title active">Personal Info</div>
                            </div>
                            <div class="step-line"></div>
                            <div class="text-center">
                                <div class="step-circle" id="step2-indicator">2</div>
                                <div class="step-title">Parent Info</div>
                            </div>
                            <div class="step-line"></div>
                            <div class="text-center">
                                <div class="step-circle" id="step3-indicator">3</div>
                                <div class="step-title">Teacher Info</div>
                            </div>
                        </div>

                        <!-- Form Steps -->
                        <form id="multiStepForm" method="POST" action="{{ route('submition.student') }}">
                            @csrf
                            <!-- Step 1 - Personal Information -->
                            <div class="step active" id="step1">
                                <h5 class="mb-4">Student Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                            id="firstName" name="first_name" value="{{ old('first_name') }}" required>
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                            id="lastName" name="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') is-invalid @enderror" 
                                        id="dob" name="dob" value="{{ old('dob') }}" required>
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" 
                                                name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" 
                                                value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="other" 
                                                value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror



                                                                 
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                        id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                        id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Street Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" 
                                        id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror" 
                                            id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="zip" class="form-label">ZIP Code</label>
                                        <input type="text" class="form-control @error('zip') is-invalid @enderror" 
                                            id="zip" name="zip" value="{{ old('zip') }}" required>
                                        @error('zip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                              
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary disabled">Previous</button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep(1, 2)">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 - Contact Information -->
                            <div class="step" id="step2">
                                <h5 class="mb-4">Parents Information</h5>

                        <!-- Parent Registration Choice -->
                        <label class="form-label mt-3">Is Parent Already Registered?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="parent_registered" id="parent_yes" value="yes">
                            <label class="form-check-label" for="parent_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="radio" name="parent_registered" id="parent_no" value="no">
                            <label class="form-check-label" for="parent_no">No</label>
                        </div>


                                <div class="mb-3">
                                    <label for="parent_email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control @error('parent_email') is-invalid @enderror" 
                                        id="email" name="parent_email" value="{{ old('parent_email') }}" required>
                                    @error('parent_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="parent_phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control @error('parent_phone') is-invalid @enderror" 
                                        id="phone" name="parent_phone" value="{{ old('parent_phone') }}" required>
                                    @error('parent_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                        <!-- If parent is registered, show search input -->
                                <div id="existing_parent_section" style="display:none;">
                                    <label class="form-label">Search Parent by Email or ID</label>
                                    <input type="text" name="existing_parent_id" class="form-control mb-3" placeholder="Enter Email or ID">
                                </div>

                        <!-- If parent is NOT registered, show parent registration fields -->
                                <div id="new_parent_section" style="display:none;">
                                    <h6>Register New Parent</h6>
                                    <input type="text" name="parent_name" class="form-control mb-2" placeholder="Parent Name">
                                    <input type="email" name="parent_email" class="form-control mb-2" placeholder="Parent Email">
                                    <input type="password" name="parent_password" class="form-control mb-2" placeholder="Parent Password">
                                    <input type="text" name="parent_phone" class="form-control mb-2" placeholder="Phone Number (optional)">
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-secondary" onclick="prevStep(2, 1)">Previous</button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep(2, 3)">Next</button>
                                </div>

                            </div>

                            <!-- Step 3 - Account Setup -->
                            <div class="step" id="step3">
                                <h5 class="mb-4">Teacher Information</h5>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                        id="username" name="username" value="{{ old('username') }}" required>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                        id="password" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" 
                                        id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" 
                                        id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                                    @error('terms')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="prevStep(3, 1)">Previous</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



            @endif
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>


</html>
