<div class="row">
    <span>Witaj <?php echo $_SESSION['Imie']; ?></span>
</div>
<div class="row">
    <div class="four columns">
        <a href="" class="noLink">
            <div class="window">
                <div class="title"> Logi </div>
                <div class="content">
                    <span>Ostatni log:</span>
                    <?php include"lastLog.php"; ?>
                </div>
            </div>
        </a>
    </div>
</div>
