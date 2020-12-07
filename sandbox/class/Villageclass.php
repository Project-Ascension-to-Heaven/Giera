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
            'farmy' => 1,
            'skarbowka' => 0,
        );
        $this->storage = array(
            'drewno' => 0,
            'metale' => 0,
            'jedzenie' => 0,
            'monety' => 0,
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
                    'monety' => 80,
                ),
            ),
            'kopalniaMetali' => array(
                2 => array(
                    'drewno' => 100,
                ),
                3 => array(
                     'drewno' => 300,
                     'metale' => 150,
                     'monety' => 100,
                ),
            
            ),
            'farmy' => array(
                2 => array(
                    'drewno' => 50,
                    'metale' => 100,
                ),
                3 => array(
                    'drewno' => 100,
                    'metale' => 200,
                    'monety' => 200,
                ),
            ),
            'skarbówka' => array(
                1 => array(
                    'drewno' => 200,
                    'metale' => 75,
                    'jedzenie' => 100,
                ),
                2 => array(
                    'drewno' => 400,
                    'metale' => 140,
                    'jedznie' => 120,
                ),
            ),

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
    public function jedzenieGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['army'],2) * 3500;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    public function monetyGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['skarbowka'],2) * 1000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    public function gain($deltaTime)
    {
        $this->storage['drewno'] += $this->drewnoGain($deltaTime);
        $this->storage['metale'] += $this->metaleGain($deltaTime);
        $this->storage['jedznie'] += $this->jedzenieGain($deltaTime);
        $this->storage['monety'] += $this->monetyGain($deltaTime);
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
             case 'jedznie';
                return $this->jedzenieGain(3600);
        break;
            case 'monety';
                return $this->monetyGain(3600);
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