<?php
// Correct the database connection variables
$host = "sql100.infinityfree.com";
$user = "if0_39594759";
$pass = "yyALtI7pg2";
$db = "if0_39594759_codeplay";

// Establish MySQL connection
$conn = new mysqli($host, $user, $pass, $db);

// Check if connection is successful
if ($conn->connect_error) {
  die(json_encode(["error" => "DB connection failed."]));
}

// Get room_code and username from the query parameters
$room_code = $_GET['room_code'];
$current_user = $_GET['username'];

// SQL query to get the players in the room
$sql = "SELECT player1, player2, player3, player4 FROM rooms WHERE room_code = ?";
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
