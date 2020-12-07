<pre>
<?php
        require('./sandbox/class/GameManager.class.php');
        session_start();
        if(!isset($_SESSION['gm']))
        {
            $gm = new GameManager();
            $_SESSION['gm'] = $gm;
        } 
        else
        {
            $gm = $_SESSION['gm'];
        }
        $v = $gm->v;
        $gm->sync();

        if(isset($_REQUEST['action']))
        {
            switch($_REQUEST['action'])
            {
                case "upgradeBuilding":
                    if($v->upgradeBuilding($_REQUEST['building']))
                    {
                        echo "Ulepszono budynek: ".$_REQUEST['building'];
                    }
                    else
                    {
                        echo "Kowal spalił ci Truta +8";
                    }
                break;
                default:
                    echo 'Nieprawidłowa zmienna action';

            }

        }

    ?>
    </pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <header class="row">
            <div class="col-12 col-md-3">
                Informacje o graczu
            </div>
            <div class="col-12 col-md-6">
                Informacje o wiosce
            </div>
            <div clas="col-12 col-md-3">
                Wyloguj
            </div>
        </header>
        <main class="row">
            <div class="col-12 col-md-3">
                Lista Budynków<br>
                Tartak: <br>
                Zysk/h: <?php echo $v->showHourGain("wood"); ?> <br>
            <a href="index.php?action=upgradeBuilding&building=tartak">
                <button>Rozbuduj Tartak</button>
            </a><br>
                KopalnieMetali: <br>
                Zysk/h: <?php echo $v->showHourGain("metale"); ?> <br>
            <a href="index.php?action=upgradeBuilding&building=kopalniaMetali">
                <button>Rozbuduj Kopalnie</button>
            </a><br>
                Farmy: <br>
                Zysk/h: <?php echo $v->showHourGain("jedzenie"); ?> <br>
            <a href="index.php?action=upgradeBuilding&building=farmy">
            </a><br>
                Skarbówka: <br>
                Zysk/h: <?php echo $v->showHourGain("monety"); ?> <br>
            <a href="index.php?action=upgradeBuilding&building=skarbowka">
            </div>
            <div class="col-12 col-md-6">
                Widok wioski
            </div>
            <div class="col-12 col-md-3">
                Lista wojska
            </div>
        </main>
        <footer class="row">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
1