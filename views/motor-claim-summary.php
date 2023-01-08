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
    <strong>INCIDENT DETAILS</strong><br>
    <strong><span>Date:</span></strong><span id="sum_incidence_date"></span> 
    <br>
    <strong><span>Location:</span></strong><span id="sum_incidence_loc"></span> 
    <br>
    <strong><span>Description:</span></strong><span id="sum_incidence_desc"></span> 
    <br>
    <strong><span>Incident Caused by:</span></strong><span id="sum_incidence_causer"></span> 
    <br>
    <strong><span>Damage Description:</span></strong><span id="sum_damage_desc"></span> 
    <br>
    <strong><span>Current Vehicle Location:</span></strong><span id="sum_current_vehicle_loc"></span> 
    <br>
  </div>

  <div class="col-md-6">
    <strong>DRIVER DETAILS</strong><br>
    <strong><span>Owner Driving:</span></strong><span id="sum_owner_driving"></span> 
    <br>
    <div class="other_driv">
      <strong><span>Driver name:</span></strong><span id="sum_driver_name"></span> 
      <br>
      <strong><span>Driver licence:</span></strong><span id="sum_driver_licence"></span> 
      <br>
      <strong><span>Driver contact:</span></strong><span id="sum_driver_contact"></span> 
      <br>
      <strong><span>Driver-Owner relationship:</span></strong><span id="sum_driver_relation"></span> 
      <br>
      <strong><span>Owner consent to use:</span></strong><span id="sum_owner_consent"></span> 
      <br>
      <strong><span>Purpose of use:</span></strong><span id="sum_use_purporse"></span> 
      <br>
    </div>
  </div>
  
  <div class="col-md-6">
    <strong>REPROTED TO POLICE</strong>
    <br>
    <strong><span>Status:</span></strong><span id="sum_police_reported"></span> 
    <br>
    <strong><span>Officer Name:</span></strong><span id="sum_police_reported_name"></span>
    <br>
    <strong><span>Officer Station:</span></strong><span id="sum_police_reported_station"></span>
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