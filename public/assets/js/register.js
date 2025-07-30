// document.addEventListener("DOMContentLoaded", function() {
//     const password = document.getElementById('password');
//     const confirmPassword = document.getElementById('password_confirmation');
//     const errorDiv = document.getElementById('password-error');
//     const signupForm = document.getElementById('signupForm');
//     const signupBtn = document.getElementById('signupBtn');

//     function validatePasswordMatch() {
//         if (password.value !== confirmPassword.value) {
//             errorDiv.style.display = 'block';
//             errorDiv.textContent = 'Passwords do not match!';
//             signupBtn.disabled = true;
//         } else {
//             errorDiv.style.display = 'none';
//             signupBtn.disabled = false;
//         }
//     }

//     password.addEventListener('input', validatePasswordMatch);
//     confirmPassword.addEventListener('input', validatePasswordMatch);

//     signupForm.addEventListener('submit', function(e) {
//         if (password.value !== confirmPassword.value) {
//             errorDiv.style.display = 'block';
//             errorDiv.textContent = 'Passwords do not match!';
//             signupBtn.disabled = true;
//             e.preventDefault();
//         }
//     });
// });

// public/assets/js/register.js
document.addEventListener('DOMContentLoaded', function () {
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirmation');
    const error = document.getElementById('password-error');
    const form = document.getElementById('signupForm');

    function checkPasswordMatch() {
        if (confirm.value !== password.value) {
            error.innerText = "Passwords do not match!";
            error.style.display = 'block';
            return false;
        } else {
            error.innerText = "";
            error.style.display = 'none';
            return true;
        }
    }

    // Live check
    password.addEventListener('input', checkPasswordMatch);
    confirm.addEventListener('input', checkPasswordMatch);

    // Prevent submit if not matching
    form.addEventListener('submit', function(e) {
        if (!checkPasswordMatch()) {
            e.preventDefault();
            confirm.focus();
        }
    });
});
