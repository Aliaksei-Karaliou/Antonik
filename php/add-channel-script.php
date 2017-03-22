<?php
include "classes/channel.php";

$channel = Channel::createInstanceFromFields($_REQUEST["name"], $_REQUEST["description"], $_REQUEST["country"], $_REQUEST["theme"], $_REQUEST["site"], $_REQUEST["owner"]);


$array = array();
$path = "channels.json";
$file = fopen($path, "a+");
if (filesize($path) > 0) {
    $json = json_decode(fread($file, filesize($path)));
    foreach ($json as $item) {
        array_push($array, $item);
    }
}
array_push($array, $channel->expose());
fwrite($file, json_encode($array));
echo json_encode($array);
?>
