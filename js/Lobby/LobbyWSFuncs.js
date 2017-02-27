function joined(inData)
{
    console.log("Joined Lobby");
}

function joinRoom(inRoomID)
{
    sessionStorage.setItem("myRoomID", inRoomID); 
    //location.replace(\'DAH.php?roomID=' . $this->roomID . '\');
    console.log('Joining Room');
}