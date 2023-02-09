<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vanguard Assurance</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css"/> -->

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>

    <!-- main style css -->
    <link rel="stylesheet" href="css/style-new.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <i class="fa-sharp fa-solid fa-envelope"></i>
        <a class="nav-item" href="#">vacmails@vanguardassurance.com</a>
        <i class="fa-sharp fa-solid fa-phone"></i>
        <a class="nav-item" href="#">+233 244 334 407</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#"><i class="fa-brands fa-twitter"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-brands fa-facebook-f"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-brands fa-linkedin"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link"><i class="fa-brands fa-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- home page content -->
      <div class="homePage">
        <!-- right content -->
        <div class="rightContent">
          <h1 class="section_heading">Online Claims &amp; Proposals Forms</h1>
        </div>
        left content -->
        <div class="leftContent">
          <h5>Dear valued client,</h5>

          <label class="control-label" for="policyID">Kindly enter your Policy ID to begin claim process.</label>
          <!-- froms -->
          <form method="POST" action="">
            <div class="row">
              <div class="col-md-9 col-sm-12">
                <input type="text" class="form-control" name="policyID" id="policyID" autofocus placeholder="Policy ID"/>
              </div>

              <div class="col-md-3 col-sm-12">
                <button type="submit" class="btn btn-primary btn-block" name = "policy_lookup_btn">PROCEED</button>
              </div>

            </div>

          </form> <!-- End index Form -->
        </div>
      </div> <!-- End main_content

    </div>

    <!-- footer -->
    <div></div>
    <!-- End footer -->

    <!-- Copyright -->
    <div></div>
    <!-- End Copyright -->

    <!-- confirm details modal -->
    <div class="modal fade" style="text-align: center" id="otp-modal" tabindex="-1" role="dialog" aria-labelledby="confirmotp" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <h3 class="heading">Confirm OTP</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="false">&times;</span>
            </button>
          </div>

          <!--Body-->
          <?php

          ?>
          <div class="modal-body otp-card">
            <form class="otp-form" action="" autocomplete = 0 id="otp-form" method="post">
              <h2 class="text-muted">2-Step Verification</h2>

              <img src="images/smartphone.png" alt="" class="otp-phone-img"/>

              <p class="otp-paragraph">
                A text message with verification code was sent to
              </p>
              
              <p class="otp-paragraph" id="clientPhone"></p>

              <div class="otp-div">
                <input type="text" id="otp1" class="form-control otp-code" pattern="[0-9]" maxlength="1" autofocus required/>
                <input type="text" id="otp2" class="form-control otp-code" pattern="[0-9]" maxlength="1" required/>
                <input type="text" id="otp3" class="form-control otp-code" pattern="[0-9]" maxlength="1" required/>
                <input type="text" id="otp4" class="form-control otp-code" pattern="[0-9]" maxlength="1" required/>
              </div>

              <div class="modal-buttons">
                <a href="#" onclick="document.getElementById('otp-form').submit();" name="verify_otp" id="verify_otp" class="btn btn-primary btn-block">Verify</a>
                <a href="#">Resend code</a>
              </div> <!-- End modal-buttons -->
            </form>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!-- confirm details modal-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
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
                  $("#otp-modal").modal({
                    backdrop: "static",
                    keyboard: false
                  });
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
