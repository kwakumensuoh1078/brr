@extends('layouts.app')

@section('title', 'Login - Business Regulatory Reforms Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Login" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Account Login</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="auth-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card border-0 shadow-sm p-4 p-lg-5 bg-white" style="border-radius: 8px;">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/images/bcp_logo.png') }}" alt="BRR" style="width: 180px;" class="mb-3">
                        <h4 class="fw-bold text-dark">Sign In to Your Account</h4>
                        <p class="text-muted small">Access consultations, tracking, and personalized bookmarks.</p>
                    </div>

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <!-- Anti-Bot Honeypot -->
                        <input type="text" name="website_url_hp" class="hp-field" tabindex="-1" autocomplete="off">
                        <input type="hidden" name="form_load_time_hp" value="{{ time() }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username or Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter your username or phone" value="{{ old('username') }}" required autofocus>
                            </div>
                            @error('username')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fw-semibold">Password</label>
                                <a href="{{ route('password_reset') }}" class="small fw-semibold" style="color: #0284c7;">Forgot Password?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                        </div>

                        <div class="cf-turnstile my-3 d-flex justify-content-center" data-sitekey="{{ config('services.turnstile.key') }}" data-theme="light"></div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3" style="background-color: #04b3f6; border-color: #04b3f6; font-size: 15px;">
                            <i class="fa fa-sign-in me-1"></i> Sign In
                        </button>

                        <div class="text-center pt-3 border-top">
                            <span class="text-muted small">Don't have an account yet?</span>
                            <a href="{{ route('register') }}" class="fw-bold ms-1 small" style="color: #0284c7;">Sign Up Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
