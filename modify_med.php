<?php
$con = mysqli_connect("localhost","root","","pharmacy");
 $Med_Name=filter_input(INPUT_POST, 'Med_Name');
 $Selling_Price=filter_input(INPUT_POST,'Selling_Price');
 $Quantity=filter_input(INPUT_POST,'Quantity');
 $Batch_no=filter_input(INPUT_POST, 'Batch_no');
if (!$con)
  {
  die('please enter query ' . mysql_error());
  }
 if(!$Med_Name and !$Selling_Price and !$Quantity){
	echo "<script type='text/javascript'>
 	alert('Please enter some data');
 	location='modify_medicine.php';
 	</script>";
}
elseif(!$Med_Name){
	if(!$Selling_Price){
		$sql="Update stock set Quantity=$Quantity where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location: modify_medicine.php");
		}
 		else{
   			echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	elseif(!$Quantity){
		$sql="Update stock set Selling_Price=$Selling_Price where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location: modify_medicine.php");
		}
 		else{
   			echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	else{
		$sql="Update stock set Selling_Price=$Selling_Price,Quantity=$Quantity where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
   			header("location: modify_medicine.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
}
elseif(!$Selling_Price){
	if(!$Med_Name){
		$sql="Update stock set Quantity=$Quantity where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location: modify_medicine.php");
		}
 		else{
   			echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	elseif(!$Quantity){
		$sql="Update stock set Med_Name='$Med_Name' where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was updated sucessfully";
    		header("location: modify_medicine.php");
		}
 		else{
   			echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	else{
		$sql="Update stock set Med_Name='$Med_Name',Quantity=$Quantity where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was deleted sucessfully";
   			header("location: modify_medicine.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
}
elseif(!$Quantity){
	if(!$Med_Name){
		$sql="Update stock set Quantity=$Quantity where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was deleted sucessfully";
    		header("location: modify_medicine.php");
		}
 		else{
   			echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	elseif(!$Selling_Price){
		$sql="Update stock set Med_Name='$Med_Name' where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was deleted sucessfully";
    		header("location: modify_medicine.php");
		}
 		else{
   			echo "Error: ". $sql ."<br>". $con->error;
		}
	}
	else{
		$sql="Update stock set Med_Name='$Med_Name',Selling_Price=$Selling_Price where Batch_no=$Batch_no;";
		if ($con->query($sql)){
    		echo "record was deleted sucessfully";
   			header("location: modify_medicine.php");
		}
 		else{
    		echo "Error: ". $sql ."<br>". $con->error;
		}
	}
}
?>