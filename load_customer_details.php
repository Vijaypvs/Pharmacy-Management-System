<?php
$Cust_ID = $_POST['Cust_ID'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("pharmacy", $con);
$result = mysql_query("SELECT * FROM customers where Cust_ID='$Cust_ID'");
if(!$result){
	echo "<script type='text/javascript'>
 	alert('Please enter some data');
 	location='modify_customer.php';
 	</script>";
}
else{
		while ($row = mysql_fetch_array($result)){
    			echo $row['Name']."and".$row['Age'];
		}
	}
?>
