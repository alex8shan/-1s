$(document).ready(function() {

	$("#hideLogin").click(function() {
        console.log("Login is pressed");
		$("#loginForm").hide();
		$("#registerForm").show();
	});

	$("#hideRegister").click(function() {
        console.log("Register is pressed");
		$("#loginForm").show();
		$("#registerForm").hide();
	});
});