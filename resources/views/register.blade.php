@extends('frontend.cores.master')
{{--@include('frontend.cores.layouts.header')--}}
@section('content')
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="{{route('auth.register')}}" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name">
                        </div>
                        @error('name')
                        <p class="alert-danger">{{$message}}</p>
                        @enderror
                        <div class="group-input">
                            <label for="username">Email *</label>
                            <input type="text" id="username" name="email">
                        </div>
                        @error('email')
                        <p class="alert-danger">{{$message}}</p>
                        @enderror
                        <div class="group-input">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password">
                        </div>
                        @error('password')
                        <p class="alert-danger">{{$message}}</p>
                        @enderror
                        <div class="group-input">
                            <label for="repassword">Password *</label>
                            <input type="password" id="repassword" name="password_confirm">
                        </div>
                        @error('password_confirm')
                        <p class="alert-danger">{{$message}}</p>
                        @enderror
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Forget your Password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Register</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{route('FormLogin')}}" class="or-login">Or Sing In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
