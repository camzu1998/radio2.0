<div class="row">
    <input type="text" id="szukajka" name="search" placeholder="Wpisz numer ID propozycji">
    <button onclick="laduj('szukajka')">Szukaj</button>
</div>
<div class="row" style="text-align: center;">
    <script>laduj("ostatni");</script>
    <div id="info" style="font-size: 20px;">
        ID propozycji:<span id="ID"></span><br>
        Autor:<span id="Autor"></span><br>
        Tytuł:<span id="Tytul"></span><br>
        Link:<span id="Link"></span><br>
        Status:<span id="Status"></span><br>
        IP:<span id="IP"></span><br>
    </div>
    <div id="controls">
        <button onclick="laduj('ban')">BAN</button>
        <button class="add" onclick="laduj('przyjeta')">Dodaj do bazy</button>
        <button class="delete" onclick="laduj('odrzucona')">Usuń propozycje</button><br>
        <a href="panelAdmin.php">Wróć</a>
    </div>
</div>
