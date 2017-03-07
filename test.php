<!-- DOCTYPE -->
<html>
<head>
    <title>Przykładowy skrypt AJAX</title>
    <script type="text/javascript"> // pierwsza część kodu var ObiektXMLHttp = false;
        if (window.XMLHttpRequest) {
            ObiektXMLHttp = new XMLHttpRequest();
        } else if (window.ActiveXObject)  {
            ObiektXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        // druga część kodu
        function getData(zrodlo, cel) {
            if(ObiektXMLHttp) {
                var cel = document.getElementById(cel);
                ObiektXMLHttp.open("GET", zrodlo);
                ObiektXMLHttp.onreadystatechange = function() {
                    if (ObiektXMLHttp.readyState == 4)
                    {
                        var div = document.getElementById('dwi');
                        div.innerHTML = ObiektXMLHttp.responseText;
                        console.log(ObiektXMLHttp.responseText);
                    }
                }
                // trzecia część kodu
                ObiektXMLHttp.send(null);
            }
        }
    </script>
</head>
<body>
    <h1>AJAX w praktyce</h1>
    <form>
        <input type = "button" value = "Pokaż wiadomość" onclick = "getData('http://localhost/radio2.0/odtwarzanie.php', 'spand')">
    </form>
    <div id="dwi"> Tutaj pojawi się wiadomość. </div>
</body>
</html>
