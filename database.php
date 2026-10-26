<?php
function codeplay_db(): mysqli {
    $host = getenv('DB_HOST') ?: 'localhost';
    $port = (int) (getenv('DB_PORT') ?: 3306);
    $user = getenv('DB_USERNAME') ?: 'root';
    $password = getenv('DB_PASSWORD') ?: '';
    $database = getenv('DB_NAME') ?: 'defaultdb';

    $conn = mysqli_init();
    $sslCa = getenv('DB_SSL_CA') ?: null;
    mysqli_ssl_set($conn, null, null, $sslCa, null, null);
    if (!mysqli_real_connect($conn, $host, $user, $password, $database, $port, null,
        MYSQLI_CLIENT_SSL)) {
        http_response_code(500);
        exit('Database connection failed.');
    }

    $conn->set_charset('utf8mb4');
    $conn->query('CREATE TABLE IF NOT EXISTS codeplay_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
    $conn->query('CREATE TABLE IF NOT EXISTS codeplay_rooms (
        room_code VARCHAR(64) PRIMARY KEY,
        created_by VARCHAR(50),
        player1 VARCHAR(50), player2 VARCHAR(50), player3 VARCHAR(50), player4 VARCHAR(50)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4');
    return $conn;
}
