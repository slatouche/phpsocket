<?php

    require __DIR__ . '/../../DB/DB.php';
    require __DIR__ . '/RoomsListBox.php';
    
    /*
    for ($i = 0; $i < 40; $i++) 
    {
        $roomListBox = new RoomsListBox("1","2","MoistButtocks,DryBollocks");
        echo $roomListBox->getHTML();
    }
    */
    
    getRoomList();
    function getRoomList()
    {
        global $DBConn;
        $query = "SELECT * FROM rooms;";
        $result = mysqli_query($DBConn, $query);
        /*
        while ($row = mysqli_fetch_assoc($result)) 
        {
          return "The ID is: " . $row['id'] . " and the Username is: " . $row['username'];
        }
        */
        if( mysqli_num_rows( $result ) == 0 )
        {
            echo "No Rooms Currently Occupied";
        }
        else 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $query = "SELECT * FROM users WHERE roomID = '" . $row['roomID'] . "';";
                $result2 = mysqli_query($DBConn, $query);
                $nameList = [];
                $idList = [];
                $numPlayers = mysqli_num_rows( $result2 );
                while ($row2 = mysqli_fetch_assoc($result2)) 
                {
                    array_push($nameList, $row2['username']);
                    array_push($idList, $row2['id']);
                }
                $roomListBox = new RoomsListBox($row['roomID'],$nameList,$idList,$numPlayers);
                echo $roomListBox->getHTML();
            }
        }
    }

?>