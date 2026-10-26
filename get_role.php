<?php
require __DIR__ . '/database.php';
$conn = codeplay_db();

// Get room_code and username from the query parameters
$room_code = $_GET['room_code'];
$current_user = $_GET['username'];

// SQL query to get the players in the room
$sql = "SELECT player1, player2, player3, player4 FROM codeplay_rooms WHERE room_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $room_code);
$stmt->execute();
$result = $stmt->get_result();

// Check if any room with the given room_code exists
if ($row = $result->fetch_assoc()) {
  // Loop through each player slot and check if the username matches
  foreach (["player1", "player2", "player3", "player4"] as $role) {
    if ($row[$role] === $current_user) {
      // If the user matches, return their role
      echo json_encode(["role" => $role]);
      exit; // User found, exit script
    }
  }
}

// If no matching user found, return null for role
echo json_encode(["role" => null]);

// Close the database connection
$conn->close();
?>
