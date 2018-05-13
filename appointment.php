<?php
session_start();
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
	ob_start();
	require 'config.php';
	/*$conn = new mysqli("localhost","root","","dcare");

	if($conn->connect_errno)
	{
		die('Sorry! Connection was not Successful');
	}
	*/
	$id = $_POST['profile_id'];
	$chamber_id = $_POST['chamber'];
	$date = $_POST['date'];

	$timestamp = strtotime($date);
	$day = date('l', $timestamp);

			
	$result = $conn->query("SELECT d.name, c.chamber_name, da.day, s.time_from, s.time_to FROM doctor d, chamber c, day da, schedule s WHERE s.doctor_id = d.doctor_id and s.chamber_id = c.chamber_id and s.day_id = da.day_id and s.doctor_id = $id and s.chamber_id = $chamber_id and da.day_id = (SELECT day_id FROM day where day like '%$day%')") or die($conn->error);
	if($result->num_rows)
	{
		while($row = $result->fetch_assoc())
		{
			$name = $row['name'];
			$chamber_name = $row['chamber_name'];
			$day_name = $row['day'];
			$time_from = $row['time_from'];
			$time_to = $row['time_to'];
			$time = $time_from." - ".$time_to;
			echo "<div class='appoint_div teal lighten-5 z-depth-3'>";
			echo "<form method='POST' action='confirm.php'>";

			echo "<input type='hidden' name='doc_id' value='".$id."'/>";
			echo "<input type='hidden' name='chamber_id' value='".$chamber_id."'/>";
			echo "<input type='hidden' name='date' value='".$date."'/>";
			echo "<input type='hidden' name='time' value='".$time."'/>";

			echo "<div class='row'><h5>Name: Dr. ".$name."</h5></div>"."<div class='row'><h5>Chamber: ".$chamber_name."</h5></div>"."<div class='row'><h5>Date: ".$day_name.", ".$date."</div>"."<div class='row'><h5>Available Time: ".$time_from." - ".$time_to."</div>";
			echo "<h5>Enter your phone number to confirm appointment: </h5>";
      		echo "<div class='row'>
			        <div class='input-field col s8'>
			          <input name='app_number' id='first_name' type='text' class='validate' required>
			          <label for='first_name'><h6>Enter Your Phone Number: </h6></label>
			        </div>
			    </div>";
			echo "<button class='btn waves-effect waves-light' type='submit' name='action'>Book Appointment
    			<i class='material-icons right'>send</i>
  				</button>";
			echo "</form>";
			echo "</div>";
		}
	}
	else
	{
		echo "Sorry! The doctor won't be available on ".$date;
		echo "<a class='waves-effect waves-light btn' href='index.php'><i class='material-icons right'>store</i>Back to Home</a>";

	}

	?>

   </div>
</body>
</html>