<?php
include('hprose/src/Hprose.php');

function getMsg($name) {
    return "Hello " . $name;
}

class Test
{
	public function test_a($str){
		return "test_name"."_".$str;
	}

	public function test_jisuan()
	{
		$arr = [];
		for ($i=0; $i < 100; $i++) { 
			$arr[] = $i;
		}
		return json_encode($arr);
	}
}


$server = new Hprose\Http\Server();
// $server->addFunction("getMsg");
$server->add(new Test());
$server->handle();

