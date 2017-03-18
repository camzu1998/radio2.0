<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if ($polaczenie->connect_errno!=0){
echo "Error: ".$polaczenie->connect_errno;
} else {
    if(isset($_POST['Dodaj'])){
        //ZMIENNE
        $AutorS = $_POST['Autor'];
        $TytulS = $_POST['Tytul'];
        $Link = $_POST['Link'];
        $IP = $_SERVER['REMOTE_ADDR'];
        //SPRAWDZANIE CZY NIE ZBANOWANY IP
        $rezultatBan = $polaczenie->query("SELECT * FROM `ban` WHERE `IP`='".$IP."'");
        if($rezultatBan != 0){
            $_SESSION['IPBAN'] = 1;
        } else {
            //KONWERSJA ZNAKÓW
            $AutorS = htmlentities($AutorS, ENT_QUOTES, "UTF-8");
            $TytulS = htmlentities($TytulS, ENT_QUOTES, "UTF-8");
            $Autor = mb_convert_case($AutorS, MB_CASE_TITLE, "UTF-8");
            $Tytul = mb_convert_case($TytulS, MB_CASE_TITLE, "UTF-8");
            //SZUKANIE W BAZIE PODOBNYCH PIOSENEK
            $rezultatMuzyka = $polaczenie->query("SELECT * FROM `Muzyka` WHERE `Autor`='".$Autor."' AND `Tytul`='".$Tytul."';");
            $rezultatWasze = $polaczenie->query("SELECT * FROM `WaszeProp` WHERE `Autor`='".$Autor."' AND `Tytul`='".$Tytul."';");
            $rezultatWaszeLink = $polaczenie->query("SELECT * FROM `WaszeProp` WHERE `Link`='".$Link."'");
            if($rezultatMuzyka != 0){
                $_SESSION['bladMuzyka'] = 1;
            } else if($rezultatWasze != 0){
                $_SESSION['bladWasze'] = 1;
            } else if($rezultatWaszeLink != 0){
                $_SESSION['bladWaszeL'] = 1;
            } else {
                mysqli_query($polaczenie, "INSERT IN TO `WaszeProp` (`Autor`, `Tytul`, `Link`, `IP`, `Status`) VALUES ('".$Autor."', '".$Tytul."', '".$Link."', '".$IP."', '0')");
                $_SESSION['dodanoWasze'] = 1;
            }
        }
    }
    @header('Location: index.php');
}
?>
