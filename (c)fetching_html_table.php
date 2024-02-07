<?php
include 'db/db_connect.php'; // Include your database connection

// Function to get unique makes
function getMakes($conn) {
    $makes = [];
    $sql = "SELECT DISTINCT make FROM inventory ORDER BY make";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $makes[] = $row['make'];
        }
    }
    return $makes;
}

$makes = getMakes($conn); // Get makes for select control

// Handle the form submission
$selectedMake = isset($_POST['make']) ? $_POST['make'] : '';

// SQL to fetch records based on the selected make
$sql = "SELECT * FROM inventory";
if (!empty($selectedMake) && $selectedMake != 'all') {
    $sql .= " WHERE make = '$selectedMake'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory List</title>
</head>
<body>
    <h2>Inventory List</h2>

    <!-- Form for the select control -->
    <form action="" method="post">
        <label for="make">Select Make:</label>
        <select name="make" id="make">
            <option value="all">All Makes</option>
            <?php foreach($makes as $make): ?>
                <option value="<?php echo $make; ?>" <?php echo ($selectedMake == $make) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($make); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php
        echo "</br>";
        ?>
        <button type="submit">Search</button>
    </form>

    <!-- HTML Table for displaying records -->
    <table border="1">
        <tr>
            <th>Item Number</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["item_number"] . "</td>";
                echo "<td>" . $row["make"] . "</td>";
                echo "<td>" . $row["model"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No results found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
