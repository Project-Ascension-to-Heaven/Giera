{include file="header.tpl"}
<!--
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #3d3d3d;"> -->
        <div class="container-fluid">
            <div class="row" id="top">
                <div class="col-2">
                    Nick: {$playerLogin|default:"Anonim"}
                </div>
                <div class="col-2">
                    Gildia: brak
                </div>
                <div class="col-1">
                    Jedzenie: {$jedzenie}
                </div>
                <div class="col-1">
                    Drewno: {$drewno}
                </div>
                <div class="col-1">
                    Metale: {$metale}
                </div>
                <div class="col-1">
                    Monety: {$monety}
                </div>
                <div class="col-1">
                    Kryształy: 21
                </div>
            </div>
            <div class="row">
                <div class="col-10" id="lewo">
                    <img src="projekt.png" id="obrazTlo">
                </div>
                <div class="col-2">
                    <h2>Przychód:</h2> <br>
                    Jedzeniem zysk/h: {$jedzenieGain} <br>
                    <a href="Interface.php?action=upgradeBuilding&building=farmy">
                        <button>Rozbuduj Farmy</button>
                    </a><br>
                    Drewno, zysk/h: {$drewnoGain} <br>
                    <a href="Interface.php?action=upgradeBuilding&building=tartak">
                        <button>Rozbuduj Tartak</button>
                    </a><br>
                    Metale, zysk/h: {$metaleGain} <br>
                    <a href="Interface.php?action=upgradeBuilding&building=kopalniaMetali">
                        <button>Rozbuduj Kopalnie</button>
                    </a><br>
                    Monety, zysk/h: {$monetyGain} <br>
                    <a href="Interface.php?action=upgradeBuilding&building=skarbowka">
                        <button>Rozbuduj Skarbówkę</button>
                    </a><br>
                </div>
            </div>
        </div>
    <footer class="row">
        <div class="col-12">
            {include file="log.tpl"}
        </div>
    </footer>
<!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html> -->
{include file="footer.tpl"}