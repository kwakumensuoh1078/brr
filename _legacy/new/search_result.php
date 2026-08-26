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
                             E-Registry
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="breadcrumbs creote">
                           <ul class="breadcrumb m-auto">
                              <li><a href="index-2.html">Home</a></li>
                              <li><a href="blog.html">Search Results</a></li>
                              
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
                              <?php 
                                     if(isset($_GET['search'])) {
                                        $search = $conn->escape_string($_GET['search']);
                                        $query = $conn->query("SELECT  DISTINCT `reg_id` FROM `regulations_key_words` WHERE `key_word` LIKE '%".$search."%'  ");


                                        ?>
                                         <h4 style="text-align: center;">
                                          Found <?php echo $query->num_rows;

                                          if($query->num_rows <= 0){

                                            $valuesArray['search_text'] = MySQL::SQLValue($search);
                                            $valuesArray['created_by'] = MySQL::SQLValue(Date('Y-m-d'));
                                            
                                            $table = "ssearch_result_error";
                                            $sql=MySQL::BuildSQLInsert($table,$valuesArray);
                                            $object->Query($sql);


                                            }



                                          ?> result(s).
                                         </h4>
                     
                           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <section class="faq_section type_two">
                                 <div class="block_faq">
                                    <div class="accordion">
                                        <?php if($query->num_rows){ while($r = $query->fetch_object()){


                                        $query2 = $conn->query("SELECT * FROM `regulation` WHERE `id` = '".$r->reg_id."' ");

                                         $data = $query2->fetch_object();

                                         $query3 = $conn->query("SELECT * FROM `reg_clauses` WHERE `regulation_id` = '".$r->reg_id."' ");

                                         $data2 = $query3->fetch_object();




                                       ?>
                                       <dl>
                                          <dt class="faq_header active">
                                            <a href="search_detail.php?indexes_id=<?php echo base64_encode($data2->indexes_id).'~'.$data->title.'~'.$data->subject_id.'~'.$data->sector_id; ?>"><?php echo $data->title; ?>.</a><span class="icon-check"><input type="hidden" name="indexes_id" id="indexes_id" value="<?php echo $data2->indexes_id;?>"> <input type="hidden" name="title" id="title" value="<?php echo $data->title;?>"></span>
                                          </dt>
                                          <dd class="accordion-content hide" style="display:block;">
                                             <p style="font-size: small;">
                                                <?php echo substr(strip_tags($data2->details), 0, 300).'...';?>            
                                             </p>
                                             <p style="font-size:13px"><b style="color:red;">Subject</b> : <?php 

                                                    $object->Query("SELECT `name` FROM `subject` WHERE `id` = '".$data->subject_id."' ");

                                                    if($object->RowCount() > 0){

                                                        echo $object->Row()->name;
                                                    }



                                                     ?>&nbsp;&nbsp; <!-- <b style="color:red;">Sector</b> : --> <?php 

                                                    $object->Query("SELECT `interest_name` FROM `interest` WHERE `int_id` = '".$data->sector_id."' ");

                                                    if($object->RowCount() > 0){

                                                        //echo $object->Row()->interest_name;
                                                    }



                                                     ?>
                                                     
                                                     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b style="color:red">Institution :</b> &nbsp; <?php $object->Query("SELECT * FROM org WHERE org_id = '".$data->agency_id."'"); $pro = $object->Row(); echo $pro->org_name?>
                                                     
                                                     </p>
                                          </dd>
                                           
                                       </dl>
                                    <?php }}}?>
                                         
                                    </div>
                                 </div>
                              </section>
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