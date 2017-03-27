<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once "header.html";
?>
<div class="content">
    <?php
    function init()
    {
        include "php/select_helper.php";
        $themes = selectHelp("sources/channel-themes.txt");
        $countries = selectHelp("sources/countries.txt");
        echo "<form method=\"get\">
            <div class=\"field\">
                <label>Name</label>
                <input type=\"text\" name=\"name\">
            </div>
            <div class=\"field\">
                <label>Theme</label>
                <select name=\"theme\">
                    $themes
                </select>
            </div>
            <div class=\"field\">
                <label>Broadcasted country</label>
                <select name=\"country\">
                    $countries
                </select>
            </div>
            <div class=\"field\">
                <label>Description</label>
                <textarea name=\"description\"></textarea>
            </div>
            <div class=\"field\">
                <label>Site</label>
                <input type=\"url\" name=\"site\">
            </div>
            <div class=\"field\">
                <label>Owner</label>
                <input type=\"text\" name=\"owner\">
            </div>
            <div class=\"field\">
                <label>Start Year</label>
                <input type=\"number\" name=\"startYear\" min=\"1900\" max=\"2017\">
            </div>
            <div class=\"field\">
                <label>Is cable</label>
                <input type=\"checkbox\" name=\"cable\" value=\"Yes\">
            </div>
            <button name=\"submit\" value=\"OK\">OK</button>
            </form>";
    }

    if (isset($_REQUEST["submit"])) {
        require_once "php/get_json_list.php";
        require_once "php/classes/channel.php";
        require_once "php/draw_channel_table.php";

        $path = "files/channels.json";
        $array = getJsonList($path);

        $channel_list = array();
        foreach ($array as $item) {
            array_push($channel_list, $item);
        }

        $name = $_REQUEST["name"];
        $description = $_REQUEST["description"];
        $country = $_REQUEST["country"];

        $result = array();
        foreach ($channel_list as $item) {
            $channel = Channel::createInstanceFromArray($item);
            $item_name = $channel->getName();
            if ($name !== $item_name && $name !== "") {
                continue;
            }
            $item_description = $channel->getDescription();
            if ($description !== $item_description && $description !== "") {
                continue;
            }
            $item_country = $channel->getCountry();
            if ($country !== $item_country && $country !== "") {
                continue;
            }
            array_push($result, $item);
        }
        drawChannelTable($result);
    } else {
        init();
    }
    ?>
</div>
</body>
</html>