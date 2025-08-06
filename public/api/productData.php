<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'bazar_shadai';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $productCategory = $_GET['productCategory'] ?? '';
  $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
  $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 12;

  // Calculate offset
  $offset = ($page - 1) * $limit;

  $conn = new mysqli($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Count total records for pagination
  $countSql = "SELECT COUNT(*) as total FROM products WHERE category = ?";
  $countStmt = $conn->prepare($countSql);
  $countStmt->bind_param("s", $productCategory);
  $countStmt->execute();
  $countResult = $countStmt->get_result();
  $totalCount = $countResult->fetch_assoc()['total'];
  $totalPages = ceil($totalCount / $limit);
  $countStmt->close();

  // Get paginated products
  $sql = "SELECT * FROM products WHERE category = ? LIMIT ? OFFSET ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sii", $productCategory, $limit, $offset);
  $stmt->execute();
  $result = $stmt->get_result();

  $products = [];
  while ($row = $result->fetch_assoc()) {
    $products[] = $row;
  }

  $stmt->close();
  $conn->close();

  // Return both products and pagination metadata
  $response = [
    'products' => $products,
    'currentPage' => $page,
    'totalPages' => $totalPages,
    'totalProducts' => $totalCount,
    'limit' => $limit
  ];

  header('Content-Type: application/json');
  echo json_encode($response);
}
