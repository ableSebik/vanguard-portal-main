<!DOCTYPE html>
<html>
<html lang="en">

<head>
  <title>Vanguard Assurance | Loss By Fire Claim</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/filepond.min.css">
  <link rel="stylesheet" href="css/filepond-plugin-image-preview.css">

  <link rel="stylesheet" href="css/style.css" />

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="js/filepond.min.js"></script>
  <script src="js/filepond-plugin-image-preview.min.js"></script>
  <script src="js/filepond-plugin-file-validate-type.js"></script>
  <script src="js/filepond-plugin-file-validate-size.js"></script>
  <script src="js/filepond-plugin-image-exif-orientation.js"></script>
  <script src="js/filepond.jquery.js"></script>
  <style>
    * {
      box-sizing: border-box;
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
      height: 7px;
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
      opacity: 1;
      background-color: red;
    }

    #nextBtn,
    #prevBtn,#submit {
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

      <form id="motor_cliamForm" action="#">
        <h1>Motor Cliam Form</h1>
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
          <section class="tab">
            <div class="col-md-12 col-sm-12">
              <div class="details">
                <?php include "views/client-policy-details.php" ?>
              </div>
            </div>
          </section>
        </div>
        <div class="tab">
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
              <input type="radio" name="loan_or_hire[option]" id="loan_or_hireyes" class="purpose-radio-input"
                onchange="ToggleRadioButtonViewControl('loan_or_hireyes', 'yes', 'loan_or_hire_')" value="yes" />
              <label for="loan_or_hireyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="loan_or_hire[option]" id="loan_or_hireno" class="purpose-radio-input"
                onchange="ToggleRadioButtonViewControl('loan_or_hireno', 'yes', 'loan_or_hire_')" value="no" checked />
              <label for="loan_or_hireno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
            </div>
            <span class="container" id="loan_or_hire_div">
              <div class="row">
                <div class="form-group col-lg-12" id="loan_or_hire_" style="display: none">
                  <input id="loan_or_hire_co" type="text" name="loan_or_hire[name_of_company]" class="form-control"
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
              <input type="radio" name="reported[option]" id="accidentreportedyes"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('accidentreportedyes', 'yes', 'police-details', 'class')"
                value="yes" />
              <label for="accidentreportedyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="reported[option]" id="accidentreportedno"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('accidentreportedno', 'yes', 'police-details', 'class')"
                value="no" checked="" />
              <label for="accidentreportedno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
            </div>

            <div class="form-group col-lg-6 col-md-6 police-details not-scanned-form">
              <input type="text" id="officer_name" name="reported[officer_name]" class="form-control officer_name"
                placeholder="Name Of Officer*" value="" aria-required="true" />
              <span class="error_msg" id="error_officer_name"></span>
            </div>
            <div class="form-group col-lg-6 col-md-6 police-details">
              <input type="text" id="officer_station" name="reported[officer_station]" class="form-control "
                placeholder="Station Of Officer *" value="" aria-required="true" />
              <span class="error_msg" id="error_officer_station"></span>
            </div>

            <script>
              $(".police-details").hide(0);
            </script>
            <br />
          </section>
        </div>
        <div class="tab">
          <section class="row body" id=" motor-claims-wizard-p-2" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-2" aria-hidden="true">

            <div class="col-lg-12">
              <label for="owner_driving">Were you the driver at the time of the
                incident?</label>
            </div>
            <div class="form-group col-lg-6 col-md-6">
              <input type="radio" name="owner_driving[option]" id="ownerdrivingyes"
                class="purpose-radio-input owner-driving" value="yes" checked=""
                onchange="ToggleRadioButtonViewControl('ownerdrivingyes', 'no', 'consent-choices')" />
              <label for="ownerdrivingyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="owner_driving[option]" id="ownerdrivingno"
                class="purpose-radio-input owner-driving" value="no"
                onchange="ToggleRadioButtonViewControl('ownerdrivingno', 'no', 'consent-choices')" />
              <label for="ownerdrivingno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
            </div>

            <span id="consent-choices" class="container" style="display: none">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_name" name="owner_driving[driver][driver_name]" required=""
                    class="form-control" placeholder="Name of driver *" value="" aria-required="true" />
                  <span class="error_msg" id="error_driver_name"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="tel" id="driver_contact" name="owner_driving[driver][driver_contact]" required=""
                    class="form-control" placeholder="Contact *" value="" aria-required="true" />
                  <span class="error_msg" id="error_driver_contact"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_license" name="owner_driving[driver][driver_license]"
                    class="form-control" placeholder="Driving license No *" value="" />
                  <span class="error_msg" id="error_driver_license"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="driver_owner_rel" name="owner_driving[driver][driver_owner_rel]"
                    class="form-control" placeholder="Driver Owner Relationship e.g. Employee, Relative etc."
                    value="" />
                </div>

                <div class="form-group col-lg-12 col-md-12 consent-choices">
                  <div>
                    <label for="vehicle_consent">Was the vehicle used with your consent?</label>
                  </div>
                  <input type="radio" name="owner_driving[driver][vehicle_consent][option]" id="vehicleconsentyes"
                    class="purpose-radio-input vehicle-consent" value="yes" />
                  <label for="vehicleconsentyes" class="purpose-radio-label">
                    <span class="label-text">Yes</span>
                  </label>
                  &nbsp; &nbsp;
                  <input type="radio" name="owner_driving[driver][vehicle_consent][option]" id="vehicleconsentno"
                    class="purpose-radio-input vehicle-consent" value="no" checked="" />
                  <label for="vehicleconsentno" class="purpose-radio-label">
                    <span class="label-text">No</span>
                  </label>
                </div>
              </div>
            </span>

            <div class="form-group col-md-12">
              <!-- <textarea name="owner_driving[purp_of_vehicle]" id="purp_of_vehicle" class="form-control" required=""
                placeholder="State fully the purpose of which the vehicle is being used."
                style="width: 100%; height: 100px">
              </textarea> -->
              <textarea name="" id="purp_of_vehicle" style="height: 100px;" spellcheck="yes"
                placeholder="State fully the purpose of which the vehicle is being used."
                class="form-control"></textarea>
              <span class="error_msg" id="error_purp_of_vehicle"></span>
            </div>
          </section>
        </div>
        <div class="tab">
          <section class="row body" id="motor-claims-wizard-p-3" role="tabpanel"
            aria-labelledby="motor-claims-wizard-h-3" aria-hidden="true">
            <!-- remember to put back required in the last 4 -->
            <div class="form-group col-lg-6 col-md-6">
              <input type="text" id="incident_location" required="" name="incident_details[location]"
                class="form-control" placeholder="Where did the incident occur *" value="" aria-required="true" />
              <span class="error_msg" id="error_incident_location"></span>
            </div>
            <div class="form-group col-lg-6 col-md-6">
              <input type="text" id="incident_date" required="" name="incident_details[date]"
                placeholder="Date of incident" title="" class="date form-control" aria-required="true" />
              <span class="error_msg" id="error_incident_date"></span>
            </div>

            <div class="form-group col-md-12">
              <textarea textarea="" id="incident_desc" name="incident_details[incident_description]" required=""
                title="What happened?" class="form-control"
                placeholder="Give full description of the incident, number of persons involved, speed etc *"
                style="width: 100%; height: 150px" aria-required="true"></textarea>
              <span class="error_msg" id="error_incident_desc"></span>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" id="incident_causer" name="incident_details[who_caused_it]" required=""
                class="form-control" placeholder="In your opinion, who caused the incident*" value=""
                aria-required="true" />
              <span class="error_msg" id="error_incident_causer"></span>
            </div>

            <div class="form-group col-md-12">
              <textarea textarea="" id="vehicle_damge_desc" name="incident_details[damage]" required=""
                title="Damage to vehicle?" class="form-control" placeholder="State the damage to the vehicle *"
                style="width: 100%; height: 150px" aria-required="true"></textarea>
              <span class="error_msg" id="error_vehicle_damge_desc"></span>
            </div>

            <div class="form-group col-lg-6">
              <input type="text" id="vehicle_location" required="" name="incident_details[current_location_of_vehicle]"
                class="form-control" placeholder="Where can the vehicle be seen * (Location/ Address)" value=""
                aria-required="true" />
              <span class="error_msg" id="error_vehicle_location"></span>
            </div>

            <div class="col-lg-12">
              <label for="incident_reported">Was a third party driver involved?
              </label>
            </div>

            <div class="form-group col-lg-12">
              <input type="radio" name="third_party[option]" id="tpinvolveyes"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('tpinvolveyes', 'yes', 'tpdriver')" value="yes" />
              <label for="tpinvolveyes" class="purpose-radio-label">
                <span class="label-text">Yes</span>
              </label>
              &nbsp; &nbsp;
              <input type="radio" name="third_party[option]" id="tpinvolveno"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('tpinvolveno', 'yes', 'tpdriver')" value="no" checked />
              <label for="tpinvolveno" class="purpose-radio-label">
                <span class="label-text">No</span>
              </label>
              &nbsp; &nbsp;

              <input type="radio" name="third_party[option]" id="tpinvolveunknown"
                class="purpose-radio-input incident_reported"
                onchange="ToggleRadioButtonViewControl('tpinvolveunknown', 'yes', 'tpdriver')" value="unknown" />
              <label for="tpinvolveunknown" class="purpose-radio-label">
                <span class="label-text">Yes but driver is absent/unknown</span>
              </label>
            </div>
            <span id="tpdriver" class="container" style="display: none;">
              <div class="row">
                <div class="form-group col-lg-12 col-md-12">
                  <input type="text" id="tp_fullname" name="third_party[fullname]" required="" class="form-control"
                    placeholder="Name of driver *" value="" aria-required="true" />
                  <span class="error_msg" id="error_tp_fullname"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="tel" id="tp_contact" name="third_party[contact]" required="" class="form-control"
                    placeholder="Contact *" value="" aria-required="true" />
                  <span class="error_msg" id="error_tp_contact"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_license_no" name="third_party[driver_license_no]" class="form-control"
                    placeholder="Driving license No *" value="" />
                  <span class="error_msg" id="error_tp_license_no"></span>
                </div>

                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_insurance_co" name="third_party[insurance_company]" class="form-control"
                    placeholder="Driver Insurance Company" value="" />
                </div>
                <div class="form-group col-lg-6 col-md-6">
                  <input type="text" id="tp_policy_id" name="third_party[policy_id]" class="form-control"
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
        <div class="tab">
          <section id="motor-claims-wizard-p-4" role="tabpanel" aria-labelledby="motor-claims-wizard-h-4" class="body"
            aria-hidden="true">
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
        <div class="tab">
          <section id="motor-claims-wizard-p-5" role="tabpanel" aria-labelledby="motor-claims-wizard-h-5" class="body"
            aria-hidden="true">
            <div id="witness_div" class="col-sm-12 clear-fix clearfix"></div>
            <br />
            <div class="col-sm-8 offset-sm-4 clear-fix clearfix">
              <div id="witness-control" class="pull-right">
                <button type="button" id="add_witness" class="btn btn-primary btn-sm action-call">
                  <i class="fa fa-plus-circle"></i> Add witness
                </button>
              </div>
            </div>
          </section>
        </div>
        <div class="tab">
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
            <button class="btn btn-primary" id="submit" type="submit">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
  <!-- <script src="js/jquery-3.3.1.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>




  <script src="js/popper.min.js"></script>
  <!-- <script src="js/bootstrap-datetimepicker.min.js"></script> -->
  <script src="js/jquery.sticky.js"></script>
  <a href=""></a>
  <script src="js/helperfunctions.js"></script>
  <script>
    

    $("#incident_date").datepicker({
      allowInputToggle: true,
      showTodayButton: true,
      dateFormat: "dd-mm-yy",
      maxDate: currentDate,
      date: null,
    });

    casualtycount = 0;
    $("#add_casualty").click(function () {
      casualtycount++
      addCasualty(casualtycount);
    })
    witnessCount = 0;
    $("#add_witness").click(function () {
      witnessCount++
      addWitness(witnessCount);
    })


    // files = input_id.filepond.getFiles();



  </script>

</body>

</html>