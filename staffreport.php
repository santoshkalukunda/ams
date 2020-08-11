<?php include('dbConfig.php') 


?>

<?php
if (isset($_GET['idd'])) {
$idd=($_GET['idd']);

$total[]=0;
$sql="SELECT * FROM staff WHERE phone=".$_GET['idd']."";
$result=mysqli_query($conn, $sql);
$record=mysqli_fetch_array($result);
$name=$record['name'];
$cls=$record['email'];
$rl=$record['phone'];
}


$date = date('m/d/Y');

?>
<?php

if (isset($_POST['search'])) {

	$fdate=$_POST['fdate'];
	$tdate=$_POST['tdate'];
	$st=$_POST['name'];

	$query="SELECT * FROM ams.$idd WHERE CONCAT(status) LIKE'%$st%' AND adate BETWEEN '$fdate' AND '$tdate'";
	$result=fitterTable($query);
}
else {
	$query="SELECT * FROM ams.$idd";
	$result=fitterTable($query);
}
function fitterTable($query){
include('dbConfig.php');
$result= mysqli_query($conn, $query);
return $result;
}?>


<!DOCTYPE html>
<html>
<head>



</div>

	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content=" width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Staff Attendance Report</title>

            <div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use"])) 
 {
     echo "Welcome: ".$_SESSION['use']."";
      if($_SESSION['use']=="admin"){ ?>
	   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="homepage.php">Home</a>
	   <?php
   }
	   else{
		   ?>
		   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="stafflogin.php">Home</a>
		   <?php
		   
	   }
 }
 else{
  header("location: index.php");
 }

?>
</head>
<body>
	<P><u><b>     Staff Attendance Report</b></u></p>
	<form method="post" action="staffreport.php?idd=<?php echo $idd; ?>">
		
        <div class="input-group">
        <label>From</label></div>
        <div class="input-group">
	    <input type="date" name="fdate"></div>
		<div class="input-group">
        <label>To</label></div>
        <div class="input-group">
        <input type="date" name="tdate"></div>
            <div class="input-group">
        <label>Status</label></div>
        <div class="input-group">
        <input type="text" name="name" placeholder="Enter P or A"></div>
        <div class="input-group">
		<button type="submit" name="search"  class="btn">Search</button>

</div>
Name: <?php echo $name;?>   Email: <?php echo $cls;?>   Phone: <?php echo $rl;?></div>
	<table>
    <thead>
        <tr><th>Date</th>
            <th>Status</th>
           
        </tr>
    </thead>
    <tbody>
    <?php

       while ($row=mysqli_fetch_array($result)) {

         $total[] = $row;?>  
        <tr>
            <td><?php echo $row['adate']; ?></td>
            <td><?php echo $row['status']; ?></td>
          
        </tr>
<?php } 
if($total!=0){
$cout = count($total);
echo "  Total Days : ";
echo --$cout;
}
?>
    </tbody>
</table>

</body>
</html>