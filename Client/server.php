<?php
/**
 * Created by PhpStorm.
 * User: Retter241
 * Date: 21.07.2016
 * Time: 20:08
 */
require_once "config.php";

$server = stream_socket_server("{$proto}://{$server_ip}:{$port}", $errno, $ErrStr);

while ($client = stream_socket_accept($server, -1)){
    echo "New Client\n";
    $responce_client = stream_get_line($client,1000,"\n");
    echo "Client say".$responce_client."\n";
    fwrite($client, "Hello Client\n");


}

