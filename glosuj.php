<?php
session_start();
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
$IDM = $_POST['tytul'];
if($IDM != ""){
    $info = $polaczenie->query("SELECT * FROM `muzyka` WHERE `ID`='".$IDM."' ");
    $wiersz = $info->fetch_assoc();
        $Autor = $wiersz['Autor'];
        $Tytul = $wiersz['Tytul'];
        $Pkt = $wiersz['Pkt'];
        $PktMiech = $wiersz['PktMiech'];
    $Nazwa = $Autor." - ".$Tytul;
    $IP = $_SERVER['REMOTE_ADDR'];
    //SPRAWDZANIE CZY KTOŚ Z TEGO IP JUŻ NIE GŁOSOWAŁ
    $rezultat1 = $polaczenie->query("SELECT * FROM `glosy` WHERE `Nazwa`='".$Nazwa."' AND `IP`='".$IP."';");
    $ilosc1 = $rezultat1->num_rows;
    if($ilosc1 != 0){
        unset($_SESSION['oddalesGlosP']);
        $_SESSION['oddalesGlos'] = 1;
    } else {
        unset($_SESSION['oddalesGlos']);
        $_SESSION['oddalesGlosP'] = 1;
        //WPIS DO BAZY DANYCH
        mysqli_query($polaczenie, "INSERT INTO `glosy`(`Nazwa`, `IP`) VALUES ('{$Nazwa}', '{$IP}')");
        $Pkt++;
        $PktMiech++;
        mysqli_query($polaczenie, "UPDATE `muzyka` SET `Pkt`='".$Pkt."', `PktMiech`='".$PktMiech."' WHERE `Tytul`='".$Tytul."';");
        //LOGI
        $Data = date("Y.m.d H:i:s");
        $IP = $_SERVER['REMOTE_ADDR'];
        mysqli_query($polaczenie, "INSERT INTO `logi`(`IP`, `Login`, `Data`, `Czynnosc`) VALUES ('{$IP}', '{$login}', '{$Data}','Głosowanie')");
    }
}
header('Location: index.php');
?>
