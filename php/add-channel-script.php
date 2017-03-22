<?php
include "classes/channel.php";

function printArray($array)
{
    foreach ($array as $item) {
        echo "$item<br>";
    }
}

$channel = new Channel($_REQUEST["name"], $_REQUEST["frequency"], $_REQUEST["theme"], $_REQUEST["description"], $_REQUEST["site"], $_REQUEST["owner"]);
$array = array();
array_push($array, $channel->expose());
echo json_encode($array);
?>
