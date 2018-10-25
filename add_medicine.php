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
	<title>Add Medicine</title>
	<link rel="stylesheet" type="text/css" href="all.css">
</head>
<body>
	<h1>Add Medicine</h1>
	<hr>
	<form method="post" action="add_med.php">
		<label>Entry Date: </label>
		<input type="Date" name="entry_date">
		<br><br>
		<label>Medicine ID: </label>
		<input type="text" name="med_id">
		<br><br>
		<label>Medicine Name: </label>
		<input type="text" name="med_name">
		<br><br>
		<label>Category: </label><br>
		<input type="radio" name="med_category" value="tablet">Tablet<br>
		<input type="radio" name="med_category" value="capsule">Capsule<br>
		<input type="radio" name="med_category" value="syrup">Syrup<br>
		<input type="radio" name="med_category" value="cream">Cream<br>
		<br>
		<label>Quantity: </label>
		<input type="number" name="quantity">
		<br><br>
		<label>Batch no: </label>
		<input type="text" name="batch_no">
		<br><br>
		<label>Manufacturer: </label>
		<input type="text" name="manufacturer_name">
		<br><br>
		<label>Manufacturing Date: </label>
		<input type="Date" name="mfg_date">
		<br><br>
		<label>Expiry Date: </label>
		<input type="Date" name="exp_date">
		<br><br>
		<label>Buying Price: </label>
		<input type="number" name="buying_price">
		<br><br>
		<label>Selling Price: </label>
		<input type="number" name="selling_price">
		<br><br>
		<input type="submit" name="submit" value="Submit">
		<a href="admin.php"><input type="button" name="back" value="Back"></a>
		<input type="reset" name="reset" value="Clear">
	</form>
</body>
</html>