<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$loan_or_hire = filter_var($_POST['loan_or_hire'], FILTER_SANITIZE_STRING);
$loan_or_hire_co = filter_var($_POST['loan_or_hire_co'], FILTER_SANITIZE_STRING);
$accidentreported = filter_var($_POST['accidentreported'], FILTER_SANITIZE_STRING);
$officer_name = filter_var($_POST['officer_name'], FILTER_SANITIZE_STRING);
$officer_station = filter_var($_POST['officer_station'], FILTER_SANITIZE_STRING);
$ownerdriving = filter_var($_POST['ownerdriving'], FILTER_SANITIZE_STRING);
$driver_name = filter_var($_POST['driver_name'], FILTER_SANITIZE_STRING);
$driver_contact = filter_var($_POST['driver_contact'], FILTER_SANITIZE_STRING);
$driver_license = filter_var($_POST['driver_license'], FILTER_SANITIZE_STRING);
$driver_owner_rel = filter_var($_POST['driver_owner_rel'], FILTER_SANITIZE_STRING);
$vehicleconsent = filter_var($_POST['vehicleconsent'], FILTER_SANITIZE_STRING);
$purp_of_vehicle =  filter_var($_POST['purp_of_vehicle'], FILTER_SANITIZE_STRING);
$incident_location = filter_var($_POST['incident_location'], FILTER_SANITIZE_STRING);
$incident_date = filter_var($_POST['incident_date'], FILTER_SANITIZE_STRING);
$incident_desc = filter_var($_POST['incident_desc'], FILTER_SANITIZE_STRING);
$incident_causer = filter_var($_POST['incident_causer'], FILTER_SANITIZE_STRING);
$vehicle_damge_desc = filter_var($_POST['vehicle_damge_desc'], FILTER_SANITIZE_STRING);
$vehicle_location = filter_var($_POST['vehicle_location'], FILTER_SANITIZE_STRING);
$tpinvolve = filter_var($_POST['tpinvolve'], FILTER_SANITIZE_STRING);
$tp_fullname = filter_var($_POST['tp_fullname'], FILTER_SANITIZE_STRING);
$tp_contact = filter_var($_POST['tp_contact'], FILTER_SANITIZE_STRING);
$tp_license_no = filter_var($_POST['tp_license_no'], FILTER_SANITIZE_STRING);
$tp_insurance_co = filter_var($_POST['tp_insurance_co'], FILTER_SANITIZE_STRING);
$tp_policy_id = filter_var($_POST['tp_policy_id'], FILTER_SANITIZE_STRING);

$casualties = json_decode($_POST["casualties"]);
$sanitizedCasualties = [];

$i=0;
foreach ($casualties as $item) {
  $i = [
    "name" => filter_var($item["name"], FILTER_SANITIZE_STRING),
    "contact" => filter_var($item["contact"], FILTER_SANITIZE_STRING),
    "comment" => filter_var($item["comment"], FILTER_SANITIZE_STRING)
  ];
  $sanitizedCasualties[] = $i;
  $i++;
}

$witnesses = json_decode($_POST["witnesses"]);
$sanitizedWitnesses = [];
$i=0;
foreach ($witnesses as $item) {
  $i = [
    "name" => filter_var($item["name"], FILTER_SANITIZE_STRING),
    "contact" => filter_var($item["contact"], FILTER_SANITIZE_STRING),
  ];
  $sanitizedWitnesses[] = $i;
  $i++;
}



/////////////////////////////

//validate file Type(image/pdf)
//validate file size (3mb each)
//validate file change filename to this format "policyID-filetype" 
// eg. for licence rear, filename will be policyID-Licence-rear
//all file should be moved to a folder named policyID in the /uploads dir.

$driversLicenceFront = $_FILES['attach_licence_front'];
$driversLicenceRear = $_FILES['attach_licence_rear'];
$damagedVehiclePictures = $_FILES['attach_damage_proof'];
$estimatesOfRepair = $_FILES['attach_repair_est'];
$policeReport = $_FILES['attach_police_report'];
$medicalReports = $_FILES['attach_medical_reports'];
$finfo = new finfo(FILEINFO_MIME_TYPE);

$policyID = 'P100220120210003800';//this is a sample ID
$uploadDirectory = '../uploads/'.$policyID."/";

if (!file_exists($uploadDirectory)) {
  mkdir($uploadDirectory, 0777, true);
}else{
  $uploadDirectory = '../uploads/'.$policyID."/";
}

$allowedFileTypes = array('image/jpeg', 'image/png', 'application/pdf');
$maxFileSize = 3000000; // 3MB

$errors = [];
$valid = true;


// Validate and move drivers licence front
if ($driversLicenceFront['error'] == 0) {
  $fileType = $driversLicenceFront['type'];
  $fileSize = $driversLicenceFront['size'];
  $fileName = $driversLicenceFront['name'];
  $mimeType = $finfo->file($driversLicenceFront['tmp_name']);

  if (!in_array($mimeType, $allowedFileTypes)) {
    $valid = false;
    $errors[] = 'Invalid file type for drivers licence front';
  } 
  if ($fileSize > $maxFileSize) {
    $valid = false;
    $errors[] = 'File size exceeded maximum limit for drivers licence front';
  } 
  if($valid) {
    $newFileName = $policyID . '-Licence-front.' . pathinfo($fileName, PATHINFO_EXTENSION);
    $destination = $uploadDirectory . $newFileName;
    move_uploaded_file($driversLicenceFront['tmp_name'], $destination);
  }
}

// Validate and move drivers licence rear
if ($driversLicenceRear['error'] == 0) {
  $fileSize = $driversLicenceRear['size'];
  $fileName = $driversLicenceRear['name'];
  $fileType = $finfo->file($driversLicenceRear['tmp_name']);
  
  if (!in_array($fileType, $allowedFileTypes)) {
    $valid = false;
    $errors[] = 'Invalid file type for drivers licence rear';
  }
  if ($fileSize > $maxFileSize) {
    $valid = false;
    $errors[] = 'File size exceeded maximum limit for drivers licence rear';
  } 
  if($valid) {
    $newFileName = $policyID . '-Licence-rear.' . pathinfo($fileName, PATHINFO_EXTENSION);
    $destination = $uploadDirectory . $newFileName;
    move_uploaded_file($driversLicenceRear['tmp_name'], $destination);
  }
}

// Validate and move damaged vehicle pictures
if (!empty($damagedVehiclePictures['name'][0])) {
  for ($i = 0; $i < count($damagedVehiclePictures['name']); $i++) {
    $fileSize = $damagedVehiclePictures['size'][$i];
    $fileName = $damagedVehiclePictures['name'][$i];
    $fileType = $finfo->file($damagedVehiclePictures['tmp_name'][$i]);

    if (!in_array($fileType, $allowedFileTypes)) {
      $valid = false;
      $errors[] = 'Invalid file type for damaged vehicle picture ' . ($i);
    }
    if ($fileSize > $maxFileSize) {
      $valid = false;
      $errors[] = 'File size exceeded maximum limit for damaged vehicle picture ' . ($i);
    } 
    if($valid) {
      $newFileName = $policyID . '-Damage-proof-' . ($i) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
      $destination = $uploadDirectory . $newFileName;
      move_uploaded_file($damagedVehiclePictures['tmp_name'][$i], $destination);
    }
  }
}
  
  // Validate and move estimate of repair
  if ($estimatesOfRepair['error'] == 0) {
    $fileType = $finfo->file($estimatesOfRepair['tmp_name']);
    $fileSize = $estimatesOfRepair['size'];
    $fileName = $estimatesOfRepair['name'];
  
    if (!in_array($fileType, $allowedFileTypes)) {
      $valid = false;
      $errors[] = 'Invalid file type for estimate of repair';
    } 
    if ($fileSize > $maxFileSize) {
      $valid = false;
      $errors[] = 'File size exceeded maximum limit for estimate of repair';
    } 
    if($valid) {
      $newFileName = $policyID . '-Repair-est.' . pathinfo($fileName, PATHINFO_EXTENSION);
      $destination = $uploadDirectory . $newFileName;
      move_uploaded_file($estimatesOfRepair['tmp_name'], $destination);
    }
  }
  
  // Validate and move police report
  if ($policeReport['error'] == 0) {
    $fileType = $finfo->file($policeReport['tmp_name']);
    $fileSize = $policeReport['size'];
    $fileName = $policeReport['name'];
    
    if (!in_array($fileType, $allowedFileTypes)) {
      $valid = false;
      $errors[] = 'Invalid file type for police report';
    } 
    if ($fileSize > $maxFileSize) {
      $valid = false;
      $errors[] = 'File size exceeded maximum limit for police report';
    } 
    if($valid) {
      $newFileName = $policyID . '-Police-report.' . pathinfo($fileName, PATHINFO_EXTENSION);
      $destination = $uploadDirectory . $newFileName;
      move_uploaded_file($policeReport['tmp_name'], $destination);
    }
  }
  
  // Validate and move medical reports
  if (!empty($medicalReports['name'][0])) {
    for ($i = 0; $i < count($medicalReports['name']); $i++) {
      $fileType = $finfo->file($medicalReports['tmp_name'][$i]);
      $fileSize = $medicalReports['size'][$i];
      $fileName = $medicalReports['name'][$i];
  
      if (!in_array($fileType, $allowedFileTypes)) {
        $valid = false;
        $errors[] = 'Invalid file type for medical report ' . ($i);
      } 
      if ($fileSize > $maxFileSize) {
        $valid = false;
        $errors[] = 'File size exceeded maximum limit for medical report ' . ($i);
      } 
      if($valid) {
        $newFileName = $policyID . '-Medical-report-' . ($i) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $destination = $uploadDirectory . $newFileName;
        move_uploaded_file($medicalReports['tmp_name'][$i], $destination);
      }
    }
  }
  
  if (empty($errors)) {
    echo "Files uploaded successfully";
  } else {
    foreach ($errors as $error) {
      echo $error . '<br>';
    }
  }
  
    

  

  
  


  
  
  
//////////////////////////////////////////////////

//send mail if there's no error
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$msg_body= `
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
    <hr>
<div class="row">
    <div class="col-md-6">
        <strong>REPROTED TO POLICE</strong>
        <br>
        <strong><span>Status:</span></strong>
        <span class="text-capitalize text-mutted"></span>
        <br>
        <strong><span>Officer Name:</span></strong>
        <span class="text-capitalize text-mutted"></span>
        <br>
        <strong><span>Officer Station:</span></strong>
        <span class="text-capitalize text-mutted"></span>
    </div>
    <div class="col-md-6">
        <strong>INCIDENT DETAILS</strong><br>
        <strong><span>Date:</span></strong><span class="text-capitalize text-mutted"></span>
        <br>

        <strong><span>Location:</span></strong><span class="text-capitalize text-mutted" ></span>

        <br>
        <strong><span>Description:</span></strong><span class="text-capitalize text-mutted"></span>
        <br>

        <strong><span>Incident Caused by:</span></strong><span class="text-capitalize text-mutted"></span>
        <br>

        <strong><span>Damage Description:</span></strong><span class="text-capitalize text-mutted"></span>
        <br>
        <strong><span>Current Vehicle Location:</span></strong><span class="text-capitalize text-mutted"></span>
        <br>
    </div>

    <div class="col-md-6">
        <strong>DRIVER DETAILS</strong><br>
        <strong><span>Driver:</span></strong><span id="sum_driver"></span> 
        <br>
        <div id="sum_other_driver">
        <strong><span>Driver name:</span></strong><span class="text-capitalize text-mutted"></span> 
        <br>
        <strong><span>Driver licence:</span></strong><span class="text-capitalize text-mutted"></span> 
        <br>
        <strong><span>Driver contact:</span></strong><span class="text-capitalize text-mutted"></span> 
        <br>
        <strong><span>Driver-Owner relationship:</span></strong><span class="text-capitalize text-mutted"></span> 
        <br>
        <strong><span>Owner consent to use:</span></strong><span class="text-capitalize text-mutted"></span> 
        <br>
        <strong><span>Purpose of vehicle use:</span></strong><span class="text-capitalize text-mutted"></span> 
        <br>
        </div>
    </div>
    
    </div>
    <hr>
    <div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <strong>THIRD PARTY DRIVER</strong>
        <br>
        <strong>Third party driver involved?:</strong> <span class="text-capitalize text-mutted"></span>
        <br>
        <div class="sum_tp_details">
        <strong>Full name:</strong> <span class="text-capitalize text-mutted"></span>
        <br>
        <strong>Contact:</strong> <span class="text-capitalize text-mutted"></span>
        <br>
        <strong>Driver license:</strong> <span class="text-capitalize text-mutted"></span>
        <br>
        </div>
        
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 sum_tp_details">
        <strong>DRIVER INSURER DETAILS</strong>
        <br>
        <strong>Insurance company:</strong> <span class="text-capitalize text-mutted" ></span>
        <br>
        <strong>Policy ID:</strong> <span class="text-capitalize text-mutted" ></span>
        <br>
        <br>
    </div>
    </div>

    <hr>
    <div class="row">
    <div class="col-md-12 col-lg-12">
        <strong>CASUALTY <span>None</span></strong> <!-- show when no casualtie-->
        <div class="card">
        <h5 class="card-header">CASUALTY</h5>
        <div class="card-body">
          <table class="table">
          <tr class="row">
            <th class="col-md-4" scope="col">Full name</th>
            <th class="col-md-4" scope="col">Contact</th>
            <th class="col-md-4" scope="col">Comments</th>
          </t>
          <tbody>
            <!--  -->
            foreach ($sanitizedCasualties as $casualty) {
              echo "<tr>";
              echo "<td class="col-md-4">" . $casualty->name . "</td>";
              echo "<td class="col-md-4">" . $casualty->contact . "</td>";
              echo "<td class="col-md-4">" . $casualty->comment . "</td>";
              echo "</tr>";
            }
          </tbody>
          </table>
        </div>
        </div>

    <br><br>
    </div>
    <div class="col-md-12 col-lg-12">
        <strong>WITNESS <span>None</span></strong> <!--show when no witnesses-->
        <div class="card">
            <h5 class="card-header">WITNESS</h5>
            <div class="card-body">
                <table class="table wit-tbl" id="sum_witness_tbl">
                <tr class="row" id="wit_tbl_head">
                  <th class="col-md-6" scope="col">Full name</th>
                  <th class="col-md-6" scope="col">Contact</th>
                </tr>
                <tbody>
                  <!--  -->
                  foreach ($sanitizedWitnesses as $witness) {
                  echo "<tr>";
                  echo "<td class="col-md-6">" . $witness->name . "</td>";
                  echo "<td class="col-md-6">" . $witness->contact . "</td>";
                  echo "</tr>";
                  }
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
        <strong>Driver's Licence (front)</strong> <span class="text-capitalize text-mutted"></span><br>
        <strong>Driver's Licence (rear)</strong> <span class="text-capitalize text-mutted"></span><br>
        <strong>Proof of Damage(s)</strong> <span class="text-capitalize text-mutted"></span><br>
        <strong>Estimate of Repair </strong> <span class="text-capitalize text-mutted"></span><br>
        <strong>Police Report </strong> <span class="text-capitalize text-mutted"></span><br>
        <strong>Medical Report(s) </strong> <span class="text-capitalize text-mutted"></span><br>
        <br>
    </div>
    </div>
`;
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom();
    $mail->addAddress();     //Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    $files = scandir($uploadDirectory);
    foreach ($files as $file) {
      if ($file === "." or $file === "..") continue;
      $mail->addAttachment("$uploadDirectory/$file");
    }
    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Claim for Motor Insurance';
    $mail->Body    = $msg_body;
    $mail->AltBody = 'PHPMailer test';

    //$mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
