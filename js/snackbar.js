function snackbar(){
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
function openSnackbar() {
    $("#tekst").text("Błędny login lub hasło!");
    snackbar();
}

function openSnackbarU() {
    $("#tekst").text("Brak uprawnień!");
    snackbar();
}
