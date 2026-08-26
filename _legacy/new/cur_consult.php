<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Upcoming Consultations";
include "session.php";

$object->Query("select * from consultation_details where status != 'Closed' ORDER BY id DESC ");
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
                        Current Consultation
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">On-going Public Consultations</a></li>

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

                        <?php $uid = $myrow->posted_by; $security->Query("select * from officer where id = '$uid'  "); $u_row = $security->Row(); $org_id = $u_row->org_id;
                        $security->Query("select * from org where org_id = '$org_id'  "); $o_Row = $security->Row(); ?>

                        <div class="grid_box _card">
                           <div class="news_box default_style list_view has_images">

                              <div class="content_box">

                                 <div class="source">
                                    <h2 class="title"><a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>" rel="bookmark"><?php echo $myrow->topic; ?></a></h2>
                                    <ul class="horizontal-list">
                                       <li >
                                          <i class="fa fa-eye" style="color: #26A368;"></i>
                                          <span style="color: #E43621;">
                                             <?php
                                             $security->Query("Select count(*) as ViewTotal from view_tb where consult_id = '".$myrow->id."' ");
                                             $view = $security->Row(); echo $view->ViewTotal; ?> View (s) 
                                          </span>

                                       </li>
                                       <li>
                                          <span id="thumbscolor<?php echo $myrow->id; ?>">
                                             <?php $sec->Query("Select * from likes_tb where consult_id = '".$myrow->id."' and ip_address = '".$_SERVER['REMOTE_ADDR']."' "); if($sec->RowCount() > 0){ ?>
                                                <i class="fa fa-thumbs-up"  style="color: #F5F235;"></i> 
                                             <?php }else{ ?>
                                                <i class="fa fa-thumbs-up"  style="color: #26A368;"></i>
                                             <?php } ?>
                                          </span>
                                          <a data-id="<?php echo $myrow->id; ?>" class="showLike" >
                                             <?php
                                             $security->Query("Select count(*) as likeTotal from likes_tb where consult_id = '".$myrow->id."' ");
                                             $like = $security->Row();?><span id="myLikes<?php echo $myrow->id; ?>"><?php  echo $like->likeTotal; ?></span> Like (s)
                                          </a>
                                       </li>
                                       <li>
                                          <i class="fa fa-comments" style="color: #26A368;"></i>
                                          <span style="color: #E43621;">
                                             <?php
                                             $security->Query("Select count(*) as comTotal from consultation_response where consult_id = '".$myrow->id."' ");
                                             $com = $security->Row(); echo $com->comTotal; ?> Comment (s)
                                          </span>
                                       </li>
                                    </ul>
                                    <p class="short_desc"> <?php echo string_shorten($myrow->summary,800); ?></p>
                                    <a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>" class="btn-sm btn-info">Read More</a>
                                     <?php $sesia = strtotime(date("Y-m-d")); $end_me = strtotime($myrow->end_date); $end_me_datediff = $end_me - $sesia;?>

                                    <?php if($myrow->status == "Closed"){ ?>
                                       <a  class="btn btn-sm btn-primary" style="text-align: center;  " >ClOSED</a>
                                    <?php }else if($myrow->status == "Pending"){ ?>
                                       <a  class="btn btn-sm btn-info" style="text-align: center;  " ><?php echo round($end_me_datediff / (60 * 60 * 24)). " Day(s) Left" ?></a>
                                    <?php }else if($myrow->status == "Active"){ ?>
                                       <a   class="btn btn-sm btn-success" style="text-align: center;  " ><?php echo round($end_me_datediff / (60 * 60 * 24)). " Day(s) Left" ?></a>
                                    <?php } ?>
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
                                    </div><br/>
                                   

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

                  </div>
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

<script>
   $(document).on("click", ".showLike", function(e){
      e.preventDefault();
      var id = $(this).data("id");
      var userID = $.trim($("#userID").val());
      if(userID.length == 0){
//alert("you cant like when you are not logged in");
         toastr.error('you cant like when you are not logged in.', 'Error!');
      }
      else if(userID.length != 0)
      {
         $.ajax({
            url: "controllers/process_like.php",
            type: "post",
            dataType: "json",
            data: {cons_id:id, userData:userID},
            success:function(data){
//console.log(data);
               $("#myLikes"+id).html(data.Mylikes);
               if(data.status == "yes"){
                  $("#thumbscolor"+id).html('<i class="fa fa-thumbs-up" style="color:#F5F235;"></i>')
               }else if(data.status == "no"){
                  $("#thumbscolor"+id).html('<i class="fa fa-thumbs-up" style="color:#26A368;"></i>')
               }
            }
         })
      }
   });
</script>


<script>
   toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-bottom-right",
      "onclick": null,
      "showDuration": "1000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
   }
</script>


</body>
<!-- END BODY -->
</html>


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