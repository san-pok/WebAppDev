<!DOCTYPE html>
<html>
<head>
    <title>Members of the Hawthorn Bowling Club</title>
</head>
<body>
    <H1>Members of the Hawthorn Bowling Club</H1>
    <br/>

    <!-- Search form -->
    <form method="GET">
        Enter Name: <input type="text" name="searchName">
        <input type="submit" value="Search">
    </form>

    <?php
    $file = "bowlers.txt";
    if(isset($_GET['searchName'])) {
        $searchName = $_GET['searchName'];
        $found = false;
        
        if(file_exists($file)) {
            $bowlers = file($file);
            foreach($bowlers as $bowler) {
                $curBowler = explode(",", $bowler);
                if(trim($curBowler[0]) == $searchName) {
                    echo "<p>Phone Number for " . $searchName . ": " . trim($curBowler[1]) . "</p>";
                    $found = true;
                    break;
                }
            }
            if(!$found) {
                echo "<p>No phone number found for " .$searchName . ".</p>";
            }
        } else {
            echo "No registered member found!";
        }
    }
    ?>

    <!-- Existing code for displaying all members -->
    <?php 
    if(file_exists($file)) {
        $bowlers = file($file);
        echo "<table border='1'><th>Name</th><th>Phone</th>";
        foreach ($bowlers as $bowler) {
            $curBowler = explode(",", $bowler);
            echo "<tr><td>" . htmlspecialchars($curBowler[0]) . "</td>";
            echo "<td>" . htmlspecialchars(trim($curBowler[1])) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No registered member found!";
    }
    ?>
</body>
</html>
