<?php
$con = mysqli_connect("localhost","root","","pharmacy");
$Emp_ID = filter_input(INPUT_POST, 'employee_id');
$address= filter_input(INPUT_POST,'Address' );
$phone_no = filter_input(INPUT_POST, 'contactno');
$Salary=filter_input(INPUT_POST,'Salary');
if (!$con)
  {
  die('please enter query ' . mysql_error());
  }
  $result = mysqli_query($con,"SELECT User_name FROM employee where Emp_ID='$Emp_ID'");
while ($row = mysqli_fetch_array($result)) {
	$username=$row['User_name'];
}
if(!$address and !$phone_no and !$Salary){
	echo "<script type='text/javascript'>
 	alert('Please enter some data');
 	location='modify_employee.php';
 	</script>";
}
elseif(!$address){
	if(!$phone_no){
		$sql="update employee set Salary='$Salary' where Emp_ID='$Emp_ID';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	elseif(!$Salary){
		$sql="update users set Phone_no='$phone_no' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	else{
		$sql="update users set Address='$address',Phone_no='$phone_no' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
		$sql="update employee set Role='$role', Salary='$Salary' where Emp_ID='$Emp_ID';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
}
elseif(!$phone_no){
	if(!$address){
		$sql="update employee set Salary='$Salary' where Emp_ID='$Emp_ID';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	elseif(!$Salary){
		$sql="update users set Address='$address' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	else{
		$sql="update users set Address='$address',Phone_no='$phone_no' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
		$sql="update employee set Role='$role', Salary='$Salary' where Emp_ID='$Emp_ID';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
}
elseif(!$Salary){
	if(!$address){
		$sql="update users set Phone_no='$phone_no' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	elseif(!$phone_no){
		$sql="update users set Address='$address' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	else{
		$sql="update users set Address='$address',Phone_no='$phone_no' where User_name='$username';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
		$sql="update employee set Role='$role', Salary='$Salary' where Emp_ID='$Emp_ID';";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location:modify_employee.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
}
?>