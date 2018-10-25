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
	<title>Add Supplier</title>
	<link rel="stylesheet" type="text/css" href="all.css">
</head>
<body>
	<h1>Add Supplier</h1>
	<hr>
	<form method="post" action="add_supp.php">
		<label>Supplier ID: </label>
		<input type="text" name="supplier_id">
		<br><br>
		<label>Company Name: </label>
		<input type="text" name="company_name">
		<br><br>
		<label>Email: </label>
		<input type="Email" name="supplier_email">
		<br><br>
		<label>Contact: </label>
		<input type="text" name="supplier_contact">
		<br><br>
		<label>Address: </label>
		<input type="text" name="supplier_address">
		<br><br>
		<input type="submit" name="save">
		<a href="admin.php"><input type="button" name="back" value="Back"></a>
		<input type="reset" name="clear" value="Clear">
	</form>
</body>
</html>