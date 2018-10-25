<?php
session_start();
// Store Session Data
if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in']==1 and $_SESSION['User_type']!='Admin'){
		echo "<script type='text/javascript'>
 		alert('Please use Admin login to access this page');
 		location='index.html';
 		</script>";
	}
}
else {
    echo "<script type='text/javascript'>
 	alert('Please login');
 	location='index.html';
 	</script>";
}
?><!DOCTYPE html>
<html>
<head>
	<title>Delete Medicine</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Employee List</h1>
	<hr>
	<!-- <form> -->
		<table border="1" cellspacing="0" cellpadding="10" style="border: solid;border-radius: 5px;padding: 0;">
		<tr>
			<th>Employee ID</th>
			<th>Username</th>
			<th>Employee Name</th>
			<!-- <th>Email</th> -->
			<th>Contact No.</th>
			<th>Role</th>
		</tr>
		<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("pharmacy", $con);
 
$result = mysql_query("select * from users left join employee on users.User_name=employee.User_name;");
		while ($row = mysql_fetch_array($result)) 
{
    echo "<tr>";
    echo "<th>" . $row['Emp_ID'] ."</th>";
    echo "<th>" . $row['User_name'] . "</th>";
    echo "<th>" . $row['Name'] . "</th>";
    // echo "<th>" . $row['password'] . "</th>";
    echo "<th>" . $row['Phone_no'] . "</th>";
    echo "<th>" . $row['Role'] . "</th>";
    echo "</tr>";
}		
?>
	</table>
<br><br><br>
<form method="post" action="delete_emp.php">
	<label>Employee ID</label>
	<input type="text" name="Emp_ID">
	<br><br>
	<!-- <label>Search: </label>
	<input type="text" name="search"> -->
	<input type="submit" name="submit" value="submit">
</form>
<a href="admin.php"><input type="button" name="back" value="Back"></a>
</body>
</html>