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

function openSnackbarBM() {
    $("#tekst").text("Nie można dodać utworu!");
    snackbar();
}

function openSnackbarDM() {
    $("#tekst").text("Piosenka dodana poprawnie!");
    snackbar();
}

function openSnackbarGlos() {
    $("#tekst").text("Oddałeś już dzisiaj głos na tę piosenkę!");
    snackbar();
}

function openSnackbarGlosP() {
    $("#tekst").text("Dziękujemy za twój głos!");
    snackbar();
}
