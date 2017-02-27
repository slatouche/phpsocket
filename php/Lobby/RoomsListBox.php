<?php

class RoomsListBox
{
    public function __construct($inRoomID, $inNameList, $inIDList, $inNumPlayers) 
    {
        $this->roomID = $inRoomID;
        $this->nameList = implode(", ", $inNameList);
        $this->idList = $inIDList;
        /*if(strlen($inNameList) > 0)
        {
            $this->numPlayers = count(explode(",", $inNameList));
        }
        else
        {
            $this->numPlayers = 0;
        }*/
        $this->numPlayers = $inNumPlayers;
    }
    public $roomID  = "";
    public $nameList = "";
    public $idList = "";
    public $numPlayers  = "";
    
    public function getHTML()
    {
        $boxHTML = 
        '<div id="room' . $this->roomID . '" class="roomBox col-xs-6 col-md-4">
            <div class="col-xs-6 col-md-8">
                RoomID: ' . $this->roomID . '<br>
                NumPlayers: ' . $this->numPlayers . ' <br>
                Players: ' . $this->nameList . '
            </div>
            <div class="col-xs-6 col-md-4 joinButton">
                <button class="btn btn-default joinButton" type="submit" onclick="joinRoom(' . $this->roomID . ')">Join Room</button>
            </div>
        </div>';
        
        return $boxHTML;
    }
}

?>