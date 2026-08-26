<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';

$sec = new MySQL();
$pageName = "Business Regulation";
include "session.php";

$security = new MySQL();
$security1 = new MySQL();
$object = new MySQL();
$search = new MySQL();

  if(isset($_GET['year']) && !empty($_GET['year'])){
    $year = base64_decode($_GET['year']);
    $security->Query("SELECT * FROM regulation GROUP BY id");
    $row = $security->Row();
    
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
                        Business Regulations
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">Business Regulations</a></li>

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
                  <h2>Business Regulations </h2>
                  <div class="table-responsive">

                     <table id="example" class="display" style="width:100%">
                           <thead>
                              <tr>
                                 <th></th>
                                 <th></th>
                                 
                              </tr>
                           </thead>

                           <tbody>
                             <?php
                                            $counter=0;
                                            $security->Query("select * from regulation where year ='$year'");
                                            while (!$security->EndOfSeek())
                                            {
                                                $row = $security->Row();
                                                $counter +=1;
                                            ?>
                                 <tr style="text-align: left;">
                                    <td style="padding-top: 30px"><i class="fa fa-angle-double-left"></i></td>
                                    <td style="padding-top: 30px"><a href="reg_details?id=<?php echo base64_encode($row->id); ?>"><?php echo $row->title;?></a>
                                    </td>
                                    
                                 </tr>
                              <?php }?>
                           </tbody> 
                        </table>
                  </div>



                  <br><br>



               </section>
            </div>
            <div class="col-md-3"><br><br><br><br><br><br>
               <div class="widgets_grid_box">
                  <div class="widget creote_widget_service_list">
                     <h4 class="widget-title">Other Criteria</h4>
                     <ul class="service_list_box">
                        <li><a href="subject"><i class="fa fa-angle-right"></i> By Subject</a></li>
                        <li><a href="institution"><i class="fa fa-angle-right"></i> By Institution</a></li>
                        <li><a href="year"><i class="fa fa-angle-right"></i> By Year of Enactment</a></li>
                     </ul>
                  </div>
               </div>
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