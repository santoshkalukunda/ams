
<?php
   include('dbConfig.php');

   session_start();
?>


<!Doctype html>
<html>
<head>
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="stylesheet" type="text/css" href="style.css">

<title>Login</title>

</head>
<body>

  <div class="msg">
<?php 
$admin="admin";
   if(isset($_POST['login'])) {
      // username and password sent from form 
      
  $password=($_POST['password']);

      $sql = "SELECT id FROM admin WHERE password='$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
     
    
      if($count == 1) {
         $_SESSION['use1']=$admin;
         $_SESSION['use']=$admin;
         header("location: homepage.php");
      }else {
         echo "Login Password is invalid";
      }
   }
  ?>
  </div>
<form action="admin.php" method="post">
<p><h3><u>Login</u></h3></p>

 <div class="input-group">
<input type="password" id="myInput" name="password" placeholder="Password"></div>
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
<button type="submit" name="login" class="btn">Login</button>
</div>


</form>
</body>
</html>