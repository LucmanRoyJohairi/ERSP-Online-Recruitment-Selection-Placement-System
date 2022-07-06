jQuery(document).ready(function ($) {
	// $('#txtnumber').keydown(function (e) {
	//   var key = e.charCode  e.keyCode  0;
	//   $text = $(this);
	//   if (key !== 8 && key !== 9) {
	//       if ($text.val().length === 4) {
	//           $text.val($text.val() + '-');
	//       }
	//       if ($text.val().length === 8) {
	//           $text.val($text.val() + '-');
	//       }

	//   }

	//   return (key == 8  key == 9  key == 46  (key >= 48 && key <= 57)  (key >= 96 && key <= 105));
	// });
	// Back to top button
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$(".back-to-top").fadeIn("slow");
		} else {
			$(".back-to-top").fadeOut("slow");
		}
	});
	$(".back-to-top").click(function () {
		$("html, body").animate(
			{
				scrollTop: 0,
			},
			1500,
			"easeInOutExpo"
		);
		return false;
	});

	// Stick the header at top on scroll
	$("#header").sticky({
		topSpacing: 0,
		zIndex: "50",
	});

	// Initiate the wowjs animation library
	new WOW().init();

	// Initiate superfish on nav menu
	$(".nav-menu").superfish({
		animation: {
			opacity: "show",
		},
		speed: 400,
	});

	// Mobile Navigation
	if ($("#nav-menu-container").length) {
		var $mobile_nav = $("#nav-menu-container").clone().prop({
			id: "mobile-nav",
		});
		$mobile_nav.find("> ul").attr({
			class: "",
			id: "",
		});
		$("body").append($mobile_nav);
		$("body").prepend(
			'<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>'
		);
		$("body").append('<div id="mobile-body-overly"></div>');
		$("#mobile-nav")
			.find(".menu-has-children")
			.prepend('<i class="fa fa-chevron-down"></i>');

		$(document).on("click", ".menu-has-children i", function (e) {
			$(this).next().toggleClass("menu-item-active");
			$(this).nextAll("ul").eq(0).slideToggle();
			$(this).toggleClass("fa-chevron-up fa-chevron-down");
		});

		$(document).on("click", "#mobile-nav-toggle", function (e) {
			$("body").toggleClass("mobile-nav-active");
			$("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
			$("#mobile-body-overly").toggle();
		});

		$(document).click(function (e) {
			var container = $("#mobile-nav, #mobile-nav-toggle");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				if ($("body").hasClass("mobile-nav-active")) {
					$("body").removeClass("mobile-nav-active");
					$("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
					$("#mobile-body-overly").fadeOut();
				}
			}
		});
	} else if ($("#mobile-nav, #mobile-nav-toggle").length) {
		$("#mobile-nav, #mobile-nav-toggle").hide();
	}

	// Smooth scroll for the menu and links with .scrollto classes
	$(".nav-menu a, #mobile-nav a, .scrollto").on("click", function () {
		if (
			location.pathname.replace(/^\//, "") ==
				this.pathname.replace(/^\//, "") &&
			location.hostname == this.hostname
		) {
			var target = $(this.hash);
			if (target.length) {
				var top_space = 0;

				if ($("#header").length) {
					top_space = $("#header").outerHeight();

					if (!$("#header").hasClass("header-fixed")) {
						top_space = top_space - 20;
					}
				}

				$("html, body").animate(
					{
						scrollTop: target.offset().top - top_space,
					},
					1500,
					"easeInOutExpo"
				);

				if ($(this).parents(".nav-menu").length) {
					$(".nav-menu .menu-active").removeClass("menu-active");
					$(this).closest("li").addClass("menu-active");
				}

				if ($("body").hasClass("mobile-nav-active")) {
					$("body").removeClass("mobile-nav-active");
					$("#mobile-nav-toggle i").toggleClass("fa-times fa-bars");
					$("#mobile-body-overly").fadeOut();
				}
				return false;
			}
		}
	});

	// Testimonials carousel (uses the Owl Carousel library)
	$(".testimonials-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		responsive: {
			0: {
				items: 1,
			},
			768: {
				items: 2,
			},
			900: {
				items: 3,
			},
		},
	});
});

// const prevBtns = document.querySelectorAll(".btn-prev");
// const nextBtns = document.querySelectorAll(".btn-next");
// const progress = document.getElementById("progress");
// const formSteps = document.querySelectorAll(".form-step");
// const progressSteps = document.querySelectorAll(".progress-step");
// if($('#register-form').length > 0){
//     $('#register-form').validate({
//       rules: {
//         email: {
//           required : true,
//           maxlength: 50,
//           email: true,
//         },
//         password: {
//           minlength: 8,
//         },
//         password_confirm : {
//           minlength : 8,
//           equalTo : "#password"
//         }
//       },
//       messages: {
//         email: {
//           maxlength : '*Email should not exceed 50 characters',
//           maxlength : '*you must enter be a valid email',
//         },
//         password: {
//           required : '*This field cannot be left blank',
//           minlength : '*password must be at least 8 characters',
//         }
//       }

//     });

//   }//if
// let formStepsNum = 0;
// nextBtns.forEach((btn) => {

//   btn.addEventListener("click", () => {

//     formStepsNum++;
// console.log('progress: ' + formStepsNum);

//     // if (form.valid() == true){
//       updateFormSteps();
//       updateProgressbar();
//     // }

//   });
// });

prevBtns.forEach((btn) => {
	btn.addEventListener("click", () => {
		formStepsNum--;
		updateFormSteps();
		updateProgressbar();
	});
});

function updateFormSteps() {
	formSteps.forEach((formStep) => {
		formStep.classList.contains("form-step-active") &&
			formStep.classList.remove("form-step-active");
	});

	formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
	progressSteps.forEach((progressStep, idx) => {
		if (idx < formStepsNum + 1) {
			progressStep.classList.add("progress-step-active");
		} else {
			progressStep.classList.remove("progress-step-active");
		}
	});

	const progressActive = document.querySelectorAll(".progress-step-active");

	progress.style.width =
		((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

/** job offer accept */

function showStuff(id) {
	var secondPage = document.getElementById("second-page");
	var displaySetting = secondPage.style.display;
	document.getElementById(id).style.display = "none";
	if (displaySetting == "block") {
		secondPage.style.display = "none";
	} else {
		secondPage.style.display = "block";
	}
}
//login
const inputs = document.querySelectorAll(".input");

function addcl() {
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl() {
	let parent = this.parentNode.parentNode;
	if (this.value == "") {
		parent.classList.remove("focus");
	}
}

inputs.forEach((input) => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

function showPreview(event) {
	if (event.target.files.length > 0) {
		var src = URL.createObjectURL(event.target.files[0]);
		var preview = document.getElementById("file-ip-1-preview");
		preview.src = src;
		preview.style.display = "block";
	}
}

//timeline
$(".showSingle").on("click", function () {
	$(this).addClass("selected").siblings().removeClass("selected");
	$(".targetDiv").hide();
	$("#div" + $(this).data("target")).show();
});
$(".showSingle").first().click();

//change timeline
$(".showSingle2").on("click", function () {
	$(this).addClass("selected").siblings().removeClass("selected");
	$(".targetDiv2").hide();
	$("#div" + $(this).data("target")).show();
});
$(".showSingle2").first().click();

$(document).ready(function () {
	$(document).on("change", ".btn-file :file", function () {
		var input = $(this),
			label = input.val().replace(/\\/g, "/").replace(/.*\//, "");
		input.trigger("fileselect", [label]);
	});

	$(".btn-file :file").on("fileselect", function (event, label) {
		var input = $(this).parents(".input-group").find(":text"),
			log = label;

		if (input.length) {
			input.val(log);
		} else {
			if (log) alert(log);
		}
	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$("#img-upload").attr("src", e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function () {
		readURL(this);
	});
});
$("#chooseFile").bind("change", function () {
	var filename = $("#chooseFile").val();
	if (/^\s*$/.test(filename)) {
		$(".file-upload").removeClass("active");
		$("#noFile").text("No file chosen...");
	} else {
		$(".file-upload").addClass("active");
		$("#noFile").text(filename.replace("C:\\fakepath\\", ""));
	}
});
$("#file-upload").change(function () {
	var filepath = this.value;
	var m = filepath.match(/([^\/\\]+)$/);
	var filename = m[1];
	$("#filename").text(filename);
});

$("#file-upload").change(function () {
	var i = $(this).prev("label").clone();
	var file = $("#file-upload")[0].files[0].name;
	$(this).prev("label").text(file);
});

$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});
