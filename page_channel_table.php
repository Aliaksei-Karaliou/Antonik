<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All chanels</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include "header.html"
?>
<div class="content">
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Country</th>
            <th>Theme</th>
            <th>Site</th>
            <th>Owner</th>
            <th>Start year</th>
            <th>Is cable</th>
        </tr>
        <?php

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

        function drawTable($array)
        {
            foreach ($array as $value) {
                include "php/classes/channel.php";
                $channel = Channel::createInstanceFromArray($value);
                $name = $channel->getName();
                $description = $channel->getDescription();
                $country = $channel->getCountry();
                $theme = $channel->getTheme();
                $site = $channel->getSite();
                $siteTd = $site !== "" ? "<a href='$site'>$site</a>" : "-";
                $owner = $channel->getOwner();
                $startYear = $channel->getStartYear();
                $cable = $channel->isCable() == true ? "Yes" : "No";
                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td>$description</td>";
                echo "<td>$country</td>";
                echo "<td>$theme</td>";
                echo "<td>$siteTd</td>";
                echo "<td>$owner</td>";
                echo "<td>$startYear</td>";
                echo "<td>$cable</td>";
                echo "<tr>";
            }
        }

        $array = init();
        drawTable($array);
        ?>
    </table>
</div>
</body>
</html>
