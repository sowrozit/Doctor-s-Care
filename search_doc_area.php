<?php
ob_start();
session_start();
require 'config.php';

$area_id = $_GET['id'];

//$timestamp = strtotime($date);
//$day = date('l', $timestamp);

$sql="Select d.* from doctor d, schedule s, chamber c where d.doctor_id = s.doctor_id and s.chamber_id = c.chamber_id and c.area_id = $area_id";

$result = $conn->query($sql) or die($conn->error);
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


  <script type="text/javascript">

    function search(string){
    var xmlhttp;
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
    }else{
      xmlhttp = new ActiveXObject("XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        document.getElementById("search_div").innerHTML = xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "search.php?s="+string, true);
    xmlhttp.send(null);
  }

  </script>
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
                echo "<li><a href='doc_profile_editable.php'><i class='material-icons left'>perm_identity</i>".$_SESSION['username']."</a></li>";
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
   </div>

   <div>

   	<div class="search_result">

   		<?php
		   	while($res = $result->fetch_assoc())
			{
				//echo $res['name']." ".$res['speciality']." ".$res['gender']."<br>";
				echo 
				"<div class='details z-depth-2'>
					<div class='back brown lighten-5 padding'>
						<div class='image'><img src='".$res['image_path']."' class='circle' alt='Profile Image' height='100%' width='auto' margin-right='10%'></div>
						<div class='description'><h5>Dr. ".$res['name']."</h5><br>".$res['designation']."<br><a class='profile' href='doc_profile_visit.php?id=".$res['doctor_id']."'>View Profile</a></div>
					</div>

					<div class='chembar light-blue darken-4 z-depth-2'>
						<p class='padding1 white-font'><i class='material-icons prefix'>location_on</i>".$res['professional_details']."</p>
					</div>
				</div>";
			}
		?>
   	</div>

   	<div class="search_filter">

   		<div class="find_filter">
        <div class="row">
          <form class="col s8" action="search_doc.php" method="POST" autocomplete="off">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="name" type="text" name="name" class="validate" onkeyup="search(this.value)">
                <label for="name">Doctor's Name</label>
                <div id="search_div">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">stars</i>
                <select name="speciality">
                <option value="" disabled selected>Select the Doctor's Sepeciality</option>

                <?php
                require 'config.php';
                $result = $conn->query("SELECT * FROM speciality") or die($conn->error);
                while($res = $result->fetch_assoc())
                {
                  echo 
                  "<option value='".$res['speciality_name']."'>".$res['speciality_name']."</option>";
                }
                ?>

                </select>
                <label>Speciality</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">location_on</i>
                <select name="city" required>
                  <option value="" disabled selected>Select desired Location</option>

                  <?php
                  require 'config.php';
                  $result = $conn->query("SELECT * FROM city") or die($conn->error);
                  while($res = $result->fetch_assoc())
                  {
                    echo 
                    "<option value='".$res['city_name']."'>".$res['city_name']."</option>";
                  }
                  ?>

                  </select>
                  <label>City</label>
              </div>
			</div>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">today</i>
                <input id="date" type="date" name="date" class="datepicker">
                <label for="date">Enter Date</label>
                <script type="text/javascript">
                  $('.datepicker').pickadate({
                  selectMonths: true, // Creates a dropdown to control month
                  selectYears: 15 // Creates a dropdown of 15 years to control year
                  });
                </script>
              </div>
            </div>
            <div class="row">
              <div class="button col s12">
                <button class="btn waves-effect waves-light full" type="submit" name="action">Search
                <i class="material-icons right">search</i>
              </button>
            </div>
            </div>
          </form>
        </div>
      </div>

   	</div>
	
	  <script type="text/javascript">
    $(document).ready(function() {
      $(".dropdown-button").dropdown();
      Materialize.updateTextFields();
   });

  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
  
  <div class="footer_section teal lighten-2">
 	<p>Copyright &copy; All rights reserved to  <a class="footer" href="">Pratik Saha, Md. Mahedi Hasan and Sowrozit Sarker</a></p>
</div>
   <div>

 </body>
</html>
