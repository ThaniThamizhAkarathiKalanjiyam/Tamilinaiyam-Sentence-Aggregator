<?php 
//error_reporting(0);
ini_set('max_execution_time',0);
@session_start();
if($_SESSION['user_id'] == "")
{
	?>
	<script>
	window.location.href="../index.php";
	</script>
	<?php
}
$user_id = $_SESSION['user_id'];
include("../connection.php");
$results = mysql_query("SELECT `role` FROM `members` WHERE `user_id`='$user_id'");
$res_row = mysql_fetch_array($results);
$role = $res_row['role'];
$results1 = mysql_query("SELECT `role` FROM `role` WHERE `value`='$role'");
$res_row1 = mysql_fetch_array($results1);
$role_name = $res_row1['role'];
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script>
   function call()
   {
   $("#page-wrapper").load("admin/view_users.php");
   }
   </script>
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                  
                    <a class="navbar-brand" href="#">
                       <?php echo $role_name; ?>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="user/logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                   <li>
                        <a href="index.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   

                    <li class="active-link">
                        <a href="create_user.php"><i class="fa fa-table "></i>Create Users</a>
                    </li>
                    
                    
                     <li>
                        <a href="category.php"><i class="fa fa-edit "></i>Add Category</a>
                    </li>
                    
                      <li>
                        <a href="sentance_keyword_admin.php"><i class="fa fa-qrcode "></i>Sentence Authorize</a>
                    </li>
                     <li>
                        <a href="sentance_dashboard.php"><i class="fa fa-qrcode "></i>Category</a>
                    </li>
                    <li>
                        <a href="download.php"><i class="fa fa-bar-chart-o"></i>Download</a>
                    </li>
                    <!--  


                  <li>
                        <a href="#"><i class="fa fa-qrcode "></i>My Link One</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o"></i>My Link Two</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Three </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table "></i>My Link Four</a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Five </a>
                    </li>-->
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row" >
                <hr />
                    <div class="col-md-6 col-md-offset-3">
                        
                <form class="form-horizontal" action="" method="POST">
  <fieldset>
    <div id="legend">
      <legend class="pull-left">Register <a onClick="call();" class="pull-right">View Users</a></legend>      
    </div>
    <?php 
	$user_id_one ="USER".rand(50, 15345);
	
	?>
    
    
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">User Id</label>
      <div class="controls">
        <input type="text" id="email"  placeholder="" class="form-control" value="<?php echo $user_id_one; ?>" disabled>
        <input type="hidden" name="user_id" value="<?php echo $user_id_one; ?>">
      </div>
    </div>
    
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="form-control">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="form-control">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>


    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Role</label>
      <div class="controls">
        <select class="form-control" name="role">
        <?php $results_role = mysql_query("SELECT * FROM `role` WHERE `sno` != '1'");
		while($row_role = mysql_fetch_assoc($results_role))
		{ ?>
          <option value="<?php echo $row_role['value']; ?>"><?php echo $row_role['role']; ?></option>
         <?php
		} 
		?></select>
        <p class="help-block">Please Select a Role</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" name="enter">Register</button>
      </div>
    </div>
  </fieldset>
</form>
                    </div>
                </div>
                <!-- /. ROW  -->
               
               
            </div>
            </div>
            
         <!-- /. PAGE WRAPPER  -->
        </div>
    
          <div class="footer">
              <div class="row">
                <div class="col-lg-12" >
                    &copy;  2016 Ultisoft | Design by: <a href="http://www.ultisoft.in" style="color:#fff;"  target="_blank">Ultimate Software Solutions</a>
                </div>
        </div>
        </div>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php if(isset($_POST['enter']))
{
	$user_id_insert = $_POST['user_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user_role = $_POST['role'];
	$check = $user_id_insert."finished";
	mysql_query("INSERT INTO `members`(`sno`, `user_id`, `user_name`, `password`, `role`) VALUES ('NULL','$user_id_insert','$username','$password','$user_role')");
	mysql_query("ALTER TABLE `sentance` ADD `$check` VARCHAR( 255 ) NOT NULL");
	?>
    <script>
    alert("Successfully Inserted");
	</script>
    <?php
}
?>