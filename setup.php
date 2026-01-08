<?php
// Setup script to create database and tables
$host = 'localhost';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS login_system";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Select database
$conn->select_db('login_system');

// Create table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Insert users
$hashed_password = '$2y$10$ezzp1c8YtixXzE1xrOigAe7YQbZqa1W8a.g3YDVDuxi/J.eGFC2eq'; // for 'password'

$sql = "INSERT INTO users (username, password, role) VALUES
('user', '$hashed_password', 'user'),
('admin', '$hashed_password', 'admin')
ON DUPLICATE KEY UPDATE password=password"; // Avoid duplicate error

if ($conn->query($sql) === TRUE) {
    echo "Users inserted successfully<br>";
} else {
    echo "Error inserting users: " . $conn->error . "<br>";
}

$conn->close();
echo "Setup complete. You can now access login.php";
?>