var year = new Date().getFullYear();
var month = new Date().getMonth();
var day = new Date().getDate();

var currentDate = new Date(year, month, day);
var defaultDoB = new Date(year - 18, month, day);

//General app functions
// function checkUploads(itemID) {
//   var itemId = document.getElementById(itemID);
// }
function showOverlay() {
	$("body").LoadingOverlay("show", {
		background: "rgba(0 , 0, 0, 0.7)",
		zIndex: 2,
		imageColor: "#bbb",
	});
}

function hideOverlay() {
	$("body").LoadingOverlay("hide");
}

function toggleAgree(checkbox_id, button) {
	checkbox = $("#" + checkbox_id);
	checkboxState = checkbox.prop("checked");
	continueButton = $(button);
	continueState = !checkboxState;
	continueButton.prop("disabled", continueState);
}

function setCoverTypeFeilds(proposerType) {}

function initColorPicker() {
	$(".body_color").colorpicker();
}

function loadUploadRequiments(type, subtype) {
	let url = "?controller=_get-requirement&type=" + type + "&subtype=" + subtype;
	content = $.post(url, function (data) {
		var title = "Required document uploads for this form";
		loadUploadInstructions(data, title);
	}).fail((jqXHR, errorMsg) => {
		hideOverlay();
		console.log(jqXHR.responseText, errorMsg);
	});
}

// I'm experimenting on this
function ToggleRadioButtonViewControl(
	RadioInputId,
	radioVal,
	targetContent = string,
	type = "id",
) {
	$id = $("#" + RadioInputId);
	$target = $("#" + targetContent);
	if (type == "class") {
		$target = $("." + targetContent);
	}

	if ($id.val() == radioVal) {
		$target.show("fast");
	} else {
		$target.hide("fast");
		$($target).find("input, textarea").val("");
	}
}

// $("a.policy_card").click(function (event) {
// 	event.preventDefault();
// 	let target = $(this).attr("href");
// 	$(".loadingoverlay").show();
// 	setTimeout(function () {
// 		window.location.href = target;
// 	}, 1000);
// });

function loadUploadInstructions(
	instructions = "",
	title = "Atention",
	icon = "fa-info-circle",
) {
	showOverlay();
	setTimeout(function () {
		hideOverlay();
		bootbox.dialog({
			title: "<i class='fa " + icon + "'></i> " + title,
			message: instructions,
			size: "large",
			onEscape: false,
			closeButton: false,
			buttons: {
				confirm: {
					label: '<i class="fa fa-check"></i> Proceed',
					//className: "btn-proceed\" disabled ",
					//className: "btn-proceed",
					className: 'btn-primary btn-proceed" id="btn-proceed"',
					//className: "btn-primary btn-proceed\" id=\"btn-proc\" disabled "
				},
			},
		});
	}, 800);
}

// function resetItems(itemType) {
//   let resetId = $("#" + itemType + "-reset");
//   switch (itemType) {
//     case "casualty":
//       casualtyCount = 0;
//       break;
//     case "assets":
//       assetsCount = 0;
//       break;

//     case "witness":
//       witnessCount = 0;
//       break;
//     case "casualty_motor_claim":
//       casualtyMotorClaimCount = 0;
//       break;
//     case "witnessMotorClaim":
//       witnessMotorClaimCount = 0;
//       break;

//     case "vehicle":
//       witnessCount = 0;
//       break;

//     case "policeDetails":
//       policeDetailsCount = 0;
//       break;
//   }
//   $("#" + itemType).html("");
//   resetId.remove();
// }

function removeItem(itemId, classCheck) {
	let $reset = $("#" + classCheck + "-reset");
	$("#" + itemId).remove();
	if ($("." + classCheck).length > 0) {
	} else {
		$reset.remove();
	}
	console.log($("#" + classCheck).length);
}

// I'm experimenting on this
function appear(inputId, formval, itemType, count = null, url = null) {
	$id = $("#" + inputId);

	if ($id.val() == formval) {
		if (!url) {
			url = "?controller=add-item&itemType=" + itemType + "&count=" + count;
		}
		content = $.post(url, function (data) {
			changeContent(itemType + "_" + count, data);
		});
	} else {
		changeContent(itemType + "_" + count, "");
	}
}

function toggleDataTable(tableId) {
	tableData = $("#" + tableId);
	dataControl = $("#" + tableId + "_data_control");
	tableData.toggle(300, () => {
		if (tableData.is(":visible")) {
			dataControl.removeClass("icon-chevron-circle-down");
			dataControl.addClass("icon-chevron-circle-up");
		} else if (tableData.is(":hidden")) {
			dataControl.removeClass("icon-chevron-circle-up");
			dataControl.addClass("icon-chevron-circle-down");
		}
	});
}

function redirectTo(url, time = 1000) {
	setTimeout((e) => {
		window.location.replace(url);
	}, time);
}

function changeContent(div = String, content = "", type = "id") {
	$section = $("." + div);
	if (type === "id") {
		$section = $("#" + div);
	}
	$section.html(content);
}

function createPrintButton(id, title, label) {
	$print = '<div class="row not-this">';
	$print +=
		'<div class="col-lg-6 col-md-6 col-sm-6 offset-sm-6  offset-md-6  offset-lg-6"> ';
	$print += '<span class="float-right mute printer">';
	$print +=
		'<a href="#" onclick=\'print("' +
		id +
		'", "' +
		title +
		'")\' class="p-3 m-0">';
	$print += label + ' <span class="icon-print"></span>';
	$print += "</a>";
	$print += "</span>";
	$print += "</div>";
	$print += "</div>";

	return $print;
}

function disableRequiredFields() {
	$("input").attr("required", false);
	$("textarea").attr("required", false);
	$("select").attr("required", false);
}
