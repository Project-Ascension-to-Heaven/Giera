<?php
class Village 
{
    private $buildings; 
    private $storage;
    private $upgradeCost;

    public function __construct()
    {
        $this->buildings = array(
            'townHall' => 1,
            'tartak' => 1,
            'kopalniaMetali' => 1,
        );
        $this->storage = array(
            'drewno' => 0,
            'metale' => 0,
        );
        $this->upgradeBuilding = array(
            'tartak' => array(
                2 => array(
                    'drewno' => 100,
                    'metale' => 50,
                ),
                3 => array(
                    'drewno' => 100,
                    'metale' => 50,
                ),
            ),
            'kopalniaMetali' => array(
                2 => array(
                        'drewno' => 100,
                ),
                    3 => array(
                        'drewno' => 300,
                        'metale' => 150,
                ),
            
            )

         );
    }
    public function drewnoGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['tartak'],2) * 10000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    public function metaleGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['kopalniaMetali'],2) * 5000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    public function gain($deltaTime)
    {
        $this->storage['drewno'] += $this->drewnoGain($deltaTime);
        $this->storage['metale'] += $this->metaleGain($deltaTime);
    }
    public function upgradeBuilding(string $buildingName) : bool
    {
        $currentLVL = $this->buildings[$buildingName];
        $cost = $this->upgradeCost[$buildingName][$currentLVL+1];
        foreach ($cost as $key => $value) {
            if($value > $this->storage[$key])
            return false;
        }
        foreach ($cost as $key => $value){
           $this->storage[$key] -= $value;
        }
        $this->buildings[$buildingName] += 1; 
        return true;
    }
    public function showHourGain(string $resource) : string
    {
        switch($resource){
            case 'wood';
                return $this->drewnoGain(3600);
        break;
            case 'metale';
                return $this->metaleGain(3600);
        break;
        default:
            echo "Nie ma takiego surowca!";
        break;
        }
    }
    public function showStorage(string $resource) : string
    {
        if(isset($this->storage[$resource]))
        {
            return floor($this->storage[$resource]);
        }
        else
        {
            return "Nie ma takiego surowca";
        }
    }
}


?>