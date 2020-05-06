<!DOCTYPE html>
<html>
<style>
	body{background-color:grey;}
</style>
	<head>
		<title>City Query</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../main.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
		<!-- Connect to database -->
		<?php
			$servername = "localhost";
			$username = "sayft1";
			$password = "masonjackie666%$#@!";
			$dbname = "sayft1_WORLD_Assignment2";

			$conn = mysqli_connect($servername, $username, $password, $dbname);

			if (!$conn){
				die("Conection failed: ". mysqli_connect_error);
			}
		?>

		<?php

			$ID = $_POST['ID'];
			$Name = $_POST['Name'];
			$CountryCode = $_POST['CountryCode'];
			$District = $_POST['District'];
			$Population = $_POST['Population'];

			$sql = "SELECT ID, Name, CountryCode, District, Population FROM CITY WHERE 	ID LIKE '%$ID%' AND 
																						Name LIKE '%$Name%' AND 
																						CountryCode LIKE '%$CountryCode%' AND 
																						District LIKE '%$District%' AND 
																						Population LIKE '%$Population%'";



			mysqli_set_charset($conn,"utf8");

			$result = mysqli_query($conn, $sql);

			$affected = mysqli_affected_rows($conn);
		?>

		<div class="navbar">
			<a href="../city.php">Back</a>
			<a href="../city.php">City</a>
		  	<a href="../../country/country.php">Country</a>
		  	<a href="../../language/language.php">Language</a>
		  	<a href="https://www.nottingham.edu.my/CorporateMarketing/Services/Service-Details/University-website.aspx" style="padding: 0px 0px"> <img src="../../NOTT.png" height="50" width="50"></a>
		</div>

		<div class="main">
			<h2>Query result</h2>
			<?php echo " <p>Number of result: {$affected}</p>"; ?>
			<!-- Start table -->
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>CountryCode</th>
					<th>District</th>
					<th>Population</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				<?php
				while($row = mysqli_fetch_array($result)):
				?>

				<tr>
					<td><?php echo $row['ID']; ?></td>
					<td><?php echo $row['Name']; ?></td>
					<td><?php echo $row['CountryCode']; ?></td>
					<td><?php echo $row['District']; ?></td>
					<td><?php echo $row['Population']; ?></td>
					<td class="edit">
		    			<form action='../edit/edit.php?name="<?php echo $row['ID']; ?>"' method="post">
		        			<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
		        			<input type="submit" name="submit" value="Edit">
		    			</form>
					</td>
					<td class="delete">
		    			<form action='../delete/delete.php?name="<?php echo $row['ID']; ?>"' method="post">
		        			<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
		        			<input type="submit" name="submit" value="Delete">
		    			</form>
					</td>
				</tr>

			<?php endwhile; ?>
			</table>
		</div>

		<?php $conn-> close(); ?>
	</body>

</html>