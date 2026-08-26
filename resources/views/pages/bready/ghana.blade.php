@extends('layouts.app')

@section('title', "Ghana's Business Readiness - B-Ready Outlook")

@section('content')
<div class="page_header_default style_one blog_single_pageheader">
    <div class="parallax_cover">
        <div class="simpleParallax"><img src="{{ asset('assets/images/gh-banner.png') }}" alt="bg_image" class="img-fluid"></div>
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            Ghana's Business Readiness
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">B-Ready</li>
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
                    <div class="pd_top_35"></div>
                    <!--===============spacing==============-->
                    <article class="clearfix service type-service status-publish has-post-thumbnail hentry">
                        <div class="title_all_box style_one dark_color">
                            <div class="title_sections left">
                                <div class="title">Ghana's B-Ready Outlook - 2024</div>
                            </div>
                        </div>
                        <div class="row no-space">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-5 mb-xl-0 ps-0 ps-lg-0 pe-0 pe-lg-0 pe-xl-3">
                                <div class="description_box">
                                    <p>B-READY assesses the economy’s business environment by focusing on the regulatory framework and the provision of related public services for firms and markets, as well as the efficiency with which they are combined in practice</p>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->
                                <div class="icon_box_all style_one">
                                    <div class="icon_content">
                                        <div class="icon">
                                            <img src="{{ asset('assets/images/icon-image-nike.png') }}" class="img-fluid svg_image" alt="icon png">
                                        </div>
                                        <div class="txt_content">
                                            <h3>
                                                <a href="#" target="_blank" rel="nofollow">Highest Performance</a>
                                            </h3>
                                            <p>Ghana scores highest in Labor, Utility Services, and Business Insolvency.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->
                                <div class="icon_box_all style_one">
                                    <div class="icon_content">
                                        <div class="icon">
                                            <img src="{{ asset('assets/images/icon-image-nike.png') }}" class="img-fluid svg_image" alt="icon png">
                                        </div>
                                        <div class="txt_content">
                                            <h3>
                                                <a href="#" target="_blank" rel="nofollow">Lowest Performance</a>
                                            </h3>
                                            <p>Ghana scores lowest in Market Competition, Business Entry, and Dispute Resolution.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 ps-0 ps-lg-0 pe-0 pe-lg-0 ps-xl-3">
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="content_box">
                                            <h6>2024 Over-all Score</h6>
                                            <p>Ghana's B-Ready Score</p>
                                        </div>
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="icon-calendar1"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="56.3">56.3</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_15"></div>
                                <!--===============spacing==============-->
                                <div class="simple_image_boxes">
                                    <img src="{{ asset('assets/images/2024_score.png') }}" class="object-fit-cover-center height_455px" alt="2024 score">
                                </div>
                            </div>
                        </div>

                        <!--===============spacing==============-->
                        <div class="pd_bottom_25"></div>
                        <!--===============spacing==============-->
                        <h3>2024 Score for each Pillar</h3>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_25"></div>
                        <!--===============spacing==============-->
                        <section class="section__counter three_column">
                            <div class="grid_show_case grid_layout clearfix">
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="fa fa-eye-slash"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="66.9">66.9</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                        <div class="content_box">
                                            <h6>Regulatory Framework</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="fa fa-empire"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="47.7">47.7</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                        <div class="content_box">
                                            <h6>Public Service</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid_box _card">
                                    <div class="counter-block style_one count-box">
                                        <div class="icon_box icon_yes">
                                            <div class="icon">
                                                <span class="icon-wallet"></span>
                                            </div>
                                            <div class="coun_ter">
                                                <span class="count-text" data-speed="1500" data-stop="54.4">54.4</span>
                                                <small>%</small>
                                            </div>
                                        </div>
                                        <div class="content_box">
                                            <h6>Operational Efficiency</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        <div class="content_box_cn style_one">
                            <div class="txt_content">
                                <h3>
                                    <a href="#" target="_blank" rel="nofollow">Regulatory Framework</a>
                                </h3>
                                <p>rules and regulations that firms must follow as they open, operate, and close a business.</p>
                            </div>
                        </div>
                        <div class="content_box_cn style_one">
                            <div class="txt_content">
                                <h3>
                                    <a href="#" target="_blank" rel="nofollow">Public Services</a>
                                </h3>
                                <p>the facilities that governments provide directly or through private firms to support compliance with regulations and the critical institutions and infrastructure that enable business activities.</p>
                            </div>
                        </div>
                        <div class="content_box_cn style_one">
                            <div class="txt_content">
                                <h3>
                                    <a href="#" target="_blank" rel="nofollow">Operational Efficiency</a>
                                </h3>
                                <p>pertains to the efficacy with which the regulatory framework and related public services are combined in practice to obtain the objectives that allow firms to function.</p>
                            </div>
                        </div>
                    </article>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_35"></div>
                    <!--===============spacing==============-->
                </main>
            </div>

            <!-- Sidebar matching legacy -->
            <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                <div class="service_siderbar side_bar">
                    <!--===============spacing==============-->
                    <div class="pd_top_85"></div>
                    <!--===============spacing==============-->
                    <div class="widgets_grid_box">
                        <div class="widget creote_widget_service_list">
                            <h4 class="widget-title">Ghana's Outlook</h4>
                            <ul class="service_list_box">
                                @foreach($indicators as $ind)
                                    <li><a href="{{ route('bready.topic', $ind->id) }}">{{ $ind->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widgets_grid_box">
                        <div class="brouchure_box_widget">
                            <div class="widget_content">
                                <h3>Latest B-Ready Report on Ghana</h3>
                                <div class="color_white_1 clearfix">
                                    <a href="{{ asset('reports/B-READY_GHANA-2024.pdf') }}" class="theme-btn color_white_1 one" target="_blank">Download Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
