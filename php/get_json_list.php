<?php
function getJsonList($path)
{
    $array = array();

    if (file_exists($path) && filesize($path) > 0) {
        $file = fopen($path, "a+");
        $json = json_decode(fread($file, filesize($path)));
        foreach ($json as $item) {
            array_push($array, $item);
        }
    }

    return $array;
}

?>