<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Strona główna</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="panelAdmin.css">
    <link rel="stylesheet" href="loader.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/loginModalClosing.js"></script>
    <script src="js/loader.js"></script>
</head>
<body onload="timeOut();">
    <div id="loader"></div>
    <div class="container">
        <div class="row" id="header">
            <div class="twelve columns"><a href="index.php" class="noLink"><h1>Radio MIX</h1></a></div>
        </div>
        <div class="row" id="content" style="margin-top: 4%;">
            <div class="twelve columns">
            <?php
                if(!isset($_SESSION['AdminLogin'])){
                    //Wyświetlanie panelu logowania
                    ?>
                    <div id="LoginPopup">
                        <div id="imgUP">
                            <img src="images/user.ico" id="loginImg" height="200px"/>
                        </div>
                        <div id="contentForm">
                            <form action="zaloguj.php" method="post">
                                <span><b>Login:</b></span><br>
                                <input type="text" name="login" placeholder="Wpisz login" required/> <br>
                                <span><b>Hasło:</b></span><br>
                                <input type="password" name="haslo" placeholder="Wpisz hasło" required/> <br>
                                <input type="submit" class="button-primary" name="Zaloguj" value="Zaloguj"/>
                            </form>
                        </div>
                    </div>
                    <script>openModal();</script>
                    <?php
                } else {
                    // Panel Admin
                    include "panelAdminContent.php";
                }
            ?>
            </div>
        </div>
    </div>
    <footer id="footer" style="position: absolute;">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
</body>
</html>
