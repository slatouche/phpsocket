<?php
require __DIR__ . '/Message.php';
require __DIR__ . '/DB/DBFuncs.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

$myID = "";
$myName = "";
$myRoomID = "";

class Chat implements MessageComponentInterface 
{
  protected $clients;

  public function __construct() 
  {
      $this->clients = new \SplObjectStorage;
  }

  public function onOpen(ConnectionInterface $conn) 
  {
    global $myID, $myName, $myRoomID;
    // Store the new connection to send messages to later
    $this->clients->attach($conn);
    $myID = $conn->resourceId;
    //$this->myName = $_SESSION["username"];
    echo "New connection! ({$myID})\n";
    //echo sprintf('Connection %s has connected', $this->_SESSION["username"]);
    $numRecv = count($this->clients);

    // And send messages to the clients about the new user.
    foreach ($this->clients as $client) 
    {
      if ($conn !== $client) 
      {
        //$msg = sprintf('Connection %d has connected as user #%d', $this->myID, $numRecv);
        //$msgObj = new Message("printMsg", $this->myName, $this->myID, $msg);
        //$client->send( json_encode($msgObj) );
      }
      else 
      {
        //$msg = $this->onConnTest();
        $msgObj = new Message("setup", $myName, $myID, "setup");
        $client->send( json_encode($msgObj) );
      }
    }
  }
  
  function onConnTest()
  {
    global $myID, $myName, $myRoomID;
    $numRecv = count($this->clients);
    $msg = "";
    if($myName == "")
    {
      $msg = "Sorry You Have No Name!";
    }
    else
    {
      $msg = sprintf('Welcome connection #%d. You are user #%d in this chat.', $myID, $numRecv);
    }
    return $msg;
  }

  public function onMessage(ConnectionInterface $from, $inMsg) 
  {
    global $myID, $myName, $myRoomID;
    // The clients are, in this example, are not sending any messages.
    /*$numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');*/
        
        $inMsgObj = json_decode($inMsg);
        if($inMsgObj->funcName == "php")
        {
            $func = $inMsgObj->msg->funcName;
            //echo $inMsgObj->msg->roomID;
            echo $func($inMsgObj);
        }
        //echo sprintf('%s' . "\n", $inMsg->msg);
        
        //$msg = new Message();
        //$msg->id = $from->resourceId;
        //$msg->funcName = $inMsg->funcName;
        //$msg->msg = $inMsg->msg;

        foreach ($this->clients as $client) 
        {
            if ($from !== $client) 
            {
                // The sender is not the receiver, send to each client connected
                //$client->send($msg);
                $client->send( $inMsg );
            }
            /*else 
            {
                $msg = 'You sent message ' .  $msg;
                //$client->send($msg);
            }*/
        }
  }

  public function onClose(ConnectionInterface $conn) 
  {
    global $myID, $myName, $myRoomID;
    if($myRoomID != "")
    {
      echo LeaveRoom();
    }
    // The connection is closed, remove it, as we can no longer send it
    // messages.
    $this->clients->detach($conn);

    echo "Connection {$myID} has disconnected\n \n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e) 
  {
    echo "An error has occurred: {$e->getMessage()}\n";

    $conn->close();
  }
}

?>