<?php
$servername = "localhost";
$username = "sayft1";
$password = "masonjackie666%$#@!";
$dbname = "sayft1_WORLD_Assignment2";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn){
			die("Conection failed: ". mysqli_connect_error);
		}

		$CountryCode = $_POST['CountryCode'];
		$Name = $_POST['Name'];
		$Continent = $_POST['Continent'];
		$Region = $_POST['Region'];
		$SurfaceArea = $_POST['SurfaceArea'];
		$IndepYear = $_POST['IndepYear'];
		$Population = $_POST['Population'];
		$LifeExpectancy = $_POST['LifeExpectancy'];
		$GNP = $_POST['GNP'];
		$GNPOld = $_POST['GNPOld'];
		$LocalName = $_POST['LocalName'];
		$GovernmentForm = $_POST['GovernmentForm'];
		$HeadOfState = $_POST['HeadOfState'];
		$Capital =  $_POST['Capital'];
		$Code2 =  $_POST['Code2'];

		$sql = "UPDATE COUNTRY SET  CountryCode 	= '$CountryCode',
									Name 			= '$Name', 
									Continent 		= '$Continent',
									Region 			= '$Region',
									SurfaceArea 	= '$SurfaceArea',
									IndepYear 		= '$IndepYear',
									Population 		= '$Population',
									LifeExpectancy 	= '$LifeExpectancy',
									GNP 			= '$GNP',
									GNPOld 			= '$GNPOld',
									LocalName 		= '$LocalName',
									GovernmentForm 	= '$GovernmentForm',
									HeadOfState 	= '$HeadOfState',
									Capital 		= '$Capital',
									Code2 			= '$Code2'
									WHERE CountryCode = '$CountryCode'";

		

		mysqli_set_charset($conn,"utf8");

		$result = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn)==1)
			$message = "Edited Successfully";
		else
			$message = "Edit Failed";
		echo "<script type='text/javascript'>alert('$message'); window.location.href='../country.php';</script>";
?>

<?php $conn-> close(); ?>