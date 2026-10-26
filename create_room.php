<?php
require __DIR__ . '/database.php';
$conn = codeplay_db();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomCode = $_POST['room_code'] ?? '';  // Get room code from POST or set empty string
    $username = $_POST['username'];

    // If room code is not provided, generate a unique room code
    if (empty($roomCode)) {
        $roomCode = strtoupper(uniqid("ROOM_", true)); // Unique room code
    }

    // Check if room already exists in the database
    $check = $conn->prepare("SELECT * FROM codeplay_rooms WHERE room_code = ?");
    $check->bind_param("s", $roomCode);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // Room code already exists, return error
        echo "⚠️ Room already exists!";
    } else {
        // Room doesn't exist, create new room
        $stmt = $conn->prepare("INSERT INTO codeplay_rooms (room_code, created_by, player1) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $roomCode, $username, $username);

        if ($stmt->execute()) {
            // Room created successfully
            echo "Room created successfully! Your room code: " . $roomCode;
        } else {
            // Error creating room
            echo "Error: " . $stmt->error;
        }
    }
}

// Close the connection
$conn->close();
?>

