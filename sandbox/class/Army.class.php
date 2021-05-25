<?php
class Army {
    public $location; 
    public $targetLocation; 
    public $targetETA; 

    public $infantry;   
    public $archers;    
    public $cavalry;

    public function __construct ($i, $a, $c, $l)
    {
        $this->infantry = $i;
        $this->archers = $a;
        $this->cavalry = $c;
        $this->location = $l;
    }
}
?>