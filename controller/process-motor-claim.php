<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$loan_or_hireyes = $_POST['loan_or_hireyes'];
$loan_or_hireno = $_POST['loan_or_hireno'];
$loan_or_hire_co = $_POST['loan_or_hire_co'];
$accidentreportedyes = $_POST['accidentreportedyes'];
$accidentreportedno = $_POST['accidentreportedno'];
$officer_name = $_POST['officer_name'];
$officer_station = $_POST['officer_station'];
$ownerdrivingyes = $_POST['ownerdrivingyes'];
$ownerdrivingno = $_POST['ownerdrivingno'];
$driver_name = $_POST['driver_name'];
$driver_contact = $_POST['driver_contact'];
$driver_license = $_POST['driver_license'];
$driver_owner_rel = $_POST['driver_owner_rel'];
$vehicleconsentno = $_POST['vehicleconsentno'];
$vehicleconsentyes = $_POST['vehicleconsentyes'];
$purp_of_vehicle =  $_POST['purp_of_vehicle'];
$incident_location = $_POST['incident_location'];
$incident_date = $_POST['incident_date'];
$incident_desc = $_POST['incident_desc'];
$incident_causer = $_POST['incident_causer'];
$vehicle_damge_desc = $_POST['vehicle_damge_desc'];
$vehicle_location = $_POST['vehicle_location'];
$tpinvolveyes = $_POST['tpinvolveyes'];
$tpinvolveno = $_POST['tpinvolveno'];
$tpinvolveunknown = $_POST['tpinvolveunknown'];
$tp_fullname = $_POST['tp_fullname'];
$tp_contact = $_POST['tp_contact'];


/////////////////////////////
$driversLicenceFront = $_FILES['attach']['drivers_lic']['front'];
if(isset($driversLicenceFront)){
    echo "driver licence front set";
}else{
    echo "driver not set";
}
$driversLicenceRear = $_FILES['attach']['drivers_lic']['rear'];
$damagedVehiclePictures = $_FILES['attach']['damaged_vehicle_pictures'];
$estimatesOfRepair = $_FILES['attach']['estimates_of_repair'];
$policeReport = $_FILES['attach']['police_report'];
$medicalReports = $_FILES['attach']['medical_reports'];

$driversLicenceRear = $_FILES['attach_licence_rear'];
$damagedVehiclePictures = $_FILES['attach_damage_proof'];
$estimatesOfRepair = $_FILES['attach_repair_est'];
$policeReport = $_FILES['attach_police_report'];
$medicalReports = $_FILES['attach_medical_reports'];

move_uploaded_file($driversLicenceRear['tmp_name'], './uploads'.$driversLicenceRear['name']);
foreach($damagedVehiclePictures['name'] as $key=>$val){
    move_uploaded_file($damagedVehiclePictures['tmp_name'][$key], './uploads'.$val);
}

foreach($medicalReports['name'] as $key=>$val){
    move_uploaded_file($medicalReports['tmp_name'][$key], './uploads'.$val);
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

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.tunodes.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sebikabel@tunodes.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sebikabel@tunodes.com');
    $mail->addAddress('fakulti47@gmail.com');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('sebikabel@gmail.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('../uploads/attach1.jpg');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Claim for Motor Insurance';
    $mail->Body    = '<h2>Test message from phpmailer <br/>it worked</h2>';
    $mail->AltBody = 'PHPMailer test';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
//using a test email test@tunodes.com password = _CUFiT+0D$ZB
//mail.tunodes.com  IMAP Port: 993 POP3 Port: 995
?>
