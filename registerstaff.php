<?php include('dbConfig.php');
?>

<!Doctype html>
<html>
<head>
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />

  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">

<title> Register Staff </title>
  <div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use1"])) 
 {
   echo "Welcome: ".$_SESSION['use1']."";
   
 }
 else{
  header("location: index.php");
 }

?>

 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="homepage.php">Home</a>
 
</div>

</head>
<body>
<div class="msg">
 <?php

  if(isset($_POST['save']))
{
  $user=$_POST['username'];
$eml=($_POST['email']);
$pwd=$_POST['password'];
$phn=$_POST['phone'];

if (empty($user)|| empty($eml)||empty($pwd)||empty($phn)) {
 echo "Unable to save ";
 echo "please fill all fields";
}

else{

  $check="SELECT * FROM staff WHERE email='$eml' OR phone='$phn'";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) {
    echo "Email or Phone Already in Exists<br/>";
}
else{
    $sql = "INSERT INTO staff (name, password, email, phone)
    VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["phone"]."')";

    $result = mysqli_query($conn,$sql);
    echo "Save Succesful"; 

      $sql1="CREATE TABLE IF NOT EXISTS ams.".$_POST['phone']." ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    adate VARCHAR(30) NOT NULL,
    status VARCHAR(30) NOT NULL)";
    $result1 = mysqli_query($conn, $sql1);
}
}
}

?>
</div>
     

<form action="registerstaff.php" method="post">
<p><h3><u>Register Staff</u></h3></p>
    <div class="input-group">
<input type="text" name="username" placeholder="Username"></div>
<div class="input-group">
<input type="text" name="email" placeholder="Email"></div>
<div class="input-group">
<input type="text" name="phone" placeholder="Phone"></div>
<div class="input-group">
<input type="password"id="myInput" name="password" placeholder="Password">
</div>

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
<button type="submit" name="save" class="btn">Save</button>
</div>
</form>
</body>
</html>