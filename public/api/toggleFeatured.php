<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bazar_shadai';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_GET['id'] ?? '';
    $featured = $_GET['featured'] ?? '';

    if (empty($productId) || $featured === '') {
        echo json_encode(['success' => false, 'error' => 'Missing product ID or featured status']);
        exit;
    }

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => 'Database connection failed']);
        exit;
    }

    $sql = "UPDATE products SET featured = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $featured, $productId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Featured status updated successfully']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Product not found']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update featured status']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

?>
