<!DOCTYPE html>
<html>
<head>
	<title>Employee List</title>
	<link rel="stylesheet" type="text/css" href="all.css">
	
</head>
<body>
	<h1>Employee List</h1>
	<hr>
	<!-- <form> -->
		<table border="1" cellspacing="0" cellpadding="10" style="border: solid;border-radius: 5px;padding: 0;">
		<tr>
			<th>Employee ID</th>
			<th>Username</th>
			<th>Employee Name</th>
			<th>Password</th>
			<!-- <th>Email</th> -->
			<th>Contact No.</th>
			<th>Role</th>
		</tr>
		<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysql_select_db("pharmacy", $con);
 
$result = mysql_query("select * from users left join employee on users.User_name=employee.User_name;");
		while ($row = mysql_fetch_array($result)) 
{
    echo "<tr>";
    echo "<th>" . $row['Emp_ID'] ."</th>";
    echo "<th>" . $row['User_name'] . "</th>";
    echo "<th>" . $row['Name'] . "</th>";
    echo "<th>" . $row['password'] . "</th>";
    echo "<th>" . $row['Phone_no'] . "</th>";
    echo "<th>" . $row['Role'] . "</th>";
    echo "</tr>";
}		
?>
		</table>
		
<!-- 	</form>
 --></body>
</html>