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

 <style>
    #form label{ width:140px;}
    #error_msg{color:red; font-weight:bold; margin-left:6%;}
 </style>
 <script>
       $(document).ready(function(){
         var $errorMsg =  $('<span id="error_msg">Passwords do not match.</span>');
         var $submitBtn = $("#form input[type='submit']");

         $("#confirm_password")
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
	
	
</head>

<body>

<div class="container1">

  	<div class="navbar-fixed ">
  		<ul id="dropdown1" class="dropdown-content">
        <li><a href="doc_login.php">Doctor Area</a></li>
        <li><a href="user_login.php">User Area</a></li>
        <li class="divider"></li>
      </ul>
      <nav>
        <div class="nav-wrapper teal lighten-2">
          <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='30%'></a>
          <ul class="right hide-on-med-and-down">
             <li><a href="index.php"><i class="material-icons left">store</i>Home</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
	
	<div class="regi" id="regi">
		<div class="row">
			<form class="col s12" name="form" id="form" action="user_registration.php" method="POST" enctype="multipart/form-data" >
				<div class="row">
					<div class="input-field col s6">
					  <i class="material-icons prefix">account_circle</i>
					  <input id="icon_prefix" type="text" class="validate" name="fname" required>
					  <label for="icon_prefix">First Name</label>
					</div>
					<div class="input-field col s6">
					  <input id="last_name" type="text" class="validate" name="lname" required>
					  <label for="last_name">Last Name</label>
					</div>
				</div>
				
				
				<div class="custom_margin4">

					<i class="material-icons prefix">supervisor_account</i>
					<span class="custom_margin4"> Gender </span> 
					  <input class="with-gap" name="gender" type="radio" id="male" value="male"  />
					  <label for="male">Male</label>
					  <input class="with-gap" name="gender" type="radio" id="female"  value="female" />
					  <label for="female">Female</label>
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
					  <input id="icon_telephone" type="tel" class="validate" name="phone" required>
					  <label for="icon_telephone">Mobile No</label>
					</div>
				</div>
				
				<div >
					<div class="row">
						<div class="input-field col s12">
						  <i class="material-icons prefix">email</i>
						  <input id="email" type="email" class="validate" name="email" required>
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
						<input id="password" type="password" class="validate" name="passcode" required>
						<label for="password">PassCode</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">add_alert</i>
						<input id="confirm_password" type="password" class="validate" name="password">
						<label for="password">confirm passcode</label>
					</div>
				</div>

				<div class="custom_margin">
					<div class="input-field col s12">
						<select name="blood_group" required>
						  <option value="" disabled selected>CHOOSE YOUR BLOOD GORUP</option>
						  <option value="1">A+</option>
						  <option value="2">A-</option>
						  <option value="3">B+</option>
						  <option value="4">B-</option>
						  <option value="5">AB+</option>
						  <option value="6">AB-</option>
						  <option value="7">O+</option>
						  <option value="8">O-</option>
						</select>
						<label>Blood Group</label>
					</div>
				</div>

				<div class="custom_margin3">
					<p>
					 <span>Blood Donor?<span> 
					  <input class="with-gap" name="blood_donor" type="radio" id="yes" value="yes" required />
					  <label for="yes">Yes</label>
					  <input class="with-gap" name="blood_donor" type="radio" id="no" value="no"  />
					  <label for="no">No</label>
					</p>
				
				</div> </br>
				
				<div class="custom_margin center-btn section">
				<button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">GET STARTED
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
  </script>
  
  <script>
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
     
	 
	
</div>

</body>


</html>