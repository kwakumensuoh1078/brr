<?php 
require_once 'classes/mysql.class.php';
$object = new MySQL();
$security = new MySQL();
$search = new MySQL();
$pageName = "Consultations";
require_once 'session.php';
?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:46 GMT -->
<head>
    <?php require_once 'include/header.php' ?>
</head>

<body class="home theme-creote page-home-default-one">
    <div id="page" class="page_wapper hfeed site">

        <div id="wrapper_full" class="content_all_warpper">
            <!----page-header----->

            <!----preloader----->
<!--  <div class="preloader-wrap">
<div class="preloader" style="background-image:url(assets/images/preloader.gif)">
</div>
<div class="overlay"></div>
</div> -->
<!----preloader end----->
<!----header----->
<div class="header_area" id="header_contents">
    <header class="main-header header header_v14">

        <?php require_once 'include/menu.php' ?>
    </header>
    <!-- end of the loop -->
</div>
<!----header end----->
<!--===============PAGE CONTENT==============-->
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">

    <!--- slider-->
    <section class="slider style_page_fourteen nav_position_one position-relative" style="margin-bottom:-50px">
        <div class="banner_carousel owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
        data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>
        <div class="slide-item-content">
            <div class="slide-item content_center">
                <div class="image-layer"
                style="background-image:url(assets/images/sliders/Law-1.png)">
            </div>
            <div class="medium-container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12  ">
                        <div class="slider_content">

                            <h1 class="animate_up">
                                Do you know
                            </h1>
                            <h6 class="animate_left">
                                you can search for specific provisions of any Business Regulations in Ghana on this Portal?
                            </h6>
                            <form method="get"  action="search_result">
                                <div class="row">

                                    <div class="col-md-8 ">
                                        <div class="form-group" >
                                            <input class="form-control"  name="search" id="search" placeholder="Enter keywords/phrase to search..."    type="text"  required>
                                        </div> 
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" >
                                            <button id="searchsubmit"  style="background: #e84c3c;border-color: #e84c3c;color: white;" type="submit" name="submit" id="searchsubmit"><i class="fa fa-search"></i> Search for Regulation </button>
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
            <?php $object->Query("select * from consultation_details where details_status = 'Approve' ORDER BY id DESC Limit 3"); while(!$object->EndOfSeek()){ $consRow = $object->Row(); ?> 
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <?php $uid = $consRow->posted_by; $security->Query("select * from officer where id = '$uid'  "); $u_row = $security->Row(); $org_id = $u_row->org_id;
                    $security->Query("select * from org where org_id = '$org_id'  "); $o_Row = $security->Row(); if(isset($o_Row->org_logo)){ ?>
<!--<img height="100" width="110" src="../acc/org/<?php echo $o_Row->org_logo; ?>" alt="institution" class="center">
<?php }else{ ?> 
<img height="100" width="110" src="assets/img/logo1.png" alt="institution" class="center">
<?php } ?>-->
<div class="icon_box_new_box type_two ">
    <span class="borders"></span>
<!-- <div class="icon_box">
<img src="assets/images/configuration.png" class="img-fluid svg_image"
alt="icon png">
<span class="icon_bg_rotate"></span>
</div> -->
<div class="content">
    <h2>
        <a href="consultation?cd=<?php echo base64_encode($consRow->id); ?>"><?php echo string_shorten($consRow->topic,50); ?></a>
    </h2>
    <p><?php echo string_shorten($consRow->brief_background,120); ?></p>
    <a href="consultation?cd=<?php echo base64_encode($consRow->id); ?>" class="read_more type_two">
        Read More <span class="icon-arrow-right"></span><br/>
    </a>
    <span style="color: #a61403; font-weight: bold; font-size: 15px;">Sponsor: </span>
    <span  style="font-size: 15px;" align="justify"><?php 
    $id = $consRow->posted_by; $security->Query("select * from officer where id = '$id'  "); $uRow = $security->Row(); $orgid = $uRow->org_id;
    $security->Query("select * from org where org_id = '$orgid'  "); $oRow = $security->Row();
    echo $oRow->org_name;
    ?>
    </span> <?php if($consRow->status == "Closed" ){?> <span style="color: #000000; font-weight: bold; font-size: 14px;">Status: </span> <span style="color: red; font-weight: normal; font-size: 11px;"><?php echo "CLOSED";  ?></span> <?php }else{ ?>
        <!-- duration -->

        <?php $sesia = strtotime(date("Y-m-d")); $end_me = strtotime($consRow->end_date); $end_me_datediff = $end_me - $sesia;?>
        <span style="color: #000000; font-weight: bold; font-size: 15px;">Days Left: </span> 
        <span  style="font-size: 15px;color: green;" align="justify"><?php echo round($end_me_datediff / (60 * 60 * 24)). " Day(s)" ?> </span>
        <!-- link to detailed page -->
    <?php } ?>
</div>
</div>
</div>
<?php } ?>

</div>
    </div>
<!--===============spacing==============-->
<div class="pd_bottom_30"></div>
<!--===============spacing==============-->
</section>
<!---feature end-->
<!--about-->
<section class="about-section bg_light_1 position-relative">
    <!--===============spacing==============-->
    <div class="pd_top_40"></div>
    <!--===============spacing==============-->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <div class="title_all_box style_seven  dark_color">
                    <div class="title_sections">
                        <div class="before_title">
                            <b>  The BRR Programme </b>
                        </div>
                        <div class="small_text_sub">About Us</div>
                        <p class="description_text" align='justify'>
                            The Business Regulatory Reform (BRR) programme is an integral component of Government’s Economic and Industrial Transformation Agenda. 
                            The programme aims at establishing a world-class Regulatory Administration in Ghana by improving the quality, predictability and transparency of regulatory services. 
                            This is expected to create a conducive business environment to attract private capital and stimulate youth entrepreneurship and job creation. 
                          <br/>  The BRR Programme consists of seven pillars intended to systematically transform how Government makes and revises the regulations governing business activities in Ghana.
                            It is designed to put in place efficient and fair government rules that encourage all businesses - small, medium and large - to invest in innovation, 
                            drive economic transformation, create more jobs, and become successful in the domestic, regional or global markets.
                        </p>
                        <a href="about.php" class="read_more type_two">
                            Read More <span class="icon-arrow-right"></span>
                        </a>

                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_20"></div>
                <!--===============spacing==============-->
                <div class="icon_carousel_box_all">
                    <div class="owl_dots_block theme_carousel owl-theme owl-carousel"
                    data-options='{"loop": true, "margin": 20, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "1" }}}'>

                    <div class="icon_caro type_one">
                        <div class="icon">
                            <img src="assets/images/focus.png" class="img-fluid svg_image"
                            alt="icon png" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="#">
                                    Our Vision
                                </a>
                            </h2>
                            <p>
                                The vision is to make Ghana the most business-friendly economy in Africa.
                            </p>

                        </div>
                    </div>
                    <div class="icon_caro type_one">
                        <div class="icon">
                            <img src="assets/images/shooting-target.png" class="img-fluid svg_image"
                            alt="icon png" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="#">
                                    Our Objectives
                                </a>
                            </h2>
                            <p>
                                1. To clean up or simplify existing business regulations that are inefficient or are not business-friendly.

                            </p>

                        </div>
                    </div>
                    <div class="icon_caro type_one">
                        <div class="icon">
                            <img src="assets/images/shooting-target.png" class="img-fluid svg_image"
                            alt="icon png" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="#">
                                    Our Objectives
                                </a>
                            </h2>
                            <p>
                                2. To improve how business regulations are produced by ensuring that new regulations meet agreed minimum criteria, e.g. business-friendliness, anticipated impact (cost-benefit), etc.
                            </p>

                        </div>
                    </div>
                    <div class="icon_caro type_one">
                        <div class="icon">
                            <img src="assets/images/shooting-target.png" class="img-fluid svg_image"
                            alt="icon png" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="#">
                                    Our Objectives
                                </a>
                            </h2>
                            <p>
                                3. To establish acceptable standards of transparency to protect the integrity of regulatory practices.

                            </p>

                        </div>
                    </div>
                    <div class="icon_caro type_one">
                        <div class="icon">
                            <img src="assets/images/shooting-target.png" class="img-fluid svg_image"
                            alt="icon png" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="#">
                                    Our Objectives
                                </a>
                            </h2>
                            <p>
                            4. To build capacity of public institutions (regulators) in specific or targeted areas of regulatory services delivery. </li>

                        </p>

                    </div>
                </div>
                <div class="icon_caro type_one">
                    <div class="icon">
                        <img src="assets/images/shooting-target.png" class="img-fluid svg_image"
                        alt="icon png" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="#">
                                Our Objectives
                            </a>
                        </h2>
                        <p>
                            5. To communicate more inclusively to make the business environment a shared priority. 
                        </p>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-sm-12">
        <div class="image_box_new type_two clearfix pd_left_40 md_pd_left_zero">
            <div class="image_box_inner">
                <div class="image one">
                    <img src="assets/images/about/video1.png" class="img-fluid" alt="img">

                    <div class="video_box video-inner text-center">
                        <a href="https://www.youtube.com/watch?v=khIF-H1g9j0" class="lightbox-image"><i
                            class="icon-play"></i></a>
                        </div>

                        <div class="quote">
                            <h4> The Consultations Portal</h4>
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
        <path class="elementor-shape-fill"
        d="M283.5,9.7c0,0-7.3,4.3-14,4.6c-6.8,0.3-12.6,0-20.9-1.5c-11.3-2-33.1-10.1-44.7-5.7    s-12.1,4.6-18,7.4c-6.6,3.2-20,9.6-36.6,9.3C131.6,23.5,99.5,7.2,86.3,8c-1.4,0.1-6.6,0.8-10.5,2c-3.8,1.2-9.4,3.8-17,4.7   c-3.2,0.4-8.3,1.1-14.2,0.9c-1.5-0.1-6.3-0.4-12-1.6c-5.7-1.2-11-3.1-15.8-3.7C6.5,9.2,0,10.8,0,10.8V0h283.5V9.7z M260.8,11.3  c-0.7-1-2-0.4-4.3-0.4c-2.3,0-6.1-1.2-5.8-1.1c0.3,0.1,3.1,1.5,6,1.9C259.7,12.2,261.4,12.3,260.8,11.3z M242.4,8.6 c0,0-2.4-0.2-5.6-0.9c-3.2-0.8-10.3-2.8-15.1-3.5c-8.2-1.1-15.8,0-15.1,0.1c0.8,0.1,9.6-0.6,17.6,1.1c3.3,0.7,9.3,2.2,12.4,2.7  C239.9,8.7,242.4,8.6,242.4,8.6z M185.2,8.5c1.7-0.7-13.3,4.7-18.5,6.1c-2.1,0.6-6.2,1.6-10,2c-3.9,0.4-8.9,0.4-8.8,0.5 c0,0.2,5.8,0.8,11.2,0c5.4-0.8,5.2-1.1,7.6-1.6C170.5,14.7,183.5,9.2,185.2,8.5z M199.1,6.9c0.2,0-0.8-0.4-4.8,1.1  c-4,1.5-6.7,3.5-6.9,3.7c-0.2,0.1,3.5-1.8,6.6-3C197,7.5,199,6.9,199.1,6.9z M283,6c-0.1,0.1-1.9,1.1-4.8,2.5s-6.9,2.8-6.7,2.7  c0.2,0,3.5-0.6,7.4-2.5C282.8,6.8,283.1,5.9,283,6z M31.3,11.6c0.1-0.2-1.9-0.2-4.5-1.2s-5.4-1.6-7.8-2C15,7.6,7.3,8.5,7.7,8.6  C8,8.7,15.9,8.3,20.2,9.3c2.2,0.5,2.4,0.5,5.7,1.6S31.2,11.9,31.3,11.6z M73,9.2c0.4-0.1,3.5-1.6,8.4-2.6c4.9-1.1,8.9-0.5,8.9-0.8   c0-0.3-1-0.9-6.2-0.3S72.6,9.3,73,9.2z M71.6,6.7C71.8,6.8,75,5.4,77.3,5c2.3-0.3,1.9-0.5,1.9-0.6c0-0.1-1.1-0.2-2.7,0.2    C74.8,5.1,71.4,6.6,71.6,6.7z M93.6,4.4c0.1,0.2,3.5,0.8,5.6,1.8c2.1,1,1.8,0.6,1.9,0.5c0.1-0.1-0.8-0.8-2.4-1.3    C97.1,4.8,93.5,4.2,93.6,4.4z M65.4,11.1c-0.1,0.3,0.3,0.5,1.9-0.2s2.6-1.3,2.2-1.2s-0.9,0.4-2.5,0.8C65.3,10.9,65.5,10.8,65.4,11.1 z M34.5,12.4c-0.2,0,2.1,0.8,3.3,0.9c1.2,0.1,2,0.1,2-0.2c0-0.3-0.1-0.5-1.6-0.4C36.6,12.8,34.7,12.4,34.5,12.4z M152.2,21.1    c-0.1,0.1-2.4-0.3-7.5-0.3c-5,0-13.6-2.4-17.2-3.5c-3.6-1.1,10,3.9,16.5,4.1C150.5,21.6,152.3,21,152.2,21.1z">
    </path>
    <path class="elementor-shape-fill"
    d="M269.6,18c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3    C267.7,18.8,269.7,18,269.6,18z">
</path>
<path class="elementor-shape-fill"
d="M227.4,9.8c-0.2-0.1-4.5-1-9.5-1.2c-5-0.2-12.7,0.6-12.3,0.5c0.3-0.1,5.9-1.8,13.3-1.2  S227.6,9.9,227.4,9.8z">
</path>
<path class="elementor-shape-fill"
d="M204.5,13.4c-0.1-0.1,2-1,3.2-1.1c1.2-0.1,2,0,2,0.3c0,0.3-0.1,0.5-1.6,0.4 C206.4,12.9,204.6,13.5,204.5,13.4z">
</path>
<path class="elementor-shape-fill"
d="M201,10.6c0-0.1-4.4,1.2-6.3,2.2c-1.9,0.9-6.2,3.1-6.1,3.1c0.1,0.1,4.2-1.6,6.3-2.6 S201,10.7,201,10.6z">
</path>
<path class="elementor-shape-fill"
d="M154.5,26.7c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3  C152.6,27.5,154.6,26.8,154.5,26.7z">
</path>
<path class="elementor-shape-fill"
d="M41.9,19.3c0,0,1.2-0.3,2.9-0.1c1.7,0.2,5.8,0.9,8.2,0.7c4.2-0.4,7.4-2.7,7-2.6 c-0.4,0-4.3,2.2-8.6,1.9c-1.8-0.1-5.1-0.5-6.7-0.4S41.9,19.3,41.9,19.3z">
</path>
<path class="elementor-shape-fill"
d="M75.5,12.6c0.2,0.1,2-0.8,4.3-1.1c2.3-0.2,2.1-0.3,2.1-0.5c0-0.1-1.8-0.4-3.4,0 C76.9,11.5,75.3,12.5,75.5,12.6z">
</path>
<path class="elementor-shape-fill"
d="M15.6,13.2c0-0.1,4.3,0,6.7,0.5c2.4,0.5,5,1.9,5,2c0,0.1-2.7-0.8-5.1-1.4   C19.9,13.7,15.7,13.3,15.6,13.2z">
</path>
</svg>
</div>
<!--===============shape==============-->
</section>
<!---about end-->
<!--components-->
<section class="process-section">
    <!--===============spacing==============-->
    <div class="pd_top_40"></div>
    <!--===============spacing==============-->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="title_all_box style_seven text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">
                            Improving Business Environment
                        </div>
                        <div class="title" style="font-size:x-large;"> Our Interventions</div>
                        <div class="small_text_sub"> Doing Business</div>
                    </div>
                    <!--===============spacing==============-->
                    <div class="pd_bottom_40"></div>
                    <!--===============spacing==============-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="choose_box type_two">
                    <div class="icon_box">
                        <div class="icon_image">
                            <img src="assets/images/24-hours-support.png" class="img-fluid svg_image"
                            alt="icon png">
                        </div>
                        <span class="icon_bg_rotate"></span>
                    </div>
                    <div class="content_box">
                        <h2>
                            <a href="#">
                                Regulatory Reforms
                            </a>
                        </h2>
                        <p>Targeted Business Environment Reforms</p>
                    </div>
                    <div class="step">
                        <h6 class="step_no">01</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="choose_box type_two">
                    <div class="icon_box">
                        <div class="icon_image">
                            <img src="assets/images/email-marketing.png" class="img-fluid svg_image"
                            alt="icon png">
                        </div>
                        <span class="icon_bg_rotate"></span>
                    </div>
                    <div class="content_box">
                        <h2>
                            <a href="#" target="&quot;_blank&quot;">
                            Public Dialogue</a>
                        </h2>
                        <p>Permanent Public-Private Dialogue Mechanism</p>
                    </div>
                    <div class="step">
                        <h6 class="step_no">02</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="choose_box type_two">
                    <div class="icon_box">
                        <div class="icon_image">
                           <a href="https://brr.gov.gh/reforms/index.php"> <img src="assets/images/email-marketing.png" class="img-fluid svg_image"
                            alt="icon png"> </a>
                        </div>
                        <span class="icon_bg_rotate"></span>
                    </div>
                    <div class="content_box">
                        <h2>
                            <a href="https://brr.gov.gh/reforms/index.php">
                                M&E Tools
                            </a>
                        </h2>
                        <p>Robust Reform Management & Tracking Tools.</p>
                    </div>
                    <div class="step">
                        <h6 class="step_no">03</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="choose_box type_two">
                    <div class="icon_box">
                        <div class="icon_image">
                            <img src="assets/images/email-marketing.png" class="img-fluid svg_image"
                            alt="icon png">
                        </div>
                        <span class="icon_bg_rotate"></span>
                    </div>
                    <div class="content_box">
                        <h2>
                            <a href="roll-review.php">
                                Rolling Review
                            </a>
                        </h2>
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

<!--B-Ready-->
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
                        <div class="title" style="font-size:x-large;"> B-Ready Themes</div>
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
                    data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "3" }}}'>
                    <?php $object->Query("SELECT * FROM indicator WHERE comp_id=1 ORDER BY id ASC");while(!$object->EndOfSeek()){ $wro = $object->Row() ?>
                        <div class="service_box type_two light_color clearfix">
                            <div class="content_heaing">
                                
                                <h2 class="entry-title">

                                    <a href="b-readytopic?xxE=<?php echo base64_encode($wro->id);?>"><?php echo $wro->name; ?></a>
                                </h2>
                                <p>
                                    <?php echo string_shorten($wro->about,180) ?>
                                </p>

                            </div>

<!--===============Image==============
<div class="image_box">
<img src="assets/images/service/service-image-4.jpg" class="img-fluid"
alt="img" />
</div>
-->
<div class="btn_box">
    <a href="b-readytopic?xxE=<?php echo base64_encode($wro->id);?>" class="read_more type_two">
        <span class="icon-arrow-right"></span>
        Read More
    </a>
</div>
</div>
<?php } ?>



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
        <path class="shape_bg_white"
        d="M283.5,9.7c0,0-7.3,4.3-14,4.6c-6.8,0.3-12.6,0-20.9-1.5c-11.3-2-33.1-10.1-44.7-5.7    s-12.1,4.6-18,7.4c-6.6,3.2-20,9.6-36.6,9.3C131.6,23.5,99.5,7.2,86.3,8c-1.4,0.1-6.6,0.8-10.5,2c-3.8,1.2-9.4,3.8-17,4.7   c-3.2,0.4-8.3,1.1-14.2,0.9c-1.5-0.1-6.3-0.4-12-1.6c-5.7-1.2-11-3.1-15.8-3.7C6.5,9.2,0,10.8,0,10.8V0h283.5V9.7z M260.8,11.3  c-0.7-1-2-0.4-4.3-0.4c-2.3,0-6.1-1.2-5.8-1.1c0.3,0.1,3.1,1.5,6,1.9C259.7,12.2,261.4,12.3,260.8,11.3z M242.4,8.6 c0,0-2.4-0.2-5.6-0.9c-3.2-0.8-10.3-2.8-15.1-3.5c-8.2-1.1-15.8,0-15.1,0.1c0.8,0.1,9.6-0.6,17.6,1.1c3.3,0.7,9.3,2.2,12.4,2.7  C239.9,8.7,242.4,8.6,242.4,8.6z M185.2,8.5c1.7-0.7-13.3,4.7-18.5,6.1c-2.1,0.6-6.2,1.6-10,2c-3.9,0.4-8.9,0.4-8.8,0.5 c0,0.2,5.8,0.8,11.2,0c5.4-0.8,5.2-1.1,7.6-1.6C170.5,14.7,183.5,9.2,185.2,8.5z M199.1,6.9c0.2,0-0.8-0.4-4.8,1.1  c-4,1.5-6.7,3.5-6.9,3.7c-0.2,0.1,3.5-1.8,6.6-3C197,7.5,199,6.9,199.1,6.9z M283,6c-0.1,0.1-1.9,1.1-4.8,2.5s-6.9,2.8-6.7,2.7  c0.2,0,3.5-0.6,7.4-2.5C282.8,6.8,283.1,5.9,283,6z M31.3,11.6c0.1-0.2-1.9-0.2-4.5-1.2s-5.4-1.6-7.8-2C15,7.6,7.3,8.5,7.7,8.6  C8,8.7,15.9,8.3,20.2,9.3c2.2,0.5,2.4,0.5,5.7,1.6S31.2,11.9,31.3,11.6z M73,9.2c0.4-0.1,3.5-1.6,8.4-2.6c4.9-1.1,8.9-0.5,8.9-0.8   c0-0.3-1-0.9-6.2-0.3S72.6,9.3,73,9.2z M71.6,6.7C71.8,6.8,75,5.4,77.3,5c2.3-0.3,1.9-0.5,1.9-0.6c0-0.1-1.1-0.2-2.7,0.2    C74.8,5.1,71.4,6.6,71.6,6.7z M93.6,4.4c0.1,0.2,3.5,0.8,5.6,1.8c2.1,1,1.8,0.6,1.9,0.5c0.1-0.1-0.8-0.8-2.4-1.3    C97.1,4.8,93.5,4.2,93.6,4.4z M65.4,11.1c-0.1,0.3,0.3,0.5,1.9-0.2s2.6-1.3,2.2-1.2s-0.9,0.4-2.5,0.8C65.3,10.9,65.5,10.8,65.4,11.1 z M34.5,12.4c-0.2,0,2.1,0.8,3.3,0.9c1.2,0.1,2,0.1,2-0.2c0-0.3-0.1-0.5-1.6-0.4C36.6,12.8,34.7,12.4,34.5,12.4z M152.2,21.1    c-0.1,0.1-2.4-0.3-7.5-0.3c-5,0-13.6-2.4-17.2-3.5c-3.6-1.1,10,3.9,16.5,4.1C150.5,21.6,152.3,21,152.2,21.1z">
    </path>
    <path class="shape_bg_white"
    d="M269.6,18c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3    C267.7,18.8,269.7,18,269.6,18z">
</path>
<path class="shape_bg_white"
d="M227.4,9.8c-0.2-0.1-4.5-1-9.5-1.2c-5-0.2-12.7,0.6-12.3,0.5c0.3-0.1,5.9-1.8,13.3-1.2  S227.6,9.9,227.4,9.8z">
</path>
<path class="shape_bg_white"
d="M204.5,13.4c-0.1-0.1,2-1,3.2-1.1c1.2-0.1,2,0,2,0.3c0,0.3-0.1,0.5-1.6,0.4 C206.4,12.9,204.6,13.5,204.5,13.4z">
</path>
<path class="shape_bg_white"
d="M201,10.6c0-0.1-4.4,1.2-6.3,2.2c-1.9,0.9-6.2,3.1-6.1,3.1c0.1,0.1,4.2-1.6,6.3-2.6 S201,10.7,201,10.6z">
</path>
<path class="shape_bg_white"
d="M154.5,26.7c-0.1-0.1-4.6,0.3-7.2,0c-7.3-0.7-17-3.2-16.6-2.9c0.4,0.3,13.7,3.1,17,3.3  C152.6,27.5,154.6,26.8,154.5,26.7z">
</path>
<path class="shape_bg_white"
d="M41.9,19.3c0,0,1.2-0.3,2.9-0.1c1.7,0.2,5.8,0.9,8.2,0.7c4.2-0.4,7.4-2.7,7-2.6 c-0.4,0-4.3,2.2-8.6,1.9c-1.8-0.1-5.1-0.5-6.7-0.4S41.9,19.3,41.9,19.3z">
</path>
<path class="shape_bg_white"
d="M75.5,12.6c0.2,0.1,2-0.8,4.3-1.1c2.3-0.2,2.1-0.3,2.1-0.5c0-0.1-1.8-0.4-3.4,0 C76.9,11.5,75.3,12.5,75.5,12.6z">
</path>
<path class="shape_bg_white"
d="M15.6,13.2c0-0.1,4.3,0,6.7,0.5c2.4,0.5,5,1.9,5,2c0,0.1-2.7-0.8-5.1-1.4   C19.9,13.7,15.7,13.3,15.6,13.2z">
</path>
</svg>
</div>
</section>

<!---testimonial-->
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
                <div class="testimonial_all owl_new_one ">
                    <div class="owl-carousel owl_nav_block owl_dots_none owl_type_two theme_carousel owl-theme"
                    data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "3" } , "1000":{ "items" : "2" }}}'>
                    <?php $search->Query("SELECT * FROM did_u_knows ORDER BY id DESC");while(!$search->EndOfSeek()){ $ttr = $search->Row(); ?>

                        <div class="testimonial_box type_two">
                            <div class="upper_content">
                                <div class="image_box">
                                    <img src="acc/did_you_know/<?php echo $ttr->image;?>" class="img-fluid" alt="image">
                                    <span class="icon-quote"></span>
                                </div>
                                <div class="description">
                                    <p>
                                        <?php echo string_shorten($ttr->description,300); ?>
                                    </p>
                                </div>
                            </div><br/>
                            <div class="lower_content clearfix">
                                <div class="authour_name">
                                    <h4><?php $object->Query("SELECT * FROM org WHERE org_id = '".$ttr->org_id."'"); $tto = $object->Row(); echo $tto->org_name ?> </h4>

                                </div>
                                
                            </div>

                        </div>
                    <?php } ?>




                </div>

            </div>
        </div>
    </div>
</div>
<!--===============spacing==============-->
<div class="pd_bottom_20"></div>
<!--===============spacing==============-->
</section>
<!--testimonial end-->
<!---contact-->
<section class="contact-section bg_op_1 box_shadow_2"
style="background: url(assets/images/consult-bg.jpg);">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-5 col-md-12">
            <div class="image_box mr_top_minus_50">
                <img src="assets/images/Hiba1.png" class="img-fluid" alt="consult" />
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
            <!--===============spacing==============-->
            <div class="pd_top_40"></div>
            <!--===============spacing==============-->
            <div class="title_all_box style_six  dark_color">
                <div class="title_sections">
                    <div class="row gutter_25px">
                        <div class="col-lg-4 col-md-12">
                            <img src="assets/images/yoursay.png" class="img-fluid" />
                            </div>
                        <div class="col-lg-8 col-md-12">
                        <div class="title" style="font-size:x-large;">Have you experienced any public service that requires reform?</div>
                        
                        </div>
                    </div>
                    <p>Are Government rules and regulations hindering progress of your business? Kindly click on the button to submit your concerns.</p>
                    
                </div>
            </div>
            <!--===============spacing==============-->
            <div class="pd_bottom_0"></div>
            <!--===============spacing==============-->
            <div class="divider_2"></div>
            <!--===============spacing==============-->
            <div class="pd_bottom_35"></div>
            <!--===============spacing==============-->
            <div class="row gutter_25px">
                <div class="col-lg-6 col-md-12">
                    <div class="theme_btn_all color_one">
                        <a href="your_say" class="theme-btn one">
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
                                <h6 class="titles"> Whatsapp</h6>
                                <a href="tel:+(1 800) – 5554400">+(233 277) – 025337</a>
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
<!--contact end-->
<!---blog--->
<section class="blog-post" id="blog">
    <!--===============spacing==============-->
    <div class="pd_top_40"></div>
    <!--===============spacing==============-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="title_all_box style_seven text-center">
                    <div class="title_sections">
                        <div class="before_title"> <span class="icon-briefcase icon"></span> News &
                        Events</div>
                        <div class="title" style="font-size:x-large;">Featured News on Reforms</div>

                    </div>
                </div>
                <!--===============spacing==============-->
                <div class="pd_bottom_20"></div>
                <!--===============spacing==============-->
            </div>
        </div>
        <main id="main" class="site-main" role="main">
            <article id="" class="clearfix service type-service status-publish has-post-thumbnail hentry">
                <div class="row grid_layout">
                    <?php $search->Query("SELECT * FROM news ORDER BY id DESC Limit 3");while(!$search->EndOfSeek()){ $rowe = $search->Row(); $dt = new DateTime($rowe->posted_date)?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 grid_box">
                            <div class="news_box style_one blog_classic has_images">
                                <div class="image img_hover-1">
                                    <img width="750" height="420" src="acc/event/<?php echo $rowe->newsImage ?>"
                                    class="wp-post-image" alt="img">
                                    <a class="arrow" href="b-Reforms?xxE=<?php echo base64_encode($rowe->id) ?>">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                <div class="content_box">
                                    <div class="date">
                                        <span class="date_in_number"> <?php echo $dt->format('d') ?></span>
                                        <span class="date_in_month"> <?php echo substr(($dt->format('F')),0,3) ?></span>
                                    </div>
                                    <a href="b-Reforms?xxE=<?php echo base64_encode($rowe->id) ?>" class="categories"> 
                                        <h2 class="title"><a href="b-Reforms?xxE=<?php echo base64_encode($rowe->id) ?>" rel="bookmark"><?php echo $rowe->newsTitle ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </article>
            </main>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_30"></div>
        <!--===============spacing==============-->
    </section>

</div>
<!--===============PAGE CONTENT==============-->
<!--===============PAGE CONTENT==============-->
</div>
<!---==============footer start =================-->
<?php require_once 'include/footer.php' ?>
<!---==============modal popup end=================-->
<!---==============cart=================-->
<?php require_once 'include/script.php' ?>
<!---========================== javascript ==========================-->

<?php 

function string_shorten($text, $char) {
$text = substr($text, 0, $char); //First chop the string to the given character length
if(substr($text, 0, strrpos($text, ' '))!='') $text = substr($text, 0, strrpos($text, ' ')); //If there exists any space just before the end of the chopped string take upto that portion only.
//In this way we remove any incomplete word from the paragraph
$text = $text.'...'; //Add continuation ... sign
return $text; //Return the value
}

?>
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>