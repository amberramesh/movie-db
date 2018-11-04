$(document).ready(function() {
	
	if($("#signupSuccess") !== null) {
		$("#signupSuccess").click(function() {
			$(this).slideUp("slow","swing");
		});
		setTimeout(function() { $("#signupSuccess").slideUp("slow","swing"); }, 5000);
	}
	
	if($("#signupFailure") !== null) {
		$("#signupFailure").click(function() {
			$(this).slideUp("slow","swing");
		});
		setTimeout(function() { $("#signupFailure").slideUp("slow","swing"); }, 5000);
	}
	
	if($("#signinFailure") !== null) {
		$("#signinFailure").click(function() {
			$(this).slideUp("slow","swing");
		});
		setTimeout(function() { $("#signinFailure").slideUp("slow","swing"); }, 5000);
	}
	
	$("#loginForm").submit(function(e) {
		
		var email = $("#email");
		var password = $("#password");
		
		if(email.val() == "") {
			email.removeClass("is-valid").addClass("is-invalid");
			email.next().addClass("invalid-feedback").html("Please enter e-mail.").show();
			e.preventDefault();
		} else {
			email.removeClass("is-invalid").addClass("is-valid");
			email.next().removeClass("invalid-feedback").hide();
		}
		
		if(password.val() == "") {
			password.removeClass("is-valid").addClass("is-invalid");
			password.next().addClass("invalid-feedback").html("Please enter password.").show();
			e.preventDefault();
		} else {
			password.removeClass("is-invalid").addClass("is-valid");
			password.next().removeClass("invalid-feedback").hide();
		}
				
	});
	
});