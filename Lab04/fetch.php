<?php
include 'db/db_connect.php';

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "item_number: " . $row["item_number"]. " - Make: " . $row["make"]. " - Model: " . $row["model"]. " - Price: " . $row["price"]. " - Quantity: " . $row["quantity"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
