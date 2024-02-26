<!DOCTYPE html>
<html>
<head>
    <title>Simple Online Quiz</title>
</head>
<body>
    <h2>Simple Quiz APP</h2>
    <form action="quiz.php" method="get">
        <p>1. What does PHP stand for?</p>
        <input type="radio" name="question1" value="a">Personal Home Page<br>
        <input type="radio" name="question1" value="b">Private Home Page<br>
        <input type="radio" name="question1" value="c">Program Home Page<br>
        <input type="radio" name="question1" value="d">Public Home Page<br>

        <p>2. Which HTML tag is used to define an internal style sheet?</p>
        <input type="radio" name="question2" value="a">&lt;style &gt;<br>
        <input type="radio" name="question2" value="b">&lt;script&gt;<br>
        <input type="radio" name="question2" value="c">&lt;link&gt;<br>
        <input type="radio" name="question2" value="d">&lt;meta&gt;<br>

        <p>3. What does CSS stand for?</p>
        <input type="radio" name="question3" value="a">Computer Style Sheets<br>
        <input type="radio" name="question3" value="b">Creative Style Sheets<br>
        <input type="radio" name="question3" value="c">Cascading Style Sheets<br>
        <input type="radio" name="question3" value="d">Colorful Style Sheets<br>

        <p>4. In PHP, which symbol is used to start variables?</p>
        <input type="radio" name="question4" value="a">$<br>
        <input type="radio" name="question4" value="b">@<br>
        <input type="radio" name="question4" value="c">#<br>
        <input type="radio" name="question4" value="d">&<br>

        <p>5. Which HTML attribute specifies an alternate text for an image, if the image cannot be displayed?</p>
        <input type="radio" name="question5" value="a">title<br>
        <input type="radio" name="question5" value="b">src<br>
        <input type="radio" name="question5" value="c">longdesc<br>
        <input type="radio" name="question5" value="d">alt<br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if (!empty($_GET)) {
        $answers = ['a', 'a', 'c', 'a', 'd'];
        $score = 0;

        for ($i = 1; $i <= 5; $i++) {
            $question = 'question' . $i;
            if (isset($_GET[$question])) {
                echo "<p>Question $i : " . $_GET[$question];
                if ($_GET[$question] == $answers[$i - 1]) {
                    echo "(correct)</p>";
                    $score++;
                } else {
                    echo "(incorrect, correct answer: " . $answers[$i - 1] . ")</p>";
                }
            }
        }

        echo "<h3>Your score: $score/5</h3>";
    }
    ?>
</body>
</html>
