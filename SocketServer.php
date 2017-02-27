<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/WebSocket.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(
  new HttpServer(
    new WsServer(
      new Chat()
    )
  ),
  8181
);
echo "Websocket server is running. Press ctrl-c to exit...\r\n";
$server->run();