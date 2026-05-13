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

$sql = "SELECT * FROM users WHERE name = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "success";
} else {
  echo "fail";
}
$conn->close();
?>
