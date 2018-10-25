<?php
$mysqli = mysqli_connect("localhost","root","","pharmacy");
$User_name = filter_input(INPUT_POST, 'User_name');
$password=filter_input(INPUT_POST, 'password');
$result_pass = $mysqli->query("SELECT * FROM users WHERE User_name='$User_name'");
//echo $result_pass;

if ( $result_pass->num_rows == 0 ){ // User doesn't exist
    echo "<script type='text/javascript'>
    alert('User Doesn't exist);
    location='index.html';
    </script>";
    }
else { // User exists*/
    $user = $result_pass->fetch_assoc();
    if (password_verify($password, $user['password'])) {
    // if ( $password== $user['password']) {
        if($user['Usertype']=="Admin"){    
        header("location: admin.php");
        //echo"successful login";
        }
        else{
            header("location:employee.php");
        }
    }
    // else{
    // echo"Not verified"; 
    // }
    // if ( $password== $user['password']) {
    //     if($user['Usertype']=="Admin"){    
    //     header("location: admin.php");
    //     //echo"successful login";
    // }
    // else{
    //     header("location:employee.php");
    // }
    // }
    else {
    echo "<script type='text/javascript'>
    alert('You have entered wrong password, try again!');
    location='index.html';
    </script>";
    }
}

?>