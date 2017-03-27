<?php
function drawChannelTable($array)
{
    require_once "classes/channel.php";
    echo "<table border='1'>";
    echo "<tr>
            <th>Name</th>
            <th>Description</th>
            <th>Country</th>
            <th>Theme</th>
            <th>Site</th>
            <th>Owner</th>
            <th>Start year</th>
            <th>Is cable</th>
        </tr>";
    foreach ($array as $value) {
        $channel = Channel::createInstanceFromArray($value);
        $name = $channel->getName();
        $description = $channel->getDescription();
        $country = $channel->getCountry();
        $theme = $channel->getTheme();
        $siteTemp = $channel->getSite();
        $site = $siteTemp !== "" ? "<a href='$siteTemp'>$siteTemp</a>" : "-";
        $owner = $channel->getOwner();
        $startYear = $channel->getStartYear();
        $cable = $channel->isCable() == true ? "Yes" : "No";
        echo "<tr>";
        echo "<td>$name</td>";
        echo "<td>$description</td>";
        echo "<td>$country</td>";
        echo "<td>$theme</td>";
        echo "<td>$site</td>";
        echo "<td>$owner</td>";
        echo "<td>$startYear</td>";
        echo "<td>$cable</td>";
        echo "<tr>";
    }
    echo "</table>";
}

?>