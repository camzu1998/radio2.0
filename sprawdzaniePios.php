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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/panelAdmin.css">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/snackbar.css">
    <link rel="stylesheet" href="css/musicList.css">
    <link rel="stylesheet" href="css/sprawdzaniePios.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/loginModalClosing.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/snackbar.js"></script>
    <script src="js/sprawdzaniePiosController.js"></script>
</head>
<body onload="timeOut();">
    <div class="container">
        <div id="loader"></div>
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
                        <img src="images/user.ico" id="loginImg"/>
                    </div>
                    <div id="contentForm" style="margin-top: 5%;padding-bottom: 6%;" >
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
                    include"sprawdzaniePiosCon.php";
                }
                ?>
            </div>
        </div>
    </div>
    <footer id="footer">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
    <div id="snackbar"><span id="tekst"></span></div>
    <?php
    if(isset($_SESSION['zbanowano'])){
        ?><script>openSnackbarBAN();</script><?php
    } else if(isset($_SESSION['dodano'])){
        ?><script>openSnackbarDM();</script><?php
    } else if(isset($_SESSION['odrzucono'])) {
        ?><script>openSnackbarOdrzucono();</script><?php
    }
    unset($_SESSION['zbanowano']);
    unset($_SESSION['dodano']);
    unset($_SESSION['odrzucono']);
    ?>
</body>
</html>
