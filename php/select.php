<?php
function editSelect($file)
{
    $file = fopen("$file", "r");
    echo "<option></option>";
    if ($file) {
        while (($line = fgets($file)) !== false) {
            echo "<option>$line</option>";
        }
    }
}

?>