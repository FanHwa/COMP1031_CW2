<!DOCTYPE html>
<html>
<style>
	body{background-color:grey;}
</style>
	<head>
		<title>Country Edit</title>
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

			$code = $_POST['CountryCode'];


			$sql = "SELECT * FROM COUNTRY WHERE CountryCode = '$code' ";

			mysqli_set_charset($conn,"utf8");

			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_array($result);

		?>
		<div class="navbar">
		  	<a href="../country.php">Back</a>
		</div>
		<div class="main">
			<form action="edit_update.php" method="post">
				<table>
					<tr><td>CountryCode:</td> 	<td><input type="text" name="CountryCode" 		value="<?php echo $row['CountryCode']; ?>" >	</td></tr>
					<tr><td>Name:</td> 			<td><input type="text" name="Name" 				value="<?php echo $row['Name']; ?>">			</td></tr>
			        <tr><td>Continent:</td> 	<td><input type="text" name="Continent" 		value="<?php echo $row['Continent']; ?>">		</td></tr>
			        <tr><td>Region:</td> 		<td><input type="text" name="Region" 			value="<?php echo $row['Region']; ?>">			</td></tr>
			        <tr><td>SurfaceArea:</td> 	<td><input type="text" name="SurfaceArea" 		value="<?php echo $row['SurfaceArea']; ?>">		</td></tr>
			        <tr><td>IndepYear:</td> 	<td><input type="text" name="IndepYear" 		value="<?php echo $row['IndepYear']; ?>">		</td></tr>
			        <tr><td>Population:</td> 	<td><input type="text" name="Population" 		value="<?php echo $row['Population']; ?>">		</td></tr>
			        <tr><td>LifeExpectancy:</td><td><input type="text" name="LifeExpectancy" 	value="<?php echo $row['LifeExpectancy']; ?>">	</td></tr>
			        <tr><td>GNP:</td> 			<td><input type="text" name="GNP" 				value="<?php echo $row['GNP']; ?>">				</td></tr>
			        <tr><td>GNPOld:</td> 		<td><input type="text" name="GNPOld" 			value="<?php echo $row['GNPOld']; ?>">			</td></tr>
			        <tr><td>LocalName:</td> 	<td><input type="text" name="LocalName" 		value="<?php echo $row['LocalName']; ?>">		</td></tr>
			        <tr><td>GovernmentForm:</td><td><input type="text" name="GovernmentForm" 	value="<?php echo $row['GovernmentForm']; ?>">	</td></tr>
			        <tr><td>HeadOfState:</td> 	<td><input type="text" name="HeadOfState" 		value="<?php echo $row['HeadOfState']; ?>">		</td></tr>
			        <tr><td>Capital:</td> 		<td><input type="text" name="Capital" 			value="<?php echo $row['Capital']; ?>">			</td></tr>
			        <tr><td>Code2:</td> 		<td><input type="text" name="Code2" 			value="<?php echo $row['Code2']; ?>">			</td></tr>
			        <tr><td class="button"><input type="submit" name="submit"></td></tr>
		        </table>
			</form>
		</div>
		<?php $conn-> close(); ?>
	</body>
</html>