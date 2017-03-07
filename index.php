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
        <div class="row" id="content">
            <div class="six columns">
                <h2>Top 5 miesiąca</h2>
                <table class="u-full-width">
                    <thead>
                        <tr><th>Lp.</th><th>Tytuł</th><th>Pkt.</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1.</td><td>Cypis - Nie spać</td><td>120pkt</td></tr>
                        <tr><td>2.</td><td>Alan Farben - Tuesday</td><td>100pkt</td></tr>
                        <tr><td>3.</td><td>Slayback - She Sexy</td><td>80pkt</td></tr>
                        <tr><td>4.</td><td>ZHU - In the Morning</td><td>60pkt</td></tr>
                        <tr><td>5.</td><td>Eurythmics - Sweet Dreams</td><td>40pkt</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="six columns" style="text-align: center; height: 200px; margin-top: 11%;">
                <form action="#" method="post">
                    <div class="row"><input class="u-full-width" type="text" name="tytul" placeholder="Tutaj wpisz tytuł"/></div>
                    <div class="row"><div class="twelve columns"><input type="submit" name="szukaj" value="szukaj"/></div></div>
                </form>
            </div>
        </div>
        <div class="row"><div class="twelve columns" style="text-align: center;"><img src="http://zspklodawa.org/images/foto/logo2.png" width="350px"/></div></div>
    </div>
    <footer id="footer" style="max-width: 100%; margin-top: 10%;">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
    <div id="snackbar"><span id="tekst"></span></div>
    <?php
    if(isset($_SESSION['blad'])){
        ?><script>openSnackbar();</script><?php
    } else if(isset($_SESSION['bladU'])){
        ?><script>openSnackbarU();</script><?php
    }
    ?>
</body>
</html>
