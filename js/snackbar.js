function snackbar(){
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4500);
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

function openSnackbarUs() {
    $("#tekst").text("Piosenka została usunięta!");
    snackbar();
}

function openSnackbarUsB() {
    $("#tekst").text("Nie znaleziono takiej piosenki!");
    snackbar();
}

function openSnackbarbladMuzyka() {
    $("#tekst").text("Piosenka jest już w bazie danych!");
    snackbar();
}

function openSnackbarbladWasze() {
    $("#tekst").text("Autor i tytuł już są w poczekalni!");
    snackbar();
}

function openSnackbarbladWaszeL() {
    $("#tekst").text("Link do tej piosenki już jest w poczekalni!");
    snackbar();
}

function openSnackbardodanoWasze() {
    $("#tekst").text("Piosenka dodana do poczekalni!");
    snackbar();
}

function openSnackbarIPBAN() {
    $("#tekst").text("To IP ma zakaz dodawania piosenek!!!");
    snackbar();
}
