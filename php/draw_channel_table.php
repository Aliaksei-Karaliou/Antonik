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
        $name = $channel->getName();
        $country = $channel->getCountry();
        $theme = $channel->getTheme();
        $siteTemp = $channel->getSite();
        $site = $siteTemp !== "" ? "<a href='$siteTemp'>$siteTemp</a>" : "-";
        $owner = $channel->getOwner();
        $startYear = $channel->getStartYear();
        $address = $channel->getAddress();
        $cable = $channel->isCable() == true ? "Yes" : "No";
        $youtubeTemp = $channel->getYoutube();
        $youtube = $youtubeTemp !== "" ? "<a href='$youtubeTemp'>$youtubeTemp</a>" : "";
        $vkTemp = $channel->getVk();
        $vk = $vkTemp !== "" ? "<a href='$vkTemp'>$vkTemp</a>" : "";
        echo "<tr>";
        echo "<td>$name</td>";
        echo "<td>$theme</td>";
        echo "<td>$country</td>";
        echo "<td>$site</td>";
        echo "<td>$owner</td>";
        echo "<td>$startYear</td>";
        echo "<td>$address</td>";
        echo "<td>$cable</td>";
        echo "<td>$youtube</td>";
        echo "<td>$vk</td>";
        echo "<tr>";
    }
    echo "</table>";
}

?>