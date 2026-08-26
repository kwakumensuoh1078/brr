<?php 
require_once 'classes/mysql.class.php';
$object = new MySQL();
$security = new MySQL();
$sec = new MySQL();
$pageName = "Register";
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
			<div id="primary" class="content-area col-lg-8 col-md-12 col-sm-12 col-xs-12">
				<br><br><br><br>
				<h4><strong>REGISTRATION FORM</strong></h4>
				<hr>
				<div class="row">


					<p style="margin-left:10px;margin-right: 10px; font-size: 16px; align:justify">You don’t have to be big to have a big voice on Government of Ghana's policies and regulations that might affect ease of doing business and the future of businesses in Ghana. 
						<br>Please fill out the form below to become part of this community. Members of the Community of Users would receive updates on draft public policies and/or existing regulations. </p><br> <br>
						<p ><h5 style="margin-left:20px"><strong>Registration Type</strong></h5></p>
						<div class="col-lg-3 ">
							<label for="p_officer" >Public Official</label><br>
							<div class="col-md-4">
								<input type="radio" class="form-control regType1" name="regType" id="p_officer">
							</div>
						</div>
						<div class="col-lg-3 ">
							<label for="g_org">Group / Organization</label><br>
							<div class="col-md-4">
								<input type="radio" class="form-control regType3" name="regType" id="g_org">
							</div>
						</div>
						<div class="col-lg-3">
							<label for="p_ind">Private Individual</label><br>
							<div class="col-md-4">
								<input type="radio" class="form-control regType2" name="regType" id="p_ind" >
							</div>
						</div>


					</div>
					<br><br>
					<div class="row">
						<div class="col-md-12">
							<div id="public" style="margin-left:10px;margin-right:10px">
								<p><h4 style="margin-left:10px"><strong>Public Official Registration</strong></h4></p>
								<hr style="border-style: inset; display: block; width: 200px; margin-left:0px; border-width: 1px; background-color: black;">

								<div>
									<p align="center" style="display: none; color: limegreen;" id="po_wait"><img src="assets/images/spinner.gif" > Loading. Please wait....</p>
								</div>
								<div id="po_ack" align="center"></div><br>

								<form method="post" id="public_officer_form">
									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="po_surname" id="po_surname" class="form-control" placeholder="Enter Surname (Required)">
											<span id="po_surnameerror"></span>
										</div>

										<div class="form-group">
											<input type="text" name="po_firstname" id="po_firstname" class="form-control" placeholder="Enter First Name (Required)">
											<span id="po_firstnameerror"></span>
										</div>

										<div class="form-group">
											<input type="text" name="po_othername" id="po_othername" class="form-control" placeholder="Enter Other Name (Optional)">
										</div>

										<div class="form-group">
											<select class="form-control" name="po_gender" id="po_gender">
												<option value="" selected disabled>Select Gender (Required)</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>

											</select>
											<span id="po_gendererror"></span>
										</div>



										<div class="form-group">
											<input type="text" name="po_email" id="po_email" class="form-control" placeholder="Enter Email (Required)">
											<span id="po_emmailerror"></span>
										</div>

									</div>
									<div class="col-md-6">

										<div class="form-group">
											<select class="form-control" name="po_inst" id="po_inst">
												<option value="" selected disabled>Select institution (Required)</option>
												<?php  
												$object->Query("select org_id, org_name from org ORDER BY org_name ASC");
												while(!$object->EndofSeek()){
													$row = $object->Row();
													?>
													<option value="<?php echo $row->org_id; ?>"><?php echo $row->org_name; ?></option>
												<?php } ?>
											</select>
											<span id="po_inserror"></span>
										</div>

										<div class="form-group">
											<select class="form-control" name="po_designation" id="po_designation">
												<option value="" selected disabled>Select Designation (Required)</option>
												<?php  
												$object->Query("select * from occupation where occ_cat_id = 1 ORDER BY occ_name ASC");
												while(!$object->EndofSeek()){
													$row = $object->Row();
													?>
													<option value="<?php echo $row->id; ?>"><?php echo $row->occ_name; ?></option>
												<?php } ?>
											</select>
											<span id="po_designationerror"></span>
										</div>

										<div class="form-group">
											<input type="text" name="po_department" id="po_department" class="form-control" placeholder="Enter Department (Required)">
											<span id="po_departmenterror"></span>
										</div>

										<div class="form-group">
											<input type="number" name="po_tel" id="po_tel" class="form-control" placeholder="Enter Phone Number (Required)">
											<span id="po_telerror"></span>
										</div>

									</div>
								</div>

									<div class="row" style="margin-left:10px;margin-right:10px">
										<div class="col-lg-12 margin-left-20 padding-top-20">
											<p  style="font-size: 16px;" align="justify"><strong>We value your privacy</strong><p  style="font-size: 16px;" align="justify">
												<p  style="font-size: 16px;" align="justify">	Your privacy is very important to us. Your contact details will only be used for consultation purposes. 
													Please read our <a href="terms">Terms and Conditions</a> before you register. </p><br><br><br>
													<button class="btn btn-primary" id="po_save" style="margin-top:20px;margin-bottom:30px"><strong>Save and Continue</strong></button>
												</div>
											</div>

<!-- hidden -->
<input type="hidden" name="public_officer" id="public_officer" value="public_officer">
<!-- /hidden -->

</form>
</div>

<div id="private" style="margin-left:10px;margin-right:10px">
	<p><h4 style="margin-left:10px"><strong>Private Individual Registration</strong></h4></p>
	<hr style="border-style: inset; display: block; width: 230px; margin-left:0px; border-width: 1px; background-color: black;">
<!-- notification  -->
<div>
	<p align="center" style="display: none; color: limegreen;" id="pi_wait"><img src="assets/img/spinner.gif" > Loading. Please wait....</p>
</div>
<div id="pi_ack" align="center"></div><br>
<!-- /notification -->
<form method="post" id="private_individual_form">
	<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<input type="text" name="pi_surname" id="pi_surname" class="form-control" placeholder="Enter Surname (Required)">
			<span id="pi_surnameerror"></span>
		</div>

		<div class="form-group">
			<input type="text" name="pi_firstname" id="pi_firstname" class="form-control" placeholder="Enter First Name (Required)">
			<span id="pi_firstnameerror"></span>
		</div>

		<div class="form-group">
			<select class="form-control" name="pi_gender" id="pi_gender">
				<option value="" selected disabled>Select Gender (Required)</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>

			</select>
			<span id="pi_gendererror"></span>
		</div>

		<div class="form-group">
			<select class="form-control" name="pi_agerange" id="pi_agerange">
				<option value="" selected disabled>Select Age Range (Required)</option>
				<option value="18-24">18-24 years old</option>
				<option value="25-34">25-34 years old</option>
				<option value="35-44">35-44 years old</option>
				<option value="45-54">45-54 years old</option>
				<option value="55-64">55-64 years old</option>
				<option value="Above 65 years">Above 65 years</option>
			</select>
			<span id="pi_agerangeerror"></span>
		</div>

		<div class="form-group">
			<input type="email" name="pi_email" id="pi_email" class="form-control" placeholder="Enter Email Address (Required)">
			<span id="pi_emailerror"></span>
		</div>



		<div class="form-group">
			<input type="number" name="pi_tel" id="pi_tel" class="form-control" placeholder="Enter Phone Number (Required)">
			<span id="pi_telerror"></span>
		</div>

	</div>


	<div class="col-md-6">

		<div class="form-group">
			<select class="form-control" name="pi_org_type" id="pi_org_type">
				<?php 
				$object->Query("select id, type_name from respondent_type where id = 2 ORDER BY type_name ASC");
				while(!$object->EndofSeek()){
					$row = $object->Row();
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->type_name; ?></option>
				<?php } ?>
			</select>
			<span id="pi_org_type_error"></span>
		</div>

		<div class="form-group">
			<select class="form-control" name="pi_des_cat" id="pi_des_cat">
				<option value="" selected disabled>Select Designation Category (Required)</option>
				<?php  
				$object->Query("select id, name from occupation_category where id not in (1, 2, 6, 3) ORDER BY name ASC");
				while(!$object->EndofSeek()){
					$row = $object->Row();
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
				<?php } ?>
			</select>
			<span id="pi_des_caterror"></span>
		</div>

		<div class="form-group">
			<select class="form-control" name="pi_designation" id="pi_designation">
				<option value="" selected disabled>Select Designation (Required)</option>
			</select>
			<span id="pi_designationerror"></span>
		</div>



		<div class="form-group">
			<input type="text" name="pi_organization" id="pi_organization" class="form-control" placeholder="Enter Organization (Optional)">
			<span id="pi_organizationerror"></span>
		</div>



		<div class="form-group">
			<select class=" form-control" name="pi_country" id="pi_country">
				<option value="" selected disabled>Select Country (Required)</option>
				<?php 
				$object->Query("select * from countries ORDER BY countries_name ASC");
				while(!$object->EndofSeek()){
					$row = $object->Row();
					?>
					<option value="<?php echo $row->countries_name; ?>"><?php echo $row->countries_name; ?></option>
				<?php } ?>
			</select>
			<span id="pi_countryerror"></span>
		</div>

		<div class="form-group">
			<select class="form-control" name="pi_citizentype" id="pi_citizentype">
				<option value="" selected disabled>Select Citizen Type (Required)</option>
				<?php 
				$object->Query("select c_id, c_name from citizen_type ORDER BY c_name ASC");
				while(!$object->EndofSeek()){
					$row = $object->Row();
					?>
					<option value="<?php echo $row->c_id; ?>"><?php echo $row->c_name; ?></option>
				<?php } ?>
			</select>
			<span id="pi_citizentypeerror"></span>
		</div>

	</div>
</div>

	<div class="row" style="margin-left:10px;margin-right:10px">

		<div class="col-lg-12 margin-left-20 padding-top-20">
			<p  style="font-size: 16px;" align="justify"><strong>We value your privacy</strong><p  style="font-size: 16px;" align="justify">
				<p  style="font-size: 16px;" align="justify">	Your privacy is very important to us. Your contact details will only be used for consultation purposes. 
					Please read our <a href="terms">Terms and Conditions</a> before you register. </p><br><br>
					<button class="btn btn-primary" id="pi_save" style="margin-bottom:30px;margin-top: 20px;"><strong>Save and Continue</strong></button>
				</div>
			</div>

<!-- hidden -->
<input type="hidden" name="private_individual" id="private_individual" value="private_individual">
<!-- /hidden -->
</form>
</div>

<div id="org" style="margin-left:10px;margin-right:10px">
	<p><h4 style="margin-left:10px"><strong>Organization Registration</strong></h4></p>
	<hr style="border-style: inset; display: block; width: 200px; margin-left:0px; border-width: 1px; background-color: black;">
<!-- notification  -->
<div>
	<p align="center" style="display: none; color: limegreen;" id="o_wait"><img src="assets/images/spinner.gif" > Loading. Please wait....</p>
</div>
<div id="o_ack" align="center"></div><br>


<!-- /notification -->

<form method="post" id="organization_form">
	<div class="row" style="margin-left:10px;margin-right:10px">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" name="o_name" id="o_name" class="form-control" placeholder="Enter Organization Name (Required)">
				<span id="o_nameerror"></span>
			</div>

			<div class="form-group">
				<input type="text" name="o_shortName" id="o_shortName" class="form-control" placeholder="Enter Organization Short Name (Optional)">
				<span id="o_shortnameerror"></span>
			</div>



			<div class="form-group">
				<input type="email" name="o_email" id="o_email" class="form-control" placeholder="Enter Organization Email (Required)">
				<span id="o_emailerror"></span>
			</div>

			<div class="form-group">
				<input type="text" name="o_website" id="o_website" class="form-control" placeholder="Enter Organization Website (Optional)">
				<span id="o_website_error"></span>
			</div>

		</div>


		<div class="col-md-6">

			<div class="form-group">

				<div class="form-group">
					<select class="form-control" name="o_type" id="o_type">
						<?php 
						$object->Query("select id, type_name from respondent_type where id = 3 ORDER BY type_name ASC");
						while(!$object->EndofSeek()){
							$row = $object->Row();
							?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->type_name; ?></option>
						<?php } ?>
					</select>
					<span id="o_typeerror"></span>
				</div>

				<div class="form-group">
					<input type="number" name="o_tel" id="o_tel" class="form-control" placeholder="Enter Organization Phone Number (Required)">
					<span id="o_tel"></span>
				</div>

				<div class="form-group">
					<input type="text" name="o_officeAddress" id="o_officeAddress" class="form-control" placeholder="Enter Office Address (Required)">
					<span id="o_officeaddresserror"></span>
				</div>

			</div>
		</div>
	</div>

	<div class="row" style="margin-left:10px;margin-right:10px">
		<div class="col-lg-12 margin-left-20 padding-top-20">
			<p  style="font-size: 16px;" align="justify"><strong>We value your privacy</strong><p  style="font-size: 16px;" align="justify">
				<p  style="font-size: 16px;" align="justify">	Your privacy is very important to us. Your contact details will only be used for consultation purposes. 
					Please read our <a href="terms">Terms and Conditions</a> before you register. </p><br><br>
					<button class="btn btn-primary" id="o_save" style="margin-bottom:30px;margin-top:20px"><strong>Save and Continue</strong></button>
				</div>
			</div>

<!-- hidden -->
<input type="hidden" name="org_group" id="org_group" value="org_group">
<!-- /hidden -->
</form>

</div>
</div>
</div>

</div>
<div class="col-md-4"><br><br><br><br>

	<img src="assets/images/signup.png">

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

<script src="js/registration.js"></script>
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