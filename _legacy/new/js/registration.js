$(document).ready(function(){
	$("#public").hide();
	$("#private").hide();
	$("#org").hide();

	$(document).on('change', '.regType1', function(e){
		e.preventDefault();
		$("#public").show();
		$("#private").hide();
		$("#org").hide();
	});


	$(document).on('change', '.regType2', function(e){
		e.preventDefault();
		$("#private").show();
		$("#public").hide();
		$("#org").hide();
	});


	$(document).on('change', '.regType3', function(e){
		e.preventDefault();
		$("#org").show();
		$("#public").hide();
		$("#private").hide();
	});

});

function validateEmail(sEmail) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}


$(document).on("change","#po_des_cat", function(e){
  	e.preventDefault();
  	var po_id = $(this).val();
  	$.ajax({
  		url: "controllers/process_callback.php",
  		type: "post",
  		data:{po_id:po_id},
  		success:function(data){
  			console.log(data);
  			if(data == "error")
  			{

  			}else{

  				$("#po_designation").html(data);
  			}
  		}
  	})
});


$(document).on("change","#pi_des_cat", function(e){
  	e.preventDefault();
  	var po_id = $(this).val();
  	$.ajax({
  		url: "controllers/process_callback.php",
  		type: "post",
  		data:{po_id:po_id},
  		success:function(data){
  			console.log(data);
  			if(data == "error")
  			{

  			}else{

  				$("#pi_designation").html(data);
  			}
  		}
  	})
});




$(document).on("click" , "#po_save", function(e){
	e.preventDefault();
	
	$("#po_surnameerror").empty();
	$("#po_inserror").empty();
	//$("#po_des_caterror").empty();
	$("#po_emmailerror").empty();
	$("#po_firstnameerror").empty();
	$("#po_gendererror").empty();
	$("#po_departmenterror").empty();
	$("#po_designationerror").empty();
	$("#po_telerror").empty();

	var surname = $.trim($("#po_surname").val());
	var institution = $.trim($("#po_inst").val());
	var des_cat = $.trim($("#po_des_cat").val());
	var email = $.trim($("#po_email").val());
	var firstname = $.trim($("#po_firstname").val());
	var gender = $.trim($("#po_gender").val());
	var department = $.trim($("#po_department").val());
	var designation = $.trim($("#po_designation").val());
	var tel = $.trim($("#po_tel").val());

	if(surname.length === 0){
		
        $("#po_surnameerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(institution.length === 0){
		
        $("#po_inserror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	// if(des_cat.length == 0){
		
 //        $("#po_des_caterror").html('<p><small style="color:red;">select option.</small><p/>');
 //        $("html, body").animate({scrollTop:0}, "slow");     
	// }
	if(validateEmail(email) === false) {

        $("#po_emmailerror").html('<p><small style="color:red;">Please enter a valid email.</small><p/>');
        $("html, body").animate({scrollTop: 0}, "slow");
    }
	if(firstname.length === 0){
		
        $("#po_firstnameerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}

	if(gender.length === 0){
		
        $("#po_gendererror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(department.length === 0){
		
        $("#po_departmenterror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(designation.length === 0){
		
        $("#po_designationerror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(tel.length === 0){
		
        $("#po_telerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}

	if(surname.length !== 0 && institution.length !== 0 && validateEmail(email) === true && firstname.length !== 0 && gender.length !== 0 && department.length !== 0 && designation.length !== 0 && tel.length !== 0){
		 $("#po_wait").css("display", "block");
		 $.ajax({
		 	url: "controllers/registration.php",
		 	type: "post",
		 	data: $("#public_officer_form").serialize(),
		 	success:function(data){
		 		console.log(data);
		 		$("#po_wait").css("display", "none");
		 		if(data === "ok"){
		 			$("html, body").animate({scrollTop:0},"slow");
		 			$('#po_ack').html('<div align="center"><span class="alert alert-success">Thank you for registering. </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                        setInterval(function(){
                            $("#public_officer_form")[0].reset();
                           location="confirm";
                        },5000);
                    });
		 		}
		 		else if(data === "error"){
		 			$("#po_ack").html('<div align="center"><span class="alert alert-danger">Something went wrong. Please try again later. </span></div>');

		 			$("#po_ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
		 		}
		 		else if(data === "exist"){
		 			$("#po_ack").html('<div align="center"><span class="alert alert-danger">Account with the same email or phone number exist. </span></div>');

		 			$("#po_ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
		 		}
		 	}
		 })
	}

	
});




$(document).on("click" , "#pi_save", function(e){
	e.preventDefault();
	
	$("#pi_surnameerror").empty();
	$("#pi_agerangeerror").empty();
	$("#pi_des_caterror").empty();
	$("#pi_emailerror").empty();
	$("#pi_firstnameerror").empty();
	$("#pi_gendererror").empty();
	$("#pi_org_type_error").empty();
	$("#pi_designationerror").empty();
	$("#pi_telerror").empty();
	$("#pi_citizentypeerror").empty();
	$("#pi_countryerror").empty();

	var surname = $.trim($("#pi_surname").val());
	var agerange = $.trim($("#pi_agerange").val());
	var des_cat = $.trim($("#pi_des_cat").val());
	var email = $.trim($("#pi_email").val());
	var firstname = $.trim($("#pi_firstname").val());
	var gender = $.trim($("#pi_gender").val());
	var orgType = $.trim($("#pi_org_type").val());
	var designation = $.trim($("#pi_designation").val());
	var tel = $.trim($("#pi_tel").val());
	var citizentype = $.trim($("#pi_citizentype").val());
	var country = $.trim($("#pi_country").val());

	if(surname.length === 0){
		
        $("#pi_surnameerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(agerange.length === 0){
		
        $("#pi_agerangeerror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(des_cat.length === 0){
		
        $("#pi_des_caterror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if (validateEmail(email) === false) {

        $("#pi_emailerror").html('<p><small style="color:red;">Please enter a valid email.</small><p/>');
        $("html, body").animate({scrollTop: 0}, "slow");
    }
	if(firstname.length === 0){
		
        $("#pi_firstnameerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}

	if(gender.length === 0){
		
        $("#pi_gendererror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(orgType.length === 0){
		
        $("#pi_org_type_error").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(designation.length === 0){
		
        $("#pi_designationerror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(tel.length === 0){
		
        $("#pi_telerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(country.length === 0){
		
        $("#pi_countryerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(citizentype.length === 0){
		
        $("#pi_citizentypeerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}

	if(surname.length !== 0 && agerange.length !== 0 && des_cat.length !== 0 && validateEmail(email) === true && firstname.length !== 0 && gender.length !== 0 && orgType.length !== 0 && designation.length !== 0 && tel.length !== 0 && country.length !== 0 && citizentype.length !== 0){
		 $("#pi_wait").css("display", "block");
		 $.ajax({
		 	url: "controllers/registration.php",
		 	type: "post",
		 	data: $("#private_individual_form").serialize(),
		 	success:function(data){
		 		console.log(data);
		 		$("#pi_wait").css("display", "none");
		 		if(data === "ok"){
		 			$("html, body").animate({scrollTop:0},"slow");
		 			$('#pi_ack').html('<div align="center"><span class="alert alert-success">Thank you for registering. </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                        setInterval(function(){
                            $("#private_individual_form")[0].reset();
                           location="confirm.php";
                        },5000);
                    });
		 		}
		 		else if(data === "error"){
		 			$("#pi_ack").html('<div align="center"><span class="alert alert-danger">Something went wrong. Please try again later. </span></div>');

		 			$("#pi_ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
		 		}
		 		else if(data === "exist"){
		 			$("#pi_ack").html('<div align="center"><span class="alert alert-danger">Account with the same email or phone number exist. </span></div>');

		 			$("#pi_ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
		 		}
		 	}
		 })
	}

	
});



$(document).on("click" , "#o_save", function(e){
	e.preventDefault();
	
	$("#o_nameerror").empty();
	$("#o_typeerror").empty();
	$("#o_emailerror").empty();
	$("#o_officeaddresserror").empty();

	var orgName = $.trim($("#o_name").val());
	var orgType = $.trim($("#o_type").val());
	var email = $.trim($("#o_email").val());
	var officeAddress = $.trim($("#o_officeAddress").val());
	
	if(orgName.length === 0){
		
        $("#o_nameerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(orgType.length === 0){
		
        $("#o_typeerror").html('<p><small style="color:red;">select option.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if(officeAddress.length === 0){
		
        $("#o_officeaddresserror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");     
	}
	if (validateEmail(email) === false) {

        $("#o_emailerror").html('<p><small style="color:red;">Please enter a valid email.</small><p/>');
        $("html, body").animate({scrollTop: 0}, "slow");
    }
	

	if(orgName.length !== 0 && orgType.length !== 0 && officeAddress.length !== 0 && validateEmail(email) === true ){
		 $("#o_wait").css("display", "block");
		 $.ajax({
		 	url: "controllers/registration.php",
		 	type: "post",
		 	data: $("#organization_form").serialize(),
		 	success:function(data){
		 		console.log(data);
		 		$("#o_wait").css("display", "none");
		 		if(data === "ok"){
		 			$("html, body").animate({scrollTop:0},"slow");
		 			$('#o_ack').html('<div align="center"><span class="alert alert-success">Thank you for registering. </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                        setInterval(function(){
                            $("#organization_form")[0].reset();
                            location="confirm";
                        },5000);
                    });
		 		}
		 		else if(data === "error"){
		 			$("#o_ack").html('<div align="center"><span class="alert alert-danger">Something went wrong. Please try again later. </span></div>');

		 			$("#o_ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
		 		}
		 		else if(data === "exist"){
		 			$("#o_ack").html('<div align="center"><span class="alert alert-danger">Account with the same email or phone number exist. </span></div>');

		 			$("#o_ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
		 		}
		 	}
		 })
	}

	
});


$(document).on("click" ,"#confirm", function(e){
	e.preventDefault();
	$("#confirmerror").empty();

	var confirmTxtbox = $.trim($("#confirmTxtbox").val());
	
	if(confirmTxtbox.length === 0){
		$("#confirmerror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");
	}
	if(confirmTxtbox.length !== 0){
		$("#wait").css("display", "block");
		$.ajax({
			url: "controllers/registration.php",
			type: "post",
			data: {code:confirmTxtbox},
			success:function(data){
				console.log(data);
				$("#wait").css("display", "none");
				if(data === "empty")
				{
					$("#ack").html('<div align="center"><span class="alert alert-danger">This account has already been activated</span></div><br><br>');

		 			$("#ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
				}
				else
				{
					$('#ack').html('<div align="center"><span class="alert alert-success">Confirmation Succesfull. </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                        setInterval(function(){
                            $("#confirm_form")[0].reset();
                            //location="2keV&ue_uj"+"?jHVhGoD="+data;
                            location = 'register_continue?jHVhGoD='+data;
                            
                        },5000);
                    });
				}
			}
		})
	}
});


$(document).on("click", "#save", function(e){
	e.preventDefault();
	$("#passworderror").empty();
	$("#c_passworderror").empty();

	var password = $.trim($("#password").val());
	var c_password = $.trim($("#c_password").val());

	if(password.length === 0){
		$("#passworderror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");
	}
	if(c_password.length === 0){
		$("#c_passworderror").html('<p><small style="color:red;">field cannot be empty.</small><p/>');
        $("html, body").animate({scrollTop:0}, "slow");
	}
	if(password.length !== 0 && c_password !== 0){
		$("#wait").css("display", "block");
		$.ajax({
			url: "controllers/registration.php",
			type: "post",
			data: $("#register_form").serialize(),
			success:function(data){
				$("#wait").css("display", "none");
				console.log(data);
				if(data == "ok"){
					$('#ack').html('<div align="center"><span class="alert alert-success">Account Succesfully Created. </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                        setInterval(function(){
                            $("#register_form")[0].reset();
                            location="login";
                        },5000);
                    });
				}
				else if(data === "mismatch"){
					$("#ack").html('<div align="center"><span class="alert alert-danger">Password Mismatch. Please check the password and try again </span></div><br><br>');

		 			$("#ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
				}
				else if(data === "long"){
					$("#ack").html('<div align="center"><span class="alert alert-danger">Password too long.</span></div><br><br>');

		 			$("#ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
				}
				else if(data === "short"){
					$("#ack").html('<div align="center"><span class="alert alert-danger">Password too short.</span></div><br><br>');

		 			$("#ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
				}
				else if(data === "error"){
					$("#ack").html('<div align="center"><span class="alert alert-danger">Something went wrong. Please try agian later.</span></div><br><br>');

		 			$("#ack").hide().fadeIn(2000).fadeOut(4000);
		 			$("html, body").animate({scrollTop:0},"slow");
				}
			}
		})
	}
});