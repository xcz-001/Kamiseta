<?php
require '../db.php';
if (
  !isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK ||
    empty($_POST['name']) ||
    empty($_POST['description']) ||
    !isset($_POST['qty']) ||
    !isset($_POST['price'])
) {
    http_response_code(400);
    echo json_encode(["error" => "Missing or invalid required fields"]);
    exit;
}

$name = $_POST['name'];
$description = $_POST['description'];
$qty = (int)$_POST['qty'];
$price = (float)$_POST['price'];

// Save image
$target_dir = "../../uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$filename = uniqid() . "_" . basename($_FILES["image"]["name"]);
$target_file = $target_dir . $filename;

if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to upload image"]);
    exit;
}

$image_path = "uploads/" . $filename;

$stmt = $pdo->prepare("INSERT INTO products (name, description, qty, price, image) VALUES (?, ?, ?, ?, ?)");
try {
    $stmt->execute([$name, $description, $stock, $price, $image_url]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "DB Error: " . $e->getMessage()]);
    exit;
}

http_response_code(201);
echo json_encode(["success" => true]);
?>
