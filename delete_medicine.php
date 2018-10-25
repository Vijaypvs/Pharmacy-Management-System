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
	<title>Delete Medicine</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Delete Medicine</h1>
	<hr>
	<table id="display" border="1" cellspacing="0" cellpadding="10" style="border: solid;border-radius: 5px;padding: 0;">
			<tr>
				<th>Medicine ID</th>
				<th>Medicine Name</th>
				<th>Expiry date</th>
				<th>Available</th>
				<th>Category</th>
				<th>Manufacturer</th>
				<th>Buying price</th>
				<th>Selling price</th>
				<th>Entry date</th>
				<th>Manufacturing Date</th>
				<th>Batch No.</th>
			</tr>
			<?php
$con = mysql_connect("localhost","root","");

 $med_category=filter_input(INPUT_POST, 'med_category');
 $search=filter_input(INPUT_POST, 'search');
if (!$con)
  {
  die('please enter query ' . mysql_error());
  }
  
mysql_select_db("pharmacy", $con);
	$result = mysql_query("select * from stock natural join med_details;");
		while ($row = mysql_fetch_array($result)) 
{
    echo "<tr>";
    echo "<th>" . $row['Med_ID'] ."</th>";
    echo "<th>" . $row['Med_Name'] . "</th>";
    echo "<th>" . $row['Exp_Date'] . "</th>";
    echo "<th>" . $row['Quantity'] . "</th>";
    echo "<th>" . $row['Category'] . "</th>";
    echo "<th>" . $row['Manufacturer'] . "</th>";
    echo "<th>" . $row['Buying_Price'] . "</th>";
    echo "<th>" . $row['Selling_Price'] . "</th>";
    echo "<th>" . $row['Entry_Date'] . "</th>";
    echo "<th>" . $row['Mfg_Date'] . "</th>";
    echo "<th>" . $row['Batch_no'] . "</th>";
    echo "</tr>";
}
?>
</table>
<form method="POST" action="delete_med.php">
	<label>Type: </label><br>
	<input type="radio" name="med_category" value="Med_ID">Medicine ID<br>
	<input type="radio" name="med_category" value="Batch_no">Batch Number<br>
	<br>
	<label>Search: </label>
	<input type="text" name="search1">
	<label>Expiry Date:</label>
	<input type="text" name="search2">
	<input type="submit" name="submit" value="submit">
</form>
<a href="admin.php"><input type="button" name="back" value="Back"></a>
</body>
</html>