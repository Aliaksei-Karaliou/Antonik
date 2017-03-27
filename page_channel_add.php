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
    <form method="post">
        <div class="field">
            <label>Name*</label>
            <input type="text" name="name" required>
        </div>
        <div class="field">
            <label>Theme*</label>
            <select name="theme" required>
                <?php
                include "php/file_line_reader.php";
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
            <label>Address</label>
            <input type="text" name="address">
        </div>
        <div class="field">
            <label>Is cable</label>
            <input type="checkbox" name="cable">
        </div>
        <div class="field">
            <label>Youtube channel</label>
            <input type="url" name="youtube">
        </div>

        <div class="field">
            <label>VK Page</label>
            <input type="url" name="vk">
        </div>
        <button name="submit" value="OK">OK</button>

        <?php

        function validate()
        {
            $errors = array();
            $errors[0] = !isset($_REQUEST["name"]) || $_REQUEST["name"] === "";
            $themes = getAllLines("sources/channel-themes.txt");
            $errors[1] = !isset($_REQUEST["theme"]) || !in_array($_REQUEST["theme"], $themes, true);
            $countries = getAllLines("sources/countries.txt");
            $errors[2] = !isset($_REQUEST["country"]) || ($_REQUEST["country"] !== '' && !in_array($_REQUEST["country"], $countries, true));
            $errors[3] = !isset($_REQUEST["site"]) || ($_REQUEST["site"] !== '' && !filter_var($_REQUEST["site"], FILTER_VALIDATE_URL));
            $errors[4] = !isset($_REQUEST["owner"]);
            $errors[5] = !isset($_REQUEST["startYear"]) || !is_numeric($_REQUEST["startYear"]) || $_REQUEST["startYear"] > 2017 || $_REQUEST["startYear"] < 1900;
            $errors[6] = !isset($_REQUEST["address"]);
            $errors[7] = false;
            $errors[8] = !isset($_REQUEST["youtube"]) || ($_REQUEST["youtube"] !== '' && (!filter_var($_REQUEST["site"], FILTER_VALIDATE_URL) || !strpos($_REQUEST["youtube"], "youtube.com")));
//            $errors[9] = !isset($_REQUEST["vk"]) || $_REQUEST["vk"] !== '' || !filter_var($_REQUEST["vk"], FILTER_VALIDATE_URL) || !strpos($_REQUEST["vk"], "vk.com");
            return $errors;
        }

        if (isset($_REQUEST["submit"])) {
            require_once "php/classes/channel.php";
            require_once "php/get_json_list.php";

            $errors = validate();
            $isError = false;
            for ($i = 0; $i < count($errors); $i++) {
                if ($errors[$i] == true) {
                    $isError = true;
                }
            }
            if (!$isError) {
                $channel = Channel::createInstanceFromFields($_REQUEST["name"], $_REQUEST["theme"], $_REQUEST["country"], $_REQUEST["site"], $_REQUEST["owner"], $_REQUEST["startYear"], $_REQUEST["address"], isset($_REQUEST["cable"]) ? true : false, $_REQUEST["youtube"], $_REQUEST["vk"]);
                $path = "files/channels.json";
                $array = getJsonList($path);
                $file = fopen($path, "w+");
                if ($channel != null) {
                    array_push($array, $channel->expose());
                }
                fwrite($file, json_encode($array));
            }
            var_dump($errors);
            $alert = $isError ? "Fix your errors" : "Channel added";
            echo "<script>alert(\"$alert\")</script>";
        }
        ?>
    </form>
</div>
</body>
</html>