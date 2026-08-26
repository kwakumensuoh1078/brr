@extends('layouts.app')

@section('title', 'Sign Up - Business Regulatory Reforms Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Sign Up" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Create an Account</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Sign Up</li>
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
            <div class="col-lg-6 col-md-9">
                <div class="card border-0 shadow-sm p-4 p-lg-5 bg-white" style="border-radius: 8px;">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/images/bcp_logo.png') }}" alt="BRR" style="width: 180px;" class="mb-3">
                        <h4 class="fw-bold text-dark">Join the BRR Consultation Community</h4>
                        <p class="text-muted small">Participate in policy reviews, discussion forums, and track reforms.</p>
                    </div>

                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <!-- Anti-Bot Honeypot -->
                        <input type="text" name="website_url_hp" class="hp-field" tabindex="-1" autocomplete="off">
                        <input type="hidden" name="form_load_time_hp" value="{{ time() }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" name="user_fullname" class="form-control @error('user_fullname') is-invalid @enderror" placeholder="e.g. Kwame Mensah" value="{{ old('user_fullname') }}" required>
                            @error('user_fullname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Username *</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Choose a unique username" value="{{ old('username') }}" required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone Number *</label>
                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="e.g. 0244123456" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Password *</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Min. 8 characters" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Confirm Password *</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type password" required>
                            </div>
                        </div>

                        <div class="cf-turnstile my-3 d-flex justify-content-center" data-sitekey="{{ config('services.turnstile.key') }}" data-theme="light"></div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3" style="background-color: #04b3f6; border-color: #04b3f6; font-size: 15px;">
                            <i class="fa fa-user-plus me-1"></i> Register Account
                        </button>

                        <div class="text-center pt-3 border-top">
                            <span class="text-muted small">Already have an account?</span>
                            <a href="{{ route('login') }}" class="fw-bold ms-1 small" style="color: #0284c7;">Sign In Here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
