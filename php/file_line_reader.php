<?php
function selectHelp($file)
{
    $file = fopen("$file", "r");
    $result = "<option></option>";
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $result .= "<option>$line</option>";
        }
    }
    return $result;
}

function getAllLines($file)
{
    $array = array();
    $file = fopen("$file", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            array_push($array, trim($line));
        }
    }
    return $array;
}

?>