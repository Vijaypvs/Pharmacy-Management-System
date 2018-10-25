<?php
$mysqli = mysqli_connect("localhost","root","","pharmacy");
$User_name = filter_input(INPUT_POST, 'username');
$Emp_ID = filter_input(INPUT_POST, 'employee_id');
$Name = filter_input(INPUT_POST, 'employee_name');
$password = filter_input(INPUT_POST, 'password');
$address= filter_input(INPUT_POST,'Address' );
$phone_no = filter_input(INPUT_POST, 'contactno');
$role = filter_input(INPUT_POST, 'role');
if($role == 'Worker'){
  $User_type='Employee';
}
else{
  $User_type='Admin';
}
$DOB=filter_input(INPUT_POST,'dob');
$Age=filter_input(INPUT_POST,'age');
$Salary=filter_input(INPUT_POST,'Salary');
$pswd=password_hash("$password", PASSWORD_DEFAULT);
$sql="INSERT users values ('$User_name','$pswd','$address','$phone_no','$Name','$User_type')";
if ($mysqli->query($sql)){
          echo "New record is inserted sucessfully";
          $sql="INSERT employee values ('$Emp_ID','$DOB','$role','$Age','$User_name','$Salary')";
          if ($mysqli->query($sql)){
          echo "New record is inserted sucessfully";
          header("location: add_employee.php");
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        }
        else{
          echo "Error: ". $sql ."<br>". $mysqli->error;
        }
        $mysqli->close();
?>