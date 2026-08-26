
<?php 
include ('include/header.html');
include ('include/menu.html');
include('classes/mysql.class.php');
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Upcoming Consultations";
include "session.php";

$object->Query("select * from consultation_details where status != 'Closed' ORDER BY id DESC ");
$rowCount = $object->RowCount();
?>
         <!----header end----->
            <div class="page_header_default style_one ">
               <div class="parallax_cover">
                  <div class="simpleParallax"><img src="assets/images/page-header-default.jpg" alt="bg_image" class="cover-parallax"></div>
               </div>
               <div class="page_header_content">
                  <div class="auto-container">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="banner_title_inner">
                              <div class="title_page">
                                 Consultations
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12">
                           <div class="breadcrumbs creote">
                              <ul class="breadcrumb m-auto">
                                 <li><a href="index-2.html">Home</a></li>
                                 <li class="active">On-going Public Consultations</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!----header----->
            <!----page-CONTENT----->
            <div id="content" class="site-content ">
               <div class="auto-container">
                  <div class="row default_row">
                     <div id="primary" class="content-area service col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <main id="main" class="site-main" role="main">
                           <!--===============spacing==============-->
                           <div class="pd_top_30"></div>
                           <!--===============spacing==============-->
                           <article class="clearfix service type-service status-publish has-post-thumbnail hentry">
                              <div class="title_all_box style_one dark_color">
                                 <div class="title_sections left">
                                    <div class="title">On-going Public Consultations</div>
                                     <?php if($rowCount > 0){ while(!$object->EndOfSeek()){ $myrow = $object->Row(); ?>

			                            <?php $uid = $myrow->posted_by; $security->Query("select * from officer where id = '$uid'  "); $u_row = $security->Row(); $org_id = $u_row->org_id;
			                  $security->Query("select * from org where org_id = '$org_id'  "); $o_Row = $security->Row(); ?>

			                            <div class="col-md-12 col-sm-12">
			                  <div class="col-md-12">
			                      <div class="title_sections">
			                        
			                            <div class="before_title">
                                        <span class="icon-briefcase icon"></span>
			                             <b><?php echo $o_Row->org_name; ?></b>
			                            </div>
			                        </div>

			                  </div>
			                <!-- title -->
                
                        <div class="row">
                     
                      <div class="col-md-9 before_title">
                        <p align="justify"><b><a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>"><?php echo $myrow->topic; ?></a></b>  | 
                        <i class="fa fa-eye" style="color: #26A368;"></i>
                            <span style="color: #E43621;">
                              <?php
                              $security->Query("Select count(*) as ViewTotal from view_tb where consult_id = '".$myrow->id."' ");
                              $view = $security->Row(); echo $view->ViewTotal; ?> View (s) 
                            </span>
                        
                        </p>
                      </div>
                      <div class="col-md-12">
                        <ul class="list-inline">
                          <li>
                            
                            
                          </li>
                        </ul>
                      </div>
                    </div>
                        <!-- summary of article -->
                        <p align="justify"> <?php echo string_shorten($myrow->summary,800); ?> <a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>">Read More...</a></p>
                        <!-- name of institution -->


                        <!-- CALCULATE DAYS LEFT -->
                        <?php $sesia = strtotime(date("Y-m-d")); $end_me = strtotime($myrow->end_date); $end_me_datediff = $end_me - $sesia;?>
               
                        <!-- duration -->
                        <div class="col-md-3 col-sm-3">
                <?php if($myrow->status == "Closed"){ ?>
                <a href="javascript:;" class="btn btn-primary" style="text-align: center; width: 100%;" >ClOSED</a>
                <?php }else if($myrow->status == "Pending"){ ?>
                <a href="javascript:;" class="btn btn-info" style="text-align: center; width: 100%;" ><?php echo round($end_me_datediff / (60 * 60 * 24)). " Day(s) Left" ?></a>
                  <?php }else if($myrow->status == "Active"){ ?>
                <a href="javascript:;" class="btn btn-success" style="text-align: center; width: 100%;" ><?php echo round($end_me_datediff / (60 * 60 * 24)). " Day(s) Left" ?></a>
                  <?php } ?>
              </div>

                        <strong>Consultations Period: </strong>  <?php $sd = new DateTime($myrow->start_date); echo $sd->format("D F d, Y");?> - <?php $ed = new DateTime($myrow->start_date); echo $ed->format("D F d, Y"); ?> 
               
                
                    </div>

                                        <div class="col-md-12 col-sm-12">
                  <hr height="2" width="90%" align="center">
              </div>
                                            <?php }
                                                }else{ ?>
                                            <div style="margin-top: 60px;">
                                            <div class="note note-info">
                              <p style="font-size: 16px;">
                                All Consultations are Closed.
                              </p>
                          </div>
                        </div>
                                            <?php } ?>
						  
			                        </div>
                              </div>
                              
                           
                           </article>
                           <!--===============spacing==============-->
                           <div class="pd_bottom_25"></div>
                           <!--===============spacing==============-->
                        </main>
                     </div>
                     <aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">
                        <div class="service_siderbar side_bar">
                           <!--===============spacing==============-->
                           <div class="pd_top_45"></div>
                           <!--===============spacing==============-->
                         
                              <div class="widgets_grid_box">
                                 <div class="widget creote_widget_service_list">
                                    <h4 class="widget-title">Our Services</h4>
                                    <ul class="service_list_box">
                                       <li><a href="cur_consult.php">Current Consultations</a> </li>
                                       <li><a href="closed_consult.php">Closed Consultation</a> </li>
                                       <li><a href="#">Risk Management</a> </li>
                                       <li><a href="#">Compliance Audits</a> </li>
                                       <li><a href="#">Employee Relations</a> </li>
                                    </ul>
                                 </div>
                              </div>
                           
                          
                           <!--===============spacing==============-->
                           <div class="pd_bottom_65"></div>
                           <!--===============spacing==============-->
                        </div>
                     </aside>
                  </div>
               </div>
                <!---newsteller--->
                <section class="newsteller style_one bg_dark_1">
               <!--===============spacing==============-->
               <div class="pd_top_40"></div>
               <!--===============spacing==============-->
               <div class="auto-container">
                  <div class="row align-items-center">
                     <div class="col-lg-7 col-md-12">
                        <div class="content">
                           <h2>Have Your Say</h2>
                           <p>Have you experienced any public service that requires reform? </p>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-12">
                                                               <div class="color_white_1 clearfix">
                                          <a href="#" class="theme-btn color_white_1 one">Have Your Say</a>
                                       </div>
                     </div>
                  </div>
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_40"></div>
               <!--===============spacing==============-->
            </section>
                <!---newsteller end--->
            </div>
         
             <?php
            include ('include/footer.html');
            include ('include/script.html');
            ?>

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
			
			
			
				<?php 

		        function string_shorten($text, $char) {
$text = substr($text, 0, $char); //First chop the string to the given character length
if(substr($text, 0, strrpos($text, ' '))!='') $text = substr($text, 0, strrpos($text, ' ')); //If there exists any space just before the end of the chopped string take upto that portion only.
//In this way we remove any incomplete word from the paragraph
$text = $text.'...'; //Add continuation ... sign
return $text; //Return the value
}

                ?>
  