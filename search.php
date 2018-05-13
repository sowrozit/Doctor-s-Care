<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/flexslider.css"  />
	<link rel="stylesheet" type="text/css" href="css/materialize.css"  />
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

</body>
</html>
<?php
ob_start();
require 'config.php';

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$id_get = $_GET['id'];
	
	if($id_get == 1) {
		$sql = "SELECT * FROM doctor WHERE name LIKE '%$s%'";
		$result = $conn->query($sql) or die($conn->error);
		//echo "<div style='' id='searchtitle'>
		//<select title='Select One' name='selectname' onChange='getData(this.options[this.selectedIndex].value)'>";
		while($row = $result->fetch_assoc()){
			//$name = $row['name'];
			//echo '<option value="'.$name.'">'.$name.'</option>';
		//}
		//echo '</select>
		//</div>';
			$name = $row['name'];
			$id = $row['doctor_id'];
			$designation = $row['designation'];
			echo "<div style='' id='searchtitle'>"."<a style='font-family: verdana; text-decoration: none; color: black; cursor: pointer;' href='doc_profile_visit.php?id=".$id."'>Dr. ".$name." - ".$designation."</a>"."</div>";
	} 
}
else {
		$sql = "SELECT * FROM area WHERE area_name LIKE '%$s%'";
		$result = $conn->query($sql) or die($conn->error);
		//echo "<div style='' id='searchtitle'>
		//<select title='Select One' name='selectname' onChange='getData(this.options[this.selectedIndex].value)'>";
		while($row = $result->fetch_assoc()){
			//$name = $row['name'];
			//echo '<option value="'.$name.'">'.$name.'</option>';
		//}
		//echo '</select>
		//</div>';
			$area_name = $row['area_name'];
			$area_id = $row['area_id'];
			echo "<div style='' id='searchtitle'>"."<a style='font-family: verdana; text-decoration: none; color: black; cursor: pointer;' href='search_doc_area.php?id=".$area_id."'>".$area_name."</a>"."</div>";
	}
}
	
}

?>