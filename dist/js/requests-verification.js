$(document).ready(function () {
	$("#requestForm").validate({
		rules: {
			itemType: {
				required: true
			},
			quantity: {
				required: true
			},
			reasonSelect: {
				required: true
			},
			lostRep: {
				required: true
			},
			replacement2: {
				required: true
			}
		},
		messages: {
			itemType: {
				required: "Please select IT asset type"
			},
			quantity: {
				required: "Please enter quantity"
			},
			reasonSelect: {
				required: "Please select reason for your request"
			},
			lostRep: {
				required: "Please attach loss report"
			},
			replacement2: {
				required: "Please enter replacement justification"
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
