<?php

class BlackBox
{
    private $data;

    public function addLog($message)
    {
        $this->data[] = $message;
    }

    public function getDataByEngineer(Engineer $engineer)
    {
        $engineer->data = $this->data; 
    }
}

class Plane 
{
    private $blackBox;
    public $name;
    public $currentCoordinates;
    public $finishCoordinates;
    protected $crushCoordinates;

    public function __construct()
    {
        $this->blackBox = new BlackBox();
        $this->name = 'Самолёт';
    }

    public function flyProcess()
    {
        $this->addLog('Самолёт пролетает над координатами ' . $this->currentCoordinates . '</br>');
    }

    public function crushProcess()
    {
        $this->addLog('Самолёт врезался в птицу в точке ' . $this->crushCoordinates . ' и потерпел крушение </br>');
    }
    
    public function flyAndCrush($currentCoordinates, $finishCoordinates)
    {
        $this->currentCoordinates = $currentCoordinates;
        $this->finishCoordinates = $finishCoordinates;
        
        if ($this->currentCoordinates > $this->finishCoordinates) {
            $this->addLog('Данные для полёта введены неверно </br>');
        } else {
            
            $this->crushCoordinates = mt_rand($this->currentCoordinates + 1, $this->finishCoordinates - 1);
            $this->addLog($this->name . ' вылетел из точки ' . $this->currentCoordinates . ' в точку ' . $this->finishCoordinates . '</br>');
            for ($this->currentCoordinates; $this->currentCoordinates <= $this->finishCoordinates; $this->currentCoordinates++) {
                if ($this->currentCoordinates === $this->crushCoordinates) {
                    $this->crushProcess();
                    break;
                } else {
                $this->flyProcess();
                }  
            }
        }
    }

    protected function addLog($message)
    {
        $this->blackBox->addLog($message);
    }

    public function getBoxForEngineer(Engineer $engineer)
    {
        $engineer->setBox($this->blackBox);
    }
}

class Engineer
{
    public function setBox(BlackBox $blackBox)
    {
        $this->blackBox = $blackBox;
    }

    public function takeBox(Plane $plane)
    {
        $plane->getBoxForEngineer($this);
        $this->blackBox->getDataByEngineer($this);
    }

    public function decodeBox()
    {
        echo('<pre>');
        print_r($this->data);
        echo('</pre>');
    }
}

class Boeing extends Plane
{
    public $name;

    public function __construct($name)
    {
        Parent::__construct();
        $this->name = $name;
    }

    public function flyProcess()
    {
        if ($this->currentCoordinates !== $this->crushCoordinates) {
            $this->addLog('Координаты самолёта боинг ' . $this->name . ' ' . $this->currentCoordinates . '</br>');
        }
    }

    public function crushProcess()
    {
        if ($this->currentCoordinates === $this->crushCoordinates) {
            $this->addLog('Боинг ' . $this->name . ' потерял управление в точке ' . $this->crushCoordinates . ' и упал на землю </br>');
        }
    }
}

$plane = new Plane();
$plane->flyAndCrush(16, 15);
$plane->flyAndCrush(9, 28);
$engineer = new Engineer();
$plane->getBoxForEngineer($engineer);
$engineer->takeBox($plane);
$engineer->decodeBox();

$boening = new Boeing('"Быстрый"');
$boening->flyAndCrush(9, 28);
$boening->getBoxForEngineer($engineer);
$engineer->takeBox($boening);
$engineer->decodeBox();
