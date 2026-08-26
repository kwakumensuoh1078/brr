<?php 
require_once 'classes/mysql.class.php';
require_once './classes/dbconnect.php';
$object = new MySQL();
$security = new MySQL();
$search = new MySQL();
$pageName = "Reforms";
require_once 'session.php';

 
if(isset($_GET['r']) && !empty($_GET['r']))
{   
   $conID = base64_decode($_GET['r']);
   $object->Query("select * from consultation_details where id = '$conID' ");
   $cRow = $object->Row();
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
               <div class="simpleParallax"><img src="assets/images/slider_03.jpg" alt="bg_image"
                     class="img-fluid"></div>
            </div>
            <div class="page_header_content">
               <div class="auto-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="banner_title_inner">
                           <div class="title_page">
                             Response to Public Consultations on
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="index">Home</a></li>
                              <li><a href="#">Response</a></li>
                              
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
                  <div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
                     <main id="main" class="site-main" role="main">
                        <!--===============spacing==============-->
                        <div class="pd_top_90"></div>
                        <!--===============spacing==============-->
                        <section class="blog_single_details_outer">
                           <div class="single_content_upper">
                               
                              <!--===============spacing==============-->
                              <div class="pd_bottom_20"></div>
                              <!--===============spacing==============-->
                              <div class="post_single_content">
                                 <h5><?php echo $cRow->topic; ?></h5>
                                 <!--===============spacing==============-->
                                 <div class="pd_bottom_15"></div>
                                 <!--===============spacing==============-->
                                 <div class="description_box">
                                   <?php if($cRow->access_type != "yes"){ ?>
                                 <div class="note note-info">
                                    <p style="font-size: 16px; color:black;">
                                       <strong>Sorry this consultation is not open to the public</strong>
                                    </p>
                                 </div>
                              <?php }else{ ?>
                                 <?php if($cRow->status == "Pending"){ ?>
                                    <div class="note note-info">
                                       <p style="font-size: 16px; color:black;">
                                          <strong>Sorry this consultation is not yet Active</strong>
                                       </p>
                                    </div>
                                 <?php }else if($cRow->status == "Closed"){ ?>
                                    <div class="note note-info">
                                       <p style="font-size: 16px; color:black;">
                                          <strong>Sorry this consultation is Closed</strong>
                                       </p>
                                    </div>
                                 <?php }else{ ?>



                                    <p> <h7>Kindly fill the form below to share your much-needed opinion/comments on the proposed public regulation/policy to help improve upon its current state.</h7></p>
                                    <br>
                                    <p>
                                       <form method="post" id="form">
                                          <div>
                                             <p align="center" style="display: none; color: limegreen;" id="resp_wait"><img src="assets/images/spinner.gif" > Loading. Please wait....</p>
                                          </div>
                                          <div id="response" align="center"></div>

                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label"><strong>Full Name</strong></label>
                                                   <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter Fullname">
                                                   <span id="fullnameerror"></span>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label"><strong>Comments</strong></label>
                                                   <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="Enter your comments"></textarea>
                                                   <span id="commentserror"></span>
                                                </div>

                                                <div class="form-group">
                                                   <label class="control-label"><strong>Claim of Confidentiality</strong></label>
                                                   <select class="form-control" name="confidentiality" id="confidentiality">
                                                      <option value="" selected disabled>Select Confidentiality</option>
                                                      <option value="yes">Yes</option>
                                                      <option value="no">No</option>
                                                   </select>
                                                   <span id="confidentialityerror"></span>
                                                </div>
                                             </div>

                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <label class="control-label"><strong>Email Address</strong></label>
                                                   <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                                   <span id="emailerror"></span>
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label"><strong>Other Comments</strong></label>
                                                   <textarea class="form-control" name="othercomments" id="othercomments" rows="5" placeholder="Enter your other comments"></textarea>
                                                   <span id="othercommentserror"></span>
                                                </div>

                                                <div class="form-group">
                                                   <label class="control-label"><strong>Attachment </strong></label>
                                                   <input type="file" class="form-control" name="file[]" id="file" multiple>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="margin-top-10">
                                             <button class="btn btn-danger" id="respond" > Submit Your Response </button>
                                          </div>

                                          <input type="hidden" name="respondNow" value="do">
                                          <input type="hidden" name="consultID" id="consultID" value="<?php echo $conID; ?>">
                                          <input type="hidden" name="posted_by" id="posted_by" value="<?php echo $cRow->posted_by; ?>">
                                          <input type="hidden" name="getFile" id="docUpload" value="">
                                          <input type="hidden" name="ConsName" id="consName" value="<?php echo $cRow->topic;?>">

                                       </form>
                                    </p>

                                 <?php } }?>
                                 
                                 </div><br/><br/>

                                 <div class="quotes_box style_one">
                                    <div class="icon">
                                       <img src="assets/images/quotes.png" class="svg_image" alt="icon png">
                                    </div>
                                    <div class="content">
                                       <h6>Guidelines</h6>
                                       <p style="font-size: 16px;">
                              We request that you observe these guidelines when sharing your comments:  <br>
                           <b> a)</b>   Please identify yourself as well as the organisation you represent (if any) so that we may follow up with you to clarify your comments, if necessary.<br>
                                       <b>  b)</b> Be clear and concise in your comments.<br>
                                       <b>  c) </b>Provide constructive feedback on how this Policy Document can be improved to facilitate implementation.

                              </p>
                                    </div>
                                 </div>
                                 
                                 
                                  
                              </div>
                           </div>
                 
                        </section>
                        <!--===============spacing==============-->
                        <div class="pd_bottom_70"></div>
                        <!--===============spacing==============-->
                     </main>
                  </div>
                  <aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">
                     <div class="side_bar">
                        <!--===============spacing==============-->
                        <div class="pd_top_90"></div>
                        <!--===============spacing==============-->
                    
                        <div class="widgets_grid_box">
                           
                           <div class="about_authour_widget">
                              <h3>Hi! Send your response</h3>
                              <img src="assets/images/authour-image-wdts.jpg" alt="authourimage">
                              <p>Kindly send your response on <?php echo $cRow->topic; ?>.</p>
                              <a href="respond?r=<?php echo base64_encode($cRow->id); ?>">All My Response</a>
                           </div>
                        </div>
                      
              
                       
                        <!--===============spacing==============-->
                        <div class="pd_bottom_70"></div>
                        <!--===============spacing==============-->
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
      $(document).on("click", "#respond", function(e){
         e.preventDefault();
         var number = 1 + Math.floor(Math.random() * 600);
         $("#commentserror").empty();
         $("#confidentialityerror").empty();
         $("#fullnameerror").empty();
         $("#emailerror").empty();

         var comments = $.trim($("#comments").val());
         var confidentiality = $.trim($("#confidentiality").val());
         var fullname = $.trim($("#fullname").val());
         var email = $.trim($("#email").val());

         if(comments.length == 0){
            $("#commentserror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
         }

         if(confidentiality.length == 0){
            $("#confidentialityerror").html('<p><small style="color:red;">field cannot be left empty.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
         }

         if(fullname.length == 0 ){
            $("#fullnameerror").html('<p><small style="color:red;">field can not be empty</small></p>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
         }
         if(email.length == 0 ){
            $("#emailerror").html('<p><small style="color:red;">field can not be empty</small></p>');
            $("html, body").animate({ scrollTop: 0 }, "slow");
         }
         if(comments.length != 0 && confidentiality.length != 0 && fullname.length != 0 && email.length !=0){
            var myFile = '';
            if($("#file").val() !== ''){
               var form_data = new FormData();
               var ins = document.getElementById('file').files.length;
               for (var x = 0; x < ins; x++) {
                  form_data.append("files[]", document.getElementById('file').files[x]);
               }
               form_data.append('name', number);
               $.ajax({
url: 'acc/consultation/file_uploader1.php', // point to server-side PHP script 
cache: false,
contentType: false,
processData: false,
data: form_data,
type: 'post',
success: function (response) { 
   if(response == "error1"){
      $("#response").html('<p class="alert alert-danger" align="center" style="width:500px;">File already exists</p>');
      $("html, body").animate({scrollTop:0},"slow");
   } else if(response == "error2"){
      $("#response").html('<p class="alert alert-danger" align="center" style="width:500px;"> File already exists.</p>');
      $("html, body").animate({scrollTop:0},"slow");
   }
   else{
      myFile = response;
      $('#docUpload').val(response);

//$("#respond").attr("disabled","disabled");
//$("#s_wait").css("display","block");
      var form = $("#form").serialize();
      $.ajax({
         type:"POST",
         url:"acc/consultation/frontendreply.php",
         data:form,
         success:function(data){
            console.log(data);
//$("#respond").removeAttr("disabled","disabled");
            $("#resp_wait").css("display","none");
            if(data === "ok"){
               $("#thanksMsg").html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-info"></i> Success</h4><strong> Response saved successfully. </strong></div>');
               $("#form")[0].reset();
               $("html, body").animate({scrollTop:0},"slow");
               $("#response").hide().fadeIn(1000).fadeOut(4000);
            }
            else if(data === "exist"){
               $("#thanksMsg").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Success</h4><strong> You have already submitted your response on this consultation </strong></div>');
               $("#form")[0].reset();
               $("html, body").animate({scrollTop:0},"slow");
               $("#response").hide().fadeIn(1000).fadeOut(4000);
            }
            else if(data === "error"){
               $("#response").html('<p class="alert alert-danger" align="center" style="width:500px;">Error Occured. Please try again later.</p>');
               $("html, body").animate({scrollTop:0},"slow");
               $("#response").hide().fadeIn(1000).fadeOut(4000);
            }
         }
      });
   }

}

});

            }
            else{

//$("#respond").attr("disabled","disabled");
//$("#wait").css("display","block");
               var form = $("#form").serialize();
               $.ajax({
                  type:"POST",
                  url:"acc/consultation/frontendreply.php",
                  data:form,
                  success:function(data){
                     console.log(data);
//$("#respond").removeAttr("disabled","disabled");
                     $("#resp_wait").css("display","none");
                     if(data === "ok"){
                        $("#thanksMsg").html('<div class="alert alert-success alert-dismissible"><h4><i class="icon fa fa-info"></i> Success</h4><strong> Response saved successfully. </strong></div>');
                        $("#form")[0].reset();
                        $("html, body").animate({scrollTop:0},"slow");
                        $("#response").hide().fadeIn(1000).fadeOut(4000);
                     }
                     else if(data === "exist"){
                        $("#thanksMsg").html('<div class="alert alert-info alert-dismissible"><h4><i class="icon fa fa-info"></i> Success</h4><strong> You have already submitted your response on this consultation </strong></div>');
                        $("#form")[0].reset();
                        $("html, body").animate({scrollTop:0},"slow");
                        $("#response").hide().fadeIn(1000).fadeOut(4000);
                     }
                     else if(data === "error"){
                        $("#response").html('<p class="alert alert-danger" align="center" style="width:500px;">Error Occured. Please try again later.</p>');
                        $("html, body").animate({scrollTop:0},"slow");
                        $("#response").hide().fadeIn(1000).fadeOut(4000);
                     }
                  }
               });
            }

         }


      });

   </script>

   <script>
      $(document).on('click', '#modal', function(e){
         e.preventDefault();
         var ConsultantID = $(this).data('id');
         $('#ConsultantID').val(ConsultantID);
      })
   </script>
</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>