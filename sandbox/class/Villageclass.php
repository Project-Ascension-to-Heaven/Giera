<?php
class Village 
{
    private $buildings; 
    private $storage;
    private $gm;

    public function __construct($gameManager)
    {
        $this->buildings = array(
            'townHall' => 1,
            'tartak' => 1,
            'kopalniaMetali' => 1,
            'farmy' => 1,
            'skarbowka' => 1,
        );
        $this->storage = array(
            'drewno' => 0,
            'metale' => 0,
            'monety' => 0,
            'jedzenie' => 0,
        );
        $this->upgradeBuilding = array(
            'tartak' => array(
                2 => array(
                    'drewno' => 100,
                    'metale' => 50,
                ),
                3 => array(
                    'drewno' => 150,
                    'metale' => 75,
                    'monety' => 80,
                ),
                4 => array(
                    'drewno' => 250,
                    'metale' => 150,
                    'monety' => 200,
                ),
                5 => array(
                    'drewno' => 500,
                    'metale' => 300,
                    'monety' => 400,
                ),
                6 => array(
                    'drewno' => 1000,
                    'metale' => 300,
                    'monety' => 800,
                ),
                7 => array(
                    'drewno' => 2000,
                    'metale' => 500,
                    'monety' => 1200,
                ),
                8 => array(
                    'drewno' => 4500,
                    'metale' => 950,
                    'monety' => 2100,
                ),
                9 => array(
                    'drewno' => 8000,
                    'metale' => 1000,
                    'monety' => 4200,
                ),
                10 => array(
                    'drewno' => 16000,
                    'metale' => 2000,
                    'monety' => 8400,
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
                4 => array(
                    'drewno' => 600,
                    'metale' => 250,
                    'monety' => 200,
                ),
                5 => array(
                    'drewno' => 900,
                    'metale' => 450,
                    'monety' => 400,
                ),
                6 => array(
                    'drewno' => 1200,
                    'metale' => 650,
                    'monety' => 800,
                ),
                7 => array(
                    'drewno' => 2400,
                    'metale' => 1200,
                    'monety' => 1000,
                ),
                8 => array(
                    'drewno' => 4500,
                    'metale' => 1500,
                    'monety' => 1500,
                ),
                9 => array(
                    'drewno' => 9000,
                    'metale' => 3000,
                    'monety' => 2500,
                ),
                10 => array(
                    'drewno' => 18000,
                    'metale' => 6000,
                    'monety' => 5000,
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
                4 => array(
                    'drewno' => 200,
                    'metale' => 300,
                    'monety' => 200,
                ),
                5 => array(
                    'drewno' => 400,
                    'metale' => 450,
                    'monety' => 350,
                ),
                6 => array(
                    'drewno' => 800,
                    'metale' => 550,
                    'monety' => 600,
                ),
                7 => array(
                    'drewno' => 1400,
                    'metale' => 750,
                    'monety' => 800,
                ),
                8 => array(
                    'drewno' => 4500,
                    'metale' => 950,
                    'monety' => 2100,
                ),
                9 => array(
                    'drewno' => 8000,
                    'metale' => 1400,
                    'monety' => 4200,
                ),
                10 => array(
                    'drewno' => 16000,
                    'metale' => 2800,
                    'monety' => 8400,
                ),
            ),
            'skarbowka' => array(
                2 => array(
                    'drewno' => 200,
                    'metale' => 75,
                    'monety' => 20,
                ),
                3 => array(
                    'drewno' => 400,
                    'metale' => 140,
                    'monety' => 100,
                ),
                4 => array(
                    'drewno' => 800,
                    'metale' => 280,
                    'monety' => 200,
                ),
                5 => array(
                    'drewno' => 1600,
                    'metale' => 500,
                    'monety' => 400,
                ),
                6 => array(
                    'drewno' => 3200,
                    'metale' => 1000,
                    'monety' => 800,
                ),
                7 => array(
                    'drewno' => 6400,
                    'metale' => 1800,
                    'monety' => 1600,
                ),
                8 => array(
                    'drewno' => 12800,
                    'metale' => 3600,
                    'monety' => 3200,
                ),
                9 => array(
                    'drewno' => 18000,
                    'metale' => 5500,
                    'monety' => 6400,
                ),
                10 => array(
                    'drewno' => 24500,
                    'metale' => 8000,
                    'monety' => 10000,
                ),
            ),
        );
    }
    private function drewnoGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['tartak'],2) * 1000000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    private function metaleGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['kopalniaMetali'],2) * 500000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    private function jedzenieGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['farmy'],2) * 350000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    private function monetyGain(int $deltaTime) : float
    {
        $gain = pow($this->buildings['skarbowka'],2) * 100000;
        $perSecondGain = $gain / 3600;
        return $perSecondGain * $deltaTime;

    }
    public function gain($deltaTime)
    {
        $this->storage['drewno'] += $this->drewnoGain($deltaTime);
        $this->storage['metale'] += $this->metaleGain($deltaTime);
        $this->storage['jedzenie'] += $this->jedzenieGain($deltaTime);
        $this->storage['monety'] += $this->monetyGain($deltaTime);
    }
    public function upgradeBuilding(string $buildingName) : bool
    {
        $currentLVL = $this->buildings[$buildingName];
        if($currentLVL < 10)
        {
         $cost = $this->upgradeBuilding[$buildingName][$currentLVL+1];
         foreach ($cost as $key => $value) {

             if($value > $this->storage[$key])
                 return false;
         }
         foreach ($cost as $key => $value) {

             $this->storage[$key] -= $value;
         }
         $this->buildings[$buildingName] += 1; 
         return true;
        }else
            {
            function_alert("A WIDZIAŁEŚ KIEDYŚ TRUTA +11???? BO JA KURWA NIE");
            return false;
            }
    }
    public function checkBuildingUpgrade(string $buildingName) : bool
    {
        $currentLVL = $this->buildings[$buildingName];
        $cost = $this->upgradeBuilding[$buildingName][$currentLVL+1];
        foreach ($cost as $key => $value) {

            if($value > $this->storage[$key])
                return false;
        }
        return true;
    }
    public function showHourGain(string $resource) : string
    {
        switch($resource){
            case 'drewno';
                return $this->drewnoGain(3600);
        break;
            case 'metale';
                return $this->metaleGain(3600);
        break;
             case 'jedzenie';
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
            return "Nie ma takiego surowca!";
        }
    }
    public function buildingLVL(string $building) : int 
    {
        return $this->buildings[$building];
    }
    public function log(string $message, string $type)
    {
        $this->gm->l->log($message, 'village', $type);
    }
}



?>