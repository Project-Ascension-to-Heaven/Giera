<?php
class Village 
    {
        private $gm;
        private $buildings; 
        private $storage;
        private $upgradeBuilding; 

        public function __construct($gameManager)
        {
            $this->gm = $gameManager;
            $this->log('Tworzę nową wioskę', 'info');
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
                        'drewno' => 200,
                        'metale' => 100,
                        'monety' => 80,

                    ),
                    4 => array(
                        'drewno' => 350,
                        'metale' => 150,
                        'monety' => 120,

                    ),
                    5 => array(
                        'drewno' => 500,
                        'metale' => 200,
                        'monety' => 180,

                    ),
                    6 => array(
                        'drewno' => 750,
                        'metale' => 300,
                        'monety' => 200,

                    ),
                    7 => array(
                        'drewno' => 900,
                        'metale' => 450,
                        'monety' => 250,

                    ),
                    8 => array(
                        'drewno' => 1000,
                        'metale' => 600,
                        'monety' => 350,

                    ),
                    9 => array(
                        'drewno' => 1500,
                        'metale' => 900,
                        'monety' => 450,

                    ),                    
                    10 => array(
                        'drewno' => 2500,
                        'metale' => 1200,
                        'monety' => 700,

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
                        'drewno' => 450,
                        'metale' => 200,
                        'monety' => 150,

                    ),
                    5 => array(
                        'drewno' => 600,
                        'metale' => 300,
                        'monety' => 300,

                    ),
                    6 => array(
                        'drewno' => 750,
                        'metale' => 450,
                        'monety' => 350,

                    ),
                    7 => array(
                        'drewno' => 900,
                        'metale' => 700,
                        'monety' => 500,

                    ),
                    8 => array(
                        'drewno' => 1200,
                        'metale' => 900,
                        'monety' => 700,

                    ),
                    9 => array(
                        'drewno' => 1800,
                        'metale' => 1100,
                        'monety' => 850,

                    ),
                    10 => array(
                        'drewno' => 2500,
                        'metale' => 1500,
                        'monety' => 1000,

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
                        'drewno' => 350,
                        'metale' => 450,
                        'monety' => 300,
                        'townHall' => 2,
                    ),
                    5 => array(
                        'drewno' => 500,
                        'metale' => 600,
                        'monety' => 400,

                    ),
                    6 => array(
                        'drewno' => 750,
                        'metale' => 700,
                        'monety' => 550,

                    ),
                    7 => array(
                        'drewno' => 900,
                        'metale' => 850,
                        'monety' => 700,

                    ),
                    8 => array(
                        'drewno' => 1200,
                        'metale' => 950,
                        'monety' => 850,

                    ),
                    9 => array(
                        'drewno' => 1700,
                        'metale' => 1200,
                        'monety' => 1000,

                    ),
                    10 => array(
                        'drewno' => 2300,
                        'metale' => 1550,
                        'monety' => 1200,

                    ),
                ),
                'skarbowka' => array(
                    2 => array(
                        'drewno' => 200,
                        'metale' => 75,
                        'jedzenie' => 120,
                    ),
                    3 => array(
                        'drewno' => 400,
                        'metale' => 140,
                        'jedznie' => 240,

                    ),
                    4 => array(
                        'drewno' => 550,
                        'metale' => 250,
                        'jedznie' => 300,

                    ),
                    5 => array(
                        'drewno' => 750,
                        'metale' => 400,
                        'jedznie' => 450,

                    ),
                    6 => array(
                        'drewno' => 900,
                        'metale' => 550,
                        'jedznie' => 550,

                    ),
                    7 => array(
                        'drewno' => 1100,
                        'metale' => 650,
                        'jedznie' => 700,

                    ),
                    8 => array(
                        'drewno' => 1400,
                        'metale' => 750,
                        'jedznie' => 850,

                    ),
                    9 => array(
                        'drewno' => 1800,
                        'metale' => 900,
                        'jedznie' => 1000,
                    ),
                    10 => array(
                        'drewno' => 2400,
                        'metale' => 1200,
                        'jedznie' => 1200,
                    ),
                ),
                'townHall' => array(
                    2 => array(
                        'drewno' => 300,
                        'monety' => 400,
                        'jedzenie' => 300,
                    ),
                    3 => array(
                        'drewno' => 600,
                        'monety' => 800,
                        'jedzenie' => 600,
                    ),
                    4 => array(
                        'drewno' => 1200,
                        'monety' => 1600,
                        'jedzenie' => 1200,
                    ),
                    5 => array(
                        'drewno' => 2400,
                        'monety' => 3200,
                        'jedzenie' => 2400,
                    )
                ),

            );
            $this->log('Utworzono nową wioskę', 'info');
        }
        public function buildingLevelList() : array
        {
            return $this->buildings;
        }
        private function drewnoGain(int $deltaTime) : float
        {
            $gain = pow($this->buildings['tartak'],2) * 10000;
            $perSecondGain = $gain / 3600;
            return $perSecondGain * $deltaTime;

        }
        private function metaleGain(int $deltaTime) : float
        {
            $gain = pow($this->buildings['kopalniaMetali'],2) * 5000;
            $perSecondGain = $gain / 3600;
            return $perSecondGain * $deltaTime;

        }
        private function jedzenieGain(int $deltaTime) : float
        {
            $gain = pow($this->buildings['farmy'],2) * 3500;
            $perSecondGain = $gain / 3600;
            return $perSecondGain * $deltaTime;

        }
        private function monetyGain(int $deltaTime) : float
        {
            $gain = pow($this->buildings['skarbowka'],2) * 1000;
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
            $cost = $this->upgradeBuilding[$buildingName][$currentLVL+1];
            foreach ($cost as $key => $value) {

                if($value > $this->storage[$key])
                {
                    $this->log("Nie udało się ulepszyć budynku - brak surowca: ".$key, "warning");
                    return false;
                }
            }
            foreach ($cost as $key => $value) {

                $this->storage[$key] -= $value;
            }
            //$this->buildings[$buildingName] += 1; 
            //$this->log("Ulepszono budynek: ".$this->buildings[$buildingName], "info");
            //odwołanie do schedulera
            $this->gm->s->add(time()+60, 'Village', 'scheduleBuildingUpgrade', $buildingName);
            return true;
        }
        public function scheduleBuildingUpgrade(string $buildingName)
        {
            $this->buildings[$buildingName] += 1; 
            $this->log("Ulepszono budynek: ".$this->buildings[$buildingName], "info");
        }
        public function checkBuildingUpgrade(string $buildingName) : bool
        {
            $currentLVL = $this->buildings[$buildingName];
            if(!isset($this->upgradeCost[$buildingName][$currentLVL+1]))
                return false;
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