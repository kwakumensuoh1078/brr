<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Closed Consultations";
include "session.php";

$object->Query("select * from consultation_details where status = 'Closed' ");
$rowCount = $object->RowCount();
?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:46 GMT -->
<head>
   <?php require_once 'include/header.php' ?>
   <style>

/* Style to create a horizontal list */
ul.horizontal-list {
   list-style-type: none;
   margin: 0;
   padding: 0;
   display: flex;
}

ul.horizontal-list li {
   margin-right: 10px;
}

.center {
   display: block;
   margin-left: auto;
   margin-right: auto;
   width: 50%;
}
</style>
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
                        Consultations  
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">Closed Public Consultations  </a></li>

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
            <div id="primary" class="content-area  col-lg-9 col-md-12 col-sm-12 col-xs-12">

               <section class="blog_post_section one_column style_two">

                  <div class="pd_top_90"></div>

                  <div class="grid_show_case grid_layout clearfix">
                      <?php if($rowCount > 0){ while(!$object->EndOfSeek()){ $myrow = $object->Row(); ?>

                <?php   $security->Query("select * from officer where id = '".$myrow->posted_by."'  "); $u_row = $security->Row();  
                  $security->Query("select * from org where org_id = '".$u_row->org_id."'  "); $o_Row = $security->Row(); ?>

                     <div class="grid_box _card">
                        <div class="news_box default_style list_view has_images">
                            
                           <div class="content_box">
                              
                              <div class="source">
                                 <h2 class="title"><a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>" rel="bookmark"><?php echo $myrow->topic; ?></a></h2>
                                 <p class="short_desc"><?php echo $myrow->summary; ?></p>

                                 <div class="row" style="margin-top:-10px;">
                                    <div class="col-md-2">
                                      <a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>" class="btn btn-sm btn-info" style="color: white;">Read More</a>
                                   </div>
                                   <div class="col-lg-6">
                                    <?php $security->Query("select * from consultation_summary cs, consultation_details cd where cd.id = cs.cons_id "); if($security->RowCount() > 0){ $cRw = $security->RowArray();
                                     if($myrow->id == $cRw['cons_id']){ ?> <a href="summary?vs=<?php echo base64_encode($cRw[0]); ?>" class="btn btn-sm btn-success" >Click here to get summary</a> <?php }else{?><a href="javascript:;" class="btn btn-sm btn-danger">Summary not available</a> <?php }
                                   }else{ ?> <a href="javascript:;" class="btn btn-sm btn-danger">Summary not available</a>  <?php } ?>
                                </div><br><br>
                                <strong >Consultations Period: </strong>  <?php $sd = new DateTime($myrow->start_date); echo $sd->format("D F d, Y");?> - <?php $ed = new DateTime($myrow->start_date); echo $ed->format("D F d, Y"); ?> 
                              </div>
                  
                 
                             </div>
                            <div class="auhtour_box">
                                 <?php if(isset($o_Row->org_logo)){  ?>

                                 <img alt="img" src="acc/org/<?php echo $o_Row->org_logo; ?>"  height="100" width="100" class="img-fluid">

                                 <?php }else{ ?>   

                                 <img alt="img" src="assets/images/moi-logo.png"  height="100" width="100" class="img-fluid">      <?php } ?>             
                                 <div class="contnet_a">
                                    <p>POSTED BY</p>
                                    <h4>
                                      <?php echo $o_Row->org_name ?>                   
                                    </h4>
                                 </div>
                              </div>
             
                           
                        </div>
                     </div>
                  </div>

                         <?php }
             }else{ ?>
            <div style="margin-top: 60px;">
              <div class="note note-info">
                  <p style="font-size: 16px;">
                    All Consultations are Active.
                  </p>
              </div>
            </div>
            <?php } ?>

                  
               </section>
            </div>
            <div class="col-md-3"><br><br><br><br><br><br>
               <?php require_once 'include/side-menu-list.php' ?>
            </div>
         </div>
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
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>