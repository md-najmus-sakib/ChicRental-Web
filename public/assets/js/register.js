document.addEventListener("DOMContentLoaded", function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    const errorDiv = document.getElementById('password-error');
    const signupForm = document.getElementById('signupForm');
    const signupBtn = document.getElementById('signupBtn');

    function validatePasswordMatch() {
        if (password.value !== confirmPassword.value) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = 'Passwords do not match!';
            signupBtn.disabled = true;
        } else {
            errorDiv.style.display = 'none';
            signupBtn.disabled = false;
        }
    }

    password.addEventListener('input', validatePasswordMatch);
    confirmPassword.addEventListener('input', validatePasswordMatch);

    signupForm.addEventListener('submit', function(e) {
        if (password.value !== confirmPassword.value) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = 'Passwords do not match!';
            signupBtn.disabled = true;
            e.preventDefault();
        }
    });
});