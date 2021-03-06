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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/snackbar.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/snackbar.css">
</head>
<body>
    <div class="container">
        <div class="row" id="header">
            <div class="twelve columns"><a href="index.php" class="noLink"><h1>Radio MIX</h1></a></div>
        </div>
        <div class="row" id="menu">
            <?php include"menu.php" ?>
        </div>
        <div class="row" style="margin-top: 1%;">
            <h3>Uwaga!</h3>
            <h4>Zabrania się dodawania piosenek w których występują wulgaryzmy, które obrażają religie itd.</h4>
            <h5>W konsekwencji już nigdy więcej nie będziesz mógł dodać piosenki z tego IP.</h5>
            <form action="waszePios.php" method="post" style="text-align: center;">
                <span>Autor</span><br>
                <input type="text" name="Autor" required/><br>
                <span>Tytuł</span><br>
                <input type="text" name="Tytul" required/><br>
                <span>Link do piosenki(Youtube, wrzuta)</span><br>
                <input type="text" name="Link" required/><br>
                <input type="submit" class="button-primary" name="Dodaj" value="Dodaj!"/>
            </form>
        </div>
    </div>
    <footer id="footer">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
</body>
</html>
