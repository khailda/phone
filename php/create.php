<?php 
	session_start();
	require_once("connect.php");
	
	echo $uid = $_SESSION['uid'];
	echo $id = $_SESSION['id'];
	
	# Extract Form values
	$other_no=$_POST['txtother_no'];
	$fname = $_POST['txtfname'];
	$lname = $_POST['txtlname'];
	$mobile = $_POST['txtmobile'];
	$landline = $_POST['Landline'];
	$c_email = $_POST['txtemail'];
	
	$sql = "SELECT fname FROM contacts WHERE fname='$fname' && u_id='$id'"; 
    $select = mysqli_query($con, $sql);


if(mysqli_num_rows($select) ==0){
	#echo $fname . $lname . $mobile . $landline . $email . $public;
	echo $query=" INSERT into contacts ( u_id,fname,lname,c_email,mobile,other_cell,landline )values('$id','$fname','$lname','$c_email','$mobile',".
        (($landline=='')?"NULL":("'".$landline."'")) . ", ".
        (($other_no=='')?"NULL":("'".$other_no."'")) . 
        ")";
	$result=mysqli_query($con,$query);
	
	if($result)
{
		
			
			
		$_SESSION['insert_success']=1;
		header("Location: ..\create.php");}}
else{ // Forgot a field.
    
        print '<p class="text--error">First name already exsist try different!</p>';}
	
	mysqli_close($con);
?>