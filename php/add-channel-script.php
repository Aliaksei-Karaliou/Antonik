<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All chanels</title>
    <style>
        table {
            border-spacing: 0;
            border-collapse: separate;
            width: 100%;
        }

        th {
            background: yellow;
        }
    </style>
</head>
<body>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Country</th>
        <th>Theme</th>
        <th>Site</th>
        <th>Owner</th>
    </tr>
    <?php
    include "classes/channel.php";

    function init()
    {
        $channel = null;
        if (isset($_REQUEST["name"]) && isset($_REQUEST["description"]) && isset($_REQUEST["country"]) && isset($_REQUEST["theme"]) && isset($_REQUEST["site"]) && isset($_REQUEST["owner"])) {
            $channel = Channel::createInstanceFromFields($_REQUEST["name"], $_REQUEST["description"], $_REQUEST["country"], $_REQUEST["theme"], $_REQUEST["site"], $_REQUEST["owner"]);
        }


        $array = array();
        $path = "channels.json";
        if (file_exists($path) && filesize($path) > 0) {
            $file = fopen($path, "a+");
            $json = json_decode(fread($file, filesize($path)));
            foreach ($json as $item) {
                array_push($array, $item);
            }
        }
        $file = fopen($path, "w+");
        if ($channel != null) {
            array_push($array, $channel->expose());
        }
        fwrite($file, json_encode($array));
        return $array;
    }

    function drawTable($array)
    {
        foreach ($array as $value) {
            $channel = Channel::createInstanceFromArray($value);
            $name = $channel->getName();
            $description = $channel->getDescription();
            $country = $channel->getCountry();
            $theme = $channel->getTheme();
            $site = $channel->getSite();
            $owner = $channel->getOwner();
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$description</td>";
            echo "<td>$country</td>";
            echo "<td>$theme</td>";
            echo "<td>$site</td>";
            echo "<td>$owner</td>";
            echo "<tr>";
        }
    }

    $array = init();
    drawTable($array);
    ?>
</table>
</body>
</html>
