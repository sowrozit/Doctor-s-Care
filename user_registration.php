
<?php

include_once("myconfig.php");

$bd_id="";
$bg_id="";

	if(isset($_POST['submit']))
	{
		//$taskOption = isset($_POST["select_catalog"]) ? $_POST["select_catalog"] : "";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$birthdate=$_POST['birthdate'];
		//$designation=$_POST['designation'];
		//$speciali = $_POST['speciality'];
		//$prof_details=$_POST['prof_details'];
		$handle = fopen($_FILES["imagefile"]["tmp_name"], 'r');
		$email = $_POST['email'];
		$passcode=$_POST['passcode'];
		$phone=$_POST['phone'];
		//$bdmc_code=$_POST['bdmc_code'];
		$blood_group=$_POST['blood_group'];
		$blood_donor=$_POST['blood_donor'];
		$name  = $fname." ".$lname;
		
		
		
		if($blood_donor=="yes")
		{
			$bd_id="1";
		}
		else if($blood_donor=="no")
		{
			$bd_id="2"; 
		}
		
		//var_dump($speciality);

	$target='uploads/'.basename($_FILES['imagefile']['name']);
	
	if(move_uploaded_file($_FILES['imagefile']['tmp_name'],$target))
	{

     //Insert into your db

    $fp = fopen($target, "r");
	}
		
	
		if(isset($_FILES['imagefile'])) 
		{
			$result = mysql_query("INSERT INTO user(first_name,last_name,gender,birthdate,image_path,mobile_number, email,password,blood_group_id,blood_donor) VALUES('$fname','$lname','$gender','$birthdate','$target','$phone', '$email','$passcode','$blood_group','$bd_id')");
			echo mysql_errno() . ": " . mysql_error() . "\n";
			if (!$result) 
			{
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			
			die($message);

			}
			else
			{
				//echo "successfully inserted";
				header("Location:user_login.php");
			}
		}

	
	}

?>
