<?php

include "otp.php";
require_once "../config.php";
$showModal = false;

if (isset($_POST['policy_lookup_btn'])) {
  $errorCode = "";
  $errorMsg = "";
  
  $policyID = $_POST['policyID'];
  if(!empty($policyID)){
    // check if policy exists
    $stmt = $conn->prepare("SELECT * FROM client_data WHERE policyID = :policyID");
    $stmt->execute([
      'policyID' => $policyID
    ]);
    $record = $stmt->fetch();
    if(!$record){
      $errorMsg = "Policy does not exist, Kind ensure you entered the correct Policy ID";
      $errorCode = "invalid";
    }else{
      $showModal = true;
    }
  }else{
    
  }
}

  if(isset($_POST['verify_otp'])){
    $showAllert = true;
  }



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vanguard Assurance</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css/style-new.css" />
  </head>
  <body style="background-color: #f0f8ff !important">
    <nav></nav>
    <div class="container">
        <div class="card">
            <form action="" autocomplete = 0 id="otp-form" method="post">
              <h2 class="text-muted">2-Step Verification</h2>
              <img src="../images/smartphone.png" alt="" class="otp-phone-img" />
              <p>
                A text message with verification code was sent to
                <b id="clientPhone"></b>
              </p>
      
              <div class="otp_form_div">
                <input
                  type="text"
                  id="otp1"
                  class="form-control otp-code"
                  pattern="[0-9]"
                  maxlength="1"
                  autofocus
                  required
                />
                <input
                  type="text"
                  id="otp2"
                  class="form-control otp-code"
                  pattern="[0-9]"
                  maxlength="1"
                  required
                />
                <input
                  type="text"
                  id="otp3"
                  class="form-control otp-code"
                  pattern="[0-9]"
                  maxlength="1"
                  required
                />
                <input
                  type="text"
                  id="otp4"
                  class="form-control otp-code"
                  pattern="[0-9]"
                  maxlength="1"
                  required
                />
              </div>
              <button
                type="submit"
                name="verify_otp"
                id="verify_otp"
                class="btn btn-primary btn-block"
                >Verify</button
              >
              <a href="#">Resend code</a>
          </form>
        </div>
    </div>

    

    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <script>
      const otp1 = document.getElementById("otp1");
      const otp2 = document.getElementById("otp2");
      const otp3 = document.getElementById("otp3");
      const otp4 = document.getElementById("otp4");
      const verify_otp = document.getElementById("verify_otp");

      otp1.addEventListener("input", () => {
        if (otp1.value.length === 1) {
          otp2.focus();
        }
      });

      otp2.addEventListener("input", () => {
        if (otp2.value.length === 1) {
          otp3.focus();
        }
      });

      otp3.addEventListener("input", () => {
        if (otp3.value.length === 1) {
          otp4.focus();
        }
      });
      otp4.addEventListener("input", () => {
        if (otp3.value.length === 1) {
          verify_otp.focus();
        }
      });

      const numberInput = document.getElementsByClassName("otp-code");
      numberInput.addEventListener("input", (event) => {
        const value = event.target.value;
        if (/[^0-9]/.test(value)) {
          event.target.value = value.replace(/[^0-9]/g, "");
        } else {
          event.target.value = value.replace("");
        }
      });
    </script>

    <script>
      
      


      $(document).ready(function() {
        $("#clientPhone").html(maskPhoneNumber("+233-241-266-800"));
      });
     
      function maskPhoneNumber(text) {
        var maskedText = "";
        for (var i = 0; i < text.length; i++) {
          if (i >= 5 && i <= 11) {
            maskedText += "*";
          } else {
            maskedText += text[i];
          }
        }
return maskedText;
}
    </script>

    <script>
      <?php
        if(isset($_POST['policy_lookup_btn']) && $showModal==true){
          echo '$(document).ready(function(){
                $("#otp-modal").modal("show");
                  });';
        }
        if(isset($_POST['verify_otp']) && $showAllert==true){
          echo '$(document).ready(function(){
                alert("confirm otp btn");
                  });';
        }
      ?>
    </script>
  </body>
</html>
