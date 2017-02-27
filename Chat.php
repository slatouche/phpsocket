<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Websocket test site</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/Message.js"></script>
    <script type="text/javascript" src="js/Chat/ChatWSFuncs.js"></script>
    <script src="js/WebSocket.js"></script>
    <script type="text/javascript">
        function sendImage(immGLink)
        {
            var msg = new Message();
            msg.funcName = "drawImage";
            msg.msg = immGLink;
            
            conn.send(JSON.stringify(msg));
        }
    </script>
  </head>
  <body>
    <h1>Websocket test site</h1>
    <img id="immiG" src="">
    <div id="chat"></div>
    <br>
    <input onkeydown="handle(event)" type="text" id="textBox"/>
    <button onclick="sendText();">Send Text!</button>
    <button onclick="sendImageURL();">Send Image!</button>
  </body>
</html>