<?php
session_start();

	$id = $_POST['doc_id'];
	$chamber_id = $_POST['chamber_id'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$number = $_POST['app_number'];

?>

<html>
<head>
	<title>Doctor's Care</title>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css"  />
	<link rel="stylesheet" type="text/css" href="css/materialize.css"  />
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<script defer src="js/jquery.flexslider.js"></script>
  	<script src="js/jquery-2.1.3.min.js"></script>
  	<script defer src="js/materialize.js"></script>
  	<script src="js/materialize.min.js"></script>
  	
  	<style type="text/css">
	  body {
	    background-image:url('image/bgimage.jpg');
	    width: 100%;
	    height: auto;
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	  }
	</style>

</head>

<body>
	<div class="container1">

  	<div class="navbar-fixed">
      
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="doc_login.php">Doctor Area</a></li>
        <li><a href="user_login.php">User Area</a></li>
        <li class="divider"></li>
      </ul>
      
      <nav>
        <div class="nav-wrapper teal lighten-2">
          <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='auto'></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#search"><i class="material-icons left">search</i>Search Doctors</a></li>
            <li><a href="#service"><i class="material-icons left">explicit</i>Emergency Services</a></li>
            <!-- Dropdown Trigger -->
            <?php
            if(isset($_SESSION['username']))
            {
              if($_SESSION['type'] == 'Doctor')
              {
                echo "<li><a href='doc_profile.php'><i class='material-icons left'>perm_identity</i>".$_SESSION['username']."</a></li>";
              }
              else
              {
                echo "<li><a href='user_profile.php'><i class='material-icons left'>perm_identity</i>".$_SESSION['username']."</a></li>";
              }
              echo "<li><a id='logout' class='logout-link' href='logout.php'><i class='material-icons left'>lock_outline</i>Log Out</a></li>";
              echo "<script type='text/javascript' src='js/hideLogin.js' ></script>";
            }
            ?>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
    </div>

    <?php
	//ob_start();
	require 'config.php';
	
	$result = $conn->query("INSERT INTO `appointment`(`appointment_id`, `doctor_id`, `chamber_id`, `date`, `time`, `number`, `verification` ) VALUES (NULL, $id, $chamber_id, '$date', '$time', '$number', 'Pending')");
	?>

	<div class="row" style="margin-top: 10%; margin-left: 42%; margin-right: 20%;"><h4>Thank You</h4></div>
	<div class="row" style="margin-top: 2%; margin-left: 20%; margin-right: 20%;">Your appointment request has been received. Our patient representatives will call you for confirming the appointment request. Please note our agent will only call you between the time 8 am to 10 pm. No need to take any further action.</div>
	<div class="row" style="margin-left: 40%; margin-right: 10%;"><a class='waves-effect waves-light btn' href='index.php'><i class='material-icons right'>store</i>Back to Home</a></div>

   </div>
</body>
</html>