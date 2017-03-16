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
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="js/jquery-paginate.js"></script>
    <script src="js/CBGcontroller.js"></script>
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
            <div class="row">
                <!-- MENU -->
                <div class="three columns" ><button onclick="dzien('wczoraj');">Wczoraj</button></div>
                <div class="three columns" ><button onclick="dzien('dzisiaj');">Dzisiaj</button></div>
                <div class="three columns" ><input type="date" class="button" id="data"/></div>
                <div class="three columns" > <button onclick="szukaj();" class="button-primary">Szukaj</button> </div>
            </div>
            <div class="row" id="tabela">
                <table class="u-full-width" id="CBG">
                    <thead><tr><th>Lp.</th><th>Autor</th><th>Data</th></tr></thead>
                    <tbody id="bodyTable">
                        <?php
                            require_once "connect.php";
                            @$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                            @$polaczenie->set_charset("utf8");
                            @$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
                            if($polaczenie->connect_errno!=0){
                                echo "Error: ".$polaczenie->connect_errno;
                            } else {
                                $rezultat = $polaczenie->query("SELECT * FROM `Cobylograne` WHERE 1");
                                $ilosc = $rezultat->num_rows;
                                $lp = 0;
                                for($i=0;$i<$ilosc;$i++) {
                                    $lp++;
                                    $wiersz = $rezultat->fetch_assoc();
                                        $Autor = $wiersz['NazwaPios'];
                                        $Data = $wiersz['Data'];
                                        $Godzina = $wiersz['Godzina'];
                                    $AllData = $Data." ".$Godzina;
                                    echo '<tr><td>'.$lp.'</td><td>'.$Autor.'</td><td>'.$AllData.'</td></tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <script>
                    $(function () {
                        $('#CBG').paginate({ limit: 10 });
                    });
                </script>
            </div>
        </div>
    </div>
    <footer id="footer">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
</body>
</html>
