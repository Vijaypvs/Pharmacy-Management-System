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
	<title>Modify Customer</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Customer List</h1>
	<hr>
	<table border="1" cellpadding="10" cellspacing="0" style="border: solid;border-radius: 5px;padding: 0;">
		<tr>
			<th>Customer ID</th>
			<th>Customer Name</th>
			<th>Gender</th>
			<th>Phone No.</th>
			<th>Address</th>
			<th>Age</th>
		</tr>
		<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("pharmacy", $con);
 
$result = mysql_query("SELECT * FROM customers");
		while ($row = mysql_fetch_array($result)) 
{
    echo "<tr>";
    echo "<th>" . $row['Cust_ID'] ."</th>";
    echo "<th>" . $row['Name'] . "</th>";
    echo "<th>" . $row['Gender'] . "</th>";
    echo "<th>" . $row['Phone_no'] . "</th>";
    echo "<th>" . $row['Address'] . "</th>";
    echo "<th>" . $row['Age'] . "</th>";
    echo "</tr>";
}		
?>
	</table>
	<form method="post" action="modify_cust.php">
		<label>Customer ID:</label><input type="text" name="Cust_ID" required>
		<label>Phone:</label><input type="text" name="Phone">
		<label>Address:</label><input type="text" name="Address">
		<input type="submit" name="submit" value="submit">
	</form>
	<a href="admin.php"><input type="button" name="back" value="Back"></a>
</body>
</html>