<!DOCTYPE html>
<html>
<html lang="en">

<head>
  <title>Vanguard Assurance | Motor Claim</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

  <link rel="stylesheet" href="css/style-new.css" />

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <style>
    .claim_container {
      margin-top: 50px;
      padding: 100px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
    }

    * {
      box-sizing: border-box;
    }

    .form-group {
      margin: 10px 0;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid,
    textarea.invalid {
      border-color: #ff8080;
      box-shadow: 0 0 0 0.1rem rgba(255, 0, 0, 0.25);
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 8px;
      background-color: #ebebeb;
      border: none;
      border-radius: 5px;
      display: inline-block;

    }

    .claim_progressBar {
      justify-content: space-around;
      margin-bottom: 20px;
    }

    .step.active {
      opacity: 0.5;
      background-color: #2e93ff;
    }

    #nextBtn,
    #prevBtn,
    #submit {
      padding: 10px 20px;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #2e93ff;
    }

    .error_msg {
      color: #ff4141;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <i class="fa fa-solid fa-envelope"></i>
      <a class="nav-item" href="#">vacmails@vanguardassurance.com</a>
      <i class="fa fa-sharp fa-solid fa-phone"></i>
      <a class="nav-item" href="#">+233 244 334 407</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><i class="fa fa-brands fa-twitter"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-brands fa-facebook-f"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-brands fa-linkedin"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><i class="fa fa-brands fa-instagram"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>
  <div class="container">
    <div class="claim_container">
      <div class="row gutter-3 claim_progressBar">
        <span class="col-md-1 col-1 step"></span>
        <span class="col-md-1 col-1 step"></span>
        <span class="col-md-2 col-2 step"></span>
        <span class="col-md-2 col-2 step"></span>
        <span class="col-md-2 col-2 step"></span>
        <span class="col-md-2 col-2 step"></span>
        <span class="col-md-1 col-1 step"></span>
      </div>

      <form id="motor_cliamForm" enctype="multipart/form">
        <h1>Motor Claim Form</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="" style="margin-bottom: 20px;">
          <section class="row body" id="motor-claims-wizard-p-0" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-0" aria-hidden="false">
            <div class="col-md-12 col-sm-12">
              <div class="alert alert-info">
                Ensure all information are accurate to the best of your knowledge.
                <a href="#" data-bs-toggle="modal" data-bs-target="#requirements">
                  <i class="fa fa-info-circle"></i> See requirements here.
                </a>
              </div>
            </div>
          </section>
          <section class="tab" style="display:none">
            <div class="col-md-12 col-sm-12">
              <div class="details">
                <?php include "views/client-policy-details.php" ?>
              </div>
            </div>
          </section>
        </div>
        <div class="tab" style="display:none">
          <section class="row body" id="motor-claims-wizard-p-1" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-1" aria-hidden="true">
            <!-- this div displays the Client Detials && Policy details -->
            <div class="col-md-12 col-sm-12">
              <div id="confirm-details"></div>
            </div>

            <div class="col-lg-12 not-scanned-form">
              <label for="vehicle_agreement">Is the vehicle the subject of a hire purchase or loan
                agreement?</label>
            </div>
            <div class="form-group col-lg-6 col-md-6 not-scanned-form">
              <input type="radio" name="loan_or_hire" id="loan_or_hireyes" class="purpose-radio-input"
                onchange="ToggleRadioButtonViewControl('loan_or_hireyes', 'yes', 'loan_or_hire_')" value="yes" />
              <label for="loan_or_hireyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="loan_or_hire" id="loan_or_hireno" class="purpose-radio-input"
                onchange="ToggleRadioButtonViewControl('loan_or_hireno', 'yes', 'loan_or_hire_')" value="no" checked />
              <label for="loan_or_hireno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
            </div>
            <span class="container" id="loan_or_hire_div">
              <div class="row">
                <div class="form-group col-lg-12" id="loan_or_hire_" style="display: none">
                  <input id="loan_or_hire_co" type="text" name="loan_or_hire_co" class="form-control text-capitalize"
                    placeholder="If so state the name of finance/lending organisation?" value="" />
                  <span class="error_msg" id="error_loan_or_hire"></span>
                </div>
              </div>
            </span>

            <div class="col-lg-12 not-scanned-form">
              <label for="incident_reported">Has the incident been reported to the police?
              </label>
            </div>

            <div class="form-group col-lg-12 not-scanned-form">
              <input type="radio" name="accidentreported" id="accidentreportedyes"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('accidentreportedyes', 'yes', 'police-details', 'class')"
                value="yes" />
              <label for="accidentreportedyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="accidentreported" id="accidentreportedno"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('accidentreportedno', 'yes', 'police-details', 'class')"
                value="no" checked="" />
              <label for="accidentreportedno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
            </div>

            <div class="form-group col-lg-6 col-md-6 police-details not-scanned-form">
              <input type="text" id="officer_name" name="officer_name" class="form-control officer_name text-capitalize"
                placeholder="Name Of Officer*" value="" />
              <span class="error_msg" id="error_officer_name"></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 police-details">
              <input type="text" id="officer_station" name="officer_station" class="form-control text-capitalize"
                placeholder="Station Of Officer *" value="" />
              <span class="error_msg" id="error_officer_station"></span>
            </div>

            <script>
              $(".police-details").hide(0);
            </script>
            <br />
          </section>
        </div>
        <div class="tab" style="display:none">
          <section class="row body" id=" motor-claims-wizard-p-2" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-2" aria-hidden="true">

            <div class="col-lg-12">
              <label for="owner_driving">Were you the driver at the time of the
                incident?</label>
            </div>
            <div class="form-group col-lg-6 col-md-6">
              <input type="radio" name="ownerdriving" id="ownerdrivingyes" class="purpose-radio-input owner-driving"
                value="yes" checked=""
                onchange="ToggleRadioButtonViewControl('ownerdrivingyes', 'no', 'consent-choices')" />
              <label for="ownerdrivingyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="ownerdriving" id="ownerdrivingno" class="purpose-radio-input owner-driving"
                value="no" onchange="ToggleRadioButtonViewControl('ownerdrivingno', 'no', 'consent-choices')" />
              <label for="ownerdrivingno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
            </div>

            <div id="consent-choices" class="container" style="display: none">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_name" name="driver_name" class="form-control text-capitalize"
                    placeholder="Name of driver *" value="" />
                  <span class="error_msg" id="error_driver_name"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="tel" id="driver_contact" name="driver_contact" class="form-control "
                    placeholder="Contact *" value="" />
                  <span class="error_msg" id="error_driver_contact"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_license" name="driver_license" class="form-control "
                    placeholder="Driving license No *" value="" />
                  <span class="error_msg" id="error_driver_license"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_owner_rel" name="driver_owner_rel" class="form-control text-capitalize"
                    placeholder="Driver-Owner Relationship e.g. Employee, Relative etc." value="" />
                </div>

                <div class="form-group col-lg-12 col-md-12 consent-choices">
                  <div>
                    <label for="vehicle_consent">Was the vehicle used with your consent?</label>
                  </div>
                  <input type="radio" name="vehicleconsent" id="vehicleconsentyes"
                    class="purpose-radio-input vehicle-consent" value="yes" />
                  <label for="vehicleconsentyes" class="purpose-radio-label">
                    <span class="label-text">Yes</span>
                  </label>
                  &nbsp; &nbsp;
                  <input type="radio" name="vehicleconsent" id="vehicleconsentno"
                    class="purpose-radio-input vehicle-consent" value="no" checked="" />
                  <label for="vehicleconsentno" class="purpose-radio-label">
                    <span class="label-text">No</span>
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group col-md-12">
              <textarea name="purp_of_vehicle" id="purp_of_vehicle" style="height: 100px;" spellcheck="yes"
                placeholder="State fully the purpose of which the vehicle was being used."
                class="form-control "></textarea>
              <span class="error_msg" id="error_purp_of_vehicle"></span>
            </div>
          </section>
        </div>
        <div class="tab" style="display:none">
          <section class="row body" id="motor-claims-wizard-p-3" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-3" aria-hidden="true">
            <!-- remember to put back required in the last 4 -->
            <div class="form-group col-lg-6 col-md-6">
              <input type="text" id="incident_location" name="incident_location" class="form-control "
                placeholder="Where did the incident occur *" value="" />
              <span class="error_msg" id="error_incident_location"></span>
            </div>
            <div class="form-group col-lg-6 col-md-6">
              <input type="text" id="incident_date" name="incident_date" placeholder="Date of incident" title=""
                class="date form-control" />
              <span class="error_msg" id="error_incident_date"></span>
            </div>

            <div class="form-group col-md-12">
              <textarea textarea="" id="incident_desc" name="incident_desc" title="What happened?" class="form-control "
                placeholder="Give full description of the incident, number of persons involved, speed etc *"
                style="width: 100%; height: 150px"></textarea>
              <span class="error_msg" id="error_incident_desc"></span>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" id="incident_causer" name="incident_causer" class="form-control "
                placeholder="In your opinion, who caused the incident*" value="" />
              <span class="error_msg" id="error_incident_causer"></span>
            </div>

            <div class="form-group col-md-12">
              <textarea textarea="" id="vehicle_damge_desc" name="vehicle_damge_desc" title="Damage to vehicle?"
                class="form-control " placeholder="State the damage to the vehicle *"
                style="width: 100%; height: 150px"></textarea>
              <span class="error_msg" id="error_vehicle_damge_desc"></span>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" id="vehicle_location" name="vehicle_location" class="form-control "
                placeholder="Where can the vehicle be seen * (Location/ Address)" value="" />
              <span class="error_msg" id="error_vehicle_location"></span>
            </div>

            <div class="col-lg-12">
              <label for="incident_reported">Was a third party driver involved?
              </label>
            </div>

            <div class="form-group col-lg-12">
              <input type="radio" name="tpinvolve" id="tpinvolveyes" class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('tpinvolveyes', 'yes', 'tpdriver')" value="yes" />
              <label for="tpinvolveyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="tpinvolve" id="tpinvolveno" class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('tpinvolveno', 'yes', 'tpdriver')" value="no" checked />
              <label for="tpinvolveno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
              &nbsp; &nbsp;

              <input type="radio" name="tpinvolve" id="tpinvolveunknown"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('tpinvolveunknown', 'yes', 'tpdriver')" value="unknown" />
              <label for="tpinvolveunknown" class="purpose-radio-label">
                <span class="label-text">Yes but driver is absent/unknown</span>
              </label>
            </div>
            <span id="tpdriver" class="container" style="display: none;">
              <div class="row">
                <div class="form-group col-lg-12 col-md-12">
                  <input type="text" id="tp_fullname" name="tp_fullname" class="form-control "
                    placeholder="Name of driver *" value="" />
                  <span class="error_msg" id="error_tp_fullname"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="tel" id="tp_contact" name="tp_contact" class="form-control " placeholder="Contact *"
                    value="" />
                  <span class="error_msg" id="error_tp_contact"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_license_no" name="tp_license_no" class="form-control text-uppercase"
                    placeholder="Driving license No *" value="" />
                  <span class="error_msg" id="error_tp_license_no"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_insurance_co" name="tp_insurance_co" class="form-control "
                    placeholder="Driver Insurance Company" value="" />
                </div>
                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_policy_id" name="tp_policy_id" class="form-control text-uppercase"
                    placeholder="Driver Policy Number" value="" />
                </div>
              </div>
            </span>
            <br />
            <div class="col-lg-12">
              <h5>Document Uploads</h5>
            </div>
            <?php include_once 'views/upload_docs.php'; ?>
          </section>
        </div>
        <div class="tab" style="display:none">
          <section id="motor-claims-wizard-p-4" role="tabpanel" aria-labelledby="motor-claims-wizard-h-4" class="body"
            aria-hidden="true">
            <h5><label for="">Were there any casualty?</label></h5><br>
            <div id="casualty_damage" class="col-sm-12 clear-fix clearfix"></div>
            <br />
            <div class="col-sm-8 offset-sm-4 clear-fix clearfix">
              <div id="casualty_damage-control" class="pull-right">
                <button type="button" id="add_casualty" class="btn btn-primary btn-sm action-call">
                  <i class="fa fa-plus-circle"></i> Add casualty
                </button>
              </div>
            </div>
          </section>
        </div>
        <div class="tab" style="display:none">
          <section id="motor-claims-wizard-p-5" role="tabpanel" aria-labelledby="motor-claims-wizard-h-5" class="body"
            aria-hidden="true">
            <h5><label for="">Were there any witness(es)?</label></h5><br>
            <div id="witness_div" class="col-sm-12 clear-fix clearfix"></div>
            <br />
            <div class="col-sm-8 offset-sm-4 clear-fix clearfix">
              <div id="witness-control" class="pull-right">
                <button type="button" id="add_witness" class="btn btn-primary btn-sm action-call">
                  <i class="fa fa-plus-circle"></i> Add witness
                </button>
                <input type="text" id="hidden_witCount" value="" hidden>
              </div>
            </div>
          </section>
        </div>
        <div class="tab" id="summaryPage" style="display:none">
          <section>
            <div class="col-md-12 col-sm-12">
              <div class="details">
                <?php include "views/motor-claim-summary.php" ?>
              </div>
            </div>
          </section>
        </div>
        <div>
          <hr>
          <button class="btn btn-primary pull-left" type="button" id="prevBtn" onclick="nextPrev(-1)">
            Previous
          </button>
          <div class="pull-right">
            <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            <button class="btn btn-primary" id="submit" style="display:none">Submit</button>
          </div>
        </div>

      </form>
    </div>
    <br><br><br>
  </div>


<!-- <script src="js/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/moment.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/helperfunctions.js"></script>
<script src="js/motor-claim.js"></script>
<script src="js/motor-claim-summary.js"></script>

<script>
  $("#incident_date").datepicker({
    allowInputToggle: true,
    showTodayButton: true,
    dateFormat: "dd-mm-yy",
    maxDate: currentDate,
  });

  
  var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    
  //check licence front
  $("#drivers_licence_front").on("change",function(){
    var $input = $(this);
    var files = $input[0].files;
    var filename = files[0].name;
    var fileSize = files[0].size;
    var extension = filename.substr(filename.lastIndexOf("."));
    var isAllowed = allowedExtensionsRegx.test(extension);
    
    /* checking for less than or equals to 3MB file size */
    if (fileSize > 3145728){
      alert("File is too large, file should be less than 3MB");
      $('#drivers_licence_front').val('');
    }
    if(!isAllowed){
      alert("Invalid File Type.");
      $('#drivers_licence_front').val('');
    }
  });
         
  $("#drivers_licence_rear").on("change",function(){
    var $input = $(this);
    var files = $input[0].files;
    var filename = files[0].name;
    var fileSize = files[0].size;
    var extension = filename.substr(filename.lastIndexOf("."));
    var isAllowed = allowedExtensionsRegx.test(extension);
          
    /* checking for less than or equals to 3MB file size */
    if (fileSize > 3145728) {
      alert("File is too large, file should be less than 3MB");
      $('#drivers_licence_rear').val('');
    }
    if(!isAllowed){
      alert("Invalid File Type.");
      $('#drivers_licence_rear').val('');
    }
  });

  $("#damaged_vehicle_pictures").on("change", function(){
    var $input = $(this);
    var files = $input[0].files;
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var filename = file.name;
      var fileSize = file.size;
      var extension = filename.substr(filename.lastIndexOf("."));
      var isAllowed = allowedExtensionsRegx.test(extension);

      /* checking for less than or equals to 3MB file size */
      if (fileSize > 3145728) {
        alert("File is too large, file should be less than 3MB");
        $('#damaged_vehicle_pictures').val('');
        break;
      }
      if (!isAllowed) {
        alert("Invalid File Type.");
        $('#damaged_vehicle_pictures').val('');
        break;
      }
    }
  });


  $("#estimates_of_repair").on("change",function(){
    var $input = $(this);
    var files = $input[0].files;
    var filename = files[0].name;
    var fileSize = files[0].size;
    var extension = filename.substr(filename.lastIndexOf("."));
    var isAllowed = allowedExtensionsRegx.test(extension);
    
    /* checking for less than or equals to 3MB file size */
    if (fileSize > 3145728){
      alert("File is too large, file should be less than 3MB");
      $('#estimates_of_repair').val('');
    }
    if(!isAllowed){
     alert("Invalid File Type.");
     $('#estimates_of_repair').val('');
    }
  });

  $("#police_report").on("change",function(){
    var $input = $(this);
    var files = $input[0].files;
    var filename = files[0].name;
    var fileSize = files[0].size;
    var extension = filename.substr(filename.lastIndexOf("."));  
    var isAllowed = allowedExtensionsRegx.test(extension);
   
    /* checking for less than or equals to 3MB file size */
    if (fileSize > 3145728) {
      alert("File is too large, file should be less than 3MB");
      $('#police_report').val('');
    }
    if(!isAllowed){
      alert("Invalid File Type.");
      $('#police_report').val('');
    }
  });

  $("#medical_reports").on("change", function(){
    var $input = $(this);
    var files = $input[0].files;
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var filename = file.name;
      var fileSize = file.size;
      var extension = filename.substr(filename.lastIndexOf("."));
      var isAllowed = allowedExtensionsRegx.test(extension);

      /* checking for less than or equals to 3MB file size */
      if (fileSize > 3145728) {
        alert("File is too large, file should be less than 3MB");
        $('#medical_reports').val('');
        break;
      }
      if (!isAllowed) {
        alert("Invalid File Type.");
        $('#medical_reports').val('');
        break;
      }
    }
  });
</script>
  <!-- loading animation -->
  <div class="loadingoverlay" style="display:none">
    <div class="loadingoverlay_element">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"
        style="width: 70%; height: 70%; fill: rgb(187, 187, 187);">
        <circle r="80" cx="500" cy="90" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="500" cy="910" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="90" cy="500" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="910" cy="500" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="212" cy="212" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="788" cy="212" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="212" cy="788" style="fill: rgb(187, 187, 187);"></circle>
        <circle r="80" cx="788" cy="788" style="fill: rgb(187, 187, 187);"></circle>
      </svg>
    </div>
  </div>
  <!-- end loading animation -->

  <!-- Declaration Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-modal="true" id="declaration_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Declaration <i class="fa fa-spin fa-spinner"></i></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" id="declarationCloseBtn" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            I declare that the statement above is true to the best of my knowledge and belief. 
            I agree to leave all matters regarding claims and litigation arising from this 
            accident and covered by my insurance policy in the hands of Vanguard Assurance
            Company Limited. They are authorized to pursue or settle these matters as they 
            deem appropriate, without requiring further input from me. I also pledge to 
            provide the company with any assistance or information they may require.
          </p>
          <p style="font-weight: bold;">
            The company does not admit liability by the issue of this form.
          </p>
          <div class="form-group row">
            <div class="col-lg-6">
              Signed:
              <span id="signed"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="agreeDeclare" class="purpose-radio-label">
              <span class="label-text">I Agree</span>
            </label>
            <input type="checkbox" name="agreeDeclare" id="agreeDeclare" class="agreeDeclare"
              onclick="toggleAgree('agreeDeclare', '.bootbox-accept')" value="agree">
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" id="declareDismiss" class="btn btn-primary"><i class="fa fa-times"></i> Cancel
            </button>
            <button type="button" class="btn btn-primary bootbox-accept" id="declareAgree" data-bs-dismiss="modal" disabled="">
              <i class="fa fa-check"></i>
              Accept
            </button>
          </div>
        </div>
      </div>
      <!-- <script>
        $('span#signed').html('')
        $('span#signed').append($('#fullname').val())
      </script> -->
    </div>
  </div>

  <!-- Requirement modal -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-modal="true" id="requirements">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-info-circle"></i> Required document uploads for this form
          </h5>
        </div>
        <div class="modal-body">
          <div class="bootbox-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <p>
                    Please make sure you have the following documents ready for upload. Documents
                    accepted are of the format: jpg, png, pdf
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <span class="label-text">Drivers licence front &nbsp;</span>
                  <span class="text-danger" style="font-size: smaller;">(required)</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">                  
                  <span class="label-text">Drivers licence rear &nbsp;</span>
                  <span class="text-danger" style="font-size: smaller;">(required)</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">                  
                  <span class="label-text">Damaged vehicle pictures &nbsp;</span>
                  <span class="text-danger" style="font-size: smaller;">(required)</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">                  
                  <span class="label-text">Estimates of repair &nbsp;</span>
                  <span class="text-danger" style="font-size: smaller;">(required)</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">                  
                  <span class="label-text">Police report &nbsp;</span>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">                  
                  <span class="label-text">Medical reports &nbsp;</span>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" data-bs-dismiss="modal" class="btn btn-primary">
            <i class="fa fa-check"></i> Proceed
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Record not found modal -->
  <div class="modal fade" tabindex="-1" id="policyError" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-lg">
      <div class=" modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-close" style="color:#f35b35"></i> Record not found</h5>
          <button type="button" class="bootbox-close-button close" aria-hidden="true">??</button>
        </div>
        <div class="modal-body">
          <div class="bootbox-body">
            <p>The policy you are looking for does not exist or your policy has expired. Please try again.
              <br>If problem persists, please contact customer care
            </p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary bootbox-accept">OK</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Claim submitted modal -->
  <div class="modal fade" tabindex="-1" id="submitSuccess" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-lg">
      <div class=" modal-content">
        <div class="modal-body text-center">
          <div class="alert alert-success">
            <i class="fa fa-check" style="font-size: 100px;"></i>
            <p>Your claim has been submitted successfully.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>