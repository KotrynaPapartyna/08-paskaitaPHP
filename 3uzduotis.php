<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3uzduotis</title>
</head>
<style>
  
    table, th, td {
      border: 1px solid black;
}

</style>
<body>
  <form action="3uzduotis.php" method="get">
    <input type="text" value="100" name="id"/>
    <input type="text" value="naujas_vardas" name="vardas"/>
    <input type="text" value="nauja_pavarde" name="pavarde"/>
    <input type="text" value="naujas_asmensKodas" name="asmensKodas"/>
    <input type="text" value="nauja_prisijungimoData" name="prisijungimoData"/>
    <input type="text" value="naujas_adresas" name="adresas"/>
    <input type="text" value="naujas_elPastas" name="elPastas"/>
    <button type="submit" name="patvirtinti">Patvirtinti</button> 
  </form>


<?php

//3. Susikurti asociatyvų masyvą "Klientai".
// Kintamieji: vardas, pavarde, asmens kodas, prisijungimo data, adresas,elpastas.

///Masyve turi būti 200 klientų. Duomenis užpildyti savo nuožiūrą.
///Visą "Klientai" objektų masyvą atvaizduoti lentelėje <table>.
///Visas klientų masyvas saugomas COOKIE.

// masyvas, kuriame yra asociatyvus masyvas (kliento "lentynele")

if(isset($_GET["patvirtinti"])) {
  $id= $_GET ["id"]; 
  $vardas=$_GET ["vardas"]; 
  $pavarde=$_GET ["pavarde"]; 
  $asmensKodas=$_GET ["asmensKodas"]; 
  $prisijungimoData=$_GET ["prisijungimoData"]; 
  $adresas=$_GET ["adresas"]; 
  $elPastas=$_GET ["elPastas"]; 

  // reikia sudeti informacija i cookie

  $klientai_tekstas=$_COOKIE["klientai"]. "|$id"; 
  // nustatomas cookie su nauja informacija 
  setcookie("klientai", $klientai_tekstas, time() + 3600, "/"); 

}

if(!isset($_COOKIE["klientai"])) {

  $klientai=array(); 

    //  $klientai=array(
    //  array(
    //  "id"=>"0",
    //  "vardas"=>"vardas0", 
    //  "pavarde"=>"pavarde0", 
    //  "asmensKodas"=>"1234567891", 
    //  "prisijungimoData"=>"2021-08-02",
    //  "adresas"=>"adresas0",
    //  "elPastas"=>"elPastas0@pastas.lt",
    //  ), 

    //  array(
    //  "id"=>"1",
    //  "vardas"=>"vardas1", 
    //  "pavarde"=>"pavarde1", 
    //  "asmensKodas"=>"1234567891", 
    //  "prisijungimoData"=>"2021-08-03",
    //  "adresas"=>"adresas1",
    //  "elPastas"=>"elPastas1@pastas.lt",
    //  ),  
    // ); 

// 200 klientu uzpildymas- su ciklu
for($i=0; $i<10; $i++) {
    // pildom "klientai" masyva. ciklas turi uzpildyti visa lentyna
    // turi prideti nauja masyva- i klientai masyva
    $klientas= array(
      "id"=> $i+1, 
      "vardas"=> "vardas".($i+1), 
      "pavarde"=>"pavarde".($i+1),
      // generuojam pagal asmens koda- tiketinai realu  
      "asmensKodas"=>rand(3,4).rand(0,99).rand(1,12).rand(1,31).rand(0,9999),

      // atsitiktiniu budu sugeneruojama data 
      // rand(1,10)- nuo 1 iki 10- atsitiktinai sugeneruoja. "-"- atskyrimas, .- pridejimas
      "prisijungimoData"=>rand(1950, 2021)."-".rand(1,12)."-".rand(1,30), 
      "adresas"=>"adresas".($i+1), 
      "elPastas"=>"vardas".($i+1)."pavarde".($i+1)."@pastas.lt", 
    ); 

    // masyvo uzpildymas 
    array_push($klientai, $klientas); 
}
        } else {
          $klientai=$_COOKIE["klientai"]; 
          $klientai=explode("|", $klientai); 

          for($i=0; $i<count($klientai); $i++) {
            $klientai[$i]=explode(",", $klientai[$i]); 
          }
        }

// atvaizdavimas lenteleje
    echo "<table>";

    // $klientai- dvimatis masyvas
    // $eilute- vienmatis masyvas
    // $stulpelis- masyvo elementas arba kintamasis

    // ciklas isvedineja eilites ir lentyneles- su 200 eiluciu
    // masyvo suskaidymas eilutemis
    foreach ($klientai as $eilute) {
          echo "<tr>";
        // eilutes suskaidymas i stuleplius
        foreach($eilute as $stulpelis) { // reikia 7 stulpeliu 
          echo "<td>";
          echo $stulpelis; 
          echo "</td>";
        }
          echo "</tr>"; 

        }
        echo "</table>";

// issivedam visa masyva kol kas su dviem klientais
// var_dump($klientai); 

// 1- sukuriama forma
// 2- ivedam duomenis
// 3- paspaudus mygtuka, puslapis perikrauna- issivalo duomenys=- atsinaujina
// 4- su array_push is formos sukeliam duomenis i masva klientai 

// iseitis
// sukurtas masyvas turi but issaugotas i cookie
// kai masyvas yra issaugotas cookie, galima atvaizduoti is cookie 
// reiksme issisaugo- galima prideti kazka naujo 

// cookies saugo tik teksta 

// setcookie("klientai", $klientai, time(), +3600, "/"); 

//$klientai_tekstas= implode("|", $klientai); 
//echo $klientai_tekstas; 

// dvimati masyva klientai pasiverciam i teksta 

for($i=0; $i<count($klientai); $i++) {
  $klientai[$i]=implode(",", $klientai[$i]); 
}

// issivedam masyva
// var_dump($klientai); 

// masyvas paverciamas i teksta 
$klientai_tekstas=implode("|", $klientai); 
// echo $klientai_tekstas; 


setcookie("klientai", $klientai_tekstas, time() + 3600, "/");



?>
    
</body>
</html>