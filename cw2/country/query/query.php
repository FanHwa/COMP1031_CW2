<!DOCTYPE html>
<html>
	<head>
		<title>Country Query</title>
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

			$sql = "SELECT CountryCode, Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, Code2 FROM COUNTRY WHERE  CountryCode LIKE '%$CountryCode%' AND 
																Name LIKE '%$Name%' AND 
																Continent LIKE '%$Continent%' AND 
																Region LIKE '%$Region%' AND
																SurfaceArea LIKE '%$SurfaceArea%' AND
																IndepYear LIKE '%$IndepYear%' AND
																Population LIKE '%$Population%' AND
																LifeExpectancy LIKE '%$LifeExpectancy%' AND
																GNP LIKE '%$GNP%' AND
																GNPOld LIKE '%$GNPOld%' AND
																LocalName LIKE '%$LocalName' AND
																GovernmentForm LIKE '%$GovernmentForm%' AND
																HeadOfState LIKE '%$HeadOfState%' AND
																Capital LIKE '%$Capital%' AND
																Code2 LIKE '%$Code2%'";


			mysqli_set_charset($conn,"utf8");

			$result = mysqli_query($conn, $sql);

			$affected = mysqli_affected_rows($conn);
		?>

		<div class="navbar">
			<a href="../country.php">Back</a>
		  	<a href="../../city/city.php">City</a>
		  	<a href="../country.php">Country</a>
		  	<a href="../../language/language.php">Language</a>
		  	<a href="https://www.nottingham.edu.my/CorporateMarketing/Services/Service-Details/University-website.aspx" style="padding: 0px 0px"> <img src="../../NOTT.png" height="50" width="50"></a>
		</div>

		<div class="main">
			<h2>Query result</h2>
			<?php echo " <p>Number of result: {$affected}</p>"; ?>
			<!-- Start table -->
			<table>
				<tr>
					<th>Country Code</th>
					<th>Name</th>
					<th>Continent</th>
					<th>Region</th>
					<th>Surface Area</th>
					<th>Indep Year</th>
					<th>Population</th>
					<th>Life Expectancy</th>
					<th>GNP</th>
					<th>GNP Old</th>
					<th>Local Name</th>
					<th>Government Form</th>
					<th>Head Of State</th>
					<th>Capital</th>
					<th>Code 2</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				<?php
				while($row = mysqli_fetch_array($result)):
				?>

				<tr>
					<td><?php echo $row['CountryCode']; ?></td>
					<td><?php echo $row['Name']; ?></td>
					<td><?php echo $row['Continent']; ?></td>
					<td><?php echo $row['Region']; ?></td>
					<td><?php echo $row['SurfaceArea']; ?></td>
					<td><?php echo $row['IndepYear']; ?></td>
					<td><?php echo $row['Population']; ?></td>
					<td><?php echo $row['LifeExpectancy']; ?></td>
					<td><?php echo $row['GNP']; ?></td>
					<td><?php echo $row['GNPOld']; ?></td>
					<td><?php echo $row['LocalName']; ?></td>
					<td><?php echo $row['GovernmentForm']; ?></td>
					<td><?php echo $row['HeadOfState']; ?></td>
					<td><?php echo $row['Capital']; ?></td>
					<td><?php echo $row['Code2']; ?></td>
					<td class="edit">
		    			<form action='../edit/edit.php' method="post">
		        			<input type="hidden" name="CountryCode" value="<?php echo $row['CountryCode']; ?>">
		        			<input type="submit" name="submit" value="Edit">
		    			</form>
					</td>
					<td class="delete">
		    			<form action='../delete/delete.php' method="post">
		        			<input type="hidden" name="CountryCode" value="<?php echo $row['CountryCode']; ?>">
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