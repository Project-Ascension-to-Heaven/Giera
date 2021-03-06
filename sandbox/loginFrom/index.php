<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_REQUEST['username']))
        require('loginForm.html');
    else
    {
        $prawdilowylogin = "andrzej";
        $prawdilowehaslo = "kebab";
    
        $wprowadzonylogin = $_REQUEST['username'];
        $wprowadzonehaslo = $_REQUEST['password'];
    
        if($wprowadzonylogin == $prawdilowylogin && $wprowadzonehaslo == $prawdilowehaslo)   
        {
            function_alert("<p>Zalogowano!</p>");
        } 
        else
        {
            function_alert("<p>Nie prawidłowe dane logowania!</p>");
        }
    }

    ?>
    <pre>
        <?php
        var_dump($_REQUEST); 
        ?>
    </pre>
</body>
</html>