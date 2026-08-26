@extends('layouts.app')

@section('title', 'B-Ready Overview - Business Regulatory Reforms Portal Ghana')

@section('content')
<div class="page_header_default style_one blog_single_pageheader">
    <div class="parallax_cover">
        <div class="simpleParallax"><img src="{{ asset('assets/images/b-ready-banner.jpg') }}" alt="bg_image" class="img-fluid"></div>
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            B-Ready Overview
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
                                <div class="title">The B-Ready Programme</div>
                                <p align="justify">Business Ready (B-READY) is an international benchmarking project developed by the World Bank Group. B-READY provides a 
                                quantitative assessment of the business environment for private sector development, published annually and covering most 
                                economies worldwide. B-READY data and summary report aim to advocate for policy reform, inform specific policy advice, and 
                                provide data for development policy research. Through its focus on private sector development, B-READY contributes to meeting 
                                the World Bank Group’s twin goals of eliminating poverty and boosting shared prosperity.</p>
                                <p align="justify">B-READY assesses an economy’s business environment by focusing on the regulatory framework and the provision of related public 
                                services directed at firms and markets, as well as the efficiency with which regulatory framework and public services are combined 
                                in practice. B-READY seeks a balanced approach when assessing the business environment: between ease of conducting a business and 
                                broader private sector benefits, between regulatory framework and public services, between de jure laws and regulations and de facto 
                                practical implementation, and between data representativeness and data comparability. B-READY covers the areas where it can provide 
                                the most value added in the context of existing indicators: namely, the regulatory framework and related public services at the 
                                microeconomic level.</p>
                                <p align="justify">B-READY focuses on ten topics that are organized following the life cycle of the firm and its participation in the market while 
                                opening, operating (or expanding), and closing (or reorganizing) a business. The main topics include Business Entry, 
                                Business Location, Utility Services, Labor, Financial Services, International Trade, Taxation, Dispute Resolution, 
                                Market Competition, and Business Insolvency. Within each topic, considerations relevant to the business environment regarding 
                                aspects of the adoption of digital technology, environmental sustainability, and gender are captured. Based on the data collected, 
                                B-READY generates scores for each topic area and potentially a set of aggregate scores. B-READY collects both de jure information 
                                and de facto measures. While de jure data are collected from expert consultations, de facto data are collected from both expert 
                                consultations and firm surveys. The latter is a major innovation and represents a significant increase in the data available to 
                                WBG teams, development practitioners, and researchers around the world.</p>
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
                                                <a href="#" target="_blank" rel="nofollow">Output</a>
                                            </h3>
                                            <p>The Business Ready benchmarking exercise provides a quantitative assessment of the business environment for private sector development.</p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->
                                <div class="simple_image_boxes">
                                    <img src="{{ asset('assets/images/Milestones.png') }}" class="object-fit-cover-center height_570px" alt="Milestones">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 ps-0 ps-lg-0 pe-0 pe-lg-0 ps-xl-3">
                                <div class="icon_box_all style_one">
                                    <div class="icon_content">
                                        <div class="icon">
                                            <img src="{{ asset('assets/images/icon-image-nike.png') }}" class="img-fluid svg_image" alt="icon png">
                                        </div>
                                        <div class="txt_content">
                                            <h3>
                                                <a href="#" target="_blank" rel="nofollow">Development Purpose</a>
                                            </h3>
                                            <p>a) to advocate for policy reform; <br> b) to inform specific policy advice; and <br> c) to provide data for development policy research</p>
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
                                                <a href="#" target="_blank" rel="nofollow">Approach</a>
                                            </h3>
                                            <p>B-READY's approach aims to strike a good balance on the most salient dimensions of a business environment assessment</p>
                                        </div>
                                    </div>
                                </div>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->
                                <h3>B-READY’s Pillars</h3>
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
                                            <a href="#" target="_blank" rel="nofollow">Efficiency</a>
                                        </h3>
                                        <p>pertains to the efficacy with which the regulatory framework and related public services are combined in practice to obtain the objectives that allow firms to function.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_25"></div>
                        <!--===============spacing==============-->
                        <h3>B-Ready Topics</h3>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_25"></div>
                        <!--===============spacing==============-->
                        <div class="faq_section type_two">
                            <div class="block_faq">
                                <div class="accordion">
                                    <dl>
                                        <dt class="faq_header active">
                                            Business Entry<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide" style="display:block;">
                                            <p>The Business Entry topic measures the process of registration and start of operations of new limited liability companies (LLCs) across three different dimensions, here referred to as pillars. The first pillar assesses the quality of regulations for business entry, covering de jure features of a regulatory framework that are necessary for the adoption of good practices for business start—ups. The second pillar measures the availability of digital public services and transparency of information for business entry. The third pillar measures the time and cost required to register new domestic and foreign firms. Each pillar is divided into categories—defined by common features that inform the grouping into a particular category—and each category is further divided into subcategories.</p>
                                            <p>Each subcategory has several indicators, each of which may, in turn, have several components. Relevant points are assigned to each indicator and subsequently aggregated to obtain the number of points for each subcategory, category, and pillar.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            Business Location<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The Business Location topic measures three different options purchasing, leasing, and building that are available to entrepreneurs to choose the adequate location to set up their company, across three different dimensions, here referred to as pillars. The first pillar assesses the quality of regulations pertaining to property transfer, building, and environmental permitting, covering de jure features of a regulatory framework that are necessary for immovable property lease, property ownership, urban planning, and environmental licenses. The second pillar assesses the quality of public services and transparency of information in the provision of property transfer, building, and environmental permitting. The third pillar measures the operational efficiency of establishing a business location in practice.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            Utility Services<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The Utility Services topic measures the effectiveness of regulatory frameworks, and the quality of governance and transparency of service delivery mechanisms, as well as the operational efficiency of providing electricity, water, and internet services. Under the first pillar the Utility Services topic assesses the effectiveness of regulation pertaining to electricity, water, and internet services, covering de jure features of a regulatory framework that are necessary for the efficient deployment of connections, reliable service, safety, and environmental sustainability of provision and use of utility services.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            Labor<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The Labor topic measures good practices in employment regulations and public services from the perspective of both enterprises and employees across three different dimensions, here referred to as pillars. The first pillar assesses the quality of labor regulations pertaining to workers' conditions and employment restrictions and costs, covering de jure features of the regulatory framework that are necessary for the functioning of the labor market and to provide employers and employees with their obligations and relevant safeguards.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            Financial Services<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The Financial Services topic measures four areas— Commercial Lending; Secured Transactions; e—Payments; and Credit Information—across three different dimensions, here referred to as pillars. The first pillar assesses the effectiveness of regulation pertaining to commercial lending, secured transactions, and e—payments, covering the de jure features of regulatory frameworks. The second pillar measures the accessibility of information in credit infrastructure by evaluating the operation of credit bureaus and registries.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            International Trade<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The International Trade topic measures different aspects of international trade—trade in goods, trade in services, and digital trade—across three different dimensions, here referred to as pillars. The first pillar assesses the quality of regulations pertaining to international trade, covering de jure features of a regulatory framework that are necessary to establish a nondiscriminatory, transparent, predictable, and safe environment to harness the potential of international trade.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            Taxation<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The Taxation topic measures the quality of regulation, administration, and practical implementation of tax systems across the three different dimensions, referred to as pillars. The first pillar assesses the quality of regulation related to taxation, encompassing both the legal framework (de jure) and the implementation (de facto) of the legal requirements.</p>
                                        </dd>
                                        <dt class="faq_header">
                                            Dispute Resolution<span class="icon-play"></span>
                                        </dt>
                                        <dd class="accordion-content hide">
                                            <p>The Dispute Resolution topic measures efficiency and quality of the resolution of commercial disputes—those arising in the business context between firms—across three different dimensions, referred to as pillars. The first pillar assesses the adequacy of legislation pertaining to both court processes and alternative dispute resolution (ADR), covering de jure features that are necessary for the efficient processing of cases.</p>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_65"></div>
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
                                <h3>Ghana's B-Ready performance on all indicators and years</h3>
                                <div class="color_white_1 clearfix">
                                    <a href="{{ route('bready.ghana') }}" class="theme-btn color_white_1 one">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widgets_grid_box">
                        <div id="creote-contactus-3" class="widget widget_contactus">
                            <div class="contact_box_widget widget_box">
                                <div class="widget_content">
                                    <a href="{{ asset('reports/B-READY_GHANA-2024.pdf') }}" target="_blank">
                                        <img src="{{ asset('assets/images/2024report.png') }}" alt="backgroundimage">
                                        <div class="top_section">
                                            <h3>Ghana's Outlook</h3>
                                            <p>Detailed report on Ghana's performance</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_65"></div>
                    <!--===============spacing==============-->
                </div>
            </aside>
        </div>
    </div>

    <!-- Have Your Say Section matching legacy -->
    <section class="newsteller style_one bg_dark_1">
        <!--===============spacing==============-->
        <div class="pd_top_40"></div>
        <!--===============spacing==============-->
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-12">
                    <div class="content">
                        <h2>Have Your Say</h2>
                        <p>Have you experienced any public service that requires reform? Are Government rules and regulations hindering progress of your business? Kindly click on the button to submit your concerns.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="color_white_1 clearfix">
                        <a href="{{ route('your_say') }}" class="theme-btn color_white_1 one">Share With Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_40"></div>
        <!--===============spacing==============-->
    </section>
</div>
@endsection
