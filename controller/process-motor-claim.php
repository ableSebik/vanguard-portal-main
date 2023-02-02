<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$loan_or_hire = $_POST['loan_or_hire'];
$loan_or_hire_co = $_POST['loan_or_hire_co'];
$accidentreported = $_POST['accidentreported'];
$officer_name = $_POST['officer_name'];
$officer_station = $_POST['officer_station'];
$ownerdriving = $_POST['ownerdriving'];
$driver_name = $_POST['driver_name'];
$driver_contact = $_POST['driver_contact'];
$driver_license = $_POST['driver_license'];
$driver_owner_rel = $_POST['driver_owner_rel'];
$vehicleconsent = $_POST['vehicleconsent'];
$purp_of_vehicle =  $_POST['purp_of_vehicle'];
$incident_location = $_POST['incident_location'];
$incident_date = $_POST['incident_date'];
$incident_desc = $_POST['incident_desc'];
$incident_causer = $_POST['incident_causer'];
$vehicle_damge_desc = $_POST['vehicle_damge_desc'];
$vehicle_location = $_POST['vehicle_location'];
$tpinvolve = $_POST['tpinvolve'];
$tp_fullname = $_POST['tp_fullname'];
$tp_contact = $_POST['tp_contact'];
$tp_license_no = $_POST['tp_license_no'];
$tp_insurance_co = $_POST['tp_insurance_co'];
$tp_policy_id = $_POST['tp_policy_id'];

$casualties = json_decode($_POST["casualties"]);
$sanitizedCasualties = [];

$i=0;
foreach ($casualties as $item) {
  $i = [
    "name" => preg_replace("/[^a-zA-Z0-9\s]/", "", $item["name"]),
    "contact" => preg_replace("/[^a-zA-Z0-9\s]/", "", $item["contact"]),
    "comment" => preg_replace("/[^a-zA-Z0-9\s]/", "", $item["comment"])
  ];
  $sanitizedCasualties[] = $i;
  $i++;
}

$witnesses = json_decode($_POST["witnesses"]);
$sanitizedWitnesses = [];
$i=0;
foreach ($witnesses as $item) {
  $i = [
    "name" => preg_replace("/[^a-zA-Z0-9\s]/", "", $item["name"]),
    "contact" => preg_replace("/[^a-zA-Z0-9\s]/", "", $item["contact"]),
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

// Validate and move drivers licence front
if ($driversLicenceFront['error'] == 0) {
  $fileType = $driversLicenceFront['type'];
  $fileSize = $driversLicenceFront['size'];
  $fileName = $driversLicenceFront['name'];
  echo "this is the file type for the licence front= ".$fileType."*******";
  
  if (!in_array($fileType, $allowedFileTypes)) {
    $errors[] = 'Invalid file type for drivers licence front';
  } elseif ($fileSize > $maxFileSize) {
    $errors[] = 'File size exceeded maximum limit for drivers licence front';
  } else {
    $newFileName = $policyID . '-Licence-front.' . pathinfo($fileName, PATHINFO_EXTENSION);
    $destination = $uploadDirectory . $newFileName;
    move_uploaded_file($driversLicenceFront['tmp_name'], $destination);
  }
}

// Validate and move drivers licence rear
if ($driversLicenceRear['error'] == 0) {
  $fileType = $driversLicenceRear['type'];
  $fileSize = $driversLicenceRear['size'];
  $fileName = $driversLicenceRear['name'];
  echo "this is the file for the licence rear= ".$driversLicenceRear."*******";
  
  if (!in_array($fileType, $allowedFileTypes)) {
    $errors[] = 'Invalid file type for drivers licence rear';
  } elseif ($fileSize > $maxFileSize) {
    $errors[] = 'File size exceeded maximum limit for drivers licence rear';
  } else {
    $newFileName = $policyID . '-Licence-rear.' . pathinfo($fileName, PATHINFO_EXTENSION);
    $destination = $uploadDirectory . $newFileName;
    move_uploaded_file($driversLicenceRear['tmp_name'], $destination);
  }
}

// Validate and move damaged vehicle pictures
if (!empty($damagedVehiclePictures['name'][0])) {
  for ($i = 0; $i < count($damagedVehiclePictures['name']); $i++) {
    $fileType = $damagedVehiclePictures['type'][$i];
    $fileSize = $damagedVehiclePictures['size'][$i];
    $fileName = $damagedVehiclePictures['name'][$i];
    
    if (!in_array($fileType, $allowedFileTypes)) {
      $errors[] = 'Invalid file type for damaged vehicle picture ' . ($i);
    } elseif ($fileSize > $maxFileSize) {
        $errors[] = 'File size exceeded maximum limit for damaged vehicle picture ' . ($i);
      } else {
        $newFileName = $policyID . '-Damage-proof-' . ($i) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $destination = $uploadDirectory . $newFileName;
        move_uploaded_file($damagedVehiclePictures['tmp_name'][$i], $destination);
      }
    }
  }
  
  // Validate and move estimate of repair
  if ($estimatesOfRepair['error'] == 0) {
    $fileType = $estimatesOfRepair['type'];
    $fileSize = $estimatesOfRepair['size'];
    $fileName = $estimatesOfRepair['name'];
  
    if (!in_array($fileType, $allowedFileTypes)) {
      $errors[] = 'Invalid file type for estimate of repair';
    } elseif ($fileSize > $maxFileSize) {
      $errors[] = 'File size exceeded maximum limit for estimate of repair';
    } else {
      $newFileName = $policyID . '-Repair-est.' . pathinfo($fileName, PATHINFO_EXTENSION);
      $destination = $uploadDirectory . $newFileName;
      move_uploaded_file($estimatesOfRepair['tmp_name'], $destination);
    }
  }
  
  // Validate and move police report
  if ($policeReport['error'] == 0) {
    $fileType = $policeReport['type'];
    $fileSize = $policeReport['size'];
    $fileName = $policeReport['name'];
    
    if (!in_array($fileType, $allowedFileTypes)) {
      $errors[] = 'Invalid file type for police report';
    } elseif ($fileSize > $maxFileSize) {
      $errors[] = 'File size exceeded maximum limit for police report';
    } else {
      $newFileName = $policyID . '-Police-report.' . pathinfo($fileName, PATHINFO_EXTENSION);
      $destination = $uploadDirectory . $newFileName;
      move_uploaded_file($policeReport['tmp_name'], $destination);
    }
  }
  
  // Validate and move medical reports
  if (!empty($medicalReports['name'][0])) {
    for ($i = 0; $i < count($medicalReports['name']); $i++) {
      $fileType = $medicalReports['type'][$i];
      $fileSize = $medicalReports['size'][$i];
      $fileName = $medicalReports['name'][$i];
  
      if (!in_array($fileType, $allowedFileTypes)) {
        $errors[] = 'Invalid file type for medical report ' . ($i);
      } elseif ($fileSize > $maxFileSize) {
        $errors[] = 'File size exceeded maximum limit for medical report ' . ($i);
      } else {
        $newFileName = $policyID . '-Medical-report-' . ($i) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $destination = $uploadDirectory . $newFileName;
        move_uploaded_file($medicalReports['tmp_name'][$i], $destination);
      }
    }
  }
  
  if (empty($errors)) {
    echo 'Files uploaded successfully';
  } else {
    foreach ($errors as $error) {
      echo $error . '<br>';
    }
  }
  /*
  // validate drivers licence front
  $file = $driversLicenceFront;
  if (!in_array($file['type'], $allowedFileTypes)) {
    echo "Error: Invalid file type for drivers licence front";
  } elseif ($file['size'] > $maxFileSize) {
    echo "Error: File size exceeds maximum limit for drivers licence front";
  } else {
    $newFileName = $policyID . '-Licence-front.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadDirectory = $uploadDirectory . $policyID;
    if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0775, true);
    }
    $uploadPath = $uploadDirectory . '/' . $newFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      //echo "File uploaded successfully for drivers licence front";
    } else {
      echo "Error: Failed to upload file for drivers licence front";
    }
  }
  
  // validate drivers licence rear
  $file = $driversLicenceRear;
  if (!in_array($file['type'], $allowedFileTypes)) {
    echo "Error: Invalid file type for drivers licence rear";
  } elseif ($file['size'] > $maxFileSize) {
    echo "Error: File size exceeds maximum limit for drivers licence rear";
  } else {
    $newFileName = $policyID . '-Licence-rear.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadDirectory = $uploadDirectory . $policyID;
    if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0775, true);
    }
    $uploadPath = $uploadDirectory . '/' . $newFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      //echo "File uploaded successfully for drivers licence rear";
    } else {
      echo "Error: Failed to upload file for drivers licence rear";
    }
  }
  
  // validate damaged vehicle pictures
  $file = $damagedVehiclePictures;
  if (!in_array($file['type'], $allowedFileTypes)) {
    echo "Error: Invalid file type for damaged vehicle pictures";
  } elseif ($file['size'] > $maxFileSize) {
    echo "Error: File size exceeds maximum limit for damaged vehicle pictures";
  } else {
    $newFileName = $policyID . '-Damage-proof.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadDirectory = $uploadDirectory . $policyID;
    if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0775, true);
    }
    $uploadPath = $uploadDirectory . '/' . $newFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      //echo "File uploaded successfully for damaged vehicle pictures";
    } else {
      echo "Error: Failed to upload file for damaged vehicle pictures";
    }
  }
  
  // validate estimates of repair
  $file = $estimatesOfRepair;
  if (!in_array($file['type'], $allowedFileTypes)) {
    echo "Error: Invalid file type for estimates of repair";
  } elseif ($file['size'] > $maxFileSize) {
    echo "Error: File size exceeds maximum limit for estimates of repair";
  } else {
    $newFileName = $policyID . '-Repair-est.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadDirectory = $uploadDirectory . $policyID;
    if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0775, true);
    }
    $uploadPath = $uploadDirectory . '/' . $newFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      //echo "File uploaded successfully for estimates of repair";
    } else {
      echo "Error: Failed to upload file for estimates of repair";
    }
  }
  
  // validate police report
  $file = $policeReport;
  if (!in_array($file['type'], $allowedFileTypes)) {
    echo "Error: Invalid file type for police report";
  } elseif ($file['size'] > $maxFileSize) {
    echo "Error: File size exceeds maximum limit for police report";
  } else {
    $newFileName = $policyID . '-Police-report.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadDirectory = $uploadDirectory . $policyID;
    if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0775, true);
    }
    $uploadPath = $uploadDirectory . '/' . $newFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      //echo "File uploaded successfully for police report";
    } else {
      echo "Error: Failed to upload file for police report";
    }
  }
  
  // validate medical reports
  $file = $medicalReports;
  if (!in_array($file['type'], $allowedFileTypes)) {
    echo "Error: Invalid file type for medical reports";
  } elseif ($file['size'] > $maxFileSize) {
    echo "Error: File size exceeds maximum limit for medical reports";
  } else {
    $newFileName = $policyID . '-Medical-reports.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $uploadDirectory = $uploadDirectory . $policyID;
    if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0775, true);
    }
    $uploadPath = $uploadDirectory . '/' . $newFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
      //echo "File uploaded successfully for medical reports";
    } else {
      echo "Error: Failed to upload file for medical reports";
    }
  }
  */
    

  

  


  
  


  
  
  
//////////////////////////////////////////////////
/*
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
            </tr>
            <tbody>
                <!--  -->
                foreach ($casualties as $casualty) {
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
    $mail->addAttachment('./uploads/attach1.jpg');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Claim for Motor Insurance';
    $mail->Body    = '<h2>Test message from phpmailer <br/>it worked</h2>';
    $mail->AltBody = 'PHPMailer test';

    //$mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

*/
?>
