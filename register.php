<?php
require __DIR__ . '/database.php';
$conn = codeplay_db();

$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

// Check if name already exists
$check = $conn->prepare("SELECT 1 FROM codeplay_users WHERE name = ?");
$check->bind_param("s", $name);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
  echo "exists";
  exit;
}

// Insert new user
$passwordHash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO codeplay_users (name, password_hash) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $passwordHash);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "fail";
}

$conn->close();
?>
