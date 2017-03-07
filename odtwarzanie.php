<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if ($polaczenie->connect_errno!=0){
echo "Error: ".$polaczenie->connect_errno;
} else {
    $data = date("H:i");
    if($data == "09:34" || $data == "09:35" || $data == "09:36" || $data == "12:24" || $data == "12:25" || $data == "12:26"){
        //POBIERANIE TOP 3 PIOS
        $top3 = $polaczenie->query("SELECT * FROM `Muzyka` ORDER BY `Pkt` DESC LIMIT 0,4");
        for($i=0; $i<4;$i++){
            $wiersz = $top3->fetch_assoc();
                $Autor[$i] = $wiersz['Autor'];
                $Tytul[$i] = $wiersz['Tytul'];
        }
        //CZYSZCZENIE PKT
        mysqli_query("UPDATE `Muzyka` SET `Pkt`='0' WHERE 1 ");
    } else {
    $rozne = $polaczenie->query("SELECT * FROM `Muzyka` WHERE 1");

        $ilosc = $rozne->num_rows;
        for($i=0; $i<4;$i++) {
            $piosenka[$i] = rand(1,$ilosc);
            $rezultat = $polaczenie->query("SELECT * FROM `Muzyka` WHERE `ID` = '".$piosenka[$i]."' AND `Kategoria`!='Christmas'");
            $wiersz = $rezultat->fetch_assoc();
                $Autor[$i] = $wiersz['Autor'];
                $Tytul[$i] = $wiersz['Tytul'];
                $Kategoria[$i] = $wiersz['Kategoria'];
            while($Autor[$i] == "") {
                $piosenka[$i] = rand(1,$ilosc);
                $rezultat = $polaczenie->query("SELECT * FROM `Muzyka` WHERE `ID` = '".$piosenka[$i]."' AND `Kategoria`!='Christmas'");
                $wiersz = $rezultat->fetch_assoc();
                    $Autor[$i] = $wiersz['Autor'];
                    $Tytul[$i] = $wiersz['Tytul'];
                    $Kategoria[$i] = $wiersz['Kategoria'];
            }
        }
    }
    //PIOSENKI GRUDZIEN/STYCZEN
    $miesiac = date("m");
    if($miesiac == "01" || $miesiac == "12"){
        $rozne = $polaczenie->query("SELECT * FROM `Muzyka` WHERE 1");

        $ilosc = $rozne->num_rows;
        for($i=0; $i<4;$i++){
            $piosenka[$i] = rand(1,$ilosc);
            $rezultat = $polaczenie->query("SELECT * FROM `Muzyka` WHERE `ID` = '".$piosenka[$i]."'");
            $wiersz = $rezultat->fetch_assoc();
                $Autor[$i] = $wiersz['Autor'];
                $Tytul[$i] = $wiersz['Tytul'];
                $Kategoria[$i] = $wiersz['Kategoria'];
        }
    }

    //ODTWARZANIE
    $Nazwa[0] = $Autor[0]." - ".$Tytul[0];
    $Nazwa[1] = $Autor[1]." - ".$Tytul[1];
    $Nazwa[2] = $Autor[2]." - ".$Tytul[2];
    $Nazwa[3] = $Autor[3]." - ".$Tytul[3];
    $rok = date('Y-m-d');
    $godzina = date('H:i');
    for($i=0;$i<4;$i++){
        mysqli_query($polaczenie,"INSERT INTO `Cobylograne` (`NazwaPios`, `Data`, `Godzina`) VALUES ('".$Nazwa[$i]."', '".$rok."', '".$godzina."');");
    }
    echo '<tekst class="nazwa" id="cel">'.$Nazwa[0].'</tekst>';
    ?> <br>
<span id="spand">Cos</span>
    <audio controls id="PLAYER">
        <source  />
        <?php echo '<source src="music/'.$Nazwa[0].'.mp3" type="audio/mpeg"/>'; ?>
    </audio> <br>
    <?php echo '<tekst class="nazwa">'.$Nazwa[1].'</tekst>'; ?> <br>
    <audio controls id="PLAYER1">
        <source  />
        <?php echo '<source src="music/'.$Nazwa[1].'.mp3" type="audio/mpeg"/>'; ?>
    </audio> <br>
    <?php echo '<tekst class="nazwa">'.$Nazwa[2].'</tekst>'; ?> <br>
    <audio controls id="PLAYER2">
        <source  />
        <?php echo '<source src="music/'.$Nazwa[2].'.mp3" type="audio/mpeg"/>'; ?>
    </audio> <br>
    <?php echo '<tekst class="nazwa">'.$Nazwa[3].'</tekst>'; ?> <br>
    <audio controls id="PLAYER3">
        <source  />
        <?php echo '<source src="music/'.$Nazwa[3].'.mp3" type="audio/mpeg"/>'; ?>
    </audio> <br>
    <input type="button" value="STOP!" id="stop" onclick="stop();"/>
    <input type="button" value="START!" id="start" onclick="start();"/>
    <input type="button" value="REFRESH!" id="refresh" onclick="reload();"/>
    <script>czas();</script>
<?php } ?>
