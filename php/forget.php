<?php 

	session_start();
	
	require_once("connect.php");
	
	$email= $_POST['txtemail'];
	$dob= $_POST['txtdob'];
	$mobile=$_POST['mobile'];
	$newpass=md5($_POST['txtpwd']);
	
	#echo $email . $dob . $sq . $sa . $newpass;	
	$result = mysqli_query($con," select dob,email,mobile from _login where email = '$email' ") or die(mysql_error($con));
	if($data=mysqli_fetch_row($result))
	{
		if($data[0]==$dob && $data[1]==$email && $data[2]==$mobile )
		{
			mysqli_query($con," update _login set password='$newpass' where email='$email' ") or die("Error: Update Failed !");
			$_SESSION['recover_success']=true;
		}
		else
			$_SESSION['recover_error']=true;
			
	}
	else
		$_SESSION['recover_error']=true;
		
	header("location: ..\index.php");
	
	mysqli_close($con);

?>