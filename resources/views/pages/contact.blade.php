@extends('layouts.app')

@section('title', 'Contact Us - Business Regulatory Reforms Portal Ghana')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <img src="{{ asset('assets/images/slider_03.jpg') }}" alt="Contact Us" class="cover-parallax img-fluid">
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">Contact Us</div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact-section py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-7 mb-4">
                <div class="card border-0 shadow-sm p-4 p-lg-5 bg-white" style="border-radius: 8px;">
                    <h3 class="fw-bold mb-3" style="color: #ad2702;">Get In Touch With Our Team</h3>
                    <p class="text-muted mb-4" style="line-height: 1.8;">
                        Have questions about business regulations, public consultations, or need technical assistance? Fill out the secure form below.
                    </p>

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <!-- Anti-Bot Honeypot -->
                        <input type="text" name="website_url_hp" class="hp-field" tabindex="-1" autocomplete="off">
                        <input type="hidden" name="form_load_time_hp" value="{{ time() }}">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Your Name *</label>
                                <input type="text" name="name" class="form-control" required value="{{ old('name', Auth::user()?->user_fullname) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Your Email *</label>
                                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Subject *</label>
                                <input type="text" name="subject" class="form-control" required value="{{ old('subject') }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Your Message *</label>
                                <textarea name="message" rows="5" class="form-control" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success px-4 py-2">
                                    <i class="fa fa-paper-plane me-1"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Secretariat Information -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 8px;">
                    <h4 class="fw-bold mb-4" style="color: #ad2702;">BRR Secretariat</h4>
                    
                    <div class="d-flex mb-3">
                        <div class="text-success me-3 pt-1"><i class="fa fa-map-marker fa-2x"></i></div>
                        <div>
                            <strong class="d-block text-dark">Office Location</strong>
                            <span class="text-muted">Ministry of Trade & Industry, Ministries Post Office, Accra - Ghana</span>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="text-primary me-3 pt-1"><i class="fa fa-location-arrow fa-2x"></i></div>
                        <div>
                            <strong class="d-block text-dark">Digital Address (GPS)</strong>
                            <span class="text-muted">GA-144-0150</span>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="text-success me-3 pt-1"><i class="fa fa-phone fa-2x"></i></div>
                        <div>
                            <strong class="d-block text-dark">Telephone Support</strong>
                            <span class="text-muted"><a href="tel:+233302962909" class="text-muted">(+233) 302 962 909</a></span>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="text-warning me-3 pt-1"><i class="fa fa-envelope fa-2x"></i></div>
                        <div>
                            <strong class="d-block text-dark">Email Inquiries</strong>
                            <span class="text-muted"><a href="mailto:info@brr.gov.gh" class="text-muted">info@brr.gov.gh | brr@moti.gov.gh</a></span>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-4 text-white" style="background: linear-gradient(135deg, #ad2702 0%, #c0392b 100%); border-radius: 8px;">
                    <h5 class="fw-bold text-white mb-2">Have a Reform Proposal?</h5>
                    <p class="small text-white-50 mb-3">Submit your business reform suggestions directly into the Technical Committee's review pipeline.</p>
                    <a href="{{ route('your_say') }}" class="btn btn-light btn-sm fw-bold">Submit Reform Proposal</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
