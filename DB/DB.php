<?php
    
    //Connect to the database
    $host = "127.0.0.1";
    $user = "slatouche578";                     //Your Cloud 9 username
    $pass = "";                                 //Remember, there is NO password by default!
    $db = "phpsocket";                          //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306
    
    $DBConn = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

?>