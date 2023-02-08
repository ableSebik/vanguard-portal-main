<?php
if(isset($_POST['submit'])){
  $files = $_FILES['files']['name'];
  for($i=0; $i<=size($files);$i++){
    echo $files[$i];
  }
}
$key= "QzU274iI9CB3q5cG5bTebXTsm";
$to = "0555391302";
$msg = "This is a message from mnotify";
$sender_id = "Mani";

$msg = urlencode($msg);

$url = "https://api.mnotify.com/api/template?key=$key&to=$to&msg=$msg&sender_id=$sender_id";

$response =file_get_contents($url);
echo $response;
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

  <link rel="stylesheet" href="css/style.css" />

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
  <button class="danger" onclick=notify()>Notify</button>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <input type="file" multiple name="files">
    <button type="submit"  name="submit">submit</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/moment.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script>
function notify(){
  event.preventDefault();
  const key= "QzU274iI9CB3q5cG5bTebXTsm";
const to = "0555391302";
const msg = "This is a message from mnotify";
const sender_id = "Mani";
var data ={
  'recipient':['0241266800'],
  'sender':'Vanguard',
'message':'This is a message from mnotify from manfred to Abel',
'is_schedule':'false'};
console.log(to);

console.table(data);

$.ajax({
    method: "POST",
            url: 'https://api.mnotify.com/api/sms/quick?key='+key,
            dataType: 'json',
            headers: {
                'Accept': 'application/json'
                },
                data:data,
            success: function (data) {
                $.each(data, function (key, val) {
                    console.log(JSON.stringify(data));
                });
            },
            error: function (jqXHR) {
                alert(jqXHR.responseText);
            }
});
}

  </script>
</body>

</html>