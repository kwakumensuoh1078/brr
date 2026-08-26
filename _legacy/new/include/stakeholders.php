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
                      Stakeholders
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="breadcrumbs creote">
                     <ul class="breadcrumb m-auto">
                        <li><a href="index">Home</a></li>
                        <li><a href="#">      Stakeholders </a></li>

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
                           <div class="table-responsive">

                           <table id="example" class="display" style="width:100%">
                              <thead>
                                 <tr>
                                    <th>No.</th>
                                    <th>Organization</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php
                                 $counter=0;
                                 $security->Query("select * from org order by org_name asc");
                                 while (!$security->EndOfSeek())
                                 {
                                    $row = $security->Row();
                                    $counter +=1;
                                    ?>
                                    <tr style="text-align: left;">
                                       <td><?php echo $counter; ?></td>
                                       <td width='300'><?php echo $row->org_name; ?></td>
                                       <td><?php echo $row->org_email; ?></td>
                                       <td><?php echo $row->org_tel; ?></td>
                                       <td> <?php echo make_links_clickable( $row->org_website); ?></td>
                                    </tr>
                                 <?php }?>
                              </tbody> 
                           </table>

                        </div>

                     


                  </section>

                   
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

   <script type="text/javascript" src=" https://code.jquery.com/jquery-3.3.1.js"></script>
         <script type="text/javascript" src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

         <script>
            $(document).ready(function() {
               $('#example').DataTable();
            } );
         </script>
         <?php
                function make_links_clickable($text){
                    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
                }
            ?>


      <!-- Mirrored from jogjafile.com/html/clava/sidebar-right.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 19:03:57 GMT -->
      </html>

      <script>
     <script>
            $(document).ready(function() {
               $('#example').DataTable();
               } );
           </script>
         <script>
               $(document).ready(function(){
                 $('#keyword').keyup(function(){
                    search_table($(this).val());

                 });
                 function search_table(value){
                    $('#myTable tr').each(function(){
                        var found ='false';
                        $(this).each(function(){
                            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                            {
                                found = 'true';
                            }
                        });
                        if(found == 'true')
                        {
                            $(this).show();
                        }
                        else
                        {
                            $(this).hide();
                        }
                    });
                 }
               });
            </script>

</body>

<!-- Mirrored from themepanthers.com/html/creote-html/home-14.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Nov 2024 20:45:49 GMT -->
</html>