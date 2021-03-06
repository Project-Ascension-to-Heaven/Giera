<?php
require_once('Villageclass.php');
require_once('Log.class.php');
class GameManager
{
    public $v;
    public $l;
    public $t;

    public function __construct()
    {
        $this->l = new Log();
        $this->l->log("Tworzę nową gre...", 'gameManager', 'info');
        $this->v = new Village($this);
        $this->t = time();

    }
    public function deltaTime() : int
    {
        return time() - $this->t;
    }
    public function sync()
    {
        $this->v->gain($this->deltaTime());

        $this->t = time();
    }
}
?>
