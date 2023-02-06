<?php

$msg_body.=`
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .mail_body {
            margin: 50px 50px;
            padding: 50px;
            background-color: #fff;
            border-radius: 0;
            box-shadow: rgba(28, 17, 91, 0.199) 0px 48px 100px 0px;
        }
    </style>
</head>
`;

$msg_body.=`
<body>
    <div class="container">
        <div class="mail_body">
            <div>
                <h1>Motor Insurace Claim</h1>
                <h3>Summary</h3>
            </div>
            <hr>
            <div>
                <h5>Policy Details</h5><br>                
                <span>
                    <span style="font-weight: 500;">Policy ID:</span><span> P100220120210003800</span>
                </span>
                <br>
                <span style="font-weight: 500;">Cover type:</span><span> Comprehensive</span>
                <br>
                <span style="font-weight: 500;">Branch</span><span> Accra Main</span>
                <br>
                <span style="font-weight: 500;">Vehicle usage:</span><span> X.1PRIVATEINDIVIDUAL</span>
                <br>
                <span style="font-weight: 500;">Duration</span><span> 2022-06-28 - 2023-06-27</span>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h5>Owner Details</h5>
                    <span style="font-weight: 500;">First Name:</span><span> Jon</span>
                    <br>
                    <span style="font-weight: 500;">Last name:</span><span> Doe</span>
                    <br>
                    <span style="font-weight: 500;">Other Name:</span><span> </span>
                    <br>
                    <span style="font-weight: 500;">Occupation:</span><span> Bank Manager</span>
                    <br>
                    <span style="font-weight: 500;">Postal address:</span><span> </span>
                    <br>
                    <span style="font-weight: 500;">Residential address:</span><span> </span>
                </div>
                <div class="col-md-6">
                    <h5>Vehicle Details</h5>
                    <span style="font-weight: 500;">Chasis number:</span><span> 0120210003800</span>
                    <br>
                    <span style="font-weight: 500;">Make:</span><span> Toyota</span>
                    <br>
                    <span style="font-weight: 500;">Model:</span><span> Hillux</span>
                    <br>
                    <span style="font-weight: 500;">Year of manufacture:</span><span> 2015</span>
                    <br>
                    <span style="font-weight: 500;">Cubic capacity:</span><span> 2500</span>
                    <br>
                    <span style="font-weight: 500;">Vehicle registration:</span><span> GR 9966-15</span>
                </div>
            </div>
            <hr>
`;
            $msg_body .=`            
            <div class="row">
                <div class="col-md-6">
                    <h5>Loan/Hire</h5>
                    <span style="font-weight: 500;">Status:</span><span> $loan_or_hire.</span><br>`;
                    if($loan_or_hire=="yes"){
                        $msg_body.=`
                        <span style="font-weight: 500;">Finance/Lending organization:</span><span> $loan_or_hire_co</span><br>`;
                    }
                    $msg_body.=`
                </div>`;
                $msg_body.=`
                <div class="col-md-6">
                    <h5>Reported to Police</h5>
                    <span style="font-weight: 500;">Status</span><span> $accidentreported</span><br>`;
                    if($accidentreported=="yes"){
                        $msg_body.=`
                        <span style="font-weight: 500;">Officer name</span><span> $officer_name</span><br>
                        <span style="font-weight: 500;">Officer station</span><span> $officer_stationl</span>`;
                    }
                    $msg_body.=`
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5>Incident Details</h5>
                    <span style="font-weight: 500;">Date:</span><span> </span><br>
                    <span style="font-weight: 500;">Location:</span><span> </span><br>
                    <span style="font-weight: 500;">Incident narative:</span><span> </span><br>
                    <span style="font-weight: 500;">Incident caused by:</span><span> </span><br>
                    <span style="font-weight: 500;">Damage description:</span><span> </span><br>
                    <span style="font-weight: 500;">Damage vehicle location:</span><span> </span>
                </div>
                <div class="col-md-6">
                    <h5>Driver Details</h5>`;
                    if($ownerdriving=="yes"){
                        $driver="Owner";
                        $msg_body.=`<span style="font-weight: 500;">Driver:</span><span> $driver</span><br>`;
                    }else{
                        $msg_body.=`
                        <span style="font-weight: 500;">Driver name:</span><span> $driver_name</span><br>
                        <span style="font-weight: 500;">Driver contact:</span><span> $driver_contact</span><br>
                        <span style="font-weight: 500;">Driver licence:</span><span> $driver_licence</span><br>
                        <span style="font-weight: 500;">Driver-Owner relationship:</span><span> $driver_owner_rel</span><br>
                        <span style="font-weight: 500;">Consent of use:</span><span> $vehicleconsent</span><br>
                        `;
                    }
                    $msg_body.=`
                    <span style="font-weight: 500;">Purpose of vehicle use:</span><span> $purp_of_vehicle</span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5>Third-Party driver</h5>
                    <span style="font-weight: 500;">Third-party driver involved?</span><span> $tpinvolve</span><br>`;
                    if($tpinvolve=="yes"){
                        $msg_body.=`
                        <span style="font-weight: 500;">Full name</span><span> $tp_fullname</span><br>
                        <span style="font-weight: 500;">Contact</span><span> $tp_contact</span><br>
                        <span style="font-weight: 500;">Drivers' licence</span><span> $tp_licence_no</span>
                        `;
                    }
                    $msg_body.=`
                </div>`;
                if($tpinvolve=="yes"){
                    $msg_body.=`
                    <div class="col-md-6">
                        <h5>Third-Party Insurace Details</h5>
                        <span style="font-weight: 500;">Insurace company:</span><span> $tp_insurance_co</span><br>
                        <span style="font-weight: 500;">Policy ID:</span><span> $tp_policy_id</span>
                    </div>`;
                }
                $msg_body.=`
            </div>
            <hr>
            <div>
                <h5>Casualties/Injuries</h5>
                <br>
                `;
                if(empty($casualties)){
                    $msg_body.=`
                    <span style="font-weight: 500;">Casualties:</span><span> None</span>`;
                }else{
                    $msg_body.=`
                    <table class="row">
                        <tr class="row">
                            <th class="col-md-4" scope="col">Full name</th>
                            <th class="col-md-4" scope="col">Contact</th>
                            <th class="col-md-4" scope="col">Comments</th>
                        </tr>`;
                        foreach ($casualties as $casualty) {
                            $msg_body.=` <tr class='row'>
                             <td class='col-md-4'>`. $casualty["name"] .`</td>
                             <td class='col-md-4'>`. $casualty["contact"] .`</td>
                             <td class='col-md-4'>`. $casualty["comment"] .`</td>
                             </tr>
                            `;
                        }
                        $msg_body.=`
                    </table>`;
                }
                $msg_body.=`
            </div>
            <br>
            <hr>
            <div>
                <h5>Witnesses</h5>
                <br>
                `;
                if (empty($witnesses)){
                    $msg_body.='<span style="font-weight: 500;">Witnesses:</span><span> None</span>';
                }else{
                    $msg_body.=`
                    <table class="row">
                        <tr class="row">
                            <th class="col-md-6" scope="col">Full name</th>
                            <th class="col-md-6" scope="col">Contact</th>
                        </tr>`;
                        foreach ($witnesses as $witness) {
                            $msg_body.=`
                            <tr class='row'>
                            <td class='col-md-6'>` . $witness['name'] . `</td>
                            <td class='col-md-6'>` . $witness['contact'] . `</td>
                            </tr>`;
                        }
                        $msg_body.=`
                    </table>`;
                }
                $msg_body.=`
            </div><br>
            <hr>
            <div class="row">
                <h5>Uploaded Documents</h5>
                <span style="font-weight: 500;">Drivers' licence (front)</span><span> Uploaded</span>
                <span style="font-weight: 500;">Drivers' licence (rear)</span><span> Uploaded</span>
                <span style="font-weight: 500;">Proof of damage(s)</span><span> Uploaded</span>
                <span style="font-weight: 500;">Estimate of repair</span><span> Uploaded</span>
                `;
                if(!empty($policeReport)){
                    $msg_body.=`
                    <span style="font-weight: 500;">Police report</span><span> Uploaded</span>
                    `;
                }
                if(!empty($medicalReports)){
                    $msg_body .=`
                    <span style="font-weight: 500;">Medical report(s)</span><span> Uploaded</span>
                    `;
                }
                $msg_body.=`
            </div>
            <br><br>
            <div class="container-fluid"
                style="padding: 10px;text-align: center;background-color: rgb(101, 84, 196);color: #fff;">
                VANGUARD ASSURANCE CO. LTDL &COPY; 2021
            </div>
        </div>
    </div>
</body>

</html>
`;

/////////////////////////////old message
/*
$msg_body= 
"
  <div class='row'>
    <div class='col-md-6'>
      <h4>Summary</h4>
    </div>
  </div>
  <hr>
  <div class='row'>
    <div class='col-md-6'>
      <strong>REPROTED TO POLICE</strong>
      <br>
      <strong><span>Status:</span></strong>
      <span class='text-capitalize text-mutted'>".$accidentreported ."</span>
      <br>
";
      
if($accidentreported=='yes'){
  $msg_body.="
  <strong><span>Officer Name:</span></strong>
  <span class='text-capitalize text-mutted'>".$officer_name."</span>
  <br>
  <strong><span>Officer Station:</span></strong>
  <span class='text-capitalize text-mutted'>".$officer_station."</span>
  ";
}
$msg_body.="</div><div class='col-md-6'><strong>INCIDENT DETAILS</strong><br>";
$msg_body.="<strong><span>Date:</span></strong><span class='text-capitalize text-mutted'>".$incident_date ."</span><br>";
$msg_body.="<strong><span>Location:</span></strong><span class='text-capitalize text-mutted' >".$incident_location ."</span><br>";
$msg_body.="<strong><span>Description:</span></strong><span class='text-capitalize text-mutted'>". $incident_desc ."</span><br>";
$msg_body.="<strong><span>Incident Caused by:</span></strong><span class='text-capitalize text-mutted'>". $incident_causer ."</span><br>";
$msg_body.="<strong><span>Damage Description:</span></strong><span class='text-capitalize text-mutted'>". $vehicle_damge_desc ."</span><br>";
$msg_body.="<strong><span>Current Vehicle Location:</span></strong><span class='text-capitalize text-mutted'>". $vehicle_location ."</span><br></div>";

$msg_body.="<div class='col-md-6'><strong>DRIVER DETAILS</strong><br>";        
if($ownerdriving=='yes'){
  $driver_name = 'Owner';
}
$msg_body.="<strong><span>Driver:</span></strong><span id='sum_driver'>".$driver_name."</span><br>";
        
if($ownerdriving =='no'){
  $msg_body.="<div id='sum_other_driver'>";
  $msg_body.="<strong><span>Driver name:</span></strong><span class='text-capitalize text-mutted'>".$driver_name."</span><br>";
  $msg_body.="<strong><span>Driver licence:</span></strong><span class='text-capitalize text-mutted'>".$driver_license."</span><br>";
  $msg_body.="<strong><span>Driver contact:</span></strong><span class='text-capitalize text-mutted'>".$driver_contact."</span><br>";
  $msg_body.="<strong><span>Driver-Owner relationship:</span></strong><span class='text-capitalize text-mutted'>".$driver_owner_rel."</span><br>";
  $msg_body.="<strong><span>Owner consent to use:</span></strong><span class='text-capitalize text-mutted'>".$vehicleconsent."</span><br>";
  $msg_body.="<strong><span>Purpose of vehicle use:</span></strong><span class='text-capitalize text-mutted'>".$purp_of_vehicle."</span><br></div>";
}
$msg_body.="</div></div><hr>
    <div class='row'>
      <div class='col-sm-12 col-md-6 col-lg-6'>
        <strong>THIRD PARTY DRIVER</strong>
        <br>
        <strong>Third party driver involved?:</strong> <span class='text-capitalize text-mutted'>".$tpinvolve."</span>
        <br>
";

if($tpinvolve == 'yes'){
  $msg_body.="
  <div class='sum_tp_details'>
  <strong>Full name:</strong> <span class='text-capitalize text-mutted'>".$tp_fullname."</span>
  <br>
  <strong>Contact:</strong> <span class='text-capitalize text-mutted'>".$tp_contact."</span>
  <br>
  <strong>Driver license:</strong> <span class='text-capitalize text-mutted'>".$tp_license_no."</span>
  <br>
  <strong>DRIVER INSURER DETAILS</strong>
  <br>
  <strong>Insurance company:</strong> <span class='text-capitalize text-mutted' >".$tp_insurance_co."</span>
  <br>
  <strong>Policy ID:</strong> <span class='text-capitalize text-mutted' >".$tp_policy_id."</span>
  <br>
  ";
}
$msg_body.="
    <hr>
    <div class='row'>
    <div class='col-md-12 col-lg-12'>
        <strong>UPLOADED DOCUMENTS</strong>
        <br>
        <strong>Driver's Licence (front)</strong> 
        <span class='text-capitalize text-mutted'>
      ";
  if (empty($driversLicenceFront)){
    $msg_body.= "Not Uploaded";
  }else{
    $msg_body.= "Uploaded";
  }

  $msg_body.="
  </span><br>
  <strong>Driver's Licence (rear)</strong> 
  <span class='text-capitalize text-mutted'>
  ";
  if (empty($driversLicenceRear)){
    $msg_body.= "Not Uploaded";
  }else{
    $msg_body.= "Uploaded";
  }
  $msg_body.="</span><br><strong>Proof of Damage(s)</strong> <span class='text-capitalize text-mutted'>";
  if (empty($damagedVehiclePictures)){
    $msg_body.= "Not Uploaded";
  }else{
    $msg_body.= "Uploaded";
  }
  
  $msg_body.="</span><br><strong>Estimate of Repair </strong> <span class='text-capitalize text-mutted'>";
  if (empty($estimatesOfRepair)){
    $msg_body.= "Not Uploaded";
  }else{
    $msg_body.= "Uploaded";
  }
  
  $msg_body.="
  </span><br>
  <strong>Police Report </strong> 
  <span class='text-capitalize text-mutted'>
  ";
  if (empty($policeReport)){
    $msg_body.= "Not Uploaded";
  }else{
    $msg_body.= "Uploaded";
  }
  $msg_body.="
  </span><br>
  <strong>Medical Report(s) </strong> 
  <span class='text-capitalize text-mutted'>
  ";
  if (empty($medicalReports)){
    $msg_body.= "Not Uploaded";
  }else{
    $msg_body.= "Uploaded";
  }
  $msg_body.="</span><br><br></div></div>";
*/