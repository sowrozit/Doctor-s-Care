<?php
session_start();
?>
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
	
	<style type="text/css">
	  body {
	    background-image:url('image/bgimage.jpg');
	    width: 100%;
	    height: 100%;
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
            	<li><a href="index.php"><i class="material-icons left">store</i>Home</a></li>
	            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>
            
          </ul>
        </div>
      </nav>
    </div>
	
		<div class="row login">
			<form class="col s12" action="user_verification.php" method="POST">
				
				<div class="row">
					<div class="input-field col s12">
					  <i class="material-icons prefix">perm_device_information</i>
					  <input name="mobile" id="icon_telephone" type="tel" class="validate">
					  <label for="icon_telephone">Mobile No</label>
					</div>
				</div>
				
				<div >
					<div class="row">
						<div class="input-field col s12">
						  <i class="material-icons prefix">vpn_key</i>
						  <input name="password" id="password" type="password" class="validate">
						  <label for="password">Password</label>
						</div>
					 </div>
				</div>
				
		
				<div class="row center-btn">
				<button class="btn waves-effect waves-light" type="submit" name="action" >Login
					<i class="material-icons right">lock_open</i>
				</button>
				</div>
			
			</form>
		
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

  <script type="text/javascript">
    $(document).ready(function() {
      $(".dropdown-button").dropdown();
      Materialize.updateTextFields();
   });
  </script>
         
	
</div>

</body>


</html>