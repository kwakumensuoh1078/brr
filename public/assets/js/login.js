
$(document).on("click", "#log_me_in", function(e){
	e.preventDefault();
	$("#emailerror").empty();
	$("#passworderror").empty();

	var email = $.trim($("#email").val());
	var password = $.trim($("#password").val());

	if(email.length == 0){
		$("#emailerror").html('<p><small style="color:red">field can not be empty</small></p>');
	}
	if(password.length == 0)
	{
		$("#passworderror").html('<p><small style="color:red">field can not be empty</small></p>');
	}

	if(email.length != 0 && password.length != 0){
		$("#wait").css("display" , "block");
		$.ajax({
			url: "controllers/authenticate.php",
			type: "post",
			data: $("#login_form").serialize(),
			success:function(data){
				console.log(data);
				$("#wait").css("display", "none");
				if(data === "ok"){
					$('#ack').html('<div align="center"><span class="alert alert-success">Login Successful. </span></div>'+"<img src='assets/img/spinner.gif' /> Redirecting ...").fadeIn(1900, function() {
                        setInterval(function(){
                            $("#login_form")[0].reset();
                            location="acc/inc/dashboard.php";
                        },5000);
                    });
				}else{
					$("#ack").html('<div align="center"><span class="alert alert-danger">'+ data + '</span></div><br>');

		 			$("#ack").hide().fadeIn(2000).fadeOut(4000);
				}
			}
		})
	}
});