<?php
echo "we're here";
  // Check if the files have been uploaded
  if (isset($_FILES['driver-license-front']) && isset($_FILES['driver-license-rear']) && isset($_FILES['damages'])) {
    // Process the files as needed (e.g. store them on the server)
    move_uploaded_file($_FILES['driver-license-front']['tmp_name'], 'uploads/driver-license-front.jpg');
    move_uploaded_file($_FILES['driver-license-rear']['tmp_name'], 'uploads/driver-license-rear.jpg');
    $i = 0;
    foreach($_FILES['damages']['tmp_name'] as $file){
      move_uploaded_file($file, 'uploads/damage-'.$i.'.jpg');
      $i++;
      }
      echo 'Driver license and damages images uploaded successfully';
      } else {
      echo 'Error uploading driver license and damages images';
      }
?>
