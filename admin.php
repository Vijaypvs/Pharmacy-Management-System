<?php
session_start();
// Store Session Data
$_SESSION['User_type']='Admin';
$_SESSION['logged_in']=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Welcome Admin</h1>
	<a href="logout.php"><input type="button" name="admin_logout" value="Log Out"></a>
	<hr>
	<form>
		<h3>Medicine</h3>
		<a href="add_medicine.php"><input type="button" name="add_medicine" value="Add Medicine"></a>
		<a href="modify_medicine.php"><input type="button" name="modify_medicine" value="View and Modify Medicine"></a>
		<a href="delete_medicine.php"><input type="button" name="delete_medicine" value="Delete Medicine"></a>
	</form>
	<form>
		<h3>Employee</h3>
		<a href="add_employee.php"><input type="button" name="add_employee" value="Add Employee"></a>
		<a href="modify_employee.php"><input type="button" name="modify_employee" value="View and Modify Employee"></a>
		<a href="delete_employee.php"><input type="button" name="delete_employee" value="Delete Employee"></a>
	</form>
	<form>
		<h3>Supplier</h3>
		<a href="add_supplier.php"><input type="button" name="add_supplier" value="Add Supplier"></a>
		<a href="modify_supplier.php"><input type="button" name="modify_supplier" value="View and Modify Supplier"></a>
		<a href="delete_supplier.php"><input type="button" name="delete_supplier" value="Delete Supplier"></a>
	</form>
	<form>
		<h3>Customer</h3>
		<a href="add_customerA.php"><input type="button" name="add_customer" value="Add Customer"></a>
		<a href="modify_customer.php"><input type="button" name="modify_customer" value="View and Modify Customer"></a>
		<a href="delete_customer.php"><input type="button" name="delete_customer" value="Delete Customer"></a>
	</form>
	<form>
		<h3>Retail Sale</h3>
		<a href="retail_saleA.php"><input type="button" name="retail_sale" value="Retail Sale"></a>
		<!-- <input type="button" name="view_sale" value="View Sale"> -->
	</form>
</body>
</html>