<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thedigicoders";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Table 1: tbl_contact_numbers
$sql1 = "CREATE TABLE IF NOT EXISTS tbl_contact_numbers (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    number VARCHAR(50) NOT NULL,
    type VARCHAR(50) NULL,
    status ENUM('true', 'false') DEFAULT 'true',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table tbl_contact_numbers created successfully\n";
} else {
    echo "Error creating table tbl_contact_numbers: " . $conn->error . "\n";
}

// Table 2: tbl_training_gallery
$sql2 = "CREATE TABLE IF NOT EXISTS tbl_training_gallery (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    title VARCHAR(255) NULL,
    status ENUM('true', 'false') DEFAULT 'true',
    date VARCHAR(50) NULL,
    time VARCHAR(50) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table tbl_training_gallery created successfully\n";
} else {
    echo "Error creating table tbl_training_gallery: " . $conn->error . "\n";
}

$conn->close();
?>