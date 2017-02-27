<?php

class Message 
{
    public function __construct($inFunc, $inName, $inID, $inMsg) 
    {
        $this->funcName = $inFunc;
        $this->name = $inName;
        $this->id = $inID;
        $this->msg = $inMsg;
    }
    public $namespace  = "";
    public $funcName  = "";
    public $name = "";
    public $id = "";
    public $msg = "";
}

?>
	
   