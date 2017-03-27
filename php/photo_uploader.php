<?php
function upload($path, $file)
{
    echo $_FILES[$file]["name"]."<br>";
    var_dump($_FILES[$file]);
    echo $path;
    return @copy($_FILES[$file]['tmp_name'], $path);
}

?>