<?php
require("phpMQTT.php");

$host   = "riset.revolusi-it.com";
$port     = 1883;
$username = "Anin";
$password = "12345678";
$mqtt = new bluerhinos\phpMQTT($host, $port, "G.211.19.0070".rand());
if(!$mqtt->connect(true,NULL,$username,$password)){
  exit(1);
}

// subscribe ke topik
$topics['iot/test'] = array("qos"=>0, "function"=>"procmsg");
$mqtt->subscribe($topics,0);

while($mqtt->proc()){
}

$mqtt->close();
function procmsg($topic,$msg){
  echo "\r\n Msg Recieved: $msg";
}

?>