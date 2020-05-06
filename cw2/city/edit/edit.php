<!DOCTYPE html>
<html>
<style>
	body{background-color:grey;}
</style>
	<head>
		<title>City Edit</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="../../main.css">
	</head>
	<body>
		<br>
		<br>
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


			$sql = "SELECT * FROM CITY WHERE ID = '$ID' ";

			mysqli_set_charset($conn,"utf8");

			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_array($result);

		?>
		<div class="navbar">
		  	<a href="../city.php">Back</a>
		</div>

		<div class="main">
			<form action="edit_update.php" method="post">
				<table>
					<tr><td>ID:</td> 			<td><input type="text" name="ID" 			value="<?php echo $row['ID']; ?>" ></td></tr>
					<tr><td>Name:</td> 			<td><input type="text" name="Name" 			value="<?php echo $row['Name']; ?>"></td></tr>
			        <tr><td>CountryCode:</td> 	<td><input type="text" name="CountryCode" 	value="<?php echo $row['CountryCode']; ?>"></td></tr>
			        <tr><td>District:</td> 		<td><input type="text" name="District" 		value="<?php echo $row['District']; ?>"></td></tr>
			        <tr><td>Population:</td> 	<td><input type="text" name="Population" 	value="<?php echo $row['Population']; ?>"></td></tr>
			        <tr><td class="button"><input type="submit" name="submit"></td></tr>
		        </table>
			</form>
		</div>
		<?php $conn-> close(); ?>
	</body>
</html>