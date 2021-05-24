<?php
class Scheduler
{
    public $schedule; // (timestamp $t, klasa $c, funkcja $f, parametr $p)
    private $gm;

    public function __construct($gm)
    {
        $this->schedule = array();
        $this->gm = $gm;
        $this->log('utworzono schedulera', 'info');
    }

    public function add($t, $c, $f, $p)
    {
        $task = array('timestamp' => $t, 'class' => $c, 'function' => $f, 'param' => $p);
        array_push($this->schedule, $task);
        $this->log('Utworzono do schedulera nową pozyjcę', 'info');
    }

    public function check()
    {
        /* $todo = array();
        $this->log('kompletuję listę zaległych rzeczy do zrobienia', 'info');
        foreach($this->schedule as $task)
        {
            if($task['timestamp'] >= $timestamp && $timestamp <= time())
            {
                array_push($todo, $task);
            }
        }
        $this->execute($todo);
        */
        foreach($this->schedule as $key =>$task){
            if($task['timestamp'] <= time())
                if($this->execute($task))
                {
                    unset($this->schedule[$key]);
                    $this->schedule = array_values($this->schedule);
                }
                else
                {
                    $this->log("Nie udało się wykonać zadania z timestamp: ".$task['timestamp'], 'info');
                }
        }
    }

    public function execute($task) : bool
    {
        /*
        if(count($taskList) > 0)
            $this->log('wykonuję listę zadań', 'info');
        foreach($taskList as $task)
        {
            if($task['class'] == 'Village')
            {
                //przetwarzanie zadań wioski
                $className = $task['class'];
                $functionName = $task['function'];
                $param = $task['param'];
                $this->gm->v->{$functionName}($param);
                $this->log("wywołuję funkcję $functionName dla klasy $className z parametrem $param", 'info');
                $this->gm->v->gain($task['timestamp'] - $this->gm->t);
                $this->log("synchronizuję surowce w wiosce", 'info');
                $this->gm->t = $task['timestamp'];
                $this->log("synchornizuję czas gry do czasu ukończenia zadania", 'info');
            }
        }*/
        if($task['class'] == 'Village')
        {
            //przetwarzanie zadań wioski
            $className = $task['class'];
            $functionName = $task['function'];
            $param = $task['param'];
            $this->log("Synchronizuję surowce w wiosce do stanu na czas ".date('d.m.Y H:i:s',$task['timestamp']), 'info');
            $this->gm->v->gain($task['timestamp'] - $this->gm->t);
            $this->log("Wywołuję funkcję $functionName dla klasy $className z parametrem $param", 'info');
            $this->gm->v->{$functionName}($param);
            $this->log("Synchornizuję czas gry do czasu ukończenia zadania ", 'info');
            $this->gm->t = $task['timestamp'];
            
        }
        return true;
    }

    public function log(string $message, string $type)
    {
        $this->gm->l->log($message, 'scheduler', $type);
    }
}
?>