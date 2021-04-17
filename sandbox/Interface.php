<!--<pre>-->
<?php
    require(__DIR__.'/smarty/libs/Smarty.class.php');
/*początek smarty init*/
    $smarty = new Smarty();

    $smarty->setTemplateDir(__DIR__.'/smarty/templates');
    $smarty->setCompileDir(__DIR__.'/smarty/templates_c');
    $smarty->setCacheDir(__DIR__.'/smarty/cache');
    $smarty->setConfigDir(__DIR__.'/smarty/confing');
    $smarty->assign('config', array('date' => '%d.%m.%Y', 'time' => '%H:%M:%S', 'datetime' => '%d.%m.%Y %H:%M:%S'));
/*koniec smarty init*/
    function function_alert($message) { 
        echo "<script>alert('$message');</script>"; 
    } 
    
    require('./class/GameManager.class.php');
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
