@extends('layouts.mangement')

@section('title', 'Student Registration')

@section('pagename')
  Dashboard
@endsection

@section('main-content')
<div class="registration-container">
    <h2 class="form-header">Student Registration</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form id="studentRegistrationForm" method="POST" action="{{ route('register.student') }}">
        @csrf

        <!-- Student Info -->
        <div class="form-section">
            <h3>Student Information</h3>

            <div class="form-group">
                <label>Name*</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email*</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Phone*</label>
                <input type="tel" name="phone" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea name="address">{{ old('address') }}</textarea>
            </div>
        </div>

        <!-- Guardian/Parent Info -->
        <div class="form-section">
            <h3>Guardian Information (Optional)</h3>

            <div class="form-group">
                <label>Do you want to add a guardian?</label>
                <select id="guardian_option" name="guardian_option">
                    <option value="">No</option>
                    <option value="existing" {{ old('guardian_option') == 'existing' ? 'selected' : '' }}>Select Existing</option>
                    <option value="new" {{ old('guardian_option') == 'new' ? 'selected' : '' }}>Add New</option>
                </select>
            </div>

            <!-- Existing guardian dropdown -->
            <div id="existing_guardian_section" class="form-group" style="display:none;">
                <label>Select Guardian</label>
                <select name="existing_guardian_id">
                    <option value="">-- Select --</option>
                    
                @foreach($guardians as $guardian)
                    <option value="{{ $guardian->id }}">
                        {{ $guardian->user->name }} - {{ $guardian->user->email }}
                    </option>
                @endforeach
                </select>
            </div>

            <!-- New guardian fields -->
            <div id="new_guardian_section" style="display:none;">
                <div class="form-group">
                    <label>Guardian Name*</label>
                    <input type="text" name="guardian_name" value="{{ old('guardian_name') }}">
                </div>

                <div class="form-group">
                    <label>Guardian Email*</label>
                    <input type="email" name="guardian_email" value="{{ old('guardian_email') }}">
                </div>

                <div class="form-group">
                    <label>Guardian Phone*</label>
                    <input type="tel" name="guardian_phone" value="{{ old('guardian_phone') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="submit-btn">Register Student</button>
        </div>
    </form>
</div>

<script>
    // Toggle guardian sections based on dropdown
    const guardianSelect = document.getElementById('guardian_option');
    const existingSection = document.getElementById('existing_guardian_section');
    const newSection = document.getElementById('new_guardian_section');

    function toggleGuardianFields() {
        const value = guardianSelect.value;
        existingSection.style.display = (value === 'existing') ? 'block' : 'none';
        newSection.style.display = (value === 'new') ? 'block' : 'none';
    }
    guardianSelect.addEventListener('change', toggleGuardianFields);
    window.onload = toggleGuardianFields;
</script>
@endsection