<?php
require_once "../../../vendor/autoload.php";
require_once '../StatFilter.php';

use Hprose\Client;

$client = Client::create('tcp://127.0.0.1:1143/', false);
$client->addFilter(new StatFilter());

$value = range(0, 99999);
var_dump(count($client->echo($value)));
