<?php

// mysql_connect("database-host", "username", "password")
$conn = new mysqli("localhost","root","","p_dcare");

if($conn->connect_errno)
{
	die('Sorry! Connection was not Successful');
}

// mysql_select_db("database-name", "connection-link-identifier")
//@mysqli_select_db(,$conn);
	
?>
