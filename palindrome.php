<!DOCTYPE html>
<html>
<head>
    <title>Palindrome Checker</title>
</head>
<body>
    <h1>Palindrome Checker</h1>
    <form method="GET">
        <label for="word">Enter a word or phrase:</label><br>
        <input type="text" id="word" name="word"><br>
        <input type="submit" value="Check">
    </form>

    <?php
    if (isset($_GET['word'])) {
        $originalString = $_GET['word'];
        //I haven't applied any filters to the input string, assuming user will enter only string or a phrase.
        $reversedString = strrev($originalString);

        if (strcasecmp($originalString, $reversedString) == 0) {
            echo "<p>'" . $originalString . "' is a palindrome.</p>";
        } else {
            echo "<p>'" .  $originalString . "' is not a palindrome.</p>";
        }
    }
    ?>
</body>
</html>
