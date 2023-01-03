<div class="row">
  <div class="col-md-6">
    <h4>Motor Claim Summary</h4>
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
    <strong>PURPOSE</strong>
  </div>
  <div class="col-md-6" id="police_reported_summary" style="display:none">
    <strong>REPROTED TO POLICE</strong>
    <br>
    <strong><span>Status:</span></strong><span id="police_reported">Yes</span> 
    <br>
    <strong><span>Officer Name:</span></strong><span id="police_reported_name">John Doe</span>
    <br>
    <strong><span>Officer Station:</span></strong><span id="police_reported_station">Station 1</span>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-12 col-md-6 col-lg-6">
    <strong>THIRD PARTY DRIVER</strong>
    <br>
    <strong style="margin-top: 1rem;">Full name:</strong> <span class="text-muted">John Doe</span>
    <br>
    <strong style="margin-top: 1rem;">Contact:</strong> <span class="text-muted">0241518155</span>
    <br>
    <strong style="margin-top: 1rem;">Driver license:</strong> <span class="text-muted">licenceID_here</span>

    <br>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-6">
    <strong>DRIVER INSURER DETAILS</strong>
    <br>
    <strong style="margin-top: 1rem;">Insurance company:</strong> <span class="text-muted">Star Insurance</span>
    <br>
    <strong style="margin-top: 1rem;">Policy ID:</strong> <span class="text-muted">DriverInsurance_id</span>
    <br>

    <br>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12 col-lg-12">
    <strong>THIRT PARTY OFFENCES</strong>
    <br>
    <strong style="margin-top: 1rem;">Driver commited any offence:</strong> <span class="text-muted">No</span>
    <br>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <h5 class="card-header">CASUALTY 
        <i style="border-radius:20px" class="btn btn-warning btn-sm fa fa-chevron-down pull-right" id="toggle_casualty_tbl"></i>
      </h5>
      
      <div class="card-body">
        <table class="table">
          <tr class="row">
            <th class="col-md-1" scope="col">#</th>
            <th class="col-md-3" scope="col">Full name</th>
            <th class="col-md-3" scope="col">Contact</th>
            <th class="col-md-4" scope="col">Comments</th>
            <th class="col-md-1" scope="col"></th>
        </tr>
        <tbody id="casualty_tbl_body" style="display:none">
          <tr class="row">
            <th class="col-md-1"  scope="row">1</th>
            <td class="col-md-3" >Mark Otto</td>
            <td class="col-md-3" >0241266800</td>
            <td class="col-md-4" >Bruised heel and right ankle</td>
            <td class="col-md-1" ></td>
          </tr>
          <tr class="row">
            <th class="col-md-1" scope="row">2</th>
            <td class="col-md-3">Mark Otto</td>
            <td class="col-md-3">0241266800</td>
            <td class="col-md-4">Bruised heel and right ankle</td>
            <td class="col-md-1"></td>
          </tr>
          <tr class="row">
            <th class="col-md-1" scope="row">3</th>
            <td class="col-md-3">Larry Griffin</td>
            <td class="col-md-3">02415675263</td>
            <td class="col-md-4">Second degree burns to the back</td>
            <td class="col-md-1"></td>
          </tr>
      </tbody>
    </table>
      </div>
    </div>

   <br><br>
  </div>
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <h5 class="card-header">WITNESS 
        <i style="border-radius:20px" class="btn btn-warning btn-sm fa fa-chevron-down pull-right" id="toggle_witness_tbl"></i>
      </h5>
      <div class="card-body">
        <table class="table">
          <tr class="row">
            <th class="col-md-1" scope="col">#</th>
            <th class="col-md-5" scope="col">Full name</th>
            <th class="col-md-6" scope="col">Contact</th>
        </tr>
        <tbody id="witness_tbl_body" style="display:none">
          <tr class="row">
            <th class="col-md-1"  scope="row">1</th>
            <td class="col-md-5" >Mark Otto</td>
            <td class="col-md-6" >0241266800</td>
          </tr>
          <tr class="row">
            <th class="col-md-1" scope="row">2</th>
            <td class="col-md-5">Mark Otto</td>
            <td class="col-md-6">0241266800</td>
          </tr>
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
    <span class="text-muted">Doc list</span>
    <br>
  </div>
</div>
<script>
  $('#toggle_casualty_tbl').click(function() {
    $('#casualty_tbl_body').toggle("fast");
  });
  $('#toggle_witness_tbl').click(function() {
    $('#witness_tbl_body').toggle("fast");
  });
</script>

<script>
  const optionHirePurchaseyes = document.getElementById("loan_or_hireyes");
  const optionHirePurchaseno = document.getElementById("loan_or_hireyes");
  const optionIssueReportedyes = document.getElementById("accidentreportedyes");
  const optionIssueReportedno = document.getElementById("accidentreportedno");
  const loan_or_hire_co = document.getElementById("loan_or_hire_co");
  const officerName = document.getElementById("officer_name");
  const officerStation = document.getElementById("officer_station");
  const error_loan_or_hire = document.getElementById("error_loan_or_hire");
  const error_officer_name = document.getElementById("error_officer_name");
  const error_officer_station = document.getElementById("error_officer_station");
  const ownerdrivingno = document.getElementById("ownerdrivingno");
  const purp_of_vehicle = document.getElementById("purp_of_vehicle");
  const error_purp_of_vehicle = document.getElementById("error_purp_of_vehicle");
  const driver_name = document.getElementById("driver_name");
  const error_driver_name = document.getElementById("error_driver_name");
  const driver_contact = document.getElementById("driver_contact");
  const error_driver_contact = document.getElementById("error_driver_contact");
  const driver_license = document.getElementById("driver_license");
  const error_driver_license = document.getElementById("error_driver_license");
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

</script>