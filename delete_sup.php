<?php
$con = mysqli_connect("localhost","root","","pharmacy");
 $supplier_id=filter_input(INPUT_POST, 'Supplier_ID');
if (!$con)
  {
  die('please enter query ' . mysql_error());
  }
$sql="delete from supplier where Supplier_ID='$supplier_id';";
if ($con->query($sql)){
    echo "record was deleted sucessfully";
}
 else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
header("location:delete_supplier.php");
?>
