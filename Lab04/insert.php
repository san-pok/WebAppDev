<?php
include 'db/db_connect.php';

$items = [
    ['Yamaha', 'FG7205', 279.99, 12],
    ['Toyota', 'TG', 3000.75, 10],
    ['Nissan', 'NisanQE', 2000, 8],
    ['Kia', 'KIATG', 800, 5],
    ['Tesla', 'Tesla03', 4000,14],
    
];

foreach ($items as $item) {
    $sql = "INSERT INTO inventory (make, model, price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $item[0], $item[1], $item[2], $item[3]);

    if ($stmt->execute()) {
        echo "New record created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
