<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 9</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once "header.html";
?>
<div class="content">
    <form method="post" enctype="multipart/form-data">
        <div class="field">
            <label>Name*</label>
            <input type="text" name="name" required>
        </div>
        <div class="field">
            <label>Theme*</label>
            <select name="theme" required>
                <?php
                include "php/select_helper.php";
                $themes = selectHelp("sources/channel-themes.txt");
                echo $themes;
                ?>
            </select>
        </div>
        <div class="field">
            <label>Broadcasted country</label>
            <select name="country">
                <?php
                $countries = selectHelp("sources/countries.txt");
                echo $countries;
                ?>
            </select>
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>
        <div class="field">
            <label>Logo</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
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
            require_once "php/classes/channel.php";
            require_once "php/get_json_list.php";

            $channel = Channel::createInstanceFromFields($_REQUEST["name"], $_REQUEST["description"], $_REQUEST["country"], $_REQUEST["theme"], $_REQUEST["site"], $_REQUEST["owner"], $_REQUEST["startYear"], isset($_REQUEST["cable"]) ? true : false);
            $path = "files/channels.json";
            $array = getJsonList($path);
            $file = fopen($path, "w+");
            if ($channel != null) {
                array_push($array, $channel->expose());
            }
            fwrite($file, json_encode($array));

            require_once "php/photo_uploader.php";
            $name = $_REQUEST["name"];
            upload("files/logo/$name", "logo");
        }
        ?>
    </form>
</div>
</body>
</html>