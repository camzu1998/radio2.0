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
    <script src="js/terazGraneController.js"></script>
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
                        <tr><th>Lp.</th><th>Autor</th><th>Tytuł</th><th>Pkt.</th></tr>
                    </thead>
                    <tbody>
                    <?php
                        require_once "connect.php";
                        @$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                        @$polaczenie->set_charset("utf8");
                        @$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
                        if($polaczenie->connect_errno!=0){
                            echo "Error: ".$polaczenie->connect_errno;
                        } else {
                            $lp=0;
                            $rezultat = $polaczenie->query("SELECT * FROM `muzyka` WHERE 1 ORDER BY `PktMiech` DESC LIMIT 0,5");
                            $ilosc = $rezultat->num_rows;
                            for($i=0;$i<$ilosc;$i++){
                                $wiersz = $rezultat->fetch_assoc();
                                    $Autor = $wiersz['Autor'];
                                    $Tytul = $wiersz['Tytul'];
                                    $PktMiech = $wiersz['PktMiech'];
                                $lp++;
                                echo'<tr>';
                                echo'<td>'.$lp.'</td><td>'.$Autor.'</td><td>'.$Tytul.'</td><td>'.$PktMiech.'</td>';
                                echo'</tr>';
                            }
                            $rezultatI = $polaczenie->query("SELECT * FROM `muzyka` WHERE 1");
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="six columns">
                <span id="coJest"><h2 id="coJestTxt" style="line-height: 5;">Teraz grane: ---</h2></span>
                <span id="coJest"><h3> Aktualna ilość piosenek w bazie: <?php echo $rezultatI->num_rows; ?></h3></span>
                <script>terazGrane();</script>
            </div>
        </div>
        <div class="row">
            <div class="twelve columns" style="text-align: center;">
                <img src="http://zspklodawa.org/images/foto/logo2.png" id="obrazek" width="300px"/>
            </div>
        </div>
    </div>
    <footer id="footer">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
    <div id="snackbar"><span id="tekst"></span></div>
    <?php
    if(isset($_SESSION['blad'])){
        ?><script>openSnackbar();</script><?php
    } else if(isset($_SESSION['bladU'])){
        ?><script>openSnackbarU();</script><?php
    } else if(isset($_SESSION['oddalesGlos'])) {
        ?><script>openSnackbarGlos();</script><?php
    } else if(isset($_SESSION['oddalesGlosP'])) {
        ?><script>openSnackbarGlosP();</script><?php
    } else if(isset($_SESSION['bladMuzyka'])) {
        ?><script>openSnackbarbladMuzyka();</script><?php
    } else if(isset($_SESSION['bladWasze'])) {
        ?><script>openSnackbarbladWasze();</script><?php
    } else if(isset($_SESSION['bladWaszeL'])) {
        ?><script>openSnackbarbladWaszeL();</script><?php
    } else if(isset($_SESSION['dodanoWasze'])) {
        ?><script>openSnackbardodanoWasze();</script><?php
    } else if(isset($_SESSION['IPBAN'])) {
        ?><script>openSnackbarIPBAN();</script><?php
    }
    unset($_SESSION['blad']);
    unset($_SESSION['bladU']);
    unset($_SESSION['oddalesGlos']);
    unset($_SESSION['oddalesGlosP']);
    unset($_SESSION['bladMuzyka']);
    unset($_SESSION['bladWasze']);
    unset($_SESSION['bladWaszeL']);
    unset($_SESSION['dodanoWasze']);
    unset($_SESSION['IPBAN']);
    ?>
</body>
</html>
