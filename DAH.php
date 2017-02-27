<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Websocket test site</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="js/Message.js"></script>
    <script type="text/javascript" src="js/DAH/DAHWSFuncs.js"></script>
    <script src="js/WebSocket.js"></script>
    
    <style class="example">
        .centerDiv
        {
            /*width:50%;
            height:100%;
            margin: auto;*/
            text-align: center;
        }
        .roomBox
        {
            background-color: yellow;
        }
        .roomBox > div:nth-of-type(odd) 
        {
            background: #c0c0c0;
        }
        .loadingGif
        {
            border-radius: 25px;
            width:50px;
            height:50px;
        }
        .scrollDiv
        {
            overflow:hidden;
            overflow-y: scroll;
            height:400px;
        }
        .scrollDiv > div:nth-of-type(odd) 
        {
            background: #e0e0e0;
        }
        .roomInfo
        {
            width : 100%;
            height: 100%;
        }
        .joinButton
        {
            height: 100%;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid centerDiv">
        
        <div class="row">
            <h1>
            <?php
                echo "Room " . htmlspecialchars($_GET["roomID"]);
            ?>
            </h1>
            <br>
        </div>
        
        <div class="row">
            
        </div>
        
    </div>
  </body>
</html>