<!DOCTYPE html>
<html>
<style>
	body{
		background-color: grey;
	}
</style>
	<head>
		<title>Language Edit</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="../../main.css">
	</head>
	<body>
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


			$sql = "SELECT * FROM LANG WHERE CountryCode = '$CountryCode' AND Language = '$Language'";

			mysqli_set_charset($conn,"utf8");

			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_array($result);

		?>
		<div class="navbar">
		  	<a href="../language.php">Back</a>
		</div>
		<div class="main">
			<form action="edit_update.php" method="post">
				<table>
					<tr><td>CountryCode:</td> 	<td><input type="text" name="CountryCode" 	value="<?php echo $row['CountryCode']; ?>" ></td></tr>
					<tr><td>Language:</td> 		<td><input type="text" name="Language" 		value="<?php echo $row['Language']; ?>"></td></tr>
			        <tr><td>IsOfficial:</td> 	<td><input type="text" name="IsOfficial" 	value="<?php echo $row['IsOfficial']; ?>"></td></tr>
			        <tr><td>Percentage:</td> 	<td><input type="text" name="Percentage" 	value="<?php echo $row['Percentage']; ?>"></td></tr>
			        <tr><td class="button"><input type="submit" name="submit"></td></tr>
		        </table>
			</form>
		</div>
		<?php $conn-> close(); ?>
	</body>
</html>