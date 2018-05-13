<?php
ob_start();
session_start();
require 'config.php';
$id = $_SESSION['user_id'];
$result = $conn->query("SELECT * from user WHERE user_id = $id") or die($conn->error);
while($res = $result->fetch_assoc())
{
	$user_id =$res['user_id'];
	$name = $res['first_name']." ".$res['last_name'];
	$blood_group_id = $res['blood_group_id'];
	$blood_donor = $res['blood_donor'];
	
	$mobile = $res['mobile_number'];
	
	//$academic_degree = $res['academic_degree'];
	$birthdate = $res['birthdate'];
	$gender = $res['gender'];
	$user_image_path = $res['image_path'];
}

if($blood_donor=='1')
{
	$is_blood_donor='yes';
}
else
{
	$is_blood_donor='no';
}


if($blood_group_id=='1')
{
	$blood_group="A+";
}
else if($blood_group_id=='2')
{
	$blood_group="A-";
}
else if($blood_group_id=='3')
{
	$blood_group="B+";
}
else if($blood_group_id=='4')
{
	$blood_group="B-";
}
else if($blood_group_id=='5')
{
	$blood_group="AB+";
}
else if($blood_group_id=='6')
{
	$blood_group="AB-";
}
else if($blood_group_id=='7')
{
	$blood_group="O+";
}
else if($blood_group_id=='8')
{
	$blood_group="O-";
}



?>

<html>
<head>
	<title>Doctor's Care</title>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/doc_profile.css">
	
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
    $(document).ready(function() {
      $(".dropdown-button").dropdown();
      Materialize.updateTextFields();
   });


    function search(chamber_id, appointment_date){
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
		xmlhttp.open("GET", "appointment.php?c="+chamber_id+"&d="+appointment_date, true);
		xmlhttp.send(null);
	}

  $(document).ready(function() {
    $('select').material_select();
  });
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
	  
	  <ul id="dropdown2" class="dropdown-content">
		<li><a href="verify_appointment.php" id="add">Verify Appointments</a></li>
	  </ul>
      
      <nav>
        <div class="nav-wrapper teal lighten-2">
          <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='auto'></a>
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

  

    <div class="profile_background red lighten-5">

	    <div class="profile_details" id="rcorners1">

	    	<div class="name_designation centering">
	    		<h4><?php echo "Mr. ".$name?></h4><br class="br_less_height">
	    		<h5><?php echo "gender : ".$gender?><h5><hr class="style18">
	    	</div>

	    	<div class="appointment_details centering">
	    	
	    
	    		
	    		<?php echo "Mobile No : " .$mobile?><br class="br_less_height">
	    		
	    	
	    	
	    

	    	<hr class="style18">
	    	</div>

	    	<div class="row">
				<div id="appointment_div">
                </div>
			</div>

	    	<div class="speciality_description">
	    		<h6 class="centering"><?php echo "Blood Donor : " .$is_blood_donor ?></h6><br style="display: block; content: ''; margin-top: 0"><hr class="style18">
	    		<h6 class="centering"><?php echo "Blood Group : ".$blood_group?><h6><hr class="style18">
	    	</div>

	    </div>

	    <div class="image_details" id="rcorners2">

	    	<div class="profile_image" >
	    		<img src="<?php echo $user_image_path;?>" alt=" User Profile Image">
	    	</div>

	    	

	    	<div class="chamber_details">
	    	</div>

	    </div>

    </div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("app");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>
</body>
</html>