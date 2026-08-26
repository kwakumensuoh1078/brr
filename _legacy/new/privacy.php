<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$search = new MySQL();
$pageName = "Reforms";
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
       <div class="page_header_default style_one blog_single_pageheader">
            <div class="parallax_cover">
               <div class="simpleParallax"><img src="assets/images/gh-banner.png" alt="bg_image"
                     class="img-fluid"></div>
            </div>
            <div class="page_header_content">
                  <div class="auto-container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="banner_title_inner">
                              <div class="title_page">
                                 Privacy Statement
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="breadcrumbs creote">
                              <ul class="breadcrumb m-auto">
                                 <li><a href="index-2.html">Home</a></li>
                                 <li class="active">Privacy Statement</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            
         </div>
          <div id="content" class="site-content ">

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
                                    <div class="title">The BRR Portal</div>
                                    <p align='justify'>
                                This is a Government of Ghana Portal. If you are only browsing this Portal, we do not capture data that allows us to identify you 
                                individually. If you choose to make an application or send us an email for which you provide us with personally identifiable data, 
                                we may share necessary data with other Government agencies, so as to serve you in the most efficient and effective way, unless such 
                                sharing is prohibited by law. We will NOT share your personal data with non-Government entities, except where such entities have been 
                                authorised to carry out specific Government services. We may use "cookies", where a small data file is sent to your browser to store and
                                track information about you when you enter our Portals. The cookie is used to track information such as the number of users and their 
                                frequency of use, profiles of users and their preferred sites. While this cookie can tell us when you enter our sites and which pages 
                                you visit, it cannot read data off your hard disk.</p>
                                <p align='justify'> 
                                You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline 
                                cookies if you prefer. This may prevent you from taking full advantage of the Portal. For your convenience, we may also display to you data you had 
                                previously supplied us or to other Government agencies. This is done with the intent to save you the trouble of repeating previous submissions. 
                                Should the data be out-of-date, please supply us the latest data. We will retain your personal data only as necessary for the effective delivery of 
                                public services to you.</p>
                                <p align='justify'>
                                To safeguard your personal data, all electronic storage and transmission of personal data is secured with appropriate security technologies. 
                                This site may contain links to other Government agencies and non-Government sites whose data protection and privacy practices may differ from ours. 
                                We are not responsible for the content and privacy practices of these other Portals and encourage you to consult the privacy notices of those sites. 
                                If you have any enquires or feedback on our data protection policies and procedures or if you require more information on or access to the data which 
                                you have sent to us, please contact us.
                                    </p>
                                 </div>
                              </div>
                              <div class="row no-space">
                                 <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-5 mb-xl-0 ps-0 ps-lg-0 pe-0 pe-lg-0 pe-xl-3">
                                    <div class="description_box">
                                       <p>B-READY assesses the economy’s business environment by focusing on the regulatory framework and the provision of related public services for firms and markets, as well as the efficiency with which they are combined in practice </p>
                                    </div>
                                    
                                    
                                    <!--===============spacing==============-->
                                    <div class="pd_bottom_25"></div>
                                    <!--===============spacing==============-->
                                    <div class="icon_box_all style_one">
                                       <div class="icon_content ">
                                          <div class="icon">
                                             <img src="assets/images/icon-image-nike.png" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3>
                                                <a href="#" target="_blank" rel="nofollow">Highest Performance</a>
                                             </h3>
                                             <p> Ghana scores highest in Labor, Utility Services, and Business Insolvency.</p>
                                          </div>
                                       </div>
                                    </div>
                                    
                                    <!--===============spacing==============-->
                                    <div class="pd_bottom_25"></div>
                                    <!--===============spacing==============-->
                                    <div class="icon_box_all style_one">
                                       <div class="icon_content ">
                                          <div class="icon">
                                             <img src="assets/images/icon-image-nike.png" class="img-fluid svg_image" alt="icon png">
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
                                          <span class=" icon-calendar1"></span>
                                       </div>
                                                    <div class="coun_ter">
                                          <span class="count-text" data-speed="1500" data-stop="66.91"></span>
                                          <small>%</small>
                                       </div>
                                    </div>
                                        
                                            </div>
                                    </div>
                                    
                                   
                                    <!--===============spacing==============-->
                                    <div class="pd_bottom_15"></div>
                                    <!--===============spacing==============-->
                                    <div class="simple_image_boxes">
                                       <img src="assets/images/2024_score.png" class="object-fit-cover-center height_455px" alt="image">
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
                                          <span class="count-text" data-speed="1500" data-stop="66.9"></span>
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
                                          <span class="count-text" data-speed="1500" data-stop="47.7"></span>
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
                                    <div class="icon_box   icon_yes ">
                                       <div class="icon">
                                          <span class=" icon-wallet"></span>
                                       </div>
                                       <div class="coun_ter">
                                          <span class="count-text" data-speed="1500" data-stop="54.4"></span>
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
                                    
                                    <div class="content_box_cn  style_one">
                                       <div class="txt_content">
                                          <h3>
                                             <a href="#" target="_blank" rel="nofollow">Public Services</a>
                                          </h3>
                                          <p>the facilities that governments provide directly or through private firms to support compliance with regulations and the critical institutions and infrastructure that enable business activities.</p>
                                       </div>
                                    </div>
                                    
                                    <div class="content_box_cn  style_one">
                                       <div class="txt_content">
                                          <h3>
                                             <a href="#" target="_blank" rel="nofollow">Operational Efficiency</a>
                                          </h3>
                                          <p>pertains to the efficacy with which the regulatory framework and related public services are combined in practice to obtain the objectives that allow firms to function.</p>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 
                           </article>
                           <!--===============spacing==============-->
                           <div class="pd_bottom_35"></div>
                           <!--===============spacing==============-->
                        </main>
                     </div>
                     <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                        <div class="service_siderbar side_bar">
                           <!--===============spacing==============-->
                           <div class="pd_top_45"></div>
                           <!--===============spacing==============-->
                         
                              <div class="widgets_grid_box">
                                 <div class="widget creote_widget_service_list">
                                    <h4 class="widget-title">Other Information</h4>
                                    <ul class="service_list_box">
                                       <li><a href="aboutbrr">About BRR</a> </li>
                                       <li><a href="faq">FAQs</a> </li>
                                       <li><a href="contact">Contact Us</a> </li>
                                       <li><a href="privacy">Privacy Statement</a> </li>
                                       <li><a href="terms">Terms of Use</a> </li>
                                       <li><a href="termsuse">Terms & Conditions</a> </li>
                                       <li><a href="stakeholders">Key Stakeholders</a> </li>
                                       <li><a href="publications">Reform Publications</a> </li>
                                       <li><a href="yoursay">Have Your Say</a> </li>
                                       <li><a href="ref_tracker">Reform Tracker</a> </li>
                                    </ul>
                                 </div>
                              </div>
                           <!---newsteller
                           <div class="widgets_grid_box">
                              <div class="brouchure_box_widget">
                           
                                    <div class="widget_content">
                                       <h3>Latest B-Ready Report on Ghana</h3>
                                       <div class="color_white_1 clearfix">
                                          <a href="reports/B-READY_GHANA-2024.pdf" class="theme-btn color_white_1 one">Download Here</a>
                                       </div>
                                    </div>
                                 
                              </div>
                           </div>
                          --->
                        </div>
                     </aside>
                  </div>
               </div>
                <?php require_once 'include/have-your-say.php' ?>
 
            
         </div>
            
           
            <!---newsteller end--->
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