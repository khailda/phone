<?php 

	session_start();
	
	require_once("connect.php");
	
	$email= $_POST['txtemail'];
	$dob= $_POST['txtdob'];
	$mobile=$_POST['mobile'];
	$newpass=md5( $_POST['txtpwd']);
	
	#echo $email . $dob . $sq . $sa . $newpass;
	$query=" SELECT  dob,email,mobile from sign_up where email = '$email' "	;
	$result = mysqli_query($con,$query) ;
	if($data=mysqli_fetch_row($result))
       {
		if($data[0]==$dob && $data[1]==$email && $data[2]==$mobile )
		{echo $query="UPDATE   sign_up set password='$newpass' where email='$email' ";
			 mysqli_query($con,$query);
			$_SESSION['recover_success']=true;
		}
		else
			{$_SESSION['recover_error']=true;
			}
	}
	else
		{$_SESSION['recover_error']=true;
	}
		
	header("location: ..\index.php");
	
	mysqli_close($con);

?>