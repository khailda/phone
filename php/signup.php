<?php

    session_start();

    $_SESSION['success']="false";

    require_once("connect.php");

    $fname = $_POST['firstname1'];
    $lname = $_POST['lastname1'];
    $dob = $_POST['datepicker'];
     $mobile = $_POST['MOBILE'];
    $email = $_POST['email1'];
    $pass = md5($_POST['password1']);


 $sql = "SELECT email FROM sign_up WHERE email='$email'"; 
$select = mysqli_query($con, $sql);


if(mysqli_num_rows($select) ==0){
    $sql = "INSERT INTO sign_up(fname, lname, email, password, mobile,dob)
VALUES ('$fname',' $lname', '$email', '$pass','$mobile','$dob')";
$result = mysqli_query($con, $sql);
if($result)
{
  
 $_SESSION['success']="true";
 header("Location: ..\index.php");
}
else {
    $_SESSION['Insert_error']="true";
   header("Location: ..\signup.php");}}

else{ // Forgot a field.
    
        print '<p class="text--error">Email already exsist try different!</p>';
   $_SESSION['email_error']="true";
   header("Location: ..\signup.php");

    }



?>