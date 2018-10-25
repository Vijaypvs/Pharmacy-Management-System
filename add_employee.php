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
	<title>Add Employee</title>
	<link rel="stylesheet" type="text/css" href="all.css">
</head>
<body>
	<h1>Add Employee</h1>
	<hr>
	<form method="post" action="add_emp.php">
		<label>Employee ID: </label>
		<input type="text" name="employee_id">
		<br><br>
		<label>Username: </label>
		<input type="text" name="username">
		<br><br>
		<label>Employee Name: </label>
		<input type="text" name="employee_name">
		<br><br>
		<label>Password: </label>
		<input type="Password" name="password">
		<br><br>
		<label>Address </label>
		<input type="text" name="Address">
		<br><br>
		<label>Contact No.: </label>
		<input type="text" name="contactno">
		<br><br>
		<label>Role: </label><br>
		<input type="radio" name="role" value="Worker">Worker<br>
		<input type="radio" name="role" value="Admin">Admin<br>
		<br><br>
		<label>Age: </label>
		<input type="number" name="age">
		<br><br>
		<!-- <label>Date of Birth</label>
		<input type="date" name="dob">
		<br><br> -->
		<label>Salary: </label>
		<input type="text" name="Salary">
		<br><br>
		<input type="submit" name="submit" value="Submit">
		<input type="reset" name="clear" value="Clear">
	</form>
		<a href="admin.php"><input type="button" name="back" value="Back"></a>
</body>
</html>