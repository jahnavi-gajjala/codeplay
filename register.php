<?php
$host = "sql100.infinityfree.com";
$user = "if0_39594759"; // change if different
$pass = "yyALtI7pg2";
$db = "if0_39594759_codeplay";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed");
}

$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

// Check if name already exists
$check = $conn->prepare("SELECT * FROM users WHERE name = ?");
$check->bind_param("s", $name);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
  echo "exists";
  exit;
}

// Insert new user
$stmt = $conn->prepare("INSERT INTO users (name, password) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $password);

if ($stmt->execute()) {
  echo "success";
} else {
  echo "fail";
}

$conn->close();
?>
