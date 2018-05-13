<?php
ob_start();
session_start();
require 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM doctor WHERE doctor_id = $id") or die($conn->error);
while($res = $result->fetch_assoc())
{
	$doctor_id =$res['doctor_id'];
	$name = $res['name'];
	$designation = $res['designation'];
	$speciality = $res['speciality'];
	$professional_details = $res['professional_details'];
	$mobile = $res['mobile_no'];
	$email = $res['email'];
	$academic_degree = $res['academic_degree'];
	$fee = $res['fee'];
	$image_path = $res['image_path'];
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

  <script>
       $(document).ready(function(){
         var $errorMsg =  $('<span id="error_msg">doctor is not available.</span>');
         var $submitBtn = $("#form input[type='submit']");

         $("#chamber")
             .on("blur", function(){
                if( $(this).val() != $("#password").val() ){
                   $submitBtn.attr("disabled", "disabled");
                   $errorMsg.insertAfter($(this));
                }else{
                   $submitBtn.removeAttr("disabled");
                   $("#error_msg").remove();
                }
              })
             .on("click", function(){
                var $errorCont = $("#error_msg");
                if($errorCont.length > 0){
                    $errorCont.remove();
                }  
             });

       });
	   
    </script>
  
  
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
                echo "<li><a href='user_profile.php'><i class='material-icons left'>perm_identity</i>".$_SESSION['username']."</a></li>";
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
	    		<h4><?php echo "Dr. ".$name?></h4><br class="br_less_height">
	    		<h5><?php echo $designation?><h5><hr class="style18">
	    	</div>

	    	<div class="appointment_details">
	    	
	    	<div class="row centering">
	    		<h5>Appointment Details</h5>
	    	</div>
	    	
	    	<div class='row'>
	    		<form class="col s12" method="POST" autocomplete="off" action="appointment.php">
	    		<div class="row">
				<div class="input-field col 4">
	    			<i class="material-icons prefix">store</i>
					<input type="hidden" name="profile_id" value="<?php echo $id;?>" >
				    <select id="chamber" name="chamber" required>
				    <option value="" disabled selected required>Select Chamber</option>
				    <?php
					$sql = "Select c.chamber_id, c.chamber_name, d.day from chamber c, schedule s, day d where c.chamber_id = s.chamber_id and s.day_id = d.day_id and s.doctor_id = $id";
				    $sql2 = "SELECT c.chamber_id, c.chamber_name FROM chamber c LEFT JOIN schedule s ON c.chamber_id = s.chamber_id and s.doctor_id = $doctor_id where doctor_id=$id";
					$result = $conn->query($sql) or die($conn->error);
				    while($row = $result->fetch_assoc())
				    {
				   		echo "<option value='".$row['chamber_id']."'>".$row['chamber_name']." - ".$row['day']."</option>";
				    }
				    ?>
				    </select>
				</div>
				
				<div class="input-field col s4">
	                <i class="material-icons prefix">today</i>
					
	                <input id="date" type="date" name="date" class="datepicker" required>
	                <label for="date">Enter Date</label>
	                <script type="text/javascript">
	                  $('.datepicker').pickadate({
	                  selectMonths: true, // Creates a dropdown to control month
	                  selectYears: 500 // Creates a dropdown of 15 years to control year
	                  });
	                </script>
              	</div>
				
				
				</div>
				
				<div class="row">
              	<div class="button col s4">
                	<button class="btn waves-effect waves-light" type="submit" name="action">Submit
					   <i class="material-icons right">send</i>
					</button> 
            	</div>
				</div>
              	</form>
			</div>

	    	<hr class="style18">
	    	</div>

	    	<div class="row">
				<div id="appointment_div">
                </div>
			</div>

	    	<div class="speciality_description">
	    		<h6 class="centering"><?php echo $academic_degree?></h6><br style="display: block; content: ''; margin-top: 0"><hr class="style18">
	    		<h6 class="centering"><?php echo $professional_details?><h6><hr class="style18">
	    	</div>

	    </div>

	    <div class="image_details" id="rcorners2">

	    	<div class="profile_image" >
	    		<img src="<?php echo $image_path;?>" alt="Profile Image">
	    	</div>

	    	<div class="profile_info" >
	    		<?php echo "Dr. ".$name?><br class="br_less_height">
	    		<?php echo $designation?><br class="br_less_height">
	    		<?php echo $speciality?><br class="br_less_height">
	    		<?php echo "Fee: ".$fee?><br class="br_less_height">
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