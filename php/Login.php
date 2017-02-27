<?php
  //session_start();
  require __DIR__ . '/../DB/DB.php';
  
  /*if(isset($_POST['inName']) && !empty($_POST['inName']) && isset($_POST['inFunc']) && isset($_POST['inFunc']) == "add") 
  {
      //And now to perform a simple query to make sure it's working
      $query = "SELECT * FROM users WHERE username = '" . htmlspecialchars($_POST["inName"]) . "';";
      $result = mysqli_query($DBConn, $query);
    
      while ($row = mysqli_fetch_assoc($result)) 
      {
          echo "The ID is: " . $row['id'] . " and the Username is: " . $row['username'];
      }
  }*/
  
  $inFunc = htmlspecialchars($_POST["inFunc"]);
  $inName = htmlspecialchars($_POST["inName"]);
  
  if($inFunc === 'check')
  {
      $query = "SELECT * FROM users WHERE username = '" . htmlspecialchars($_POST["inName"]) . "';";
      echo ResponseQuery($query);
  }
  else if($inFunc === 'add')
  {
      $query = "INSERT INTO users (username) VALUES ('" . htmlspecialchars($_POST["inName"]) . "');";
      //echo "";
      echo RunQuery($query);
  }
  else
  {
      echo 0;
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
      global $DBConn, $inName;
      $result = mysqli_query($DBConn, $query);
      //$_SESSION["username"] = $inName;
      return $result;
  }
  
?>