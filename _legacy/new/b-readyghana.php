<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';

$sec = new MySQL();
$pageName = "Related Provision";
include "session.php";

$security = new MySQL();
$security1 = new MySQL();
$object = new MySQL();
$search = new MySQL();
 
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
                         Ghana's Business Readiness
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">B-Read</a></li>

                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <div id="content" class="site-content ">
      <div class="auto-container">
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
                                    <p>

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
                                          <span class="count-text" data-speed="1500" data-stop="56.3"></span>
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
                           <div class="pd_top_85"></div>
                           <!--===============spacing==============-->
                         
                              <div class="widgets_grid_box">
                                 <div class="widget creote_widget_service_list">
                                    <h4 class="widget-title">Ghana's Outlook</h4>
                                    <ul class="service_list_box">
                                        <?php $object->Query("SELECT * FROM indicator where comp_id='1'"); while(!$object->EndOfSeek()){ $ind = $object->Row() ?>
                                       <li><a href="b-readytopic?xxE=<?php echo base64_encode($ind->id);?>"><?php echo $ind->name ?></a> </li>
                                    <?php } ?>
                                    </ul>
                                 </div>
                              </div>
                           
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
                          
                        </div>
                     </aside>
                  </div>
               </div>
                <!---newsteller--->
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
                            <a href="yoursay.php" class="theme-btn color_white_1 one">View Details</a>
                                       </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_40"></div>
               <!--===============spacing==============-->
            </section>
          
      </div>
   </div>



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

<script>
   $(document).ready(function() {
      $('#example').DataTable();
   } );
</script>
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>