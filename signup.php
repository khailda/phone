<?php
	session_start(); 
	?>
<html>
	
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery-1.12.2.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />

	
	<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	
		<!-- Date time picker attachement -->
		<link rel="stylesheet" href="bootstrap/css/datepicker.css">

	<!--	<script src="bootstrap/js/jquery-1.9.1.min.js"></script> -->

		<script src="bootstrap/js/bootstrap-datepicker.js"></script>

		<title> Sign-Up </title>


	
</head>
		
<body >

    <nav class="navbar navbar-inverse">
	
		<div class="container-fluid">
		
			<!-- Logo -->
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand" /> Phone Directory </a>
			</div>
	
			<!-- Menu on the right -->
			
				<ul class="nav navbar-nav navbar-right">
					
					<li> <a href="index.php"> LOG-IN </a> </li>
				
				</ul>
			
			</div>
			
		</div>
		
	</nav>
   
   <div class="container-fluid">
         
    <div class="row">
       
		<div class="col-xs-4" >
			<!-- Empty Column -->
		</div>
        
		<div class="col-xs-4" style="background-color:rgba(202, 205, 205, 0.100) ">
			<?php

				if(isset($_SESSION['email_error']))
            	{
            					?> <div class="alert alert-danger">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="close" hide="true" id="xxx">&times;</a>
                                  <strong text-align="center">Email already exsist try different!</strong>
                                </div>
                                <?php
                                session_destroy();
            	}
            	
            ?>
		<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Sign up</h3>
					</div>
					<div class="panel-body">
						<form id="signupForm1" method="post" class="form-horizontal" action="php/signup.php">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="firstname1">First name</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First name" />
								</div>
							</div><br>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="lastname1">Last name</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="lastname1" name="lastname1" placeholder="Last name" />
								</div>
							</div><br>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="dob">Date of Birth</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="enter date of birth" />
								</div>
							</div><br>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="MOBILE">MOBILE</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="MOBILE" name="MOBILE" placeholder="Mobile" />
								</div>
							</div><br>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="email1">Email</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="email1" name="email1" placeholder="Email" />
								</div>
							</div><br>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="password1">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password1" name="password1" placeholder="Password" />
								</div>
							</div><br>

							<div class="form-group">
								<label class="col-sm-4 control-label" for="confirm_password1">Confirm password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="confirm_password1" name="confirm_password1" placeholder="Confirm password" />
								</div>
							</div><br>
						
							

							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-4">
									<input type="submit" class="btn btn-primary btn-lg" name="signup1" value="Sign up"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	
	$(document).ready(function () {

			$('#datepicker').datepicker({
			
				format: "dd/mm/yyyy",
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d',
           
        
    });
	$( "#signupForm1" ).validate( {
				rules: {
					firstname1: "required",
					lastname1: "required",
					MOBILE: {
						required: true,
						minlength: 11
					},
					datepicker:"required",
					password1: {
						required: true,
						minlength: 5
					},
					confirm_password1: {
						required: true,
						minlength: 5,
						equalTo: "#password1"
					},
							
					 email1: {
                      required: true,
                       email: true,
                        
        },
					 txta:"required",
					 txtq:"required",
						agree1: "required"
				},
				messages: {
					firstname1: "Please enter your firstname",
					lastname1: "Please enter your lastname",
					datepicker: "Please enter your dob",
					txtq: "Select question",
					txta: "Please enter your Ans!",
					MOBILE: {
						required: "Please enter a Valid MOBILE",
						
					},
									password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email1: {
						required:"Please enter a valid email address",
						remote:"email already exsist"}
					
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
</script>

</body>
</html>