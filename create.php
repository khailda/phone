<?php
    session_start();

    if(!isset($_SESSION['uid']))
            {
                    header("location: index.php");
            }
     $uid=$_SESSION['uid'];
    $id = $_SESSION["id"];
	if(isset($_SESSION['insert_success']))
	{
		if($_SESSION['insert_success']==1)
			$cs = " Contact Successfully Created !";
		else
			$cs = " Contact Already Exists !";
		
		unset($_SESSION['insert_success']);
	}

	else
	{
		$cs="";
	}
?>

<html>
	
<head>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery-1.12.2.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<!-- Custom Script -->
	<script rel="stylesheet">
		
	</script>
		<title> Create Contact </title>
</head>
		
<body>

    <nav class="navbar navbar-inverse">
	
		<div class="container-fluid">
		
			<!-- Logo -->
			<div class="navbar-header">
				<a hre="#" class="navbar-brand" /> Phone Directory </a>
			</div>
			
			<!-- Menu on Left -->
        <div>
            <ul class="nav navbar-nav">
                <li  > <a href="home.php"> Home </a> </li>
                <li class="active" > <a href="create.php"> Create </a> </li>
               
                <li > <a href="view_contact.php"> View Contact </a> </li>
                <li > <a href="share.php"> Share </a> </li>

            </ul>


            <!-- Menu on the right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $uid ; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="php/logout.php">Log-Out</a></li>

                    </ul>
                </li>

            </ul>


        </div>
			
		</div>
		
	</nav>
   
   <div class="container-fluid">
         
    <div class="row">
       
		<div class="col-xs-4" >
			
		</div>
         
		<div class="col-xs-4" style="background-color:white ">

			<form method="post" action="php/create.php"  >
			
			<table class="table table-hover"  width="100%" >

				<tr>

					<th colspan="3" > <h2 align="center"> Enter Contact Details </h2> </th>
				</tr>

				<tr>
					<td> <input type="text" name="txtfname"  class="form-control" placeholder="First Name" /> </td>
					<td> <input type="text" name="txtlname" class="form-control" placeholder="Last Name"/> </td>
					<td></td>
				</tr>

				<tr>
					<td> <input type="text"  name="txtmobile" class="form-control" placeholder="Mobile Number" />  </td>
					 <td> <input type="text"  name="txtother_no" class="form-control" placeholder="Other Mobile Number"  /> </td>
					<td></td>
				</tr>

				<tr>
					<td> <input type="text" name="Landline" class="form-control" placeholder="Landline"  /> </td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td> <input type="email" name="txtemail" class="form-control" placeholder="Email Address" /> </td>
					<td></td>
					<td></td>
				</tr>

				

				<tr>
					<td></td>
					<td> <br/> <input type="submit" class="btn btn-primary" value="Save Contact"/></td>
					<td></td>
				</tr>

			</table>
			</form>
			
			<br/><br/>
			<h3 align="center" class="text-success"><?php echo $cs ?> </h3>
			
		</div>
         
		<div class="col-xs-4" >
			
		</div>
       
    </div>
     
    </div>
 
   
</body>
	
</html>