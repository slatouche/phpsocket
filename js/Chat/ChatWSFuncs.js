function joined()
{
    var msgObj = new Message("printMsg", myName, myID, "");
    msgObj.msg = "Welcome " + myName + " your ID is " + myID;
    printMsg(msgObj);
    //console.log(myID);
}

function printMsg(inData)
{
    $('#chat').append(inData.msg + '<br>');
}

function sendText()
{
    var msgObj = new Message("printMsg", myName, myID, "");
    msgObj.msg = myName + ": " + $('#textBox').val();
    //Send to clients
    conn.send(JSON.stringify(msgObj));
    //And print to own screen
    msgObj.msg = "You: " + $('#textBox').val();
    printMsg(msgObj);
    $('#textBox').val("");
    $('#textBox').focus();
}

function drawImage(inData)
{
    $('#chat').append("<img src=" + inData.msg + " alt='Image' height='300' width='400'>" + '<br>');
}

function sendImageURL()
{
    var msgObj = new Message("drawImage", myName, myID, $('#textBox').val());
    //Send to clients
    conn.send(JSON.stringify(msgObj));
    //And draw on own screen
    drawImage(msgObj);
    $('#textBox').val("");
    $('#textBox').focus();
}

function handle(e)
{
    if(e.keyCode === 13)
    {
        e.preventDefault(); // Ensure it is only this code that rusn
        sendText();
    }
}