
<?php

include_once("myconfig.php");


	

	
	
	//$taskOption = isset($_POST["select_catalog"]) ? $_POST["select_catalog"] : "";
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$birthdate=$_POST["birthdate"];
	$designation=$_POST['designation'];
	$speciality = $_POST['speciality'];
	$prof_details=$_POST['prof_details'];
	$handle = fopen($_FILES["imagefile"]["tmp_name"], 'r');
	$mobile=$_POST['mobile'];
	$email = $_POST['email'];
	$passcode=$_POST['passcode'];
	$phone=$_POST['phone'];
	$bdmc_code=$_POST['bdmc_code'];
	$degrees=$_POST['degrees'];

	
	//var_dump($speciality);

	$target='uploads/'.basename($_FILES['imagefile']['name']);
	
	if(move_uploaded_file($_FILES['imagefile']['tmp_name'],$target))
	{

     //Insert into your db

    $fp = fopen($target, "r");
	}
	
	if(isset($_FILES['imagefile']))
	{
		
		$result = mysql_query("INSERT INTO doctor(name,gender,birthdate,designation,speciality,professional_details,image_path,mobile_no, email,password,phone_number,bdmc_reg,academic_degree,fee) VALUES('$name','$gender','$birthdate','$designation','$speciality','$prof_details','$target','$mobile', '$email','$passcode','$phone','$bdmc_code','$degrees','500')");
		echo mysql_errno() . ": " . mysql_error() . "\n";
		//echo "successfully inserted";
		header('location: doc_login.php');
		if (!$result) 
		{
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		
		//die($message);

		}
		else
		{
			echo "";
		}
	}

	


?>
