<?php header("Content-type: text/html; charset=windows-1251") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html">
    <title>Lab 10</title>
    <style>
        table {
            border-spacing: 0;
            border-collapse: separate;
        }

        th {
            background: yellow;
            border-sp
        }
    </style>
</head>
<body>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Title</th>
    </tr>
    <?php
    $file = file_get_contents("source/index.html");
    preg_match_all("/<td.*class=\"catbg\" height=\"18\"><img src=\".*\" style=\".*\" alt=\"\" title=\"\"> <a href=\".*?catselect=(.*)\">(.*)<\/a>/", $file, $array);
    $keys = $array[1];
    $values = $array[2];
    for ($i = 0; $i < count($keys); $i++) {
        echo "<tr><td>$i</td><td>$keys[$i]</td><td>$values[$i]</td></tr>";
    }
    //    var_dump($array[1]);
    //    var_dump($array[2]);
    ?>
</table>
</body>
</html>