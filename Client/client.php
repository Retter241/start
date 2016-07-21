<?php

require_once "config.php";

$server = stream_socket_client("{$proto}://{$server_ip}:{$port}", $errNo, $ErrStr);

fwrite($server, "Hello server\n");
$response_server = stream_get_line($server, 1000, "\n");
echo $response_server. "\n";