<div class="row">
    <span id="witaj">Witaj <?php echo $_SESSION['Imie']; ?></span>
</div>
<div class="row">
    <div class="four columns">
        <a href="logi.php" class="noLink">
            <div class="window windowHover">
                <div class="title"> Logi </div>
                <div class="content" style="margin-top: 7%;">
                    <span>Ostatni log:</span>
                    <?php include"lastLog.php"; ?>
                </div>
            </div>
        </a>
    </div>
    <div class="four columns">
        <div class="window">
            <div class="title"> Dodaj utwór </div>
            <div class="content">
                <form action="dodaj.php" method="post" style="font-size: 20px;">
                    <input type="text" name="autor" class="inputWindow" placeholder="Autor:"/>
                    <input type="text" name="tytul" class="inputWindow" placeholder="Tytuł:"/>
                    Świąteczne:<input type="radio" name="Kategoria" value="Christmas" style="margin-right: 20px;"/>
                    Retro:<input type="radio" name="Kategoria" value="Retro" /> <br>
                    <input type="submit" name="zapisz" value="Dodaj"/>
                </form>
            </div>
        </div>
    </div>
    <div class="four columns">
        <div class="window">
            <div class="title"> Usuń utwór </div>
            <div class="content">
                <form action="usun.php" method="post" style="font-size: 20px;">
                    <input type="text" name="autor" class="inputWindow" placeholder="Autor:"/>
                    <input type="text" name="tytul" class="inputWindow" placeholder="Tytuł:"/>
                    <input type="submit" name="usun" class="logout" value="Usuń!"/>
                </form>
            </div>
        </div>
    </div>

    <div class="four columns" style="margin-left: 0%;">
        <div class="window">
            <div class="title"> Propozycje uczniów </div>
            <div class="content" style="font-size: 17px; margin-top: inherit;">
                <?php
                require_once "connect.php";
                @$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
                @$polaczenie->set_charset("utf8");
                @$polaczenie->query("SET CHARACTER_SET utf8_polish_ci");
                if($polaczenie->connect_errno!=0){
                    echo "Error: ".$polaczenie->connect_errno;
                } else {
                    $rezultat = $polaczenie->query("SELECT * FROM `waszeprop` WHERE `Status`='0'");
                    echo "Ilość oczekujących piosenek: ".$rezultat->num_rows."<br>";
                }
                ?>
                <button onclick="sprawdzanie()" style="margin-top: 12%;">Sprawdź</button>
            </div>
        </div>
    </div>
    <div class="four columns">
        <div class="window">
            <div class="title"> Zarządzanie kontem </div>
            <div class="content">
                <button onclick="#" style="margin-top: 11%;">Zarządzanie</button>
                <button type="submit" onclick="logout()" class="logout" style="margin-top: 1%;">Wyloguj się</button>
            </div>
        </div>
    </div>
</div>
