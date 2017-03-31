<?php
function drawChannelTable($array)
{
    require_once "classes/channel.php";
    echo "<table border='1'>";
    echo "<tr>
            <th>Name</th>
            <th>Theme</th>
            <th>Country</th>
            <th>Site</th>
            <th>Owner</th>
            <th>Start year</th>
            <th>Address</th>
            <th>Is cable</th>
            <th>Youtube</th>
            <th>VK</th>
        </tr>";
    foreach ($array as $value) {
        $channel = Channel::createInstanceFromArray($value);
        $name = htmlentities($channel->getName());
        $country = htmlentities($channel->getCountry());
        $theme = htmlentities($channel->getTheme());
        $siteTemp = htmlentities($channel->getSite());
        $site = $siteTemp !== "" ? "<a href='$siteTemp'>$siteTemp</a>" : "-";
        $owner = htmlentities($channel->getOwner());
        $startYear = htmlentities($channel->getStartYear());
        $address = htmlentities($channel->getAddress());
        $cable = htmlentities($channel->isCable() == true ? "Yes" : "No");
        $youtubeTemp = htmlentities($channel->getYoutube());
        $youtube = $youtubeTemp !== "" ? "<a href='$youtubeTemp'>$youtubeTemp</a>" : "";
        $vkTemp = htmlentities($channel->getVk());
        $vk = htmlentities($vkTemp !== "" ? "<a href='$vkTemp'>$vkTemp</a>" : "");
        echo "<tr>";
        echo "<pre><td>$name</td></pre>";
        echo "<pre><td>$theme</td></pre>";
        echo "<pre><td>$country</td></pre>";
        echo "<pre><td>$site</td></pre>";
        echo "<pre><td>$owner</td></pre>";
        echo "<pre><td>$startYear</td></pre>";
        echo "<pre><td>$address</td></pre>";
        echo "<pre><td>$cable</td></pre>";
        echo "<pre><td>$youtube</td></pre>";
        echo "<pre><td>$vk</td></pre>";
        echo "<tr>";
    }
    echo "</table>";
}

?>