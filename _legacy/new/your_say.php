<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$search = new MySQL();
$pageName = "Reforms";
require_once 'session.php';

 
 

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
                             Have your say
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="index">Home</a></li>
                              <li><a href="#">  Have your say</a></li>
                              
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
                  <div id="primary" class="content-area service col-lg-9 col-md-12 col-sm-12 col-xs-12">
                     <main id="main" class="site-main" role="main">
                        <!--===============spacing==============-->
                        <div class="pd_top_90"></div>
                        <!--===============spacing==============-->
                           <img src="assets/images/haveyour-say.png" alt="Have Your Say" style="width:580px;height:100px;">
                        <section class="blog_single_details_outer">
                           <div class="single_content_upper">

                              
                           </div>
                              <p  style="font-size: 16px;" align="justify"> Have you experienced any public service that requires reform? 
                        Are Government rules and regulations hindering your business? Kindly use the form below to submit your suggestion.<br>
                        The Business Regulatory Reforms (BRR) Programme welcomes your feedback. We will work with the government agencies to systematically 
                        implement the necessary reforms and ensure businesses are able to keep pace with change and new requirements.

                     </p> 
                        <div>
                        <p align="center" style="display: none; color: limegreen;" id="wait"><img src="assets/images/spinner.gif" > Loading. Please wait....</p>
                     </div>
                     <div id="ack" align="center"></div><br>
                     <form method="post" id="complaintForm" autocomplete="off" style="margin-bottom:30px">

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label"><strong>Surname</strong></label>
                                 <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter Your Surname">
                                 <span id="surnameerror"></span>
                              </div>

                              <div class="form-group">
                                 <label class="control-label"><strong>First Name</strong></label>
                                 <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter Your First Name">
                                 <span id="fNameerror"></span>
                              </div>

                              <div class="form-group">
                                 <label class="control-label"><strong>Telephone</strong></label>
                                 <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter Your Phone Number">
                                 <span id="telerror"></span>
                              </div>

                              <div class="form-group">
                                 <label class="control-label"><strong> Email Address</strong></label>
                                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address">
                                 <span id="emailerror"></span>
                              </div>
                              
                                 <div class="form-group">
                                 <label class="control-label"><strong>Select Your Country</strong></label>
                                 <select class="form-control" id="country" name="country" required="true">
                                     <?php $security->Query("SELECT * FROM countries WHERE countries_iso_code_2='GH'");while(!$security->EndOfSeek()){ $dro = $security->Row();?>
                                    <option value="<?php echo $dro->countries_id; ?>"><?php echo $dro->countries_name; ?></option>
                                    <?php }?>
                                    <?php $object->Query("select * from countries order by countries_name ASC"); while(!$object->EndOfSeek()){ $countyRow = $object->Row(); ?>
                                       <option value="<?php echo $countyRow->countries_id; ?>"><?php echo $countyRow->countries_name; ?></option>
                                    <?php } ?>
                                 </select>
                                 <span id="countryerror"></span>
                              </div>

                           
                           </div>

                           <div class="col-md-6">


                              <div class="form-group">
                                 <label class="control-label"><strong> Select Reform Type</strong></label>
                                 <select class="form-control" id="complainttype" name="complainttype" required="true">
                                    <option value="" selected disabled>Pease Select Complaint Type</option>
                                    <?php $object->Query("select * from consultation_type order by name ASC"); while(!$object->EndOfSeek()){ $consRow = $object->Row(); ?>
                                       <option value="<?php echo $consRow->id; ?>"><?php echo $consRow->name; ?></option>
                                    <?php } ?>
                                 </select>
                                 <span id="complainttypeerror"></span>
                              </div>

                              <div class="form-group">
                                 <label class="control-label"><strong>Please Select Sector</strong></label>
                                 <select class="form-control" id="sector" name="sector" required="true">
                                    <option value="" selected disabled>Pease Select Sector</option>
                                    <?php $object->Query("select * from interest order by interest_name ASC"); while(!$object->EndOfSeek()){ $intRow = $object->Row(); ?>
                                       <option value="<?php echo $intRow->int_id; ?>"><?php echo $intRow->interest_name; ?></option>
                                    <?php } ?>
                                 </select>
                                 <span id="sectorerror"></span>
                              </div>
                              
                               <div class="form-group">
                                 <label class="control-label"><strong>Name of Institution Concerned</strong></label>
                                 <input type="text" class="form-control" id="comapanyname" name="comapanyname" placeholder="Enter the Institution where you had such experience">
                                 <span id="companynameerror"></span>
                              </div>
                              
                              
                              <div class="form-group">
                                 <label class="control-label"><strong>Complaint Title</strong></label>
                                 <input type="text" class="form-control" id="complaintsubject" name="complaintsubject" placeholder="Enter the Title of your concern(s) ">
                                 <span id="complaintsubjecterror"></span>
                              </div>

                              <div class="form-group">
                                 <label class="control-label"><strong>Your Comments</strong></label>
                                 <textarea row="3" class="form-control" id="description" name="description" placeholder="Briefly describe your experience / concerns / complaint"></textarea>
                                 <span id="descriptionerror"></span>
                              </div>

                           </div>

                           <input type="hidden" name="sendEnquiry" value="do">

                           <div class="col-sm-12">
                              <button class="btn btn-danger" id="sendEnquiry">Send Your Concerns</button>
                           </div>

                        </div>
                     </form>

                        </section>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_70"></div>
                        <!--===============spacing==============-->
                     </main>
                  </div>
                  <aside id="secondary" class="widget-area all_side_bar col-lg-3 col-md-12 col-sm-12">
                     <div class="side_bar">
                        <!--===============spacing==============-->
                        <div class="pd_top_40"></div>
                        <!--===============spacing==============-->
                    
                        <div class="widgets_grid_box">
                           
                           <div class="about_authour_widget">
                              <h3>Hi Citizen!, let's  hear from you</h3>
                              <img src="assets/images/yoursay.jpg" alt="authourimage">
                              <p>Have you experienced any public service that requires reform?  </p>
                              <a href="your_say">Have your say</a>
                           </div>
                        </div>
                      
              
                     </div>
                  </aside>
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
            function validateEmail(sEmail) {
               var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
               if (filter.test(sEmail)) {
                  return true;
               }
               else {
                  return false;
               }
            }
         </script>
         <script>
            $(document).on("click", "#sendEnquiry", function(e){
               e.preventDefault();

               $("#surnameerror").empty();
               $("#fNameerror").empty();
               $("#emailerror").empty();
               $("#telerror").empty();
               $("#complainttypeerror").empty();
               $("#complaintsubjecterror").empty();
               $("#sectorerror").empty();
               $("#descriptionerror").empty();

               var surname = $.trim($("#surname").val());
               var fName = $.trim($("#fName").val());
               var tel = $.trim($("#tel").val());
               var email = $.trim($("#email").val());
               var complainttype = $.trim($("#complainttype").val());
               var complaintsubject = $.trim($("#complaintsubject").val());
               var sector = $.trim($("#sector").val());
               var description = $.trim($("#description").val());

               if(surname.length == 0){
                  $("#surnameerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(fName.length == 0){
                  $("#fNameerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(tel.length == 0){
                  $("#telerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(email.length == 0){
                  $("#emailerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(complainttype.length == 0){
                  $("#complainttypeerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(complaintsubject.length == 0){
                  $("#complaintsubjecterror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(sector.length == 0){
                  $("#sectorerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }
               if(description.length == 0){
                  $("#descriptionerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(surname.length != 0 && fName.length != 0 && tel.length != 0 && email.length != 0 && complainttype.length != 0 && complaintsubject.length != 0 && sector.length != 0 && description.length != 0)
               {
                  $("#wait").css("display", "block");
                  $.ajax({
                     url: "controllers/process_complaint.php",
                     type: "post",
                     data: $("#complaintForm").serialize(),
                     success:function(data){
                        $("#wait").css("display", "none");
                        if(data == "ok"){
                           $("#ack").html('<div align="center"><span class="alert alert-success" style="width:500px;">Your concerns have been submitted successfully. </span></div>');
                           $("#ack").hide().fadeIn(2000).fadeOut(4000);
                           $("html, body").animate({scrollTop:0},"slow");
                           $("#complaintForm")[0].reset();
                        }
                        else if(date == "error"){
                           $("#ack").html('<div align="center"><span class="alert alert-danger" style="width:500px;">Something went wrong. Please try again later. </span></div>');
                           $("#ack").hide().fadeIn(2000).fadeOut(4000);
                           $("html, body").animate({scrollTop:0},"slow");
                        }
                     }
                  })
               }

            });
         </script>
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>