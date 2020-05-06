<!DOCTYPE html>
<html>
<style>
	body{background-color:grey;}
</style>
	<head>
		<title>City Database</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="../main.css">
		<link rel="stylesheet" type="text/css" href="city.css">
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
			<a href="city.php">City</a>
		  	<a href="../country/country.php">Country</a>
		  	<a href="../language/language.php">Language</a>
		  	<a href="https://www.nottingham.edu.my/CorporateMarketing/Services/Service-Details/University-website.aspx" style="padding: 0px 0px"> <img src="../NOTT.png" height="50" width="50"> </a>
		</div>

		<div class="main">
			<h2>City  <font size="3"> [page:5/5]</font></h2>

			<!-- Start table -->
			<table class="citytable"> 
				<tr class="noborder">
					<td>
						<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-dark-grey">Insert Record</button>
					</td>
					<td>
						<button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-dark-grey">Query Record</button>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<button onclick="document.getElementById('previous').style.display='block'" class="w3-button w3-dark-grey CityPreviousLast">
  						<a href= "city3.php">Previous Page</a>
  						</button>
					</td>
				</tr>
				<tr>
					<th style="width: 150px">ID</th>
					<th style="width: 150px">Name</th>
					<th style="width: 150px">CountryCode</th>
					<th style="width: 150px">District</th>
					<th style="width: 150px">Population</th>
					<th style="width: 150px">Edit</th>
					<th style="width: 150px">Delete</th>
				</tr>

				<?php
				$sql = "SELECT ID, Name, CountryCode, District, Population FROM CITY WHERE ID BETWEEN 4001 AND 5000";

				mysqli_set_charset($conn,"utf8");

				$result = mysqli_query($conn, $sql);
	
				while($row = mysqli_fetch_array($result)):
				?>

				<tr>
					<td><?php echo $row['ID']; ?></td>
					<td><?php echo $row['Name']; ?></td>
					<td><?php echo $row['CountryCode']; ?></td>
					<td><?php echo $row['District']; ?></td>
					<td><?php echo $row['Population']; ?></td>
					<td class="edit">
		    			<form action='edit/edit.php?name="<?php echo $row['ID']; ?>"' method="post">
		        			<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
		        			<input type="submit" name="submit" value="Edit">
		    			</form>
					</td>
					<td class="delete">
		    			<form action='delete/delete.php?name="<?php echo $row['ID']; ?>"' method="post">
		        			<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
		        			<input type="submit" name="submit" value="Delete">
		    			</form>
					</td>
				</tr>

			<?php endwhile; ?>
			</table>
			<!-- Insert Record Button -->
			<div id="id01" class="w3-modal">
		    	<div class="w3-modal-content">
		      		<div class="w3-container">
		        		<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<form action="insert/insert_update.php" method="post">
							<table>
								<tr><td>ID</td> 		<td><input type="text" name="ID" 			placeholder="eg. 1"			size="30"></td></tr>
								<tr><td>Name</td> 		<td><input type="text" name="Name" 			placeholder="eg. Kabul"		size="30"></td></tr>
						        <tr><td>CountryCode</td><td><input type="text" name="CountryCode" 	placeholder="eg. AFG"		size="30"></td></tr>
						        <tr><td>District</td> 	<td><input type="text" name="District" 		placeholder="eg. Kabol"size="30"></td></tr>
						        <tr><td>Population</td> <td><input type="text" name="Population" 	placeholder="eg. 1780000"	size="30"></td></tr>
						        <tr><td class="button"><input type="submit" name="submit"></td></tr>
					        </table>
						</form>
					</div>
  				</div>
			</div>

			<!-- Query Record Button -->
  			<div id="id02" class="w3-modal">
    			<div class="w3-modal-content">
      				<div class="w3-container">
        				<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							<form action="query/query.php" method="post">
								<table>
									<tr><td>ID</td> 		<td><input type="text" name="ID" 			value="_"	size="30"></td></tr>
									<tr><td>Name</td> 		<td><input type="text" name="Name" 			value="_"	size="30"></td></tr>
							        <tr><td>CountryCode</td><td><input type="text" name="CountryCode" 	value="_"	size="30"></td></tr>
							        <tr><td>District</td> 	<td><input type="text" name="District" 		value="_"	size="30"></td></tr>
							        <tr><td>Population</td> <td><input type="text" name="Population" 	value="_"	size="30"></td></tr>
							        <tr><td class="button"><input type="submit" name="submit"></td></tr>
						        </table>
							</form>
						</div>
    				</div>
  			</div>
		</div>

		<?php $conn-> close(); ?>
	</body>

</html>