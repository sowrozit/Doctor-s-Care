<?php

session_start();
include_once("myconfig.php");
$username=$_SESSION['username'];
$mob=$_SESSION['mobile'];
$doc_id=$_SESSION['doc_id'];

if(isset($_POST['submit']))
{
	$doc_id=$_SESSION['doc_id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$birthdate="12-12-1988";
	$designation=$_POST['designation'];
	$speciality = $_POST['speciality'];
	$prof_details=$_POST['prof_details'];
	//$handle = fopen($_FILES["imagefile"]["tmp_name"], 'r');
	$mobile=$_POST['mobile'];
	$email = $_POST['email'];
	$passcode=$_POST['passcode'];
	$phone=$_POST['phone'];
	$bdmc_code=$_POST['bdmc_code'];
	$degrees=$_POST['degrees'];
	$handle = fopen($_FILES["imagefile"]["tmp_name"], 'r');
	$target='uploads/'.basename($_FILES['imagefile']['name']);
	$fee=$_POST['fee'];
	$image_path=$target;
	//var_dump($image_path);
	
	
	
	if(move_uploaded_file($_FILES['imagefile']['tmp_name'],$target))
	{

     //Insert into your db

    $fp = fopen($target, "r");
	}
	
	if(isset($_FILES['imagefile']))
	{
		$update=mysql_query("UPDATE doctor SET name='$name',gender='$gender',birthdate='$birthdate',designation='$designation',speciality='$speciality',professional_details='$prof_details',image_path='$target',mobile_no='$mobile', email='$email',password='$passcode',phone_number='$phone',bdmc_reg='$bdmc_code',academic_degree='$degrees',fee='$fee' WHERE doctor_id=$doc_id");
	}
	else 
	{
		$update=mysql_query("UPDATE doctor SET name='$name',gender='$gender',birthdate='$birthdate',designation='$designation',speciality='$speciality',professional_details='$prof_details',mobile_no='$mobile', email='$email',password='$passcode',phone_number='$phone',bdmc_reg='$bdmc_code',academic_degree='$degrees' WHERE doctor_id=$doc_id");
	}
	
	
	if (!$update) 
		{
		//$message  = 'Invalid query: ' . mysql_error() . "\n";
		
		//die($message);

		}
		else
		{
			//echo "successfull";
		}
	
}

$result=mysql_query("select * from doctor where doctor_id=$doc_id");
	
		while($res=mysql_fetch_array($result))
		{
			$name = $res['name'];
			$gender = $res['gender'];
			$birthdate=$res['birthdate'];
			$designation=$res['designation'];
			$speciality = $res['speciality'];
			$prof_details=$res['professional_details'];
			$image_path = $res['image_path'];
			$mobile=$res['mobile_no'];
			$email = $res['email'];
			$passcode=$res['password'];
			$phone=$res['phone_number'];
			$bdmc_code=$res['bdmc_reg'];
			$degrees=$res['academic_degree'];
			$fee=$res['fee'];
			$image_path=$res['image_path'];
			
			
			$_SESSION['id'] = $res['doctor_id'];
		$_SESSION['username'] = $res['name'];
		$_SESSION['designation'] = $res['designation'];
		$_SESSION['speciality'] = $res['speciality'];
		$_SESSION['professional_details'] = $res['professional_details'];
		$_SESSION['mobile'] = $res['mobile_no'];
		$_SESSION['email'] = $res['email'];
		$_SESSION['academic_degree'] = $res['academic_degree'];
		$_SESSION['fee'] = $res['fee'];
		$_SESSION['type'] = 'Doctor';
		$_SESSION['image_path'] = $res['image_path'];
			
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
	

	
	<script>
	
	function showDiv() 
	{
	   document.getElementById('browse_btn').style.display = "block";
	}
	
	function show_chamber() 
	{
	   var toggle=document.getElementById('show_chamber');
	   toggle.style.display=toggle.style.display == "none" ? "block" : "none";
	}

	</script>

  	<style type="text/css">
	  body {
	    background-image:url('image/bgimage.jpg');
	    width: 100%;
	    height: auto;
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	  }
	  /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 0; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0%;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
	max-height:100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.2); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 60%;
	
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:.5}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body { padding: 2px 1px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
	  
  </style>
  
  
  
  
  
  
</head>

<body>


	<div id="add_chamber_modal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">×</span>
			</div>
			
			<div class="modal-body">
			
			
				<div>
			
					<div class="row">
						<form class="col s12" action="add_chamber.php" method="POST" >
						
							<div class="row">
								<div class="input-field col s12">
								  <i class="material-icons prefix">location_on</i>
								  <input id="chamb_name" name="chamb_name" type="text" class="validate right-alert" required="" aria-required="true">
								  <label for="chamb_name" data-success="correct" data-error="error" >Chamber name</label>
								</div>
								
							</div>
						
						
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">location_on</i>
									<select name="area" >
									  <option value="" disabled selected>Select Area </option>
										<?php 
										
										$result2=mysql_query("select * from area");
									
										while($res=mysql_fetch_array($result2))
										{
											echo "<option value=".$res['area_id'].">". $res['area_name']."</option>";
										}
										?>
									  
									  
									</select>
									<label>Area</label>
								</div>
							</div>
					
					
							
					
					
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">stars</i>
									<select name="chamberday[]" multiple >
									  <option value="" disabled selected>select day(s) </option>
									  <option value="1">SUNDAY </option>
									  <option value="2">MONDAY </option>
									  <option value="3">TUESDAY </option>
									  <option value="1">WEDNESSDAY </option>
									  <option value="1">THURSDAY </option>
									  <option>FRIDAY </option>
									  <option>SATURDAY </option>
									  
									</select>
									<label>chamber day</label>
								</div>
							</div>
					
							<div>
								<p><h5 align="center"> chamber time </h5></p>
								<div class="row">
									<div class="input-field col s6">
									  
									  <input id="from" name="from" type="number" step="any" class="validate right-alert" required="" aria-required="true">
									  <label for="from" data-success="correct" data-error="error" >From</label>
									</div> 
									<div class="input-field col s6">
									  
									  <input id="to" name="to" type="number" class="validate right-alert" step="any" required="" aria-required="true">
									  <label for="to" data-success="correct" data-error="error" >To</label>
									</div>
									
								</div>
							
							</div>
							
					
							<div class="center-btn">
								<input type="submit" name="add_chamber" value="Add chamber">
							
							</div>
						</form>
					</div>
					
					
				</div>
			
			
			
			
			</div>
			
			<div class="modal-footer">
			</div>
		
		</div>
	</div>

	<div id="myModal" class="modal">

	  <!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
			  <span class="close">×</span>
			  <p class="centering"><h4 class="centering"><?php echo $_SESSION['username'];?></h4></p>
			</div>
			<div class="modal-body">
			  
			
			
				<div class="edit_profile" id="regi">
					<div class="row">
						<form class="col s12" action="doc_profile_editable.php" method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="input-field col s12">
								  <i class="material-icons prefix">account_circle</i>
								  <input id="icon_prefix" name="name" type="text" class="validate right-alert" value="<?php echo $name;?>" required="" aria-required="true">
								  <label for="icon_prefix" data-success="correct" data-error="error" >Full Name</label>
								</div>
								
							</div>
							
							
							<div class="custom_margin4">

								<i class="material-icons prefix">supervisor_account</i>
								<span class="custom_margin4"> Gender </span> 
								  <input class="with-gap" name="gender" type="radio" id="male" value="Male" <?php if ($gender == 'Male') echo 'checked="checked"'; ?> />
								  <label for="male">Male</label>
								  <input class="with-gap" name="gender" type="radio" id="female" value="Female" <?php if ($gender == 'Female') echo 'checked="checked"'; ?> />
								  <label for="female">Female</label>
								
								 
							</div>
							
							
							<div class="row section section">
								<div class="input-field col s12">
									<i class="material-icons prefix">perm_identity</i>
									<input placeholder="i.e. Professor/consultant with hosptal name" id="Designation" type="text" name="designation" class="validate" value="<?php echo $designation;?>" required>
									<label for="Designation">Designation</label>
								</div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
								<i class="material-icons prefix">stars</i>
								<select name="speciality" >
								  <option value="" disabled selected>Choose your sepeciality (one or more) </option>
								  <option value="<?php echo $speciality; ?>" selected><?php echo $speciality; ?> </option>
								  <option value="Allergy and Immunology">Allergy and Immunology</option>
								  <option value="Arthritis, Joint, Soft Tissue problems (Rheumatology)">Arthritis, Joint, Soft Tissue problems (Rheumatology)</option>
								  <option value="Blood related diseases (Haematology)">Blood related diseases (Haematology)</option>
								  <option value="Bone, Joint, Fractures (Orthopaedics)">Bone, Joint, Fractures (Orthopaedics)</option>
								  <option value="5">Brain, Spinal Cord, Nerve (Neuromedicine)</option>
								  <option value="6">Cancer (Oncology)</option>
								  <option value="7">Cancer of Female Reproductive System (Gynaecologic Oncology)</option>
								  <option value="8">Child or Infant any disease (Paediatrics)</option>
								  <option value="9">Diabetes, Hormones, Thyroid, etc. (Endocrinology)</option>
								  <option value="10">ENT or Ear, Nose and Throat, Tonsil (Otorhinolaryngology)</option>
								  <option value="11">Eye, Vision, Cataracts, etc. (Ophthalmology)</option>
								  <option value="12">General Physician (All or any common diseases and health issues)</option>
								  <option value="14">General Surgery, Incision, Operation (General Surg…</option>
								  <option value="15">Heart, Cardiac Surgery, Cardiovascular, Hypertension, Blood Pressure (Cardiology)</option>
								  <option value="44">Dental, Orthodontics, Maxillofacial Surgery, Scaling (Dentistry)</option>
								</select>
								<label>Speciality</label>
								</div>
							</div>
							
							<div class="">
							<div class="row">
							  <div class="input-field col s12">
							  <i class="material-icons prefix">mode_edit</i>
								<textarea id="textarea1" name="prof_details" class="materialize-textarea" length="120" required><?php echo $prof_details; ?></textarea>
								<label for="textarea1">Professional details</label>
							  </div>
							</div>
							</div>
							
							<div >
							<input type="button" onclick="showDiv();" value="update image?">
							</div>
							<div class="custom_margin" id="browse_btn" style="display:none;">
								<div class="file-field input-field">
								  <div class="btn">

									<span>Browse your image</span>
									
									<input type="file" name="imagefile" >
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text" name="imagepath" >
								  </div>
								</div>
							</div>
							
							<div class="row section">
								<div class="input-field col s12">
								  <i class="material-icons prefix">perm_device_information</i>
								  <input id="icon_telephone" name="mobile" type="tel" class="validate" value="<?php echo $mobile; ?>" required>
								  <label for="icon_telephone">Mobile No</label>
								</div>
							</div>
							
							<div >
								<div class="row">
									<div class="input-field col s12">
									  <i class="material-icons prefix">email</i>
									  <input id="email" name="email" type="email" class="validate" value="<?php echo $email; ?>" required>
									  <label for="email" data-error="wrong" data-success="right">Email</label>
									</div>
								 </div>
							</div>
							
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">vpn_key</i>
									<input id="password" name="passcode" type="password" class="validate" value="<?php echo $passcode; ?>" required>
									<label for="password">PassCode</label>
								</div>
							</div>
							
							
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">phone</i>
									<input placeholder="Workplace phone no." id="icon_telephone" name="phone" type="tel" class="validate" value="<?php echo $phone; ?>" required>
									<label for="icon_telephone">Phone</label>
								</div>
							</div>
							
							<div class="">
								<div class="input-field col s12">
								<i class="material-icons prefix">offline_pin</i>
								  <input id="reg_no" name="bdmc_code" type="text" value="<?php echo $bdmc_code; ?>" class="validate">
								  <label for="reg_no">BDMC registration no.</label>
								</div>
							
							
							</div>
							
							<div class=" section">
								<div class="row">
								  <div class="input-field col s12">
								  <i class="material-icons prefix">view_list</i>
									<textarea id="textarea1" name="degrees" class="materialize-textarea" length="120" required><?php echo $degrees; ?></textarea>
									<label for="textarea1">Academic Degrees with institutions</label>
								  </div>
								</div>
							</div>
							
							
							<div class="row">
									<div class="input-field col s6">
									  
									  <input id="fee" name="fee" type="number" step="any" class="validate right-alert" value="<?php $q=mysql_query("select fee from doctor where doctor_id='".$_SESSION['doc_id']."'"); while($res5=mysql_fetch_array($q)){echo $res5['fee'];}?>" required="" aria-required="true">
									  <label for="fee" data-success="correct" data-error="error" >Fee</label>
									</div> 
									
									
							</div>
							
							
							<div class="center-btn">
							<button class="btn waves-effect waves-light" type="submit" name="submit" > Update NOw
								<i class="material-icons right">send</i>
							</button>
							</div>
						
						</form>
					
					
					
					
					
					</div>
					
					<script type="text/javascript">
						
					  
					  $(document).ready(function() {
						Materialize.updateTextFields();
					  });
					  
					  $(document).ready(function() {
						$('select').material_select();
					  });
					  
					  
					  
					  $(document).ready(function() {
						$('input#input_text, textarea#textarea1').characterCounter();
					  });
					  
					</script>
					
				</div>

			
			
			  
			</div>
			
			<div class="modal-footer">
			
			</div>
			
				
		</div>
		
		
			

	</div>
	
	
	
	

	
	
	

	<div class="container1">

		<div class="navbar-fixed">
		  
		  <ul id="dropdown2" class="dropdown-content">
			<li ><a href="#myModal" id="edit" >Edit Profile</a></li>
			<li><a href="#add_chamber_modal" id="add">Add chamber</a></li>
			<li class="divider"></li>
		  </ul>
		  
		  
		  <nav>
			<div class="nav-wrapper teal lighten-2">
			  <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='auto'></a>
			  <ul class="right hide-on-med-and-down">
				<li ><a href="" id="search" ><i class="material-icons left">search</i>Search Doctors</a></li>
				<li><a href="#service"><i class="material-icons left">explicit</i>Emergency Services</a></li>
				<!-- Dropdown Trigger -->

				<?php
				if(isset($_SESSION['username']))
				{
				  if($_SESSION['type'] == 'Doctor')
				  {
					echo "<li><a id='profile_dropdown' class='dropdown-button login-link' href='#!' data-activates='dropdown2'><i class='material-icons left'>lock_open</i>".$_SESSION['username']."<i class='material-icons right'>arrow_drop_down</i></a></li>";
				  }
				  else
				  {
					echo "<li><a href='user_profile.php'><i class='material-icons left'>perm_identity</i>".$_SESSION['username']."</a></li>";
				  }
				  echo "<li><a id='logout' class='logout-link' href='logout.php'><i class='material-icons left'>lock_outline</i>Log Out</a></li>";
				  echo "<script type='text/javascript' src='js/hideLogin.js' ></script>";
				}
				?>

				

			  </ul>
			</div>
		  </nav>
		</div>

		
		


		
		
		<div class="profile_background">
			
			
			<div class="profile_details" id="rcorners1">
			
			
				<div class="name_designation">
					<h4 class="center-btn"><?php echo "Dr. ".$_SESSION['username']?></h4><br class="br_less_height">
					<h5 class="center-btn"><?php echo $_SESSION['designation']?><h5><hr class="style18">
				</div>

				<div class="appointment_details">
					<h6 class="center-btn"> <?php echo $_SESSION['speciality']?><br class="br_less_height">  </h6><br style="display: block; content: ''; margin-top: 0"><hr class="style18">
					<h6 class="center-btn"><?php echo "Fee: ".$_SESSION['fee']?><br class="br_less_height"></h6><br style="display: block; content: ''; margin-top: 0"><hr class="style18">
				</div>

				<div class="speciality_description">
					<h6 class="center-btn"><?php echo $_SESSION['academic_degree']?></h6><br style="display: block; content: ''; margin-top: 0"><hr class="style18">
					<h6 class="center-btn"><?php echo $_SESSION['professional_details']?><h6><hr class="style18">
				</div>
				
				
				
				
				
				<div class="center-btn">
				<a class="waves-effect waves-light btn" id="show_chamber_btn" onclick="show_chamber()" >View Chambers</a>
				
					
			</div>
			
			
			<div id="show_chamber" class="show_chamber"  style="display:none;">
			
				<div class="row">
						<div class="input-field col s12">
							<i class="material-icons prefix">view_list</i>
							<select name="chamberday" >
							  <option value="" disabled selected>View chambers </option>
							  <?php 
										
										$result2=mysql_query("select c.* from chamber c, schedule s where c.chamber_id = s.chamber_id and s.doctor_id ='".$_SESSION['doc_id']."'");
									
										while($res=mysql_fetch_array($result2))
										{
											echo "<option value=".$res['chamber_id'].">". $res['chamber_name']."</option>";
										}
										?>
							  
							</select>
							
						</div>
				</div>
			</div>

			</div>
			
			
			
			

			<div class="image_details" id="rcorners2">

				<div class="profile_image" >
				
					<img src="<?php echo $_SESSION['image_path'];?>" alt="Profile Image">
				</div>

				<div class="profile_info" >
					<?php echo "Dr. ".$_SESSION['username']?><br class="br_less_height">
					<?php echo $_SESSION['designation']?><br class="br_less_height">
					<?php echo $_SESSION['mobile']?><br class="br_less_height">
					
				</div>

				<div class="chamber_details">
				</div>

			
			
			</div>
			
			
			
			
		</div>
		
		
		
		<div class="footer_section teal lighten-2">
			<p>Copyright &copy; All rights reserved to  <a class="footer" href="">Pratik Saha, Md. Mahedi Hasan and Sowrozit Sarker</a></p>
		</div>
		
			
		<script>
			// Get the modal
			var modal1 = document.getElementById('myModal');

			// Get the button that opens the modal
			var btn1 = document.getElementById("edit");

			// Get the <span> element that closes the modal
			var span1 = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn1.onclick = function() {
				modal1.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span1.onclick = function() {
				modal1.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal1) {
					modal1.style.display = "none";
				}
			}
		</script>
		
		
		
			<script>
			// Get the modal
			var modal2 = document.getElementById('add_chamber_modal');

			// Get the button that opens the modal
			var btn2 = document.getElementById("add");

			// Get the <span> element that closes the modal
			var span2 = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn2.onclick = function() {
				modal2.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span2.onclick = function() {
				modal2.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal2) {
					modal2.style.display = "none";
				}
			}
		</script>
		
		


	</div>


	
		
	
	
		


</body>
</html>