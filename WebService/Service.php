<?php
# 编写webservice 服务端
class Service
{
	public function setTest($str)
	{
		return ['str'=>"Your string is '$str'"];
	}
}

$service = new SoapServer(null, array('uri' =>'http://test.js.com/WebService','location'=>'http://test.js.com/WebService/Service.php'));  
$service->setClass("Service"); //! 注册Service类的所有方法  
$service->handle(); //! 处理请求 
?>