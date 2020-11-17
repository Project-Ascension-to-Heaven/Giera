<?php
    $teraz = time();
    $losowaLiczbaSekund = rand(0,7200); //od 0 sekund do 2 godzin
    $przeszlosc = $teraz - $losowaLiczbaSekund;
    $produkcjaDrewnaGodzine = 1000;
    $produkcja = ($produkcjaDrewnaGodzine / 3600) * $losowaLiczbaSekund;
    echo "Drewno: ".floor($produkcja);
    
    $czasUlepszeniaBudynku = 2700; //45min
    

    $budynekGotowy = time() + $czasUlepszeniaBudynku;
?>