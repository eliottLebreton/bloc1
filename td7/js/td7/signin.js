const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordStrength = document.getElementById('passwordStrength');
        const strengthIndicator = document.getElementById('strengthIndicator');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');

        const checkPasswordStrength = (password) => {
            const criteria = [
                password.length >= 8,
                /[A-Z]/.test(password),
                /\d/.test(password),
                /[\W_]/.test(password),
            ];
            const strength = criteria.filter(Boolean).length;
        
            console.log("Niveau de force :", strength); // Ajoute ceci pour vérifier le niveau
        
            switch (strength) {
                case 0:
                    strengthIndicator.className = 'strength-bar strength-none';
                    return 'Aucune';
                case 1:
                    strengthIndicator.className = 'strength-bar strength-weak';
                    return 'Faible';
                case 2:
                    strengthIndicator.className = 'strength-bar strength-medium';
                    return 'Moyenne';
                case 3:
                    strengthIndicator.className = 'strength-bar strength-strong';
                    return 'Bonne';
                case 4:
                    strengthIndicator.className = 'strength-bar strength-excellent';
                    return 'Excellente';
            }
        };
        

        passwordInput.addEventListener('input', () => {
            const strength = checkPasswordStrength(passwordInput.value);
            passwordStrength.innerHTML = `Force : ${strength}`;
        });

        confirmPasswordInput.addEventListener('input', () => {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.style.display = 'block';
            } else {
                confirmPasswordError.style.display = 'none';
            }
        });

        emailInput.addEventListener('input', () => {
            if (!emailInput.validity.valid) {
                emailError.style.display = 'block';
            } else {
                emailError.style.display = 'none';
            }
        });

        document.getElementById('signupForm').addEventListener('submit', (e) => {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordError.style.display = 'block';
                e.preventDefault();
            }
        });