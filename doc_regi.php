<html>
<head>
	<title>Dcare</title>
	 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/doc_regi.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css"  />
	<link rel="stylesheet" type="text/css" href="css/materialize.css"  />

	
	<script defer src="js/jquery.flexslider.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script defer src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
	
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href=src="http://code.jquery.com/jquery-2.1.0.min.js" rel="stylesheet" type="text/css">
	
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
            <li><a href="index.php"><i class="material-icons left">store</i>Home</a></li>
            <li><a id="login" class="dropdown-button login-link" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
	
	<div class="regi" id="regi">
		<div class="row">
			<form class="col s12" action="doc_registration.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="input-field col s12">
					  <i class="material-icons prefix">account_circle</i>
					  <input id="icon_prefix" name="name" type="text" class="validate right-alert" required="" aria-required="true">
					  <label for="icon_prefix" data-success="correct" data-error="error" >Full Name</label>
					</div>
					
				</div>
				
				
				<div class="custom_margin4">

					<i class="material-icons prefix">supervisor_account</i>
					<span class="custom_margin4"> Gender </span> 
					  <input class="with-gap" name="gender" type="radio" id="male" value="Male"/>
					  <label for="male">Male</label>
					  <input class="with-gap" name="gender" type="radio" id="female" value="Female" />
					  <label for="female">Female</label>
					
					 
				</div>
				
				
				
				<div class="row section section">
					<div class="input-field col s12">
						<i class="material-icons prefix">perm_identity</i>
						<input placeholder="i.e. Professor/consultant with hosptal name" id="Designation" type="text" name="designation" class="validate" required>
						<label for="Designation">Designation</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">stars</i>
					<select name="speciality" required>
					  <option value="" disabled selected>Choose your sepeciality (one or more) </option>
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
					<textarea id="textarea1" name="prof_details" class="materialize-textarea" length="120" required></textarea>
					<label for="textarea1">Professional details</label>
				  </div>
				</div>
				</div>
				
				<div class="custom_margin">
					<div class="file-field input-field">
					  <div class="btn">

						<span>Browse your image</span>
						
						<input type="file" name="imagefile" required>
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text" name="imagepath">
					  </div>
					</div>
				</div>
				
				<div class="row section">
					<div class="input-field col s12">
					  <i class="material-icons prefix">perm_device_information</i>
					  <input id="icon_telephone" name="mobile" type="tel" class="validate" required>
					  <label for="icon_telephone">Mobile No</label>
					</div>
				</div>
				
				<div >
					<div class="row">
						<div class="input-field col s12">
						  <i class="material-icons prefix">email</i>
						  <input id="email" name="email" type="email" class="validate" required>
						  <label for="email" data-error="wrong" data-success="right">Email</label>
						</div>
					 </div>
				</div>

				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">schedule</i>
						<input type="date" class="datepicker" name="birthdate" class="validate" required>
						<label for="birthdate">Birth Date</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">vpn_key</i>
						<input id="password" name="passcode" type="password" class="validate" required>
						<label for="password">PassCode</label>
					</div>
				</div>
				
				
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">phone</i>
						<input placeholder="Workplace phone no." id="icon_telephone" name="phone" type="tel" class="validate" required>
						<label for="icon_telephone">Phone</label>
					</div>
				</div>
				
				<div class="">
					<div class="input-field col s12">
					<i class="material-icons prefix">offline_pin</i>
					  <input id="reg_no" name="bdmc_code" type="text" class="validate">
					  <label for="reg_no">BDMC registration no.</label>
					</div>
				
				
				</div>
				
				<div class=" section">
				<div class="row">
				  <div class="input-field col s12">
				  <i class="material-icons prefix">view_list</i>
					<textarea id="textarea1" name="degrees" class="materialize-textarea" length="120" required></textarea>
					<label for="textarea1">Academic Degrees with institutions</label>
				  </div>
				</div>
				</div>
				
				<div class="center-btn">
				<button class="btn waves-effect waves-light" type="submit" name="submit"> submit
					<i class="material-icons right">send</i>
				</button>
				</div>
			
			</form>
		</div>
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

   <script>

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 200 // Creates a dropdown of 15 years to control year
  });
        
   
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".dropdown-button").dropdown();
      Materialize.updateTextFields();
   });
  </script>
  
 
         
	
</div>

</body>


</html>