function laduj(tryb){
    var xmlhttp = new XMLHttpRequest();
    var szukaj = document.getElementById("szukajka").value;
    xmlhttp.open("GET", "sprawdzaniePiosController.php?Tryb=" + tryb + "&szukaj=" + szukaj, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("info").innerHTML = this.responseText;
        }
    }
}
