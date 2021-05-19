<!--<pre>-->
<?php

    require_once(__DIR__.'/smarty/libs/Smarty.class.php');
    require_once(__DIR__.'/class/DB.class.php');
    require_once(__DIR__.'/class/GameManager.class.php');
    require_once(__DIR__.'/class/Route.class.php');

    session_start();

    $smarty = new Smarty();
    $db = new DB();   

    $smarty->setTemplateDir(__DIR__.'/smarty/templates');
    $smarty->setCompileDir(__DIR__.'/smarty/templates_c');
    $smarty->setCacheDir(__DIR__.'/smarty/cache');
    $smarty->setConfigDir(__DIR__.'/smarty/confing');
    $smarty->assign('config', array('date' => '%d.%m.%Y', 'time' => '%H:%M:%S', 'datetime' => '%d.%m.%Y %H:%M:%S'));

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

    Route::add('/', function() {
        global $smarty, $gm, $v;
        $smarty->assign('jedzenie', $v->showStorage("jedzenie"));
        $smarty->assign('drewno', $v->showStorage("drewno"));
        $smarty->assign('metale', $v->showStorage("metale"));
        $smarty->assign('monety', $v->showStorage("monety"));

        $smarty->assign('jedzenieGain', $v->showHourGain("jedzenie"));
        $smarty->assign('drewnoGain', $v->showHourGain("drewno"));
        $smarty->assign('metaleGain', $v->showHourGain("metale"));
        $smarty->assign('monetyGain', $v->showHourGain("monety"));

        $smarty->assign('logArray', $gm->l->getLog());
        $smarty->display('index.tpl');

        /*echo "Strona główna";*/
    });
    
    Route::add('/login', function(){
        echo "Strona logowania";
    });

    Route::add('/register', function(){
        echo "Strona rejestracji";
    });
    
    Route::run('/');
    exit;
    function function_alert($message) { 
        echo "<script>alert('$message');</script>"; 
    } 
    
    if (!isset($_SESSION['player_id']) && !isset($_REQUEST['login'])) {
        $smarty->display('login.tpl');
        exit;
    }
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
            case 'register';
                if(isset($_REQUEST['login']) && isset($_REQUEST['password']))
                {
                    $db->registerPlayer($_REQUEST['login'], $_REQUEST['password']);

                }else
                {
                    $smarty->display('register.tpl');
                    exit;
                }
            break;
            case 'login';
                if(isset($_REQUEST['login']) && isset($_REQUEST['password']))
                    {
                        $db->loginPlayer($_REQUEST['login'], $_REQUEST['password']);

                    }else
                    {
                        $smarty->display('login.tpl');
                        exit;
                    }
            break;
            case "upgradeBuilding":
                //if($v->upgradeBuilding($_REQUEST['building']))
                //{
                //    function_alert("Ulepszono budynek: ".$_REQUEST['building']);
                //    //echo "Ulepszono budynek: ".$_REQUEST['building'];
                //}
                //else
                //{
                //    function_alert("Kowal spalił ci Truta +8 ".$_REQUEST['building']);
                //    //echo "Kowal spalił ci Truta +8".$_REQUEST['building'];
                //    //header("Location: Interface.php");
                //}
                $v->upgradeBuilding($_REQUEST['building']);
            break;
            default:
                $gm->l->log("Nieprawidłowa zmienna \"action\"", "controller", "error");
        }
    }
    $smarty->assign('playerLogin', $_SESSION['player_login']);

    $smarty->assign('jedzenie', $v->showStorage("jedzenie"));
    $smarty->assign('drewno', $v->showStorage("drewno"));
    $smarty->assign('metale', $v->showStorage("metale"));
    $smarty->assign('monety', $v->showStorage("monety"));

    $smarty->assign('jedzenieGain', $v->showHourGain("jedzenie"));
    $smarty->assign('drewnoGain', $v->showHourGain("drewno"));
    $smarty->assign('metaleGain', $v->showHourGain("metale"));
    $smarty->assign('monetyGain', $v->showHourGain("monety"));

    $smarty->assign('logArray', $gm->l->getLog());

    $smarty->display('index.tpl');
?>
<!--</pre>-->
