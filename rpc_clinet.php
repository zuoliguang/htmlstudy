<?php
include('hprose/src/Hprose.php');

$client = new Hprose\Http\Client("http://test.js.com/rpc_server.php",false); 
echo $client->test_jisuan();

