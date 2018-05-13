<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
		<title>Doctor's Care</title>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel="stylesheet" type="text/css" href="css/search_blood.css">
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
</head>
<body>
	<div class="container1">

  	<div class="navbar-fixed">
      
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="doc_login.php">Doctor Area</a></li>
        <li><a href="user_login.php">User Area</a></li>
        <li class="divider"></li>
      </ul>
	  
	  <ul id="dropdown2" class="dropdown-content">
		<li><a href="verify_appointment.php" id="add">Verify Appointments</a></li>
	  </ul>
      
      <nav>
        <div class="nav-wrapper teal lighten-2">
          <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='20%'></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php#search"><i class="material-icons left">search</i>Search Doctors</a></li>
            <li><a href="index.php#service"><i class="material-icons left">explicit</i>Emergency Services</a></li>
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
				echo "<li><a id='admin' class='dropdown-button login-link' href='user_profile.php' data-activates='dropdown2'><i class='material-icons left'>perm_identity</i>".$_SESSION['username']."<i class='material-icons right'>arrow_drop_down</i></a></li>";
              }
              echo "<li><a id='logout' class='logout-link' href='logout.php'><i class='material-icons left'>lock_outline</i>Log Out</a></li>";
              echo "<script type='text/javascript' src='js/hideLogin.js' ></script>";
            }
            ?>

            <li><a id="login" class="dropdown-button login-link" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_open</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>

          </ul>
        </div>
      </nav>
    </div>

<?php
require 'sconfig.php';

if(isset($_POST['search']))
{

  $city =  $_POST['blood_area'];
  $blood_group = $_POST['blood_group'];
}


$sql = "SELECT a.appointment_id, a.date, a.time, a.number, a.verification, d.name, c.chamber_name from appointment a, doctor d, chamber c where a.doctor_id = d.doctor_id and a.chamber_id = c.chamber_id and a.verification = 'Pending'";
$result = $conn->query($sql);

echo "<html>
        <head>
        	<title>Doctor's Care</title>
        </head>
        <body>
         <form action='' method='POST'>
          <fieldset>
           <legend>Verify pending appointment requests: </legend>
            <table class='bordered'>
            <thead class='red accent-1'>
             <tr>
              <th>Doctor Name</th>
              <th>Chamber Name</th>
              <th>Date</th>
              <th>Time</th>
              <th>Contact Number</th>
              <th>Verification</th>
             </tr>
            <thead>";
     // output data of each row
     while($row = $result->fetch_assoc())
      {
		  $appointment_id = $row['appointment_id'];
        echo 
        "
        <tbody>
          <tr>
            <td>".$row['name']."</td>
            <td>".$row['chamber_name']."</td>
            <td>".$row['date']."</td>
            <td>".$row['time']."</td>
            <td>".$row['number']."</td>
			<td><button class='btn waves-effect waves-light' type='submit' name='action'>Approve</button></td>
          </tr>
         </tbody>";
      }
echo
  "  </table>
    </fieldset>
    <center>";
   if(isset($_POST['action']))
   {
	   $sql="UPDATE `appointment` SET `verification`='Verified' WHERE appointment_id = $appointment_id";
	   $result = $conn->query($sql);
	   if($result)
		   header('location: verify_appointment.php');
   }
   echo
   "</form>
  </body>
</html>";

$conn->close();
?>  

<div class="footer_section  teal lighten-2">
 	<p>Copyright &copy; All rights reserved to  <a class="footer" href="">Pratik Saha, Md. Mahedi Hasan and Sowrozit Sarker</a></p>
</div>

</div>


</body>
</html>