@extends('layouts.mangement')

@section('title', 'Student Registration')

@section('pagename')
  Dashboard
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Student Registration</h3>
        </div>
        <div class="card-body">
            <form id="studentRegistrationForm" method="POST" action="{{ route('submition.student') }}" enctype="multipart/form-data">
                @csrf
                
                <!-- Progress Bar -->
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                
                <!-- Step Indicators -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab">Personal Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-academic-tab" data-bs-toggle="pill" data-bs-target="#pills-academic" type="button" role="tab">Academic Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-guardian-tab" data-bs-toggle="pill" data-bs-target="#pills-guardian" type="button" role="tab">Guardian Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-documents-tab" data-bs-toggle="pill" data-bs-target="#pills-documents" type="button" role="tab">Documents</button>
                    </li>
                </ul>
                
                <!-- Form Steps -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- Step 1: Personal Information -->
                    <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="dob" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-select" id="gender" name="gender" >
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                        </div>
                        
                        <div class="text-end">
                            <button type="button" class="btn btn-primary next-step" data-next="#pills-academic-tab">Next</button>
                        </div>
                    </div>
                    
                    <!-- Step 2: Academic Information -->
                    <div class="tab-pane fade" id="pills-academic" role="tabpanel" aria-labelledby="pills-academic-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="admission_date" class="form-label">Admission Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="admission_date" name="admission_date" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="admission_number" class="form-label">Admission Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="admission_number" name="admission_number" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="class" class="form-label">Class <span class="text-danger">*</span></label>
                                    <select class="form-select" id="class" name="class" >
                                        <option value="">Select Class</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 2</option>
                                        <option value="3">Class 3</option>
                                        <option value="4">Class 4</option>
                                        <option value="5">Class 5</option>
                                        <option value="6">Class 6</option>
                                        <option value="7">Class 7</option>
                                        <option value="8">Class 8</option>
                                        <option value="9">Class 9</option>
                                        <option value="10">Class 10</option>
                                        <option value="11">Class 11</option>
                                        <option value="12">Class 12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="section" class="form-label">Section</label>
                                    <select class="form-select" id="section" name="section">
                                        <option value="">Select Section</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="roll_number" class="form-label">Roll Number</label>
                                    <input type="text" class="form-control" id="roll_number" name="roll_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="house" class="form-label">House (Optional)</label>
                                    <input type="text" class="form-control" id="house" name="house">
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="#pills-personal-tab">Previous</button>
                            <button type="button" class="btn btn-primary next-step" data-next="#pills-guardian-tab">Next</button>
                        </div>
                    </div>
                    
                    <!-- Step 3: Guardian Information -->
                    <div class="tab-pane fade" id="pills-guardian" role="tabpanel" aria-labelledby="pills-guardian-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="father_name" class="form-label">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="father_occupation" class="form-label">Father's Occupation</label>
                                    <input type="text" class="form-control" id="father_occupation" name="father_occupation">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="father_phone" class="form-label">Father's Phone</label>
                                    <input type="tel" class="form-control" id="father_phone" name="father_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="father_email" class="form-label">Father's Email</label>
                                    <input type="email" class="form-control" id="father_email" name="father_email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mother_name" class="form-label">Mother's Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mother_occupation" class="form-label">Mother's Occupation</label>
                                    <input type="text" class="form-control" id="mother_occupation" name="mother_occupation">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mother_phone" class="form-label">Mother's Phone</label>
                                    <input type="tel" class="form-control" id="mother_phone" name="mother_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mother_email" class="form-label">Mother's Email</label>
                                    <input type="email" class="form-control" id="mother_email" name="mother_email">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="guardian_address" class="form-label">Guardian Address</label>
                            <textarea class="form-control" id="guardian_address" name="guardian_address" rows="2"></textarea>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="#pills-academic-tab">Previous</button>
                            <button type="button" class="btn btn-primary next-step" data-next="#pills-documents-tab">Next</button>
                        </div>
                    </div>
                    
                    <!-- Step 4: Documents -->
                    <div class="tab-pane fade" id="pills-documents" role="tabpanel" aria-labelledby="pills-documents-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Student Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                                    <small class="text-muted">Max size: 2MB (JPEG, PNG)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="birth_certificate" class="form-label">Birth Certificate</label>
                                    <input type="file" class="form-control" id="birth_certificate" name="birth_certificate" accept=".pdf,.jpg,.jpeg,.png">
                                    <small class="text-muted">Max size: 5MB (PDF, JPEG, PNG)</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="aadhar_card" class="form-label">Aadhar Card</label>
                                    <input type="file" class="form-control" id="aadhar_card" name="aadhar_card" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="previous_report_card" class="form-label">Previous Report Card</label>
                                    <input type="file" class="form-control" id="previous_report_card" name="previous_report_card" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms_agreed" name="terms_agreed" >
                            <label class="form-check-label" for="terms_agreed">I confirm that all information provided is accurate</label>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary prev-step" data-prev="#pills-guardian-tab">Previous</button>
                            <button type="submit" class="btn btn-success">Submit Registration</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle next step buttons
    document.querySelectorAll('.next-step').forEach(button => {
        button.addEventListener('click', function() {
            const nextTabId = this.getAttribute('data-next');
            const nextTab = document.querySelector(nextTabId);
            const currentTab = this.closest('.tab-pane');
            const inputs = currentTab.querySelectorAll(' select[required], textarea[required]');
            let isValid = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (isValid) {
                const tab = new bootstrap.Tab(nextTab);
                tab.show();
                updateProgressBar();
            }
        });
    });
    
    // Handle previous step buttons
    document.querySelectorAll('.prev-step').forEach(button => {
        button.addEventListener('click', function() {
            const prevTabId = this.getAttribute('data-prev');
            const prevTab = document.querySelector(prevTabId);
            const tab = new bootstrap.Tab(prevTab);
            tab.show();
            
            // Update progress bar
            updateProgressBar();
        });
    });
    
    // Update progress bar based on current step
    function updateProgressBar() {
        const tabs = document.querySelectorAll('.nav-link');
        const currentTab = document.querySelector('.nav-link.active');
        const currentIndex = Array.from(tabs).indexOf(currentTab);
        const progress = (currentIndex / (tabs.length - 1)) * 100;
        
        document.querySelector('.progress-bar').style.width = `${progress}%`;
        document.querySelector('.progress-bar').setAttribute('aria-valuenow', progress);
    }
    
    // Initialize progress bar
    updateProgressBar();
});
</script>
@endpush

<style>
    .progress {
        height: 10px;
    }
    
    .nav-pills .nav-link {
        position: relative;
        padding: 10px 15px;
        margin: 0 5px;
        border-radius: 4px;
    }
    
    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }
    
    .is-invalid {
        border-color: #dc3545;
    }
    
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #dc3545;
    }
    
    .is-invalid ~ .invalid-feedback {
        display: block;
    }
</style>
@endsection