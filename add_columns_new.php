<?php
$conn = mysqli_connect("localhost", "root", "", "thedigicoders");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to check if column exists
function columnExists($conn, $table, $column) {
    $result = mysqli_query($conn, "SHOW COLUMNS FROM `$table` LIKE '$column'");
    return mysqli_num_rows($result) > 0;
}

$columns = [
    'Latitude' => "VARCHAR(255) NULL",
    'Longitude' => "VARCHAR(255) NULL",
    'Address' => "TEXT NULL"
];

echo "<h3>Migrating tbl_adminlogindetails for thedigicoders-com...</h3>";

foreach ($columns as $col => $type) {
    if (!columnExists($conn, 'tbl_adminlogindetails', $col)) {
        $sql = "ALTER TABLE tbl_adminlogindetails ADD COLUMN $col $type";
        if (mysqli_query($conn, $sql)) {
            echo "Column '$col' added successfully.<br>";
        } else {
            echo "Error adding column '$col': " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "Column '$col' already exists.<br>";
    }
}

echo "<h4>Process Completed!</h4>";
?>
