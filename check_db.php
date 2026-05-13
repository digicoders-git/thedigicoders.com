<?php
$conn = mysqli_connect("localhost", "root", "", "thedigicoders");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "DESCRIBE tbl_adminlogindetails");
echo "<table border='1'><tr><th>Field</th><th>Type</th></tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['Field']}</td><td>{$row['Type']}</td></tr>";
}
echo "</table>";
?>
