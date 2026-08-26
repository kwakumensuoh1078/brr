@extends('layouts.app')

@section('title', 'BRR Portal - Reforming to Transform Ghana')
@section('meta_description', 'Official Ghana Business Regulatory Reforms (BRR) Portal - Public consultations, e-Registry of business regulations, B-Ready indicators, and reform tracking.')

@section('content')
    <!--- slider-->
    <section class="slider style_page_fourteen nav_position_one position-relative" style="margin-bottom:-50px">
        <div class="banner_carousel owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
            data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
            <div class="slide-item-content">
                <div class="slide-item content_center">
                    <div class="image-layer" style="background-image:url({{ asset('assets/images/sliders/Law-1.png') }})"></div>
                    <div class="medium-container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="slider_content">
                                    <h1 class="animate_up">Do you know</h1>
                                    <h6 class="animate_left">
                                        you can search for specific provisions of any Business Regulations in Ghana on this Portal?
                                    </h6>
                                    <form method="GET" action="{{ route('search') }}">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input class="form-control" name="search" id="search" placeholder="Enter keywords/phrase to search..." type="text" required>
                                                </div> 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button id="searchsubmit" class="search-banner-btn" style="background: #04b3f6; border-color: #04b3f6; color: white;" type="submit">
                                                        <i class="fa fa-search"></i> Search for Regulation
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Public Consultations -->
    <section class="feature-section" style="margin-top:20px">
        <!--===============spacing==============-->
        <div class="pd_top_30"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_all_box style_seven text-center dark_color">
                        <div class="title_sections">
                            <div class="title" style="font-size:x-large;"> PUBLIC CONSULTATIONS</div>
                            <p class="description_text">
                                Latest draft policies for Public Consultations.
                            </p>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_30"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($featuredConsultations as $consRow)
                    @php
                        $orgName = $consRow->officer?->org?->org_name ?: 'Ministry of Trade & Industry';
                        $isClosed = ($consRow->status == 'Closed');
                        $daysLeft = 0;
                        if ($consRow->end_date) {
                            $endTs = strtotime($consRow->end_date);
                            $todayTs = strtotime(date('Y-m-d'));
                            $daysLeft = round(($endTs - $todayTs) / (60 * 60 * 24));
                        }
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-4">
                        <div class="icon_box_new_box type_two h-100">
                            <span class="borders"></span>
                            <div class="content d-flex flex-column justify-content-between h-100">
                                <div>
                                    <h2>
                                        <a href="{{ route('consultations.show', $consRow->id) }}">
                                            {{ Str::limit($consRow->topic, 50) }}
                                        </a>
                                    </h2>
                                    <p>{{ Str::limit(strip_tags($consRow->brief_background ?: $consRow->summary), 120) }}</p>
                                    <a href="{{ route('consultations.show', $consRow->id) }}" class="read_more type_two">
                                        Read More <span class="icon-arrow-right"></span><br/>
                                    </a>
                                </div>
                                <div class="pt-2">
                                    <span style="color: #0284c7; font-weight: bold; font-size: 15px;">Sponsor: </span>
                                    <span style="font-size: 15px;" align="justify">{{ $orgName }}</span>
                                    <br/>
                                    @if($isClosed)
                                        <span style="color: #000000; font-weight: bold; font-size: 14px;">Status: </span>
                                        <span style="color: #64748b; font-weight: bold; font-size: 11px;">CLOSED</span>
                                    @else
                                        <span style="color: #000000; font-weight: bold; font-size: 15px;">Days Left: </span> 
                                        <span style="font-size: 15px; color: #0284c7; font-weight: 600;">{{ $daysLeft }} Day(s)</span>
                                        <div class="mt-2">
                                            <a href="{{ route('consultations.show', $consRow->id) }}" class="read_more type_two fw-bold" style="color: #0284c7;">
                                                Participate <span class="icon-arrow-right"></span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted">No public consultations currently listed.</p>
                    </div>
                @endforelse
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_30"></div>
        <!--===============spacing==============-->
    </section>

    <!-- About The BRR Programme -->
    <section class="about-section bg_light_1 position-relative">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="title_all_box style_seven dark_color">
                        <div class="title_sections">
                            <div class="before_title">
                                <b>The BRR Programme</b>
                            </div>
                            <div class="small_text_sub">About Us</div>
                            <p class="description_text" align="justify">
                                The Business Regulatory Reform (BRR) programme is an integral component of Government’s Economic and Industrial Transformation Agenda. 
                                The programme aims at establishing a world-class Regulatory Administration in Ghana by improving the quality, predictability and transparency of regulatory services. 
                                This is expected to create a conducive business environment to attract private capital and stimulate youth entrepreneurship and job creation. 
                                <br/><br/>
                                The BRR Programme consists of seven pillars intended to systematically transform how Government makes and revises the regulations governing business activities in Ghana.
                                It is designed to put in place efficient and fair government rules that encourage all businesses - small, medium and large - to invest in innovation, 
                                drive economic transformation, create more jobs, and become successful in the domestic, regional or global markets.
                            </p>
                            <a href="{{ route('about') }}" class="read_more type_two">
                                Read More <span class="icon-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_20"></div>
                    <!--===============spacing==============-->
                    <div class="icon_carousel_box_all">
                        <div class="owl_dots_block theme_carousel owl-theme owl-carousel"
                            data-options='{"loop": true, "margin": 20, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
                            <div class="icon_caro type_one">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/focus.png') }}" class="img-fluid svg_image" alt="icon png" />
                                </div>
                                <div class="text">
                                    <h2><a href="#">Our Vision</a></h2>
                                    <p>The vision is to make Ghana the most business-friendly economy in Africa.</p>
                                </div>
                            </div>
                            <div class="icon_caro type_one">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/shooting-target.png') }}" class="img-fluid svg_image" alt="icon png" />
                                </div>
                                <div class="text">
                                    <h2><a href="#">Our Objectives</a></h2>
                                    <p>1. To clean up or simplify existing business regulations that are inefficient or are not business-friendly.</p>
                                </div>
                            </div>
                            <div class="icon_caro type_one">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/shooting-target.png') }}" class="img-fluid svg_image" alt="icon png" />
                                </div>
                                <div class="text">
                                    <h2><a href="#">Our Objectives</a></h2>
                                    <p>2. To improve how business regulations are produced by ensuring that new regulations meet agreed minimum criteria, e.g. business-friendliness, anticipated impact (cost-benefit), etc.</p>
                                </div>
                            </div>
                            <div class="icon_caro type_one">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/shooting-target.png') }}" class="img-fluid svg_image" alt="icon png" />
                                </div>
                                <div class="text">
                                    <h2><a href="#">Our Objectives</a></h2>
                                    <p>3. To establish acceptable standards of transparency to protect the integrity of regulatory practices.</p>
                                </div>
                            </div>
                            <div class="icon_caro type_one">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/shooting-target.png') }}" class="img-fluid svg_image" alt="icon png" />
                                </div>
                                <div class="text">
                                    <h2><a href="#">Our Objectives</a></h2>
                                    <p>4. To build capacity of public institutions (regulators) in specific or targeted areas of regulatory services delivery.</p>
                                </div>
                            </div>
                            <div class="icon_caro type_one">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/shooting-target.png') }}" class="img-fluid svg_image" alt="icon png" />
                                </div>
                                <div class="text">
                                    <h2><a href="#">Our Objectives</a></h2>
                                    <p>5. To communicate more inclusively to make the business environment a shared priority.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="image_box_new type_two clearfix pd_left_40 md_pd_left_zero">
                        <div class="image_box_inner">
                            <div class="image one">
                                <img src="{{ asset('assets/images/about/video1.png') }}" class="img-fluid" alt="Consultations Portal Mockup">
                                <div class="video_box video-inner text-center">
                                    <a href="https://www.youtube.com/watch?v=khIF-H1g9j0" class="lightbox-image" data-fancybox="gallery"><i class="icon-play"></i></a>
                                </div>
                                <div class="quote">
                                    <h4>The Consultations Portal</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_40"></div>
        <!--===============spacing==============-->
        <!--===============shape==============-->
        <div class="position_absolute curve_shape_bottom_1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.5 27.8" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M283.5,9.7c0,0-7.3,4.3-14,4.6c-6.8,0.3-12.6,0-20.9-1.5c-11.3-2-33.1-10.1-44.7-5.7 s-12.1,4.6-18,7.4c-6.6,3.2-20,9.6-36.6,9.3C131.6,23.5,99.5,7.2,86.3,8c-1.4,0.1-6.6,0.8-10.5,2c-3.8,1.2-9.4,3.8-17,4.7 c-3.2,0.4-8.3,1.1-14.2,0.9c-1.5-0.1-6.3-0.4-12-1.6c-5.7-1.2-11-3.1-15.8-3.7C6.5,9.2,0,10.8,0,10.8V0h283.5V9.7z"></path>
            </svg>
        </div>
        <!--===============shape==============-->
    </section>

    <!-- Our Interventions -->
    <section class="process-section">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="title_all_box style_seven text-center dark_color">
                        <div class="title_sections">
                            <div class="before_title">Improving Business Environment</div>
                            <div class="title" style="font-size:x-large;">Our Interventions</div>
                            <div class="small_text_sub">Doing Business</div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_40"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="choose_box type_two">
                        <div class="icon_box">
                            <div class="icon_image">
                                <img src="{{ asset('assets/images/24-hours-support.png') }}" class="img-fluid svg_image" alt="icon png">
                            </div>
                            <span class="icon_bg_rotate"></span>
                        </div>
                        <div class="content_box">
                            <h2><a href="{{ route('regulations.portal') }}">Regulatory Reforms</a></h2>
                            <p>Targeted Business Environment Reforms</p>
                        </div>
                        <div class="step">
                            <h6 class="step_no">01</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="choose_box type_two">
                        <div class="icon_box">
                            <div class="icon_image">
                                <img src="{{ asset('assets/images/email-marketing.png') }}" class="img-fluid svg_image" alt="icon png">
                            </div>
                            <span class="icon_bg_rotate"></span>
                        </div>
                        <div class="content_box">
                            <h2><a href="{{ route('consultations.current') }}">Public Dialogue</a></h2>
                            <p>Permanent Public-Private Dialogue Mechanism</p>
                        </div>
                        <div class="step">
                            <h6 class="step_no">02</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="choose_box type_two">
                        <div class="icon_box">
                            <div class="icon_image">
                                <a href="{{ route('rolling_review.tracker') }}">
                                    <img src="{{ asset('assets/images/email-marketing.png') }}" class="img-fluid svg_image" alt="icon png">
                                </a>
                            </div>
                            <span class="icon_bg_rotate"></span>
                        </div>
                        <div class="content_box">
                            <h2><a href="{{ route('rolling_review.tracker') }}">M&E Tools</a></h2>
                            <p>Robust Reform Management & Tracking Tools.</p>
                        </div>
                        <div class="step">
                            <h6 class="step_no">03</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4">
                    <div class="choose_box type_two">
                        <div class="icon_box">
                            <div class="icon_image">
                                <img src="{{ asset('assets/images/email-marketing.png') }}" class="img-fluid svg_image" alt="icon png">
                            </div>
                            <span class="icon_bg_rotate"></span>
                        </div>
                        <div class="content_box">
                            <h2><a href="{{ route('rolling_review.overview') }}">Rolling Review</a></h2>
                            <p>Rolling Review of Business Regulations</p>
                        </div>
                        <div class="step">
                            <h6 class="step_no">04</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_40"></div>
        <!--===============spacing==============-->
    </section>

    <!-- B-Ready Themes -->
    <section class="service-section bg_dark_1 position-relative">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="title_all_box style_seven text-center light_color">
                        <div class="title_sections">
                            <div class="before_title">
                                <span class="icon-briefcase icon"></span>
                                Enabling Business Environment
                            </div>
                            <div class="title" style="font-size:x-large;">B-Ready Themes</div>
                            <div class="small_text_sub">Doing Business</div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="service_all_styles carousel owl_new_one">
                        <div class="owl_nav_block owl_dots_none owl_type_one theme_carousel owl-theme owl-carousel"
                            data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'>
                            @foreach($indicators as $wro)
                                <div class="service_box type_two light_color clearfix">
                                    <div class="content_heaing">
                                        <h2 class="entry-title">
                                            <a href="{{ route('bready.topic', $wro->id) }}">{{ $wro->name }}</a>
                                        </h2>
                                        <p>{{ Str::limit(strip_tags($wro->about ?: $wro->description), 180) }}</p>
                                    </div>
                                    <div class="btn_box">
                                        <a href="{{ route('bready.topic', $wro->id) }}" class="read_more type_two">
                                            <span class="icon-arrow-right"></span> Read More
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_50"></div>
        <!--===============spacing==============-->
        <div class="position_absolute curve_shape_bottom_1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.5 27.8" preserveAspectRatio="none">
                <path class="shape_bg_white" d="M283.5,9.7c0,0-7.3,4.3-14,4.6c-6.8,0.3-12.6,0-20.9-1.5c-11.3-2-33.1-10.1-44.7-5.7 s-12.1,4.6-18,7.4c-6.6,3.2-20,9.6-36.6,9.3C131.6,23.5,99.5,7.2,86.3,8c-1.4,0.1-6.6,0.8-10.5,2c-3.8,1.2-9.4,3.8-17,4.7 c-3.2,0.4-8.3,1.1-14.2,0.9c-1.5-0.1-6.3-0.4-12-1.6c-5.7-1.2-11-3.1-15.8-3.7C6.5,9.2,0,10.8,0,10.8V0h283.5V9.7z"></path>
            </svg>
        </div>
    </section>

    <!-- Did You Know? Testimonial Section -->
    @if(isset($didYouKnows) && $didYouKnows->count() > 0)
        <section class="testimonial-section">
            <!--===============spacing==============-->
            <div class="pd_top_30"></div>
            <!--===============spacing==============-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-auto">
                        <div class="title_all_box style_six text-center dark_color">
                            <div class="title_sections">
                                <div class="before_title">
                                    <span class="icon-briefcase icon"></span>
                                    LATEST REFORMS
                                </div>
                                <div class="title" style="font-size:x-large;">Did You Know?</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial_all owl_new_one">
                            <div class="owl-carousel owl_nav_block owl_dots_none owl_type_two theme_carousel owl-theme"
                                data-options='{"loop": true, "margin": 20, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "2" } , "1000":{ "items" : "2" }}}'>
                                @foreach($didYouKnows as $ttr)
                                    <div class="testimonial_box type_two">
                                        <div class="upper_content">
                                            <div class="image_box">
                                                <img src="{{ $ttr->image ? asset('acc/did_you_know/' . $ttr->image) : asset('assets/images/about/about-1.png') }}" class="img-fluid" alt="image">
                                                <span class="icon-quote"></span>
                                            </div>
                                            <div class="description">
                                                <p>{{ Str::limit(strip_tags($ttr->description), 300) }}</p>
                                            </div>
                                        </div><br/>
                                        <div class="lower_content clearfix">
                                            <div class="authour_name">
                                                <h4>{{ $ttr->org?->org_name ?: 'BRR Secretariat' }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_20"></div>
            <!--===============spacing==============-->
        </section>
    @endif

    <!-- Have Your Say Contact Banner -->
    <section class="contact-section bg_op_1 box_shadow_2" style="background: url({{ asset('assets/images/consult-bg.jpg') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12">
                    <div class="image_box mr_top_minus_50">
                        <img src="{{ asset('assets/images/Hiba1.png') }}" class="img-fluid" alt="consult" />
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <!--===============spacing==============-->
                    <div class="pd_top_40"></div>
                    <!--===============spacing==============-->
                    <div class="title_all_box style_six dark_color">
                        <div class="title_sections">
                            <div class="row gutter_25px align-items-center">
                                <div class="col-lg-4 col-md-12">
                                    <img src="{{ asset('assets/images/yoursay.png') }}" class="img-fluid" alt="Have Your Say" />
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <div class="title" style="font-size:x-large;">Have you experienced any public service that requires reform?</div>
                                </div>
                            </div>
                            <p class="mt-2">Are Government rules and regulations hindering progress of your business? Kindly click on the button to submit your concerns.</p>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_0"></div>
                    <!--===============spacing==============-->
                    <div class="divider_2"></div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_35"></div>
                    <!--===============spacing==============-->
                    <div class="row gutter_25px align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="theme_btn_all color_one">
                                <a href="{{ route('your_say') }}" class="theme-btn one">
                                    Share Your Experience
                                </a>
                            </div>
                            <!--===============spacing==============-->
                            <div class="pd_bottom_20"></div>
                            <!--===============spacing==============-->
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="footer_contact_list dark_color type_one">
                                <div class="same_contact phone">
                                    <span class="icon-chat"></span>
                                    <div class="content">
                                        <h6 class="titles">Whatsapp</h6>
                                        <a href="https://wa.me/233277025337" target="_blank">+(233 277) – 025337</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_30"></div>
                    <!--===============spacing==============-->
                </div>
            </div>
        </div>
    </section>

    <!-- Featured News on Reforms -->
    @if(isset($latestNews) && $latestNews->count() > 0)
        <section class="blog-post" id="blog">
            <!--===============spacing==============-->
            <div class="pd_top_40"></div>
            <!--===============spacing==============-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="title_all_box style_seven text-center">
                            <div class="title_sections">
                                <div class="before_title">
                                    <span class="icon-briefcase icon"></span> News & Events
                                </div>
                                <div class="title" style="font-size:x-large;">Featured News on Reforms</div>
                            </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_20"></div>
                        <!--===============spacing==============-->
                    </div>
                </div>
                <main id="main" class="site-main" role="main">
                    <article class="clearfix service type-service status-publish has-post-thumbnail hentry">
                        <div class="row grid_layout">
                            @foreach($latestNews as $rowe)
                                @php
                                    $dt = $rowe->posted_date ? new DateTime($rowe->posted_date) : new DateTime();
                                @endphp
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 grid_box mb-4">
                                    <div class="news_box style_one blog_classic has_images">
                                        <div class="image img_hover-1">
                                            <img width="750" height="420" src="{{ $rowe->newsImage ? asset('acc/event/' . $rowe->newsImage) : asset('assets/images/blog/blog-image-1.jpg') }}" class="wp-post-image" alt="{{ $rowe->newsTitle }}">
                                            <a class="arrow" href="{{ route('publications') }}">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                        <div class="content_box">
                                            <div class="date">
                                                <span class="date_in_number">{{ $dt->format('d') }}</span>
                                                <span class="date_in_month">{{ substr($dt->format('F'), 0, 3) }}</span>
                                            </div>
                                            <div class="categories"> 
                                                <h2 class="title">
                                                    <a href="{{ route('publications') }}" rel="bookmark">{{ $rowe->newsTitle }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </article>
                </main>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_30"></div>
            <!--===============spacing==============-->
        </section>
    @endif
@endsection
