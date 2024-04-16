<?php 
session_start();
include('../connection.php');
$user= $_SESSION['user'];
if($user=="")
{
header('location:../index.php');
}
$sql=mysqli_query($conn,"select * from citizen where email='$user' ");
$users=mysqli_fetch_assoc($sql);
$_SESSION['email'] = $users['email'];
$_SESSION['status'] = $users['status'];
$_SESSION['name'] = $users['name'];
$_SESSION['fname'] = $users['fname'];
$_SESSION['lname'] = $users['lname'];
$_SESSION['state'] = $users['state'];
$_SESSION['local'] = $users['local'];
$_SESSION['mobile'] = $users['mobile'];
$_SESSION['citizen_id'] = $users['citizen_id'];
$_SESSION['sign'] = $users['sign'];
$_SESSION['date'] = $users['date'];
$_SESSION['image'] = $users['image'];

//$hos=mysqli_query($conn,"select * from hostel where code='".$users['hostel']."' ");
//$h=mysqli_fetch_assoc($hos);
 //echo $_SESSION['hostel'] = $h['hostel_name'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Citizen Card System</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> <?php echo  $users['email']; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">Land Charges</a></li>
          
            <li><a href="">Tax</a></li>
           <li><a href="">Electricity</a></li>
           <li><a href="">Others</a></li>
           
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->
			<?php 
			$q=mysqli_query($conn,"select image from citizen where email='".$_SESSION['user']."'");
			$row=mysqli_fetch_assoc($q);
			if($row['image']=="")
			{
			?>
            <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here" style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			else
			{
			?>
			<li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here"    src="../admin/images/<?php echo $_SESSION['user'];?>/<?php echo $row['image'];?>" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			?>
			
			
			
			<li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-user"></span> Update Profile</a></li>
			 <li><a href="index.php?page=notification"><span class="glyphicon glyphicon-envelope"></span> Notification</a></li>
        <li><a href="index.php?page=complain"><span class="glyphicon glyphicon-envelope"></span> Complaints</a></li>
         <li><a href="index.php?page=profile"><span class="glyphicon glyphicon-user"></span> View Profile</a></li>

         <?php 
         if ($_SESSION['status']==1) {
           echo ' <li><a href="index.php?page=card"><span class="glyphicon glyphicon-user"></span> View Card</a></li>';
         }
          ?>
        
           <li><a href="index.php?page=sign"><span class="glyphicon glyphicon-user"></span> Signature</a></li>
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="update_password")
			{
				include('update_password.php');
			
			}
			if($page=="notification")
			{
				include('notification.php');
			
			}
			if($page=="update_profile")
			{
				include('update_profile.php');
			
			}
     
			if($page=="update_profile_pic")
			{
				include('update_profile_pic.php');
			
			}
    
      //else { header('Location:index.php'); }
      if($page=="visit_student")
      {
        include('visitor.php');
      
      }
      if($page=="card")
      {
        include('card.php');
      
      }
      if($page=="sign")
      {
        include('sign.php');
      
      }
       if($page=="profile")
      {
        include('bio.php');
      
      }
      if($page=="complain")
      {
        include('com.php');
      
      }
		  }
		  else
		  {
		  include('notification.php');
		  ?>
		  <!-- container end-->
		   
		  
		  
		  
<?php } ?>
          
         
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
