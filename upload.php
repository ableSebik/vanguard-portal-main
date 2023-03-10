<?php
  $file = $_FILES['filepond-input'];
  $fileName = $file['name'];
  $fileTempName = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];
  $fileType = $file['type'];
  echo $fileName;
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));
  
  $allowed = array('jpg', 'jpeg', 'png', 'pdf');
  
  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 1000000) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $fileDestination = 'uploads/'.$fileNameNew;
        move_uploaded_file($fileTempName, $fileDestination);
        header("Location: index.php?uploadsuccess");
      } else {
        echo "Your file is too big!";
      }
    } else {
      echo "There was an error uploading your file!";
    }
  } else {
    echo "You cannot upload files of this type!";
  }
?>
