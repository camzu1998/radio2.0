function dzien(dziens){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "CBGController.php?Dzien="+dziens, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("bodyTable").innerHTML = this.responseText;
        }
    }
}
function szukaj(){
    var data = document.getElementById("data").value;
    data = data.replace(".","-");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "CBGController.php?data="+data, true);
    xmlhttp.send();
    console.log("wysłano")
    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("bodyTable").innerHTML = this.responseText;
        }
    }
}
