<?php
session_start();
require_once "connect.php";
@$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if($polaczenie->connect_errno!=0){
    echo "Error: ".$polaczenie->connect_errno;
} else {
    $tryb = $_REQUEST['Tryb'];
    if($tryb == "ostatni"){
        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `Status`='0'");
        $wiersz = $rezultat->fetch_array();
            $_SESSION['IDpios'] = $wiersz['ID'];
        echo "ID propozycji:".$wiersz['ID'].'<br>';
        echo "Autor: <span id='autor'>".$wiersz['Autor'].'</span><br>';
        echo "Tytuł: <span id='tytul'>".$wiersz['Tytul'].'</span><br>';
        echo 'Link: <a href="'.$wiersz['Link'].'">'.$wiersz['Link'].'</a><br>';
        echo 'Status: oczekuje <br>';
        echo 'IP: <span id="ip">'.$wiersz['IP'].'</span><br>';
    } else if($tryb == "ban"){
        $ID = $_SESSION['IDpios'];
        $login = $_SESSION['login'];
        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `ID`='{$ID}'");
        $wiersz = $rezultat->fetch_array();
            $IP = $wiersz['IP'];
        $Data = date("Y.m.d H:i:s");
        $info = "Ban IP: ".$IP;
        mysqli_query($polaczenie, "UPDATE `waszeprop` SET `Status`='2' WHERE `ID`='{$ID}'");
        mysqli_query($polaczenie, "INSERT INTO `ban`(`IP`, `Data`) VALUES ('{$IP}','{$Data}')");
        $IP = $_SERVER['REMOTE_ADDR'];
        mysqli_query($polaczenie, "INSERT INTO `logi`(`IP`, `Login`, `Data`,`Czynnosc`) VALUES ('{$IP}','{$login}','{$Data}','{$info}')");

        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `Status`='0'");
        $wiersz = $rezultat->fetch_array();
            $_SESSION['IDpios'] = $wiersz['ID'];
        echo "ID propozycji:".$wiersz['ID'].'<br>';
        echo "Autor: <span id='autor'>".$wiersz['Autor'].'</span><br>';
        echo "Tytuł: <span id='tytul'>".$wiersz['Tytul'].'</span><br>';
        echo 'Link: <a href="'.$wiersz['Link'].'">'.$wiersz['Link'].'</a><br>';
        echo 'Status: oczekuje <br>';
        echo 'IP: <span id="ip">'.$wiersz['IP'].'</span><br>';
        $_SESSION['zbanowano'] = 1;
    } else if($tryb == "przyjeta") {
        $ID = $_SESSION['IDpios'];
        $login = $_SESSION['login'];
        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `ID`='{$ID}'");
        $wiersz = $rezultat->fetch_array();
            $IP = $wiersz['IP'];
            $Autor = $wiersz['Autor'];
            $Tytul = $wiersz['Tytul'];
        $Kategoria = "";
        $Data = date("Y.m.d H:i:s");
        $info = "Przyjęto piosenke ID: ".$ID;
        mysqli_query($polaczenie, "UPDATE `waszeprop` SET `Status`='1' WHERE `ID`='{$ID}'");
        mysqli_query($polaczenie, "INSERT INTO `logi`(`IP`, `Login`, `Data`,`Czynnosc`) VALUES ('{$IP}','{$login}','{$Data}','{$info}')");
        mysqli_query($polaczenie, "INSERT INTO `muzyka` (`Autor`,`Tytul`,`Kategoria`,`Pkt`,`PktMiech`) VALUES ('{$Autor}','{$Tytul}','{$Kategoria}','0','0');");

        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `Status`='0'");
        $wiersz = $rezultat->fetch_array();
            $_SESSION['IDpios'] = $wiersz['ID'];
        echo "ID propozycji:".$wiersz['ID'].'<br>';
        echo "Autor: <span id='autor'>".$wiersz['Autor'].'</span><br>';
        echo "Tytuł: <span id='tytul'>".$wiersz['Tytul'].'</span><br>';
        echo 'Link: <a href="'.$wiersz['Link'].'">'.$wiersz['Link'].'</a><br>';
        echo 'Status: oczekuje <br>';
        echo 'IP: <span id="ip">'.$wiersz['IP'].'</span><br>';
        $_SESSION['dodano'] = 1;
    } else if($tryb == "odrzucona") {
        $ID = $_SESSION['IDpios'];
        $login = $_SESSION['login'];
        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `ID`='{$ID}'");
        $wiersz = $rezultat->fetch_array();
            $IP = $wiersz['IP'];
        $Data = date("Y.m.d H:i:s");
        $info = "Odrzucono piosenke ID: ".$ID;
        mysqli_query($polaczenie, "UPDATE `waszeprop` SET `Status`='3' WHERE `ID`='{$ID}'");
        mysqli_query($polaczenie, "INSERT INTO `logi`(`IP`, `Login`, `Data`,`Czynnosc`) VALUES ('{$IP}','{$login}','{$Data}','{$info}')");

        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `Status`='0'");
        $wiersz = $rezultat->fetch_array();
            $_SESSION['IDpios'] = $wiersz['ID'];
        echo "ID propozycji:".$wiersz['ID'].'<br>';
        echo "Autor: <span id='autor'>".$wiersz['Autor'].'</span><br>';
        echo "Tytuł: <span id='tytul'>".$wiersz['Tytul'].'</span><br>';
        echo 'Link: <a href="'.$wiersz['Link'].'">'.$wiersz['Link'].'</a><br>';
        echo 'Status: oczekuje <br>';
        echo 'IP: <span id="ip">'.$wiersz['IP'].'</span><br>';
        $_SESSION['odrzucono'] = 1;
    } else if($tryb == "szukajka") {
        $ID = $_REQUEST['szukaj'];
        $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `ID`='{$ID}'");
        $wiersz = $rezultat->fetch_array();
            $_SESSION['IDpios'] = $wiersz['ID'];
        echo "ID propozycji:".$wiersz['ID'].'<br>';
        echo "Autor: <span id='autor'>".$wiersz['Autor'].'</span><br>';
        echo "Tytuł: <span id='tytul'>".$wiersz['Tytul'].'</span><br>';
        echo 'Link: <a href="'.$wiersz['Link'].'">'.$wiersz['Link'].'</a><br>';
        echo 'Status: oczekuje <br>';
        echo 'IP: <span id="ip">'.$wiersz['IP'].'</span><br>';
    }
}
?>
