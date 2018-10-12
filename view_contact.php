<?php
session_start();

   require_once("php/connect.php");
   $uid = $_SESSION['uid'];
 $id = $_SESSION['id'];
 echo   $query  = "SELECT * FROM contacts where u_id='$id'";
  $res  = mysqli_query($con, $query);
   $res1  = mysqli_query($con, $query);

//
?>



<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>
</head>
<body>
  <nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <a hre="#" class="navbar-brand" />Phone Directory </a>
        </div>

        <!-- Menu on Left -->
        <div>
            <ul class="nav navbar-nav">
                <li class="active"  > <a href="home.php"> Home </a> </li>
                <li  > <a href="create.php"> Create </a> </li>
                   <li  > <a href="view_contact.php"> contacts </a> </li>
                <li > <a href="delete.php"> Delete </a> </li>
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
<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>contacts</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>First Name</th>
                    <th>Last Name</th>
                     <th>Contact</th>
                     <th>Email</th>
                    
                      <th>Edit</th>
                      
                       <th>Delete</th>
                   </thead>
    <tbody>
   <form method="post" action="view_contact.php">
   
  <?php
  $i = 0; 
    while($rows = mysqli_fetch_array($res))
    {?>
 
    <tr>
    <td><input name="checkbox[]" type="checkbox" id="checkbox[]" class="checkthis" value="<?php echo $i++;?>"/></td>
    <td style="display: none" ><input type="text" name="c_id[]" value="<?php echo $rows['c_id']; ?>" /></td>
    <td><?php echo $rows['fname']; ?></td>
    <td><?php echo $rows['lname'];  ?></td>
    <td><?php echo $rows['mobile'];  ?></td>
    <td><?php echo $rows['c_email'];  ?></td>
    
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" onclick="?uid=<?php echo $rows['c_id']; ?>" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" onclick="abc.php?uid=<?php echo $rows['c_id']; ?>"> <span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    <?php
  }?>

   
    
    </tbody>
       
</table>
      <div class="col-sm-2">
    
          <select name="s_name" class="form-control mb-2 mr-sm-2 mb-sm-0" required>
               <?php
   
    while($row = mysqli_fetch_array($res1))
    {  ?>  <option value="<?php echo $row['c_id'];  ?>" > <?php echo $row['fname'];  ?>
 </option>
       <?php }?>                          
    
    </select><br/><br/>  
    </div>                     
                                 
                                 
<div class="clearfix"></div>
 <input type="submit" name="Submit" value="Share" class="btn btn-primary btn-lg pull-right"/>
</form>

            
        </div>
	</div>
</div>



  </div>
      <!-- /.modal-dialog --> 
    </div>
    </body>
    </html>
    <?php


if(isset($_POST['Submit'])){//to run PHP script on submit
if(!empty($_POST['checkbox'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['checkbox'] as $i) {
 "<p>".$i ."</p>";
 $sql1="INSERT INTO shared (user,contact,share)VALUES('$id','{$_POST['c_id'][$i]}', '{$_POST['s_name']}')";
  mysqli_query($con, $sql1);

}
echo "<br/><b>Note :</b> <span>your contacts are  successfully shared.</span>";
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}}
?>