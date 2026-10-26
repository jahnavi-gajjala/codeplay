<?php
require __DIR__ . '/database.php';
$conn = codeplay_db();

$room_code = $_GET['room_code'];

$sql = "SELECT player1, player2, player3, player4 FROM codeplay_rooms WHERE room_code = ?";
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
