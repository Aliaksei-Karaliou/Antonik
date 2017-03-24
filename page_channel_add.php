<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 9</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include "header.html";
?>
<div class="content">
    <form method="get">
        <div class="field">
            <label>Name*</label>
            <input type="text" name="name" required>
        </div>
        <div class="field">
            <label>Theme*</label>
            <select name="theme" required>
                <?php
                include "php/select.php";
                editSelect("sources/channel-themes.txt");
                ?>
            </select>
        </div>
        <div class="field">
            <label>Broadcasted country</label>
            <select name="country">
                <?php
                editSelect("sources/countries.txt");
                ?>
            </select>
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>
        <div class="field">
            <label>Logo</label>
            <input type="file" name="logo" accept=".png,.jpg">
        </div>
        <div class="field">
            <label>Site</label>
            <input type="url" name="site">
        </div>
        <div class="field">
            <label>Owner</label>
            <input type="text" name="owner">
        </div>
        <div class="field">
            <label>Start Year</label>
            <input type="number" name="startYear" min="1900" max="2017">
        </div>
        <div class="field">
            <label>Is cable</label>
            <input type="checkbox" name="cable" value="Yes">
        </div>
        <button name="submit" value="OK">OK</button>

        <?php

        if (isset($_REQUEST["submit"])) {
            include "php/classes/channel.php";
            $channel = Channel::createInstanceFromFields($_REQUEST["name"], $_REQUEST["description"], $_REQUEST["country"], $_REQUEST["theme"], $_REQUEST["site"], $_REQUEST["owner"], $_REQUEST["startYear"], isset($_REQUEST["cable"]) ? true : false);
            $array = array();
            $path = "files/channels.json";

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
        }
        ?>
    </form>
</div>
</body>
</html>