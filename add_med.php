<?php
$mysqli = mysqli_connect("localhost","root","","pharmacy");
$Quantity = filter_input(INPUT_POST, 'quantity');
$Med_ID = filter_input(INPUT_POST, 'med_id');
$Med_Name = filter_input(INPUT_POST, 'med_name');
$Exp_Date = filter_input(INPUT_POST, 'exp_date');
$category= filter_input(INPUT_POST,'med_category' );
$Batch_no = filter_input(INPUT_POST, 'batch_no');
$Manufacturer = filter_input(INPUT_POST, 'manufacturer_name');
$Entry_date=filter_input(INPUT_POST,'entry_date');
$Mfg_Date=filter_input(INPUT_POST,'mfg_date');
$Buying_Price=filter_input(INPUT_POST,'buying_price');
$Selling_Price=filter_input(INPUT_POST,'selling_price');
$today=date("Y/m/d");
if($Mfg_Date>$today){
  echo "<script type='text/javascript'>
  alert('Manufacture date is more than today');
  location='add_medicine.html';
  </script>";
}
else{
$sql="INSERT med_details values ('$Med_ID','$Batch_no','$Mfg_Date','$Entry_date','$Buying_Price','$Manufacturer')";
if ($mysqli->query($sql)){
          echo "New record is inserted sucessfully";
          $sql="INSERT stock values ('$Med_Name','$Med_ID','$Quantity','$Exp_Date','$category','$Selling_Price','$Batch_no')";
          if ($mysqli->query($sql)){
          echo "New record is inserted sucessfully";
          header("location: add_medicine.php");
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        $mysqli->close();
      }
?>