<?php 
require_once 'classes/mysql.class.php';
$object = new MySQL();
$security = new MySQL();
$search = new MySQL();
$pageName = "about";
require_once 'session.php';

 $security->Query("SELECT * FROM `indicator` ORDER BY `id`");


if(isset($_GET['xxE'])){

    $getID = base64_decode($_GET['xxE']);
    $object->Query("SELECT * FROM `indicator` WHERE `id` = '".$getID."' ");
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
<div id="content" class="site-content ">
       <!----page header----->
         <div class="page_header_default style_one ">
               <div class="parallax_cover">
                  <div class="simpleParallax"><img src="assets/images/gh-banner.png" alt="bg_image" class="cover-parallax"></div>
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
                                 <li><a href="index-2.html">Home</a></li>
                                 <li class="active">B-Ready </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
             <div class="auto-container">
                  <div class="row default_row">
                     <div id="primary" class="content-area service col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <main id="main" class="site-main" role="main">
                           <!--===============spacing==============-->
                           <div class="pd_top_20"></div>
                           <!--===============spacing==============-->
                           <article class="clearfix service type-service status-publish has-post-thumbnail hentry">
                              <div class="title_all_box style_one dark_color">
                                 <div class="title_sections left">
                                    <div class="title"><?php echo $getData->name; ?></div>
                                   
                                 </div>
                              </div>
                              <div class="row no-space">
                                 <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-5 mb-xl-0 ps-0 ps-lg-0 pe-0 pe-lg-0 pe-xl-3">
                                    <div class="description_box">
                                       <p align='justify'> <?php echo $getData->about ?></p>
                                    </div>
                                    
                                    <!--===============spacing==============-->
                                    <div class="pd_bottom_15"></div>
                                    <!--===============spacing==============-->
                             
                                 </div>
                                 <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-xs-12 ps-0 ps-lg-0 pe-0 pe-lg-0 ps-xl-3">
                                    
                                    <div class="grid_box _card">
                                            <div class="counter-block style_one count-box">
                                                <div class="content_box">
                                       <h6>Latest Score: <?php $object->Query("SELECT * FROM ind_score WHERE ind_id = '".$getID."' ORDER BY id DESC"); $pro = $object->Row(); echo $pro->yr ?> </h6>
                                    </div>
                                                <div class="icon_box icon_yes">
                                                    <div class="icon">
                                          <span class=" icon-calendar1"></span>
                                       </div>
                                                    <div class="coun_ter">
                                          <span class="count-text" data-speed="1500" data-stop="<?php if (empty($pro->ind_id)) {
                                             echo "0";
                                          }else{
                                             echo $pro->score;
                                          }?>"></span>
                                          <small>%</small>
                                       </div>
                                    </div>
                                        
                                            </div>
                                    </div>
                                    
                                   
                                    <!--===============spacing==============-->
                                    <div class="pd_bottom_15"></div>
                                    <!--===============spacing==============-->
                                    <div class="simple_image_boxes">
                                       <img src="assets/images/2024_be_score.png" class="object-fit-cover-center height_455px" alt="image">
                                    </div>
                                    
                              </div>
                              <div class="row">
                                 <?php $security->Query("SELECT * FROM ind_values WHERE ind_id = '".$getID."'");while(!$security->EndOfSeek()){ $row = $security->Row() ?>
                                 <div class="col-md-6">
                                        <div class="icon_box_all style_one" style="margin-bottom:10px">
                                       <div class="icon_content ">
                                          <div class="icon">
                                             <img src="assets/images/icon-image-nike.png" class="img-fluid svg_image" alt="icon png">
                                          </div>
                                          <div class="txt_content">
                                             <h3>
                                                <a href="#" target="_blank" rel="nofollow"><?php echo $row->value ?> Days</a>
                                             </h3>
                                             <p> <?php echo $row->description ?></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div> 
                              <?php } ?>
                              </div>
                              <!--===============spacing==============-->
                              <div class="pd_bottom_15"></div>
                              <!--===============spacing==============-->
                              <h4>Detailed Score for each Pillar - Year <?php $security->Query("SELECT * FROM pillar_score WHERE indid = '$getID' ORDER BY year DESC "); $dros =$security->Row();echo $dros->year  ?> </h4>
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
                                          <span class="count-text" data-speed="1500" data-stop="<?php $security->Query("SELECT * FROM pillar_score WHERE indid = '$getID' AND pillar_id = 1 ORDER BY year DESC "); $dros =$security->Row();if (empty($dros->indid)) {
                                             echo "0";
                                          }else{
                                             echo $dros->score;
                                          }  ?>"></span>
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
                                          <span class="count-text" data-speed="1500" data-stop="<?php $security->Query("SELECT * FROM pillar_score WHERE indid = '$getID' AND pillar_id = 3 ORDER BY year DESC "); $dros =$security->Row();if (empty($dros->indid)) {
                                             echo "0";
                                          }else{
                                             echo $dros->score;
                                          }  ?>"></span>
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
                                          <span class="count-text" data-speed="1500" data-stop="<?php $security->Query("SELECT * FROM pillar_score WHERE indid = '$getID' AND pillar_id = 2 ORDER BY year DESC "); $dros =$security->Row();
                                          if (empty($dros->indid)) {
                                             echo "0";
                                          }else{
                                             echo $dros->score;
                                          }

                                                     ?>"></span>
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
                                      <?php $search->Query("SELECT * FROM ind_pillar WHERE indicator_id = '$getID'");while(!$search->EndOfSeek()){ $wros = $search->Row(); ?>     
                                    <div class="content_box_cn style_one">
                                       <div class="txt_content">
                                          <h3>
                                             <a href="#" target="_blank" rel="nofollow"><?php echo $wros->name ?></a>
                                          </h3>
                                          <p><?php echo $wros->description ?></p>
                                       </div>
                                    </div>
                                    <?php } ?>
                                    
                                 </div>
                                 
                                 
                           </article>
                           <!--===============spacing==============-->
                           <div class="pd_bottom_35"></div>
                           <!--===============spacing==============-->
                        </main>
                        <hr>
                        <div class="widgets_grid_box dark_color">
                            <div class="widget creote_widget_service_list">
                                <h4 class="widget-title">Institutions Under this Indicator</h4>
                                <ul class="service_list_box">
                                      
                                        
                                    </ul>
                            </div>
                        </div>  
                        
                     </div>
                     <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                        <div class="service_siderbar side_bar">
                           <!--===============spacing==============-->
                           <div class="pd_top_45"></div>
                           <!--===============spacing==============-->
                         
                              <div class="widgets_grid_box">
                                 <div class="widget creote_widget_service_list">
                                    <h4 class="widget-title">Other Topics</h4>
                                    <ul class="service_list_box">
                                       <?php $object->Query("SELECT * FROM indicator where comp_id=1"); while(!$object->EndOfSeek()){ $ind = $object->Row() ?>
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