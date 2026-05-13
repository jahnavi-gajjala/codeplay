<?php
$conn = new mysqli("sql100.infinityfree.com", "if0_39594759", "yyALtI7pg2", "if0_39594759_codeplay");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomCode = $_POST['room_code'];
    $username = $_POST['username'];

    // Check if room exists
    $check = $conn->prepare("SELECT * FROM rooms WHERE room_code = ?");
    $check->bind_param("s", $roomCode);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows === 0) {
        echo json_encode([
            'success' => false,
            'message' => "❌ Room not found."
        ]);
        exit;
    }

    $row = $result->fetch_assoc();

    // Check for empty player slot
    if (empty($row['player2'])) {
        $slot = 'player2';
    } elseif (empty($row['player3'])) {
        $slot = 'player3';
    } elseif (empty($row['player4'])) {
        $slot = 'player4';
    } else {
        echo json_encode([
            'success' => false,
            'message' => "❌ Room already full."
        ]);
        exit;
    }

    // Prevent duplicate usernames
    if (in_array($username, [$row['player1'], $row['player2'], $row['player3'], $row['player4']])) {
        echo json_encode([
            'success' => false,
            'message' => "⚠️ You have already joined the room."
        ]);
        exit;
    }

    // Update available slot
    $update = $conn->prepare("UPDATE rooms SET $slot = ? WHERE room_code = ?");
    $update->bind_param("ss", $username, $roomCode);

    if ($update->execute()) {
        echo json_encode([
            'success' => true,
            'message' => "Successfully joined as $slot!",
            'room_code' => $roomCode
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => "❌ Failed to join."
        ]);
    }
}
?>
