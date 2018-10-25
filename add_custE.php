<?php
$mysqli = mysqli_connect("localhost","root","","pharmacy");
$Name = filter_input(INPUT_POST, 'customer_name');
$Cust_ID = filter_input(INPUT_POST, 'customer_id');
$address= filter_input(INPUT_POST,'customer_address' );
$phone_no = filter_input(INPUT_POST, 'customer_phone');
$gender=filter_input(INPUT_POST,'gender');
$Age=filter_input(INPUT_POST,'customer_age');


$sql="INSERT customers values ('$Cust_ID','$gender','$address','$Age','$Name','$phone_no')";
if ($mysqli->query($sql)){
          echo "New record is inserted sucessfully";
          header("location: add_customerE.php");
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        $mysqli->close();
?>