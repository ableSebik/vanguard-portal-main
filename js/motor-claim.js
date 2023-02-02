//Variables used throughout app
var casualtyCount = 0;
var witnessCount = 0;
const witnesses = {};
const casualties = {};
const attachments = {};
var formData = new FormData();

var year = new Date().getFullYear();
var month = new Date().getMonth();
var day = new Date().getDate();

var currentDate = new Date(year, month, day);

$("#incident_date").datepicker({
  allowInputToggle: true,
  showTodayButton: true,
  dateFormat: "dd-mm-yy",
  maxDate: currentDate,
});

$("#add_casualty").click(function () {
  addCasualty(casualtyCount + 1);
  casualtyCount++;
});

$("#add_witness").click(function () {
  addWitness(witnessCount + 1);
  witnessCount++;
});

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
    valid = true;
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
    validateCausalty(casualtyCount);
  }

  if (currentTab == 5) {
    validateWitness(witnessCount);
    //After witness is validated call Summary page
    processSummary(casualties, witnesses);
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
  officerName = document.getElementById("officer_name");
  officerStation = document.getElementById("officer_station");
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
  valid = true;
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
    var attach_lic_front = document.getElementById("drivers_licence_front"); //required
    var attach_lic_rear = document.getElementById("drivers_licence_rear"); //required 
    var damage_proof = document.getElementById("damaged_vehicle_pictures"); //required & multiple
    var attach_est_repairs = document.getElementById("estimates_of_repair"); //required
    var attach_police_report = document.getElementById("police_report");
    var attach_medical_reports = document.getElementById("medical_reports"); //multiple

    if (attach_lic_front.files[0] == "" || attach_lic_front.files[0] == null) {
      valid = false;
      attach_lic_front.classList.add("invalid");
    } else {
      formData.append("attach_licence_front", attach_lic_front.files[0]);
      attachments["Licence front"] = "set";
      document.getElementById("sum_upload_licence_front").innerHTML =
        attachments["Licence front"];
    }

    if (attach_lic_rear.files[0] == "" || attach_lic_rear.files[0] == null) {
      valid = false;
      attach_lic_rear.classList.add("invalid");
    } else {
      formData.append("attach_Licence_rear", attach_lic_rear.files[0]);
      attachments["Licence rear"] = "set";
      document.getElementById("sum_upload_licence_rear").innerHTML =
        attachments["Licence rear"];
    }

    if (damage_proof.files.length == 0) {
      valid = false;
      damage_proof.classList.add("invalid");
    } else {
      for (var i = 0; i < damage_proof.files.length; i++) {
        formData.append("attach_damage_proof[]", damage_proof.files[i]);
      }
      attachments["Damage proof"] = "set";
      document.getElementById("sum_upload_damages").innerHTML =
        attachments["Damage proof"];
    }

    if (
      attach_est_repairs.files[0] == "" ||
      attach_est_repairs.files[0] == null
    ) {
      valid = false;
      attach_est_repairs.classList.add("invalid");
    } else {
      formData.append("attach_repair_est", attach_est_repairs.files[0]);
      attachments["Estimage repairs"] = "set";
      document.getElementById("sum_upload_est_of_repair").innerHTML =
        attachments["Estimage repairs"];
    }

    if (attach_police_report.files.length > 0) {
      formData.append("attach_police_report", attach_police_report);
      attachments["Police report"] = "set";
      document.getElementById("sum_upload_police_report").innerHTML =
        attachments["Police report"];
    }
    if (attach_medical_reports.files.length > 0) {
      for (var i = 0; i < attach_medical_reports.files.length; i++) {
        formData.append(
          "attach_medical_reports[]",
          attach_medical_reports.files[i]
        );
      }
      attachments["Medical reports"] = "set";
      document.getElementById("sum_upload_med_report").innerHTML =
        attachments["Medical reports"];
    }

    ///////////////////////////////

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
}

//nb: tab 5=witnessTab 4=casualty

// validation for Casualty
function validateCausalty(par1) {
  valid = true;
  stepList = $(".step");
  if (par1 == 0) {
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
  for (let i = 1; i <= par1; i++) {
    let casName = document.getElementById(`casualty${i}_name`);
    let casContact = document.getElementById(`casualty${i}_contact`);
    let casComment = document.getElementById(`casualty${i}_comments`);

    if (casName.value == "" || casName.value == null) {
      casName.classList.add("invalid");
      valid = false;
    }
    if (casContact.value == "" || casContact.value == null) {
      casContact.classList.add("invalid");
      valid = false;
    }
    if (casComment.value == "" || casComment.value == null) {
      casComment.classList.add("invalid");
      valid = false;
    }

    if (valid) {
      casualties[`${i}`] = {
        name: casName.value,
        contact: casContact.value,
        comment: casComment.value,
      };
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

// validation for witness
function validateWitness(par1) {
  valid = true;
  if (par1 === 0) {
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

  for (let i = 1; i <= par1; i++) {
    let witName = document.getElementById(`witness${i}_name`);
    let witContact = document.getElementById(`witness${i}_contact`);

    if (witName.value == "" || witName.value == null) {
      witName.classList.add("invalid");
      valid = false;
    }
    if (witContact.value == "" || witContact.value == null) {
      witContact.classList.add("invalid");
      valid = false;
    }
    if (valid) {
      witnesses[`${i}`] = {
        name: witName.value,
        contact: witContact.value,
      };
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

const addWitness = (x) => {
  const witnessID = `witness${x}`;
  const $witnessDiv = $(`<div class="row witness" id="${witnessID}">
        <div class="col-lg-12">
            <h6 class="title">
                <span class="count"></span> Witness Info:
                <div class="float-right">
                    <i class="fa fa-times-circle item-remove pull-right" title="Remove this witness"></i>
                </div>
            </h6>
        </div>
        <div class="form-group col-lg-6 col-md-6">
            <input type="text" id="${witnessID}_name" name="witness[${x}]['name']" class="form-control ${witnessID}_name" placeholder="Name *" />
        </div>
        <div class="form-group col-lg-6 col-md-6">
            <input type="text" id="${witnessID}_contact" name="witness[${x}]['contact']" class="form-control ${witnessID}_contact" placeholder="Contact *"/>
        </div>
    </div>`);
  $witnessDiv.appendTo("#witness_div");
  $witnessDiv.find(".item-remove").on("click", () => {
    $witnessDiv.remove();
    // check if item exists in the witnesses obj, remove if yes
    if (`${x}` in witnesses) {
      delete witnesses[`${x}`];
    }
    witnessCount--;
  });
};
function addCasualty(x) {
  const casualtyID = `casualty${x}`;
  const casualtyDiv = $(`
    <div
      class="row casualty_damage"
      id="${casualtyID}"
      style="margin-bottom: 1rem">
      <div class="col-sm-12">
        <h6 class="title">
          <span class="count"></span> Injury/Damage Info:
          <div class="float-right"> 
            <i id="remove_${casualtyID}" class="fa fa-times-circle item-remove pull-right"
              title="Remove this casualty"></i>
          </div>
        </h6>
      </div>
      <div class="form-group col-md-4 col-sm-12">
        <input type="text" name="casualty[${x}]['name']" id="${casualtyID}_name"
        class="form-control" placeholder="Name" value="" />
      </div>
      <div class="form-group col-md-3 col-sm-12">
        <input type="text" name="casualty[${x}]['contact']" id="${casualtyID}_contact"
        class="form-control" placeholder="Contact" value="" />
      </div>
      <div class="form-group col-md-5 col-sm-12" >
        <input type="text" name="casualty[${x}]['comments']" id="${casualtyID}_comments"
        class="form-control " placeholder="Comments" value="" />
      </div>
    </div>
  `);
  casualtyDiv.appendTo("#casualty_damage");
  casualtyDiv.find(".item-remove").on("click", () => {
    casualtyDiv.remove();
    // check if item exists in the witnesses obj, remove if yes
    if (`${x}` in casualties) {
      delete casualties[`${x}`];
    }
    casualtyCount--;
  });
}
// Add a submit event listener to the form
const form = document.getElementById("motor_cliamForm");
form.addEventListener("submit", function (event) {
  event.preventDefault();

  // Append the casualties and witnesses objects to the FormData object
  formData.append("casualties", JSON.stringify(casualties));
  formData.append("witnesses", JSON.stringify(witnesses));

  // Send the FormData object to the server using an AJAX request
  fetch("controller/process-motor-claim.php", {
    method: "POST",
    body: formData,
  })
    .then(function (response) {
      if (response.ok) {
        // check if response status is ok
        return response.text();
      }
      throw new Error("An error occured while processing the request");
    })
    .then(function (responseText) {
      console.log(responseText);
    })
    .catch(function (error) {
      //console.log(error);
    });
});
