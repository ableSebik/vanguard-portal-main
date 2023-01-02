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
  <div class="col-md-6">
    <strong>REPROTED TO POLICE</strong>
    <br>
    <strong><span>Status:</span></strong>Yes
    <br>
    <strong><span>Officer Name:</span></strong>Yes
    <br>
    <strong><span>Officer Station:</span></strong>Yes
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