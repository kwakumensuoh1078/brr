<?php 
include('acc/classes/mysql.class.php');
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Upcoming Consultations";
include "session.php";

$object->Query("select * from consultation_details where status != 'Closed' ORDER BY id DESC ");
$rowCount = $object->RowCount();

?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
	<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

		<!-- Mirrored from jogjafile.com/html/clava/sidebar-right.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Sep 2023 19:03:57 GMT -->
		<head>
			<?php require_once 'controllers/documentHeader.php' ?>
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		</head>
		<body>
			<!--Start Header-->
			<header id="header">
				<?php require_once 'menu/main-menu.php' ?>
				<!-- Container / End -->
			</header>
			<!--End Header-->

			<!--start wrapper-->
			<!--start wrapper-->
			<section class="wrapper">
				<section class="page_head" style="background:#FFF">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:20px">
								<!--<h2>Current Consultations</h2>-->
								<nav id="breadcrumbs">
									<ul>
										<li>You are here:</li>
										<li><a href="#">Home</a></li>
										<li><a href="#"> On-going Public Consultations </a></li>

									</ul>
								</nav>
							</div>
						</div>
					</div>
				</section>


				<section class="content">
					<div class="container">
						<div class="row sub_content">
							<div class="col-lg-12 col-md-12 col-sm-12">


								<div class="col-md-3">
                                    <?php include "menu/participatemenu.php"; ?>
                                </div>
								<div class="col-lg-9">
									<section class="fetaure_bottom">
										<div class="container">
											<div class="row sub_content">
												 
													<div class="dividerLatest">
														<h4>On-going Public Consultations</h4>
														<div class="gDot"></div>
													</div>
							    <?php if($rowCount > 0){ while(!$object->EndOfSeek()){ $myrow = $object->Row(); ?>

			                <?php $uid = $myrow->posted_by; $security->Query("select * from officer where id = '$uid'  "); $u_row = $security->Row(); $org_id = $u_row->org_id;
			                  $security->Query("select * from org where org_id = '$org_id'  "); $o_Row = $security->Row(); ?>

			                <div class="col-md-12 col-sm-12">
			                  <div class="col-md-3">
			                      <div >
			                        <?php if(isset($o_Row->org_logo)){  ?>
			                        <img src="acc/org/<?php echo $o_Row->org_logo; ?>" width="100px" alt="institution" class="center">
			                        <?php }else{ ?>
			                        <img src="assets/img/moi-logo.png" alt="institution" width="100px" class="center">
			                        <?php } ?>
			                        <br>
			                         <h5 align="center"><strong><?php echo $o_Row->org_name; ?></strong> </h5>
			                        

			                      </div>
			                  </div>
                <!-- title -->
                
                  <div class="row">
                     
                      <div class="col-md-8">
                        <p align="justify"><strong><a href="consultation?cd=<?php echo base64_encode($myrow->id); ?>"><?php echo $myrow->topic; ?></a></strong></p>
                      </div>
                      <div class="col-md-8">
                        <ul class="list-inline">
                          <li>
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
		                            </section>
								</div>
							</div>
						</div>
					</div>


				</section>



			</section>
			<!--end wrapper-->
			<!--end wrapper-->



			<!--start footer-->
			<?php require_once  'menu/footer-menu.php' ?>



			<?php require_once 'controllers/documentFooter.php' ?>
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


