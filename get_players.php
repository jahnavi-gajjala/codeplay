<?php
$servername = "sql100.infinityfree.com";
$username = "if0_39594759"; // Replace with your DB username
$password = "yyALtI7pg2";
$dbname = "if0_39594759_codeplay";  // Replace with your DB name



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$room_code = $_GET['room_code'];

$sql = "SELECT player1, player2, player3, player4 FROM rooms WHERE room_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $room_code);
$stmt->execute();
$result = $stmt->get_result();

$players = array();

if ($row = $result->fetch_assoc()) {
  $players[] = $row['player1'];
  $players[] = $row['player2'];
  $players[] = $row['player3'];
  $players[] = $row['player4'];
}

echo json_encode($players);

$conn->close();
?>
