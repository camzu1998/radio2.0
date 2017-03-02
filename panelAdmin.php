<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Strona główna</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="css/loginModal.css">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/loginModalClosing.js"></script>
</head>
<body>
    <div class="container">
        <div class="row" id="header">
            <div class="twelve columns"><a href="index.php" class="noLink"><h1>Radio MIX</h1></a></div>
        </div>
        <?php
            if(!isset($_SESSION['AdminLogin'])){
                //Wyświetlanie panelu logowania
                ?>
                <script>openModal();</script>
                <!-- The Modal -->
                <div id="id01" class="modal">
                  <span onclick="document.getElementById('id01').style.display='none'"
                class="close" title="Close Modal">&times;</span>

                  <!-- Modal Content -->
                  <form class="modal-content animate" action="/action_page.php">
                    <div class="imgcontainer">
                      <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                      <label><b>Username</b></label>
                      <input type="text" placeholder="Enter Username" name="uname" required>

                      <label><b>Password</b></label>
                      <input type="password" placeholder="Enter Password" name="psw" required>

                      <button type="submit">Login</button>
                      <input type="checkbox" checked="checked"> Remember me
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                      <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                  </form>
                </div>
                <?php
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
