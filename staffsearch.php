<?php include('dbConfig.php');?>
<?php

if (isset($_POST['search'])) {
	
	$valueToSearch=$_POST['Search'];
	$query="SELECT * FROM staff WHERE CONCAT(id, name, email, password, phone)LIKE'%".$_POST['Search']."%'";
	$result=fitterTable($query);
}
else {
	$query="SELECT * FROM staff";
	$result=fitterTable($query);
}
function fitterTable($query){
include('dbConfig.php');
$result= mysqli_query($conn, $query);
return $result;
}

 ?>
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
	<title>

		
		Search Staff
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
	<form method="post" action="staffsearch.php">
		<div class="input-group">
		<label>Search Staff</label>

		<input type="text" name="Search" placeholder="Enter to Search"></div>
		<div class="input-group">
		<button type="submit" name="search"  class="btn">Search</button>
</div>
	</form>

	<table>
    <thead>
        <tr><th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th colspan="3">Action</th>
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
            <td><?php echo $row['password']; ?> </td>
            <td><a class="edit_btn" href="editstaff.php?idd=<?php echo $row['id']; ?>">Edit</a></td>
             <td><a class="edit_btn" href="staffreport.php?idd=<?php echo $row['phone']; ?>">View</a></td>
            <td><a onclick="return confirm('Are you sure?')" class="del_btn" href="staffsearch.php?idd=<?php echo $row['id'] ?>">Delete</a></td>
        </tr>

<?php } 
if (isset($_GET['idd'])) {
$sql="DELETE FROM staff WHERE id=".$_GET['idd']."";
$result=mysqli_query($conn, $sql);
$iid=$_GET['idd'];

$ff="drop table ams.$iid";
$result=mysqli_query($conn, $sql1);
?>

<meta http-equiv="refresh" content="5"; url="staffsearch.php">

<?php
header("location: staffsearch.php");
}

?>
    </tbody>
</table>



</body>
</html>