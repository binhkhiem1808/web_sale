{{-- @extends('layouts.app')

@section('content')
<div class="main">

    <div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg');">
        <div class="inner">
            <form method="POST" action="{{url('/register')}}" id="signup-form" class="signup-form">

                <h3>Registration Form</h3>
                <div class="form-wrapper">
                    <label for="name">Username</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="password">Password confirm</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="email">Email</label>
                    <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" required> I caccept the Terms of Use & Privacy Policy.
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button type="submit">Register Now</button>
            </form>
            <p class="loginhere">
                Have already an account ? <a href="{{url('login')}}" class="loginhere-link">Login here</a>
            </p>
        </div>
    </div>

</div>
@endsection

@push('register')
    <link rel="stylesheet" href="/assets/register.css">
@endpush --}}

@extends('layouts.app')

@section('content')
<div class="main">

    <div class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                <form method="POST" action="{{url('/register')}}" id="signup-form" class="signup-form">
                    @csrf
                    <h2 class="form-title">Create account</h2>
                    <div class="mb-3">
                        <label for="name">Username</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password confirm</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Log out</button>
                </form>
                <p class="loginhere">
                    Have already an account ? <a href="{{url('login')}}" class="loginhere-link">Login here</a>
                </p>
            </div>
        </div>
    </div>

</div>
@endsection

@push('register')
    <link rel="stylesheet" href="/assets/register.css">
@endpush