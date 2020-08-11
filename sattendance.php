<?php include('dbConfig.php');?>
<div class="msg">
<?php

if (isset($_POST['save'])) {
$cls=($_POST['class']);
  $sec=($_POST['sec']);

if(empty($_POST['class'])|| empty($_POST['sec']))
{
	echo "Please enter Class and Section";
	    $query="SELECT * FROM student WHERE id=0";
    $result=fitterTable($query);

}
else{

	$query="SELECT * FROM student WHERE CONCAT(class)LIKE'%".$_POST['class']."%' AND CONCAT(section)LIKE'%".$_POST['sec']."%' ";
	$result=fitterTable($query);
}
}
else {
      $query="SELECT * FROM student WHERE id=0";
    $result=fitterTable($query);
    
}
function fitterTable($query){
include('dbConfig.php');
$result= mysqli_query($conn, $query);
return $result;
}

?>

</div>
<!DOCTYPE html>
<html>
<head>


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
</div>
    
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content=" width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Student Attendance</title>
</head>
<body>

	<form action="" method="post">
	<div class="input-group">
		<label>Student Attendance</label></div>
	<div class="input-group">
	<input type="text" placeholder="Enter Class" name="class"></div>
	 <div class="input-group">
	<input type="text" placeholder="Enter Section" name="sec"></div>
	<div class="input-group">
<button type="submit" name="save" class="btn">Attendace</button>
</div>
</form>
<table>
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Roll No.</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
  <?php

       while ($row=mysqli_fetch_array($result)) { ?> 
        <tr>
        	<td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['section']; ?> </td>
            <td><?php echo $row['roll']; ?> </td>

              <td><a class="del_btn"name="abs" target="_blank" href="?idd=<?php echo $row['id']?>">Absent</a></td>
            <td><a class="edit_btn" target="_blank" href="?iid=<?php echo $row['id']; ?>">Present</a></td>
          
        </tr>

        <div class="msg">
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
 
        echo "Error adding user in database<br/>";
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
 
        echo "Error adding user in database<br/>";
        echo "<script>window.close();</script>";
    
}

 }
?></div>  </tbody>


</table>
</body>
</html>