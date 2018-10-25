<?php
$Batch_no = $_POST['Batch_no'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pharmacy", $con);
$result = mysql_query("select * from stock natural join med_details where Batch_no='$Batch_no';");
		while ($row = mysql_fetch_array($result)){
    			echo $row['Med_ID']."and".$row['Med_Name']."and".$row['Quantity']."and".$row['Exp_Date']."and".$row['Selling_Price'];
		}
?>