<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Strona główna</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <div class="row" id="header">
            <div class="twelve columns"><a href="index.php" class="noLink"><h1>Radio MIX</h1></a></div>
        </div>
        <?php
            if(!isset($_SESSION['AdminLogin']){
                //Wyświetlanie panelu logowania

            } else {
                // Panel Admin

            }
        ?>
    </div>
    <footer id="footer" class="container" style="max-width: 100%; margin-top: 10%;">
        Kamil Langer &copy; kamillanger4@gmail.com
    </footer>
</body>
</html>
