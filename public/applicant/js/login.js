// $("#sign-in-btn").click(function(e){
//     e.preventDefault();
//     var $loginForm = $('#login-form');
//     console.log($().validate())
//     if($loginForm.length){
//         $loginForm.validate({
//             rules: {
//                 email: {
//                     required: true,
//                 }
//             },
//             messages: {
//                 email: {
//                     required: 'email needs a value',
//                 }
//             }

//         });//form
//     }
// });

$(function () {
	$.ajaxSetup({
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
	});
});

$(".btn-next").on("click", function () {
	window.location.href = "#";
});

// for (let i = 0; i < 2; i++) {
//   $('#upload_later1').click(function(e){
//     e.preventDefault();
//     console.log('hello0');
//   });
// }
for (let i = 1; i < 24; i++) {
	// console.log('skipCheck' + i);
	$("#skipCheck" + i).on("change", function () {
		$("#preEmp-input" + i).attr("disabled", this.checked);
	});
}

//login form
if ($("#login-form").length > 0) {
	$("#login-form").validate({
		rules: {
			email: {
				required: true,
				maxlength: 50,
				email: true,
			},
			password: {
				required: true,
			},
		}, //rules
		messages: {
			email: {
				required: "*This field cannot be left blank",
				maxlength: "*Email should not exceed 50 characters",
				maxlength: "*you must enter be a valid email",
			},
			password: {
				required: "*This field cannot be left blank",
			},
		},
	});
}

$("#declineOffer").on("click", function (e) {
	e.preventDefault();
	$.ajax({
		url: "view/decline",
		type: "POST",
		data: {
			response: "declined",
			_token: "{{ csrf_token() }}",
		},
		success: function (response) {
			console.log(response);
			// if(response) {
			// window.location.href = '/path';
			$(".success").text(response.success);
			var url = window.location.href;

			if (url.substr(-1) == "/") url = url.substr(0, url.length - 2);
			url = url.split("/");
			url.pop();
			url.pop();
			window.location = url.join("/");
			// location.reload();

			// }
		},
		error: function (error) {
			console.log(error);
		},
	});
});

$("#acceptOffer").click(function (e) {
	e.preventDefault();
	var spinner =
		'<div class="spinner-border" role="status"><span class="sr-only"></span></div>';
	$("#acceptOffer").html(spinner);
	$.ajax({
		url: "view/accept",
		type: "POST",
		data: {
			response: "declined",
			_token: "{{ csrf_token() }}",
		},
		success: function (response) {
			console.log(response);
			if (response) {
				$(".success").text(response.success);
				var url = window.location.href;
				if (url.substr(-1) == "/") url = url.substr(0, url.length - 2);
				url = url.split("/");
				url.pop();
				url.pop();
				window.location = url.join("/");
			}
		},
		error: function (error) {
			console.log(error);
		},
	});
	// location.reload();
});
