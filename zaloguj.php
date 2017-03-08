<?php
session_start();
if((!isset($_POST['login'])) || (!isset($_POST['haslo']))) {
    header('Location: panelAdmin.php');
    exit();
}
require_once "connect.php";
@$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if($polaczenie->connect_errno!=0){
    echo "Error: ".$polaczenie->connect_errno;
} else {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo_hash = hash("sha256", $_POST['haslo']);
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo_hash, ENT_QUOTES, "UTF-8");
    if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM `czytelnicy` WHERE login='%s' AND haslo='%s'", mysqli_real_escape_string($polaczenie,$login), mysqli_real_escape_string($polaczenie,$haslo_hash)))){
        $iluUserow = $rezultat->num_rows;
        if($iluUserow > 0){
            $wiersz = $rezultat->fetch_assoc();
                $_SESSION['ID'] = $wiersz['ID'];
                $_SESSION['login'] = $wiersz['login'];
                $_SESSION['Imie'] = $wiersz['Imie'];
                $_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
                $_SESSION['Admin'] = $wiersz['Admin'];
            if($_SESSION['Admin'] != 0){
                $_SESSION['AdminLogin'] = 1;
                unset($_SESSION['blad']);
                $Data = date("Y.m.d H:i:s");
                $IP = $_SERVER['REMOTE_ADDR'];
                mysqli_query($polaczenie, "INSERT INTO `logi`(`IP`, `Login`, `Data`, `Czynnosc`) VALUES ('{$IP}', '{$login}', '{$Data}','Logowanie')");
                $rezultat->free_result();
                header('Location: panelAdmin.php');
            } else {
                $_SESSION['bladU'] = 1;
                header('Location: index.php');
            }
        } else {
            $_SESSION['blad'] = 1;
            header('Location: index.php');
        }
    }
    $polaczenie->close();
}
?>
