@extends('frontend.layouts.app')


@section('title')
    
@endsection

@section('content')

@php
    $email ;
    $password ;
@endphp

@if(Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get('error') }}',
        });
    </script>
@endif

<section class="login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="form-head">
                    <h4 class="title">Login</h4>
                    <form  id="loginForm" action="{{ route('login_post') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Username or email</label>
                            <input name="email" id="email" type="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                            <span id="emailError" class="error text-danger "></span>

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" id="password" type="password" placeholder="Password" >
                            <span id="passwordError" class="error text-danger"></span>

                        </div>
                     
                        <div class="button">
                            <button   type="submit" class="btn"
                            >
                            Login Now
                        </button>
                        </div>
                        
                     
                        <p class="outer-link">Don't have an account? <a href="registration.html">Register here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    // Real-time validation using JavaScript
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let emailError = document.getElementById('emailError');
        let passwordError = document.getElementById('passwordError');
        
        // Clear previous errors
        emailError.textContent = '';
        passwordError.textContent = '';

        // Client-side validation
        if (!email) {
            emailError.textContent = 'Email is required';
            event.preventDefault();
        } else if (!isValidEmail(email)) {
            emailError.textContent = 'Invalid email format';
            event.preventDefault();
        }
        
        if (!password) {
            passwordError.textContent = 'Password is required';
            event.preventDefault();
        }
        function isValidEmail(email) {
        return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
    }
    });
</script>
@endsection