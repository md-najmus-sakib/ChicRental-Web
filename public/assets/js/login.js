document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.form-control').forEach(function(input) {
        input.addEventListener('focus', function() {
            this.style.borderColor = '#e53935';
            this.style.boxShadow = '0 0 0 0.2rem rgba(229,57,53,.15)';
        });
        input.addEventListener('blur', function() {
            this.style.borderColor = '#ced4da';
            this.style.boxShadow = 'none';
        });
    });

    const loginForm = document.getElementById('loginForm');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const errorDiv = document.getElementById('login-error');
    const loginBtn = document.getElementById('loginBtn');

    loginForm.addEventListener('submit', function(e) {
        let valid = true;
        errorDiv.style.display = 'none';

        email.classList.remove('shake');
        password.classList.remove('shake');

        if (!email.value) {
            email.classList.add('shake');
            valid = false;
        }
        if (!password.value) {
            password.classList.add('shake');
            valid = false;
        }
        if (!valid) {
            errorDiv.textContent = 'Please fill in both Email and Password!';
            errorDiv.style.display = 'block';
            e.preventDefault();
        }
    });

    const style = document.createElement('style');
    style.textContent = `
        .shake {
            animation: shake 0.2s 2;
            border-color: #e53935 !important;
        }
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    `;
    document.head.appendChild(style);
});