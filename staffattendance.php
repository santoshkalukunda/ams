
<?php include('dbConfig.php');?>
<?php

	$query="SELECT * FROM staff";
	$result=fitterTable($query);
function fitterTable($query){
include('dbConfig.php');
$result= mysqli_query($conn, $query);
return $result;
}
 ?>
<!DOCTYPE html>
<html>
<head>


    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content=" width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">
    <title>
        Staff Attendance
    </title>

    
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
	<p><h3>Staff Attendance</h3></p>
    <table>
    <thead>
        <tr><th>ID</th>
            <th>  Name</th>
            <th>  Email</th>
            <th>  Phone</th>
            <th colspan="2">  Action</th>
        </tr>
    </thead>
    <tbody>

      <?php

       while ($row=mysqli_fetch_array($result)) { ?>  
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
           <td><a class="del_btn"name="abs" target="_blank" href="?idd=<?php echo $row['phone']?>">Absent</a></td>
            <td><a class="edit_btn" target="_blank" href="?iid=<?php echo $row['phone']; ?>">Present</a></td>
           
        </tr>
  <?php } 


 if (isset($_GET['idd'])) {
$idd=($_GET['idd']);
$date = date('Y-m-d');

$check="SELECT * FROM ams.$idd WHERE adate ='$date'";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[1] > 1) {
    echo "User Already in Exists<br/>";
    $sql="UPDATE ams.$idd SET status='A' WHERE adate='$date'";
    $result = mysqli_query($conn, $sql);
      echo "<script>window.close();</script>";
}

else
{
	   $sql = "INSERT INTO ams.$idd (adate, status) VALUES ('$date','A')";
 	mysqli_query($conn, $sql);
    echo "<script>window.close();</script>";
}

}

  

if (isset($_GET['iid'])) {
$iid=($_GET['iid']);
$date = date('Y-m-d');

 $check="SELECT * FROM ams.$iid WHERE adate ='$date'";
$rs = mysqli_query($conn,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[1] > 1) {
    echo "User Already in Exists<br/>";
    $sql="UPDATE ams.$iid SET status='P' WHERE adate='$date'";
    $result = mysqli_query($conn, $sql);
    echo "<script>window.close();</script>";
}

else
{
	   $sql = "INSERT INTO ams.$iid (adate, status) VALUES ('$date','P')";
 	mysqli_query($conn, $sql);
        echo "<script>window.close();</script>";
    
}

 }
?>

    </tbody>
</table>



</body>
</html>