<div class="row">
  <div class="col-md-6">
    <h4>Summary</h4>
  </div>
  <div class="col-md-6 pull-right">
    <span class="float-right">
      <img src="" alt="">
    </span>
  </div>
</div>
<?php include 'client-policy-details.php'; ?>
<hr>
<div class="row">
  <div class="col-md-6">
    <strong>VEHICLE LOAN/HIRE</strong>
    <strong><span>Status:</span></strong>
      <span class="text-upper text-muted" id="sum_loanHire_status"></span>
    <br>
    <div id="loan_hire_details" style="display:none">
      <strong><span>Lending/Finance institution:</span></strong>
      <span class="text-upper text-muted" id="sum_loanHire_co"></span>
    </div>
    <br>
  </div>
  <div class="col-md-6">
    <strong>REPROTED TO POLICE</strong>
    <br>
    <strong><span>Status:</span></strong>
      <span class="text-upper text-muted" id="sum_police_reported"></span>
    <br>
    <strong><span>Officer Name:</span></strong>
    <span class="text-upper text-muted" id="sum_police_reported_name"></span>
    <br>
    <strong><span>Officer Station:</span></strong>
    <span class="text-upper text-muted" id="sum_police_reported_station"></span>
  </div>
</div>
<hr>
<br>
<div class="row">
  <div class="col-md-6">
    <strong>INCIDENT DETAILS</strong><br>
    <strong><span>Date:</span></strong><span class="text-upper text-muted" id="sum_incidence_date"></span>
    <br>

    <strong><span>Location:</span></strong><span class="text-upper text-muted" id="sum_incidence_loc"></span>

    <br>
    <strong><span>Incident Narative:</span></strong><span class="text-upper text-muted" id="sum_incidence_desc"></span>
    <br>

    <strong><span>Incident Caused by:</span></strong><span class="text-upper text-muted" id="sum_incidence_causer"></span>
    <br>

    <strong><span>Damage Description:</span></strong><span class="text-upper text-muted" id="sum_damage_desc"></span>
    <br>
    <strong><span>Current Vehicle Location:</span></strong><span class="text-upper text-muted" id="sum_current_vehicle_loc"></span>
    <br>
  </div>

  <div class="col-md-6">
    <strong>DRIVER DETAILS</strong><br>
    <strong><span>Driver:</span></strong><span id="sum_driver"></span> 
    <br>
    <div id="sum_other_driver">
      <strong><span>Driver name:</span></strong><span class="text-upper text-muted" id="sum_driver_name"></span> 
      <br>
      <strong><span>Driver licence:</span></strong><span class="text-upper text-muted" id="sum_driver_licence"></span> 
      <br>
      <strong><span>Driver contact:</span></strong><span class="text-upper text-muted" id="sum_driver_contact"></span> 
      <br>
      <strong><span>Driver-Owner relationship:</span></strong><span class="text-upper text-muted" id="sum_driver_relation"></span> 
      <br>
      <strong><span>Owner consent to use:</span></strong><span class="text-upper text-muted" id="sum_owner_consent"></span> 
      <br>
      <strong><span>Purpose of vehicle use:</span></strong><span class="text-upper text-muted" id="sum_use_purporse"></span> 
      <br>
    </div>
  </div>
  
</div>
<hr>
<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-6">
    <strong>THIRD PARTY DRIVER</strong>
    <br>
    <strong>Third party driver involved?:</strong> <span id="sum_tpd_status" class="text-upper text-muted"></span>
    <br>
    <div class="sum_tp_details">
      <strong>Full name:</strong> <span id="sum_tpd_name" class="text-upper text-muted"></span>
      <br>
      <strong>Contact:</strong> <span id="sum_tpd_contact" class="text-upper text-muted"></span>
      <br>
      <strong>Driver license:</strong> <span id="sum_tpd_driv_lic" class="text-upper text-muted"></span>
      <br>
    </div>
    
  </div>
  <div class="col-sm-12 col-md-6 col-lg-6 sum_tp_details">
    <strong>DRIVER INSURER DETAILS</strong>
    <br>
    <strong>Insurance company:</strong> <span id="sum_tpd_insurance_co" class="text-upper text-muted" ></span>
    <br>
    <strong>Policy ID:</strong> <span id="sum_tpd_policy_id" class="text-upper text-muted" ></span>
    <br>
    <br>
  </div>
</div>

<hr>
<div class="row">
  <div class="col-md-12 col-lg-12">
    <strong id="cas_empty" style="display:none">CASUALTY <span>None</span></strong>
    <div class="card" id="cas_card">
      <h5 class="card-header">CASUALTY 
        <i style="border-radius:20px" class="btn btn-warning btn-sm fa fa-chevron-down pull-right" id="toggle_casualty_tbl"></i>
      </h5>
      
      <div class="card-body">
        <table class="table" id = "sum_casualty_tbl">
          <tr class="row" id="cas_tbl_head">
            <th class="col-md-1" scope="col">#</th>
            <th class="col-md-4" scope="col">Full name</th>
            <th class="col-md-3" scope="col">Contact</th>
            <th class="col-md-4" scope="col">Comments</th>
          </tr>
          <tbody id="casualty_tbl_body">
            <!--  -->
          </tbody>
        </table>
      </div>
    </div>

   <br><br>
  </div>
  <div class="col-md-12 col-lg-12">
    <strong id="wit_empty" style="display:none">WITNESS <span>None</span></strong>
    <div class="card" id="wit_card">
      <h5 class="card-header">WITNESS
        <i style="border-radius:20px" class="btn btn-warning btn-sm fa fa-chevron-down pull-right" id="toggle_witness_tbl"></i>
      </h5>
      <div class="card-body">
        <table class="table wit-tbl" id="sum_witness_tbl">
          <tr class="row" id="wit_tbl_head">
            <th class="col-md-1" scope="col">#</th>
            <th class="col-md-5" scope="col">Full name</th>
            <th class="col-md-6" scope="col">Contact</th>
          </tr>
          <tbody id="witness_tbl_body">
            <!--  -->
          </tbody>
        </table>
      </div>
    </div>

   
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12 col-lg-12">
    <strong>UPLOADED DOCUMENTS</strong>
    <br>
    <strong>Driver's Licence (front): </strong> <span id="sum_upload_licence_front" class="text-upper text-muted"></span><br>
    <strong>Driver's Licence (rear): </strong> <span id="sum_upload_licence_rear" class="text-upper text-muted"></span><br>
    <strong>Proof of Damage(s): </strong> <span id="sum_upload_damages" class="text-upper text-muted"></span><br>
    <strong>Estimate of Repair: </strong> <span id="sum_upload_est_of_repair" class="text-upper text-muted"></span><br>
    <strong>Police Report: </strong> <span id="sum_upload_police_report" class="text-upper text-muted"></span><br>
    <strong>Medical Report(s): </strong> <span id="sum_upload_med_report" class="text-upper text-muted"></span><br>
    <br>
  </div>
</div>
<script>
    $('#toggle_casualty_tbl').click(function() {
      $('#sum_casualty_tbl').toggle("slow");
    });
    $('#toggle_witness_tbl').click(function() {
      $('#sum_witness_tbl').toggle("slow");
    });  
</script>