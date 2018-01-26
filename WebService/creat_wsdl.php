<?php
include_once('Service.php');
include_once('SoapDiscovery.class.php');

$wsdl = new SoapDiscovery('Service','soap');//第一参数为类名，也是生成wsdl的文件名Service.wsdl，第二个参数是服务的名字可以随便写
$wsdl->getWSDL();
?>