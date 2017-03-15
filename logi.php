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
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="js/jquery-paginate.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/index.css">
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
            <div class="twelve columns">
                 <?php
                    require_once "connect.php";
                    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                    $polaczenie->set_charset("utf8");
                    $polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
                    if ($polaczenie->connect_errno!=0){
                        echo "Error: ".$polaczenie->connect_errno;
                    }else{ ?>
                        <table id="logi">
                            <thead><tr><th>Lp.</th><th>Login</th><th>Czynność</th><th>Data</th><th>IP</th></tr></thead>
                            <tbody>
                            <?php
                            $lp=1;
                            $rezultat = $polaczenie->query("SELECT * FROM `logi` WHERE 1");
                            for($i=0;$i<$rezultat->num_rows;$i++){
                                $wiersz = $rezultat->fetch_assoc();
                                    $ID = $wiersz['ID'];
                                    $IP = $wiersz['IP'];
                                    $Login = $wiersz['Login'];
                                    $Czynnosc = $wiersz['Czynnosc'];
                                    $Data = $wiersz['Data'];
                                echo '<tr class="item">';
                                echo '<td>'.$lp.'</td><td>'.$Login.'</td><td>'.$Czynnosc.'</td><td>'.$Data.'</td><td>'.$IP.'</td>';
                                echo '</tr>';
                                $lp++;
                            }
                        }?>
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                $('#logi').paginate({ limit: 10 });
                            });
                        </script>
            </div>
            <div class="twelve columns" style="text-align:center;"><a href="panelAdmin.php">Wróć</a></div>
        </div>
    </div>
    <footer id="footer" style="max-width: 100%; margin-top: 10%;">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
</body>
</html>
