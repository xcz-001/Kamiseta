<?php
header("Content-Type: application/json");
require '../db.php';

// Read JSON body
$input = json_decode(file_get_contents("php://input"), true);
$id = $input['id'] ?? '';

try {
  $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
  $stmt->execute([$id]);
  echo json_encode(["success" => true]);
} catch (PDOException $e) {
  http_response_code(500);
  echo json_encode(["error" => $e->getMessage()]);
}
