$(document).ready(function () {
	$("#form-record-toner-cartridge").validate({
		rules: {
			recordtonercartridgetonerbrand: {
				required: true
			},
			recordtonercartridgetonermodel: {
				required: true
			},
			recordtonercartridgetonerstatus: {
				required: true
			}
		},
		messages: {
			recordtonercartridgetonerbrand: {
				required: "Please choose brand"
			},
			recordtonercartridgetonermodel: {
				required: "Please enter model"
			},
			recordtonercartridgetonerstatus: {
				required: "Please choose status"
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