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
                        Contact us
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">      Contact </a></li>

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
            <div id="primary" class="content-area service col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <main id="main" class="site-main" role="main">
                  <!--===============spacing==============-->
                  <div class="pd_top_90"></div>
                  <!--===============spacing==============-->

                  <section class="blog_single_details_outer">

                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="maps" style="margin-bottom:20px">
                           <div id="clav_maps">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.115799788152!2d-0.20010908543874295!3d5.549846035255101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf90904264d5c7%3A0xd1ebb7f8931a4599!2sMinistry+of+Trade+and+Industry!5e0!3m2!1sen!2sgh!4v1491370888275" width="900" height="400" frameborder="0" style="border:0" ></iframe><br/>

                           </div>
                        </div>
                     </div>


                  </section>

                  <div class="row">

                     <div class="col-lg-7">
                        <div class="dividerLatest">
                           <h4>Get in Touch</h4>
                           <div class="gDot"></div>
                        </div>

                        <!-- BEGIN FORM-->
                        <div>
                           <p align="center" style="display: none; color: limegreen;" id="wait"><img src="assets/img/spinner.gif" > Loading. Please wait....</p>
                        </div>
                        <div id="ack" align="center"></div><br>

                        <form method="post" id="contactForm" role="form">
                           <div class="form-group">
                              <label for="contacts-name">Name</label>
                              <input type="text" class="form-control" name="contacts_name" id="contacts_name">
                              <span id="contacts_nameerror"></span>
                           </div>
                           <div class="form-group">
                              <label for="contacts-email">Email</label>
                              <input type="email" class="form-control" name="contacts_email" id="contacts_email">
                              <span id="contacts_emailerror"></span>
                           </div>

                           <div class="form-group">
                              <label for="contacts-email">Telephone number</label>
                              <input type="number" class="form-control" name="phonenumber" id="phonenumber">
                              <span id="phonenumbererror"></span>
                           </div>
                           <div class="form-group">
                              <label for="contacts-message">Message</label>
                              <textarea class="form-control" rows="5" name="contacts_message" id="contacts_message"></textarea>
                              <span id="contacts_messageerror"></span>
                           </div>
                           <button class="btn btn-success" id="sendMessage"><i class="icon-ok"></i> Submit Your Comment</button>
                           <button id="cancelbtn" class="btn btn-danger">Cancel</button>

                           <input type="hidden" name="contactUs" value="do">
                        </form>
                        <!-- END FORM-->

                     </div>

                     <div class="col-lg-5">

                                  <div class="title_all_box style_one dark_color">
                           <div class="title_sections left">
                             
                              
                              <p> Business Regulatory Reform Programme</p>
                           </div>
                        </div>

                        <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class=" fa fa-globe"></span>
                              </div>
                              <div class="contnet">
                                 <h3>Website</h3>
                                 <p>
                                   <a href="https://www.brr.gov.gh"> www.brr.gov.gh</a>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class="icon-phone-call"></span>
                              </div>
                              <div class="contnet">
                                 <h3> General Enquires </h3>
                                 <p>
                                    Phone:  (+233) 302 686-528  
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_15"></div>
                        <!--===============spacing==============-->
                        <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class="fa fa-envelope"></span>
                              </div>
                              <div class="contnet">
                                 <h3> Email </h3>
                                 <p>
                                   brr@moti.gov.gh
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_40"></div>
                        <!--===============spacing==============-->
                          <div class="contact_box_content style_one">
                           <div class="contact_box_inner icon_yes">
                              <div class="icon_bx">
                                 <span class="fa fa-map-marker"></span>
                              </div>
                              <div class="contnet">
                                 <h3> Address </h3>
                                 <p>
                                  Ministry of Trade & Industry, Ministries, Accra - Ghana, GPS Address: GA-144-0150
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                        
                     </div>

                  </div>
                  <!--===============spacing==============-->
                  <div class="pd_bottom_70"></div>
                  <!--===============spacing==============-->
               </main>
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


   <script> 
            $(document).on("click", "#cancelbtn", function(e){
               e.preventDefault();
               $("#contacts_name").val("");
               $("#contacts_email").val("");
               $("#contacts_message").val("");
            });
         </script>

         <script> 
            $(document).on("click", "#sendMessage", function(e){
               e.preventDefault();
               $("#contacts_nameerror").empty();
               $("#contacts_emailerror").empty();
               $("#contacts_messageerror").empty();
               $("#phonenumbererror").empty();

               var contacts_name = $.trim($("#contacts_name").val());
               var contacts_email = $.trim($("#contacts_email").val());
               var contacts_message = $.trim($("#contacts_message").val());
               var phonenumber = $.trim($("#phonenumber").val());

               if(contacts_name.length == 0){
                  $("#contacts_nameerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(validateEmail(contacts_email) === false) {

                  $("#contacts_emailerror").html('<p><small style="color:red;">Please enter a valid email.</small><p/>');
                  $("html, body").animate({scrollTop: 0}, "slow");
               }

               if(contacts_message.length == 0){
                  $("#contacts_messageerror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(phonenumber.length == 0){
                  $("#phonenumbererror").html('<p><small style="color:red">field can not be empty</small></p>');
                  $("html, body").animate({scrollTop:0}, "slow");
               }

               if(contacts_name.length != 0 && validateEmail(contacts_email) === true && contacts_message.length != 0 && phonenumber.length != 0)
               {
                  $("#wait").css("display","block");
                  $.ajax({
                     url: "controllers/contact.php", 
                     type: "post", 
                     data: $("#contactForm").serialize(),
                     success:function(data){
                        $("#wait").css("display", "none");

                        if(data == "error"){
                           $("#ack").html('<div align="center"><span class="alert alert-danger" style="width:500px;">Something went wrong. Please try again later. </span></div>');
                           $("#ack").hide().fadeIn(2000).fadeOut(4000);
                           $("html, body").animate({scrollTop:0},"slow");
                        }
                        else{
                           $('#ack').html('<div align="center"><span class="alert alert-success">Message sent successfully </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                                 setInterval(function(){
                                     $("#contactForm")[0].reset();
                                     location="contact-message-display.php";
                                 },2000);
                             });
                        }
                     }
                  })

               }

            });
         </script>

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
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>