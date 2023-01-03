<?php
if(isset($_POST['submit'])){
  $files = $_FILES['files']['name'];
  for($i=0; $i<=size($files);$i++){
    echo $files[$i];
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <input type="file" multiple name="files">
    <button type="submit"  name="submit">submit</button>
  </form>
</body>

</html>