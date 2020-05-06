<!DOCTYPE html>
<html>
<style>
	body{background-color:grey;}
</style>
	<head>
		<title>Country Database</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="../main.css">
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

		<div class="navbar">
			<a href="../index.html">Home</a>
		  	<a href="../city/city.php">City</a>
		  	<a href="country.php">Country</a>
		  	<a href="../language/language.php">Language</a>
		</div>

		<div class="main">
			<h2>Country</h2>

			<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-dark-grey">Insert Record</button>

			<div id="id01" class="w3-modal">
		    	<div class="w3-modal-content">
		      		<div class="w3-container" style="background-color:grey;padding-top: 15px;">
		        		<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<form action="insert/insert_update.php" method="post">
							<table>
								<tr><td>CountryCode</td> 	<td><input type="text" name="CountryCode" 		placeholder="eg. AGO"						size="30">		</td></tr>
								<tr><td>Name</td> 			<td><input type="text" name="Name" 				placeholder="eg. Angola"					size="30">		</td></tr>
						        <tr><td>Continent</td> 		<td><input type="text" name="Continent" 		placeholder="eg. Africa"					size="30">		</td></tr>
						        <tr><td>Region</td> 		<td><input type="text" name="Region" 			placeholder="eg. Central Africa"			size="30">		</td></tr>
						        <tr><td>SurfaceArea</td> 	<td><input type="text" name="SurfaceArea" 		placeholder="eg. 1246700.00"				size="30">		</td></tr>
						        <tr><td>IndepYear</td> 		<td><input type="text" name="IndepYear" 		placeholder="eg. 1975"						size="30">		</td></tr>
						        <tr><td>Population</td> 	<td><input type="text" name="Population" 		placeholder="eg. 12878000"					size="30">		</td></tr>
						        <tr><td>LifeExpectancy</td> <td><input type="text" name="LifeExpectancy" 	placeholder="eg. 38"						size="30">		</td></tr>
						        <tr><td>GNP</td> 			<td><input type="text" name="GNP" 				placeholder="eg. 6648.00"					size="30">		</td></tr>
						        <tr><td>GNPOld</td> 		<td><input type="text" name="GNPOld" 			placeholder="eg. 7984.00"					size="30">		</td></tr>
						        <tr><td>LocalName</td> 		<td><input type="text" name="LocalName" 		placeholder="eg. Angola"					size="30">		</td></tr>
						        <tr><td>GovernmentForm</td> <td><input type="text" name="GovernmentForm" 	placeholder="eg. Republic"					size="30">		</td></tr>
						        <tr><td>HeadOfState</td> 	<td><input type="text" name="HeadOfState" 		placeholder="eg. José Eduardo dos Santos" 	size="30">		</td></tr>
						        <tr><td>Capital</td> 		<td><input type="text" name="Capital" 			placeholder="eg. 56"						size="30">		</td></tr>
						        <tr><td>Code2</td> 			<td><input type="text" name="Code2" 			placeholder="eg. AO"						size="30">		</td></tr>
						        <tr><td class="button"><input type="submit" name="submit"></td></tr>
					        </table>
						</form>
					</div>
  				</div>
			</div>


			<button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-dark-grey">Query Record</button>

  			<div id="id02" class="w3-modal">
    			<div class="w3-modal-content">
      				<div class="w3-container" style="background-color:grey;padding-top: 15px;">
        				<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							<form action="query/query.php" method="post">
								<table>
									<tr><td>CountryCode</td> 	<td><input type="text" name="CountryCode" 		value=""	size="30">		</td></tr>
									<tr><td>Name</td> 			<td><input type="text" name="Name" 				value=""	size="30">		</td></tr>
							        <tr><td>Continent</td> 		<td><input type="text" name="Continent" 		value=""	size="30">		</td></tr>
							        <tr><td>Region</td> 		<td><input type="text" name="Region" 			value=""	size="30">		</td></tr>
							        <tr><td>SurfaceArea</td> 	<td><input type="text" name="SurfaceArea" 		value=""	size="30">		</td></tr>
							        <tr><td>IndepYear</td> 		<td><input type="text" name="IndepYear" 		value=""	size="30">		</td></tr>
							        <tr><td>Population</td> 	<td><input type="text" name="Population" 		value=""	size="30">		</td></tr>
							        <tr><td>LifeExpectancy</td> <td><input type="text" name="LifeExpectancy" 	value=""	size="30">		</td></tr>
							        <tr><td>GNP</td> 			<td><input type="text" name="GNP" 				value=""	size="30">		</td></tr>
							        <tr><td>GNPOld</td> 		<td><input type="text" name="GNPOld" 			value=""	size="30">		</td></tr>
							        <tr><td>LocalName</td> 		<td><input type="text" name="LocalName" 		value=""	size="30">		</td></tr>
							        <tr><td>GovernmentForm</td> <td><input type="text" name="GovernmentForm" 	value=""	size="30">		</td></tr>
							        <tr><td>HeadOfState</td> 	<td><input type="text" name="HeadOfState" 		value="" 	size="30">		</td></tr>
							        <tr><td>Capital</td> 		<td><input type="text" name="Capital" 			value=""	size="30">		</td></tr>
							        <tr><td>Code2</td> 			<td><input type="text" name="Code2" 			value=""	size="30">		</td></tr>
							        <tr><td class="button"><input type="submit" name="submit"></td></tr>
						        </table>
							</form>
						</div>
    				</div>
  			</div>

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
				$sql = "SELECT CountryCode, Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, Code2 FROM COUNTRY";



				mysqli_set_charset($conn,"utf8");

				$result = mysqli_query($conn, $sql);
					
					
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
		    			<form action='edit/edit.php' method="post">
		        			<input type="hidden" name="CountryCode" value="<?php echo $row['CountryCode']; ?>">
		        			<input type="submit" name="submit" value="Edit">
		    			</form>
					</td>
					<td class="delete">
		    			<form action='delete/delete.php' method="post">
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