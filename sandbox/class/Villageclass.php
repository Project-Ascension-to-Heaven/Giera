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
                ),

            );
            $this->log('Utworzono nową wioskę', 'info');
        }
        private function drewnoGain(int $deltaTime) : float
        {
            $gain = pow($this->buildings['tartak'],2) * 10000;
            $perSecondGain = $gain / 3600;
            return $perSecondGain * $deltaTime;

        }
        // POLSKI MY NARÓD POLSKI LUD
        // KRÓLEWSKI SZCZEP PIASTOWY
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