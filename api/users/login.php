<?php
session_start();
header("Content-Type: application/json");
require '../db.php';

//get request data
$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

//check if username and password are not null
if (!$username || !$password) {
    http_response_code(400);
    echo json_encode(["error" => "Username and password required"]);
    exit;
}

//db query cleaning and execution
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);

//return processing
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    http_response_code(200);
    echo json_encode([
        "success" => true,
        "user" => [
            "id" => $user['id'],
            "username" => $user['username'],
            "role" => $user['role'],
            "email" => $user['email']
        ]
    ]);
    exit;
} else {
    http_response_code(401);
    echo json_encode(["error" => "Invalid credentials"]);
    exit;
}
// This code handles user login, checking the provided credentials against the database.
// If successful, it sets session variables for user ID and role, and returns user info.
// If the credentials are invalid, it returns a 401 Unauthorized response.
// If the request is missing username or password, it returns a 400 Bad Request response.