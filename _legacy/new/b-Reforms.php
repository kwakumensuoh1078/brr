<?php 
require_once 'classes/mysql.class.php';
$object = new MySQL();
$security = new MySQL();
$search = new MySQL();
$pageName = "Reforms";
require_once 'session.php';

 $security->Query("SELECT * FROM `news` ORDER BY `id`");


if(isset($_GET['xxE'])){

    $getID = base64_decode($_GET['xxE']);
    $object->Query("SELECT * FROM `news` WHERE `id` = '".$getID."' ");
    $getData = $object->Row();

}

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
                              <?php echo $getData->newsTitle ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="index-2.html">Home</a></li>
                              <li><a href="blog.html">Reforms</a></li>
                              
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
                  <div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
                     <main id="main" class="site-main" role="main">
                        <!--===============spacing==============-->
                        <div class="pd_top_90"></div>
                        <!--===============spacing==============-->
                        <section class="blog_single_details_outer">
                           <div class="single_content_upper">
                              <div class="blog_feature_image">
                                 <img src="acc/event/<?php echo $getData->newsImage ?>" class="wp-post-image" alt="img">
                              </div>
                              <!--===============spacing==============-->
                              <div class="pd_bottom_20"></div>
                              <!--===============spacing==============-->
                              <div class="post_single_content">
                                 
                                 <!--===============spacing==============-->
                                 <div class="pd_bottom_15"></div>
                                 <!--===============spacing==============-->
                                 <div class="description_box">
                                    <p><?php echo $getData->newsArticle ?></p>
                                 </div>
                                 
                              </div>
                           </div>
                           <div class="single_content_lower">
                              <div class="tags_and_share">
                                 <div class="d-flex">
                                    <div class="tags_content left_one">
                                       <div class="box_tags_psot">
                                          <!-- <div class="title">Tags</div> -->
                                        <!--   <a class="btn" href="#">#Appraisal</a>
                                          <a class="btn" href="#">#Contract</a> -->
                                       </div>
                                    </div>
                                    <!-- <div class="share_content right_one">
                                       <div class="share_socail">
                                          <div class="title">Share</div>
                                          <button class="m_icon" title="facebook" data-sharer="facebook"
                                             data-title="blog single" data-url="blog-single.html">
                                             <i class="fa fa-facebook"></i>
                                          </button>
                                          <button class="m_icon" title="twitter" data-sharer="twitter"
                                             data-title="blog single" data-url="blog-single.html">
                                             <i class="fa fa-twitter"></i>
                                          </button>
                                          <button class="m_icon" title="whatsapp" data-sharer="whatsapp"
                                             data-title="blog single" data-url="whatsapp://send?text=https://brr.gov.gh/Reforms?xxE=<?php echo base64_encode($getData->id) ?>" data-action="share/whatsapp/share">
                                             <i class="fa fa-whatsapp"></i>
                                          </button>
                                          <button class="m_icon" title="telegram" data-sharer="telegram"
                                             data-title="blog single" data-url="blog-single.html"
                                             data-to="+44555-03564">
                                             <i class="fa fa-telegram"></i>
                                          </button>
                                          <button class="m_icon" title="skype" data-sharer="skype"
                                             data-url="blog-single.html" data-title="blog single">
                                             <i class="fa fa-skype"></i>
                                          </button>
                                       </div>
                                    </div> -->
                                 </div>
                              </div>
                               
                           </div>
                           <div class="related_post">

                              <div class="title_sections_inner">
                                 <h2>Related Posts</h2>
                              </div>
                              <!-- Swiper -->

                              <div class="swiper-container" data-swiper='{
                                       "loop": true,
                                       "autoplay": {
                                         "delay": 5000
                                       },
                                       "speed": 1000,
                                       "centeredSlides": false,
                                       "slidesPerView": 2,
                                       "spaceBetween": 30,
                                       "pagination": {
                                         "el": ".swiper-pagination",
                                         "clickable": true
                                       },
                                       "navigation": {
                                         "nextEl": ".related-button-next",
                                         "prevEl": ".related-button-prev"
                                       },
                                       "breakpoints": {
                                          "1200": {
                                             "slidesPerView": 2 
                                            },
                                          "1024": {
                                           "slidesPerView": 2 
                                          },
                                         "768": {
                                           "slidesPerView": 2 
                                         },
                                         "576": {
                                           "slidesPerView": 1 
                                         }
                                       }
                                     }'>
                                 <div class="swiper-wrapper">
                                    <?php $search->Query("SELECT * FROM news ORDER BY id DESC");while(!$search->EndOfSeek()){ $news = $search->Row();$dt = new DateTime($news->posted_date) ?>
                                    <div class="swiper-slide">
                                       <div class="news_box default_style list_view normal_view clearfix has_images">
                                          <div class="image img_hover-1">
                                             <img src="acc/event/<?php echo $news->newsImage ?>" class="img-fluid" alt="img">
                                             
                                          </div>
                                          <div class="content_box">
                                             <div class="date">
                                                <span class="date_in_number"><?php echo $dt->format('M') ?> <?php echo $dt->format('d') ?>, <?php echo $dt->format('Y') ?></span>
                                             </div>
                                             <div class="source">
                                                <h2 class="title"><a href="b-Reforms?xxE=<?php echo base64_encode($news->id) ?>" rel="bookmark"><?php echo string_shorten($news->newsTitle,50) ?></a></h2>
                                                <p class="short_desc"><?php echo string_shorten($news->newsArticle,100) ?></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                <?php } ?>
                                    
                                    

                                 </div>

                              </div>
                              <div class="arrow_related">
                                 <div class="related-button-prev">
                                    <i class="fa fa-angle-left"></i>
                                 </div>
                                 <div class="related-button-next">
                                    <i class="fa fa-angle-right"></i>
                                 </div>
                              </div>

                           </div>
                        </section>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_70"></div>
                        <!--===============spacing==============-->
                     </main>
                  </div>
                  <aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">
                     <div class="side_bar">
                        <!--===============spacing==============-->
                        <div class="pd_top_90"></div>
                        <!--===============spacing==============-->
                        <div class="widgets_grid_box">
                           <form role="search" method="get" >
                              <div class="wp-block-search__inside-wrapper">
                                 <input type="search"  name="s" value="" placeholder="Key Words here" required="">
                                 <i class="fa fa-search"></i>
                              </div>
                           </form>
                        </div>
                      <!--   <div class="widgets_grid_box">
                           <h2 class="widget-title">About Authour</h2>
                           <div class="about_authour_widget">
                              <h3>Hi! I’m Jacob Leonado</h3>
                              <img src="assets/images/authour-image-wdts.jpg" alt="authourimage">
                              <p>Obligations of business will frequently occur that pleasure have too repudiated.</p>
                              <a href="#">All My Post</a>
                           </div>
                        </div> -->
                          <div class="widgets_grid_box">
                           <h2 class="widget-title">Recent Posts</h2>
                           <div class="widget_post_box">
                             <?php $search->Query("SELECT * FROM news ORDER BY id DESC");while(!$search->EndOfSeek()){ $news = $search->Row();$dt = new DateTime($news->posted_date) ?>
                              <div class="blog_in clearfix image_in">
                                 <div class="image">
                                    <img decoding="async" src="acc/event/<?php echo $news->newsImage ?>" alt="img">
                                 </div>
                                 <div class="content_inner">
                                    <p class="post-date"><span class="icon-calendar"></span><?php echo $dt->format('M') ?> <?php echo $dt->format('d') ?>, <?php echo $dt->format('Y') ?></p>
                                    <h3><a href="b-Reforms?xxE=<?php echo base64_encode($news->id) ?>"><?php echo string_shorten($news->newsTitle,50) ?></a></h3>
                                 </div>
                              </div>
                          <?php } ?>
                          

                           </div>
                        </div>

                      
                      
                       
                        <!--===============spacing==============-->
                        <div class="pd_bottom_70"></div>
                        <!--===============spacing==============-->
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
                     <div class="col-lg-6 col-md-12">
                        <div class="content">
                           <h2>Join Our Mailing List</h2>
                           <p>For receiving our news and updates in your inbox directly. </p>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <div class="item_scubscribe">
                           <div class="input_group">
                              <form class="mc4wp-form" method="post" data-name="Subscibe">
                                 <div class="mc4wp-form-fields">
                                    <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                    <input type="submit" value="Sign up">
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_40"></div>
               <!--===============spacing==============-->
            </section>
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