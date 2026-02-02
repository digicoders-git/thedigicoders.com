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

// Contacts
$contacts = [
    ['9198483820', 'Primary'],
    ['8081329320', 'Support'],
    ['7525953975', 'Enquiry'],
    ['+91 6394296293', 'WhatsApp'],
    ['0522-4235604', 'Landline']
];

foreach ($contacts as $contact) {
    $num = $contact[0];
    $type = $contact[1];
    $sql = "INSERT INTO tbl_contact_numbers (number, type, status) VALUES ('$num', '$type', 'true')";
    if ($conn->query($sql) === TRUE) {
        echo "Inserted contact $num\n";
    } else {
        echo "Error inserting contact: " . $conn->error . "\n";
    }
}

// Gallery Images
$images = [
    'digicoders-bach-1.jpeg',
    'digicoders-bach-2.jpeg',
    'digicoders-bach-3.jpeg',
    'digicoders-bach-4.jpeg',
    'digicoders-bach-5.jpeg',
    'vol-6.jpg',
    'vol-7.jpg',
    'vol-8.jpg'
];

$source_dir = 'public/assets/images/';
$dest_dir = 'public/uploads/training_gallery/';

if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0777, true);
}

foreach ($images as $img) {
    // Copy file
    if (file_exists($source_dir . $img)) {
        if (copy($source_dir . $img, $dest_dir . $img)) {
            echo "Copied $img\n";
            // Insert to DB
            $title = "summers training";
            $sql = "INSERT INTO tbl_training_gallery (image, title, status, date, time) VALUES ('$img', '$title', 'true', CURDATE(), CURTIME())";
            if ($conn->query($sql) === TRUE) {
                echo "Inserted gallery image $img\n";
            } else {
                echo "Error inserting gallery image: " . $conn->error . "\n";
            }
        } else {
            echo "Failed to copy $img\n";
        }
    } else {
        echo "Source file not found: $img\n";
    }
}

$conn->close();
?>