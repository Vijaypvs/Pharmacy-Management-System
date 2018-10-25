<?php
$con = mysqli_connect("localhost","root","","pharmacy");
 $Cust_ID=filter_input(INPUT_POST, 'Cust_ID');
 $Phone_no=filter_input(INPUT_POST, 'Phone');
 $Address=filter_input(INPUT_POST, 'Address');
 if (!$con)
  {
  die('please enter query ' . mysql_error());
  }

 if(!$Phone_no and !$Address){
 	echo "<script type='text/javascript'>
 	alert('Please enter some data');
 	location='modify_customer.php';
 	</script>";
 	//header("location:modify_customer.php");
 	// echo "<script>document.location='modify_customer.php';
 	// </script>";

 	}
 elseif(!$Phone_no){
$sql="update customers set Address='$Address' where Cust_ID='$Cust_ID';";
if ($con->query($sql)){
    echo "record was updated sucessfully";
    header("location:modify_customer.php");
}
else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
}
elseif(!Address) {
	$sql="update customers set Phone_no='$Phone_no' where Cust_ID='$Cust_ID';";
if ($con->query($sql)){
    echo "record was updated sucessfully";
    header("location:modify_customer.php");
}
else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
}
else{
	$sql="update customers set Phone_no='$Phone_no',Address='$Address' where Cust_ID='$Cust_ID';";
if ($con->query($sql)){
    echo "record was updated sucessfully";
    header("location:modify_customer.php");
}
else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
}
?>
