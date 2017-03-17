function terazGrane(){
    var xmlhttp = new XMLHttpRequest();
    var tryb = "wczytaj";
    xmlhttp.open("GET","cojestGrane.php?Tryb=" + tryb, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("coJestTxt").innerHTML = this.responseText;
;        }
    }
    console.log("wczytano");
    setTimeout(function() {
        terazGrane();
    }, 1000);
}
