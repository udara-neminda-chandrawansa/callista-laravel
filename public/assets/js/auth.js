// Authentication Pages JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initializeAuth();
});

function initializeAuth() {
    setupPasswordToggle();
    setupLoginForm();
    setupRegisterForm();
    setupPasswordStrength();
}

// Password Toggle
function setupPasswordToggle() {
    const toggleBtns = document.querySelectorAll('.toggle-password');
    
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Find the input field within the same password-input-group
            const passwordGroup = this.closest('.password-input-group');
            const input = passwordGroup.querySelector('input[type="password"], input[type="text"]');
            const icon = this.querySelector('i');
            
            if (input) {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                    this.setAttribute('aria-label', 'Hide password');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                    this.setAttribute('aria-label', 'Show password');
                }
            }
        });
    });
}

// Login Form - Basic validation only (Laravel handles submission)
function setupLoginForm() {
    const loginForm = document.querySelector('form[action*="login"]');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Basic client-side validation
            if (!validateEmail(email)) {
                e.preventDefault();
                showNotification('Please enter a valid email address', 'error');
                return;
            }
            
            if (password.length < 1) {
                e.preventDefault();
                showNotification('Please enter your password', 'error');
                return;
            }
            
            // Show loading state
            const submitBtn = loginForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing In...';
            
            // Re-enable button after a delay in case of validation errors
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 5000);
        });
    }
}

// Register Form - Basic validation only (Laravel handles submission)
function setupRegisterForm() {
    const registerForm = document.querySelector('form[action*="register"]');
    
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;
            
            // Basic client-side validation
            if (!name.trim()) {
                e.preventDefault();
                showNotification('Please enter your full name', 'error');
                return;
            }
            
            if (!validateEmail(email)) {
                e.preventDefault();
                showNotification('Please enter a valid email address', 'error');
                return;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                showNotification('Password must be at least 8 characters', 'error');
                return;
            }
            
            if (password !== confirmPassword) {
                e.preventDefault();
                showNotification('Passwords do not match', 'error');
                return;
            }
            
            if (!terms) {
                e.preventDefault();
                showNotification('Please agree to the Terms of Service', 'error');
                return;
            }
            
            // Show loading state
            const submitBtn = registerForm.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating Account...';
            
            // Re-enable button after a delay in case of validation errors
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 5000);
        });
    }
}

// Password Strength Indicator
function setupPasswordStrength() {
    const passwordInput = document.getElementById('password');
    
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const strengthContainer = this.closest('.form-group').querySelector('.password-strength');
            
            if (!strengthContainer) return;
            
            const strength = calculatePasswordStrength(password);
            
            strengthContainer.className = 'password-strength';
            if (strength > 0) {
                if (strength <= 2) {
                    strengthContainer.classList.add('weak');
                } else if (strength <= 4) {
                    strengthContainer.classList.add('medium');
                } else {
                    strengthContainer.classList.add('strong');
                }
            }
        });
    }
}

function calculatePasswordStrength(password) {
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^a-zA-Z0-9]/.test(password)) strength++;
    
    return strength;
}

// Email Validation
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Phone Validation
function validatePhone(phone) {
    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    return phoneRegex.test(phone);
}

// Show Notification
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `auth-notification ${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        <span>${message}</span>
    `;
    
    notification.style.cssText = `
        position: fixed;
        top: 24px;
        right: 24px;
        background: ${type === 'success' ? '#d1fae5' : '#fee'};
        color: ${type === 'success' ? '#065f46' : '#dc2626'};
        padding: 16px 24px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        z-index: 10000;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
        animation: slideInRight 0.3s ease;
        max-width: 400px;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
}

// Social Login (Demo)
document.querySelectorAll('.social-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const provider = this.classList.contains('google') ? 'Google' : 'Facebook';
        showNotification(`${provider} login will be implemented soon`, 'success');
    });
});

// Animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100%);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideOutRight {
        from {
            opacity: 1;
            transform: translateX(0);
        }
        to {
            opacity: 0;
            transform: translateX(100%);
        }
    }
`;
document.head.appendChild(style);
