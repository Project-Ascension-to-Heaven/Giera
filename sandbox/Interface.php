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
    $smarty->setConfigDir(__DIR__.'/smarty/confings');
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
    
    // to musi być żeby w index.tpl działały zmienne czyli np. {$jedzenie}
    $smarty->assign('jedzenie', $v->showStorage("jedzenie"));
    $smarty->assign('drewno', $v->showStorage("drewno"));
    $smarty->assign('metale', $v->showStorage("metale"));
    $smarty->assign('monety', $v->showStorage("monety"));

    // to musi być żeby w index.tpl działały zmienne czyli np. {$jedzenieGain}
    $smarty->assign('jedzenieGain', $v->showHourGain("jedzenie"));
    $smarty->assign('drewnoGain', $v->showHourGain("drewno"));
    $smarty->assign('metaleGain', $v->showHourGain("metale"));
    $smarty->assign('monetyGain', $v->showHourGain("monety"));

    // to już wiesz co żeby wiesz gdzie działało
    $smarty->assign('farmyLvl', $v->buildingLVL("farmy"));
    $smarty->assign('tartakLvl', $v->buildingLVL("tartak"));
    $smarty->assign('kopalniaLvl', $v->buildingLVL("kopalniaMetali"));
    $smarty->assign('skarbowkaLvl', $v->buildingLVL("skarbowka"));
    $smarty->assign('townHallLvl', $v->buildingLVL("townHall"));
    
    $smarty->assign('armyList', $gm->getArmyList());
    $smarty->assign('townSquare', "townSquare.tpl");

    Route::add('/', function() {
        global $smarty, $gm, $v;
        $smarty->assign('logArray', $gm->l->getLog());

        $smarty->display('index.tpl');

        /*echo "Strona główna";*/
    });
    
    Route::add('/login', function(){
        //echo "Strona logowania";
        global $smarty;
        $smarty->display('login.tpl');
    }, 'get');
    Route::add('/login', function(){
        //echo "przetwarzanie logowania";
        
    }, 'post');

    Route::add('/register', function(){
        global $smarty;
        $smarty->display('register.tpl');
    });

    Route::add('/register', function(){
        global $smarty;
        #przetwarzanie rejesteacji
    }, 'post');
    
    Route::add('/upgrade/([a-z]*)/', function($target){
        global $smarty, $v, $gm;
        #przetwarzanie rejesteacji
        #pseudokod $target->lvl += 1;
        //echo $target; // <-- for debug 
        //echo "<button onclick=\"goBack()\">Go Back</button>"; //tu jest przycisk do tego co tak chujowo wygląda na dole
        echo "<script language='javascript'>";
        echo 'alert("Budynek został dodany do kolejki.");';
        echo 'window.history.back();';
        echo "</script>";
        switch($target) 
        {
            case 'farmy':
                $v->upgradeBuilding("farmy");
                $smarty->assign('logArray', $gm->l->getLog());
                
                $smarty->display('index.tpl');
            break;
            case 'tartak':
                $v->upgradeBuilding("tartak");
                $smarty->assign('logArray', $gm->l->getLog());

                $smarty->display('index.tpl');
            break;
            case 'kopalnia':
                $v->upgradeBuilding("kopalniaMetali");
                $smarty->assign('logArray', $gm->l->getLog());

                $smarty->display('index.tpl');
            break;
            case 'skarbowka':
                $v->upgradeBuilding("skarbowka");
                $smarty->assign('logArray', $gm->l->getLog());

                $smarty->display('index.tpl');
            break;
            case 'townhall':
                $v->upgradeBuilding("townHall");
                $smarty->assign('logArray', $gm->l->getLog());

                $smarty->display('index.tpl');
            break;
            #...
        }
    });

    Route::add('/newUnit', function () {
        global $smarty, $v, $gm;
        echo "<script language='javascript'>";
        echo 'alert("Jednostka/i zostały wyszkolone.");';
        echo 'window.history.back();';
        echo "</script>";
        if (isset($_REQUEST['infantry'])) //kliknelismy wyszkol przy włócznikach
        {
            $count = $_REQUEST['infantry']; //ilość nowych włóczników
            $gm->newArmy($count, 0, 0, $v); //tworz nowy oddział włóczników w wiosce w ilosci $count;
        }
        if (isset($_REQUEST['archer'])) {
            $count = $_REQUEST['archer'];
            $gm->newArmy(0, $count, 0, $v);
        }
        if (isset($_REQUEST['cavalry'])) {
            $count = $_REQUEST['cavalry'];
            $gm->newArmy(0, 0, $count, $v);
        }
        $smarty->assign('logArray', $gm->l->getLog());
        $smarty->display('index.tpl');
    }, 'post');
    

    Route::run('/');
    //echo '<pre>';
    //var_dump($gm);

    echo "<script>";
    echo "function goBack() {";
    echo "    window.history.back();"; //to jest tak chujowe że nie mogę na to patrzeć
    echo "}";
    echo "</script>";

    exit;
    
    // ---------------------------------------------- Niżej stare rzeczy -----------------------------------------------------------
    
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
