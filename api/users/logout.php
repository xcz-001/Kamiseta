<?php
session_start();
session_unset();
session_destroy();
http_response_code(200);
echo json_encode(["success" => true]);
// This code logs out the user by clearing the session and returning a success response.
?>