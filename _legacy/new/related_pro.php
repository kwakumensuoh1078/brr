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


if(isset($_GET['id']) && !empty($_GET['id'])){ 
   $getDetails = explode('~', $_GET['id']);

   $id = base64_decode($getDetails[0]);

   $object->Query("SELECT * FROM reg_clauses, regulation WHERE regulation.id = reg_clauses.regulation_id AND reg_clauses.regulation_id='$id'LIMIT 3 ");
   $row = $object->Row();
}
?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:46 GMT -->
<head>
   <?php require_once 'include/header.php' ?>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
                        Related Regulation
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">Related Regulation</a></li>

                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <div id="content" class="site-content ">
      <div class="auto-container">
         <div class="row default_row" style="margin-top:100px">

            <?php

            $counter=0;
            $security->Query("SELECT * FROM reg_clauses, regulation WHERE regulation.id = reg_clauses.regulation_id AND reg_clauses.regulation_id='$id'");
            while (!$security->EndOfSeek())
            {
               $r = $security->Row();
               $counter +=1;
               ?>
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                  <section class="faq_section type_two">
                     <div class="block_faq">
                        <div class="accordion">

                           <dl>
                              <dt class="faq_header active">
                                 <a href="search_detail.php?indexes_id=<?php echo base64_encode($r->indexes_id).'~'.$r->title.'~'.$r->subject_id.'~'.$r->sector_id; ?>"><?php echo $r->title;?>.</a><span> <input type="hidden" name="indexes_id" id="indexes_id" value="<?php echo $r->indexes_id;?>"> <input type="hidden" name="title" id="title" value="<?php echo $r->title;?>"></span><span class="icon-check">   </span>
                              </dt>
                              <dd class="accordion-content hide" style="display:block;">
                                 <p  >
                                    <?php echo substr(strip_tags($r->details),0,160).' ...';?>           
                                 </p>

                              </dd>

                           </dl>


                        </div>
                     </div>
                  </section>

               </div>
            <?php } ?>

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

<script type="text/javascript" src=" https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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