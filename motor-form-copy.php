<!DOCTYPE html>
<html>
<html lang="en">

<head>
<title>Vanguard Assurance | Loss By Fire Claim</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
  <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
  
  <!-- <link rel="stylesheet" href="css/style.css" /> -->
</head>

<body>
  <div class="container">
    <form id="driver-license-form" class="form">
      <div class="row">
        <div class="col-md-4 form-group">
          <input type="file" id="driver-license-front" name="driver-license-front" class="form-control filepond">
        </div>
        <div class="col-md-4 form-group">
          <input type="file" id="driver-license-rear" name="driver-license-rear" class="form-control filepond">
        </div>
        <div class="col-md-4 form-group">
          <input type="file" id="damages" name="damages[]" multiple class="form-control filepond">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group">
          <button class="btn btn-danger" id="submit" name="submit" type="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <?php include_once 'shared/_upload_scripts.php'; ?>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Initialize FilePond on the driver's license front and rear, and damages input elements
FilePond.parse(document.body);

// Add a submit event listener to the form
document.getElementById('driver-license-form').addEventListener('submit', function(event) {
  event.preventDefault();

  // Retrieve the FilePond file objects for the driver's license front and rear, and damages inputs
  var driverLicenseFront = FilePond.getFile(document.getElementById('driver-license-front'));
  var driverLicenseRear = FilePond.getFile(document.getElementById('driver-license-rear'));
  var damages = FilePond.getFiles(document.getElementById('damages'));

  // Create a new FormData object to store the files
  var formData = new FormData();
  formData.append('driver-license-front', driverLicenseFront.file);
  formData.append('driver-license-rear', driverLicenseRear.file);

  // Add the damages files to the FormData object
  for (var i = 0; i < damages.length; i++) {
    formData.append('damages[]', damages[i].file);
  }

  // Send the files to the server using an AJAX request
  fetch('process-driver-license.php', {
    method: 'POST',
    body: formData
  })
  .then(function(response) {
    return response.text();
  })
  .then(function(responseText) {
    console.log(responseText);
  });
});
  </script>

  
</body>

</html>