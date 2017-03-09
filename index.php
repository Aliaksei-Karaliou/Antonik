<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 6</title>
</head>
<body>
<form method="post">
    <?php

    class Matrix
    {
        private $length;
        private $width;
        private $matrix;

        public function __construct($length, $width)
        {
            $this->length = $length;
            $this->width = $width;
        }

        public function getLength()
        {
            return $this->length;
        }

        public function getWidth()
        {
            return $this->width;
        }

        public function getValue($i, $j)
        {
            if (!is_numeric($i) || !is_numeric($j)) {
                throw new UnexpectedValueException();
            } else if ($i >= 0 && $j >= 0 && $i < $this->length && $j < $this->width) {
                return $this->matrix[$i][$j];
            } else {
                throw new OutOfRangeException();
            }
        }

        public function setValue($i, $j, $value)
        {
            if (!is_numeric($i) || !is_numeric($j) || !is_numeric($value)) {
                throw new UnexpectedValueException();
            } else if ($i >= 0 && $j >= 0 && $i < $this->length && $j < $this->width) {
                $this->matrix[$i][$j] = $value;
            } else {
                throw new OutOfRangeException();
            }
        }

        function __toString()
        {
            $result = "";
            for ($i = 0; $i < $this->length; $i++) {
                for ($j = 0; $j < $this->width; $j++) {
                    if (isset($this->matrix[$i][$j]) & is_numeric($this->matrix[$i][$j])) {
                        $value = strval($this->matrix[$i][$j]);
                        $result .= "$value ";
                    } else {
                        $result = "Check array. Item array[$i][$j] is incorrect";
                        break;
                    }
                }
                $result .= "<br>";
            }
            return $result;
        }


    }


    function inputSize()
    {
        return "<input type=\"text\" placeholder=\"length\" name=\"length\" maxlength='1'>
    X
    <input type=\"text\" placeholder=\"width\" name=\"width\" maxlength='1'><br>
    <input type=\"submit\" value=\"Ok\" name=\"set_matrix_size\">
    <br>";
    }

    function checkSize()
    {
        if ((isset($_REQUEST["set_matrix_size"]) || isset($_REQUEST["set_matrix"])) && isset($_REQUEST["length"]) && isset($_REQUEST["width"])) {
            $length = $_REQUEST["length"];
            $width = $_REQUEST["width"];
            if (!is_numeric($length) || !is_numeric($width)) {
                echo inputSize();
                echo "<div style='color: red'>Length or width are not numeric</div>";
            } else if ($length <= 1 || $length >= 10 || $width <= 1 || $width >= 10) {
                echo inputSize();
                echo "<div style='color: red'>Length or width are not between 2 and 9</div>";
            } else {
                return true;
            }
        } else {
            echo inputSize();
        }
        return false;
    }

    function printMatrix()
    {
        $length = $_REQUEST["length"];
        $width = $_REQUEST["width"];
        echo "<input type=\"text\" hidden='hidden' name='length' value='$length'>";
        echo "<input type=\"text\" hidden='hidden' name='width' value='$width'>";
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $width; $j++) {
                $value = "";
                if (isset($_REQUEST["matrix$i$j"]) && strlen($_REQUEST["matrix$i$j"]) > 0) {
                    $value = $_REQUEST["matrix$i$j"];
                }
                echo "<input type=\"text\" placeholder=\"matrix[$i][$j]\" name=\"matrix$i$j\" value=$value>";
            }
            echo "<br>";
        }
        echo "<input type=\"submit\" value=\"Ok\" name=\"set_matrix\">";
    }

    if (checkSize()) {
        if (!isset($_REQUEST["set_matrix"])) {
            printMatrix();
        } else {
            $error = false;
            $length = $_REQUEST["length"];
            $width = $_REQUEST["width"];
            $matrix = new Matrix($length, $width);
            for ($i = 0; $i < $length; $i++)
                for ($j = 0; $j < $width; $j++)
                    if (isset($_REQUEST["matrix$i$j"]) && strlen($_REQUEST["matrix$i$j"]) > 0 && is_numeric($_REQUEST["matrix$i$j"])) {
                        $value = $_REQUEST["matrix$i$j"];
                        $matrix->setValue($i, $j, $value);
                    } else {
                        $value = $_REQUEST["matrix$i$j"];
                        $error = true;
                        echo "Array[$i][$j] value is not correct . It is: $value.<br>";
                        break;
                    }
            if (!$error) {
                echo "Default matrix: <br> $matrix <br>";
                try {
                    for ($i = 0; $i < $length; $i++) {
                        $max = 0;
                        for ($j = 1; $j < $width; $j++) {
                            if ($matrix->getValue($i, $j) > $matrix->getValue($i, $max)) {
                                $max = $j;
                            }
                        }
                        $max_value = $matrix->getValue($i, $max);
                        echo "In the line $i maximal element is $max_value.<br>";
                        for ($j = $max + 1; $j < $width; $j++) {
                            $matrix->setValue($i, $j, 0);
                        }
                    }
                    echo "<br>New matrix: <br> $matrix <br>";
                } catch (Exception $e) {
                    echo "Error $e";
                }
            } else {
                printMatrix();
            }
        }
    }
    ?>
</form>
</body>
</html>