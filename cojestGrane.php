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
    if($tryb == "zapis"){
        $teraz = $_REQUEST['Teraz'];
        if($tryb != ""){
            $plik = fopen("grane.txt","w");
            fwrite($plik,$teraz);
            fclose($plik);
        } else {
            $plik = fopen("grane.txt","w");
            fwrite($plik,$tryb);
            fclose($plik);
        }
    } else {
        $plik = fopen("grane.txt","r");
        echo "Teraz grane: ".fread($plik,filesize("grane.txt"));
        fclose($plik);
    }
}
?>
