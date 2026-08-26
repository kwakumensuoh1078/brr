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
               <div class="simpleParallax"><img src="assets/images/slider_03.jpg" alt="bg_image"
                     class="img-fluid"></div>
            </div>
            <div class="page_header_content">
               <div class="auto-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="banner_title_inner">
                           <div class="title_page">
                              FAQ's
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                            <ul class="breadcrumb m-auto">
                              <li><a href="index">Home</a> </li>
                              <li><a href="#">Information</a> </li>
                              <li class="active">FAQ's</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
          <div id="content" class="site-content ">
                  <section class="about-section">
               <!--===============spacing==============-->
               <div class="pd_top_30"></div>
               <!--===============spacing==============-->
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-12 ">
                        <!--===============spacing==============-->
                              <div class="pd_bottom_25"></div>
                              <!--===============spacing==============-->
                              <h3>Frequently Asked Questions</h3>
                                <!--===============spacing==============-->
                                <div class="pd_bottom_25"></div>
                                <!--===============spacing==============-->
                              <div class="faq_section type_two">
                                 <div class="block_faq">
                                    <div class="accordion">
                                      
                                         <dl>
                                          <?php $object->Query("SELECT * FROM faqs_table  "); while(!$object->EndOfSeek()){ $tto = $object->Row() ?>
                                          <dt class="faq_header active">
                                             <?php echo $tto->subject;?><span class="icon-play"></span>
                                          </dt>
                                          <dd class="accordion-content hide" style="display:block;">
                                             <p>
                                                 <?php echo $tto->description;?>       
                                             </p>
                                          </dd>
                                          <?php }?>
                                           
                                       </dl>
                                          
                                    
                                    </div>
                                 </div>
                              </div>
                     </div>
                     <div class="col-xl-4 col-lg-12">
                        <div class="image_boxes style_two">
                           <div class="image one">
                              <img src="assets/images/about/law3.png" class="img-fluid" alt="image">
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_30"></div>
               <!--===============spacing==============-->
            </section>
            
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