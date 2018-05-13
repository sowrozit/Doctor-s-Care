<?php
session_start();
require 'config.php';

$mobile = $_POST["mobile"];
$password = $_POST["password"];

$result = $conn->query("Select * from doctor where mobile_no='$mobile' and password='$password'") or die($conn->error);

if ($result->num_rows)
{
	while($res=$result->fetch_assoc())
	{
		$_SESSION['doc_id']=$res['doctor_id'];
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

	header('Location: index.php?id='.$_SESSION['doc_id']);
	exit();
}
else
{
	header('Location: doc_login.php');
	exit();
}
?>