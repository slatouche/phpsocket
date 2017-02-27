<?php
  //session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Websocket test site</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/Login.js"></script>
    <script src="lib/parsley.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/7.3/styles/github.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="css/parsley.css" rel="stylesheet">
    <style class="example">
      h4 {
        margin-bottom: 10px;
      }
      p.parsley-success {
        color: #468847;
        background-color: #DFF0D8;
        border: 1px solid #D6E9C6;
      }
      p.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
      }
      .centerDiv
      {
        width:50%;
        height:100%;
        margin: auto;
        text-align: center;
      }
      #nameBox
      {
        text-align: center;
      }
      .loadingGif
      {
        border-radius: 25px;
        width:50px;
        height:50px;
      }
    </style>
  </head>
  <body>
    
    <?php
      //echo "Username: " . $_SESSION["username"] . "<br>";
    ?>
    
    <div class="centerDiv">
      <h1>Websocket test site</h1>
      <br>
      <h3>Pick A Username To Play As!</h3>
      <!--<input onkeydown="handle(event)" class="form-control" name="nameBox" required=""/>
      <button onclick="setName();">Use Name!</button>-->
    </div>
    
    <div class="centerDiv">
      
      <form id="demo-form" >
        <input id="nameBox" type="text" class="form-control" name="username" data-parsley-type="alphanum" required="" autofocus minlength="5" maxlength="20" data-parsley-errors-container="#meinError" onfocusout="hideError()">
        <br>
        <input type="submit" class="btn btn-default" value="User Name">
        
      </form>
      
      <div class="bs-callout bs-callout-warning hidden">
        <h4>Error!</h4>
        <p id="meinError"></p>
        <p id="meinError2"></p>
      </div>
      
      <div class="bs-callout bs-callout-info hidden">
        <h4>Yay!</h4>
        <p>Everything seems to be ok :)</p>
      </div>
      
      <br>
      <div id="loadingGif" hidden>
        <!--<img class="loadingGif" src="http://i.imgur.com/J9GINgl.gif"></img>-->
        <!--<img class="loadingGif" src="http://i.imgur.com/7asyMIW.gif"></img>-->
        <img class="loadingGif" src="https://www.lesznowola.pl/bundles/velacmssolutionwiszniamala/images/Preloader_8.gif"></img>
      </div>
      
    </div>
    
    <script type="text/javascript">
      $(function () {
        $('#demo-form').parsley().on('field:validated', function(fieldInstance) {
          var ok = $('.parsley-error').length === 0;
          //$('.bs-callout-info').toggleClass('hidden', !ok);
          //var arrErrorMsg = fieldInstance.getErrorsMessages();
          //var errorMsg = arrErrorMsg.join(';');
          //alert(errorMsg);
          if($('#meinError2').text() !== "")
          {
            $('#meinError2').text("");
          }
          $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() 
        {
          $('#nameBox').blur();
          //console.log($('#nameBox').val());
          setName($('#nameBox').val());
          
          //Call Server Name Validation Here
          
          
          return false; // Don't submit form for this demo
        });
      });
      
      function hideError()
      {
        $('.bs-callout-warning').toggleClass('hidden', true);
      }
    </script>
  </body>
</html>