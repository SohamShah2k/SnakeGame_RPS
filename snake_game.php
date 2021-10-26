<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Snake Game</title>

		<link rel = "stylesheet" type = "text/css" href = "css/stylesnake.css"/>
		<meta charset = "UTF-=8" name = "viewport" content = "width=device-width, initial-scale=1"/>
		<script src = "js/jquery-3.6.0.js" ></script>
		<script src = "js/snake_game.js"></script>
		<?php
			session_start();
			if(isset($_SESSION['id'])){
				// echo print_r($_SESSION);
				if($_SERVER["REQUEST_METHOD"] == "POST") {
					if($_POST['submit']=='Play'){
						if(!isset($_POST['points']));
						elseif($_POST['points']==0);
						else{
							include_once "connection.php";
							$conn->query(sprintf("INSERT INTO `score`(`id`,`name`, `scored`) VALUES ('%s','%s','%s')",$_SESSION['id'],$_SESSION['userName'],$_POST['points'])) or die($conn -> error);
						}
					}
				}
			}
		?>
	
	</head>

<body>
	<?php include "nav.php"?>

	<div id = "main">	
		<section class="modul">
		
		
			<div class="start pregame">
				<form method="post">	
					<div class="your_score">
							Your Score:
						<p  id ="score"> <?php
						if(isset($_POST['points'])){ 
							echo $_POST['points'];
						}else{
							echo '0';
						}
							?> <p>
						<input type="text" name ="points" id ="scoreh" style="display:none;"/> 
					</div>
				
					<div class="diff">
						<select id="dif">
							<option value="200">Easy</option>
							<option value="50">Medium</option>
							<option value="20">Difficult</option>
							<option value="10">Insane</option>
							
						</select>
					</div>
					<input type="button" value="Play Snake" name="submit" id="com"/>
					<input type="submit" value="Play" name="submit" id="hid" style="display:none;"/>
				</form>
			</div>
		</section>
		<center>
			<canvas id = "canvas" height = "450px" width = "700px"></canvas>
		</center>
	</div>		
	
</body>	

</html>