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
        include "php/file_line_reader.php";
        $themes = selectHelp("sources/channel-themes.txt");
        $countries = selectHelp("sources/countries.txt");
        echo " <form method=\"post\">
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
            <label>Address</label>
            <input type=\"text\" name=\"address\">
        </div>
        <div class=\"field\">
            <label>Is cable</label>
            <input type=\"checkbox\" name=\"cable\">
        </div>
        <div class=\"field\">
            <label>Youtube channel</label>
            <input type=\"url\" name=\"youtube\">
        </div>

        <div class=\"field\">
            <label>VK Page</label>
            <input type=\"url\" name=\"vk\">
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

        $channel = Channel::createInstanceFromFields($_REQUEST["name"], $_REQUEST["theme"], $_REQUEST["country"], $_REQUEST["site"], $_REQUEST["owner"], $_REQUEST["startYear"], $_REQUEST["address"], isset($_REQUEST["cable"]) ? true : false, $_REQUEST["youtube"], $_REQUEST["vk"]);

        $result = array();
        foreach ($channel_list as $value) {
            $item = Channel::createInstanceFromArray($value);

            $item_name = $item->getName();
            $name = $channel->getName();
            if ($name !== $item_name && $name !== "") {
                continue;
            }

            $item_theme = $item->getTheme();
            $theme = $channel->getTheme();
            if ($theme !== $item_theme && $theme !== "") {
                continue;
            }

            $item_country = $item->getCountry();
            $country = $channel->getCountry();
            if ($country !== $item_country && $country !== "") {
                continue;
            }

            $item_site = $item->getSite();
            $site = $channel->getSite();
            if ($site !== $item_site && $site !== "") {
                continue;
            }

            $item_owner = $item->getOwner();
            $owner = $channel->getOwner();
            if ($owner !== $item_owner && $owner !== "") {
                continue;
            }

            $item_startYear = $item->getStartYear();
            $startYear = $channel->getStartYear();
            if ($startYear !== $item_startYear && $startYear !== "") {
                continue;
            }

            $item_address = $item->getAddress();
            $address = $channel->getAddress();
            if ($address !== $item_address && $address !== "") {
                continue;
            }

            $item_cable = $item->isCable();
            $cable = $channel->isCable();
            if ($cable !== $item_cable && $cable !== "") {
                continue;
            }

            $item_youtube = $item->getYoutube();
            $youtube = $channel->getYoutube();
            if ($youtube !== $item_youtube && $youtube !== "") {
                continue;
            }

            $item_vk = $item->getVk();
            $vk = $channel->getVk();
            if ($vk !== $item_vk && $vk !== "") {
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