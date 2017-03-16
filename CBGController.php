<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if ($polaczenie->connect_errno!=0){
echo "Error: ".$polaczenie->connect_errno;
} else {
    @$nazwa = $_REQUEST["Dzien"];
    @$data = $_REQUEST['data'];
    if($nazwa == "dzisiaj"){
        //Wszystkie piosenki z dzisiaj
        $dzisiaj = date('Y-m-d');
        $rezultat = $polaczenie->query("SELECT * FROM `cobylograne` WHERE `Data`='$dzisiaj'");
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
    } else if($nazwa == "wczoraj"){
        //Wszystkie piosenki z wczoraj
        $dzien = date('Y-m-d',strtotime("-1 days"));
        $rezultat = $polaczenie->query("SELECT * FROM `cobylograne` WHERE `Data`='$dzien'");
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
    } else if($data != ""){ //WPISANE DATA I PRZERWA
        $rezultat = $polaczenie->query("SELECT * FROM `cobylograne` WHERE `Data`='$data'");
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
}
?>
