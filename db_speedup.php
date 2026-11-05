<?php
/**
 * DigiCoders High-Performance Database Indexing & Speedup Tool
 * 
 * Safe, idempotent migration script that adds crucial composite indexes
 * to prevent MySQL Full-Table Scans and reduce query execution time from seconds to milliseconds.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASEPATH', dirname(__FILE__) . '/system/');
define('APPPATH', dirname(__FILE__) . '/application/');
defined('ENVIRONMENT') or define('ENVIRONMENT', 'development');

if (!file_exists('application/config/database.php')) {
    die("Error: application/config/database.php not found.\n");
}
require_once('application/config/database.php');

if (!isset($db['default'])) {
    die("Error: Default database configuration not found.\n");
}

$db_config = $db['default'];
$hostname = str_replace([':3306', ':3307'], '', $db_config['hostname']);
$port = (strpos($db_config['hostname'], ':') !== false) ? explode(':', $db_config['hostname'])[1] : '3306';
$username = $db_config['username'];
$password = $db_config['password'];
$database = $db_config['database'];

$is_cli = (php_sapi_name() === 'cli');
$nl = $is_cli ? "\n" : "<br>\n";

echo ($is_cli ? "=== DigiCoders Database Optimization Tool ===" : "<h2>=== DigiCoders Database Optimization Tool ===</h2>") . $nl;

try {
    $dsn = "mysql:host={$hostname};port={$port};dbname={$database};charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "✓ Successfully connected to database: [{$database}]" . $nl;
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage() . $nl);
}

function safe_add_index($pdo, $database, $table, $index_name, $columns_sql) {
    global $nl;
    try {
        $tblCheck = $pdo->prepare("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = ? AND table_name = ?");
        $tblCheck->execute([$database, $table]);
        if ($tblCheck->fetchColumn() == 0) {
            echo "ℹ Table [{$table}] does not exist, skipping." . $nl;
            return;
        }

        $idxCheck = $pdo->prepare("SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = ? AND table_name = ? AND index_name = ?");
        $idxCheck->execute([$database, $table, $index_name]);
        if ($idxCheck->fetchColumn() > 0) {
            echo "✓ Index [{$index_name}] on [{$table}] already exists." . $nl;
            return;
        }

        $sql = "ALTER TABLE `{$table}` ADD INDEX `{$index_name}` ({$columns_sql})";
        $pdo->exec($sql);
        echo "<span style='color:green;'>✓ Added index [{$index_name}] on [{$table}] ({$columns_sql})</span>" . $nl;
    } catch (PDOException $e) {
        echo "<span style='color:red;'>✗ Failed to add index [{$index_name}] on [{$table}]: " . $e->getMessage() . "</span>" . $nl;
    }
}

// 1. seo_pages table
echo $nl . "--- 1. Optimizing `seo_pages` Table ---" . $nl;
safe_add_index($pdo, $database, 'seo_pages', 'idx_status', '`status`');
safe_add_index($pdo, $database, 'seo_pages', 'idx_city_status', '`city_name`, `status`');
safe_add_index($pdo, $database, 'seo_pages', 'idx_course_status', '`course_name`, `status`');
safe_add_index($pdo, $database, 'seo_pages', 'idx_state_city', '`state_name`, `city_name`');

// 2. cities table
echo $nl . "--- 2. Optimizing `cities` Table ---" . $nl;
safe_add_index($pdo, $database, 'cities', 'idx_status', '`status`');
safe_add_index($pdo, $database, 'cities', 'idx_city_status', '`city_name`, `status`');

// 3. placement table
echo $nl . "--- 3. Optimizing `placement` Table ---" . $nl;
safe_add_index($pdo, $database, 'placement', 'idx_status_banner', '`status`, `banner`, `id`');

// 4. review table
echo $nl . "--- 4. Optimizing `review` Table ---" . $nl;
safe_add_index($pdo, $database, 'review', 'idx_status', '`status`');

// 5. slider table
echo $nl . "--- 5. Optimizing `slider` Table ---" . $nl;
safe_add_index($pdo, $database, 'slider', 'idx_status', '`status`');

// 6. gallery table
echo $nl . "--- 6. Optimizing `gallery` Table ---" . $nl;
safe_add_index($pdo, $database, 'gallery', 'idx_status_category', '`status`, `category`');

// 7. teamexpert table
echo $nl . "--- 7. Optimizing `teamexpert` Table ---" . $nl;
safe_add_index($pdo, $database, 'teamexpert', 'idx_status_display', '`status`, `Display_status`');

// 8. contact table
echo $nl . "--- 8. Optimizing `contact` Table ---" . $nl;
safe_add_index($pdo, $database, 'contact', 'idx_status', '`status`');

// 9. registration table
echo $nl . "--- 9. Optimizing `registration` Table ---" . $nl;
safe_add_index($pdo, $database, 'registration', 'idx_mobile', '`mobile`');
safe_add_index($pdo, $database, 'registration', 'idx_userid', '`userid`');
safe_add_index($pdo, $database, 'registration', 'idx_accept_status', '`accept_status`');
safe_add_index($pdo, $database, 'registration', 'idx_is_status', '`is_status`');
safe_add_index($pdo, $database, 'registration', 'idx_status', '`status`');

// 10. fee_deposit table
echo $nl . "--- 10. Optimizing `fee_deposit` Table ---" . $nl;
safe_add_index($pdo, $database, 'fee_deposit', 'idx_accept_status', '`accept_status`');
safe_add_index($pdo, $database, 'fee_deposit', 'idx_reg_id', '`reg_id`');
safe_add_index($pdo, $database, 'fee_deposit', 'idx_userid', '`userid`');
safe_add_index($pdo, $database, 'fee_deposit', 'idx_mobile', '`mobile`');

// 11. users table
echo $nl . "--- 11. Optimizing `users` Table ---" . $nl;
safe_add_index($pdo, $database, 'users', 'idx_mobile', '`mobile`');
safe_add_index($pdo, $database, 'users', 'idx_is_status', '`is_status`');

// 12. Optimize tables
echo $nl . "--- 12. Optimizing Table Storage & Indexes ---" . $nl;
try {
    $pdo->exec("OPTIMIZE TABLE `seo_pages`, `cities`, `placement`, `registration`, `fee_deposit`, `review`, `slider`, `gallery`, `teamexpert`, `contact`, `users`");
    echo "✓ Tables optimized successfully." . $nl;
} catch (PDOException $e) {
    echo "ℹ Optimize note: " . $e->getMessage() . $nl;
}

echo $nl . "<b>=== Database Optimization Finished Successfully! ===</b>" . $nl;
