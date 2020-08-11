<?php
   include('dbConfig.php');
   session_start();
 ?>

<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />

<title>Login</title>


</head>
<body>
  <div class="msg">
<?php 

   if(isset($_POST['login'])) {
       
  $password=($_POST['password']);
  $email=($_POST['email']);

      $sql = "SELECT id FROM staff WHERE email='$email' and password='$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
     
    
      if($count == 1) {

         $_SESSION['use']=$email;
         header("location: stafflogin.php");
          
      }else {
         echo "Login Email or Password is invalid";
      }
   }
  ?>
  </div>

</div>
     

<form action="" method="post">
<p><h3><u>Login</u></h3></p>

 <div class="input-group">
<input type="text" name="email" placeholder="Email"></div>
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