<section class="header_top">
    <div class="medium-container">
        <div class="row align-items-center">
            <!--Top Left-->
            <div class="col-lg-9 col-md-12">
                <div class="top_left">
                    <ul class="contact_info_two">
                        <li> <span class="icon-checked"></span>
                        Welcome to Business Regulatory Reforms Potal! </li>
                        <li></li>
                        <li class="single">
                            <span class="icon-placeholder"></span>
                        GPS Address: GA-144-0150 </li>

                    </ul>
                </div>
            </div>


            <!--Top Right-->
             <div class="col-lg-3 col-md-12">
                <div class="top_right text-right">
                    <ul class="contact_info_two">
                        <li> 
                        <a href="login"> Login </a>
                        </li>
                        <li class="single">
                        <a href="register"> Sign Up </a>
                        </li>
                        
                         <li>
                            <a href="#" class="has-tooltip">
                                <span class="fa fa-facebook"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="has-tooltip">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>

                    </ul>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<section class="header_mid">
    <div class="medium-container">
        <div class="row align-items-center">
            <!--Top Left-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                <div class="logo midbar_left">
                    <a href="index" class="logo navbar-brand">
                        <img src="assets/images/bcp_logo.png" alt="BRR"
                        class="logo_default" style="width: 250px;">
                    </a>
                </div>
            </div>
            <!--Top Right-->
            <div class="col-lg-6 d_md_none">
                <div class="midbar_mid">
                    <div class="contact_widget">
                        <ul class="contact_info">
                            <li class="single">
                                <span class="icon-telephone"></span>
                                <small> Call Us: </small>
                                <p><a href="tel:+98 060 712 34 ">(+233) 302 962 909</a></p>
                            </li>
                            <li class="single">
                                <span class="icon-mail"></span>
                                <small> Send Us E-Mail: </small>

                                <p><a href="mailto: info@brr.gov.gh "> info@brr.gov.gh | brr@moti.gov.gh </a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 d_md_block text-end ">
                <div class="navbar_togglers hamburger_menu">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
            <div class="col-lg-3 dnone">
                <div class="text-end midbar_right">
                    <div class="theme-btn_all">
                        <a class="theme-btn one" href="contact">
                            Contact Us
                            <span class="flaticon-arrow"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="navbar_outer get_sticky_header">
    <div class="medium-container">
        <div class="navbar_inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header_content header_content_collapse">
                        <div class="header_menu_box">
                            <div class="navigation_menu">
                                <ul id="myNavbar" class="navbar_nav">
                                    <li class="menu-item  menu-item-has-children dropdown active dropdown_full position-static mega_menu nav-item">
                                                            <a href="index">
                                                                <span>Home</span>
                                                            </a>
                                                        </li>
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                                            <a href="#" class="dropdown-toggle nav-link">
                                                                <span>Consultation</span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li class="menu-item  nav-item">
                                                                    <a href="cur_consult"
                                                                    class="dropdown-item nav-link">
                                                                    <span>Current Consultations</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item  nav-item">
                                                                <a href="closed_consult"
                                                                class="dropdown-item nav-link">
                                                                <span>Closed Consultations</span>
                                                            </a>
                                                        </li>
                                                        <li class="menu-item  nav-item">
                                                            <a href="consult_cal"
                                                            class="dropdown-item nav-link">
                                                            <span>Consultations Calendar</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item  nav-item">
                                                        <a href="discussions" class="dropdown-item nav-link">
                                                            <span>Discussion Forum</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item  nav-item">
                                                        <a href="polls"
                                                        class="dropdown-item nav-link">
                                                        <span>Polls & Survey</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                            <a href="blog.html" class="dropdown-toggle nav-link">
                                                <span>Business Regulations</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!----Pull the the menu from the Table: consultation_type----->
                                                 <?php $security->Query("select * from consultation_type"); while(!$security->EndOfSeek()){$trow = $security->Row();?>
                                                <li class="menu-item  nav-item">
                                                    <a href="business_reg?id=<?php echo base64_encode($trow->id); ?>" value="<?php echo $trow->id; ?>"
                                                    class="dropdown-item nav-link">
                                                    <span><?php echo $trow->name; ?></span>
                                                        </a>
                                                </li>
                                          
                                                 <?php } ?>
                                            </ul>
                                        </li>
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                        <a href="#"
                                        class="dropdown-toggle nav-link">
                                        <span>Browse Regulations</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item  nav-item">
                                            <a href="institution"
                                            class="dropdown-item nav-link">
                                            <span>By Institution</span>
                                        </a>
                                    </li>
                                    <li class="menu-item  nav-item">
                                        <a href="sector"
                                        class="dropdown-item nav-link">
                                        <span>By Sector</span>
                                    </a>
                                </li>
                                <li class="menu-item  nav-item">
                                    <a href="subject"
                                    class="dropdown-item nav-link">
                                    <span>By Subject</span>
                                </a>
                            </li>
                            <li class="menu-item  nav-item">
                                <a href="year"
                                class="dropdown-item nav-link">
                                <span>By Year of Enactment</span>
                            </a>
                        </li>
                    </ul>
                    </li>
                                    <li class="menu-item menu-item-has-children dropdown nav-item">
                        <a href="#"
                        class="dropdown-toggle nav-link">
                        <span>B Ready</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="menu-item  nav-item">
                            <a href="b_ready.php"
                            class="dropdown-item nav-link">
                            <span>Overview</span>
                            </a>
                        </li>
                    <!----Pull the rest of the menu from the Table: indicator----->
                        <li class="menu-item  nav-item">
                        <a href="b-readyghana.php"
                        class="dropdown-item nav-link">
                        <span>Ghana's Outlook</span>
                        </a>
                    </li>
                    </ul>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown nav-item">
                                        <a href="#"
                        class="dropdown-toggle nav-link">
                        <span>Rolling Review</span>
                    </a>
                                        <ul class="dropdown-menu">
                        <li class="menu-item  nav-item">
                            <a href="roll-review.php"
                            class="dropdown-item nav-link">
                            <span>Overview</span>
                            </a>
                        </li>
                    
                    </ul>
                    </li>
                                    <li class="menu-item  menu-item-has-children dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link">
                            <span>Information</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu-item  nav-item">
                                <a href="aboutbrr" class="dropdown-item nav-link">
                                    <span>About BRR</span>
                                </a>
                            </li>
                            <li class="menu-item nav-item">
                                <a href="ref_tracker"
                                class="dropdown-item nav-link">
                                <span>Reform Tracker</span>
                            </a>
                        </li>
                        <li class="menu-item  nav-item">
                            <a href="faq"
                            class="dropdown-item nav-link">
                            <span>FAQs</span>
                        </a>
                    </li>
                    <li class="menu-item  nav-item">
                        <a href="your_say"
                        class="dropdown-item nav-link">
                        <span>Have Your Say</span>
                    </a>
                    </li>
                    <li class="menu-item  nav-item">
                        <a href="stakeholders" class="dropdown-item nav-link">
                            <span>Key Stakeholders</span>
                        </a>
                    </li>
                    <li class="menu-item  nav-item">
                        <a href="privacy" class="dropdown-item nav-link">
                            <span>Privacy Statement</span>
                        </a>
                    </li>
                    <li class="menu-item  nav-item">
                        <a href="terms" class="dropdown-item nav-link">
                            <span>Terms of Use</span>
                        </a>
                    </li>
                    <li class="menu-item  nav-item">
                        <a href="publications" class="dropdown-item nav-link">
                            <span>Reform Publications</span>
                        </a>
                    </li>
                    </ul>
                    </li>

                                    </ul>
</div>
</div>
<ul class="navbar_nav  navbar-mobile navbar_right">
    <li>
        <button type="button" class="search-toggler">
            <i class="icon-search"></i>
        </button>
    </li>

    <li>
        <button type="button" class="contact-toggler">
            <i class="icon-menu1"></i>
        </button>
    </li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>


