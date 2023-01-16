<!DOCTYPE html>
<html>
<html lang="en">

<head>
  <title>Vanguard Assurance | Loss By Fire Claim</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/filepond.min.css">
  <link rel="stylesheet" href="css/filepond-plugin-image-preview.css">

  <link rel="stylesheet" href="css/style.css" />

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="js/filepond.min.js"></script>
  <script src="js/filepond-plugin-image-preview.min.js"></script>
  <script src="js/filepond-plugin-file-validate-type.js"></script>
  <script src="js/filepond-plugin-file-validate-size.js"></script>
  <script src="js/filepond-plugin-image-exif-orientation.js"></script>
  <script src="js/filepond.jquery.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    .form-group {
      margin: 10px 0;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid,
    textarea.invalid {
      border-color: #ff8080;
      box-shadow: 0 0 0 0.1rem rgba(255, 0, 0, 0.25);
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 8px;
      background-color: #ebebeb;
      border: none;
      border-radius: 5px;
      display: inline-block;

    }

    .claim_progressBar {
      justify-content: space-around;
      margin-bottom: 20px;
    }

    .step.active {
      opacity: 0.5;
      background-color: #2e93ff;
    }

    #nextBtn,
    #prevBtn,
    #submit {
      padding: 10px 20px;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #2e93ff;
    }

    .error_msg {
      color: #ff4141;
    }
  </style>
</head>

<body>
  <div class="container">
    <form id="file-form" method="post" enctype="multipart/form-data">
      <input type="file" class="filepond" name="filepond-input" id="filepond-input">
      <input type="submit" value="Upload">
    </form>

  </div>
<script src="js/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/moment.min.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  <script src="js/helperfunctions.js"></script>
  <script>
    const filepondinput = FilePond.create(document.getElementById('filepond-input'));
    var request = new XMLHttpRequest();
    var form = document.getElementById("file-form");
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      var formData = new FormData(form);
      formData.append('file', filepondinput.getFile());
        request.open("POST", "upload.php");
        request.send(formData);
    });

  </script>

  
</body>

</html>