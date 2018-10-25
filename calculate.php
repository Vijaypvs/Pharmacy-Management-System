<?php
$Batch_no = $_POST['Batch_no'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pharmacy", $con);
$result = mysql_query("select * from stock where Batch_no='$Batch_no';");
		while ($row = mysql_fetch_array($result)){
    			$med_mrp=$row['Selling_Price'];
    			$cal=$med_mrp*$quantity;
    			echo $cal;
		}
?>