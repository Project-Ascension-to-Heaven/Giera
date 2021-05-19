<?php
class Army {
    public $location; 
    public $targetLocation; 
    public $targetETA; 

    public $spearmen;   
    public $archers;    
    public $cavalry;

    public function __construct ($s, $a, $c, $l)
    {
        $this->spearmen = $s;
        $this->archers = $a;
        $this->cavalry = $c;
        $this->location = $l;
    }
}
?>