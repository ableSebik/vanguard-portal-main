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

?>