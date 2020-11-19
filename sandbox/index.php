<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
    <?php
        require('./Villageclass.php');
        session_start();

    
        if(!isset($_SESSION['v']))
        {
            echo "Tworzę nową wioskę";
            $v = new Village();
            $_SESSION['v'] = $v;
            $deltaTime = time();
        }
        else 
        {
            $_SESSION['v'] - $v;
            $deltaTime = time() - $_SESSION['time'];
        }
        $v->gain($deltaTime);

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






        $_SESSION['time'] = time();
        var_dump($v);
        var_dump($_REQUEST);


    ?>
    </pre>
    <a href=""
    <button>Rozbuduj Tartak</button>
    <button>Rozbuduj Kopalnie</button>
</body>
</html>