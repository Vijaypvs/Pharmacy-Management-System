<?php
$con = mysqli_connect("localhost","root","","pharmacy");
 $med_category=filter_input(INPUT_POST, 'med_category');
 $search1=filter_input(INPUT_POST, 'search1');
 $search2=filter_input(INPUT_POST, 'search2');
if (!$con)
  {
  die('please enter query ' . mysql_error());
  }
$sql="delete from med_details where $med_category='$search';";
if ($con->query($sql)){
    echo "record was deleted sucessfully";
}
 else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
$sql="delete from stock where $med_category='$search1' and Exp_Date='$search2';";
if ($con->query($sql)){
    echo "record was deleted sucessfully";
}
 else{
    echo "Error: ". $sql ."<br>". $mysqli->error;
}
header("location:delete_medicine.php");
?>