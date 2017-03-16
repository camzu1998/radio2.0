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
    <link rel="stylesheet" href="css/musicList.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="js/jquery-paginate.js"></script>
</head>
<body>
    <div class="container">
        <div class="row" id="header">
            <div class="twelve columns"><a href="index.php" class="noLink"><h1>Radio MIX</h1></a></div>
        </div>
        <div class="row" id="menu">
            <?php include"menu.php" ?>
        </div>
        <div class="row" id="middle">
            <form action="#" method="post" style="text-align: center; margin-top: 4%;">
                <input type="text" id="szukajka" oninput="w3.filterHTML('#utwory', '.item', this.value)" name="search" placeholder="Szukaj..">
                <div class="row" id="content" style="margin-top: 0% !important;">
                    <div class="twelve columns" id="center">
                        <?php
                        require_once "connect.php";
                        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
                        $polaczenie->set_charset("utf8");
                        $polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
                        if ($polaczenie->connect_errno!=0){
                            echo "Error: ".$polaczenie->connect_errno;
                        }else{ ?>
                        <table id="utwory">
                            <thead><tr><th></th><th>Lp.</th><th>Autor</th><th>Tytuł</th></tr></thead>
                            <tbody>
                            <?php
                            $lp=1;
                            $rezultat = $polaczenie->query("SELECT * FROM `Muzyka` WHERE 1");
                            for($i=0;$i<$rezultat->num_rows;$i++){
                                $wiersz = $rezultat->fetch_assoc();
                                    $ID = $wiersz['ID'];
                                    $Autor = $wiersz['Autor'];
                                    $Tytul = $wiersz['Tytul'];
                                echo '<tr class="item">';
                                echo '<td><input type="radio" name="tytul" value='.$ID.'/></td><td>'.$lp.'</td><td>'.$Autor.'</td><td>'.$Tytul.'</td>';
                                echo '</tr>';
                                $lp++;
                            }
                        }?>
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                $('#utwory').paginate({ limit: 10 });
                            });
                        </script>
                        <!-- Button do wysłania -->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer id="footer">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
</body>
</html>
