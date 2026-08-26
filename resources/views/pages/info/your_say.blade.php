@extends('layouts.app')

@section('title', 'Have Your Say - Business Regulatory Reforms Portal')

@section('content')
<div class="page_header_default style_one blog_single_pageheader">
    <div class="parallax_cover">
        <div class="simpleParallax"><img src="{{ asset('assets/images/slider_03.jpg') }}" alt="bg_image" class="img-fluid"></div>
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            Have your say
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Have your say</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <div class="auto-container">
        <div class="row default_row">
            <div id="primary" class="content-area service col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <!--===============spacing==============-->
                    <div class="pd_top_90"></div>
                    <!--===============spacing==============-->
                    <img src="{{ asset('assets/images/haveyour-say.png') }}" alt="Have Your Say" style="max-width:580px;height:auto;" class="img-fluid">
                    <section class="blog_single_details_outer">
                        <div class="single_content_upper"></div>
                        <p style="font-size: 16px;" align="justify">
                            Have you experienced any public service that requires reform? 
                            Are Government rules and regulations hindering your business? Kindly use the form below to submit your suggestion.<br>
                            The Business Regulatory Reforms (BRR) Programme welcomes your feedback. We will work with the government agencies to systematically 
                            implement the necessary reforms and ensure businesses are able to keep pace with change and new requirements.
                        </p>

                        @if(session('success'))
                            <div class="alert alert-success mt-3 mb-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('your_say.submit') }}" id="complaintForm" autocomplete="off" style="margin-bottom:30px">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Surname</strong></label>
                                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter Your Surname" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>First Name</strong></label>
                                        <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter Your First Name" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Telephone</strong></label>
                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter Your Phone Number">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Email Address</strong></label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address" required>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Select Your Country</strong></label>
                                        <select class="form-control" id="country" name="country" required>
                                            @foreach($countries as $cntry)
                                                <option value="{{ $cntry->countries_id }}" {{ $cntry->countries_iso_code_2 == 'GH' ? 'selected' : '' }}>
                                                    {{ $cntry->countries_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Select Reform Type</strong></label>
                                        <select class="form-control" id="complainttype" name="complainttype" required>
                                            <option value="" selected disabled>Please Select Complaint Type</option>
                                            @foreach($consultationTypes as $consRow)
                                                <option value="{{ $consRow->id }}">{{ $consRow->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Please Select Sector</strong></label>
                                        <select class="form-control" id="sector" name="sector" required>
                                            <option value="" selected disabled>Please Select Sector</option>
                                            @foreach($interests as $intRow)
                                                <option value="{{ $intRow->int_id }}">{{ $intRow->interest_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Name of Institution Concerned</strong></label>
                                        <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Enter the Institution where you had such experience">
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Complaint Title</strong></label>
                                        <input type="text" class="form-control" id="complaintsubject" name="complaintsubject" placeholder="Enter the Title of your concern(s)" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label"><strong>Your Comments</strong></label>
                                        <textarea rows="3" class="form-control" id="description" name="description" placeholder="Briefly describe your experience / concerns / complaint" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-danger" id="sendEnquiry">Send Your Concerns</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_70"></div>
                    <!--===============spacing==============-->
                </main>
            </div>

            <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                <div class="side_bar">
                    <!--===============spacing==============-->
                    <div class="pd_top_40"></div>
                    <!--===============spacing==============-->
                    <div class="widgets_grid_box">
                        <div class="about_authour_widget">
                            <h3>Hi Citizen!, let's hear from you</h3>
                            <img src="{{ asset('assets/images/yoursay.jpg') }}" alt="authourimage">
                            <p>Have you experienced any public service that requires reform?</p>
                            <a href="{{ route('your_say') }}">Have your say</a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
