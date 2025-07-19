<?php
require '../db.php';
header('Content-Type: application/json');

$id = $_POST['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$existing = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$existing) {
  echo json_encode(["success" => false, "error" => "Product not found"]);
  exit;
}

$name = $_POST['name'] ?: $existing['name'];
$price = $_POST['price'] ?: $existing['price'];
$stock = $_POST['stock'] ?: $existing['stock'];
$description = $_POST['description'] ?: $existing['description'];
$category = $_POST['category'] ?: $existing['category'];

$filename = $existing['filename'];
if (!empty($_FILES['image']['name'])) {
  $filename = basename($_FILES['image']['name']) ;
  move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$filename");
}

try {
  $update = $pdo->prepare("UPDATE products SET name=?, price=?, stock=?, description=?, category=?, filename=? WHERE id=?");
  $update->execute([$name, $price, $stock, $description, $category, $filename, $id]);
  echo json_encode(["success" => true, "category" => $category]);
} catch (PDOException $e) {
  echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
