<?php
$dir = new RecursiveDirectoryIterator('c:\xampp\htdocs\thedigicoders-com\application\views');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
$count = 0;
foreach($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    if(strpos($content, 'Home/Index') !== false) {
        $content = str_replace('Home/Index', '', $content);
        file_put_contents($path, $content);
        echo "Replaced in $path\n";
        $count++;
    }
}
echo "Total processed: $count\n";
