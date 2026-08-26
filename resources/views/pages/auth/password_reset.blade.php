@extends('layouts.app')

@section('title', 'Reset Password - Business Regulatory Reforms Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Password Reset" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Reset Password</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Reset Password</li>
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
                        <div class="bg-light p-3 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; color: #04b3f6;">
                            <i class="fa fa-key fa-2x"></i>
                        </div>
                        <h4 class="fw-bold text-dark">Password Recovery</h4>
                        <p class="text-muted small">Enter the phone number associated with your account to receive an OTP reset code.</p>
                    </div>

                    <form action="{{ route('password_reset.send_otp') }}" method="POST">
                        @csrf
                        <!-- Anti-Bot Honeypot -->
                        <input type="text" name="website_url_hp" class="hp-field" tabindex="-1" autocomplete="off">
                        <input type="hidden" name="form_load_time_hp" value="{{ time() }}">

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Registered Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                <input type="text" name="phone_number" class="form-control" placeholder="e.g. 0244123456" required autofocus>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold mb-3" style="background-color: #04b3f6; border-color: #04b3f6; font-size: 15px;">
                            <i class="fa fa-send me-1"></i> Send OTP Code
                        </button>

                        <div class="text-center pt-3 border-top">
                            <a href="{{ route('login') }}" class="text-muted small"><i class="fa fa-arrow-left me-1"></i> Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
