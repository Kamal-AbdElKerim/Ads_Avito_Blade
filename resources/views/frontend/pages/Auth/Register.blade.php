@extends('frontend.layouts.app')



@section('title')
    
@endsection

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html">Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
  
    <!-- start Registration section -->
    <section class="login registration section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Registration</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form id="registrationForm" method="POST" action="{{ route('register_post') }}">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}">
                                <span id="nameError" class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}">
                                <span id="emailError" class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" id="phone" value="{{ old('phone') }}">
                                <span id="phoneError" class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password">
                                <span id="passwordError" class="error text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" id="confirmPassword">
                                <span id="confirmPasswordError" class="error text-danger"></span>
                            </div>
                          
                            <div class="button">
                                <button type="submit" class="btn">Registration</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('login') }}"> Login Now</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const registrationForm = document.getElementById('registrationForm');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');

        nameInput.addEventListener('blur', validateName);
        emailInput.addEventListener('blur', validateEmail);
        phoneInput.addEventListener('blur', validatePhone);
        passwordInput.addEventListener('blur', validatePassword);
        confirmPasswordInput.addEventListener('blur', validateConfirmPassword);

        function validateName() {
            const name = nameInput.value.trim();
            if (name === '') {
                document.getElementById('nameError').textContent = 'Name is required';
            } else {
                document.getElementById('nameError').textContent = '';
            }
        }

        function validateEmail() {
            const email = emailInput.value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === '') {
                document.getElementById('emailError').textContent = 'Email is required';
            } else if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Invalid email format';
            } else {
                document.getElementById('emailError').textContent = '';
            }
        }

        function validatePhone() {
             const phone = phoneInput.value.trim();
            const phoneRegex = /^\d{10}$/; // Assuming a 10-digit phone number
            if (phone === '') {
                document.getElementById('phoneError').textContent = 'Phone number is required';
            } else if (!phoneRegex.test(phone)) {
                document.getElementById('phoneError').textContent = 'Invalid phone number format';
            } else {
                document.getElementById('phoneError').textContent = '';
            }
            }


            function validatePassword() {
    const password = passwordInput.value.trim();
    if (password === '') {
        document.getElementById('passwordError').textContent = 'Password is required';
    } else if (password.length < 8) {
        document.getElementById('passwordError').textContent = 'Password must be at least 8 characters long';
    } else {
        document.getElementById('passwordError').textContent = '';
    }
}



        function validateConfirmPassword() {
            const confirmPassword = confirmPasswordInput.value.trim();
            const password = passwordInput.value.trim();
            if (confirmPassword !== password) {
                document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
            } else {
                document.getElementById('confirmPasswordError').textContent = '';
            }
        }

        registrationForm.addEventListener('submit', function(event) {
            validateName();
            validateEmail();
            validatePhone();
            validatePassword();
            validateConfirmPassword();
            const errors = document.querySelectorAll('.error');
            let hasErrors = false;
            errors.forEach(error => {
                if (error.textContent !== '') {
                    hasErrors = true;
                }
            });
            if (hasErrors) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection