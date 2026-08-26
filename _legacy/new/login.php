<?php 
require_once 'classes/mysql.class.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Login";
include "session.php";

if(isset($_SESSION['BCP_fullname'])){
  header("Location: acc/inc/dashboard.php");
}else{
  
}

$security = new MySQL();
$security1 = new MySQL();
$object = new MySQL();
$search = new MySQL();

 
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
<!--===============PAGE CONTENT==============
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
                        Business Regulations By Enactment Year
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">Business Regulations By Enactment year </a></li>

                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   -->
   <div id="content" class="site-content ">
      <div class="auto-container">
         <div class="row default_row">
             <hr>
            <div id="primary" class="content-area  col-lg-6 col-md-12 col-sm-12 col-xs-12">
             <p>    <br><br>
                <img src="assets/images/login-img.jpg">
                </p>
            </div>
            <div class="col-md-6"><br><br><br><br>
            
                 <div>
                  <p align="center" style="display: none; color: limegreen;" id="wait"><img src="assets/images/spinner.gif" > Loading. Please wait....</p>
                </div>
                <div id="ack" align="center"></div>
              <!-- BEGIN FORM-->
              <form method="post" style="border:1px solid green;  padding:30px; background-color: ##efefef; width: 400px;" id="login_form" autocomplete="off">
                <!-- notification  -->
                <div>
                  <p align="center" style="display: none; color: limegreen;" id="wait">
                      <h5>Login to Your Account</h5>
                      
                      
                  </p>
                  <p> </p>
                </div>
                <div id="ack" align="center"></div>
                 <!-- /notification -->

                <p> Please provide your assigned login credentials in the boxes below</p>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="true"/>
                  <span id="emailerror"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                  <span id="passworderror"></span>
                </div>
                  
                  <button class="btn btn-primary" name="login" id="log_me_in">Login</button>
                  <a href="password_reset" class="btn btn-primary">Reset Password</a>
                  <br>
                  <hr>
                  <p>
                      Are you new on our platform? <a href="register"> Register Now</a>
                      
                  </p>
              </form>
              
              
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

</html>