var spel; // Wordt later gebruikt om een spel object aan te maken
var spelerKeuze = "";
var computerKeuze = "";
var resultaat = "";
var knoppen = document.getElementsByClassName("knop"); // 3 knoppen
var spelerKeuzeMonitor = document.getElementById("speler_keuze"); // geeft de keuze van de speler weer
var computerKeuzeMonitor = document.getElementById("computer_keuze"); // geeft de keuze van de computer weer
var resultaatWeergave = document.getElementById("resultaat"); //geeft de uitslag van het spel

function spel(){ //aanmaak spelfunctie
    this.computerInput = function(){ //aanmaak keuze vam computer
        this.computerKeuze = Math.random(); // aanmaak hoeveel kans de computer heeft om steen, papier of schaar te kiezen
        if (this.computerKeuze < 0.34) { //antwoord schaar als computer keuze kleiner is dan 0.34
            return this.computerKeuze = "steen"; 
        } else if (this.computerKeuze <= 0.67) { // antwoord papier als computer keuze kleiner of gelijk is aan 0.67 anders antwoord schaar
            return this.computerKeuze = "papier"; 
        } else{
            return this.computerKeuze = "schaar";
        };
    };

    //keuze1 is de keuze van de speler
    //keuze2 is de keuze van de computer
    this.compare = function(keuze1, keuze2){
        console.log(keuze1, keuze2);

        if(keuze1=='papier') {
            if(keuze2=='papier') {
                return 'gelijkspel';
            }else if(keuze2=='steen') {
                return 'speler wint';
            }else if(keuze2=='schaar'){
                return 'computer wint';
            }
        }
        else if(keuze1=='steen') {

            if(keuze2=='papier') {
                return 'computer wint';
            }else if(keuze2=='steen') {
                return 'gelijkspel';
            }else if(keuze2=='schaar'){
                return 'speler wint';
            }

        }else if(keuze1=='schaar') {

            if(keuze2=='papier') {
                return 'speler wint';
            }else if(keuze2=='steen') {
                return 'computer wint';
            }else if(keuze2=='schaar'){
                return 'gelijkspel';
            }

        }

    };
};

var spel = new spel();

// verkrijg het antwoord van de speler
for (var i = 0; i < knoppen.length; i++) {
    knoppen[i].addEventListener('click', function(){
        spelerKeuze = this.id;
        spelerKeuzeMonitor.innerHTML = "speler kiest: " + spelerKeuze;
        // verkrijg het antwoord van de computer
        computerKeuze = spel.computerInput();
        computerKeuzeMonitor.innerHTML = "computer kiest: " + computerKeuze;
        // computer vergelijkt antwoorden met elkaar
        resultaat = spel.compare(spelerKeuze, computerKeuze);

        
//geeft resultaat weer
        resultaatWeergave.innerHTML = resultaat;
        
    }, false);


};



spel.computerInput();