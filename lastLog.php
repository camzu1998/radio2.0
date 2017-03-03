<?php
    require_once "connect.php";
    @$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    @$polaczenie->set_charset("utf8");
    @$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    } else {
        $rezultat = $polaczenie->query("SELECT * FROM `logi` ORDER BY `logi`.`ID` DESC");
        $wiersz = $rezultat->fetch_array();
            $Login = $wiersz['Login'];
            $Czynnosc = $wiersz['Czynnosc'];
            $Data = $wiersz['Data'];
        echo $Login." ".$Czynnosc." ".$Data;
    }
?>
