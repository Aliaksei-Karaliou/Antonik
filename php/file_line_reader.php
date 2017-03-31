<?php
function selectHelp($file)
{
    $file = fopen("$file", "r");
    $result = "<option></option>";
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $trimed = trim($line);
            $result .= "<option value='$trimed'>$trimed</option>";
        }
    }
    return $result;
}

function selectedHelp($select, $selected)
{
    $select = str_replace("selected", "", $select);
    return str_replace("<option value=\'$selected\'>$selected</option>", "<option value=\'$selected\' selected>$selected</option>", $select);
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