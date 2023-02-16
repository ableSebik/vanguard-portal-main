<?php

require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$pattern = '/[^a-zA-Z0-9\s.-]/';

$loan_or_hire = ucfirst($_POST['loan_or_hire']);
$loan_or_hire_co = ucwords(preg_replace($pattern, '', $_POST['loan_or_hire_co']));
$accidentreported = ucfirst($_POST['accidentreported']);
$officer_name = ucwords(preg_replace($pattern, '', $_POST['officer_name']));
$officer_station = ucwords(preg_replace($pattern, '', $_POST['officer_station']));
$ownerdriving = $_POST['ownerdriving'];
$driver_name = ucwords(preg_replace($pattern, '', $_POST['driver_name']));
$driver_contact = preg_replace($pattern, '', $_POST['driver_contact']);
$driver_license = ucfirst(preg_replace($pattern, '', $_POST['driver_license']));
$driver_owner_rel = ucfirst(preg_replace($pattern, '', $_POST['driver_owner_rel']));
$vehicleconsent = ucfirst(preg_replace($pattern, '', $_POST['vehicleconsent']));
$purp_of_vehicle = ucfirst(preg_replace($pattern, '', $_POST['purp_of_vehicle']));
$incident_location = ucfirst(preg_replace($pattern, '', $_POST['incident_location']));
$incident_date = preg_replace($pattern, '', $_POST['incident_date']);
$incident_desc = ucfirst(preg_replace($pattern, '', $_POST['incident_desc']));
$incident_causer = ucfirst(preg_replace($pattern, '', $_POST['incident_causer']));
$vehicle_damge_desc = ucfirst(preg_replace($pattern, '', $_POST['vehicle_damge_desc']));
$vehicle_location = ucfirst(preg_replace($pattern, '', $_POST['vehicle_location']));
$tpinvolve = ucfirst($_POST['tpinvolve']);
$tp_fullname = ucwords(preg_replace($pattern, '', $_POST['tp_fullname']));
$tp_contact = ucfirst(preg_replace($pattern, '', $_POST['tp_contact']));
$tp_license_no = ucfirst(preg_replace($pattern, '', $_POST['tp_license_no']));
$tp_insurance_co = ucfirst(preg_replace($pattern, '', $_POST['tp_insurance_co']));
$tp_policy_id = ucfirst(preg_replace($pattern, '', $_POST['tp_policy_id']));

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
///////////////////EMAIL////////////////////////

$mailSent = false;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

////////////////New Message body////////////
$msg_body='
    <style>
        .mail_body {
            margin: 50px;
            padding: 50px;
            background-color: #fff;
            border-radius: 0;
            box-shadow: rgba(28, 17, 91, 0.199) 0px 48px 100px 0px;
        }
        .row{
          display: flex;
        }
        .col{
          flex: .5;
        }
        .col-min{
          width:30%;
        }
        table{
          width:75%;
        }
    </style>
';

$msg_body.='
    <div class="container">
        <div class="mail_body">
            <div>
                <h1>Motor Insurace Claim</h1>
                <h3>Summary</h3>
            </div>
            <hr>
            <div>
                <h5>POLICY DETAILS</h5><br>                
                <span>
                    <span style="font-weight: 600;">Policy ID:</span><span> P100220120210003800</span>
                </span>
                <br>
                <span style="font-weight: 600;">Cover type:</span><span> Comprehensive</span>
                <br>
                <span style="font-weight: 600;">Branch</span><span> Accra Main</span>
                <br>
                <span style="font-weight: 600;">Vehicle usage:</span><span> X.1PRIVATEINDIVIDUAL</span>
                <br>
                <span style="font-weight: 600;">Duration</span><span> 2022-06-28 - 2023-06-27</span>
            </div>
            <hr>

            <div class="row">
                <div class="col">
                    <h5>Owner Details</h5>
                    <span style="font-weight: 600;">First Name:</span><span> Jon</span>
                    <br>
                    <span style="font-weight: 600;">Last name:</span><span> Doe</span>
                    <br>
                    <span style="font-weight: 600;">Other Name:</span><span> </span>
                    <br>
                    <span style="font-weight: 600;">Occupation:</span><span> Bank Manager</span>
                    <br>
                    <span style="font-weight: 600;">Postal address:</span><span> </span>
                    <br>
                    <span style="font-weight: 600;">Residential address:</span><span> </span>
                </div>
                <div class="col">
                    <h5>Vehicle Details</h5>
                    <span style="font-weight: 600;">Chasis number:</span><span> 0120210003800</span>
                    <br>
                    <span style="font-weight: 600;">Make:</span><span> Toyota</span>
                    <br>
                    <span style="font-weight: 600;">Model:</span><span> Hillux</span>
                    <br>
                    <span style="font-weight: 600;">Year of manufacture:</span><span> 2015</span>
                    <br>
                    <span style="font-weight: 600;">Cubic capacity:</span><span> 2500</span>
                    <br>
                    <span style="font-weight: 600;">Vehicle registration:</span><span> GR 9966-15</span>
                </div>
            </div>
            <hr>
';
            $msg_body .='            
            <div class="row">
                <div class="col">
                    <h5>Loan/Hire</h5>
                    <span style="font-weight: 600;">Status: </span><span>'. $loan_or_hire.'</span><br>';
                    if($loan_or_hire=='yes'){
                        $msg_body.='
                        <span style="font-weight: 600;">Finance/Lending organization: </span><span>'. $loan_or_hire_co.'</span><br>';
                    }
                    $msg_body.='
                </div>';
                $msg_body.='
                <div class="col">
                    <h5>Reported to Police</h5>
                    <span style="font-weight: 600;">Status: </span><span>'. $accidentreported.'</span><br>';
                    if($accidentreported=='yes'){
                        $msg_body.='
                        <span style="font-weight: 600;">Officer name: </span><span>'. $officer_name.'</span><br>
                        <span style="font-weight: 600;">Officer station: </span><span>'. $officer_station.'</span>';
                    }
                    $msg_body.='
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h5>Incident Details</h5>
                    <span style="font-weight: 600;">Date: </span><span>'. $incident_date .'</span><br>
                    <span style="font-weight: 600;">Location: </span><span>'. $incident_location.'</span><br>
                    <span style="font-weight: 600;">Incident narative: </span><span>'. $incident_desc.'</span><br>
                    <span style="font-weight: 600;">Incident caused by: </span><span>'. $incident_causer.'</span><br>
                    <span style="font-weight: 600;">Damage description: </span><span>'. $vehicle_damge_desc.'</span><br>
                    <span style="font-weight: 600;">Damage vehicle location: </span><span>'. $vehicle_location.'</span>
                </div>
                <div class="col">
                    <h5>Driver Details</h5>';
                    if($ownerdriving=="yes"){
                        $driver="Owner";
                        $msg_body.='<span style="font-weight: 600;">Driver: </span><span>'. $driver.'</span><br>';
                    }else{
                        $msg_body.='
                        <span style="font-weight: 600;">Driver name: </span><span>'. $driver_name.'</span><br>
                        <span style="font-weight: 600;">Driver contact: </span><span>'. $driver_contact.'</span><br>
                        <span style="font-weight: 600;">Driver licence: </span><span>'. $driver_license.'</span><br>
                        <span style="font-weight: 600;">Driver-Owner relationship: </span><span>'. $driver_owner_rel.'</span><br>
                        <span style="font-weight: 600;">Consent of use: </span><span>'. $vehicleconsent.'</span><br>';
                    }
                    $msg_body.='
                    <span style="font-weight: 600;">Purpose of vehicle use: </span><span>'. $purp_of_vehicle .'</span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h5>Third-Party driver</h5>
                    <span style="font-weight: 600;">Third-party driver involved: </span><span>'. $tpinvolve.'</span><br>';
                    if($tpinvolve=="yes"){
                        $msg_body.='
                        <span style="font-weight: 600;">Full name: </span><span>'. $tp_fullname.'</span><br>
                        <span style="font-weight: 600;">Contact: </span><span>'. $tp_contact.'</span><br>
                        <span style="font-weight: 600;">Drivers licence: </span><span>'. $tp_license_no.'</span>';
                    }
                    $msg_body.='
                </div>';
                if($tpinvolve=="yes"){
                    $msg_body.='
                    <div class="col">
                        <h5>Third-Party Insurace Details</h5>
                        <span style="font-weight: 600;">Insurace company: </span><span>'. $tp_insurance_co.'</span><br>
                        <span style="font-weight: 600;">Policy ID: </span><span>'. $tp_policy_id.'</span>
                    </div>';
                }
                $msg_body.='
            </div>
            <hr>
            <div>
                <h5>Casualties/Injuries</h5>';
                if(empty($casualties)){
                    $msg_body.='
                    <span style="font-weight: 600;">Casualties:</span><span> None</span>';
                }else{
                    $msg_body.='
                    <table class="">
                        <tr class="">
                            <th class="col-min" scope="col">Full name</th>
                            <th class="col-min" scope="col">Contact</th>
                            <th class="col-min" scope="col">Comments</th>
                        </tr>';
                        foreach ($casualties as $casualty) {
                            $msg_body.=' <tr class="">
                             <td class="col-min">'. $casualty["name"] .'</td>
                             <td class="col-min">'. $casualty["contact"] .'</td>
                             <td class="col-min">'. $casualty["comment"] .'</td>
                             </tr>';
                        }
                        $msg_body.='
                    </table>';
                }
                $msg_body.='
            </div>
            <br>
            <hr>
            <div>
                <h5>Witnesses</h5>
                <br>
                ';
                if (empty($witnesses)){
                    $msg_body.='<span style="font-weight: 600;">Witnesses:</span><span> None</span>';
                }else{
                    $msg_body.='
                    <table class="">
                        <tr class="">
                            <th class="col-min" scope="col">Full name</th>
                            <th class="col-min" scope="col">Contact</th>
                        </tr>';
                        foreach ($witnesses as $witness) {
                            $msg_body.='
                            <tr class="">
                            <td class="col-min">' . $witness['name'] . '</td>
                            <td class="col-min">' . $witness['contact'] . '</td>
                            </tr>';
                        }
                        $msg_body.='
                    </table>';
                }
                $msg_body.='
            </div><br>
            <hr>
            <div class="">
                <h5>Uploaded Documents</h5><br>
                <span style="font-weight: 600;">Drivers\' licence (front): </span><span> Uploaded</span><br>
                <span style="font-weight: 600;">Drivers\' licence (rear): </span><span> Uploaded</span><br>
                <span style="font-weight: 600;">Proof of damage(s): </span><span> Uploaded</span><br>
                <span style="font-weight: 600;">Estimate of repair: </span><span> Uploaded</span><br>
                ';
                if ($_FILES['attach_police_report']['name'] !="") {
                  $msg_body.='
                  <span style="font-weight: 600;">Police report: </span><span>Uploaded</span><br>';
                }
                if ($medicalReports['name'] !='') {
                  $msg_body.='
                  <span style="font-weight: 600;">Medical report(s): </span><span>Uploaded</span><br>';
                }
                $msg_body.='
            </div>
            <br><br>
            <div class="container-fluid"
                style="padding: 10px;text-align: center;background-color: rgb(101, 84, 196);color: #fff;">
                VANGUARD ASSURANCE CO. LTDL &COPY; 2021
            </div>
        </div>
    </div>
';
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $_ENV['mailHost'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['emailAdd'];                     //SMTP username
    $mail->Password   = $_ENV['emailPassword'];                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom($_ENV['emailAdd']);
    // echo "this is the email add ".getenv("mailHost");
    $mail->addAddress($_ENV['emailAdd']);     //Add a recipient
    // $mail->addAddress("fakulti47@gmail.com");     //Add a recipient
    // $mail->addAddress("mosesadonoo@gmail.com");     //Add a recipient
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
      $mailSent = true;
      echo 'mail sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
/////////////////sms///////////////
die;
if($mailSent){
  $txtMessage = 'Dear Jon Doe.
  Policy ID:'. $policyID.'
  Thank you for completing your insurance claim.
  We will contact you as soon as possible.
  Vanguard Assurance Ltd.';
  $endPoint = $_ENV['endPoint'];
  $apiKey = $_ENV['apiKey'];
  $url = $endPoint . '?key=' . $apiKey;
  $data = [
    'recipient' => ['0241266800'],
    // 'recipient' => ['0241266800', '0505811511'],
    'sender' => 'Vanguard',
    'message' => $txtMessage,
    'is_schedule' => 'false',
    'schedule_date' => ''
  ];
  
  $ch = curl_init();
  $headers = array();
  $headers[] = "Content-Type: application/json";
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  $result = curl_exec($ch);
  $result = json_decode($result, TRUE);
  curl_close($ch);
}





