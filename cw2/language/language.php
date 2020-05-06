<!DOCTYPE html>
<html>
<style type="text/css">
	body{background-color: grey;}
</style>
	<head>
		<title>Language Database</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="../main.css">
		<link rel="stylesheet" type="text/css" href="style.css">
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
		  	<a href="../country/country.php">Country</a>
		  	<a href="language.php">Language</a>
		  	<a href="https://www.nottingham.edu.my/CorporateMarketing/Services/Service-Details/University-website.aspx" style="padding: 0px 0px"> <img src="../NOTT.png" height="50" width="50"></a>
		</div>

		<div class="main">
			<h2 class="lang_title">Language</h2>

			<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-dark-grey">Insert Record</button>

			<div id="id01" class="w3-modal">
		    	<div class="w3-modal-content">
		      		<div class="w3-container" style="background-color:grey;padding-top: 15px;">
		        		<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
						<form action="insert/insert_update.php" method="post">
							<table>
								<tr><td>CountryCode</td><td><input type="text" name="CountryCode" 	placeholder="eg. ABW"	size="30"></td></tr>
								<tr><td>Language</td> 	<td><input type="text" name="Language" 		placeholder="eg. Dutch"	size="30"></td></tr>
						        <tr><td>IsOfficial</td>	<td><input type="text" name="IsOfficial" 	placeholder="eg. T"		size="30"></td></tr>
						        <tr><td>Percentage</td> <td><input type="text" name="Percentage" 	placeholder="eg. 5.3"	size="30"></td></tr>
						        <tr><td class="button"><input type="submit" name="submit"></td></tr>
					        </table>
						</form>
					</div>
  				</div>
			</div>


			<button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-dark-grey">Query Record</button>

  			<div id="id02" class="w3-modal">
    			<div class="w3-modal-content">
      				<div class="w3-container" style="background-color:grey;padding-top: 15px;" >
        				<span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
							<form action="query/query.php" method="post">
								<table>
									<tr><td>CountryCode</td><td><input type="text" name="CountryCode" 	value="_"	size="30"></td></tr>
									<tr><td>Language</td> 	<td><input type="text" name="Language" 		value="_"	size="30"></td></tr>
							        <tr><td>IsOfficial</td>	<td><input type="text" name="IsOfficial" 	value="_"	size="30"></td></tr>
							        <tr><td>Percentage</td> <td><input type="text" name="Percentage" 	value="_"	size="30"></td></tr>
							        <tr><td class="button"><input type="submit" name="submit"></td></tr>
						        </table>
							</form>
						</div>
    				</div>
  			</div>

			<!-- Start table -->
			<div class="langtable">
				<table>
					<tr>
						<th>CountryCode</th>
						<th>Language</th>
						<th>IsOfficial</th>
						<th>Percentage</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>

					<?php
					$sql = "SELECT CountryCode, Language, IsOfficial, Percentage FROM LANG";

					mysqli_set_charset($conn,"utf8");

					$result = mysqli_query($conn, $sql);
		
					while($row = mysqli_fetch_array($result)):
					?>

					<tr>
						<td><?php echo $row['CountryCode']; ?></td>
						<td><?php echo $row['Language']; ?></td>
						<td><?php echo $row['IsOfficial']; ?></td>
						<td><?php echo $row['Percentage']; ?></td>
						<td class="edit">
		    				<form action='edit/edit.php' method="post">
		    					<div class="langedit">
		        					<input type="hidden" name="CountryCode" value="<?php echo $row['CountryCode'];?>">
		        					<input type="hidden" name="Language" 	value="<?php echo $row['Language'];?>">
		        					<input type="submit" name="submit" value="Edit">
		        				</div>
		    				</form>
						</td>
						<td class="delete">
		  	  				<form action='delete/delete.php' method="post">
		  	  					<div class="langedit">
		        					<input type="hidden" name="CountryCode" value="<?php echo $row['CountryCode'];?>">
		        					<input type="hidden" name="Language" 	value="<?php echo $row['Language'];?>">
		        					<input type="submit" name="submit" value="Delete">
			        			</div>
		    				</form>
						</td>
					</tr>

				<?php endwhile; ?>
				</table>
			</div>
		</div>

		<?php $conn-> close(); ?>
	</body>

</html>