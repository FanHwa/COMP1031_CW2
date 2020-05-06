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


		$sql = "DELETE FROM LANG WHERE CountryCode = '$CountryCode' LIMIT 1";

		mysqli_set_charset($conn,"utf8");

		$result = mysqli_query($conn, $sql);

		if (mysqli_affected_rows($conn)==1)
			$message = "Delete Successfully";
		else
			$message = "Delete Failed";
		echo "<script type='text/javascript'>alert('$message'); window.location.href='../language.php';</script>";


			
?>

	<?php $conn-> close(); ?>
