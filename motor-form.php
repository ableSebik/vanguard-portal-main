<!DOCTYPE html>
<html>
<html lang="en">

<head>
  <title>Vanguard Assurance | Loss By Fire Claim</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

  <link rel="stylesheet" href="css/style.css" />

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <style>
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

      <form id="motor_cliamForm" action="controller/process-motor-claim.php" method="post" enctype="multipart/form">
        <h1>Motor Claim Form</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="" style="margin-bottom: 20px;">
          <section class="row body" id="motor-claims-wizard-p-0" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-0" aria-hidden="false">
            <div class="col-md-12 col-sm-12">
              <div class="alert alert-info">
                Ensure all information are accurate to the best of your knowledge.
                <a href="#" onclick="loadUploadRequiments('claims', 'motor-claim')">See Required documents before
                  applying.<i class="fa fa-info-circle"></i>
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
                  <input id="loan_or_hire_co" type="text" name="loan_or_hire_co" class="form-control"
                    placeholder="If so state the name of finance company or lending organisation?" value="" />
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
              <input type="text" id="officer_name" name="officer_name" class="form-control officer_name"
                placeholder="Name Of Officer*" value="" />
              <span class="error_msg" id="error_officer_name"></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 police-details">
              <input type="text" id="officer_station" name="officer_station" class="form-control "
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
                  <input type="text" id="driver_name" name="driver_name" class="form-control"
                    placeholder="Name of driver *" value="" />
                  <span class="error_msg" id="error_driver_name"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="tel" id="driver_contact" name="driver_contact" class="form-control"
                    placeholder="Contact *" value="" />
                  <span class="error_msg" id="error_driver_contact"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_license" name="driver_license" class="form-control"
                    placeholder="Driving license No *" value="" />
                  <span class="error_msg" id="error_driver_license"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_owner_rel" name="driver_owner_rel" class="form-control"
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
                placeholder="State fully the purpose of which the vehicle is being used."
                class="form-control"></textarea>
              <span class="error_msg" id="error_purp_of_vehicle"></span>
            </div>
          </section>
        </div>
        <div class="tab" style="display:none">
          <section class="row body" id="motor-claims-wizard-p-3" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-3" aria-hidden="true">
            <!-- remember to put back required in the last 4 -->
            <div class="form-group col-lg-6 col-md-6">
              <input type="text" id="incident_location" name="incident_location" class="form-control"
                placeholder="Where did the incident occur *" value="" />
              <span class="error_msg" id="error_incident_location"></span>
            </div>
            <div class="form-group col-lg-6 col-md-6">
              <input type="text" id="incident_date" name="incident_date" placeholder="Date of incident" title=""
                class="date form-control" />
              <span class="error_msg" id="error_incident_date"></span>
            </div>

            <div class="form-group col-md-12">
              <textarea textarea="" id="incident_desc" name="incident_desc" title="What happened?" class="form-control"
                placeholder="Give full description of the incident, number of persons involved, speed etc *"
                style="width: 100%; height: 150px"></textarea>
              <span class="error_msg" id="error_incident_desc"></span>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" id="incident_causer" name="incident_causer" class="form-control"
                placeholder="In your opinion, who caused the incident*" value="" />
              <span class="error_msg" id="error_incident_causer"></span>
            </div>

            <div class="form-group col-md-12">
              <textarea textarea="" id="vehicle_damge_desc" name="vehicle_damge_desc" title="Damage to vehicle?"
                class="form-control" placeholder="State the damage to the vehicle *"
                style="width: 100%; height: 150px"></textarea>
              <span class="error_msg" id="error_vehicle_damge_desc"></span>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" id="vehicle_location" name="vehicle_location" class="form-control"
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
                  <input type="text" id="tp_fullname" name="tp_fullname" class="form-control"
                    placeholder="Name of driver *" value="" />
                  <span class="error_msg" id="error_tp_fullname"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="tel" id="tp_contact" name="tp_contact" class="form-control" placeholder="Contact *"
                    value="" />
                  <span class="error_msg" id="error_tp_contact"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_license_no" name="tp_license_no" class="form-control"
                    placeholder="Driving license No *" value="" />
                  <span class="error_msg" id="error_tp_license_no"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_insurance_co" name="tp_insurance_co" class="form-control"
                    placeholder="Driver Insurance Company" value="" />
                </div>
                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_policy_id" name="tp_policy_id" class="form-control"
                    placeholder="Driver Policy Number" value="" />
                </div>
              </div>
            </span>
            <br />
            <div class="col-lg-12">
              <h5>Document Uploads</h5>
            </div>
            <?php include_once 'shared/_upload_scripts.php'; ?>
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
            <button class="btn btn-danger" id="submit" type="submit" style="display:none">Submit</button>
          </div>
        </div>

      </form>
    </div>
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


    
        $("#drivers_licence_front").on("change",function(){
             
             var $input = $(this);
  
             var files = $input[0].files;
  
             var filename = files[0].name;

             var fileSize = files[0].size;

              /* 1024 = 1MB */
            var size = Math.round((fileSize / 1024));
          
          /* checking for less than or equals to 2MB file size */
          if (size <= 2*1024) {
           //   alert("Valid file size");
              /* file uploading code goes here... */
          } else {
              alert(
                "Invalid file size, please select a file less than or equal to 2mb size");
                $('#drivers_licence_front').val('');
          }
       
             var extension = filename.substr(filename.lastIndexOf("."));
  
             var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
  
             var isAllowed = allowedExtensionsRegx.test(extension);
  
             if(isAllowed){
              //   alert("File type is valid for the upload");
             }else{
                 alert("Invalid File Type.");
                $('#drivers_licence_front').val('');
             }
         });
         
         $("#drivers_licence_rear").on("change",function(){
          var $input = $(this);
          var files = $input[0].files;
          var filename = files[0].name;
          var fileSize = files[0].size;

          /* 1024 = 1MB */
          var size = Math.round((fileSize / 1024));
          
          /* checking for less than or equals to 2MB file size */
          if (size <= 2*1024) {
             // alert("Valid file size");
              /* file uploading code goes here... */
          } else {
              alert(
                "Invalid file size, please select a file less than or equal to 2mb size");
                 $('#drivers_licence_rear').val('');
          }
       
             var extension = filename.substr(filename.lastIndexOf("."));
  
             var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
  
             var isAllowed = allowedExtensionsRegx.test(extension);
  
             if(isAllowed){
              //   alert("File type is valid for the upload");
             }else{
                 alert("Invalid File Type.");
                 $('#drivers_licence_rear').val('');
             }
         });

         $("#damaged_vehicle_pictures").on("change",function(){
             
             var $input = $(this);
             var files = $input[0].files;
  
             var filename = files[0].name;

             var fileSize = files[0].size;

              /* 1024 = 1MB */
            var size = Math.round((fileSize / 1024));
          
          /* checking for less than or equals to 2MB file size */
          if (size <= 2*1024) {
            //  alert("Valid file size");
              /* file uploading code goes here... */
          } else {
              alert(
                "Invalid file size, please select a file less than or equal to 2mb size");
                 $('#damaged_vehicle_pictures').val('');
          }
       
             var extension = filename.substr(filename.lastIndexOf("."));
  
             var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
  
             var isAllowed = allowedExtensionsRegx.test(extension);
  
             if(isAllowed){
              //   alert("File type is valid for the upload");
             }else{
                 alert("Invalid File Type.");
                 $('#damaged_vehicle_pictures').val('');
             }
         });

         $("#estimates_of_repair").on("change",function(){
             
             var $input = $(this);
  
             var files = $input[0].files;
  
             var filename = files[0].name;

             var fileSize = files[0].size;

              /* 1024 = 1MB */
            var size = Math.round((fileSize / 1024));
          
          /* checking for less than or equals to 2MB file size */
          if (size <= 2*1024) {
             // alert("Valid file size");
              /* file uploading code goes here... */
          } else {
              alert(
                "Invalid file size, please select a file less than or equal to 2mb size");
                 $('#estimates_of_repair').val('');
          }
       
             var extension = filename.substr(filename.lastIndexOf("."));
  
             var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
  
             var isAllowed = allowedExtensionsRegx.test(extension);
  
             if(isAllowed){
               //  alert("File type is valid for the upload");
             }else{
                 alert("Invalid File Type.");
                 $('#estimates_of_repair').val('');
             }
         });

         $("#police_report").on("change",function(){
             
             var $input = $(this);
  
             var files = $input[0].files;
  
             var filename = files[0].name;

             var fileSize = files[0].size;

              /* 1024 = 1MB */
            var size = Math.round((fileSize / 1024));
          
          /* checking for less than or equals to 2MB file size */
          if (size <= 2*1024) {
             // alert("Valid file size");
              /* file uploading code goes here... */
          } else {
              alert(
                "Invalid file size, please select a file less than or equal to 2mb size");
                 $('#police_report').val('');
          }
       
             var extension = filename.substr(filename.lastIndexOf("."));
  
             var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
  
             var isAllowed = allowedExtensionsRegx.test(extension);
  
             if(isAllowed){
                // alert("File type is valid for the upload");
             }else{
                 alert("Invalid File Type.");
                 $('#police_report').val('');
             }
         });

         $("#medical_reports").on("change",function(){
             
             var $input = $(this);
  
             var files = $input[0].files;
  
             var filename = files[0].name;

             var fileSize = files[0].size;

              /* 1024 = 1MB */
            var size = Math.round((fileSize / 1024));
          
          /* checking for less than or equals to 2MB file size */
          if (size <= 2*1024) {
             // alert("Valid file size");
              /* file uploading code goes here... */
          } else {
              alert(
                "Invalid file size, please select a file less than or equal to 2mb size");
                 $('#medical_reports').val('');
          }
       
             var extension = filename.substr(filename.lastIndexOf("."));
  
             var allowedExtensionsRegx = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
  
             var isAllowed = allowedExtensionsRegx.test(extension);
  
             if(isAllowed){
                // alert("File type is valid for the upload");
             }else{
                 alert("Invalid File Type.");
                 $('#medical_reports').val('');
             }
         });
  </script>

  
</body>

</html>