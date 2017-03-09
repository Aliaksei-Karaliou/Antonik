<!--<!DOCTYPE html>-->
<html>
<title>Lab 5</title>
<body>
<form method="post">
    <div>Input array size:</div>
    <input type='text' name="array_size" value="<?php
    if (isset($_REQUEST['array_size']) && is_numeric($_REQUEST['array_size']) && $_REQUEST['array_size'] >= 1 && $_REQUEST['array_size'] <= 30) {
        echo $_REQUEST['array_size'];
    }
    ?>"><br>
    <input type='submit' value="Set size" name="array_size_button"><br>

    <?php
    const ARRAY_SIZE_TYPE_ERROR = "Array size should be number";
    const ARRAY_SIZE_ERROR = "Array size should be between 1 and 30";
    function get_array_size()
    {
        if (isset($_REQUEST['array_size'])) {
            $array_size = $_REQUEST['array_size'];
            if (is_numeric($array_size)) {
                if ($array_size >= 1 && $array_size <= 30) {
                    return $array_size;
                } else {
                    echo ARRAY_SIZE_ERROR;
                }
            } else {
                echo ARRAY_SIZE_TYPE_ERROR;
            }
        }
        return -1;
    }

    function echoArray(array $array)
    {
        for ($i = 0; $i < count($array); $i++) {
            echo "$array[$i] ";
        }
    }

    function swap(&$x, &$y)
    {
        $tmp = $x;
        $x = $y;
        $y = $tmp;
    }

    function swapArray(array &$array)
    {
        for ($i = 0; $i < count($array) / 2; $i++) {
            swap($array[$i], $array[count($array) - $i - 1]);
        }
    }

    $array_size = get_array_size();
    if ($array_size > 0) {
        echo "Array size: $array_size<br>";
        for ($i = 0; $i < $array_size; $i++) {
            if (isset($_REQUEST["array$i"])) {
                $value = $_REQUEST["array$i"];
            } else {
                $value = "";
            }
            echo "<input type='text' name='array$i' placeholder='array[$i]' value=$value>";
        }
        echo "<br><input type='submit' value=\"Set array\" name='array_button'><br>";
        if (isset($_REQUEST['array_button'])) {
            $array = array();
            $error = false;
            for ($i = 0; $i < $array_size; $i++) {
                if (!isset($_REQUEST["array$i"]) || count($_REQUEST["array$i"]) == 0) {
                    $error = true;
                    echo "Field $i is empty<br>";
                } else if (!is_numeric($_REQUEST["array$i"])) {
                    $_REQUEST["array$i"];
                    $error = true;
                    echo "Field $i is not numeric<br>";
                } else {
                    $array[$i] = $_REQUEST["array$i"];
                }
            }
            if (!$error) {
                echo "Straight array:<br>";
                echoArray($array);
                echo "<br>Reverse array:<br>";
                swapArray($array);
                echoArray($array);
            }
        }
    }
    ?>
</form>

</body>
</html>