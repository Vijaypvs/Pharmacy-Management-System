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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modify Employee</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Employee List</h1>
	<hr>
		<table border="1" cellspacing="0" cellpadding="10" style="border: solid;border-radius: 5px;padding: 0;">
		<tr>
			<th>Employee ID</th>
			<th>Username</th>
			<th>Employee Name</th>
			<th>Contact No.</th>
			<th>Role</th>
			<th>Address</th>
		</tr>
		<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("pharmacy", $con);
 
$result = mysql_query("select * from users natural join employee where Usertype='Employee';");
		while ($row = mysql_fetch_array($result)) 
{
    echo "<tr>";
    echo "<th>" . $row['Emp_ID'] ."</th>";
    echo "<th>" . $row['User_name'] . "</th>";
    echo "<th>" . $row['Name'] . "</th>";
    echo "<th>" . $row['Phone_no'] . "</th>";
    echo "<th>" . $row['Role'] . "</th>";
   	echo "<th>" . $row['Address'] . "</th>";
    echo "</tr>";
}		
?>
		</table>
		<br><br>
	<form method="post" action="modify_emp.php">
		<label>Employee ID: </label>
		<input type="text" name="employee_id" required>
		<br><br>
		<label>Address </label>
		<input type="text" name="Address">
		<br><br>
		<label>Contact No.: </label>
		<input type="text" name="contactno">
		<br><br>
		<label>Salary: </label>
		<input type="text" name="Salary">
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<a href="admin.php"><input type="button" name="back" value="Back"></a>
</body>
</html>
