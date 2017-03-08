function zapis(nazwa) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "dodajCBG.php?Nazwa=" + nazwa, true);
    xmlhttp.send();
    console.log("Wysłano");
    console.log(xmlhttp.responseText);
}

function stop() {
    var player = document.getElementById("PLAYER");
    var player1 = document.getElementById("PLAYER1");
    var player2 = document.getElementById("PLAYER2");
    var player3 = document.getElementById("PLAYER3");

    player.pause();
    player1.pause();
    player2.pause();
    player3.pause();
}

function start(nazwa1, nazwa2, nazwa3, nazwa4) {
    var player = document.getElementById("PLAYER");
    var player1 = document.getElementById("PLAYER1");
    var player2 = document.getElementById("PLAYER2");
    var player3 = document.getElementById("PLAYER3");

    player.onended = function() {
        player1.play();
        zapis(nazwa1);
        player1.onended = function() {
            player2.play();
            zapis(nazwa2);
            player2.onended = function() {
                player3.play();
                zapis(nazwa3);
                player3.onended = function() {
                    zapis(nazwa4);
                    location.reload();
                    player.play();
                }
            }
        }
    }
    player.play();
}

function czas(nazwa1, nazwa2, nazwa3, nazwa4)
{
    var przelacznik = false;
    var Data = new Date();
    console.log("Działa!");
    var godzina = Data.getHours();
    var minuta = Data.getMinutes();
    var sec = Data.getSeconds();
    console.log(godzina+" : "+minuta+" : "+sec);
    //LEKCJE
    if((godzina == 8 && minuta == 0) || (godzina == 8 && minuta == 50) || (godzina == 9 && minuta == 50) || (godzina == 10 && minuta == 45) || (godzina == 11 && minuta == 40) || (godzina == 12 && minuta == 40) ||    (godzina == 13 && minuta == 35 )){
        //ZATRZYMANIE PLAYER
        stop();
        console.log("Zatrzymanie");
        //ODŚWIERZENIE STRONY W CELU POBRANIA NOWEJ LISTY PIOS
        if(przelacznik == false){
            location.reload();
            przelacznik = true;
        }
        przelacznik=true;
    }
    //PRZERWY
    if((godzina == 8 && minuta == 45 && sec == 0) || (godzina == 9 && minuta == 35 && sec == 0) || (godzina == 10 && minuta == 35 && sec == 0) || (godzina == 11 && minuta == 30 && sec == 0) || (godzina == 12 &&  minuta == 25 && sec == 0) || (godzina == 13 && minuta == 25 && sec == 0)){
        //URUCHOMIENIE PLAYER
        start(nazwa1, nazwa2, nazwa3, nazwa4);
        console.log("Start");
        przelacznik = false;
    }

    setTimeout(function() {
        czas()
    }, 1000);
}
function reload(){
    location.reload();
}
