//for toggle button
const toggleLogin = document.getElementById('toggle-login');
const toggleSignup = document.getElementById('toggle-signup');
const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');

toggleLogin.addEventListener('click', () => {
  toggleLogin.classList.add('active');
  toggleSignup.classList.remove('active');
  signupForm.classList.add('d-none');
  loginForm.classList.remove('d-none');
});

toggleSignup.addEventListener('click', () => {
  toggleSignup.classList.add('active');
  toggleLogin.classList.remove('active');
  loginForm.classList.add('d-none');
  signupForm.classList.remove('d-none');
});

/**
 * @brief Validates two password fields for signup requirements.
 *
 * Checks if the two provided passwords match, are at least 8 characters long,
 * contain at least one number, one uppercase letter, and one special character.
 *
 * @param password1 The first password input.
 * @param password2 The second password input (confirmation).
 * @returns An object with @c valid (boolean) and @c message (string) properties.
 */
function validatePassword(password1, password2) {
  // Check if passwords match
  if (password1 !== password2) {
    return { valid: false, message: "Passwords do not match." };
  }
  // Check length
  if (password1.length < 8) {
    return { valid: false, message: "Password must be at least 8 characters long." };
  }
  // Check for at least one number
  if (!/\d/.test(password1)) {
    return { valid: false, message: "Password must contain at least one number." };
  }
  // Check for at least one uppercase letter
  if (!/[A-Z]/.test(password1)) {
    return { valid: false, message: "Password must contain at least one uppercase letter." };
  }
  // Check for at least one special character
  if (!/[!@#$%^&*(),.?":{}|<>]/.test(password1)) {
    return { valid: false, message: "Password must contain at least one special character." };
  }
  // All checks passed
  return { valid: true, message: "Password is valid." };
}

//test3 = Qwerty123!
//admin = admin123!Q
document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.getElementById('loginForm');
  const signupForm = document.getElementById('signupForm');
  if (loginForm) {
    loginForm.addEventListener('submit', async function (event) {
      event.preventDefault();

      const formData = new FormData(this);
      const data = Object.fromEntries(formData.entries());
      console.log('Data sent to the server:', data);//test

      try {
        const res = await fetch('api/users/login.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        });

        const result = await res.json();
        console.log(res.status,result.user);
        if (res.ok) {
          loginForm.reset();
          if (result.user.role === 'user') {
            window.location.href = 'pages/home.php';
          } else if (result.user.role === 'admin') {
            window.location.href = 'pages/admin/admin.php';
          }
        } else {
          alert(result.error || 'Login failed');
        }
      } catch (err) {
        console.error('Error:', err);
        alert('Something went wrong.');
      }
    });
  }//if login form is loaded

  if (signupForm) {
    signupForm.addEventListener('submit', async function(event) {
      event.preventDefault(); // Prevent form submission

      const password1 = document.getElementById('signupPassword1').value;
      const password2 = document.getElementById('signupPassword2').value;

      const validation = validatePassword(password1, password2);

      if (!validation.valid) {
        alert(validation.message);
      } else {
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());
        console.log('Trying to contact the server...');//test
        console.log('Data sent to the server:', data);//test

        try {
          const res = await fetch('api/users/signup.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
          });
          const result = await res.json();
          console.log(res.status);
          if (res.status === 200) {
            signupForm.reset();
            alert('User created successfully, proceed to login!');
            window.location.reload();
          } else if (res.status === 409) {
            alert(result.error || 'Username already exists');
          } else if (res.status === 400) {
            alert(result.error || 'Missing required fields');
          } else {
            alert(result.error || 'An error occurred');
            console.error('Error:', err);//test
          }
        } catch (err) {
          alert('Something went wrong. Please try again later.');
          console.error('Error:', err);
        }
      }
    });
  }//if signup form is loaded
});