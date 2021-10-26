<html>
    <head>
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/rps.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "css/stylerps.css"/>
        <?php  include 'nav.php' ?>
    </head>
    <body>
        
        <div id="main">
            Rock, Paper, Scissors<br>

            
            <div id="user" class="disp">
                <div class="choice">
                    You Chose:
                    <div></div>
                </div>
                <div class="select">
                    <img src="css/rock.png" class = "option" name="rock" id = "rock"/>
                    <img src="css/paper.png" class = "option" name="paper" id = "paper"/>
                    <img src="css/scissors.png" class = "option" name="scissors" id = "scissors"/>
                </div>
            </div>
            <div id="result">
                <div id="decl">Play Now!</div>
                <div id="score">
                    <div id="yourWin">0</div>
                    <div id="compWin">0</div>
                </div>
            </div>
            <div id="comp" class="disp">
                <div class="choice">
                    Computer Chose:
                </div>      
                <div class="select">
                <img src="css/gears.gif">
                </div>

            </div>
        </div>
        
    </body>
</html>