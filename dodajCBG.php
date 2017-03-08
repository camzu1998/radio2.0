<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
@$polaczenie->set_charset("utf8");
@$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
if ($polaczenie->connect_errno!=0){
echo "Error: ".$polaczenie->connect_errno;
} else {
    $nazwa = $_REQUEST["Nazwa"];
    $rok = date('Y-m-d');
    $godzina = date('H:i');
    mysqli_query($polaczenie,"INSERT INTO `Cobylograne` (`NazwaPios`, `Data`, `Godzina`) VALUES ('".$nazwa."', '".$rok."', '".$godzina."');");
    echo mysqli_error;
}
?>
