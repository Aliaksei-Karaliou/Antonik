<?php
function editSelect($file)
{
    $file = fopen("$file", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            echo "<option>$line</option>";
        }
    }
}

?>