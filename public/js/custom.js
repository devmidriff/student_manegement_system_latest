        // Function to move to next step
        function nextStep(currentStep, nextStep) {
            // Validate current step before proceeding
            if (validateStep(currentStep)) {
                // Hide current step
                document.getElementById(`step${currentStep}`).classList.remove('active');
                document.getElementById(`step${currentStep}-indicator`).classList.remove('active');
                document.querySelectorAll('.step-title')[currentStep-1].classList.remove('active');
                
                // Show next step
                document.getElementById(`step${nextStep}`).classList.add('active');
                document.getElementById(`step${nextStep}-indicator`).classList.add('active');
                document.querySelectorAll('.step-title')[nextStep-1].classList.add('active');
                
                // Update step line between indicators
                if (nextStep > 1) {
                    document.querySelectorAll('.step-line')[nextStep-2].classList.add('active');
                }
                
                // If moving to final step, update the review section
                if (nextStep === 4) {
                    updateReviewSection();
                }
            }
        }
        
        // Function to move to previous step
        function prevStep(currentStep, prevStep) {
            // Hide current step
            document.getElementById(`step${currentStep}`).classList.remove('active');
            document.getElementById(`step${currentStep}-indicator`).classList.remove('active');
            document.querySelectorAll('.step-title')[currentStep-1].classList.remove('active');
            
            // Show previous step
            document.getElementById(`step${prevStep}`).classList.add('active');
            document.getElementById(`step${prevStep}-indicator`).classList.add('active');
            document.querySelectorAll('.step-title')[prevStep-1].classList.add('active');
            
            // Update step line between indicators
            if (currentStep > 1) {
                document.querySelectorAll('.step-line')[currentStep-2].classList.remove('active');
            }
        }
        
        // Function to validate current step
        function validateStep(step) {
            let isValid = true;
            let inputs;
            
            if (step === 1) {
                inputs = document.querySelectorAll('#step1 input:required');
            } else if (step === 2) {
                inputs = document.querySelectorAll('#step2 input:required');
            } else if (step === 3) {
                inputs = document.querySelectorAll('#step3 input:required');
                // Additional password validation
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;
                
                if (password !== confirmPassword) {
                    document.getElementById('confirmPassword').classList.add('is-invalid');
                    isValid = false;
                } else {
                    document.getElementById('confirmPassword').classList.remove('is-invalid');
                }
                
                // Terms checkbox validation
                if (!document.getElementById('terms').checked) {
                    document.getElementById('terms').classList.add('is-invalid');
                    isValid = false;
                } else {
                    document.getElementById('terms').classList.remove('is-invalid');
                }
            }
            
            // Validate required fields
            inputs.forEach(input => {
                if (!input.value) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            
            return isValid;
        }
        
        // Function to update review section with entered data
        function updateReviewSection() {
            // Personal info
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const dob = document.getElementById('dob').value;
            const gender = document.querySelector('input[name="gender"]:checked').value;
            
            document.getElementById('review-personal').innerHTML = `
                <strong>Name:</strong> ${firstName} ${lastName}<br>
                <strong>Date of Birth:</strong> ${dob}<br>
                <strong>Gender:</strong> ${gender.charAt(0).toUpperCase() + gender.slice(1)}
            `;
            
            // Contact info
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;
            const city = document.getElementById('city').value;
            const zip = document.getElementById('zip').value;
            
            document.getElementById('review-contact').innerHTML = `
                <strong>Email:</strong> ${email}<br>
                <strong>Phone:</strong> ${phone}<br>
                <strong>Address:</strong> ${address}, ${city}, ${zip}
            `;
            
            // Account info
            const username = document.getElementById('username').value;
            
            document.getElementById('review-account').innerHTML = `
                <strong>Username:</strong> ${username}<br>
                <strong>Password:</strong> ********
            `;
        }
        
