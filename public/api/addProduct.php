<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bazar_shadai';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $productName = $_POST['productName'] ?? '';
  $productPrice = $_POST['productPrice'] ?? '';
  $productCategory = $_POST['category'] ?? '';
  $productImage = $_FILES['productImage']['name'] ?? '';

  // Validate inputs
  if (empty($productName) || empty($productPrice) || empty($productCategory) || empty($productImage)) {
    echo json_encode(['error' => 'All fields are required.']);
    exit;
  }

  $base = "public/assets/";
  $targetDir = "images/" . $productCategory . '/';

  $targetFile = $targetDir . basename($productImage);
  if (!move_uploaded_file($_FILES['productImage']['tmp_name'], $base . $targetFile)) {
    echo json_encode(['error' => 'Failed to upload image.']);
    exit;
  }

  // Connect to the database
  $conn = new mysqli($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL statement
  $sql = "INSERT INTO products (name, price, category, image) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sdss", $productName, $productPrice, $productCategory, $targetFile);

  if ($stmt->execute()) {
    echo json_encode(['success' => 'Product added successfully.']);
  } else {
    echo json_encode(['error' => 'Failed to add product.']);
  }

  $stmt->close();
  $conn->close();
} else {
  echo json_encode(['error' => 'Invalid request method.']);
}
