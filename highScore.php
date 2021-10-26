<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Snake Game</title>

        <link rel="stylesheet" type = "text/css" href="css/styleHighScore.css">
		<meta charset = "UTF-=8" name = "viewport" content = "width=device-width, initial-scale=1"/>
		<?php
			session_start();
			include_once "connection.php";
			$str = "SELECT id ,name ,scored FROM score ORDER BY scored DESC LIMIT 5";
			$result = $conn->query($str) or die($conn -> error);
			
		?>
	
	</head>

<body>
	<?php include "nav.php"?>

	<div id = "main">	
			<div id="tableWin">
				<span id='title'>HIGHSCORES</span>
				<table>
					<!-- <tr>
						<th>Pos.</th>
						<th>Player</th>
						<th>Score</th>
					</tr> -->
					<?php
					$pos = 1;
						while ($array = mysqli_fetch_assoc($result))
						{
							echo "<tr> <td>";
							echo $pos; 
							$pos++;
							echo "</td> <td>";
							echo $array['name']; 
							echo "</td> <td>";
							echo $array['scored']; 
							echo "</td> </tr>";
						}
					?>
					
				</table>


			</div>
	</div>		
	
</body>	

</html>