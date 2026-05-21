<?php
// live_migration.php
// Place this in the root folder of your live website.

// Prevent direct access constraints from CodeIgniter config
define('BASEPATH', dirname(__FILE__) . '/system/');
$host = $_SERVER['HTTP_HOST'];

// Read the database.php configuration dynamically
$db = array();
if (file_exists('application/config/database.php')) {
    require_once('application/config/database.php');
} else {
    die("<h3>Error: application/config/database.php not found!</h3>");
}

if (!isset($db['default'])) {
    die("<h3>Error: Default database group configuration not found!</h3>");
}

$db_config = $db['default'];
$hostname = str_replace(':3306', '', $db_config['hostname']);
$username = $db_config['username'];
$password = $db_config['password'];
$database = $db_config['database'];

try {
    $dsn = "mysql:host={$hostname};dbname={$database};charset=utf8";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "<h2>--- DigiCoders Live Database & Image Migration Tool ---</h2>";
    
    // 1. ALTER TABLES
    echo "<h3>1. Running Database Schema Modifications...</h3>";
    
    // banner
    try {
        $pdo->exec("ALTER TABLE banner ADD COLUMN alt_text VARCHAR(255) DEFAULT NULL, ADD COLUMN title VARCHAR(255) DEFAULT NULL");
        echo "<p style='color:green;'>✓ Added alt_text & title to banner table.</p>";
    } catch (Exception $e) {
        echo "<p style='color:orange;'>ℹ Notice (banner): " . $e->getMessage() . "</p>";
    }
    
    // placement
    try {
        $pdo->exec("ALTER TABLE placement ADD COLUMN alt_text VARCHAR(255) DEFAULT NULL, ADD COLUMN title VARCHAR(255) DEFAULT NULL");
        echo "<p style='color:green;'>✓ Added alt_text & title to placement table.</p>";
    } catch (Exception $e) {
        echo "<p style='color:orange;'>ℹ Notice (placement): " . $e->getMessage() . "</p>";
    }
    
    // teamexpert
    try {
        $pdo->exec("ALTER TABLE teamexpert ADD COLUMN alt_text VARCHAR(255) DEFAULT NULL, ADD COLUMN title VARCHAR(255) DEFAULT NULL");
        echo "<p style='color:green;'>✓ Added alt_text & title to teamexpert table.</p>";
    } catch (Exception $e) {
        echo "<p style='color:orange;'>ℹ Notice (teamexpert): " . $e->getMessage() . "</p>";
    }
    
    // 2. RENAME FILES
    echo "<h3>2. Renaming Existing Files & Updating Database Records...</h3>";
    
    function slugify($title, $fallback, $id) {
        $slug = preg_replace('/[^a-zA-Z0-9_-]/', '-', strtolower(trim($title)));
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        if (empty($slug)) {
            $slug = $fallback . "-" . $id;
        }
        return $slug;
    }

    // Banner Renamer
    $stmt = $pdo->query("SELECT id, image, title FROM banner");
    while ($row = $stmt->fetch()) {
        $old_filename = $row['image'];
        $title = $row['title'];
        $id = $row['id'];
        if (empty($old_filename)) continue;
        $ext = pathinfo($old_filename, PATHINFO_EXTENSION);
        $slug = slugify($title, "banner", $id);
        $new_filename = $slug . "." . $ext;
        $old_path = "./public/uploads/banner/" . $old_filename;
        $new_path = "./public/uploads/banner/" . $new_filename;
        if (file_exists($new_path) && $old_filename !== $new_filename) {
            $new_filename = $slug . "-" . $id . "." . $ext;
            $new_path = "./public/uploads/banner/" . $new_filename;
        }
        if ($old_filename !== $new_filename) {
            if (file_exists($old_path)) {
                if (rename($old_path, $new_path)) {
                    $up = $pdo->prepare("UPDATE banner SET image = ? WHERE id = ?");
                    $up->execute([$new_filename, $id]);
                    echo "Renamed Banner: {$old_filename} -> <b>{$new_filename}</b><br>";
                }
            }
        }
    }

    // Placement Renamer
    $stmt = $pdo->query("SELECT id, photo, title FROM placement");
    while ($row = $stmt->fetch()) {
        $old_filename = $row['photo'];
        $title = $row['title'];
        $id = $row['id'];
        if (empty($old_filename)) continue;
        $ext = pathinfo($old_filename, PATHINFO_EXTENSION);
        $slug = slugify($title, "placement", $id);
        $new_filename = $slug . "." . $ext;
        $old_path = "./public/uploads/placement/" . $old_filename;
        $new_path = "./public/uploads/placement/" . $new_filename;
        if (file_exists($new_path) && $old_filename !== $new_filename) {
            $new_filename = $slug . "-" . $id . "." . $ext;
            $new_path = "./public/uploads/placement/" . $new_filename;
        }
        if ($old_filename !== $new_filename) {
            if (file_exists($old_path)) {
                if (rename($old_path, $new_path)) {
                    $up = $pdo->prepare("UPDATE placement SET photo = ? WHERE id = ?");
                    $up->execute([$new_filename, $id]);
                    echo "Renamed Placement: {$old_filename} -> <b>{$new_filename}</b><br>";
                }
            }
        }
    }

    // TeamExpert Renamer
    $stmt = $pdo->query("SELECT id, Image, title FROM teamexpert");
    while ($row = $stmt->fetch()) {
        $old_filename = $row['Image'];
        $title = $row['title'];
        $id = $row['id'];
        if (empty($old_filename)) continue;
        $ext = pathinfo($old_filename, PATHINFO_EXTENSION);
        $slug = slugify($title, "expert", $id);
        $new_filename = $slug . "." . $ext;
        $old_path = "./public/uploads/teamexpert/" . $old_filename;
        $new_path = "./public/uploads/teamexpert/" . $new_filename;
        if (file_exists($new_path) && $old_filename !== $new_filename) {
            $new_filename = $slug . "-" . $id . "." . $ext;
            $new_path = "./public/uploads/teamexpert/" . $new_filename;
        }
        if ($old_filename !== $new_filename) {
            if (file_exists($old_path)) {
                if (rename($old_path, $new_path)) {
                    $up = $pdo->prepare("UPDATE teamexpert SET Image = ? WHERE id = ?");
                    $up->execute([$new_filename, $id]);
                    echo "Renamed Team Expert: {$old_filename} -> <b>{$new_filename}</b><br>";
                }
            }
        }
    }

    // 3. UPDATE BLOG INTERNAL LINKS
    echo "<h3>3. Updating Blog Internal Links...</h3>";
    try {
        $stmt = $pdo->query("SELECT id, title, content FROM blog");
        $replacements = [
            'https://thedigicoders.com/home/summertraining/' => 'https://thedigicoders.com/summer-training',
            'https://thedigicoders.com/home/summertraining' => 'https://thedigicoders.com/summer-training',
            'https://thedigicoders.com/summertraining' => 'https://thedigicoders.com/summer-training',
            'https://thedigicoders.com/home/internshiptraining/' => 'https://thedigicoders.com/internship-training',
            'https://thedigicoders.com/home/internshiptraining' => 'https://thedigicoders.com/internship-training',
        ];
        $updatedCount = 0;
        $up = $pdo->prepare("UPDATE blog SET content = ? WHERE id = ?");
        while ($row = $stmt->fetch()) {
            $id = $row['id'];
            $title = $row['title'];
            $originalContent = $row['content'];
            $newContent = $originalContent;
            
            $changesMade = [];
            foreach ($replacements as $oldUrl => $newUrl) {
                if (strpos($newContent, $oldUrl) !== false) {
                    $newContent = str_replace($oldUrl, $newUrl, $newContent);
                    $changesMade[] = "'$oldUrl' -> '$newUrl'";
                }
            }
            
            if ($newContent !== $originalContent) {
                $up->execute([$newContent, $id]);
                echo "Updated Blog ID: $id | Title: {$title}<br>";
                foreach ($changesMade as $change) {
                    echo " &nbsp;&nbsp;&nbsp;&nbsp; - Replaced: {$change}<br>";
                }
                $updatedCount++;
            }
        }
        echo "<p style='color:green;'>✓ Successfully updated {$updatedCount} blog posts with new clean internal links.</p>";
    } catch (Exception $e) {
        echo "<p style='color:red;'>✗ Error updating blogs: " . $e->getMessage() . "</p>";
    }

    echo "<h3 style='color:green;'>Migration successfully completed!</h3>";
    
    // Auto-deletion block
    @unlink(__FILE__);
    echo "<p style='color:red;'><b>Security Action:</b> This migration script has successfully deleted itself from the server root.</p>";


} catch (Exception $e) {
    echo "<h3 style='color:red;'>Error during migration: " . $e->getMessage() . "</h3>";
}
