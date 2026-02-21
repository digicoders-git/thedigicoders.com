<?php
// Manual config for CLI since $_SERVER['HTTP_HOST'] is missing
$db_host = '127.0.0.1';
$db_port = 3307; // From database.php local config
$db_user = 'root';
$db_pass = '';
$db_name = 'thedigicoders';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
} catch (Exception $e) {
    try {
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, 3306);
    } catch (Exception $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

$output = [];

// Fetch SEO Pages slugs
$res = $mysqli->query("SELECT url_slug FROM seo_pages WHERE status = 'true'");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $output['course_pages'][] = $row['url_slug'];
    }
}

// Fetch Cities
$res = $mysqli->query("SELECT city_name FROM cities WHERE status = 1");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $output['cities'][] = $row['city_name'];
    }
}

// Fetch Blogs
$check_blog = $mysqli->query("SHOW TABLES LIKE 'blogs'");
if ($check_blog && $check_blog->num_rows > 0) {
    $res = $mysqli->query("SELECT url_slug FROM blogs WHERE status = 'true'");
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $output['blogs'][] = $row['url_slug'];
        }
    }
}

echo json_encode($output);
$mysqli->close();
?>