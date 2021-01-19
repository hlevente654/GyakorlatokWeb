<?php
class Car{
    public $nev;
    public $ev;
    public $ajto;
    public $szin;

    public function __construct($nev,$ev,$ajto,$szin){
        $this->nev=$nev;
        $this->ev=$ev;
        $this->ajto=$ajto;
        $this->szin=$szin;
    }
    public function htmlTableRow(){
        return "<tr><td>".$this->nev."</td><td>".$this->ev."</td><td>".$this->ajto."</td><td>".$this->szin."</td></tr>";
    }
}

?>