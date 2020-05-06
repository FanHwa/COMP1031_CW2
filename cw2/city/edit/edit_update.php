<?php
$servername = "localhost";
$username = "sayft1";
$password = "masonjackie666%$#@!";
$dbname = "sayft1_WORLD_Assignment2";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn){
			die("Conection failed: ". mysqli_connect_error);
		}

		$ID = $_POST['ID'];
		$Name = $_POST['Name'];
		$CountryCode = $_POST['CountryCode'];
		$District = $_POST['District'];
		$Population = $_POST['Population'];

		$sql = "UPDATE CITY SET ID 			= '$ID',
								Name 		= '$Name',
								CountryCode = '$CountryCode',
								District 	= '$District',
								Population 	= '$Population'
								WHERE ID = '$ID'";		

		mysqli_set_charset($conn,"utf8");

		$result = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn)==1)
			$message = "Edited Successfully";
		else
			$message = "Edit Failed";
		echo "<script type='text/javascript'>alert('$message'); window.location.href='../city.php';</script>";
?>

<?php $conn-> close(); ?>