<?php
$mysqli = mysqli_connect("localhost","root","","pharmacy");
$Company_Name = filter_input(INPUT_POST, 'company_name');
$Supplier_ID = filter_input(INPUT_POST, 'supplier_id');
$address= filter_input(INPUT_POST,'supplier_address' );
$phone_no = filter_input(INPUT_POST, 'supplier_contact');
$Email=filter_input(INPUT_POST,'supplier_email');


$sql="INSERT supplier values ('$Supplier_ID','$address','$phone_no','$Company_Name','$Email')";
if ($mysqli->query($sql)){
          echo "New record is inserted sucessfully";
          header("location: add_supplier.php");
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        $mysqli->close();
?>