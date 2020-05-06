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
		$Language = $_POST['Language'];
		$IsOfficial = $_POST['IsOfficial'];
		$Percentage = $_POST['Percentage'];

		$sql = "UPDATE LANG SET CountryCode = '$CountryCode',
								Language 	= '$Language',
								IsOfficial 	= '$IsOfficial',
								Percentage	= '$Percentage'
								WHERE CountryCode = '$CountryCode' AND Language = '$Language'
								";

		mysqli_set_charset($conn,"utf8");

		$result = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn)==1)
			$message = "Edited Successfully";
		else
			$message = "Edit Failed";
		echo "<script type='text/javascript'>alert('$message'); window.location.href='../language.php';</script>";
?>

<?php $conn-> close(); ?>