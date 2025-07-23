<?php
require '../db.php'; // Include DB connection
header('Content-Type: application/json'); // Set response to JSON

// Get product ID from POST request
$id = $_POST['id'];

// Fetch existing product record from DB to compare and possibly delete old image
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?"); // Prepare SELECT query
$stmt->execute([$id]); // Execute with ID param
$existing = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch associative array of product

// If product not found, return error
if (!$existing) {
  echo json_encode(["success" => false, "error" => "Product not found"]);
  exit;
}

// Assign new values, fallback to existing if field is empty (logic for optional updates)
$name = $_POST['name'] ?: $existing['name']; // Use new name or existing
$price = $_POST['price'] ?: $existing['price'];
$stock = $_POST['stock'] ?: $existing['stock'];
$description = $_POST['description'] ?: $existing['description'];
$category = $_POST['category'] ?: $existing['category'];

// Default filename is the old one
$filename = $existing['filename'];

// If a new image is uploaded, delete the old image first then upload new
if (!empty($_FILES['image']['name'])) { // Check if a new file is uploaded

  // Construct full path to old image
  $oldImage = "../../uploads/" . $existing['filename'];

  // If old file exists, delete it to avoid clutter
  if (file_exists($oldImage)) {
    unlink($oldImage); // Delete old image
  }

  // Extract just the filename from uploaded file
  $filename = basename($_FILES['image']['name']); // Secure only the filename

  // Move new file to uploads folder
  move_uploaded_file($_FILES['image']['tmp_name'], "../../uploads/$filename");
}

// Try updating the database record with new values
try {
  $update = $pdo->prepare("UPDATE products SET name=?, price=?, stock=?, description=?, category=?, filename=? WHERE id=?"); // Prepare update
  $update->execute([$name, $price, $stock, $description, $category, $filename, $id]); // Execute with data
  echo json_encode(["success" => true]); // Return success
} catch (PDOException $e) {
  // If update fails, return DB error
  echo json_encode(["success" => false, "error" => $e->getMessage()]);
}
