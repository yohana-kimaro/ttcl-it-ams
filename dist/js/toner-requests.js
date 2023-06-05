$(document).ready(function () {
	$("#tonnerRequestForm").validate({
		rules: {
			tonerModel: {
				required: true
			},
			tonerQuantity: {
				required: true
			}
		},
		messages: {
			tonerModel: {
				required: "Please choose toner model"
			},
			tonerQuantity: {
				required: "Please enter toner quantity"
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
