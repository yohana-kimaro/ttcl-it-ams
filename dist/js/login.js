$(document).ready(function () {
	$("#login-form").validate({
		rules: {
			itamsUname: {
				required: true
			},
			itamsPword: {
				required: true
			}
		},
		messages: {
			itamsUname: {
				required: "Please provide username"
			},
			itamsPword: {
				required: "Please provide password"
			}
		},
		errorElement:"span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		}
	});
});
