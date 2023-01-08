//Variables used throughout app
var valid = true;
var casualtyCount = 0;
var casualtyMotorClaimCount = 0;
var insuredPersonsCount = 0;
var beneficiariesCount = 0;
var witnessCount = 0;
var assetsCount = 0;
var vehicleCount = 0;
var witnessMotorClaimCount = 0;
var policeDetailsCount = 0;

vehicleUsage = $(".usage");
vehicleRegistrationYear = $("#reg-input");
bodyColor = $(".body_color");

legalAge = 18;
var year = new Date().getFullYear();
var month = new Date().getMonth();
var day = new Date().getDate();

var currentDate = new Date(year, month, day);
var defaultDoB = new Date(year - 18, month, day);

//Geneic functions
function defaultErrorModal(title = " Something went wrong !!", msg = "") {
  hideOverlay();
  var message = "<p> Please try again later </p>.";
  if (msg != "") {
    message = msg;
  }
  bootbox.alert({
    title: '<i class="fa fa-close" style="#f35b35"></i>' + title,
    message: msg,
  });
}

//specific functions for manipulating particular date fieldset
// function initDateInputs() {
//   dob = $("#dob");
//   dobClass = $(".dob");
//   yp = $(".date-year");
//   date = $("#incident_date");
//   incident_date = $("#incident_date");
//   manufactureDate = $("#manufacture");
//   reg = $("#registration");

//   dob.datetimepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     format: "MM-DD-YYYY",
//     maxDate: defaultDoB,
//     date: null,
//   });

//   date.datepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     format: "MM-DD-YYYY",
//     maxDate: currentDate,
//     date: null,
//   });

//   dobClass.datetimepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     format: "MM-DD-YYYY",
//     maxDate: defaultDoB,
//     date: null,
//   });

//   manufactureDate.datetimepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     viewMode: "years",
//     format: "YYYY",
//     maxDate: currentDate,
//     date: null,
//   });

//   reg.datetimepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     format: "YYYY",
//     viewMode: "years",
//   });

//   manufactureDate.on("dp.change", function (e) {
//     d = manufactureDate.val();
//     if (d === null || d == "") {
//       minDate = currentDate;
//       reg.prop("disabled", true);
//       reg.data("DateTimePicker").date(null);
//     } else {
//       minDate = d;
//       reg.prop("disabled", false);
//       reg.data("DateTimePicker").date(d).minDate(minDate).maxDate(currentDate);
//     }
//   });

//   policyStart = $(".date-duration-start");
//   policyStart.datetimepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     //"format": "DD MMMM YYYY",
//     format: "DD-MM-YYYY",
//     //"defaultDate": new Date(),
//     useCurrent: true,
//     minDate: new Date(),
//     icons: {
//       time: "fa fa-clock-o",
//       date: "fa fa-calendar",
//       up: "fa fa-arrow-up",
//       down: "fa fa-arrow-down",
//     },
//   });

//   incident_date.datetimepicker({
//     allowInputToggle: true,
//     showClose: true,
//     showClear: true,
//     showTodayButton: true,
//     //"format": "DD MMMM YYYY",
//     format: "DD-MM-YYYY",
//     //"defaultDate": new Date(),
//     useCurrent: true,
//     minDate: new Date(),
//   });
// }

//General app functions

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

function setProposerFields(proposerType) {
  showOverlay();
  template = "";
  if (proposerType == "agent" || proposerType == "broker") {
    template = ' <h4 class="ab-info">' + proposerType + " details</h4>";
    template += '<div class="form-group col-lg-6 col-md-6">';
    template +=
      '<input type="text" id="fullname"  name="proposer[proposer_type_name]"  required class="form-control" placeholder="Full name of ' +
      proposerType +
      ' applying on client behalf *" value="" />';
    template += "</div>";
    template += '<div class="form-group col-lg-6 col-md-6">';
    template +=
      '<input type="text" id="fullname"  name="proposer[proposer_type_email]" required class="form-control" placeholder="Email of ' +
      proposerType +
      '." value="" />';
    template += "</div>";
  }
  if (proposerType == "corporate") {
  }
  $("#agent-broker").html("");
  $("#agent-broker").append(template);
  hideOverlay();
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
  type = "id"
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
  }
}

function loadUploadInstructions(
  instructions = "",
  title = "Atention",
  icon = "fa-info-circle"
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

// //item type can be one of these
// function addItem(itemType = "", url = "") {
//   // alert(count);
//   let initDate = false;
//   let initColorPicker = false;
//   switch (itemType) {
//     case "casualty":
//       casualtyCount++;
//       count = casualtyCount;
//       break;
//     case "assets":
//       assetsCount++;
//       count = assetsCount;
//       initDate = true;
//       break;

//     case "casualtyMotorClaim":
//       casualtyMotorClaimCount++;
//       count = casualtyMotorClaimCount;
//       break;
//     case "witness":
//       witnessCount++;
//       count = witnessCount;
//       break;
//     case "witnessMotorClaim":
//       witnessMotorClaimCount++;
//       count = witnessMotorClaimCount;
//       break;
//     case "vehicle":
//       vehicleCount++;
//       count = vehicleCount;
//       initDate = true;
//       initColorPicker = true;
//       break;
//   }
//   if (!url) {
//     let url = "add-item&itemType=" + itemType + "&count=" + count;
//   }
//   $.get(url).then((resp) => {
//     let resetId = itemType + "-reset";
//     alert(resp);
//     console.log(jQuery(resp).find("#large"));
//     $("#" + itemType).append(resp);

//     if (initDate === true) {
//       initDateInputs();
//     }
//     if (initColorPicker === true) {
//       $(".body_color").colorpicker();
//     }
//     if ($("#" + resetId).length) {
//     } else {
//       $("#" + itemType + "-control").append(
//         '<button type="button" id="' +
//           resetId +
//           '" class="btn btn-sm action-call  btn-warning" onclick="resetItems(\'' +
//           itemType +
//           '\')"><i class="fa fa-trash"></i> Reset</button>'
//       );
//     }
//   });
// }

function resetItems(itemType) {
  let resetId = $("#" + itemType + "-reset");
  switch (itemType) {
    case "casualty":
      casualtyCount = 0;
      break;
    case "assets":
      assetsCount = 0;
      break;

    case "witness":
      witnessCount = 0;
      break;
    case "casualty_motor_claim":
      casualtyMotorClaimCount = 0;
      break;
    case "witnessMotorClaim":
      witnessMotorClaimCount = 0;
      break;

    case "vehicle":
      witnessCount = 0;
      break;

    case "policeDetails":
      policeDetailsCount = 0;
      break;
  }
  $("#" + itemType).html("");
  resetId.remove();
}

function removeItem(itemId, classCheck) {
  // console.log(itemId, classCheck);
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

// my own functions
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "";
  }

  if (n == x.length - 1) {
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("submit").style.display = "";
  } else {
    document.getElementById("nextBtn").style.display = "";
    document.getElementById("submit").style.display = "none";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n);
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");

  // This function will figure out which tab to display
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) {
    return false;
  }
  // Hide the current tab:
  x[currentTab].style.display = "none";

  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  // if (currentTab >= x.length) {
  //   // ... the form gets submitted:
  //   // document.getElementById("motor_cliamForm").submit();
  //   return false;
  // }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  const x = document.getElementsByClassName("tab");
  const step = document.querySelector(".step");

  if (currentTab == 0) {
    step.classList.add(
      "finish",
      "progress-bar",
      "progress-bar-striped",
      "progress-bar-animated"
    );
  }
  if (currentTab == 1) {
    validateTabOne();
  }
  if (currentTab == 2) {
    validateTabTwo();
  }
  if (currentTab == 3) {
    validateTab3();
  }
  if (currentTab == 4) {
    validateCausalty();
  }

  if (currentTab == 6) {
    processSummary();
  }

  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // Get all elements with the class "step"
  var steps = document.getElementsByClassName("step");

  // Remove the "active" class from all steps
  Array.from(steps).forEach((step) => step.classList.remove("active"));

  // Add the "active" class to the current step
  steps[n].classList.add("active");
  steps[n].classList.remove(
    "finish",
    "progress-bar",
    "progress-bar-striped",
    "progress-bar-animated"
  );
}

// This function deals with validation of the first tab form fields

function validateTabOne() {
  optionHirePurchaseyes = document.getElementById("loan_or_hireyes");
  optionHirePurchaseno = document.getElementById("loan_or_hireno");
  loan_or_hire_co = document.getElementById("loan_or_hire_co");
  error_loan_or_hire = document.getElementById("error_loan_or_hire");

  optionIssueReportedyes = document.getElementById("accidentreportedyes");
  optionIssueReportedno = document.getElementById("accidentreportedno");
  officer_name = document.getElementById("officer_name");
  officer_station = document.getElementById("officer_station");
  error_officer_name = document.getElementById("error_officer_name");
  error_officer_station = document.getElementById("error_officer_station");
  stepList = $(".step");
  valid = true;

  if (optionIssueReportedyes.checked) {
    if (officerStation.value == "" || officerStation.value == undefined) {
      officerStation.classList.add("invalid");
      error_officer_station.innerHTML = "This field is requied!";
      valid = false;
    }
    if (officerName.value == "" || officerName.value == undefined) {
      officerName.classList.add("invalid");
      error_officer_name.innerHTML = "This field is requied!";
      valid = false;
    }
  } else if (optionIssueReportedno.checked) {
    officerName.classList.remove("invalid");
    officerStation.classList.remove("invalid");
    error_officer_station.innerHTML = "";
    error_officer_name.innerHTML = "";
    valid = true;
  }
  if (optionHirePurchaseyes.checked) {
    if (loan_or_hire_co.value == "" || loan_or_hire_co.value == undefined) {
      // window.alert("Field is required");
      loan_or_hire_co.classList.add("invalid");
      error_loan_or_hire.innerHTML = "This field is requied!";
      valid = false;
    }
  }
  if (valid) {
    stepList[currentTab].classList.add(
      "finish",
      "progress-bar",
      "progress-bar-striped",
      "progress-bar-animated"
    );
  }
  return valid;
}
// end of first tab form validation

function validateTabTwo() {
  stepList = $(".step");
  const ownerdrivingno = document.getElementById("ownerdrivingno");
  const purp_of_vehicle = document.getElementById("purp_of_vehicle");
  const error_purp_of_vehicle = document.getElementById(
    "error_purp_of_vehicle"
  );

  const driver_name = document.getElementById("driver_name");
  const error_driver_name = document.getElementById("error_driver_name");

  const driver_contact = document.getElementById("driver_contact");
  const error_driver_contact = document.getElementById("error_driver_contact");

  const driver_license = document.getElementById("driver_license");
  const error_driver_license = document.getElementById("error_driver_license");
  valid = true;

  if (currentTab == 2) {
    if (purp_of_vehicle.value == "" || purp_of_vehicle.value == undefined) {
      purp_of_vehicle.classList.add("invalid");
      error_purp_of_vehicle.innerHTML = "This field is requied!";
      valid = false;
    }
  }

  if (ownerdrivingno.checked) {
    if (driver_name.value == "" || driver_name == undefined) {
      driver_name.classList.add("invalid");
      error_driver_name.innerHTML = "This field is requied!";
      valid = false;
    }
    if (driver_contact.value == "" || driver_contact == undefined) {
      driver_contact.classList.add("invalid");
      error_driver_contact.innerHTML = "This field is requied!";
      valid = false;
    }
    if (driver_license.value == "" || driver_license == undefined) {
      driver_license.classList.add("invalid");
      error_driver_license.innerHTML = "This field is requied!";
      valid = false;
    }
  }

  if (valid) {
    stepList[currentTab].classList.add(
      "finish",
      "progress-bar",
      "progress-bar-striped",
      "progress-bar-animated"
    );
  }
  return valid;
}
function validateTab3() {
  const incident_location = document.getElementById("incident_location");
  const incident_date = document.getElementById("incident_date");
  const incident_desc = document.getElementById("incident_desc");
  const incident_causer = document.getElementById("incident_causer");
  const vehicle_damge_desc = document.getElementById("vehicle_damge_desc");
  const vehicle_location = document.getElementById("vehicle_location");
  const tpinvolveyes = document.getElementById("tpinvolveyes");
  const tp_fullname = document.getElementById("tp_fullname");
  const tp_contact = document.getElementById("tp_contact");
  const tp_license_no = document.getElementById("tp_license_no");
  valid = true;

  if (currentTab == 3) {
    if (incident_location.value == "" || incident_location == undefined) {
      incident_location.classList.add("invalid");
      document.getElementById("error_incident_location").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (incident_date.value == "" || incident_date == undefined) {
      incident_date.classList.add("invalid");
      document.getElementById("error_incident_date").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (incident_desc.value == "" || incident_desc == undefined) {
      incident_desc.classList.add("invalid");
      document.getElementById("error_incident_desc").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (incident_causer.value == "" || incident_causer == undefined) {
      incident_causer.classList.add("invalid");
      document.getElementById("error_incident_causer").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (vehicle_damge_desc.value == "" || vehicle_damge_desc == undefined) {
      vehicle_damge_desc.classList.add("invalid");
      document.getElementById("error_vehicle_damge_desc").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (vehicle_location.value == "" || vehicle_location == undefined) {
      vehicle_location.classList.add("invalid");
      document.getElementById("error_vehicle_location").innerHTML =
        "This field is required!";
      valid = false;
    }

    // validation for the uploads
    let driver_lic_Front_upload = $("#drivers_licence_front");
    let driver_lic_Rear_upload = $("#drivers_licence_rear");
    let damaged_vehicle_pics_upload = $("#damaged_vehicle_pictures");
    let estimates_of_repair_upload = $("#estimates_of_repair");
    let police_report_upload = $("#police_report");
    let medical_reports_upload = $("#medical_reports");
  }

  if (tpinvolveyes.checked) {
    if (tp_fullname.value == "" || tp_fullname == undefined) {
      tp_fullname.classList.add("invalid");
      document.getElementById("error_tp_fullname").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (tp_contact.value == "" || tp_contact == undefined) {
      tp_contact.classList.add("invalid");
      document.getElementById("error_tp_contact").innerHTML =
        "This field is required!";
      valid = false;
    }
    if (tp_license_no.value == "" || tp_license_no == undefined) {
      tp_license_no.classList.add("invalid");
      document.getElementById("error_tp_license_no").innerHTML =
        "This field is required!";
      valid = false;
    }
  }
  stepList = $(".step");
  if (valid) {
    stepList[currentTab].classList.add(
      "finish",
      "progress-bar",
      "progress-bar-striped",
      "progress-bar-animated"
    );
  }
  return valid;
}

// validation for Add Casualty
function validateCausalty() {
  valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  //remove all invalid classes
  for (i = 0; i < y.length; i++) {
    y[i].classList.remove("invalid");
    valid = true;
  }
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].classList.add("invalid");
      // and set the current valid status to false:
      valid = false;
    }
  }
  console.log(valid);
  return valid;
}

// validation for Add witness
function validateWitness() {}

function addWitness(x) {
  witnessID = `witness${x}`;
  var witnessHTML = `
    <div class="row witness" id="${witnessID}">
    <div class="col-lg-12">
        <h6 class="title">
          <span class="count"></span> Witness Info:
          <div class="float-right">
            <i id="remove_${witnessID}" class="fa fa-times-circle item-remove pull-right"
              title="Remove this witness"></i>
          </div>
        </h6>
    </div>
    <script>
      $("#remove_${witnessID}").click(function(){
        let btnID = "remove_${witnessID}";
        let targetID = btnID.substr(7);
        $("#"+targetID).hide("fast")
      })
    </script>
    <div class="form-group col-lg-6 col-md-6">
      <input type="text" id="${witnessID}_name  name="witness[${x}]['name']" class="form-control witness_name" placeholder="Name *" value="" />
    </div>
    <div class="form-group col-lg-6 col-md-6">
        <input type="text" id="${witnessID}_contact name="witness[${x}]['contact']" class="form-control witness_contact" placeholder="Contact *" value="" />
    </div>
</div>
      `;
  $("#witness_div").append(witnessHTML);

  // casualtyCount++;
}
function addCasualty(x) {
  casualtyID = `casualty${x}`;
  var casualtyHTML = `
    <div
      class="row casualty_damage"
      id="${casualtyID}"
      style="margin-bottom: 1rem">
      <div class="col-sm-12">
        <h6 class="title">
          <span class="count"></span> Injury/Damage Info:
          <div class="float-right"> 
          <script>
            $("#remove_${casualtyID}").click(function(){
              let btnID = "remove_${casualtyID}";
              let targetID = btnID.substr(7);
              $("#"+targetID).hide("fast")
            })
          </script>           
            <i id="remove_${casualtyID}" class="fa fa-times-circle item-remove pull-right"
              title="Remove this casualty"></i>
          </div>
        </h6>
      </div>
      <div class="form-group col-md-4 col-sm-12">
        <input type="text" name="casualty[${x}]['name']" id="${casualtyID}_name"
        class="form-control" placeholder="Name" value="" />
        <span class="error_msg" id="error_${casualtyID}_name"></span>
      </div>
      <div class="form-group col-md-3 col-sm-12">
        <input type="text" name="casualty[${x}]['contact']" id="${casualtyID}_contact"
        class="form-control" placeholder="Contact" value="" />
        <span class="error_msg" id="error_${casualtyID}_contact"></span>
      </div>
      <div class="form-group col-md-5 col-sm-12" >
        <input type="text" name="casualty[${x}]['comments']" id="${casualtyID}_comments"
        class="form-control " placeholder="Comments" value="" />
      </div>
    </div>
      `;
  $("#casualty_damage").append(casualtyHTML);

  // casualtyCount++;
}

//////////////////////filePond inputs for uploads
// Initialize FilePond on the file input element with custom options
var drivers_licence_front = FilePond.create(
  document.querySelector("#drivers_licence_front"),
  {
    labelIdle:
      '<span style="font-size:14px">Driver licence top <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "left bottom",
  }
);
var drivers_licence_rear = FilePond.create(
  document.querySelector("#drivers_licence_rear"),
  {
    labelIdle:
      '<span style="font-size:14px">Driver licence rear <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "left bottom",
  }
);
var damaged_vehicle_pictures = FilePond.create(
  document.querySelector("#damaged_vehicle_pictures"),
  {
    labelIdle:
      '<span style="font-size:14px">Picture of damaged vehicle <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    allowMultiple: true,
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "left bottom",
  }
);
var estimates_of_repair = FilePond.create(
  document.querySelector("#estimates_of_repair"),
  {
    labelIdle:
      '<span style="font-size:14px">Estimates of repair <br>(required)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "left bottom",
  }
);
var police_report = FilePond.create(document.querySelector("#police_report"), {
  labelIdle: '<span style="font-size:14px">Police report</span>',
  minFileSize: "16kb",
  acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
  maxFileSize: "3MB",
  imagePreviewHeight: 130,
  imagePreviewWidth: 130,
  styleButtonRemoveItemPosition: "left bottom",
});
var medical_reports = FilePond.create(
  document.querySelector("#medical_reports"),
  {
    labelIdle:
      '<span style="font-size:14px">Medical reports <br>(if any)</span>',
    acceptedFileTypes: ["application/pdf", "image/png", "image/jpeg"],
    minFileSize: "16kb",
    maxFileSize: "3MB",
    imagePreviewHeight: 130,
    imagePreviewWidth: 130,
    styleButtonRemoveItemPosition: "right top",
  }
);

/////////////////////

/////////////////////submit event///////////////
function submitForm() {
  var form = document.getElementById("motor_cliamForm");
  var data = new FormData(form);

  console.log(data);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "controller/process-motor-claim.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log("Form data successfully submitted to PHP script");
    } else {
      console.error("Error submitting form data to PHP script");
    }
  };
  xhr.send(new FormData(document.getElementById("motor_cliamForm")));
}

document
  .getElementById("motor_cliamForm")
  .addEventListener("submit", submitForm);
//////////////////////////////////////////////////
