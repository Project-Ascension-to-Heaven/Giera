<?php
require_once('Villageclass.php');
require_once('Log.class.php');
require_once('Scheduler.class.php');
require_once('DB.class.php');
require_once('Army.class.php');
class GameManager
{
    public $v;
    public $l;
    public $s;
    public $t;
    public $db;
    public $a;

    public function __construct()
    {
        $this->l = new Log();
        $this->l->log("Tworzę nową gre...", 'gameManager', 'info');
        $this->v = new Village($this);
        $this->a = array();
        $this->s = new Scheduler($this);
        $this->t = time();
        $this->l->log("Łączę z bazą danych...", 'gameManager', 'info');
        $this->db = new DB();

    }
    public function deltaTime() : int
    {
        return time() - $this->t;
    }
    public function sync()
    {
        $this->s->check($this->t);

        $this->v->gain($this->deltaTime());
        $this->t = time();
    }


    public function newArmy($spearmen, $archers, $cavalry, $location) 
    {
        $this->l->log("Tworzę nową armię", "gamemanager");
        foreach($this->a as &$otherArmy)
        {
            if($otherArmy->location == $location) 
            {
                $otherArmy->spearmen += $spearmen;
                $otherArmy->archers += $archers;
                $otherArmy->cavalry += $cavalry;
                return;
            }
        }
        $army = new Army($spearmen, $archers, $cavalry, $location);
        array_push($this->a, $army);
    }
    public function getArmyList()
    {
        return $this->a;
    }
}
?>
