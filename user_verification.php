<?php
session_start();
require 'config.php';

$mobile = $_POST["mobile"];
$password = $_POST["password"];

$result = $conn->query("Select * from user where mobile_number='$mobile' and password='$password'") or die($conn->error);

if ($result->num_rows)
{
	while($res=$result->fetch_assoc())
	{
		$_SESSION['user_id']=$res['user_id'];
		$_SESSION['id'] = $res['user_id'];
		$_SESSION['username'] = $res['first_name']." ".$res['last_name'];
		$_SESSION['gender'] = $res['gender'];
		$_SESSION['birthdate'] = $res['birthdate'];
		$_SESSION['email'] = $res['email'];
		$_SESSION['mobile'] = $res['mobile_no'];
		$_SESSION['email'] = $res['email'];
		$_SESSION['blood_donor'] = $res['blood_donor'];
		$_SESSION['type'] = 'User';
		$_SESSION['image_path'] = $res['image_path'];
	}

	header('Location: index.php?id='.$_SESSION['user_id']);
	exit();
}
else
{
	header('Location: user_login.php');
	exit();
}
?>