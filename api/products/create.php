<?php
require '../db.php';
if (
  !isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK ||
    empty($_POST['name']) ||
    empty($_POST['description']) ||
    !isset($_POST['category']) ||
    !isset($_POST['stock']) ||
    !isset($_POST['price'])
) {
    http_response_code(400);
    echo json_encode(["error" => "Missing or invalid required fields"]);
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$stock = (int)$_POST['stock'];
$price = (float)$_POST['price'];
$filename =  basename($_FILES["image"]["name"]);;


// Save image
$target_dir = "../../uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . $filename;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to upload image"]);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO products (name, description, category, stock, price, filename) VALUES (?, ?, ?, ?, ?, ?)");
try {
    $stmt->execute([$name, $description, $category, $stock, $price, $filename]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "DB Error: " . $e->getMessage()]);
    exit;
}

http_response_code(201);
echo json_encode(["success" => true]);
