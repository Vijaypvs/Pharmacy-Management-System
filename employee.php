<?php
session_start();
// Store Session Data
$_SESSION['User_type']='Employee';
$_SESSION['logged_in']=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Welcome</h1>
	<a href="logout.php"><input type="button" name="employee_logout" value="Log Out"></a>
	<hr>
	<form>
		<a href="view_customer.php"><input type="button" name="view_customer" value="View Customer"></a>
		<a href="add_customerE.php"><input type="button" name="add_customer" value="Add Customer"></a>
		<br><br>
		<a href="retail_saleE.<?php  ?>"><input type="button" name="retail_sale" value="Retail Sale"></a>
		<br><br>
		<a href="view_medicineE.php"><input type="button" name="view_stock" value="View Stock">
	</form>
</body>
</html>