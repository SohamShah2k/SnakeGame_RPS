<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type = "text/css" href="css/stylenav.css">
    <?php    
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <script src = "js/jquery-3.6.0.js" ></script>
	<script src = "js/nav.js"></script>

</head>
<body>
    <header>
    <nav>
        <div id="nav1">
            <div id="logo"></div>
            <div id="profile"> 
                <div id="img" style="background-image: url('<?php if(isset($_SESSION["userName"])){
                        echo $_SESSION["img_dir"];
                    }
                        else{
                            echo "css/img0.jpg";
                            }?>')"></div>
                <div class="dropdown">
                    <button class="dropbtn"><?php if(isset($_SESSION["userName"])){
                        echo $_SESSION["userName"];
                    }
                        else{
                            echo "Login";
                            }
                        ?></button>
                    <div class="dropdown-content">
                    <a href="login.php">login</a>
                    <a href="logout.php">log Out</a>
                    <a href="dash.php">home</a>
                    <a href="highScore.php">High Score</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="nav2">
            <div id="logo"></div>
            <div id="profile"  class=" dropdown"> 
            <div id="img" style="background-image: url('<?php if(isset($_SESSION["userName"])){
                        echo $_SESSION["img_dir"];
                    }
                        else{
                            echo "css/img0.jpg";
                            }?>')"></div>
                
                <div class="dropdown-content">
                <a href="login.php">login</a>
                    <a href="logout.php">log Out</a>
                    <a href="dash.php">home</a>
                    <a href="highScore.php">High Score</a>
                    </div>
            </div>

        </div>
    </nav>
    
    

</body>
</html>