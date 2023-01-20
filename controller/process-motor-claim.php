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

move_uploaded_file($driversLicenceFront['tmp_name'], './uploads'.$driversLicenceFront['name']);
move_uploaded_file($driversLicenceRear['tmp_name'], './uploads'.$driversLicenceRear['name']);
foreach($damagedVehiclePictures['name'] as $key=>$val){
    move_uploaded_file($damagedVehiclePictures['tmp_name'][$key], './uploads'.$val);
}

foreach($medicalReports['name'] as $key=>$val){
    move_uploaded_file($medicalReports['tmp_name'][$key], './uploads'.$val);
}

/////////////////////////////

// $uploads = $_FILES['attach'];
// if(isset($uploads)){
//     echo "files uploaded";
// }else{
//     echo "files not uploaded";
// }
// // echo $incident_date;
// $tp_license_no = $_POST['tp_license_no'];
// $tp_insurance_co = $_POST['tp_insurance_co'];
// $tp_policy_id = $_POST['tp_policy_id'];
// $tp_contact = $_POST['tp_contact'];
// $tp_contact = $_POST['tp_contact'];
// $ponds = $_POST['filepond'];
// var_dump($ponds);

// // if(isset( $_FILES['drivers_licence_front']['name'])){
// //     echo "driver licence front set";
// // }else{
// //     echo "driver licence front not set";
// // }

// //echo $incident_date;




//     // $parsed_data = [];

//     // $i = 1;

//     // foreach($_POST['actor'] as $key => $value){

//     //     // Looking at: [0] => "name"
//     if(isset($_POST['actor'])){

    

//     //     $array_infos = [];

//     //   
//     //     // Looking at: [1] => Array([0] => "info1", [1] => "info2", etc.)
//     //     foreach($_POST['actor']["{$i}"] as $contact){

//     //         array_push($array_infos, $contact);
//     //     }

//     //     array_push($array, $contact);

       

//       $count =0;
//       $originalcount =0;

//     //     // Looking at: [actor] => Array([0] => "name", [1] => Array([0] => "info1", [1] => "info2", etc.))
//     //     array_push($parsed_data, ['actor' => $array]);
//     //     $i++;
//     // }
//         $name;
//         $count0=0;
//     // // Do anything you want with the result.
//     // // I choose to print it out here.
//     // echo ($parsed_data);
//     $ass = $_POST['actor'];
//     foreach($ass as $key => $value){
//         $count++;
//         $count0 = 0;
//         echo $count;
//         foreach($value as $key => $value1){
//             $count0 ++;
//             if($originalcount != $count){
//                 switch($count0){
//                     case $count0 ===1 :
//                         $val = $value1;
//                         $name= print_r("inserting name: " .$value1."<br>", true);
//                         echo $name;
//                         break;
//                     case $count0 ===2 :
//                         $name= print_r("updating contact: " .$value1. " where name= $val" ."<br>", true);
//                         echo $name;
//                         break;
//                     case $count0 ===3 :
//                         $name= print_r("updating comment: " .$value1. " where name= $val" ."<br>", true);
//                         echo $name;
//                         break;
                    
//                 }
//                 // $name= print_r($value1."<br>", true);
//                 // echo $name;
//             }
         
         
//        // $array_push($array, $name);
//         }
//         $originalcount++;
//         echo $originalcount;
//     }
//     }

//     if(isset($_POST['actor'])){

//     $counte =0;
//     $originalcount1 =0;

//   //     // Looking at: [actor] => Array([0] => "name", [1] => Array([0] => "info1", [1] => "info2", etc.))
//   //     array_push($parsed_data, ['actor' => $array]);
//   //     $i++;
//   // }
//       $name1;
//       $count01=0;
//   // // Do anything you want with the result.
//   // // I choose to print it out here.
//   // echo ($parsed_data);
//   $ass = $_POST['actor'];
//   foreach($ass as $key => $value){
//       $counte++;
//       $count01 = 0;
//       echo $counte;
//       foreach($value as $key => $value1){
//           $count01 ++;
//           if($originalcount1 != $counte){
//               switch($count01){
//                   case $count01 ===1 :
//                       $val = $value1;
//                       $name1= print_r("inserting name: " .$value1."<br>", true);
//                       echo $name1;
//                       break;
//                   case $count01 ===2 :
//                       $name1= print_r("updating contact: " .$value1. " where name= $val" ."<br>", true);
//                       echo $name1;
//                       break;
                  
                  
//               }
//               // $name= print_r($value1."<br>", true);
//               // echo $name;
//           }
       
       
//      // $array_push($array, $name);
//       }
//       $originalcount1++;
//       echo $originalcount1;
//   }
// }
    //echo "<br><br><br><br>";


    // if(empty($_POST['filepond'])) {
    //     echo 'add file!';
    // }

    // $filepond = $_POST["sentPhotos"];

    // var_dump($filepond);
// $json_decoded = json_decode($filepond[0], true);
// //$data = base64_decode($json_decoded);
// file_put_contents('./filepond', $data);
// file_put_contents('filepond', $data);

// var_dump($json_decoded);


?>