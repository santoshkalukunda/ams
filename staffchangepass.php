
<?php include('dbConfig.php') ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />
    <div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use"])) 
 {
   echo "Welcome: ".$_SESSION['use']."";
   $email=$_SESSION['use'];
 }
 else{
  header("location: index.php");
 }
?>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="stafflogin.php">Home</a>
</div>
  
<div>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">
	<title> Change Password</title>

</head>
<body>  
<div class="msg">
    <?php    if(isset($_POST['update']))
{
    
    $name=($_POST['cpass']);
    $name1=($_POST['npass']);

if (empty($name)|| empty($name1)) {
 echo "Unable to update ";
 echo "Please enter Current Password and New password ";
}
else{

 $sql = "SELECT id FROM staff WHERE password='".$_POST['cpass']."'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {     
      $sql="UPDATE staff SET password='$name1' WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      echo "Update Successful"; 
      }else {
         echo "Current Password is invalid";
      }
}
 
}
?>
</div>
<form action="" method="post">
<p><h3><u>Update Password</u></h3></p>
 <div class="input-group">
<input type="password" name="cpass" placeholder="Enter Current password"></div>
 <div class="input-group">
<input type="password" id="myInput" name="npass" placeholder="Enter New Password"></div>
<input type="checkbox" onclick="myFunction()">Show Password
<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<div class="input-group">
<button type="submit" name="update" class="btn">Update</button>
</div>

</form>
</body>
</html>