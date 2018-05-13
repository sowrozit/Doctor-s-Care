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

  <script type="text/javascript">
      $(window).load(function(){
          $('.flexslider').flexslider({
              animation: "fade",
              autoplay:false,
              slideshowSpeed: 2000
        });
    });
  
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
		xmlhttp.open("GET", "search.php?s="+string+"&id=1", true);
		xmlhttp.send(null);
	}
	
	
	function search_area(string){
		var xmlhttp;
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}else{
			xmlhttp = new ActiveXObject("XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				document.getElementById("search_div_area").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", "search.php?s="+string+"&id=2", true);
		xmlhttp.send(null);
	}
	

  function setName(string) {

    document.getElementById("search_name").value = string;
  }

  function toggleTwo()
  {
    toggle();
    toggleDropdown();
  }
  
  
  

  function toggle() {
  var ele = document.getElementById("search_name");
  var text = document.getElementById("search_link");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    text.innerHTML = "Search using Doctor's Name";
    }
  else {
    ele.style.display = "block";
    text.innerHTML = "Back to Basic Search";
  }
} 


function toggle_area() {
  var ele2 = document.getElementById("search_area");
  var text2 = document.getElementById("search_area_link");
  if(ele2.style.display == "block") {
        ele2.style.display = "none";
    text2.innerHTML = "Search by desired area";
    }
  else {
    ele2.style.display = "block";
    text2.innerHTML = "Back to Basic Search";
  }
  
  
  toggleDropdown();
}

function toggleDropdown() 
{
    document.getElementById("speciality").disabled = true;
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
      <div class="logo_div">
      </div>
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

            <li><a id="login" class="dropdown-button login-link" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>

          </ul>
        </div>
      </nav>
    </div>

  	<div class="upperportion z-depth-5">
  		<div class="flexslider" >
  			<ul class="slides">
          <li><img src="image/1.JPG" height="100%" /></li>
          <li><img src="image/3.jpg" height="100%" /></li>
          <li><img src="image/4.jpg" height="100%" /></li>
          <li><img src="image/5.jpg" height="100%" /></li>
  			</ul>
   			</div>
  	</div>

  	<div class="search" id="search">
  		<nav>
        <div class="nav-wrapper teal lighten-2">
          <a class="brand-logo center">Find Your Doctor</a>
        </div>
      </nav>

      <div class="find_Doctor">
        <div class="row">
          <form class="col s8" action="search_doc.php" method="POST" autocomplete="off">
            
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">stars</i>
                <select name="speciality" id="speciality">
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
              <div class="input-field col s8">
                <a id="search_link" href="javascript:toggleTwo();">Search by Doctor's Name</a>
              </div>

            </div>

            <div class="boxes" id="search_name">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="search_name" type="text" name="name" class="validate" onkeyup="search(this.value)">
                <label for="search_name">Doctor's Name</label>
                <div id="search_div">
                </div>
              </div>
            </div>
            </div>
			
			
			<div class="row">
              <div class="input-field col s8">
                <a id="search__area_link" href="javascript:toggle_area();">Search by Area</a>
              </div>

            </div>

            <div class="boxes" id="search_area">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">location_on</i>
                <input id="area" type="text" name="s_area" class="validate" onkeyup="search_area(this.value)">
                <label for="s_name">Area</label>
                <div id="search_div_area">
                </div>
              </div>
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

        <div class="emergency" id="service">
          <div class="ambulance">
            <nav>
              <div class="nav-wrapper teal lighten-2">
                <a class="brand-logo center">Ambulance Service</a>
              </div>
            </nav>

            <div class="margin">
            	<a href="ambulance.php">
	              <img src="image/ambulance.png" alt="Ambulance Service">
	            </a>
            </div>
          </div>

          <div class="blood_bank">
            <nav>
              <div class="nav-wrapper teal lighten-2">
                <a class="brand-logo center">Blood Bank</a>
              </div>
            </nav>

            <div class="margin">
	            <a href="blood_bank.php">
	            	<img src="image/blood_bag.png" alt="Blood Bank Service">
	            </a>
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

</div>

</body>
</html>