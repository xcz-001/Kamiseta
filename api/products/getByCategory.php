<?php
header("Content-Type: application/json");
require '../db.php';

// Read JSON body
$input = json_decode(file_get_contents("php://input"), true);
$category = $input['category'] ?? '';

try {
    if ($category === 'all') {
        $stmt = $pdo->query("SELECT * FROM products");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE category = ?");
        $stmt->execute([$category]);
    }

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
