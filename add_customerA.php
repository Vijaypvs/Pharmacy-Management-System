<?php
session_start();
if(isset($_SESSION['logged_in']) and isset($_SESSION['User_type'])){
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
	<title>Add Customer</title>
	<link rel="stylesheet" type="text/css" href="all.css">
</head>
<body>
	<h1>Add Customer</h1>
	<hr>
	<form method="post" action="add_custA.php">
		<label>Customer ID: </label>
		<input type="text" name="customer_id">
		<br><br>
		<label>Customer Name: </label>
		<input type="text" name="customer_name">
		<br><br>
		<div>
			<label>Gender: </label><br>
			<input type="radio" name="gender" value="Male">Male<br>
			<input type="radio" name="gender" value="Female">Female<br>
			<input type="radio" name="gender" value="Others">Others
			<br><br>
		</div>
		<label>Phone No.: </label>
		<input type="text" name="customer_phone">
		<br><br>
		<label>Address: </label>
		<input type="text" name="customer_address">
		<br><br>
		<label>Age: </label>
		<input type="number" name="customer_age" min="1">
		<br><br>
		<input type="submit" name="save" value="submit">
		<a href="admin.php"><input type="button" name="back" value="Back"></a>
		<input type="reset" name="clear" value="Clear">
</body>
</html>