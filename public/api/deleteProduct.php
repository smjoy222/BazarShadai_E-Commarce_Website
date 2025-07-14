<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bazar_shadai';

if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
  $conn = new mysqli($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $id = $_GET['id'];
  $sql = "DELETE FROM products WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    echo json_encode(["success" => "Product deleted successfully"]);
  } else {
    echo json_encode(["failed" => "Product not found"]);
  }

  $stmt->close();
  $conn->close();
}
