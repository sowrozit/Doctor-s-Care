<html>
<head>
  <title>Doctor's Care</title>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

  <link rel="stylesheet" type="text/css" href="css/ambulance.css">
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
      
      <nav>
        <div class="nav-wrapper cyan accent-4">
          <a href="index.php" class="brand-logo"><img src="image/logo2.png" height='100%' width='30%'></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="index.php"><i class="material-icons left">store</i>Home</a></li>
            <li><a href="#search"><i class="material-icons left">search</i>Search For Ambulance</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">lock_outline</i>Login Area<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="upperportion">
      <div class="flexslider" >
        <ul class="slides">
          <li><img src="image/amb1.JPG" height="100%" /></li>
          <li><img src="image/amb2.jpg" height="100%" /></li>
          <li><img src="image/amb3.PNG" height="100%" /></li>
        </ul>
        </div>
    </div>

    <div class="search" id="search">
      <nav>
        <div class="nav-wrapper  cyan accent-4">
          <a class="brand-logo center">Find Ambulance</a>
        </div>
      </nav>

      <div class="find_ambulance">
        <div class="row">
          <form class="col s8" method="POST" action="search_ambulance.php">
            <div class="row">
              <div class="input-field col s8">
                <i class="material-icons prefix">location_on</i>
                <input id="amb" name="amb_area" type="text" class="validate">
                <label for="name">Search Ambulance By City</label>
              </div>
            </div>
            <div class="row">
              <div class="button col s8 cyan accent-4">
                <button class="btn waves-effect waves-light full cyan accent-4" type="submit" name="search">Search
                <i class="material-icons right">search</i>
              </button>
            </div>
            </div>
          </form>
        </div>
      </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".dropdown-button").dropdown();
      Materialize.updateTextFields();
   });
  </script>

<div class="footer_section cyan accent-4">
  <p>Copyright &copy; All rights reserved to  <a class="footer"href="">Pratik Saha, Md. Mahedi Hasan and Sowrozit Sarker</a></p>
</div>

</div>

</body>
</html>