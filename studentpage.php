<?php include('dbConfig.php');?>
<?php

if(isset($_POST['save']))
{

    if(empty($_POST['name'])||empty($_POST['class'])||empty($_POST['roll'])||empty($_POST['section']))
    {
    echo "Please fill all the field";
      $query="SELECT * FROM student WHERE id=00";
    $result=fitterTable($query);
   }
   else{
        $query="SELECT * FROM student WHERE CONCAT(name) LIKE'%".$_POST['name']."%' AND CONCAT(class)LIKE'%".$_POST['class']."%' AND CONCAT(roll) LIKE'%".$_POST['roll']."%' AND CONCAT(section) LIKE'%".$_POST['section']."%'";
        $result=fitterTable($query);
        }
}
else {
      $query="SELECT * FROM student WHERE id=00";
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

        
        Search Student
    </title>
</head>
<body>
    <form method="post" action="">
        <div class="input-group">
        <label>Search Student</label>
        <input type="text" name="class" placeholder="Filter by Class"></div>
        <div class="input-group">
        <input type="text" name="section" placeholder="Filter by Section"></div>
        <div class="input-group">
        <input type="text" name="name" placeholder="Filter by Name"></div>
            <div class="input-group">
        <input type="text" name="roll" placeholder="Filter by Roll No."></div>
        <div class="input-group">
        <button type="submit" name="save"  class="btn">Search</button>

</div>
    </form>

    <table>
    <thead>
        <tr><th>ID</th>
            <th>  Name</th>
            <th>  Class</th>
            <th>  Roll</th>
            <th>  Section</th>
            <th>  Action</th>
        </tr>
    </thead>
    <tbody>

      <?php

       while ($row=mysqli_fetch_array($result)) { ?>  
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['roll']; ?> </td>
            <td><?php echo $row['section']; ?> </td>
            <td><a class="edit_btn" href="sreport.php?idd=<?php echo $row['id']; ?>">View</a></td>
           
        </tr>

<?php } 


?>
    </tbody>
</table>



</body>
</html>