<?php
session_start();
// Store Session Data
if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in']!=1){
		echo "<script type='text/javascript'>
 	alert('Please login');
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
	
	<title>View Stock</title>
</head>
<body>
	<h1>Stock of Medicines</h1>
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
// if($search==NULL){
	$result = mysql_query("select * from v_medicines;");
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
// }
// else{
// $result = mysql_query("select * from stock natural join med_details where $med_category='$search';");
// 		while ($row = mysql_fetch_array($result)) 
// {
//     echo "<tr>";
//     echo "<th>" . $row['Med_ID'] ."</th>";
//     echo "<th>" . $row['Med_Name'] . "</th>";
//     echo "<th>" . $row['Exp_Date'] . "</th>";
//     echo "<th>" . $row['Quantity'] . "</th>";
//     echo "<th>" . $row['Category'] . "</th>";
//     echo "<th>" . $row['Manufacturer'] . "</th>";
//     echo "<th>" . $row['Buying_Price'] . "</th>";
//     echo "<th>" . $row['Selling_Price'] . "</th>";
//     echo "<th>" . $row['Entry_Date'] . "</th>";
//     echo "<th>" . $row['Mfg_Date'] . "</th>";
//     echo "<th>" . $row['Batch_no'] . "</th>";
//     echo "</tr>";
// }	
// }	
?>
</table>
		<br>
		<a href="employee.php"><input type="button" name="back" value="Back">
</body>
</html>