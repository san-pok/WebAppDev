<?php
include 'db/db_connect.php'; // Include your database connection

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

// Insert new record
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $make = $_POST['new_make'];
    $model = $_POST['new_model'];
    $price = $_POST['new_price'];
    $quantity = $_POST['new_quantity'];
    
    $sqlInsert = "INSERT INTO inventory (make, model, price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("ssii", $make, $model, $price, $quantity);
    $stmt->execute();
}

// Fetch records for display
$selectedMake = isset($_POST['make']) ? $_POST['make'] : '';
$sql = "SELECT * FROM inventory";
if (!empty($selectedMake) && $selectedMake != 'all') {
    $sql .= " WHERE make = '$selectedMake'";
}
$result = $conn->query($sql);

$makes = getMakes($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory List</title>
</head>
<body>
    <h2>Inventory List</h2>

    <!-- Form for adding a new record -->
    <h3>Add New Item</h3>
    <form action="" method="post">
        <input type="hidden" name="action" value="add">
        Make: <input type="text" name="new_make"> </br>
        Model: <input type="text" name="new_model"> </br>
        Price: <input type="number" name="new_price"> </br>
        Quantity: <input type="number" name="new_quantity"></br>
        <button type="submit">Add</button></br>
    </form>

    <!-- Form for the select control -->
    <form action="" method="post">
        <label for="make">Select Make:</label>
        <select name="make" id="make">
            <option value="all">All Makes</option>
            <?php foreach($makes as $make): ?>
                <option value="<?php echo htmlspecialchars($make); ?>" <?php echo ($selectedMake == $make) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($make); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Search</button>
        <br>
        <hr>
        <hr>

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
        ?>
    </table>
</body>
</html>
