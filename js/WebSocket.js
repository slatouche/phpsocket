// Edit these variables to match your environent.
var ws_host = 'phpsocket-slatouche578.c9.io';
var ws_port = '80';
var ws_folder = '';
var ws_path = '/websocket';
var myID = "";
var myName = sessionStorage.getItem('username');
var myRoomID = getRoomID();
//move to index page if not logging in with a name
if(myName == null)
{
    location.replace("index.php");
}

// We are using wss:// as the protocol because Cloud9 is using
// HTTPS. In case you try to run this, using HTTP, make sure
// to change this to ws:// .
var ws_url = 'wss://' + ws_host;

if (ws_port != '80' && ws_port.length > 0) 
{
    ws_url += ':' + ws_port;
}
ws_url += ws_folder + ws_path;

var conn = new WebSocket(ws_url);

conn.onopen = function(e) 
{
    // Spit this out in the console so we can tell if the
    // connection was successfull.
    var msg = {funcName:"Setup", roomID:myRoomID};
    console.log("Connection established!");
    var msgObj = new Message("php", myName, myID, msg);
    conn.send(JSON.stringify(msgObj));
    //myName = sessionStorage.getItem('username');
};

function setup(inData)
{
    myID = inData.id;
    console.log(myName + " : " + myID);
    
    //All is setup now
    joined();
}

conn.onmessage = function(inData) 
{
    // When ever a message is recieved, from the server, append
    // the message to the existing text in the chat area.
    //$('#chat').append(inMsg.data + '<br />');
    
    //Json Parse inData
    var data = JSON.parse(inData.data);
    //console.log(data);
    
    //Call Function From data
    if(data.namespace != "")
    {
        //window[data.namespace][data.funcName](data.id, data.msg);
        window[data.namespace][data.funcName](data);
    }
    else
    {
        window[data.funcName](data);
    }
    //else if(data.funcName == "printMsg")
    //{
    //    window[data.funcName](data.msg);
    //}
    //else
    //{
    //    window[data.funcName](data.id, data.msg);
    //}
}

conn.onclose = function(e) 
{
    console.log("Connection Disconnected!");
    //location.replace("index.php");
};

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function getRoomID()
{
    var url = window.location.href;
    var substring = "DAH.php";
    if(url.indexOf(substring) !== -1)
    {
        //console.log("roomID: " + getParameterByName("roomID"));
        return getParameterByName("roomID");
    }
}