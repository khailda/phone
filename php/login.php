<?php
    session_start();

   require_once("connect.php");
    
   $email = $_POST['txtuname'];
    $pass = $_POST['txtpass'];
    
    # Validate login credentials
    
     $query = "SELECT * FROM sign_up where email='$email'";
  $res  = mysqli_query($con, $query);

     $data = mysqli_fetch_array($res);
       $data['email']==$email;
      $data['password']==md5($pass);
      echo $id= $data['id'];

   if(  $data['email']==$email && $data['password']==md5($pass))
    {
        
           $_SESSION['uid']=$email;
           $_SESSION['id']=$id;
            header('Location: ..\home.php') or die(" Error ");
        
        
    }
        $_SESSION['login_error']=true;
        header("Location: ..\index.php") or die(" Error ");
    mysqli_close($con);
  

?>