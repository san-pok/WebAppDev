<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="quiz.php" method="get">
    <?php
    $file = fopen("quiz_data.txt", "r");
    $questionNumber = 1;

    while (($line = fgets($file)) !== false) {
        list($question, $options, $correctAnswer) = explode('*', $line);
        $options = explode(',', $options);
        echo "<p>$questionNumber. $question</p>";

        foreach ($options as $key => $option) {
            $optionValue = chr(97 + $key); // Convert 0,1,2,3 to a,b,c,d
            echo "<input type=\"radio\" name=\"question$questionNumber\" value=\"$optionValue\">$option<br>";
        }

        $questionNumber++;
    }

    fclose($file);
    ?>
    <input type="submit" value="Submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $file = fopen("quiz_data.txt", "r");
    $score = 0;
    $questionNumber = 1;

    while (($line = fgets($file)) !== false) {
        list($question, $options, $correctAnswer) = explode('*', $line);
        $correctAnswer = trim($correctAnswer); // Remove any trailing whitespace

        $submittedAnswer = isset($_GET["question$questionNumber"]) ? $_GET["question$questionNumber"] : '';
        if ($submittedAnswer === $correctAnswer) {
            echo "<p>Question $questionNumber: $submittedAnswer (correct)</p>";
            $score++;
        } else {
            echo "<p>Question $questionNumber: $submittedAnswer (incorrect, correct answer: $correctAnswer)</p>";
        }

        $questionNumber++;
    }

    fclose($file);
    echo "<h3>Your score: $score/5</h3>";
}
?>

    
</body>
</html>