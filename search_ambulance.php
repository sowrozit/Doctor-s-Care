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
      
      <nav>
        <div class="nav-wrapper  cyan accent-4">
          <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='20%'></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php"><i class="material-icons left">store</i>Home</a></li>
            <li><a href="ambulance.php#search"><i class="material-icons left">search</i>Search For Ambulance</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
    </div>

<?php
require 'sconfig.php'; 

if(isset($_POST['search']))
{
  $city=$_POST['amb_area'];
}

$sql = "SELECT * FROM ambulance where area LIKE '%$city%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
echo "<html>
        <head>
        	<title>Doctor's Care</title>
        </head>
        <body>
         <form>
          <fieldset>
           <legend>Ambulance</legend>
            <table class='bordered highlight'>
            <thead class='light-blue darken-3'>
             <tr>
              <th>Area</th>
              <th>Agency</th>
              <th>Phone Number</th>
             </tr>
            <thead>";
     // output data of each row
     while($row = $result->fetch_assoc())
      {

        
        echo 
        "
        <tbody>
          <tr>
            <td>".$row['area']."</td>
            <td>".$row['agency']."</td>
            <td>".$row['phone_number']."</td>
          </tr>
         </tbody>";
        
      }
} 
else 
{
     echo "0 results";
}

echo
  "  </table>
    </fieldset>
    <center>
   </form>
  </body>
</html>";

$conn->close();
?>  

<div class="footer_section  cyan accent-4">
  <div class="footer">
  <p>Copyright &copy; All rights reserved to  <a class="footer" href="">Pratik Saha, Md. Mahedi Hasan and Sowrozit Sarker</a></p>
</div>
</div>

</div>


</body>
</html>