<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Discussion Forum";
include "session.php";
 
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
                        Discussion Forum 
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">List of Topics </a></li>

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
                  <h2>List of Topics</h2>

                     <div>
                                       <p align="center" style="display: none; color: limegreen;" id="wait"><img src="../dist/img/spinner-grey.gif" > Please wait....</p>
                                       <div id="response" align="center"></div>

                                    </div>

                              <div class="box-body" id="listPolls">
                                       <table class="table table-striped table-bordered table-hover" id="example">
                                          <thead>
                                             <tr>
                                                <th>#</th>
                                                <th>Topic</th>
                                                <td>Institution</td>
                                                <th>Interest</th>
                                                <th></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php
                                             $counter=0;

                                                           $security->Query("Select * from forum_topic where public_comment = 'yes' ");
                                             while (!$security->EndOfSeek())
                                             {
                                                $row = $security->Row();
                                                $counter +=1;
                                                ?>
                                                <tr>
                                                   <td><?php echo $counter?></td>
                                                   <td><?php echo $row->title;?></td>
                                                   <td><?php 
                                                   $cid = $row->cat_id;
                                                   $object->Query("Select * from org where org_id = '$cid' ");
                                                   $catRow = $object->Row();
                                                   echo $catRow->org_name;?>
                                                </td>
                                                <td><?php 
                                                $intid = $row->interest_id;
                                                $object->Query("Select * from interest where int_id = '$intid' ");
                                                $intRow = $object->Row();
                                                echo $intRow->interest_name;?>
                                             </td>
                                             <td>
                                                <?php if($row->status == "Active"){ ?>
                                                   <a  href="reply?vreply=<?php echo base64_encode($row->id);?>" class="btn btn-sm btn-success">Have your say</a>
                                                <?php } ?>

                                                <?php if($row->status == "Closed"){ ?>
                                                   <a  href="reply?vreply=<?php echo base64_encode($row->id);?>" class="btn btn-sm btn-warning">Closed</a>
                                                <?php } ?>
                                             </td>


                                          </tr>
                                       <?php }?>
                                    </tbody>


                                 </tfoot>
                              </table>
                           </div>
                           <br><br>

           
                  
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
<script src="js/registration.js"></script>
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