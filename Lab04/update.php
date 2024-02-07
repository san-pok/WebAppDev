<?php
include 'db/db_connect.php';

$item_number = 5; // The item_number of the row  to update
$new_make = "newModel";
$new_model = "UpadtedModel";
$new_price = 150;
$new_quantity = 15;

$sql = "UPDATE inventory SET make=?, model=?, price=?, quantity=? WHERE item_number=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiii", $new_make, $new_model, $new_price, $new_quantity, $item_number);

if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
