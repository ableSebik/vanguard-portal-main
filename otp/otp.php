<?php

function otpGen($x){
  $otpCode = random_int(1000, 9999);
  $stmt = $conn->prepare("INSERT INTO otp_tb (phone, otp_code, otp_status) VALUES (:phone, :otp_code, :otp_status)");
  $sql = $stmt->execute([
    'phone' => $x,
    'otp_code' => $otpCode,
    'otp_status' => 0
  ]);
  
  // $row_count = $stmt->rowCount();
  if($sql){
    $msg='Confirm the code we have sent to your number';
  }
  return $otpGenMsg = $msg;
}

function otpVerify($x){
$verify_status = false;
  // Create 
  // session User[phone] variable = set as user phone collected from db
  // session user[email] and set as client email from db
  
  //to verify an otp, 
  /*
   1. read otp-table in db for a record with status = active
   2. code in tb = code entered 
   */ 
  $stmt = $conn->prepare("SELECT * FROM otp_tb WHERE phone = :phone && otp_status = :otp_status && otp_code =:otp_code");
  $stmt->execute([
    'phone' => $clientPhone,
    'otp_code' => $otpCode,
    'otp_status' => 0
  ]);
  $record = $stmt->fetch();
  
  $record_phone = $record['phone'];
  $record_code = $record['otp_code'];
  $record_status = $record['otp_status'];
  
  if($record && $record_status !=1){ //if record found and otp status is active(0)
    if($record_code == $x){
      $verify_status = true;
    }else{
      $verify_status = false;
    }
  }
  
return $otpVerifyMsg = $verify_status;
}

// ocures when user doesn't recieve the code/ delivery delay. user orders of a new code.

function otpResend($x){
  $stmt = $conn->prepare("UPDATE otp_tb WHERE phone=:phone AND otp_status =:otp_status SET otp_code =:otp_code"); 
  $stmt->execute([
    'phone' => $x,
    'otp_status' => 0,
    'otp_code' => random_int(1000, 9999)
  ]);
 
  if($stmt->rowCount()!=0){
    $msg = "Code has been resent to your phone number.";
  }else{
    $stmt = $conn->prepare("INSERT INTO otp_tb (phone, otp_code, otp_status) VALUES (:phone, :otp_code, :otp_status)");
    $sql = $stmt->execute([
      'phone' => $x,
      'otp_code' => random_int(1000, 9999),
      'otp_status' => 0
    ]);
    $msg = "Code has been sent to your phone number.";
    
  }
return $otpResendMsg = $msg;
}