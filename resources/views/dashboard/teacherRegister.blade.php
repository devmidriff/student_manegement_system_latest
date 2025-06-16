@extends('layouts.mangement')

@section('title', 'Add Teacher')

@section('main-content')
<div class="registration-container">
    <h2 class="form-header">Teacher Registration</h2>
    
    <form id="teacherRegistrationForm" class="registration-form" method="POST" action="{{ route('registerFrom.teacher') }}">
        @csrf
        
        <!-- Personal Information -->
        <div class="form-section">
            <h3>Personal Information</h3>
            
            <div class="form-group">
                <label>First Name*</label>
                <input type="text" name="firstName" required>
            </div>
            
            <div class="form-group">
                <label>Last Name*</label>
                <input type="text" name="lastName" required>
            </div>
            
            <div class="form-group">
                <label>Email*</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Phone*</label>
                <input type="tel" name="phone" required>
            </div>
        </div>

        <!-- Professional Information -->
        <div class="form-section">
            <h3>Professional Information</h3>
            
            <div class="form-group">
                <label>Highest Qualification*</label>
                <input type="text" name="qualification" required>
            </div>
            
            <div class="form-group">
                <label>Specialization*</label>
                <input type="text" name="specialization" required>
            </div>
            
            <div class="form-group">
                <label>Years of Experience*</label>
                <input type="number" name="experience" min="0" required>
            </div>
            
            <div class="form-group">
                <label>Subjects*</label>
                <input type="text" name="subjects" required>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="submit-btn">Register Teacher</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
.registration-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-header {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
}

.form-section {
    margin-bottom: 25px;
    padding: 15px;
    border: 1px solid #eee;
    border-radius: 5px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.submit-btn {
    background: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.submit-btn:hover {
    background: #2980b9;
}
</style>
@endpush