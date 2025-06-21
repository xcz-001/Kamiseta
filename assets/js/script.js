const toggleLogin = document.getElementById('toggle-login');
const toggleSignup = document.getElementById('toggle-signup');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

toggleLogin.addEventListener('click', () => {
  toggleLogin.classList.add('active');
  toggleSignup.classList.remove('active');
  loginForm.classList.remove('d-none');
  signupForm.classList.add('d-none');
});

toggleSignup.addEventListener('click', () => {
  toggleSignup.classList.add('active');
  toggleLogin.classList.remove('active');
  signupForm.classList.remove('d-none');
  loginForm.classList.add('d-none');
});