<?php
session_start();

require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
$polaczenie->set_charset("utf8");
$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if ($polaczenie->connect_errno!=0){
    echo "Error: ".$polaczenie->connect_errno;
}else{
    //ZMIENNE
    $Kategoria="";
    //POBRANIE ZMIENNYCH
    $AutorS = $_POST['autor'];
    $TytulS = $_POST['tytul'];
    @$Kategoria = $_POST['Kategoria'];
    //KONWERSJA ZNAKÓW
    $Autor = mb_convert_case($AutorS, MB_CASE_TITLE, "UTF-8");
    $Tytul = mb_convert_case($TytulS, MB_CASE_TITLE, "UTF-8");
    //USUWANIE ZNAKÓW SPECJLANYCH
    $Autor = htmlentities($Autor, ENT_QUOTES, "UTF-8");
    $Tytul = htmlentities($Tytul, ENT_QUOTES, "UTF-8");
    //SPRAWDZENIE CZY JEST W BAZIE
    $rezultat = $polaczenie->query("SELECT * FROM `Muzyka` WHERE `Autor`='".$Autor."' AND `Tytul`='".$Tytul."';");
    $ilosc = $rezultat->num_rows;
    if($ilosc == 0){
        //DODAWANIE DO BAZY DANYCH
        mysqli_query($polaczenie, "INSERT INTO `Muzyka` (`Autor`,`Tytul`,`Kategoria`,`Pkt`,`PktMiech`) VALUES ('{$Autor}','{$Tytul}','{$Kategoria}','0','0');");
        //KOMUNIKAT
        $_SESSION['dodane'] = 1;
        unset($_SESSION['bladM']);
        @header('Location: panelAdmin.php');
    }else{
        $_SESSION['bladM'] = 1;
        unset($_SESSION['dodane']);
        @header('Location: panelAdmin.php');
    }
}
?>
