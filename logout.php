<?php
session_start();
if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
	unset($_SESSION['id']);
	unset($_SESSION['designation']);
	unset($_SESSION['speciality']);
	unset($_SESSION['professional_details']);
	unset($_SESSION['mobile']);
	unset($_SESSION['email']);
	unset($_SESSION['academic_degree']);
	unset($_SESSION['fee']);
	unset($_SESSION['type']);
	session_destroy();
}
header('Location: index.php');
?>