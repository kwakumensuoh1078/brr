<?php 
require_once 'classes/mysql.class.php';
require_once 'classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Consultations";


$security = new MySQL();
$object = new MySQL();
$object_two = new MySQL();
$object_three = new MySQL();
$search = new MySQL();
$reg_id="";

if(isset($_GET['indexes_id']) && !empty($_GET['indexes_id'])){ 
   $getDetails = explode('~', $_GET['indexes_id']);

   $indexes_id = base64_decode($getDetails[0]);

   $object->Query("SELECT * FROM reg_clauses WHERE  indexes_id='$indexes_id'");
   $row = $object->Row();

   $object_three->Query("SELECT * FROM `regulation` WHERE `id` = '".$row->regulation_id."' ");
   $data = $object_three->Row();


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
                        Details of Business Regulations
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">Details of Business Regulations</a></li>

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
            <section class="creote-contact-box">
               <div class="row">
                  <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
                     <div class="contact_box_content style_one">
                        <div class="contact_box_inner icon_yes ">


                           <h4><a href="reg_details?id=<?php  echo base64_encode($row->regulation_id) ?>"><?php echo $getDetails[1];?></a></h4>
                           <p><?php echo $row->details;?></p>
                           <span  style="font-size: 15px"; align="justify"><b style="color:red;">Subject</b> : <?php 

                           $object_two->Query("SELECT `name` FROM `subject` WHERE `id` = '".$data->subject_id."' ");

                           if($object_two->RowCount() > 0){

                              echo $object_two->Row()->name;
                           }



                           ?>&nbsp;&nbsp; <!-- <b style="color:red;">Sector</b> : --> <?php 

                           $object->Query("SELECT `interest_name` FROM `interest` WHERE `int_id` = '".$data->sector_id."' ");

                           if($object->RowCount() > 0){

//echo $object->Row()->interest_name;
                           }



                        ?></span>

                     </div>
                  </div>

                  <div class="contact_box_content style_one" style="margin-top:40px">
                     <div class="contact_box_inner icon_yes ">


                        <h4>Procedure to Follow</h4>
                        <?php 
                        $object->Query("SELECT * FROM procedures WHERE regulation_id ='".$row->regulation_id."'"); $wro = $object->Row();

                        if(!empty($wro->regulation_id)){ ?>
                           <br>
                           <span style="font-size: 16px;" align="left"><?php echo $wro->procedure_text;?>...</span>
                        <?php }else{ ?>
                           <br>

                           <p style="color:red">Not Avaiable</p>
                        <?php } ?>

                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="price_plan_box style_one ">
                     <div class="inner_box">
                        <div class="top">
                           <h5>Responsible Institution</h5>

                        </div>
                        <div class="mid">

                           <p style="margin-top: -30px"><?php  $adQ = $conn->query("select * from org AS O ,regulation AS R where R.id = '$row->regulation_id' AND org_id = R.agency_id "); $adR = $adQ->fetch_object();  ?>
                           <br><span style="font-size: 16px;" align="left"><a href="reg_law_institution?org_id=<?php echo base64_encode($adR->org_id); ?>"> <?php echo $adR->org_name; ?></a> </span>
                        </p>
                        <p><?php echo $adR->org_location; ?></p>
                     </div>
                     <div class="bottom">
                        <ul>


                           <li style="font-size: small;">
                              <span ><b>Email:</b> <?php echo $adR->org_email; ?> </span>
                              <i class="fa fa-envelope"></i>
                           </li>
                           <li style="font-size: small;"> <a href="<?php echo $adR->org_website; ?>" target="_blank">
                              <span><b>Website:</b> <?php echo $adR->org_website; ?></span>
                              <i class="fa fa-globe"></i></a>
                           </li>
                           <li style="font-size: small;">
                              <span><b>GPS:</b> <?php echo $adR->org_gps; ?></span>
                              <i class="fa fa-map-marker"></i>
                           </li>
                           <li style="font-size: small;">
                              <span><b>Telephone:</b> <?php echo $adR->org_tel; ?></span>
                              <i class="fa fa-mobile"></i>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="price_plan_box style_one " style="margin-top:40px">
                  <div class="inner_box">
                     <div class="top">
                        <h5>Relevant Forms to Download</h5>

                     </div>
                     <div class="mid">
                      <?php $security->Query("SELECT * FROM `forms` WHERE `regulations_id` = '".$data->id."' LIMIT 3 "); 
                                                if($security->RowCount()> 0){
                                                    while(!$security->EndOfSeek()){

                                                        $r = $security->Row();
                                                 ?>
                                                 <div class="container">
                                                    
                                                     <p style="text-align: left;text-transform: capitalize;margin-top:10px"><i class="fa fa-download"></i> <a href="acc/registry/<?php echo $r->document; ?>" style="color:green" target="_blank"><?php echo substr(strtolower($r->title),0,30).' ...';?></a></p>
                                               
                                                    
                                                 </div>
                                                    
                                                
                                                <?php }

                                                 }else{ ?>
                                                    <br>
                                     <p style="color:red">Not Available</p>
                                                <?php } ?>
               </div>
            </div>
         </div>

            <div class="price_plan_box style_one " style="margin-top:40px">
               <div class="inner_box">
                  <div class="top">
                     <h5>Online System</h5>

                  </div>
                  <div class="mid">
 <?php $security->Query("SELECT * FROM `org` WHERE `org_id` = '".$data->agency_id."' "); 

                                                if($security->RowCount() > 0){

                                                    $orgData = $security->Row();


                                                    if(empty($orgData->websystem)){ ?>
                                                    <br>
                                                        <p style="color:red;">Link Unavailable</p>
                                                   <?php }else{ ?>
                                                    <br>
                                                    <a target="_black" style="background-color: green;border-color: green;color: white;float: center;" class="btn btn-success" href="<?php echo $orgData->websystem; ?>">Link to Portal</a>
                                                   <?php }


                                                }else{ ?>
                                                <br>
                                                    <p style="color:red;">Link Unavailable</p>
                                                 <?php   }?>
               </div>
                
            </div>
         </div>

         <div class="price_plan_box style_one " style="margin-top:40px;margin-bottom: 40px;">
            <div class="inner_box">
               <div class="top">
                  <h5>Fees/ charges</h5>

               </div>
               <div class="mid">

                      <?php if(!empty($row->fee)){ ?>
                                       <p style="text-align: left;text-transform: capitalize; font-size: 17px;"><?php echo 'GHC '.number_format($row->fee);?></p>
                                   <?php }else{ ?>
                                       <br>
                                       
                                       
                                       <p style="color:red;" >Not Avaiable</p>
                                   <?php } ?>
            </div>
             
         </div>
      </div>

   </div>
</div>
</div>
</section>

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

<script>
   $(document).ready(function() {
      $('#example').DataTable();
   } );
</script>
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>