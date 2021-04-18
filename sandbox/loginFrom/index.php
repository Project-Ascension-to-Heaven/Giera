<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(!isset($_REQUEST['username']))
        require('loginForm.html');
    else
    {
        $wprowadzonylogin = $_REQUEST['username'];
        $wprowadzonehaslo = $_REQUEST['password'];

        //$prawdilowylogin = "andrzej";
        //$prawdilowehaslo = "kebab";
        
        $db = new mysqli('localhost', 'root', '', 'giera_loginform');
        $sql = "SELECT * FROM `user` WHERE `username` = \"$wprowadzonyLogin\""; 
        $wynik = $db->query($sql);
        $wiersz = $wynik->fetch_assoc();
        var_dump($wiersz);

        $haslozbazy = $wiersz['password'];
    
        if(password_verify($wprowadzonehaslo, $haslozbazy))   
        {
            function_alert("Zalogowano!");
        } 
        else
        {
            function_alert("Nie prawidłowe dane logowania!");
        }
    }
 
    ?>
    <pre>
        <?php
        //var_dump($_REQUEST); 
        ?>
    </pre>
</body>
</html>