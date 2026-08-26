<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$viewInsert = new MySQL();
$pageName = "Reforms";
require_once 'session.php';

  if(isset($_GET['cd']) && !empty($_GET['cd']))
{
 // $ip_address = $_SERVER['REMOTE_HOST'];
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $cons_id = base64_decode($_GET['cd']);
  $currentDate = Date('d-m-Y');

  $viewInsert->Query("INSERT INTO `view_tb` (`consult_id`,`ip_address`,`createdon`) values('$cons_id','$ip_address','$currentDate')");


  $object->Query("select * from consultation_details where id ='$cons_id' ");
  $consultRow = $object->Row();
}
else
{
  header("Location: error.html"); exit;
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
               <div class="simpleParallax"><img src="assets/images/gh-banner.png" alt="bg_image"
                     class="img-fluid"></div>
            </div>
            <div class="page_header_content">
               <div class="auto-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="banner_title_inner">
                           <div class="title_page">
                              Public Consultation on: <?php echo $consultRow->topic; ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="index">Home</a></li>
                              <li class="active"><a href="#">Search Results</a></li>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
          <div id="content" class="site-content ">
            <div class="container">
                  <div class="row default_row">
                     <div class="full_width_box">
                        <!--===============spacing==============-->
                        <div class="pd_top_70"></div>
                        <!--===============spacing==============-->
                         <div class="row">
                          
                              <div class="col-md-8">

                                 <div class="row">
                                    <div class="col-md-4">
                                    <?php $uid = $consultRow->posted_by; $security->Query("select * from officer where id = '$uid'  "); $u_row = $security->Row(); $org_id = $u_row->org_id;
                                       $security->Query("select * from org where org_id = '$org_id'  "); $o_Row = $security->Row(); if(isset($o_Row->org_logo)){ ?>

                                          <img src="acc/org/<?php echo $o_Row->org_logo ?>" width="150" alt="institutions logo" class="center">

                                       <?php }else{ ?>
                                          <img src="assets/img/moi-logo.png" width="150" alt="institutions Logo" class="center">

                                       <?php } ?>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 align="left"><b> Sponsor:</b> <strong><?php echo $o_Row->org_name ?></strong></h6> 
                                       <strong style="margin-left:0px;">Period of Consultations: </strong>  <?php $dt = new DateTime($consultRow->start_date); echo $dt->format("D F d, Y") ?> to <?php $dt = new DateTime($consultRow->end_date); echo $dt->format("D F d, Y") ?>  <br><br>
                                       <div class="row">

                                          <?php if($consultRow->status == "Closed"){}else{ ?>
                                             <?php $sesia = strtotime(date("Y-m-d")); $end_me = strtotime($consultRow->end_date); $end_me_datediff = $end_me - $sesia;?>


                                             <div class="col-md-6 col-sm-6">
                                                <a href="javascript:;" class="btn btn-sm btn-success  " style="text-align: left; width: 100%;" ><strong>Days Left: </strong> <?php echo round($end_me_datediff / (60 * 60 * 24)). " Day(s)" ?>.</a> 
                                             </div>
                                          <?php } ?>

                                          <div class="col-md-6 col-sm-6">
                                             <a href="javascript:;" class="btn btn-sm btn-info" style="text-align: left; width: 100%;" ><strong>Status: </strong> <?php if($consultRow->status == "Active"){echo "Open";}else{echo $consultRow->status;} ?></a>
                                          </div>
                                       </div>
                                    </div>
                                       <p style="margin-top: 15px"> <?php echo $consultRow->summary; ?></p>
                                       <p><?php echo $consultRow->brief_background; ?></p>

                                         <div class="quotes_box style_one">
                                              
                                             <div class="content">
                                                   <h4 class="block"><strong>Key Provisions / Thematic Areas</strong></h4>
                                                                              <p style="font-size: 16px;">
                                                   <?php echo $consultRow->key_provisions; ?>
                                                </p>
                                             </div>
                                        </div><br><br>

                                        <div class="quotes_box style_one">
                                              
                                             <div class="content">
                                                   <h4 class="block"><strong>Comments</strong></h4>
                                                <p style="font-size: 16px;">
                                                   <?php echo $consultRow->note; ?>
                                                </p>
                                             </div>
                                        </div>

                                          <p align="justify">

                              <h5><strong>Key documents to download</strong></h5>

                              <?php $object->Query("select * from consultation_attachment where cons_details_id = '$cons_id' "); $rowCount = $object->RowCount();
                              if($rowCount > 0){?>
                                 <?php while(!$object->EndofSeek()){ $docRow = $object->Row();?>

                                    <p style="font-size: 16px;">
                                       <a href="acc/consultation/<?php echo $docRow->attachment; ?>" target="_blank">
                                          <?php $ext = pathinfo($docRow->attachment, PATHINFO_EXTENSION); ?>
                                          <?php if($ext == 'pdf'){ ?>
                                             <i class="fa fa-file-o"></i> 
                                          <?php }else if($ext == 'doc' || $ext == 'docx'){ ?>
                                             <i class="fa fa-file-word-o"></i> 
                                          <?php }else if($ext == 'csv' || $ext == 'xlsx' || $ext == 'xls'){ ?>
                                             <i class="fa fa-file-excel-o"></i> 
                                          <?php }else if($ext == 'ppt'){ ?>
                                             <i class="fa fa-file-powerpoint-o"></i> 
                                          <?php }else{ ?>
                                             <i class="fa fa-file-text-o"></i>
                                          <?php } ?>
                                          Get Document
                                       </a>
                                    </p>
                                 <?php }
                              }else{?>

                                 <p>
                                    <div class="note note-info">
                                       <p style="font-size: 16px; color:black;">
                                          <strong>No Document available for this consultation</strong>
                                       </p>
                                    </div>
                                 </p>

                              <?php } ?>

                              <br><br>
                              <p> </p>

                              <h5 style="margin-top: -30px;"><strong> How to respond</strong></h5>

                              <?php if($consultRow->reply_type == "online"){ ?>

                                 <?php if($consultRow->status == "Closed"){?>
                                    <p style="font-size: 16px;">
                                       This Consultation is <strong>Closed</strong>
                                    </p>
                                 <?php }else if($consultRow->status == "Pending"){?>
                                    <p style="font-size: 16px;">
                                       This Consultation is <strong>Not yet Active</strong>
                                    </p>
                                 <?php }else{ ?>
                                    <p style="font-size: 16px;">
                                       <a href="respond?r=<?php echo base64_encode($cons_id); ?>">Click here</a> to respond to this Consultation
                                    </p>
                                 <?php } ?>

                              <?php }else if($consultRow->reply_type == "email_address"){ ?>
                                 <p><h5><strong>Email to:</strong></h5></p>
                                 <p style="font-size: 16px;">
                                    <a href="mailto:<?php echo $consultRow->email; ?>"><?php echo $consultRow->email; ?></a>
                                 </p> <br><br>

                                 <p><h5><strong>Write to:</strong></h5></p>
                                 <p style="font-size: 16px;">
                                    <address style="font-size: 16px;">

                                       <?php echo $consultRow->box_address; ?>
                                    </address>
                                 </p>
                              <?php }else if($consultRow->reply_type == "both"){ ?>
                                 <?php if($consultRow->status == "Closed"){?>
                                    <p style="font-size: 16px;">
                                       This Consultation is <strong>Closed</strong>
                                    </p>
                                 <?php }else if($consultRow->status == "Pending"){?>
                                    <p style="font-size: 16px;">
                                       This Consultation is <strong>Not yet Active</strong>
                                    </p>
                                 <?php }else{ ?>
                                    <p style="font-size: 16px;">
                                       <a href="respond?r=<?php echo base64_encode($cons_id); ?>">Click here</a> to respond to this Consultation
                                    </p>
                                 <?php } ?>
                                 <br><br>

                                 <p style="margin-top: -30px;"><h5 ><strong>Email to:</strong></h5></p>
                                 <p style="font-size: 16px;">
                                    <a href="mailto:<?php echo $consultRow->email; ?>"><?php echo $consultRow->email; ?></a>
                                 </p> <br><br>

                                 <p style="margin-top: -30px;"><h5><strong>Write to:</strong></h5></p>
                                 <p style="font-size: 16px;">
                                    <address style="font-size: 16px;">

                                       <?php echo $consultRow->box_address; ?>
                                    </address>
                                 </p>
                              <?php } ?>

                           </p>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="widgets_grid_box">
                                       <div class="widget widget_block">
                               
                                          <h2 class="widget-title">Most Viewed</h2>
                                          <ul class="wp-block-categories-list wp-block-categories">
                                                <?php $object->Query("select consult_id, count(*) as myv from view_tb  group by consult_id order by myv desc limit 5");while(!$object->EndOfSeek()){ $checkRow = $object->Row(); $security->Query("select * from consultation_details "); while(!$security->EndOfSeek()){$sideRow = $security->Row(); if($checkRow->consult_id == $sideRow->id){?>
                                                      <li><a href="consultation?cd=<?php echo base64_encode($sideRow->id); ?>"><?php echo $sideRow->topic; ?></a></li>
                                                      <?php } } }?>
                                             
                                          </ul>
                                       </div>
                                    </div>


                                    <div class="widgets_grid_box">
                                       <div class="widget widget_block">
                               
                                          <h2 class="widget-title">Most  Commented</h2>
                                          <ul class="wp-block-categories-list wp-block-categories">
                                                   <?php $object->Query("select consult_id, count(*) as myc from consultation_response group by consult_id order by myc desc limit 5");while(!$object->EndOfSeek()){ $check_Row = $object->Row(); $security->Query("select * from consultation_details "); while(!$security->EndOfSeek()){$side_Row = $security->Row(); if($check_Row->consult_id == $side_Row->id){?>
                                                      <li><a href="consultation?cd=<?php echo base64_encode($side_Row->id); ?>"><?php echo $side_Row->topic; ?></a></li>
                                                      <?php } } }?>
                                             
                                          </ul>
                                       </div>
                                    </div>

                                    <div class="widgets_grid_box">
                                       <div class="widget widget_block">
                               
                                          <h2 class="widget-title">Closed Consultation</h2>
                                          <ul class="wp-block-categories-list wp-block-categories">
                                                   <?php  $security->Query("select * from consultation_details limit 5 "); while(!$security->EndOfSeek()){$sides_Row = $security->Row(); $s_esia = strtotime(date("Y-m-d")); $s_end_me = strtotime($sides_Row->end_date); $s_end_me_datediff = $s_end_me - $s_esia; if(round($s_end_me_datediff / (60 * 60 * 24)) < 7 ){ ?>
                                                      <li><a href="consultation?cd=<?php echo base64_encode($sides_Row->id); ?>"><?php  echo $sides_Row->topic; ?></a></li>
                                                      <?php } } ?>
                                             
                                          </ul>
                                       </div>
                                    </div>


                                 <div class="pricing_plan_box type_one">
                                    <div class="tags">Participate</div>
                                    <div class="pricing_plan_box_inner">
                                       
                                       <div class="lower_content">
                                          <ul>
                                             <li><a href="consult_cal">
                                                <span class="yes_ico fa fa-check-circle-o"></span>
                                                Consultations Calendar</a>
                                             </li>
                                             <li><a href="cur_consult">
                                                <span class="yes_ico fa fa-check-circle-o"></span>
                                                Current Consultations</a>
                                             </li>
                                             <li><a href="closed_consult">
                                                <span class="yes_ico fa fa-check-circle-o"></span>
                                               Closed Consultation</a>
                                             </li>
                                             <li><a href="discussion-forum">
                                                <span class="yes_ico fa fa-check-circle-o"></span>
                                               Discussion Forum </a></li>
                                             <li><a href="consultation-summary">
                                                <span class="yes_ico fa fa-check-circle-o"></span>
                                                Consultation Summary</a> </li>
                                                <li><a href="poll">
                                                <span class="yes_ico fa fa-check-circle-o"></span>
                                                Polls & Surveys</a> </li>
                                          </ul>
                                       </div>
         
                                        
                                    </div>
                                 </div>
                              
                             
                           </div>
                         </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_70"></div>
                        <!--===============spacing==============-->
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