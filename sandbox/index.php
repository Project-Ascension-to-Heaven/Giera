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
            echo "Tworzę nową wioskę"
            $v = new Village();
            $_SESSION['v'] = $v;
        }
        else 
        {
        $_SESSION['v'] - $v;
        }

        var_dump($v)


    ?>
    </pre>
</body>
</html>