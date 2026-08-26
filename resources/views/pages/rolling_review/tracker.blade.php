@extends('layouts.app')

@section('title', 'Reform Tracker - BRR Ghana')

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
                            Reform Tracker
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Reform Tracker</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content">
    <section class="about-section">
        <!--===============spacing==============-->
        <div class="pd_top_30"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="about_content position-relative z_99">
                        <div class="title_all_box style_one text-left dark_color">
                            <div class="title_sections">
                                <h5>Reform Monitoring & Tracking System</h5>
                            </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_5"></div>
                        <!--===============spacing==============-->
                        <div class="description_box">
                            <p>
                                A Web-based performance management system to setup, manage, monitor and track reform activities undertaking by various Reform 
                                Institutions across the country aimed at improving doing business environment.
                            </p>
                            <p>
                                Based on the feedback received from the general public and the business community on their experience with public services, the TWGs develop reform recommendations for implementation by the relevant reform implementing institutions to create a congenial environment for private sector development. 
                                <br>The reform recommendations largely covered:
                                <ul>
                                    <li>legal and regulatory reviews,</li>
                                    <li>review of administrative procedures,</li>
                                    <li>automation/digitalization of administrative processes</li>
                                    <li>review of fees structure</li>
                                </ul> 
                            </p>
                            <img src="{{ asset('assets/images/tracker_obj.png') }}" alt="Tracker Objectives">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-12">
                    <div class="image_boxes style_two">
                        <div class="image two">
                            <img src="{{ asset('assets/images/about/about-7.png') }}" class="img-fluid" alt="image">
                            <div class="video_box">
                                <a href="https://www.youtube.com/watch?v=pdWwiQf7h9s" class="lightbox-image" target="_blank"><i class="icon-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_30"></div>
        <!--===============spacing==============-->
    </section>

    <section class="newsteller style_one bg_dark_1">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12">
                    <div class="content">
                        <h2>Are you a Reform Institution?</h2>
                        <p>Please login to the Reform Tracker to update your reforms activities</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="color_white_1 clearfix">
                        <a href="https://brr.gov.gh/reforms" target="_blank" class="theme-btn color_white_1 one">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_40"></div>
        <!--===============spacing==============-->
    </section>

    <section class="service-icon-section bg_light_1">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_all_box style_one text-center dark_color">
                        <div class="title_sections">
                            <h2 class="title">Process Flow</h2>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="simple_image_boxes parallax_cover height_264px">
                        <img src="{{ asset('assets/images/icon-img-ab-1.jpg') }}" class="simp_img cover-parallax" alt="image">
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_20"></div>
                    <!--===============spacing==============-->
                    <div class="icon_box_all style_three">
                        <div class="icon_content">
                            <div class="icon">
                                <span class="icon-bow-and-arrow"></span>
                            </div>
                            <div class="txt_content">
                                <h3><a href="#" target="_blank" rel="nofollow">Reforms</a></h3>
                                <p>Set up various Reform components, objectives & activities.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-0 mt-xl-0">
                    <div class="icon_box_all style_three">
                        <div class="icon_content">
                            <div class="icon">
                                <span class="icon-growth"></span>
                            </div>
                            <div class="txt_content">
                                <h3><a href="#" target="_blank" rel="nofollow">Reform Institutions</a></h3>
                                <p>Set up various Reform Implementing Institutions in the System</p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_20"></div>
                    <!--===============spacing==============-->
                    <div class="icon_box_all style_three">
                        <div class="icon_content">
                            <div class="icon">
                                <span class="icon-growth"></span>
                            </div>
                            <div class="txt_content">
                                <h3><a href="#" target="_blank" rel="nofollow">Reform Data</a></h3>
                                <p>Input various Reform Activities and aligned them to implementing Institutions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-4 mt-lg-4 mt-xl-0">
                    <div class="icon_box_all style_three">
                        <div class="icon_content">
                            <div class="icon">
                                <span class="icon-binoculars"></span>
                            </div>
                            <div class="txt_content">
                                <h3><a href="#" target="_blank" rel="nofollow">Report</a></h3>
                                <p>Generate Management Report on Various Reforms.</p>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_20"></div>
                    <!--===============spacing==============-->
                    <div class="simple_image_boxes height_264px">
                        <img src="{{ asset('assets/images/icon-img-ab-2.jpg') }}" class="simp_img img-fluid" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_top_90"></div>
        <!--===============spacing==============-->
    </section>
</div>
@endsection
