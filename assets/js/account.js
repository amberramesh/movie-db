$(document).ready(function () {
	
	$.ajax({
		type: "POST",
		url: "account.php",
		data: {session: null},
		dataType: "json",
		success: function(response) {
			var userDetails = response;
			
			$("#country").val(userDetails["country"]);
			
			$("input[name='gender'][value="+userDetails['gender']+"]").prop('checked', true);
		}
	});
	
	if($("#successAlert") !== null) {
		$("#successAlert").click(function() {
			$(this).slideUp("slow","swing");
		});
		setTimeout(function() { $("#successAlert").slideUp("slow","swing"); }, 5000);
	}
	
	if($("#failureAlert") !== null) {
		$("#failureAlert").click(function() {
			$(this).slideUp("slow","swing");
		});
		setTimeout(function() { $("#failureAlert").slideUp("slow","swing"); }, 5000);
	}
	
	$(".review-score").each(function() {
		var score = parseFloat($(this).html());
		if(score >= 7.5)
			this.style.color = "#049660";
		else if (score < 7.5 && score >= 4.0)
			this.style.color = "#808000";
		else
			this.style.color = "#D80000";
	});
	
	$("[type=text]").focus(function() {
		$(this).next().hide();
	});
	
	$("[type=text]").blur(function() {
		$(this).next().show();
	});
	
	validInfo = {fname: 1, lname: 1, email: 1};
	
	function validate(key, value) {
		var input = "#"+key;
		var postData = JSON.parse('{"' + key + '":"' + value + '"}');
		$.ajax({
			type: "POST",
			url: "accountUpdate.php",
			data: postData,
			dataType: "text", 
			success: function(response) {
				var message = $(input).next();
				if(response === "Valid") {
					$(input).removeClass("is-invalid").addClass("is-valid");
					message.removeClass("invalid-feedback").hide().html("");
					validInfo[key] = 1;
				}
				else {
					$(input).removeClass("is-valid").addClass("is-invalid");
					message.removeClass("valid-feedback").addClass("invalid-feedback").html(response).show();
				}
				// console.log(response);
			}
		});
	}
	
	$("#fname").on('input', function() {
		validInfo['fname'] = 0;
		validate("fname", $(this).val());
	});
	
	$("#lname").on('input', function() {
		validInfo['lname'] = 0;
		validate("lname", $(this).val());
	});
	
	$("#email").on('input', function() {
		validInfo['email'] = 0;
		validate("email", $(this).val());
	});
	
	$("#editInformationForm").submit(function(e) {
		
		if(validInfo['fname'] === 0)
			validate("fname", $("#fname").val());
		
		if(validInfo['lname'] === 0)
			validate("lname", $("#lname").val());
		
		if(validInfo['email'] === 0)
			validate("email", $("#email").val());
		
		isValid = true;
		$.each(validInfo, function(key, value) {
			if(value === 0) {
				isValid = false;
			}
		});
			
		if(!isValid) {
			e.preventDefault();
			return;
		}
	});
	
	validPassword = {currPwd: 0, newPwd: 0};
	
	function validatePassword(pwd, chkPwd) {
		valid = true;
		msg1 = $("#pwd").next();
		msg2 = $("#chkPwd").next();
		
		msg1.removeClass("valid-feedback invalid-feedback");
		msg2.removeClass("valid-feedback invalid-feedback");
		
		if(pwd !== chkPwd) {
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
			$("#chkPwd").removeClass("is-invalid").addClass("is-valid");
			msg1.hide();
			msg2.hide();
			validPassword['newPwd'] = 1;
		} else {
			$("#pwd").addClass("is-invalid");
			$("#chkPwd").addClass("is-invalid");
		}		
	}
	
	function checkPassword(pwd) {
		message = $("#currPwd").next();
		$.ajax({
			type: "POST",
			url: "account.php",
			data: {password: pwd},
			dataType: "text", 
			success: function(response) {
				var message = $("#currPwd").next();
				if(response === "Valid") {
					$("#currPwd").removeClass("is-invalid").addClass("is-valid");
					message.removeClass("invalid-feedback").hide();
					validPassword['currPwd'] = 1;
				}
				else {
					$("#currPwd").removeClass("is-valid").addClass("is-invalid");
					message.removeClass("valid-feedback").addClass("invalid-feedback").html(response).show();
				}
				// console.log(response);
			}
		});
	}
	
	$("#currPwd").on('input', function() {
		validPassword['currPwd'] = 0;
		checkPassword($("#currPwd").val());
	});
	
	$("#pwd").on('input', function() {
		validPassword['newPwd'] = 0;
		if($("#chkPwd").val() != "")
			validatePassword($(this).val(), $("#chkPwd").val());
	});
	
	$("#chkPwd").on('input', function() {
		validPassword['newPwd'] = 0;
		if($("#pwd").val() != "")
			validatePassword($("#pwd").val(), $(this).val());
	});
	
	$("#changePasswordForm").submit(function(e) {
		
		if(validPassword['currPwd'] === 0)
			checkPassword($("#currPwd").val());
		
		if(validPassword['newPwd'] === 0)
			validatePassword($("#pwd").val(), $("#chkPwd").val());
		
		isValid = true;
		$.each(validPassword, function(key, value) {
			if(value === 0) {
				isValid = false;
			}
		});
		
		if(!isValid) {
			e.preventDefault();
			return;
		}
		
	});
	
});