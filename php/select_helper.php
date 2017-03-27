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

?>