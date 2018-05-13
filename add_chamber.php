<html>
<head>
	<title></title>
</head>

<body>
<?php

session_start();
//including the database connection file
include_once("myconfig.php");

	if(isset($_POST['add_chamber']))
	{
		$chamber_name=$_POST['chamb_name'];
		$area=$_POST['area'];
		$time_from=$_POST['from'];
		$time_to=$_POST['to'];
		
		
			$query1=mysql_query("select * from area where area_id=$area");
			
			$result = mysql_query("INSERT INTO `chamber`(`chamber_id`, `chamber_name`, `area_id`) VALUES (NULL,'$chamber_name',$area)");
			if (!$result) 
					{
					$message  = 'Invalid query: ' . mysql_error() . "\n";
					die($message);
					}
					else
					{
						echo "oh yeah successful";
					}
			
			$query2=mysql_query("select * from chamber where area_id=$area and chamber_name='$chamber_name'");
			echo "phase 1";
			while($res2=mysql_fetch_array($query2))
			{
				foreach ($_POST['chamberday'] as $selectedOption)
				{
					echo "phase 2";
					$chamber_id = $res2['chamber_id'];
					$doctor_id = $_SESSION['doc_id'];
					$result2 = mysql_query("INSERT INTO `schedule`(`schedule_id`, `chamber_id`, `doctor_id`, `day_id`, `time_from`, `time_to`) VALUES (NULL,'$chamber_id','$doctor_id','$selectedOption','$time_from','$time_to')");
					//$result2 = mysql_query("INSERT INTO schedule VALUES('$chamber_id','$doctor_id','$selectedOption','$time_from','$time_to'");
					if (!$result2) 
					{
					$message  = 'Invalid query: ' . mysql_error() . "\n";
					die($message);
					}
					else
					{
						echo "oh yeah successful";
					}
				}
			}
		
		
		}
			
		
		
		//$result = mysql_query("INSERT INTO chamber VALUES('$chamber_name',"."select area_id where area_name='$area')");
		

 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		//$result = mysql_query("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//display success message
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='index.php'>View Result</a>";
	

?>
</body>
</html>
