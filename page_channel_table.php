<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Channel List</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include_once "header.html"
?>
<div class="content">
        <?php

        require_once "php/draw_channel_table.php";

        function init()
        {
            $array = array();
            $path = "files/channels.json";
            if (file_exists($path) && filesize($path) > 0) {
                $file = fopen($path, "a+");
                $json = json_decode(fread($file, filesize($path)));
                foreach ($json as $item) {
                    array_push($array, $item);
                }
            }
            return $array;
        }

        $array = init();
        drawChannelTable($array);
        ?>
    </table>
</div>
</body>
</html>
