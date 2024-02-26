<!DOCTYPE html>
<html>
<head>
    <title>Exercise d</title>
</head>
<body>
    <h3>Please input  a Number</h3>
    <form >
        <input type="text" name="number" placeholder="Enter a number ">
        <input type="submit" value="submit">
    </form>

    <?php
    if (isset($_GET['number']) && is_numeric($_GET['number']) && $_GET['number'] > 0) {
        $number = $_GET['number'];
        echo "<h3>Result is shown as below:</h3>";
        echo "<p>";

        for ($i = $number; $i >= 1; $i--) {
            if ($i == 1 || $i == $number) {
                echo $i;  // Always output the number itself and 1
            } else if ($number % $i != 0) {
                echo $i;  // Output numbers that do not divide the given number evenly
            }

            if ($i > 1) {
                echo "</br>";  // Adding a line break
            }
        }

        echo "</p>";
    }
    ?>
</body>
</html>
