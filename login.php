<?php
require __DIR__ . '/database.php';
$conn = codeplay_db();

$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT password_hash FROM codeplay_users WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0 && password_verify($password, $result->fetch_assoc()['password_hash'])) {
  echo "success";
} else {
  echo "fail";
}
$conn->close();
?>
