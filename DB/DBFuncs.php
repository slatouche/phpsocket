<?php
  //session_start();
  require __DIR__ . '/DB.php';
  //require __DIR__ . '/../WebSocket.php';
  
  //$inFunc = htmlspecialchars($_POST["inFunc"]);
  //$inName = htmlspecialchars($_POST["inName"]);
  
  function Setup($inMsgObj)
  {
      global $myID, $myName, $myRoomID;
      $myName = $inMsgObj->name;
      echo "Name set to '" . $myName . "'\n";
      $myRoomID = $inMsgObj->msg->roomID;
      echo "RoomID set to '" . $myRoomID . "'\n";
      if($myRoomID != "")
      {
          JoinRoom();
      }
  }
  
  function JoinRoom()
  {
      global $myID, $myName, $myRoomID;
      $query = "Insert into users (id,username,roomID) VALUES ('" . $myID . "','" . $myName . "','" . $myRoomID . "');";
      RunQuery($query);
      echo "Joined Room \n";
  }
  
  function LeaveRoom()
  {
     global $myID, $myName, $myRoomID;
      $query = "Delete from users where username = '" . $myName . "' AND id = '" . $myID . "';";
      RunQuery($query);
      echo "Left Room \n";
  }
  
  function EndUser($inName)
  {
      $query = "Delete from users where username = '" . $inName . "';";
      echo RunQuery($query) . "\n";
  }
  
  function ResponseQuery($query)
  {
      global $DBConn;
      $result = mysqli_query($DBConn, $query);
    
      while ($row = mysqli_fetch_assoc($result)) 
      {
          return "The ID is: " . $row['id'] . " and the Username is: " . $row['username'];
      }
  }
  
  function RunQuery($query)
  {
      global $DBConn;
      $result = mysqli_query($DBConn, $query);
      //$_SESSION["username"] = $inName;
      return $result;
  }
  
?>