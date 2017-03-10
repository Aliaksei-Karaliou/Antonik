<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 8</title>
</head>
<body>
<form method="post">
    <?php
    function startUp()
    {
        $string = "";
        $number = "";
        if (isset($_REQUEST["string"]) && isset($_REQUEST["number"])) {
            $string = $_REQUEST["string"];
            $number = $_REQUEST["number"];
        }
        return "<input type=\"text\" placeholder=\"Put string here\" name=\"string\" value=$string>
    <input type=\"text\" placeholder=\"Put number here\" name=\"number\" value=$number><br>
    <input type='submit' name='Button' value='Ok'>";
    }

    if (!isset($_REQUEST["Button"])) {
        echo startUp();
    } else {
        $string = $_REQUEST["string"];
        $number = $_REQUEST["number"];
        if (!is_numeric($number)) {
            echo "<div style='color: red'>Input number is not a number</div><br>";
        } else if (strlen($string) <= $number) {
            echo "<div style='color: red'>Number is bigger then string length</div><br>";
            echo startUp();
        } else {
            $substring = substr($string, $number);
            echo "Substring: $substring<br>";
            $matches = array();
            $value = preg_match("/[0-9]/", $substring, $matches);
            if (count($matches)) {
                echo "There is a number in a substring";
            } else {
                echo "There isn't a number in a substring";
            }
        }
    }
    ?>

</form>
</body>
</html>