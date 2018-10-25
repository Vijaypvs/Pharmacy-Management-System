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
	<link rel="stylesheet" type="text/css" href="all.css">
	
	<title>Modify Medicine</title>
</head>
<body>
	<h1>Modify Medicine</h1>
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
$con = mysqli_connect("localhost","root","","pharmacy");

 $med_category=filter_input(INPUT_POST, 'med_category');
 $search=filter_input(INPUT_POST, 'search');
if (!$con)
  {
  die('please enter query ' . mysql_error());
  }
	$result = mysqli_query($con,"select * from v_medicines;");
		while ($row = mysqli_fetch_array($result)) 
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
$statement="call GetMedbyName()";
?>
</table><br><br>
<form method="POST" action="modify_med.php">
	<label>Batch Number: </label><br><input type="text" name="Batch_no"><br>
	<label>Medicine Name</label><br><input name="Med_Name"><br>
	<label>Selling Price</label><br><input name="Selling_Price"><br>
	<label>Quantity: </label><br><input name="Quantity">
	<input type="submit" name="submit" value="submit">
</form>
		<a href="admin.php"><input type="button" name="back" value="Back"></a>
		<input type="reset" name="reset" value="Clear">
	</form>
</body>
</html>