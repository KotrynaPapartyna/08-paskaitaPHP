<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2uzduotis</title>
</head>
<body>

    <form action="2uzduotis.php" action="get">
        <button type="submit" name="patvirtinti">Patvirtinti</button>
    </form>

<?php

//2. Sukurkite funkciją, kuri mygtuko paspaudimu, 
//sukuria div elementą su klase "elementas-{index}". {index} = elemento numeris

    // jeigu niekas neivyksta- labas
    function sukurkElementa() {

        // tam kad isaugotu kas buvo suvesta- reikes- cookies 
        // paspaudi mygtuka---pasipildo masyvas-- masyvas isiraso i cookies---
        //-- kito paspaudimo metu paimama sena cookie reiksme ir procesas kartojamas

        
        // jeigu nenustatytas sausainukas < !isset > 
        if (!isset($_COOKIE["skaitiklis"])) {
            // jeigu nesukurtas- reiksme- 1 
            $skaitiklis=1; 
            echo "<div class='elementas0'>"; 
            // atvaizduojama- Elementas+ reiksme (i)
            echo "elementas0"; 
            // isvedimo pabaiga 
            echo "</div>"; 

        } else {
            // kitu atveju- reiksme lygu reiksmei 
            // be intval rode klaida 
            $skaitiklis=intval($_COOKIE["skaitiklis"]); 
            // paspaudus skaitikli prie reiksmes prisides po 1 
            $skaitiklis++;    
           
            // cilkas issivedimui- didejimui lygu elementu kiekiui 
            for ($i=0; $i<$skaitiklis; $i++) {
                // isvedimo pradzia
                echo "<div class='elementas". $i. " ' >"; 
                // atvaizduojama- Elementas+ reiksme (i)
                echo "elementas".$i; 
                // isvedimo pabaiga 
                echo "</div>"; 
            }
        }
            
            // reiksme issaugojama cookyje 
            setcookie ("skaitiklis", $skaitiklis, time()+3600,"/"); 
            // return "labas"; 
        }

            // fiksuojamas mygtuko paspaudimas
            if (isset($_GET["patvirtinti"])) {
                // mygtuko paspaudimas- atvaizduos funkcijoje zyme- labas
                sukurkElementa(); 
            }





?>
    
</body>
</html>