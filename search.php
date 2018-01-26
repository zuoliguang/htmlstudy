<?php 
header("Content-type:text/html;charset=utf-8");

echo '搜索测试<br/>';
echo '-----------------------------------------<br/>';

$s = new SphinxClient;
$s->setServer("http://cloud.xy.com/test/test_seach", 8080);
$s->setMatchMode(SPH_MATCH_ANY);
$s->setMaxQueryTime(3);
$result = $s->query("时间");
var_dump($result);