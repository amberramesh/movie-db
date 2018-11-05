$(document).ready(function() {
	
	validForm = {fname: 0, lname: 0, gender: 0, email: 0, pwd: 0, country: 0, tos: 0};
	userDetails = {};
	
	$("[type=text]").focus(function() {
		$(this).next().hide();
	});
	
	$("[type=text]").blur(function() {
		$(this).next().show();
	});
	
	function validate(key, value) {
		var input = "#"+key;
		var postData = JSON.parse('{"' + key + '":"' + value + '"}');
		$.ajax({
			type: "POST",
			url: "signupCheck.php",
			data: postData,
			dataType: "text", 
			success: function(response) {
				var message = $(input).next();
				if(response === "Valid") {
					$(input).removeClass("is-invalid").addClass("is-valid");
					message.removeClass("invalid-feedback").addClass("valid-feedback").html("Looks good!").show();
					validForm[key] = 1;
				}
				else {
					$(input).removeClass("is-valid").addClass("is-invalid");
					message.removeClass("valid-feedback").addClass("invalid-feedback").html(response).show();
				}
				// console.log(response);
			}
		});
	}
	
	function validatePassword(pwd, chkpwd) {
		valid = true;
		msg1 = $("#pwd").next();
		msg2 = $("#chkpwd").next();
		
		msg1.removeClass("valid-feedback invalid-feedback");
		msg2.removeClass("valid-feedback invalid-feedback");
		
		if(pwd !== chkpwd) {
			valid = false;
			msg2.addClass("invalid-feedback").html("Passwords do not match!").show();
		}
		else
			msg2.hide();
		
		if(pwd.length < 8) {
			valid = false;
			msg1.addClass("invalid-feedback").html("Password must be at least 8 characters.").show();
		} else
			msg1.hide();
		
		if(valid) {
			$("#pwd").removeClass("is-invalid").addClass("is-valid");
			$("#chkpwd").removeClass("is-invalid").addClass("is-valid");
			msg1.addClass("valid-feedback").html("Looks good!").show();
			msg2.hide();
			validForm['pwd'] = 1;
		} else {
			$("#pwd").addClass("is-invalid");
			$("#chkpwd").addClass("is-invalid");
		}		
	}
	
	$("#fname").on('input', function() {
		validForm['fname'] = 0;
		validate("fname", $(this).val());
	});
	
	$("#lname").on('input', function() {
		validForm['lname'] = 0;
		validate("lname", $(this).val());
	});
	
	$("input[name='gender']").change(function() {
		validForm['gender'] = 1;
		$("#genFemale").parent().next().removeClass("invalid-feedback").hide();
	});
	
	
	$("#email").on('input', function() {
		validForm['email'] = 0;
		validate("email", $(this).val());
	});
	
	$("#pwd").on('input', function() {
		validForm['pwd'] = 0;
		if($("#chkpwd").val() != "")
			validatePassword($(this).val(), $("#chkpwd").val());
	});
	
	$("#chkpwd").on('input', function() {
		validForm['pwd'] = 0;
		if($("#pwd").val() != "")
			validatePassword($("#pwd").val(), $(this).val());
	});
	
	$("#country").change(function() {
		validForm['country'] = 1;
		$("#country").next().removeClass("invalid-feedback").hide();
	});
	
	$("#accepttos").change(function() {
		validForm['tos'] = 0;
		$("#accepttos").parent().next().removeClass("invalid-feedback").hide();
	});
	
	$("#signupForm").submit(function(e) {
		
		if(validForm['fname'] === 0)
			validate("fname", $("#fname").val());
		else
			userDetails['fname'] = $("#fname").val();
		
		if(validForm['lname'] === 0)
			validate("lname", $("#lname").val());
		else
			userDetails['lname'] = $("#lname").val();
		
		if($("input[name='gender']:checked").val() !== undefined) {
			userDetails['gender'] = $("input[name='gender']:checked").val();
		} else
			$("#genFemale").parent().next().addClass("invalid-feedback").html("Please select a gender.").show();
		
		if(validForm['email'] === 0)
			validate("email", $("#email").val());
		else
			userDetails['email'] = $("#email").val();
		
		if(validForm['pwd'] === 0)
			validatePassword($("#pwd").val(), $("#chkpwd").val());
		else
			userDetails['pwd'] = $("#pwd").val();
		
		if($("#country").val() === null) {
			$("#country").next().addClass("invalid-feedback").html("Please select a country.").show();
		} else
			userDetails['country'] = $("#country").val();
		
		if($("#accepttos").prop("checked"))
			validForm['tos'] = 1;
		else
			$("#accepttos").parent().next().addClass("invalid-feedback").html("You must accept the terms.").show();
		
		
		isValid = true;
		$.each(validForm, function(key, value) {
			if(value === 0) {
				//$("#signupForm").removeClass("needs-validation").addClass("was-validated");
				isValid = false;
			}
		});
		
		if(!isValid) {
			e.preventDefault();
			return;
		}
		// console.log(userDetails);
		
	});
	
});