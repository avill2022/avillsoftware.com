<?php
session_start();
header('Content-Type: application/json');
require("../../common/MySQLIDatabase.php");
// 1. Get POST data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($mysqli->connect_error) {
    echo json_encode(["status" => "ERROR", "message" => "DB connection failed"]);
    exit;
}

// 3. Prepare and check user
$stmt = $mysqli->prepare("SELECT id, email, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // If password is hashed with password_hash()
    if (password_verify($password, $row['password'])) {
        // 4. Create session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        echo json_encode(["status" => "OK"]);
    } else {
        echo json_encode(["status" => "ERROR", "message" => "Invalid password".$row['password']]);
    }
} else {
    echo json_encode(["status" => "ERROR", "message" => "User not found".$email]);
}
$stmt->close();
$mysqli->close();
