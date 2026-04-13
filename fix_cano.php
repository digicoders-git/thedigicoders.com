<?php
$dir = new RecursiveDirectoryIterator('c:/xampp/htdocs/thedigicoders-com/application/views/Home');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$count = 0;
foreach($files as $file) {
    if (is_array($file)) {
        $file = $file[0];
    }
    
    $content = file_get_contents($file);
    
    $orig = $content;

    $content = preg_replace('/<link\s+rel=["\']canonical["\'].*?>/is', '<link rel="canonical" href="<?= base_url($this->uri->uri_string()) ?>" />', $content);
    
    $content = preg_replace('/<meta\s+property=["\']og:url["\'].*?>/is', '<meta property="og:url" content="<?= base_url($this->uri->uri_string()) ?>" />', $content);
    
    if ($content !== $orig) {
        file_put_contents($file, $content);
        $count++;
    }
}

// Fix loader1.jpg in application structure globally
$dir2 = new RecursiveDirectoryIterator('c:/xampp/htdocs/thedigicoders-com/application/');
$ite2 = new RecursiveIteratorIterator($dir2);
$files2 = new RegexIterator($ite2, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

$loaderCount = 0;
foreach($files2 as $file) {
    if (is_array($file)) {
        $file = $file[0];
    }
    $content = file_get_contents($file);
    $orig = $content;
    
    // Some urls might be loader1.jpg others Loader1.jpg, just ensure the filename references are Loader1.jpg
    $content = str_replace('loader1.jpg', 'Loader1.jpg', $content);
    
    if ($content !== $orig) {
        file_put_contents($file, $content);
        $loaderCount++;
    }
}

echo "Updated $count SEO files.\n";
echo "Updated $loaderCount loader references.\n";
