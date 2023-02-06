<?php
$pattern = '/[^a-zA-Z0-9\s]/';

$loan_or_hire = preg_replace($pattern, '', $_POST['loan_or_hire']);
$loan_or_hire_co = preg_replace($pattern, '', $_POST['loan_or_hire_co']);
$accidentreported = preg_replace($pattern, '', $_POST['accidentreported']);
$officer_name = preg_replace($pattern, '', $_POST['officer_name']);
$officer_station = preg_replace($pattern, '', $_POST['officer_station']);
$ownerdriving = preg_replace($pattern, '', $_POST['ownerdriving']);
echo $ownerdriving;
$driver_name = preg_replace($pattern, '', $_POST['driver_name']);
$driver_contact = preg_replace($pattern, '', $_POST['driver_contact']);
$driver_license = preg_replace($pattern, '', $_POST['driver_license']);
$driver_owner_rel = preg_replace($pattern, '', $_POST['driver_owner_rel']);
$vehicleconsent = preg_replace($pattern, '', $_POST['vehicleconsent']);
$purp_of_vehicle = preg_replace($pattern, '', $_POST['purp_of_vehicle']);
$incident_location =preg_replace($pattern, '', $_POST['incident_location']);
$incident_date =preg_replace($pattern, '', $_POST['incident_date']);
$incident_desc =preg_replace($pattern, '', $_POST['incident_desc']);
$incident_causer =preg_replace($pattern, '', $_POST['incident_causer']);
$vehicle_damge_desc =preg_replace($pattern, '', $_POST['vehicle_damge_desc']);
$vehicle_location =preg_replace($pattern, '', $_POST['vehicle_location']);
$tpinvolve =preg_replace($pattern, '', $_POST['tpinvolve']);
$tp_fullname =preg_replace($pattern, '', $_POST['tp_fullname']);
$tp_contact =preg_replace($pattern, '', $_POST['tp_contact']);
$tp_license_no =preg_replace($pattern, '', $_POST['tp_license_no']);
$tp_insurance_co =preg_replace($pattern, '', $_POST['tp_insurance_co']);
$tp_policy_id =preg_replace($pattern, '', $_POST['tp_policy_id']);

$casualties = json_decode($_POST["casualties"], true);
$witnesses = json_decode($_POST["witnesses"], true);




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
  $fileSize = $driversLicenceFront['size'];
  $fileName = $driversLicenceFront['name'];
  $fileType = $finfo->file($driversLicenceFront['tmp_name']);

  if (!in_array($fileType, $allowedFileTypes)) {
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

  echo $msg_body;
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = "AVEPAr8wm*cPypg";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom("");
    // echo "this is the email add ".getenv("mailHost");
    $mail->addAddress("");     //Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('');
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

    if($mail->send()){
      echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
