<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1 uzduotis</title>
</head>
<body>

    <form action="1uzduotis.php" method="get">
        <input type="text" name="elementas"/>
        <button type="submit" name="patvirtinti">Patvirtinti</button>
    </form>

<?php

//1. Sukurkite funkciją, kurią iškvietus, masyvą galima papildyti norimu elementu. 
// Masyvas išsaugomas į COOKIE.
// Informacija paimama iš input laukelio. Funkcija iškviečiama paspaudus mygtuką.

// sukuriama funkcija mygtuko paspaudimo isvedimui 
function pridekElementa() {
    //echo "labas"; 
    // tikrinam ar kintamasis egzistuoja ir nera tuscias
    if (isset($_GET["elementas"]) && !empty($_GET["elementas"])) {
        // isaugom reiksme kintamajam, prilyginama tekstui su $GET[] 
        $elementas=$_GET["elementas"]; 

        // sukuriamas elementu masyvas- (tuscias)
        // masyvas gali buti tuscias tik tol, ko nera cookie. 
        // kai atsiranda cookie- elementas (reiksme) turi but paverstas i masyva

        // tikrinam ar sausaunukas yra sukurtas elemente
        if(isset($_COOKIE["elementas"])) {
            // sausainuko reiksme- tekstas- atskiriamas- pasiima reiksme is elemento
            $elementuMasyvas=explode("|", $_COOKIE["elementas"]); 

            // cookies isvedamas tada (ten) kai jis egzistuoja 
            echo $_COOKIE["elementas"]; 
        } else {
            // jeigu sausainiuko nera- masyvas yra tuscias 
            $elementuMasyvas=array(); 
        }

        // i elementu masyva sukeliamas masyvas ir elemento reiksme
        array_push($elementuMasyvas, $elementas);

        // masyvo issaugojimas i cookie. 
        // cookyje saugomas tik tekstas 
        // reikia funkcijos, kuri masyva paverstu i teksta 
        // explode- teksta pavercia i masyva
        // implode- pavercia masyva i teksta 

        // sukuriamas cookis, su implode- kad paverstu i teksta 
        // "elementas"- vardas, 
        // reiksme implode("nurodomas simbolis, kaip bus atskirti masyvo elementai-|")
        setcookie("elementas", implode ("|", $elementuMasyvas), time()+3600, "/"); 

    }

}
    // kodas mygtuko paspaudimo suveikimui, " pasirenkamas mygtukas "
        if (isset($_GET["patvirtinti"])) {
    //iskvieciama funkcija ir isveda tai, kas nurodyta funkcijoje- paspaudus mygtuka- labas
        pridekElementa ();
}


?>
    
</body>
</html>