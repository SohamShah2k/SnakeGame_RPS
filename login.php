
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="css/stylelogin.css">
    <script>
        function okb(){
            document.getElementById("error").style.display="none";
        }    

    </script>

    <?php
        $message="";

        function er($Msg){
            $_SESSION["error"] =$Msg;
            echo $Msg;
            header('Location: '. $_SERVER['HTTP_REFERER']);
            exit();
        }
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            if($_POST['submit']=='login'){
                // echo 'login';
                include_once "connection.php";
                // echo $_POST["username"];
                // echo$_POST["password"];
                $result = $conn->query("SELECT * FROM user WHERE userName='".$_POST["username"]."' and pass = '".$_POST["password"]."'") or die(er("Invalid Username/Password"));
                $row  = mysqli_fetch_array($result);
                if(is_array($row)) {
                    // echo $row['pass'];
                    // echo $row['userName'];
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["userName"] = $row['userName'];
                    $_SESSION['img_dir'] = $row['img_dir'];
                }
                else {
                er("Invalid Username/Password!");
                }
            }
            elseif($_POST['submit']=='register'){
                if($_POST["password"]==$_POST["password2"]){
                    // echo 'registring';
                    include_once "connection.php";
                    // echo $_POST["username"];
                    $dir = array("myRadio1"=>"css/img1.jpg",
                                 "myRadio2"=>"css/img2.jpg",
                                 "myRadio3"=>"css/img3.jpg",
                                 "myRadio4"=>"css/img4.jpg");
                    // echo $_POST["checkbox"];
                    $selected = $_POST["radio"];   
                    // echo $dir[$selected];          
                    // echo $_POST["email"];
                    // echo $_POST["password"];
                    // echo $_POST["password2"];
                    $conn->query(sprintf("INSERT INTO `user`(`userName`, `email`, `pass`,`img_dir`) VALUES ('%s','%s','%s','%s')",$_POST["username"],$_POST['email'],$_POST['password'],$dir[$selected])) or die(er($conn -> error));
                    $result = $conn->query("SELECT * FROM user WHERE userName='".$_POST["username"]."' and pass = '".$_POST["password"]."'") or die(er($conn -> error));
                    $row  = mysqli_fetch_array($result);
                    if(is_array($row)) {
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["userName"] = $row['userName'];
                        $_SESSION['img_dir'] = $row['img_dir'];
                    }
                    else {
                    er("Invalid Username or Password!");
                    }
                }
                else{
                    er("passwords don't match");
                }
                
            }

            if(isset($_SESSION["id"])) {
                print_r($_SESSION);
                header('Location: dash.php');
                exit();
            }
            
        }
    ?>
</head>
<body>
    <?php include "nav.php"?>
    <div id="main">
        <div class="left">
            <h1>Login.</h1>
            <form  method="post" >
                <input type="text" name="username" placeholder="Username" />
                <br>
                <input type="password" name="password" placeholder="Password" />
                
                
                <input type="submit" class="login_submit" name="submit" value="login" />
            </form>
        </div>
    
        <div class="right">
            <h1>Register Now!</h1>
            <form  method = 'post'>
                <input type="text" name="username" placeholder="Username" required/>
                <input type="email" name="email" placeholder="E-mail" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="password" name="password2" placeholder="Retype password" required/>
                <label> Select Your Profile Image</label>    
                <ul>
                <input name="radio" value="0" type="hidden"  required>
                    <li>
                        <input type="radio" name="radio"  value="myRadio1"  id = "myRadio1" checked/>
                        <label for="myRadio1"><img src="css/img1.jpg" /></label>
                    </li>
                    <li>

                        <input type="radio" name="radio"  value="myRadio2"  id = "myRadio2"/>
                        <label for="myRadio2"><img src="css/img2.jpg" /></label>
                    </li>
                    <li>

                        <input type="radio"  name="radio"  value="myRadio3"  id = "myRadio3"/>
                        <label for="myRadio3"><img src="css/img3.jpg" /></label>
                    </li>
                    <li>
                        <input type="radio"  name="radio" value="myRadio4" id = "myRadio4"/>
                        <label for="myRadio4"><img src="css/img4.jpg" /></label>
                    </li>
                    
                </ul>
                <input type="submit" class="regi_submit" name="submit" value="register" />
            </form>
    </div>
    <div class="or">OR</div>
    </div>
    <div id="error" style="display: <?php   
        if(isset($_SESSION["error"])) {
            echo "block;";
        }  
        ?>">
        <div id="errImg"></div>
        <p id='errMsg'><?php   
        if(isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }  ?></p>
        <input type="submit" value="ok" onclick="okb();">
    </div>
    
</body>
</html>
