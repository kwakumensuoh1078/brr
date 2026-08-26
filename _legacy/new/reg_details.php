<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Business Regulation";
include "session.php";


$security = new MySQL();
$security1 = new MySQL();
$object = new MySQL();
$search = new MySQL();

if(isset($_GET['id']) && !empty($_GET['id'])){
   $id = base64_decode($_GET['id']);
   $security->Query("SELECT * FROM regulation WHERE id='$id' GROUP BY id");
   $row = $security->Row();


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
                        <?php echo $row->title;?>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#"><?php $object->Query("select * from consultation_type where id = '".$row->class_id."' "); $pro = $object->Row(); echo $pro->name; ?> </a></li>

                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <div id="content" class="site-content ">
      <div class="auto-container">
         <div class="row default_row" style="margin-top:100px;margin-bottom: 50px;">
            <div class="col-md-4"> 
               <div class="tab-content price_tab_content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="row">

                        <div class="price_plan_box style_two  tag_enables ">
                           <div class="tag"> Title</div>
                           <div class="inner_box">
                              <div class="top">
                                 <h6><?php echo $row->title;?></h6>

                              </div>
                              <br>
                              <div class="bottom">
                                 <ul>
                                    <li style="text-align: left;"><span><i class="fa fa-gavel" style="color: green"></i> Regulation Number :</span> <a href="#"><?php echo $row->no;?></a></li><hr>

                                    <li style="text-align: left;"><span><i class="fa fa-calendar" style="color: green"></i> Year :</span> <a href="#"><?php echo $row->year;?></a></li><hr>
                                    <li style="text-align: left;"><span><i class="fa fa-balance-scale" style="color: green"></i> Date of Gazette :</span> <a href="#"><?php echo $row->gazette_date;?></a></li><hr>
                                    <li style="text-align: left;"><span><i class="fa fa-globe" style="color: green"></i> Classification :</span> <a href="#"><?php $object->Query("select * from consultation_type where id = '".$row->class_id."' "); $pro = $object->Row(); echo $pro->name; ?></a></li>
                                 </ul>

                              </div>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
               <div class="price_plan_box style_one">
                  <div class="inner_box">
                     <div class="top">
                        <h2>Introduction</h2>

                     </div>
                     <div class="mid">
                        <p><?php echo $row->introduction;?>
                     </p>
                  </div>

               </div>
            </div><br>

            <div class="price_plan_box style_one">
               <div class="inner_box">
                  <div class="top">
                     <h5>Related Provisions</h5>

                  </div>

                  <div class="bottom">
                     <ul>
                        <?php

                        $counter=0;
                        $security->Query("SELECT * FROM reg_clauses, regulation WHERE regulation.id = reg_clauses.regulation_id AND reg_clauses.regulation_id='$id'LIMIT 3 ");
                        while (!$security->EndOfSeek())
                        {
                           $r = $security->Row();
                           $counter +=1;
                           ?>
                           <li><a href="search_detail.php?indexes_id=<?php echo base64_encode($r->indexes_id).'~'.$r->title.'~'.$r->subject_id.'~'.$r->sector_id; ?>" >
                              <span> <?php echo substr(strip_tags($r->details),0,40).' ...';?></span>
                              <i class="fa fa-check"></i></a>
                           </li>
                        <?php }?>
                     </ul>
                     <a href="related_pro.php?id=<?php echo base64_encode($r->id).'~'.$r->title.'~'.$r->subject_id.'~'.$r->sector_id; ?>" target="&quot;_blank&quot;" rel="&quot;nofollow&quot;" class="theme-btn two">
                        View More 
                     </a>
                  </div>


               </div>
            </div>


         </div>
         <div id="primary" class="content-area  col-lg-8 col-md-12 col-sm-12 col-xs-12">

            <section class="blog_post_section one_column style_two">

               <iframe src="acc/registry/<?php echo $row->document;?>"
                  type="application/pdf" width="100%" height="800px"></iframe> 

               </section>
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